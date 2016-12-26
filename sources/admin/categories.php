<?php
include("ckeditor_config.php");
switch($act){
	case "edit":	
		Edit();
		$title_page = "CMS - Chỉnh sửa danh mục";
		$tpl="edit";
		break;
	
	case "add":	
		$tpl="edit";
		$title_page = "CMS - Thêm danh mục";
		break;


	case "del":
		Del();
		break;
	
	case "dellist":
		DelList();
		break;
	
	case "show":
		setActive('active');
		break;
	
	case "hide":
		inActive('active');
		break;
	
	case "change_active":
		changeStatus('active');
		break;
	
	case "addsm":
	case "editsm":
		Editsm();
		break;
	
	case "delete_img":
		Delete_img();
		break;


    case "list_thutusanpham":
        list_thutusanpham();
        $tpl="list_thutusanpham";
		break;

    case "search":
        $title_page = "CMS - Tìm kiếm sản phẩm";
        search();
        $tpl="list";
        break;
    case "update_cid_menuleft":
        update_cid_menuleft();
        break;
	default:
		ShowList();
		$title_page = "CMS - Danh mục";
		$tpl="list";
}
function update_cid_menuleft()
{
    global $db;
    $id = $_POST["iddel"];

   // $column =  $_POST["column"];
    $column = "cid_menu_left";
    $value =  $_POST["cid_menu_left"];
    //die($column);

    for($i=0;$i<count($id);$i++){
    //    DeleteCat($id[$i]);
        $arr[$column] = $value;
        vaUpdate('categories',$arr," id =".$id[$i]);
    }

    $_SESSION['mess'] = "Đã update!";
    $page="admin.php?do=categories&cid=".$_GET['cid']."&root=".$_GET['root'];
    page_transfer2($page);
}

function search()
{
    global $db,$products,$page,$plpage,$set_per_page,$c,$stips;
    $set_per_page=20;
    $kw = SafeQueryString('kw');
    if ($kw == 'Nhập tên sản phẩm cần tìm...')
    {
        $page="admin.php?do=products";
        page_transfer2($page);
    }
    if ($kw == '')
    {
        $kw = SafeFormValue('kw');

        if ($kw != '')
        {
            $page2="admin.php?do=categories&cid=121&root=1&act=search&kw=".$kw;
            page_transfer2($page2);
        }else
        {
            $page="admin.php?do=categories";
            page_transfer2($page);
        }
    }

    $key = $kw;
    $unique = vietnamese_permalink($key);
    $sql="select * from categories where (unique_key_vn like '%".$unique."%' ) or (name_vn like '%".$key."%' ) or name_en like '%".$key."%'   order by num asc, id desc ";



    $c = $db->numRows($db->query($sql));
    $plpage = plpage($sql,$page,$set_per_page);
    $sqlstmt = sqlmod($sql,$page,$set_per_page);
    $stips = $db->getAll($sqlstmt);

}

