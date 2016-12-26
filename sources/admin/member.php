<?
switch($act){
	case "edit":	
		Edit();
		$title_page = "CMS - Chỉnh sửa thành viên";
		$tpl="edit";
		break;
	
	case "add":	
		$title_page = "CMS - Thêm thành viên";
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
		
	case "export":
		export();
		break;
	
	default:
		ShowList();
		$title_page = "CMS - Danh sách thành viên";
		$tpl="list";
}

function ShowList()
{
	global $db,$members,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	$sql="select * from `member` order by id desc";
	$_SESSION['ListMember'] = $db->getAll($sql);

	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$members = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $member;

	$id=$_GET["id"];
	$sql = "select * from member where id=$id";
	$member = $db->getRow($sql);
}

function Delete($id)
{
	global $db;
	
	$sql = "select email, name from member where id=".$id;
	$r = $db->getRow($sql);
	
	$sql = "delete from member where id=".$id;
	$db->query($sql);
	insertLog('Xóa thành viên: '.$r['name'].', email đăng nhập: '.$r['email']);
}

function Del()
{
	$id = $_GET["id"];
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=member".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];		
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=member".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Editsm()
{
	global $db,$act;

	$arr['name'] = SafeFormValue('name_vn');
	$arr['email'] = SafeFormValue('email');
	$arr['password'] = md5(SafeFormValue('password'));
	$arr['address'] = SafeFormValue('address');
	$arr['phone'] = SafeFormValue('phone');
	$arr['group'] = 3;

	if ($act=="addsm")
	{
		$sql = "select email from member where email='".$arr['email']."'";
		$c = $db->numRows($db->query($sql));
		if($c >= 1)
		{
			$_SESSION['error'] = "Email này đã có người đăng ký!";
			page_transfer2("admin.php?do=member");
		}
		else
		{
			vaInsert('member',$arr);
			$msg = "Thêm thành công!";
			insertLog('Thêm thành viên: '.$arr['name'].', email đăng nhập: '.$arr['email']);
		}
	}
	else
	{
		$id=$_POST['id'];	
		vaUpdate('member',$arr,' id='.$id);	
		$msg="Sửa thành công!";		
	}	
	
	$_SESSION['mess'] = $msg;
	$page = "admin.php?do=member".(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function export(){
	$items = "";
	
	if (isset($_SESSION['ListMember'])) {
		$items = $_SESSION['ListMember'];
	}
	
	if(!empty($items)){
		header("Content-type: application/vnd.ms-excel");
		header("Content-Disposition: attachment; filename=Danh-sach-thanh-vien.xls");
		header('Cache-Control: max-age=0');
		
		require_once 'class/Excel/PHPExcel.php';
		require_once 'class/Excel/PHPExcel/IOFactory.php';
		$objPHPExcel = new PHPExcel();
		
		$objPHPExcel->getProperties()->setCreator("IM Group")
						 ->setLastModifiedBy("IM Group")
						 ->setTitle("Danh sách thành viên")
						 ->setSubject("Danh sách thành viên")
						 ->setDescription("Danh sách thành viên")
						 ->setKeywords("Danh sách thành viên")
						 ->setCategory("Danh sách thành viên");	
									 
		$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A1', 'STT')
					->setCellValue('B1', 'ID')
					->setCellValue('C1', 'Tên')
					->setCellValue('D1', 'Địa chỉ')
					->setCellValue('E1', 'Điện thoại')
					->setCellValue('F1', 'Email')
					->setCellValue('G1', 'Ngày đăng ký');
			
		foreach($items as $key => $item){
			
			$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A' . ($key+2), $key+1)
					->setCellValue('B' . ($key+2), $item["id"])
					->setCellValue('C' . ($key+2), $item["name"])
					->setCellValue('D' . ($key+2), $item["address"])
					->setCellValue('E' . ($key+2), $item["phone"])
					->setCellValue('F' . ($key+2), $item["email"])
					->setCellValue('G' . ($key+2), $item["insert_date"]);
		}
			
		$objPHPExcel->getActiveSheet()->setTitle('Thành viên');
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
		
		$objWriter->save('php://output');
	}
}
?>