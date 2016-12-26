<?php
switch($act){
	case "add":
		include("ckeditor_config.php");
		$title_page = "CMS - Thêm tin tức";
		$tpl="edit";
		break;

	case "del":
		Del();
		break;

	case "dellist":
		DelList();
		break;
		
	case "edit":
		include("ckeditor_config.php");
		Edit();
		$title_page = "CMS - Chỉnh sửa tin tức";
		$tpl="edit";
		break;

	case "addsm":
	case "editsm":
		Editsm();
		break;
	
	case "order":
		Order();
		break;

	case "show":
		setActive('active');
		break;

	case "hide":
		inActive('active');
		break;
	
	case "change_active":
		changeStatus('active');
		break;
	
	case "delete_img":
		Delete_img();
		break;
	
	case "search":	
		$title_page = "CMS - Tìm kiếm tin tức";
		search();
		if (!cmsFunction::isNewsManager())
			$tpl="list_cms";
		else
			$tpl="list";
		break;
	
	case "filter":
		Filter();
		$tpl = "list";
		break;

	case "export":
		export();
		break;

	default:
		ShowList();
		$title_page = "CMS - Tin tức";
		if (!cmsFunction::isNewsManager())
			$tpl="list_cms";
		else
			$tpl="list";
}

function Delete($id)
{
	global $db;

	$sqlstmt="select img, name_vn from `articles` where id=$id";
	$r = $db->getRow($sqlstmt);

	if(file_exists($r["img"])) unlink($r["img"]);

	$sql="delete from articles where id=".$id;
	$db->query($sql);
	$sql="delete from tags_art where idart=".$id." and post_in='articles'";
	$db->query($sql);
	insertLog('Xóa tin tức: '.$r['name_vn']);
}

