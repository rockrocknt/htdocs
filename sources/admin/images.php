<?
switch($act){
	case "edit":	
		Edit();
		$tpl="edit";
		break;
    case "addMultiImage":
        addMultiImage();
        $title_page = "sản phẩm Thêm hình ảnh";
        $tpl="addMultiImage";
        break;
    case "addone":
        $tpl="edit";
        $title_page = "CMS - Thêm 1 hình";
        break;
	case "add":	
		$title_page = "CMS - Thêm hình ảnh";
		$tpl="edit";
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
			
	case "order":
		Order();
		break;
		
	case "addmulti":
		addMulti();
		break;
    case "addsm":
	case "editsm":
		Editsm();
		break;
		
	case "change_active":
		changeStatus('active');
		break;
	
	case "delete_img":
		Delete_img();
		break;
	
	default:
		ShowList();
		$title_page = "CMS - Detail";
		$tpl="list";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20;
	$type = 0;
    if (getquery('type') != "")
    {
        $type =getquery('type');
    }
	//$sql="select * from images where cid=".$_GET['cid']." and type=".$_GET['type']." order by num asc, id desc";
    if (getquery('cid') != "")
        $sql="select * from images where type=$type and cid=".$_GET['cid']."  order by num asc, id desc";
    else
        $sql="select * from images where product_id=".getquery('product_id')."  order by num asc, id desc";

	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $image;
	$id=$_GET["id"];
	$sql = "select * from images where id=$id";
	$image = $db->getRow($sql);
}

function Delete($id)
{
	global $db;

	$sqlstmt = "select img from `images` where id=$id";
	$r = $db->getRow($sqlstmt);
	if(file_exists($r["img_vn"])) unlink($r["img_vn"]);
		
	$sql = "delete from images where id=".$id;
	$db->query($sql);
}

function Del()
{
	$id = $_GET["id"];	
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";

    $page = "admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET["cid"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
    if (getquery('cid') != '')
        $page = "admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET['cid'];
    else
        $page = "admin.php?do=images&type=".$_GET["type"]."&product_id=". getquery('product_id');


	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];
	
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	//$page = "admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET["cid"].(isset($_GET['page'])?'&page='.$_GET['page']:'');

    if (getquery('cid') != '')
        $page = "admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET['cid'];
    else
        $page = "admin.php?do=images&type=".$_GET["type"]."&product_id=". getquery('product_id');



    page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update images set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET["cid"]. (isset($_GET['page'])?'&page='.$_GET['page']:'');
    if (getquery('cid') != '')
        $page = "admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET['cid'];
    else
        $page = "admin.php?do=images&type=".$_GET["type"]."&product_id=". getquery('product_id');


    page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update images set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}
	
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET["cid"]. (isset($_GET['page'])?'&page='.$_GET['page']:'');
    if (getquery('cid') != '')
        $page = "admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET['cid'];
    else
        $page = "admin.php?do=images&type=".$_GET["type"]."&product_id=". getquery('product_id');


    page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	$cid = $_GET["cid"];
	$status = $_GET['current']==1?0:1;
	$sql="update images set $field='$status' where id=$id";
	$db->query($sql);
	$_SESSION['mess'] = "Sửa thành công!";
    if (getquery('cid') != '')
        $page = "admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET['cid'];
    else
        $page = "admin.php?do=images&type=".$_GET["type"]."&product_id=". getquery('product_id');

	page_transfer2($page);
}

function Order()
{
	global $db;
	$id=$_POST["id"];	
	$ordering=$_POST["ordering"];		
	for($i=0;$i<count($id);$i++){
		$sql="update images set num=".$ordering[$i]." where id=".$id[$i];
		$db->query($sql);		
	}
	
	$page="admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET["cid"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	$_SESSION['mess'] = "Sắp xếp thành công!";
	page_transfer2($page);
}


