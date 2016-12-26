<?php
switch ($act) {
	case "editsm":
		editsm();								
		break;
								
	default :
		 show_profile();
		 $tpl="edit";		
	}
	
function show_profile()
{
	global $db, $profile, $adgroup;
	$name = $_SESSION["admin_username"];
	
	$sqlstmt = "select * from admin where username='$name'";
	$profile = $db->getRow($sqlstmt);
	
	$sql = "select * from admin_groups where id=".$profile['group'];
	$adgroup = $db->getRow($sql);
}

function editsm()
{
	global $db;

	$id = $_POST['id'];
	$arr['email'] = $_POST["email"];
	
	if ($_POST['password'])
		$arr['password'] = md5(SafeFormValue('password'));
	
	vaUpdate('admin', $arr, 'id='.$id);
	$_SESSION['mess'] = "Chỉnh sửa thông tin thành công!";
	$page = "admin.php?do=profile";
	page_transfer2($page);
}
?>