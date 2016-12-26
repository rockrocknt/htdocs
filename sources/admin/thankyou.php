<?
include("ckeditor_config.php");
switch($act){
	case "editsm":
		Editsm();
		break;
	
	default:
		Edit();
		$title_page = "CMS - Cấu hình bán hàng";
		$tpl="edit";
}

function Edit()
{
	global $db, $info;
	
	$sql = "select * from infos";
	$info = $db->getRow($sql);
}

function Editsm()
{
	global $db;
	$id = $_POST['id'];
	
	$arr['thankyou_vn']= isset($_POST["thankyou_vn"])?$_POST["thankyou_vn"]:'';
	$arr['thankyou_en']= isset($_POST["thankyou_en"])?$_POST["thankyou_en"]:'';

	$arr['rate'] = isset($_POST["rate"])?str_replace(',', '', $_POST["rate"]):22000;
	$arr['percent'] = isset($_POST['percent'])?$_POST['percent']:0;

	vaUpdate('infos', $arr, ' id='.$id);
	$_SESSION['mess'] = "Cập nhật thành công!";
	insertLog('Chỉnh sửa cấu hình bán hàng');
	page_transfer2("admin.php?do=thankyou");
}
?>