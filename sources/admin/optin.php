<?
switch($act){	
	case "del":
		Del();
		break;
	
	case "dellist":
		DelList();
		break;
		
	case "export":
		export();
		break;
	
	default:
		ShowList();
		$title_page = "CMS - Detail";
		$tpl="list";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	
	$sql = "update optin set view=1";
	$db->query($sql);

	if(isset($_GET['type']))
		$sql="select * from optin, optin_type where optin.otn_otn_type_id = optin_type.id and optin.otn_otn_type_id = ".$_GET['type']." order by otn_id desc";	
	else
		$sql="select * from optin, optin_type where optin.otn_otn_type_id = optin_type.id order by otn_id desc";

	$_SESSION['fullEmailOptin'] = $db->getAll($sql);

	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Delete($id)
{
	global $db;

	$sql="delete from optin where otn_id=".$id;
	$db->query($sql);	
}

function Del()
{
	$id = $_GET["id"];
	Delete($id);
		
	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=optin".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];
	
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=optin".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function export(){
	$items = "";
	
	if(isset($_SESSION['fullEmailOptin'])) {
		$items = $_SESSION['fullEmailOptin'];
	}
	
	if(!empty($items)){
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=Danh-sach-email-optin.xls");
		header('Cache-Control: max-age=0');
		
		require_once 'class/Excel/PHPExcel.php';
		require_once 'class/Excel/PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		
		$objPHPExcel->getProperties()->setCreator("IM Group")
						 ->setLastModifiedBy("IM Group")
						 ->setTitle("Danh sách email Opt-in")
						 ->setSubject("Danh sách email Opt-in")
						 ->setDescription("Danh sách email Opt-in")
						 ->setKeywords("Danh sách email Opt-in")
						 ->setCategory("Danh sách email Opt-in");	
									 
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'STT')
					->setCellValue('B1', 'Tên người Opt-in')
					->setCellValue('C1', 'Email')
					->setCellValue('D1', 'Chương trình')
					->setCellValue('E1', 'Ngày (yyyy/mm/dd)');
			
		foreach($items as $key => $item){
			
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . ($key+2), $key+1)
					->setCellValue('B' . ($key+2), $item["otn_name"])
					->setCellValue('C' . ($key+2), $item["otn_email"])
					->setCellValue('D' . ($key+2), $item["otn_type_name_vn"])
					->setCellValue('E' . ($key+2), $item["otn_insert_date"]);
		}
			
		$objPHPExcel->getActiveSheet()->setTitle('Email Optin');
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		
		$objWriter->save('php://output');
	}
}
?>