function list_thutusanpham()
{
    global $db,$stips,$page,$plpage,$set_per_page,$c;
    $set_per_page=20;
    if(isset($_GET['cid']) && $_GET['cid']!=1 && $_GET['cid']!=''){

        $sql="select p.*,pc.id as pcID,pc.num as pcNum from `products` p,  `product_category` pc where (p.id=pc.product_id) and (pc.cid=".$_GET['cid'].")   order by pc.num asc, pc.product_id desc ";

    }
    else
        $sql="";
   // $sql="select * from products order by num asc, id desc ";
   // echo $sql;
    $c = $db->numRows($db->query($sql));
    $plpage = plpage($sql,$page,$set_per_page);
    $sqlstmt = sqlmod($sql,$page,$set_per_page);
    $stips = $db->getAll($sqlstmt);

}
function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	
	$status = $_GET['current']==1?0:1;
	$sql="update categories set $field='$status' where id=$id";
	$db->query($sql);	

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=categories".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'')."&root=1";
	page_transfer2($page);
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	//$sql="select * from categories where pid=".$_GET['cid']." order by num asc, id desc";
    $sql="select * from categories where pid=".$_GET['cid']." order by name_vn asc";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $cat;
	$id = $_GET["id"];
	$sql = "select * from categories where id=$id";
	$cat = $db->getRow($sql);	
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update categories set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=categories&cid=".$_GET['cid']."&root=".$_GET['root'].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update categories set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}
	
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=categories&cid=".$_GET['cid']."&root=".$_GET['root'].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DeleteCat($id){
	global $db;

	$sql = "select * from categories where id=$id";
	$r = $db->getRow($sql);
    if ($r['alias'] != "") return;
	if($r && $r['is_deleted'] == 1){
		if($r['has_child'] != 1){ //khong co con, xoa
			$sql = "select * from component where id=" .  $r['comp'] ;
			$comp = $db->getRow($sql);
			$sql = "delete from " . $comp['do'] . " where " . ($comp['do']=="intro"?"id":"cid") . "=" . $r['id'];
			//echo $sql;
			$db->query($sql);
		}
		else{ //co con, xoa con no
			$sql = "select id from categories where pid=$id and is_deleted = 1";
			$arr = $db->getAll($sql);
			if($arr){
				foreach($arr as $item){
					DeleteCat($item['id']);
				}
			}
		}

		if(file_exists($r["img"])) unlink($r["img"]);
		$sql = "delete from categories where id=".$id." and is_deleted = 1";
		$db->query($sql);
		$sql = "delete from widgets_categories where catid=$id";
		$db->query($sql);
		insertLog('Xoá danh mục: '.$r['name_vn']);
	}
}

function Del()
{
	global $db;
	$id=$_GET["id"];
	
	DeleteCat($id);
	
	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=categories&cid=".$_GET['cid']."&root=".$_GET['root'];
	page_transfer2($page);
}

function DelList()
{
	global $db;
	$id = $_POST["iddel"];
	
	for($i=0;$i<count($id);$i++){
		DeleteCat($id[$i]);
	}
	
	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=categories&cid=".$_GET['cid']."&root=".$_GET['root'];
	page_transfer2($page);
}

