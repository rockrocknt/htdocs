<?php
include("ckeditor_config.php");
switch($act){
	case "del":
		Del();
		$tpl = 'list';
		break;

	case "dellist":
		DelList();
		break;
		
	case "detail":
		Detail();
		$tpl = 'detail';
		$title_page = "CMS - Chi tiết liên hệ";
		break;
		
	case "viewsm":
		ViewComplete();
		break;

	default:
		ShowList();
		$tpl="list";
		$title_page = "CMS - Liên hệ";
}

function ViewComplete()
{
	$page="admin.php?do=contact_logs". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page = 20;
	$sql="select * from contact_logs order by id desc";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);
	$stips = $db->getAll($sqlstmt);
}

function Delete($id)
{
	global $db;

	$sql="delete from contact_logs where id=".$id;
	$db->query($sql);
}

function Del()
{
	$id = $_GET["id"];
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=contact_logs". (isset($_GET['page'])?'&page='.$_GET['page']:'');

	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);
	
	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=contact_logs". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Detail()
{
	global $db, $contact;

	$id = SafeQueryString('id');
	$sql = "select * from contact_logs where id=$id";
	$contact = $db->getRow($sql);
	$sql = "update contact_logs set view=1 where id=".$id;
	$db->query($sql);
}
?>