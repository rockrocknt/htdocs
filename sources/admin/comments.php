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
	
	case "change_active":
		changeStatus('cmt_active');
		break;

	case "show":
		setActive('cmt_active');
		break;

	case "hide":
		inActive('cmt_active');
		break;

	case "detail":
		Detail();
		$tpl = 'detail';
		$title_page = "CMS - Chi tiết bình luận";
		break;
		
	case "viewsm":
		ViewComplete();
		break;

	default:
		ShowList();
		$tpl="list";
		$title_page = "CMS - Bình luận";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c, $products, $articles;
	$set_per_page = 20;
	$sql="select * from comments order by cmt_id desc";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);
	$stips = $db->getAll($sqlstmt);
	
	$sql="select * from products";
	$products = $db->getAll($sql);	
	
	$sql="select * from articles";
	$articles = $db->getAll($sql);
}

function Delete($id)
{
	global $db;
	
	$sql = "select cmt_avatar from comments where cmt_id=".$id;
	$r = $db->getRow($sql);
	if(file_exists($r['cmt_avatar'])) unlink($r['cmt_avatar']);

	$sql="delete from comments where cmt_id=".$id;
	$db->query($sql);
}

function Del()
{
	$id = $_GET["cmt_id"];
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=comments".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);
	
	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=comments". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	
	$status = $_GET['current']==1?0:1;
	$sql="update comments set $field='$status' where cmt_id=$id";
	$db->query($sql);	
	
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=comments".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update comments set $field=1 where cmt_id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=comments". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update comments set $field=0 where cmt_id=".$id[$i];
		$db->query($sql);		
	}
	
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=comments". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function ViewComplete()
{
	$page="admin.php?do=comments". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Detail()
{
	global $db, $comment;

	$id = SafeQueryString('id');
	$sql = "select * from comments where cmt_id=$id";
	$comment = $db->getRow($sql);
	$sql = "update comments set view=1 where cmt_id=".$id;
	$db->query($sql);
	
	if ($comment["cmt_do"] == "articles") {
		$sql = "select * from articles where id=".$comment["cmt_post_id"];
		$article = $db->getRow($sql);
		$obj = new articles($article);
	} else if ($comment["cmt_do"] == "products") {
		$sql = "select * from products where id=".$comment["cmt_post_id"];
		$product = $db->getRow($sql);
		$obj = new products($product);
	}
	$link = $obj->getLink();
	page_transfer2($link);
}
?>