function Del()
{
	$id=$_GET["id"];
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=articles". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=articles".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'').(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Edit()
{
	global $db, $article, $tags;

	$id=$_GET["id"];
	$sql = "select * from articles where id=$id";
	$article = $db->getRow($sql);
	
	$sql = "select tags.* from tags, tags_art where active=1 and idart=$id and post_in='articles' and tags.idtag=tags_art.idtag";
	$tags = $db->getAll($sql);
}

function Editsm()
{
	global $db, $act;
	
	$arr['active_future'] = isset($_POST["active_future"])?1:0;		
	if ($arr['active_future'])
	{
		$arr['publish_date'] = reverseDate($_POST["publish_date"]) . " " . $_POST['publish_time'];
		updateFlag($arr['publish_date']);
	}
	else
	{
		if ($act == "addsm")
		{
			$now = getdate();
			$arr['publish_date'] = $now["year"]."-".$now["mon"]."-".$now["mday"]." ".$now["hours"]."-".$now["minutes"]."-".$now["seconds"];
		}
	}
    if (isset($_POST["link_youtube"]))
    {
    //    $arr['link_youtube']= $_POST["link_youtube"];
    }
	$arr['name_vn']= SafeFormValue('name_vn');
	$arr['short_vn']= SafeFormValue('short_vn');
	$arr['content_vn']= isset($_POST["content_vn"])?$_POST["content_vn"]:'';
	
	$arr['name_en']= SafeFormValue('name_en');
	$arr['short_en']= SafeFormValue('short_en');
	$arr['content_en']= isset($_POST["content_en"])?$_POST["content_en"]:'';
	
	$cid = $arr['cid'] = $_POST["cat"];


    $arr['cidlist']  = trim($_POST["cidlist"]);
    $arr['productlist'] = trim($_POST["productlist"]);
    $arr['productcidlist'] = trim($_POST["productcidlist"]);



	$arr['active'] = isset($_POST["active"])?1:0;
	$arr['hot'] = isset($_POST["hot"])?1:0;
	$arr['not_in_widget'] = isset($_POST["not_in_widget"])?1:0;
	$arr['num']=isset($_POST["num"])?$_POST["num"]:0;
	
	$arr['is_noindex'] = isset($_POST["is_noindex"])?1:0;
	$arr['is_lock'] = isset($_POST["is_lock"])?1:0;

	if ($act=="addsm")
	{
		$arr['admin_id'] = $_SESSION['admin_id'];
		$arr['admin_name'] = $_SESSION["admin_username"];
	}

	$arr['title_vn']=SafeFormValue('title_vn');
	$arr['title_en']=SafeFormValue('title_en');
	$arr['keyword_vn']= SafeFormValue('keyword_vn');
	$arr['keyword_en']= SafeFormValue('keyword_en');
	$arr['des_vn']= SafeFormValue('des_vn');
	$arr['des_en']= SafeFormValue('des_en');
	$arr['des_vn_char']= SafeFormValue('des_vn_char');	
	$arr['des_en_char']= SafeFormValue('des_en_char');

	$name_tags = SafeFormValue('tags');
	$unique_key_tags = cmsFunction::createTag($name_tags);
	$page="admin.php?do=articles". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    $folderRoot = createDateTimeFolder("upload/images/");
	if(isset($_FILES["img"]['name'] ) && $_FILES["img"]['size']>0){		
		//them hinh moi
		$img = $_FILES["img"]['name'];
		$start = strpos(strrev($img), ".");	// lay dau . sau cung
		$type = substr($img, strlen($img)-($start+1), $start+1);
		if (!checkUploadImages($type))
		{
			$_SESSION['error'] = "Ảnh tin tức không đúng định dạng!";
		}
		else
		{
			$filename = SafeFormValue('unique_key_vn');
			if ($act == "editsm") {
				//kiem tra va xoa hinh cu
				$id=$_POST['id'];
				$sqlstmt="select img from articles where id=$id";
				$r = $db->getRow($sqlstmt);
				if(file_exists($r["img"])) unlink($r["img"]);
			}
			
			if(file_exists( $folderRoot . $filename . $type)){
				$filename = $filename . '-' . time() . $type;
			}
			else
			{
				$filename = $filename . $type;
			}
			
			copy($_FILES["img"]['tmp_name'], $folderRoot . $filename) ;
			$arr["img"] = $folderRoot . $filename;
		}
	}
	
	if ($act=="addsm")
	{
		$id = vaInsert('articles', $arr);
		$arr['unique_key_vn']= cmsFunction::insertUniquekey("articles", SafeFormValue("unique_key_vn"), 'vn', $id, $cid);
		$arr['unique_key_en']= cmsFunction::insertUniquekey("articles", SafeFormValue("unique_key_en"), 'en', $id, $cid);
		vaUpdate('articles', $arr, ' id='.$id);
		cmsFunction::insertTag($id, 'articles', $name_tags, $unique_key_tags);
		insertLog('Thêm tin tức: '.$_POST["name_vn"]);
		$msg="Thêm thành công!";
	}
	else
	{
		$id=$_POST['id'];
		$arr['unique_key_vn']= cmsFunction::updateUniquekey("articles", SafeFormValue("unique_key_vn"), 'vn', $id, $cid);
		$arr['unique_key_en']= cmsFunction::updateUniquekey("articles", SafeFormValue("unique_key_en"), 'en', $id, $cid);
		cmsFunction::updateTag($id, 'articles', $name_tags, $unique_key_tags);
		vaUpdate('articles', $arr, ' id='.$id,0);
		insertLog('Sửa tin tức: '.$_POST["name_vn"]);
		$msg="Sửa thành công!";
	}

	$_SESSION['mess'] = $msg;
	page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	
	$status = $_GET['current']==1?0:1;
	$sql="update articles set $field='$status' where id=$id";
	$db->query($sql);	

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=articles".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update articles set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=articles". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update articles set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công";
	$page="admin.php?do=articles". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Filter()
{
	global $db, $stips, $page, $plpage, $set_per_page, $c, $adminList;
	$set_per_page=20;
	$adId = SafeQueryString('adId');
	$sql = "select a.*, admin.username from articles a, admin where admin_id=".$adId." and admin.id=".$adId." order by num asc, id desc";
	$_SESSION['fullArticle'] = $db->getAll($sql);
	
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);
	$stips = $db->getAll($sqlstmt);
	
	$sql = "select * from admin order by id desc";
	$adminList = $db->getAll($sql);
}

function search()
{
	global $db,$articles,$page,$plpage,$set_per_page,$c,$stips, $adminList;
	$set_per_page=20; 
	$kw = SafeQueryString('kw');
	if ($kw == 'Nhập tin tức cần tìm...')
	{
		$page="admin.php?do=articles";
			page_transfer2($page);
		}
	if ($kw == '')
	{
		$kw = SafeFormValue('kw');
	
		if ($kw != '')
		{
			$page2="admin.php?do=articles&act=search&kw=".$kw;
			page_transfer2($page2);
		}else
		{
			$page="admin.php?do=articles";
			page_transfer2($page);
		}
	}

	$key = $kw;
	$sql="select * from articles where (name_vn like '%".$key."%' or name_en like '%".$key."%' or content_vn like '%".$key."%' or content_en like '%".$key."%') order by num asc, id desc ";

	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);

	$sql = "select * from admin order by id desc";
	$adminList = $db->getAll($sql);
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c, $adminList;
	$set_per_page=80;
		
	if(isset($_GET['cid']) && $_GET['cid']!=1)
	//	$sql="select * from articles where cid=".$_GET['cid']." order by num asc, publish_date desc";
    $sql="select * from articles where cid=".$_GET['cid']." order by publish_date desc";
	else
		$sql="select * from articles order by id desc";

	$_SESSION['fullArticle'] = $db->getAll($sql);
		
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);
	$stips = $db->getAll($sqlstmt);
	
	$sql = "select * from admin order by id desc";
	$adminList = $db->getAll($sql);
}

