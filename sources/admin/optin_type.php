<?
include("ckeditor_config.php");
switch($act){
	case "edit":	
		Edit();
		$title_page = "CMS - Chỉnh sửa chương trình optin";
		$tpl="edit";
		break;
	
	case "add":	
		$title_page = "CMS - Thêm loại chương trình optin";
		$tpl="edit";
		break;
	
	case "del":
		Del();
		break;
	
	case "dellist":
		DelList();
		break;
	
	case "change_active":
		changeStatus('otn_type_active');
		break;
	
	case "addsm":
	case "editsm":
		Editsm();
		break;

	case "delete_img":
		Delete_img();
		break;

	default:
		ShowList();
		$title_page = "CMS - Danh sách chương trình optin";
		$tpl="list";
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	
	$status = $_GET['current']==1?0:1;
	$sql="update optin_type set $field='$status' where id=$id";
	$db->query($sql);	

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=optin_type".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	$sql="select * from `optin_type` order by otn_type_insert_date desc";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $optintype;
	$id=$_GET["id"];
	$sql = "select * from optin_type where id = $id";
	$optintype = $db->getRow($sql);
}

function Delete($id)
{
	global $db;

	$sql = "select otn_type_image, otn_type_file, otn_type_name from optin_type where id=".$id;
	$r = $db->getRow($sql);
	
	if (file_exists($r['otn_type_image'])) unlink($r['otn_type_image']);
	if (file_exists($r['otn_type_file'])) unlink($r['otn_type_file']);
	
	$sql = "delete from optin_type where id=".$id;
	$db->query($sql);
	insertLog('Xóa chương trình optin: '.$r['otn_type_name']);	
}

function Del()
{
	$id = $_GET["id"];
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=optin_type";
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];		
	for($i=0; $i<count($id); $i++)
		Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=optin_type";
	page_transfer2($page);
}

function Editsm()
{
	global $db,$act;

	$arr['otn_type_name_vn'] = SafeFormValue('name_vn');
	$arr['otn_type_name_en'] = SafeFormValue('name_en');
	$arr['otn_type_content_vn'] = isset($_POST["otn_type_content_vn"])?$_POST["otn_type_content_vn"]:'';
	$arr['otn_type_content_en'] = isset($_POST["otn_type_content_en"])?$_POST["otn_type_content_en"]:'';
	$arr['alert_vn'] = isset($_POST["alert_vn"])?$_POST["alert_vn"]:'';
	$arr['alert_en'] = isset($_POST["alert_en"])?$_POST["alert_en"]:'';
	$arr['email_subject_vn'] = SafeFormValue('email_subject_vn');
	$arr['email_subject_en'] = SafeFormValue('email_subject_en');
	$arr['email_template_vn'] = isset($_POST["email_template_vn"])?$_POST["email_template_vn"]:'';
	$arr['email_template_en'] = isset($_POST["email_template_en"])?$_POST["email_template_en"]:'';
	$arr['otn_type_active']= isset($_POST['active'])?'1':'0';
	$page="admin.php?do=optin_type";
	
	if(isset($_FILES["img"]['name'] ) && $_FILES["img"]['size']>0){
		//them hinh moi		
		$img = $_FILES["img"]['name'];
		$start = strpos(strrev($img), ".");
		$type = substr($img, strlen($img)-($start+1), $start+1);
		if (!checkUploadImages($type))
		{
			$_SESSION['error'] = "Ảnh chương trình không đúng định dạng!";
		}
		else
		{
			$filename = cmsFunction::createImgName($arr["otn_type_name"]);		
			if ($act == 'editsm') {
				//kiem tra va xoa hinh cu
				$id=$_POST['id'];
				$sqlstmt="select otn_type_image from `optin_type` where id=$id";
				$r = $db->getRow($sqlstmt);
				if(file_exists($r['otn_type_image'])) unlink($r['otn_type_image']);
			}
			
			if(file_exists( "./upload/images/" . $filename . $type)){
				$filename = $filename . '-' . time() . $type;
			}
			else
			{
				$filename = $filename . $type;
			}
			
			copy($_FILES["img"]['tmp_name'], "./upload/images/" . $filename);
			$arr['otn_type_image'] = "upload/images/" . $filename;
		}
	}
	
	if(isset($_FILES['optin_type_file']['name'] ) && $_FILES['optin_type_file']['size']>0){
		$img = $_FILES['optin_type_file']['name'];
		$start = strpos(strrev($img), ".");
		$type = substr($img, strlen($img)-($start+1), $start+1);
		if (!checkUploadFiles($type))
		{
			$_SESSION['error'] = "File không đúng định dạng!";
		}
		else
		{
			$filename = substr($img, 0, strlen($img)-($start+1));
			$filename = strtolower($filename);		
			if ($act == 'editsm') {
				//kiem tra va xoa hinh cu
				$id=$_POST['id'];
				$sqlstmt="select optin_type_file from `optin_type` where id=$id";
				$r = $db->getRow($sqlstmt);
				if(file_exists($r['optin_type_file'])) unlink($r['optin_type_file']);
			}
			
			if(file_exists( "./upload/files/" . $filename . $type)){
				$filename = $filename . '-' . time() . $type;
			}
			else
			{
				$filename = $filename . $type;
			}
			
			copy($_FILES['optin_type_file']['tmp_name'], "./upload/files/" . $filename);
			$arr['otn_type_file'] = "upload/files/" . $filename;
		}
	}
	
	if ($act=="addsm")
	{
		vaInsert('optin_type',$arr);
		$msg = "Thêm thành công!";
		insertLog('Thêm chương trình optin: '.$arr['otn_type_name_vn']);
	}
	else
	{
		$id=$_POST['id'];	
		vaUpdate('optin_type',$arr,' id='.$id);	
		$msg="Sửa thành công!";
		insertLog('Sửa chương trình optin: '.$arr['otn_type_name_vn']);
	}	
	
	$_SESSION['mess'] = $msg;
	page_transfer2($page);
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$img = $_GET['img_del'];
	$page = "admin.php?do=optin_type&act=edit&id=$id".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	
	$sql = "select * from optin_type where id=$id";
	$result = $db->getRow($sql);
	
	unlink($result["$img"]);
	$arr["$img"] = "";
	vaUpdate('optin_type', $arr, ' id='.$id);
		
	page_transfer2($page);
}
?>