<?php
include("ckeditor_config.php");
switch($act){		
	case "edit":
		Edit();
		$title_page = "CMS - Chỉnh sửa hệ thống thanh toán";
		$tpl="edit";
		break;

	case "editsm":
		Editsm();
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
	
	case "delete_img":
		Delete_img();
		break;

	default:
		ShowList();
		$title_page = "CMS - Thanh toán";
		$tpl="list";
}

function Edit()
{
	global $db, $payment;

	$id=$_GET["id"];
	$sql = "select * from payments where id=$id";
	$payment = $db->getRow($sql);
}

function Editsm()
{
	global $db, $act;
	
	$arr['name_vn']= SafeFormValue('name_vn');
	$arr['name_en']= SafeFormValue('name_en');

	$arr['content_vn']= isset($_POST["content_vn"])?$_POST["content_vn"]:'';
	$arr['content_en']= isset($_POST["content_en"])?$_POST["content_en"]:'';
	
	$arr['active'] = isset($_POST["active"])?1:0;
	$arr['num'] = $_POST["num"];
	$arr['email']=SafeFormValue('email');
	$arr['merchantCode']=SafeFormValue('merchantCode');
	$arr['passcode']=SafeFormValue('passcode');
	$arr['key']=SafeFormValue('key');
	$page="admin.php?do=payments";
	
	if(isset($_FILES["img"]['name'] ) && $_FILES["img"]['size']>0){		
		//them hinh moi
		$img = $_FILES["img"]['name'];
		$start = strpos(strrev($img), ".");	// lay dau . sau cung
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
				$sqlstmt="select img from payments where id=$id";
				$r = $db->getRow($sqlstmt);
				if(file_exists($r["img"])) unlink($r["img"]);
			}
			
			if(file_exists( "./upload/images/" . $filename . $type)){
				$filename = $filename . '-' . time() . $type;
			}
			else
			{
				$filename = $filename . $type;
			}
			
			copy($_FILES["img"]['tmp_name'], "./upload/images/" . $filename) ;
			$arr["img"] = "upload/images/" . $filename;
		}
	}

	$id=$_POST['id'];
	vaUpdate('payments', $arr, ' id='.$id);
	insertLog('Sửa hệ thống thanh toán: '.$_POST["name_vn"]);

	$_SESSION['mess'] = "Sửa thành công!";
	page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	
	$status = $_GET['current']==1?0:1;
	$sql="update payments set $field='$status' where id=$id";
	$db->query($sql);	

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=payments";
	page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update payments set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=payments";
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update payments set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=payments";
	page_transfer2($page);
}

function ShowList()
{
	global $db, $stips;
		
	$sql = "select * from payments where allow=1 order by num asc, id desc";
	$stips = $db->getAll($sql);
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$img = $_GET['img_del'];
	$page = "admin.php?do=payments&act=edit&id=$id";
	
	$sql = "select * from payments where id=$id";
	$result = $db->getRow($sql);
	
	if (file_exists($result["$img"]))
	{
		unlink($result["$img"]);
		$arr["$img"] = "";
		vaUpdate('payments',$arr,' id='.$id);
	}
		
	page_transfer2($page);
}
?>