<?
switch($act){
	case "edit":	
		Edit();
		$title_page = "CMS - Chỉnh sửa quản trị viên";
		$tpl="edit";
		break;
	
	case "add":	
		Add();
		$title_page = "CMS - Thêm quản trị viên";
		$tpl="edit";
		break;
	
	case "del":
		Del();
		break;
	
	case "dellist":
		DelList();
		break;
	
	case "addsm":
	case "editsm":
		Editsm();
		break;
	
	default:
		ShowList();
		$title_page = "CMS - Danh sách quản trị viên";
		$tpl="list";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	$sql="select * from `admin` order by `group` asc, username asc ";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
	
	Add();
}

function Edit()
{
	global $db, $user;
	$id=$_GET["id"];
	$sql = "select * from admin where id=$id";
	$user = $db->getRow($sql);
	
	Add();
}

function Add()
{
	global $db, $adminGroups;
	
	$sql = "select * from admin_groups where active=1 order by id asc";
	$adminGroups = $db->getAll($sql);
}

function Delete($id)
{
	global $db;

	$sql = "select username from admin where id=".$id;
	$r = $db->getRow($sql);
	
	$sql="delete from admin where id=".$id;
	$db->query($sql);
	insertLog('Xóa quản trị viên: '.$r['username']);
}

function Del()
{
	$id=$_GET["id"];
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=users";
	page_transfer2($page);
}

function DelList()
{
	$id=$_POST["iddel"];		
	for($i=0;$i<count($id);$i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=users";
	page_transfer2($page);
}

function Editsm()
{
	global $db,$act;
	$msg = "";
	$arr['username'] = SafeFormValue('username');
	if(isset($_POST["password"]) && $_POST["password"] != '')
		$arr['password']=md5(SafeFormValue('password'));
	$arr['email'] = SafeFormValue('email');
	$arr['group'] = $_POST["group"];	

	if ($act=="addsm")
	{
		$sql = "select username from admin where username = '" . $arr['username'] . "'";
		$c = $db->numRows($db->query($sql));
		if($c >= 1)
		{
			$_SESSION['error'] = "Tên này đã có người dùng!";
			page_transfer2("admin.php?do=users");
		}
		else
		{
			vaInsert('admin',$arr);
			$msg = "Thêm thành công!";
			insertLog('Thêm quản trị viên: '.$arr['username']);
		}
	}
	else
	{
		$id=$_POST['id'];	
		vaUpdate('admin',$arr,' id='.$id);	
		$msg="Sửa thành công!";
		insertLog('Sửa quản trị viên: '.$arr['username']);	
	}	
	
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=users";
	page_transfer2($page);
}
?>