function Editsm()
{
    global $db, $act;

    $arr['name_vn']=$_POST["name_vn"];
    $arr['name_en']=$_POST["name_en"];
    $arr['colorbg_code']=$_POST["colorbg_code"];
    $arr['url_en']= $_POST["url_en"];
    $arr['url_vn']= $_POST["url_vn"];

    $arr['category_id']= $_POST["category_id"];
    if (isset($_POST["desc_vn"]))
    {
        $arr['desc_vn']=$_POST["desc_vn"];
    }
    if (getquery('cid') != '')
        $arr['cid']= isset($_GET["cid"])?$_GET["cid"]:'';
    else
        if (getquery('article_id') != "")
            $arr['article_id']= getquery('article_id');
        //  $sql="select * from images where article_id=".getquery('article_id')."  order by num asc, id desc";
        else
            $arr['product_id']= getquery('product_id');

    $arr['num']=isset($_POST["num"])?$_POST["num"]:'';
    $arr['active']= isset($_POST['active'])?'1':'0';
    $arr['cid']= isset($_GET["cid"])?$_GET["cid"]:'';
    $arr['type']= isset($_GET["type"])?$_GET["type"]:'';


    $page="admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET["cid"].(isset($_GET['page'])?'&page='.$_GET['page']:'');


    $folderRoot = createDateTimeFolder("upload/images/");

    if(isset($_FILES["img_vn"]['name'] ) && $_FILES["img_vn"]['size']>0){
        //them hinh moi
        $img = $_FILES["img_vn"]['name'];
        $start = strpos(strrev($img), ".");
        $type = substr($img, strlen($img)-($start+1), $start+1);
        if (!checkUploadImages($type))
        {
            $_SESSION['error'] = "Ảnh không đúng định dạng!";
        }
        else
        {
            $filename = cmsFunction::createImgName($arr["name_vn"]);
            if ($act == "editsm") {
                //kiem tra va xoa hinh cu
                $id=$_POST['id'];
                $sqlstmt="select img from `images` where id=$id";
                $r = $db->getRow($sqlstmt);
                if(file_exists($r["img_vn"])) unlink($r["img_vn"]);
            }

            if(file_exists( $folderRoot . $filename . $type)){
                $filename = $filename . '-' . time() . $type;
            }
            else
            {
                $filename = $filename . $type;
            }

            copy($_FILES["img_vn"]['tmp_name'], $folderRoot . $filename) ;
            $arr["img_vn"] = $folderRoot . $filename;
        }
    }
    $id=$_POST['id'];
    if ($act=="addsm")
    {
        $id = vaInsert('images', $arr,0);
    }else
        vaUpdate('images',$arr,' id='.$id);

    $page = "admin.php?do=images". (isset($_GET['type'])?'&type='.$_GET['type']:''). (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') .(isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:'').(isset($_GET['article_id'])?'&article_id='.$_GET['article_id']:'');


    $_SESSION['mess'] = "Sửa thành công!";
    page_transfer2($page);
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$img = $_GET['img_del'];
	
	$sql = "select * from `images` where id=$id";
	$result = $db->getRow($sql);
	
	unlink($result["$img"]);
	$arr["$img"] = "";
	vaUpdate('images',$arr,' id='.$id);

	$page = "admin.php?do=images&act=edit&id=$id&cid=$cid&type=".$_GET["type"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function addMulti()
{
    if (getquery('cid') != '')
	    $arr['cid']= isset($_GET["cid"])?$_GET["cid"]:'';
    else
        $arr['product_id']= getquery('product_id');

    global $db,$row;

    if (isset($arr['product_id']))
    {
        $sql = "select * from `products` where  `id`=".$arr['product_id'];
        $row = $db->getRow($sql);
    }


	$arr['type']= isset($_GET["type"])?$_GET["type"]:'';

  //  $folderRoot = createDateTimeFolder("upload/plupload/");
     $folderRoot = "upload/plupload/";

    foreach ($_POST as $name => $value)
    {
        if(strpos($name, "_tmpname"))
            $arr["img_vn"] = "upload/plupload/".$value;
        //$folderroot = createDateTimeFolder("upload/plupload/");
        $folderroot = "upload/plupload/";
        if(strpos($name, "_name"))
        {

            $arr["name_vn"] = $arr["name_en"] = $img = $value;

            $start = strpos(strrev($img), ".");	// lay dau . sau cung
            $type = substr($img, strlen($img)-($start+1), $start+1);
            $filename = substr($img, 0, strlen($img)-($start+1));
            if (isset($row['name_vn']))
            {
                $filename = vietnamese_permalink($row['name_vn'])."-".rand(0,1000);
            }
            if(file_exists( $folderroot . $filename . $type)){
                $filename = $filename . '-' . time() . $type;
            }
            else
            {
                $filename = $filename . $type;
            }
            $arr["name_vn"] = $arr["name_en"] =$filename;
            $image = $arr["img_vn"];
            copy($arr["img_vn"], $folderroot . $filename) ;
            $arr["img_vn"] = $folderroot . $filename;


            unlink($image);
        }

        if(strpos($name, "_status"))
            if ($value == "done")
            {
                vaInsert("images", $arr,0);
                $_SESSION['mess'] = "Thêm thành công!";
            }
    }
    $page = "";
    if (getquery('cid') != '')
        $page = "admin.php?do=images&type=".$_GET["type"]."&cid=".$_GET['cid'];
    else
        $page = "admin.php?do=images&type=".$_GET["type"]."&product_id=". getquery('product_id');

	page_transfer2($page);
}
function addMultiImage()
{
    global $db, $product;
    $sql = "select * from products where id = " . $_GET['product_id'];
    $product = $db->getRow($sql);
	
    if (isPost()) {
        //var_dump($_FILES);
        //die("images.php");
        if ($_FILES['img']) {
            $file_ary = reArrayFiles($_FILES['img']);

            foreach ($file_ary as $file) {
                //var_dump($file);
                /*
                if (!checkUploadImages($file['type']))
                {
                    $_SESSION['error'] = "Ảnh không đúng định dạng!";
                    return;
                }
                print 'File Name: ' . $file['name'] . "<br/>";
                print 'File Type: ' . $file['type'] . "<br/>";
                print 'File Size: ' . $file['size'] . "<br/>";
                */
                $img = $file['name'];
                $start = strpos(strrev($img), ".");
                $type = substr($img, strlen($img)-($start+1), $start+1);
                
                if (!checkUploadImages($type))
                {
                    $_SESSION['error'] = "Ảnh không đúng định dạng!";
                    continue;
                }
                /*
                $sql = "select * from products where id = " . $_GET['product_id'];
                $product = $db->getRow($sql);
                */
                if (!empty($product)) {
                    
                }
                $filename = vietnamese_permalink($product['name_vn']);
                $filenameExt = $filename . rand(0,10000)  . $type;
                //$folderRoot = "upload/plupload/";
                $folderRoot = createDateTimeFolder("upload/plupload/");
                $result = copy($file['tmp_name'], $folderRoot . $filenameExt);
                //echo $folderRoot . $filenameExt;
                ?>
                
                <?php
                
                $arr['product_id'] = getquery('product_id');
                $arr['img_vn'] = $folderRoot . $filenameExt;
                $arr['name_vn'] = $filename;
                $arr['type'] = getquery('type');
                $arr['active'] = 1;
                vaInsert("images", $arr,0);
                //die("herer");
                /*
                //them hinh moi
                $img = $file['name'];
                $start = strpos(strrev($img), ".");
                $type = substr($img, strlen($img)-($start+1), $start+1);
                if (!checkUploadImages($type))
                {
                    $_SESSION['error'] = "Ảnh không đúng định dạng!";
                }
                else
                {
                    $filename = cmsFunction::createImgName($arr["name_vn"]);
                    if (!empty($_GET['product_id'])) {
                        $sql = "select * from products where id = " . $_GET['product_id'];
                        $product = $db->getRow($sql);
                        $filename = 
                    }
                    if ($act == "editsm") {
                        //kiem tra va xoa hinh cu
                        $id=$_POST['id'];
                        $sqlstmt="select img from `images` where id=$id";
                        $r = $db->getRow($sqlstmt);
                        if(file_exists($r["img_vn"])) unlink($r["img_vn"]);
                    }

                    if(file_exists( $folderRoot . $filename . $type)){
                        $filename = $filename . '-' . time() . $type;
                    }
                    else
                    {
                        $filename = $filename . $type;
                    }

                    copy($_FILES["img_vn"]['tmp_name'], $folderRoot . $filename) ;
                    $arr["img_vn"] = $folderRoot . $filename;
                }
                */
            }
        }
        page_transfer2("/admin.php?do=images&act=list&type=" . getquery('type') . "&product_id=" . getquery('product_id'));
    }
	
}
?>