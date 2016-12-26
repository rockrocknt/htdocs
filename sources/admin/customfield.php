<?
switch($act){	
	case "del":
		Del();
		break;
}

function Delete($id)
{
	global $db;
	
	$sql = "delete from customfields where id=".$id;
	$db->query($sql);
}

function Del()
{
	$id = $_GET["id"];
	Delete($id);
	
	$page = "admin.php?do=products&act=".$_GET['oldact'].(isset($_GET['proid'])?'&id='.$_GET['proid']:''). (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
?>