<?php
include("ckeditor_config.php");
switch($act){
	case "edit":	
		Edit();
		$tpl="edit";
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
	
	$sql="select * from img order by num asc, id desc ";
	
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $image;
	$id=$_GET["id"];
	$sql = "select * from img where id=$id";
	$image = $db->getRow($sql);
}

function Delete($id)
{
	global $db;

	$sqlstmt = "select img from `img` where id=$id";
	$r = $db->getRow($sqlstmt);
	if(file_exists($r["img"])) unlink($r["img"]);
		
	$sql = "delete from img where id=".$id;
	$db->query($sql);
}

function Del()
{
	$id = $_GET["id"];
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=img_group&act=detail&cid=".$_GET['cid'].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];
	
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=img_group&act=detail&cid=".$_GET['cid'].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update img set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=img_group&act=detail&cid=".$_GET['cid']. (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update img set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}
	
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=img_group&act=detail&cid=".$_GET['cid']. (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	$cid = $_GET["cid"];

	$status = $_GET['current']==1?0:1;
	$sql="update img set $field='$status' where id=$id";
	$db->query($sql);	

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=img_group&act=detail&cid=$cid".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Order()
{
	global $db;
	$id=$_POST["id"];	
	$ordering=$_POST["ordering"];		
	for($i=0;$i<count($id);$i++){
		$sql="update img set num=".$ordering[$i]." where id=".$id[$i];
		$db->query($sql);		
	}
	
	$page="admin.php?do=img_group&act=detail&cid=".$_GET['cid'].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	$_SESSION['mess'] = "Sắp xếp thành công!";
	page_transfer2($page);
}

function Editsm()
{
	global $db, $act;
	
	$arr['name_vn']= $_POST["name_vn"]; 
	$arr['name_en']= $_POST["name_en"]; 


    $arr['url_vn']= isset($_POST["url_vn"])?$_POST["url_vn"]:'';
    $arr['url_en']= isset($_POST["url_vn"])?$_POST["url_vn"]:'';

    $arr['url_vn']= ImagesGroup::getLink($_POST["url_vn"]);
    $arr['url_en']= ImagesGroup::getLink($_POST["url_en"]);


    $arr['text1_vn']= $_POST["text1_vn"];
    $arr['text2_vn']= $_POST["text2_vn"];
    $arr['text3_vn']= $_POST["text3_vn"];
    $arr['textalign']= $_POST["textalign"];
    $arr['transitiontype']= $_POST["transitiontype"];

    $arr['num']=isset($_POST["num"])?$_POST["num"]:'';
	$arr['active']= isset($_POST['active'])?'1':'0';
	$arr['cid']= isset($_GET["cid"])?$_GET["cid"]:'';
    $arr['category_id']= $_POST['category_id'];
	$page="admin.php?do=img_group&act=detail&cid=".$_GET["cid"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
    $folderRoot = createDateTimeFolder("upload/images/");
	if(isset($_FILES["img_vn"]['name'] ) && $_FILES["img_vn"]['size']>0){
		//them hinh moi		
		$img = $_FILES["img_vn"]['name'];
		$start = strpos(strrev($img), ".");
		$type = substr($img, strlen($img)-($start+1), $start+1);
		if (!checkUploadBanner($type))
		{
			$_SESSION['error'] = "Banner không đúng định dạng!";
		}
		else
		{
			$filename = cmsFunction::createImgName($arr["name_vn"]);
			if ($act == "editsm") {
				//kiem tra va xoa hinh cu
				$id=$_POST['id'];
				$sqlstmt="select img from `img` where id=$id";
				$r = $db->getRow($sqlstmt);
				if(file_exists($r["img_vn"])) unlink($r["img"]);
			}
			
			if(file_exists( $folderRoot . $filename . $type)){
				$filename = $filename . '-' . time() . $type;
			}
			else
			{
				$filename = $filename . $type;
			}
			
			copy($_FILES["img_vn"]['tmp_name'], $folderRoot. $filename) ;
			$arr["img_vn"] =$folderRoot. $filename;
		}
	}

	if ($act=="addsm")
	{			
		vaInsert('img',$arr,0);
		$msg="Thêm thành công!";
	}
	else
	{
		$id=$_POST['id'];			
		vaUpdate('img',$arr,' id='.$id);	
		$msg="Sửa thành công!";		
	}

	$_SESSION['mess'] = $msg;
	page_transfer2($page);
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$img = $_GET['img_del'];
	$page = "admin.php?do=img&act=edit&id=$id&cid=$cid".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	
	$sql = "select * from `img` where id=$id";
	$result = $db->getRow($sql);
	
	if (file_exists($result["$img"]))
	{
		unlink($result["$img"]);
		$arr["$img"] = "";
		vaUpdate('img',$arr,' id='.$id);
	}

	page_transfer2($page);
}
?>