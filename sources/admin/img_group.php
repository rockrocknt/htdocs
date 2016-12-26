<?
switch($act){	
	case "detail";
		Detail();
		$title_page = "CMS - Chi tiết nhóm";
		$tpl = "detail";
		break;		
			
	case "order":
		Order();
		break;
	
	default:
		ShowList();
		$title_page = "CMS - Danh sách nhóm hình ảnh";
		$tpl="list";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20;

	$sql="select * from img_group where active=1 order by num asc, id asc";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Order()
{
	global $db;
	$id=$_POST["id"];	
	$ordering=$_POST["ordering"];		
	for($i=0;$i<count($id);$i++){
		$sql="update img_group set num=".$ordering[$i]." where id=".$id[$i];
		$db->query($sql);		
	}
	
	$page="admin.php?do=img_group".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	$_SESSION['mess'] = "Sắp xếp thành công!";
	page_transfer2($page);
}

function Detail()
{
	global $db, $stips, $c, $page, $plpage, $set_per_page;

	$set_per_page=20;
	$id = $_GET['cid'];
	$sql = "select * from img where cid=$id order by num asc, id desc";

	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}
?>