function Editsm()
{
	global $db,$act;
	
	$id=isset($_POST["id"])?$_POST["id"]:'';

    if (isset($_POST["cid_menu_left"]))
    {
        $arr['cid_menu_left'] = $_POST["cid_menu_left"];
    }

    $arr['h1_vn']=$_POST["h1_vn"];


	$arr['name_vn']= isset($_POST["name_vn"])?$_POST["name_vn"]:'';
	$arr['name_en']= isset($_POST["name_en"])?$_POST["name_en"]:'';
    $product_in_one_row = 2;
    $arr['productidlistlienquan']= isset($_POST["productidlistlienquan"])?$_POST["productidlistlienquan"]:'';

    $arr['productcidlist']= isset($_POST["productcidlist"])?$_POST["productcidlist"]:'';

	$arr['ext_url']= isset($_POST["ext_url"])?$_POST["ext_url"]:'';
    $arr['cidlist']= isset($_POST["cidlist"])?$_POST["cidlist"]:'';

    $arr['banner_top_url']= isset($_POST["banner_top_url"])?$_POST["banner_top_url"]:'';
    $arr['categories_displaytype_id']= isset($_POST["categories_displaytype_id"])?$_POST["categories_displaytype_id"]:'';
	$arr['num']=isset($_POST["num"])?$_POST["num"]:'';
	if ($arr['ext_url'] == "") {
		$arr['comp'] = isset($_POST['comp'])?$_POST["comp"]:'';
		$arr['new_tab'] = 0;
	}
	else {
		$arr['comp'] = 27;
		$arr['new_tab'] = isset($_POST['new_tab'])?'1':'0';
	}
	if ($arr['comp'] == 9)
		$arr['has_child'] = 1;
	else
		$arr['has_child'] = 0;
	$arr['active'] = isset($_POST['active'])?'1':'0';
	$cid = $arr['pid'] = $_POST['cat'];
    $arr['product_min_price'] = isset($_POST["product_min_price"])?$_POST["product_min_price"]:0;
    $arr['product_max_price'] = isset($_POST["product_max_price"])?$_POST["product_max_price"]:0;

    if (isset($_POST['html_menucon_vn']))
    {
        $arr['html_menucon_vn'] = $_POST['html_menucon_vn'];
    }
    if (isset($_POST['menu_con_type']))
    {
        $arr['menu_con_type'] = $_POST['menu_con_type'];
    }
    if (isset($_POST['seo_f_vn']))
    {
        $arr['seo_f_vn'] = $_POST['seo_f_vn'];
    }
    if (isset($_POST['seo_f_en']))
    {
        $arr['seo_f_en'] = $_POST['seo_f_en'];
    }
//$arr['seo_f_vn'] = "<h1>".SafeFormValue('h1_vn')."</h1>\n<h2>".SafeFormValue('h2_vn')."</h2>\n<p>".SafeFormValue('seo_des_vn')."</p>\n";
    //$arr['seo_f_en'] = "<h1>".SafeFormValue('h1_en')."</h1>\n<h2>".SafeFormValue('h2_en')."</h2>\n<p>".SafeFormValue('seo_des_en')."</p>\n";


	$arr['short_vn']= $_POST['short_vn'];
	$arr['short_en']=$_POST['short_en']; 
	
	$arr['ext_url_vn']=$_POST['ext_url_vn']; 
	$arr['group_name_vn']=$_POST['group_name_vn']; 
	
	$arr['title_vn']= SafeFormValue('title_vn');	
	$arr['title_en']= SafeFormValue('title_en');	
	$arr['keyword_vn']= SafeFormValue('keyword_vn');	
	$arr['keyword_en']= SafeFormValue('keyword_en');	
	$arr['des_vn']= SafeFormValue('des_vn');	
	$arr['des_en']= SafeFormValue('des_en');	
	$arr['des_vn_char']= SafeFormValue('des_vn_char');	
	$arr['des_en_char']= SafeFormValue('des_en_char');		
	$page="admin.php?do=categories&cid=".$_GET['cid']."&root=".$_GET['root'] . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    $folderRoot = createDateTimeFolder("upload/images/");
	if(isset($_FILES["img"]['name'] ) && $_FILES["img"]['size']>0){		
		//them hinh moi


		$img = $_FILES["img"]['name'];
		$start = strpos(strrev($img), ".");	// lay dau . sau cung
		$type = substr($img, strlen($img)-($start+1), $start+1);
		if (!checkUploadImages($type))
		{
			$_SESSION['error'] = "Ảnh danh mục không đúng định dạng!";
		}
		else
		{
			$filename = vietnamese_permalink(SafeFormValue('unique_key_vn'));
			if ($act == "editsm") {
				//kiem tra va xoa hinh cu
				$id=$_POST['id'];
				$sqlstmt="select img from categories where id=$id";
				$r = $db->getRow($sqlstmt);
				if(file_exists($r["img"])) unlink($r["img"]);
			}
	
			if(file_exists( $folderRoot . $filename . $type)){
				$filename = $filename . '-' . time() . $type;
			}
			else
			{
				$filename = $filename . $type;
			}
	
			copy($_FILES["img"]['tmp_name'], $folderRoot . $filename) ;
			$arr["img"] = $folderRoot. $filename;
		}
	}
    if(isset($_FILES["img_topbanner"]['name'] ) && $_FILES["img_topbanner"]['size']>0){
        //them hinh moi
        $img = $_FILES["img_topbanner"]['name'];
        $start = strpos(strrev($img), ".");	// lay dau . sau cung
        $type = substr($img, strlen($img)-($start+1), $start+1);
        if (!checkUploadImages($type))
        {
            $_SESSION['error'] = "Ảnh danh mục không đúng định dạng!";
        }
        else
        {
            $filename = SafeFormValue('unique_key_vn');
            if ($act == "editsm") {
                //kiem tra va xoa hinh cu
                $id=$_POST['id'];
                $sqlstmt="select img_topbanner from categories where id=$id";
                $r = $db->getRow($sqlstmt);
                if(file_exists($r["img_topbanner"])) unlink($r["img_topbanner"]);
            }
            if(file_exists( $folderRoot . $filename . $type)){
                $filename = $filename . '-' . time() . $type;
            }
            else
            {
                $filename = $filename . $type;
            }

            copy($_FILES["img_topbanner"]['tmp_name'], $folderRoot . $filename) ;
            $arr["img_topbanner"] = $folderRoot . $filename;
        }
    }



	$arr['content_vn']= isset($_POST["content_vn"])?$_POST["content_vn"]:'';
	$arr['content_en']= isset($_POST["content_en"])?$_POST["content_en"]:'';
	//$arr['seo_f_vn'] = "<h1>".SafeFormValue('h1_vn')."</h1>\n<h2>".SafeFormValue('h2_vn')."</h2>\n<p>".SafeFormValue('seo_des_vn')."</p>\n";
	//$arr['seo_f_en'] = "<h1>".SafeFormValue('h1_en')."</h1>\n<h2>".SafeFormValue('h2_en')."</h2>\n<p>".SafeFormValue('seo_des_en')."</p>\n";

	if ($act=="addsm")
	{
		$id = vaInsert('categories', $arr);
		$arr['unique_key_vn']= insertUniquekey(vietnamese_permalink(SafeFormValue("unique_key_vn")), 'vn', $id, $cid);
		$arr['unique_key_en']= insertUniquekey(vietnamese_permalink(SafeFormValue("unique_key_en")), 'en', $id, $cid);
		vaUpdate('categories', $arr, ' id='.$id);		
		$msg = "Thêm thành công!";
		//insertLog('Thêm danh mục: '.$arr['name_vn']);
	}
	else
	{
		$arr['unique_key_vn']= updateUniquekey(vietnamese_permalink(SafeFormValue("unique_key_vn")), 'vn', $id, $cid);
		$arr['unique_key_en']= updateUniquekey(vietnamese_permalink(SafeFormValue("unique_key_en")) , 'en', $id, $cid);
		vaUpdate('categories',$arr,' id='.$id );
		$msg = "Sửa thành công!";
		//insertLog('Sửa danh mục: '.$arr['name_vn']);
	}	

	$_SESSION['mess'] = $msg;	
	page_transfer2($page);
}

function insertUniquekey($uniqueKey, $lg, $id, $cid)
{
	global $db;
	
	if ($uniqueKey=="")
		return $uniqueKey;
	
	$sql = "select * from categories where unique_key_$lg='$uniqueKey' and pid=$cid";
	$r = $db->getRow($sql);
	
	if ($r)
		return $uniqueKey.'-'.$id;
	return $uniqueKey;
}

function updateUniquekey($uniqueKey, $lg, $id, $cid)
{
	global $db;
	
	if ($uniqueKey=="")
		return $uniqueKey;
	
	$sql = "select * from categories where unique_key_$lg='$uniqueKey' and pid=$cid";
	$r = $db->getRow($sql);
	
	if ($r && $r['id']!=$id)
		return $uniqueKey.'-'.$id;
	return $uniqueKey;
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$img = $_GET['img_del'];
	$page = "admin.php?do=categories&act=edit&id=$id". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'').'&root='.$_GET["root"];
	
	$sql = "select * from categories where id=$id";
	$result = $db->getRow($sql);
	
	if (file_exists($result["$img"]))
	{
		unlink($result["$img"]);
		$arr["$img"] = "";
		vaUpdate('categories',$arr,' id='.$id);
	}
		
	page_transfer2($page);
}
?>