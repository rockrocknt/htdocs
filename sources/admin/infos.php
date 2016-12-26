<?
include("ckeditor_config.php");
switch($act){
	case "editsm":
		Editsm();
		break;
		
	case "delete_img":
		Delete_img();
		break;
	
	default:
		Edit();
		$title_page = "CMS - Cấu hình website";
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
	
	// cau hinh email
	$arr['mail_contact'] = SafeFormValue('mail_contact');
	$arr['mail_list'] = SafeFormValue('mail_list');

	$arr['mail_user'] = SafeFormValue('mail_user');
	$arr['mail_pass'] = SafeFormValue('mail_pass');
	$arr['mail_host'] = SafeFormValue('mail_host');
	$arr['mail_name'] = SafeFormValue('mail_name');
	$arr['mail_footer_vn']= isset($_POST["mail_footer_vn"])?$_POST["mail_footer_vn"]:'';
	$arr['mail_footer_en']= isset($_POST["mail_footer_en"])?$_POST["mail_footer_en"]:'';

    $arr['order_footer_vn']= isset($_POST["order_footer_vn"])?$_POST["order_footer_vn"]:'';
    $arr['topbar_vn'] =isset($_POST["topbar_vn"])?$_POST["topbar_vn"]:'';
    $arr['lienhechitietsanpham_vn']= isset($_POST["lienhechitietsanpham_vn"])?$_POST["lienhechitietsanpham_vn"]:'';
	// cau hinh phan trang
	$arr['paging_product'] = $_POST['paging_product']>0?$_POST['paging_product']:10;
    $arr['paging_product_mobile'] = $_POST['paging_product_mobile']>0?$_POST['paging_product_mobile']:5;
	$arr['paging_article'] = $_POST['paging_article']>0?$_POST['paging_article']:10;
	$arr['paging_submenu'] = $_POST['paging_submenu']>0?$_POST['paging_submenu']:10;
    /*
	$arr['paging_album'] = $_POST['paging_album']>0?$_POST['paging_album']:10;
	$arr['paging_video'] = $_POST['paging_video']>0?$_POST['paging_video']:10;
    */
	$arr['paging_comment'] = $_POST['paging_comment']>0?$_POST['paging_comment']:5;
	$arr['num_relate_product'] = $_POST['num_relate_product']>0?$_POST['num_relate_product']:10;
	$arr['num_relate_article'] = $_POST['num_relate_article']>0?$_POST['num_relate_article']:10;
	
	// cau hinh khac
	$arr['googlemap']= isset($_POST["googlemap"])?$_POST["googlemap"]:'';
	$arr['404page']= isset($_POST["404page"])?$_POST["404page"]:'';
	$arr['googleplus'] = isset($_POST['googleplus'])?$_POST['googleplus']:'';
	$arr['copyright_vn'] = isset($_POST["copyright_vn"])?$_POST["copyright_vn"]:'';
	$arr['copyright_en'] = isset($_POST["copyright_en"])?$_POST["copyright_en"]:'';
	$ga = isset($_POST["google_analytics"])?$_POST["google_analytics"]:'';
    $arr['google_analytics'] = $ga;
	$arr['noindex'] = isset($_POST['noindex'])?1:0;
	$arr['checkcomment'] = isset($_POST['checkcomment'])?1:0;
	$arr['showlanguage'] = isset($_POST['showlanguage'])?1:0;
	$arr['showcomment'] = isset($_POST['showcomment'])?1:0;
	$arr['showoptin'] = isset($_POST['showoptin'])?1:0;
	$arr['showcart'] = isset($_POST['showcart'])?1:0;
	$arr['showslider'] = isset($_POST['showslider'])?1:0;


    $arr['motanganchung_vn'] = $_POST['motanganchung_vn'];
    $arr['email_order_vn'] = $_POST['email_order_vn'];
	// bao tri
	$bat_dau = reverseDate($_POST["bat_dau"]);
	$ket_thuc = reverseDate($_POST["ket_thuc"]);
	$start = strtotime($bat_dau);
	$stop = strtotime($ket_thuc);
	$page="admin.php?do=infos";

	if ($stop > $start)
	{
		$arr['bao_tri']=isset($_POST["bao_tri"])?1:0;
		$arr['bat_dau'] = $bat_dau." ".$_POST['gio_bat_dau'];
		$arr['ket_thuc'] = $ket_thuc." ".$_POST['gio_ket_thuc'];
	}
	// logo
	$arr['logoname_vn'] = SafeFormValue('logoname_vn');
	$arr['logoname_en'] = SafeFormValue('logoname_en');
	if(isset($_FILES['logo']['name']) && $_FILES['logo']['size']>0){
		$sqlstmt="select logo from `infos` where id=$id";
		$r = $db->getRow($sqlstmt);
		if(file_exists($r['logo'])) unlink($r['logo']);
		
		$img = $_FILES['logo']['name'];
		$start = strpos(strrev($img), ".");	// lay dau . sau cung
		$type = substr($img, strlen($img)-($start+1), $start+1);
		if (!checkUploadImages($type))
		{
			$_SESSION['error'] = "Ảnh không đúng định dạng!";
		}
		else
		{
			$filename = 'logo'.$type;
			$filename = strtolower($filename);
			
			copy($_FILES['logo']['tmp_name'], "./upload/images/" . $filename);
			$arr['logo'] = "upload/images/" . $filename;
		}
	}
	// favicon
	if(isset($_FILES['favicon']['name']) && $_FILES['favicon']['size']>0){
		$sqlstmt="select favicon from `infos` where id=$id";
		$r = $db->getRow($sqlstmt);
		if(file_exists($r['favicon'])) unlink($r['favicon']);

		$img = $_FILES['favicon']['name'];
		$start = strpos(strrev($img), ".");	// lay dau . sau cung
		$type = substr($img, strlen($img)-($start+1), $start+1);
		if (!checkUploadImages($type))
		{
			$_SESSION['error'] = "Ảnh không đúng định dạng!";
		}
		else
		{
			$filename = 'favicon'.$type;
			$filename = strtolower($filename);
			
			copy($_FILES['favicon']['tmp_name'], "./upload/images/" . $filename);
			$arr['favicon'] = "upload/images/" . $filename;	
		}
	}
	// file webmaster tool
	if(isset($_FILES['webmaster']['name']) && $_FILES['webmaster']['size']>0){
		$sqlstmt="select webmaster from `infos` where id=$id";
		$r = $db->getRow($sqlstmt);
		if(file_exists($r['webmaster'])) unlink($r['webmaster']);

		$filename = $_FILES['webmaster']['name'];
		$start = strpos(strrev($filename), ".");	// lay dau . sau cung
		$type = substr($filename, strlen($filename)-($start+1), $start+1);
		if ($type != '.html')
		{
			$_SESSION['error'] = "File Webmaster tools không đúng định dạng!";
		}
		else
		{
			copy($_FILES['webmaster']['tmp_name'], $filename);
			$arr['webmaster'] = $filename;		
		}
	}
	// file sitemap.xml
	if(isset($_FILES['sitemap']['name']) && $_FILES['sitemap']['size']>0){
		$sqlstmt="select sitemap from `infos` where id=$id";
		$r = $db->getRow($sqlstmt);
		if(file_exists($r['sitemap'])) unlink($r['sitemap']);

		$filename = $_FILES['sitemap']['name'];
		$start = strpos(strrev($filename), ".");	// lay dau . sau cung
		$type = substr($filename, strlen($filename)-($start+1), $start+1);
		if ($type != '.xml')
		{
			$_SESSION['error'] = "File Sitemap không đúng định dạng!";
		}
		else
		{
			$filename = 'sitemap'.$type;
			copy($_FILES['sitemap']['tmp_name'], $filename);
			$arr['sitemap'] = $filename;		
		}
	}
	// file robots.txt
	if(isset($_FILES['robot']['name']) && $_FILES['robot']['size']>0){
		$sqlstmt="select robot from `infos` where id=$id";
		$r = $db->getRow($sqlstmt);
		if(file_exists($r['robot'])) unlink($r['robot']);

		$filename = $_FILES['robot']['name'];
		$start = strpos(strrev($filename), ".");	// lay dau . sau cung
		$type = substr($filename, strlen($filename)-($start+1), $start+1);
		if ($type != '.txt')
		{
			$_SESSION['error'] = "File Robots không đúng định dạng!";
		}
		else
		{
			$filename = 'Robots'.$type;
			copy($_FILES['robot']['tmp_name'], $filename);
			$arr['robot'] = $filename;		
		}
	}

	vaUpdate('infos', $arr, ' id='.$id,0);
	$_SESSION['mess'] = "Cập nhật thành công!";
	//insertLog('Chỉnh sửa cấu hình website');
	page_transfer2($page);
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$img = $_GET['img_del'];
	$page = "admin.php?do=infos";
	
	$sql = "select * from infos where id=$id";
	$result = $db->getRow($sql);
	
	if (file_exists($result["$img"]))
	{
		unlink($result["$img"]);
		$arr["$img"] = "";
		vaUpdate('infos',$arr,' id='.$id);
	}
		
	page_transfer2($page);
}
?>