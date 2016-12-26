<?
switch($act){
	case "edit":	
		Edit();
		$tpl="edit";
		break;
	
	case "add":	
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
	
	default:
		ShowList();
		$title_page = "CMS - Hỗ trợ trực tuyến";
		$tpl="list";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	
	$sql="select * from nicks order by num asc, id asc ";
		
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $nick;
	$id=$_GET['id'];
	$sql = "select * from nicks where id=$id";
	$nick = $db->getRow($sql);
}

function Delete($id)
{
	global $db;
	
	$sql = "select name_vn, nick from nicks where id=$id";
	$r = $db->getRow($sql);
		
	$sql = "delete from nicks  where id=".$id;
	$db->query($sql);
	insertLog('Xóa nick hỗ trợ: '.$r['name_vn']);
}

function Del()
{
	$id = $_GET["id"];
	Delete($id);
		
	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=nicks".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'').(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];		
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=nicks".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'').(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update nicks set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=nicks". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update nicks set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}
	
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=nicks". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	
	$status = $_GET['current']==1?0:1;
	$sql="update nicks set $field='$status' where id=$id";
	$db->query($sql);	
	
	$msg="Sửa thành công!";	
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=nicks".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Order()
{
	global $db;
	$id=$_POST["id"];	
	$ordering=$_POST["ordering"];		
	for($i=0;$i<count($id);$i++){
		$sql="update nicks set num=".$ordering[$i]." where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sắp xếp thành công!";	
	$page="admin.php?do=nicks".(isset($_GET['cid'])?'&cid='.$_GET['cid']:''). (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Editsm()
{
	global $db,$act;	

	$arr['name_vn']= SafeFormValue('name_vn');
	$arr['name_en']= SafeFormValue('name_en');
	$arr['yahoo']= SafeFormValue('yahoo');
	$arr['skype']= SafeFormValue('skype');
	$arr['active']=$_POST["active"];
	$arr['phone']= SafeFormValue('phone');
	$arr['num']=$_POST["num"];
	
	if ($act=="addsm")
	{	
		vaInsert('nicks',$arr);
		$msg="Thêm thành công!";
		insertLog('Thêm nick hỗ trợ: '.$arr['name_vn']);	
	}
	else
	{
		$id=$_POST['id'];		
		vaUpdate('nicks',$arr,' id='.$id);	
		$msg="Chỉnh sửa thành công!";
		insertLog('Sửa nick hỗ trợ: '.$arr['name_vn']);	
	}

	$_SESSION['mess'] = $msg;
	$page="admin.php?do=nicks".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'').(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
?>