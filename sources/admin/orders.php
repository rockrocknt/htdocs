<?
switch($act){	
	case "dellist":
		DelList();
		break;
		
	case "del":
		Del();
		break;
		
	case "detail":
		Detail();
		$tpl = 'detail';
		$title_page = "CMS - Chi tiết đơn hàng";
		break;
		
	case "viewsm":
		ViewComplete();
		break;
	
	case "finish":
		Finish();
		$tpl="finish";
		$title_page = "CMS - Đơn hàng đã hoàn thành";
		break;
	
	default:
		ShowList();
		$title_page = "CMS - Đơn hàng";
		$tpl="list";
}

function Finish()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
		
	$sql="select o.* from orders o WHERE odr_status = 2 order by odr_last_update_date desc";	
		
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	
	$show = isset($_GET['show'])?$_GET['show']:'-1';
	$strStatus = ' and o.odr_status = ' . $show . ' ';
			
	if($show != '-1')
		$sql="select o.* from orders o WHERE odr_status <> 2 ".$strStatus."order by odr_id desc";
	else
		$sql="select o.* from orders o WHERE odr_status <> 2 order by odr_id desc";		

	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Delete($id) {
	global $db;

	$sql="delete from orders where odr_id=".$id;
	$db->query($sql);
	
	$sql="delete from order_detail where od_odr_id=".$id;
	$db->query($sql);
}

function Del()
{
	$id=$_GET["id"];	
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=orders".(isset($_GET['type'])&&$_GET['type']=='finish'?'&act=finish':'').(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	$id=$_POST["iddel"];		
	for($i=0;$i<count($id);$i++){
		Delete($id[$i]);
	}

	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=orders".(isset($_GET['type'])&&$_GET['type']=='finish'?'&act=finish':'').(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Detail()
{
	global $db, $order, $stips;

	$id = SafeQueryString('id');
	$sql="select * from orders where odr_id=".$id;
	$order = $db->getRow($sql);
	$sql = "update orders set odr_view=1 where odr_id=".$id;
	$db->query($sql);
	
	$sql = "select o.* ,p.name_vn, p.price, p.price_sale, p.img, p.code, od.od_pro_quantity, od.od_size from orders o, order_detail od, products p where o.odr_id=od.od_odr_id and od.od_pro_id=p.id and o.odr_id=".$id;
	$stips = $db->getAll($sql);
}

function ViewComplete()
{
	$page="admin.php?do=orders". (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
?>