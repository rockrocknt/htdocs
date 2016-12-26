<?php   include("ckeditor_config.php");

switch($act){
	case "del":
		Del();
		break;
	
	case "dellist":
		DelList();
		break;

	default:
		ShowList();
		$title_page = "CMS - Log quản trị viên";
		$tpl="list";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20;

    $sql="SELECT * FROM user_activity_log ORDER BY insert_date DESC";
		
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);
	$stips = $db->getAll($sqlstmt);
}

function Del()
{
	global $db;
	$id=$_GET["id"];

	$sql="delete from `user_activity_log` where id=".$id;
	$db->query($sql);

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=userlog". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="delete from user_activity_log where id=".$id[$i];
		$db->query($sql);
	}

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=userlog". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}