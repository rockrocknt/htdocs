<?php
include("ckeditor_config.php");
switch($act){
	case "add":
		$title_page = "CMS - Thêm ngân hàng";
		$tpl="edit";
		break;

	case "del":
		Del();
		break;

	case "dellist":
		DelList();
		break;
		
	case "edit":
		Edit();
		$title_page = "CMS - Chỉnh sửa ngân hàng";
		$tpl="edit";
		break;

	case "addsm":
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
		$title_page = "CMS - Ngân hàng";
		$tpl="list";
}

function Delete($id)
{
	global $db;

	$sqlstmt="select img, bank_vn from `banks` where id=$id";
	$r = $db->getRow($sqlstmt);

	if(file_exists($r["img"])) unlink($r["img"]);

	$sql="delete from banks where id=".$id;
	$db->query($sql);
	insertLog('Xóa ngân hàng: '.$r['bank_vn']);
}

function Del()
{
	$id=$_GET["id"];
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=banks";
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=banks";
	page_transfer2($page);
}

function Edit()
{
	global $db, $bank;

	$id=$_GET["id"];
	$sql = "select * from banks where id=$id";
	$bank = $db->getRow($sql);
}

function Editsm()
{
	global $db, $act;
	
	$arr['name']= SafeFormValue('name');
	$arr['bank_vn']= SafeFormValue('bank_vn');
	$arr['bank_en']= SafeFormValue('bank_en');
	$arr['card']= SafeFormValue('card');
	$arr['branch']= SafeFormValue('branch');
	
	$arr['active'] = isset($_POST["active"])?1:0;
	$arr['num'] = $_POST["num"];
	$page="admin.php?do=banks";
	
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
			$filename = cmsFunction::createImgName($arr["bank_vn"]);
			if ($act == "editsm") {
				//kiem tra va xoa hinh cu
				$id=$_POST['id'];
				$sqlstmt="select img from banks where id=$id";
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
	
	if ($act=="addsm")
	{
		vaInsert('banks', $arr);	
		insertLog('Thêm ngân hàng: '.$_POST["bank_vn"]);
		$msg="Thêm thành công!";
	}
	else
	{
		$id=$_POST['id'];
		vaUpdate('banks', $arr, ' id='.$id);
		insertLog('Sửa ngân hàng: '.$_POST["bank_vn"]);
		$msg="Sửa thành công!";
	}

	$_SESSION['mess'] = $msg;
	page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	
	$status = $_GET['current']==1?0:1;
	$sql="update banks set $field='$status' where id=$id";
	$db->query($sql);	

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=banks";
	page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update banks set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=banks";
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update banks set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=banks";
	page_transfer2($page);
}

function ShowList()
{
	global $db, $stips;
		
	$sql = "select * from banks order by num asc, id desc";
	$stips = $db->getAll($sql);
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$img = $_GET['img_del'];
	$page = "admin.php?do=banks&act=edit&id=$id";
	
	$sql = "select * from banks where id=$id";
	$result = $db->getRow($sql);
	
	if (file_exists($result["$img"]))
	{
		unlink($result["$img"]);
		$arr["$img"] = "";
		vaUpdate('banks',$arr,' id='.$id);
	}
		
	page_transfer2($page);
}
?>