function Order()
{
	global $db;
	$id=$_POST["id"];
	$ordering=$_POST["ordering"];
	for($i=0;$i<count($id);$i++){
		$sql="update articles set num=".$ordering[$i]." where id=".$id[$i];
		$db->query($sql);
	}

	$_SESSION['mess'] = "Sắp xếp thành công!";
	$page="admin.php?do=articles". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function updateFlag($date)
{
	global $db;
	$today = date("Y-m-d h:i:s");

	if(SoSanhDate($date, $today)==1)
	{
		$sql = "update flags set `value`=1";
		$db->query($sql);
	}
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$img = $_GET['img_del'];
	$page = "admin.php?do=articles&act=edit&id=$id". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	
	$sql = "select * from articles where id=$id";
	$result = $db->getRow($sql);
	
	if (file_exists($result["$img"]))
	{
		unlink($result["$img"]);
		$arr["$img"] = "";
		vaUpdate('articles',$arr,' id='.$id);
	}
		
	page_transfer2($page);
}

function export(){
	$items = "";
	
	if (isset($_SESSION['fullArticle'])) {
		$items = $_SESSION['fullArticle'];
	}
	
	if(!empty($items)){
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=Danh-sach-bai-viet.xls");
		header('Cache-Control: max-age=0');
		
		require_once 'class/Excel/PHPExcel.php';
		require_once 'class/Excel/PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		
		$objPHPExcel->getProperties()->setCreator("IM Group")
						 ->setLastModifiedBy("IM Group")
						 ->setTitle("Danh sách tin tức")
						 ->setSubject("Danh sách tin tức")
						 ->setDescription("Danh sách tin tức")
						 ->setKeywords("Danh sách tin tức")
						 ->setCategory("Danh sách tin tức");	
									 
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'STT')
					->setCellValue('B1', 'Tên tin tức')
					->setCellValue('C1', 'Người viết')
					->setCellValue('D1', 'Ngày (yyyy/mm/dd)')
					->setCellValue('E1', 'Từ khoá');
			
		foreach($items as $key => $item){
			
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . ($key+2), $key+1)
					->setCellValue('B' . ($key+2), $item["name_vn"])
					->setCellValue('C' . ($key+2), $item["username"])
					->setCellValue('D' . ($key+2), $item["dated"])
					->setCellValue('E' . ($key+2), $item["keyword_vn"]);
		}
			
		$objPHPExcel->getActiveSheet()->setTitle('Tin tức');
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		
		$objWriter->save('php://output');
	}
}
?>