<?
switch($act){
	case "add":	
		Add();
		$title_page = "CMS - Thêm nhóm quản trị";
		$tpl = "edit";
		break;
	
	case "del":
		Del();
		break;
	
	case "dellist":
		DelList();
		break;
		
	case "edit":	
		Edit();
		$title_page = "CMS - Chỉnh sửa nhóm";
		$tpl = "edit";
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
		$title_page = "CMS - Danh sách nhóm quản trị";
		$tpl = "list";
}

function Add()
{
	global $db, $dolist;
	
	$sql = "select * from component_cms where active=1 order by id asc";
	$dolist = $db->getAll($sql);
}

function Delete($id)
{
	global $db;

	$sql = "select * from admin_groups where id=$id";
	$r = $db->getRow($sql);
	
	if ($r['is_deleted'] == 1)
	{
		insertLog('Xóa nhóm quản trị: '.$r['name']);
		
		$sql = "delete from admin where group=$id";
		$db->query($sql);
		$sql = "delete from admin_groups_detail where admingroupid=$id";
		$db->query($sql);
		$sql = "delete from admin_groups where id=".$id;
		$db->query($sql);
	}
}

function Del()
{
	$id = $_GET["id"];
	Delete($id);	

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=admin_groups";
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];		
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=admin_groups";
	page_transfer2($page);
}

function Edit()
{
	global $db, $group, $dolist, $recentdo;

	$id = $_GET["id"];
	$sql = "select * from admin_groups where id=$id";
	$group = $db->getRow($sql);
	
	$sql = "select * from admin_groups_detail where active=1 and admingroupid=$id";
	$rights = $db->getAll($sql);
	$where = "";
	
	if ($rights[0]) {
		foreach ($rights as $i=>$right)
		{
			if ($i==0)
				$where .= "id=".$right['rightid'];
			else
				$where .= " or id=".$right['rightid'];
		}
	}
	
	$sql1 = "select * from component_cms where ($where) and active=1";
	$recentdo = $db->getAll($sql1);
	$sql2 = "select id from component_cms where ($where) and active=1";
	if ($where)
		$sql3 = "select * from component_cms where active=1 and id not in ($sql2)";
	else
		$sql3 = "select * from component_cms where active=1";
	$dolist = $db->getAll($sql3);
}

function Editsm()
{
	global $db, $act;

	$arr['name'] = SafeFormValue('name');
	$arr['active'] = isset($_POST["active"])?$_POST["active"]:'0';
	$doList = isset($_POST["doList"])?$_POST["doList"]:'';
	
	if ($act=="addsm")
	{
		$sql = "select name from admin_groups where name='".$arr['name']."'";
		$c = $db->numRows($db->query($sql));
		if($c >= 1)
		{
			$_SESSION['error'] = "Đã có nhóm quản trị này!";
			page_transfer2("admin.php?do=admin_groups");
		}
		else
		{
			$id = vaInsert('admin_groups', $arr);
			$msg = "Thêm thành công!";
			insertLog('Thêm nhóm quản trị: '.$arr['name']);
			// them danh sach phan quyen vao bang admin_groups_detail
			if ($doList)
			{
				for ($i=0; $i<count($doList); $i++)
				{
					$detail['admingroupid'] = $id;
					$detail['rightid'] = $doList[$i];
					vaInsert('admin_groups_detail', $detail);
				}
			}
		}
	}
	else
	{
		$id = $_POST['id'];	
		vaUpdate('admin_groups', $arr, ' id='.$id);	
		$msg = "Sửa thành công!";
		insertLog('Sửa nhóm quản trị: '.$arr['name']);
		// cho cac phan quyen cua admin ve 0
		$sql = "update admin_groups_detail set active=0 where admingroupid=$id";
		$db->query($sql);
		
		if ($doList)
		{
			foreach($doList as $right)
			{
				// cap nhat quyen ve 1
				$sql = "update admin_groups_detail set active=1 where active=0 and admingroupid=$id and rightid=$right";
				$db->query($sql);
				// neu ko cap nhat duoc -> chua co phan quyen nay -> them vao
				if (!$db->db_affected_rows())
				{
					$detail['admingroupid'] = $id;
					$detail['rightid'] = $right;
					vaInsert('admin_groups_detail', $detail);
				}
			}
		}
	}
	
	$_SESSION['mess'] = $msg;
	$page = "admin.php?do=admin_groups";
	page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;

	$id = $_GET["id"];
	$status = $_GET['current']==1?0:1;
	$sql = "update admin_groups set $field='$status' where id=$id";
	$db->query($sql);	

	$_SESSION['mess'] = "Sửa thành công!";
	$page = "admin.php?do=admin_groups";
	page_transfer2($page);
}

function ShowList()
{
	global $db, $stips;

	$sql = "select * from `admin_groups` order by id asc";
	$stips = $db->getAll($sql);
}
?>