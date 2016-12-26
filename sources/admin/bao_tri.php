<?
switch($act){	
	case "editsm":
	Editsm();
	break;
	
	default:
	Detail();
	$tpl="edit";
}

function Detail()
{
	global $db, $bao_tri,$bat_dau,$ket_thuc;	
	$sql = "select * from bao_tri order by id desc limit 0,1";
	$bao_tri = $db->getRow($sql);

	$bat_dau = getdate(strtotime($bao_tri['bat_dau']));
	$ket_thuc = getdate(strtotime($bao_tri['ket_thuc']));
}

function Editsm()
{
	global $db,$act;
	$bat_dau = $_POST["bat_dau"];
	$ket_thuc = $_POST["ket_thuc"];
	$msg = "Ngày kết thúc phải lớn hơn ngày bắt đầu";
	
	$arr['bao_tri']=isset($_POST["bao_tri"])?$_POST["bao_tri"]=="1"?"1":"0":"0";
	$arr['bat_dau'] = $bat_dau . " " . $_POST['gio_bat_dau'] . ":" . $_POST['phut_bat_dau'] . ":" . "00";
	$arr['ket_thuc'] = $ket_thuc . " "  . $_POST['gio_ket_thuc'] . ":" . $_POST['phut_ket_thuc'] . ":" . "00";
	
	$bat_dau = strtotime($bat_dau);
	$ket_thuc = strtotime($ket_thuc);
	
	if($bat_dau < $ket_thuc)
	{
		$id=$_POST['id'];		
		vaUpdate('bao_tri',$arr,' id='.$id);	
		$msg="Edit successfully";
		$_SESSION['mess'] = $msg;
	}
	else
		$_SESSION['error'] = $msg;
	$page="admin.php?do=bao_tri";
	
	page_transfer2($page);
}
?>