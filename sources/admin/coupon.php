<?
switch($act){
	case "edit":	
		Edit();
		$tpl="edit";
		break;
	
	case "add":	
		$title_page = "CMS - Thêm coupon";
		$tpl="edit";
		break;
	
	case "del":
		Del();
		break;
	
	case "dellist":
		DelList();
		break;
		
	case "show":
		setActive('active');
		break;
	
	case "hide":
		inActive('active');
		break;		
			
	case "order":
		Order();
		break;
		
	case "addmulti":
		addMulti();
		break;

    case "addsm":
    case "editsm":
        Editsm();
        break;


    case "change_active":
		changeStatus('active');
		break;
	
	case "delete_img":
		Delete_img();
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
	$type = 0;
    if (getquery('type') != "")
    {
        $type =getquery('type');
    }

    $sql="select * from coupon order by num asc, id desc";

	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $coupon;
	$id=$_GET["id"];
	$sql = "select * from coupon where id=$id";
    $coupon = $db->getRow($sql);
}

function Delete($id)
{
	global $db;

	$sqlstmt = "select img from `coupon` where id=$id";
	$r = $db->getRow($sqlstmt);
	if(file_exists($r["img_vn"])) unlink($r["img_vn"]);
		
	$sql = "delete from coupon where id=".$id;
	$db->query($sql);
}

function Del()
{
	$id = $_GET["id"];	
	Delete($id);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=coupon&type=".$_GET["type"]."&cid=".$_GET["cid"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	$id = $_POST["iddel"];
	
	for($i=0; $i<count($id); $i++)
		Delete($id[$i]);

	$_SESSION['mess'] = "Xoá thành công!";
	$page = "admin.php?do=coupon&type=".$_GET["type"]."&cid=".$_GET["cid"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update coupon set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=coupon&type=".$_GET["type"]."&cid=".$_GET["cid"]. (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update coupon set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}
	
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=coupon&type=".$_GET["type"]."&cid=".$_GET["cid"]. (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	$cid = $_GET["cid"];
	$status = $_GET['current']==1?0:1;
	$sql="update coupon set $field='$status' where id=$id";
	$db->query($sql);
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=coupon&cid=$cid&type=".$_GET["type"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Order()
{
	global $db;
	$id=$_POST["id"];	
	$ordering=$_POST["ordering"];		
	for($i=0;$i<count($id);$i++){
		$sql="update coupon set num=".$ordering[$i]." where id=".$id[$i];
		$db->query($sql);		
	}
	
	$page="admin.php?do=coupon&type=".$_GET["type"]."&cid=".$_GET["cid"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	$_SESSION['mess'] = "Sắp xếp thành công!";
	page_transfer2($page);
}

function Editsm()
{
    global $db, $act;

    $arr['name_vn']=$_POST["name_vn"];
    $arr['code']=$_POST["code"];
    $arr['sotiengiam']=$_POST["sotiengiam"];
  //  $arr['min_order']=$_POST["min_order"];

    $arr['coupontype']=$_POST["coupontype"];

    $arr['end_date']= strtotime($_POST["end_date"]);

    if (isset($_POST["desc_vn"]))
    {
        $arr['desc_vn']=$_POST["desc_vn"];
    }


    $arr['num']=isset($_POST["num"])?$_POST["num"]:'';
    $arr['active']= isset($_POST['active'])?'1':'0';

    $page="admin.php?do=coupon";



    if ($act == "editsm")
    {
        $id=$_POST['id'];
        vaUpdate('coupon',$arr,' id='.$id);
    }

    else vaInsert('coupon',$arr);
    $_SESSION['mess'] = "Sửa thành công!";
    page_transfer2($page);
}

function Delete_img()
{
	global $db;
	$id = $_GET['id'];
	$cid = $_GET['cid'];
	$img = $_GET['img_del'];
	
	$sql = "select * from `coupon` where id=$id";
	$result = $db->getRow($sql);
	
	unlink($result["$img"]);
	$arr["$img"] = "";
	vaUpdate('coupon',$arr,' id='.$id);

	$page = "admin.php?do=coupon&act=edit&id=$id&cid=$cid&type=".$_GET["type"].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function addMulti()
{
    if (getquery('cid') != '')
	    $arr['cid']= isset($_GET["cid"])?$_GET["cid"]:'';
    else
        $arr['product_id']= getquery('product_id');

	$arr['type']= isset($_GET["type"])?$_GET["type"]:'';
	
	foreach ($_POST as $name => $value)
	{	
		if(strpos($name, "_tmpname"))
			$arr["img_vn"] = "upload/plupload/".$value;
	   
		if(strpos($name, "_name"))
		{
			$arr["name_vn"] = $arr["name_en"] = $img = $value;
			
			$start = strpos(strrev($img), ".");	// lay dau . sau cung
			$type = substr($img, strlen($img)-($start+1), $start+1);
			$filename = substr($img, 0, strlen($img)-($start+1));
			
			if(file_exists( "./upload/plupload/" . $filename . $type)){
				$filename = $filename . '-' . time() . $type;
			}
			else
			{
				$filename = $filename . $type;
			}
			
			$image = $arr["img_vn"];
			copy($arr["img_vn"], "./upload/plupload/" . $filename) ;
			$arr["img_vn"] = "upload/plupload/" . $filename;
			unlink($image);
		}
			
		if(strpos($name, "_status"))
			if ($value == "done")
			{
				vaInsert("coupon", $arr);
				$_SESSION['mess'] = "Thêm thành công!";
			}
	}
    $page = "";
    if (getquery('cid') != '')
        $page = "admin.php?do=coupon&type=".$_GET["type"]."&cid=".$_GET['cid'];
    else
        $page = "admin.php?do=coupon&type=".$_GET["type"]."&product_id=". getquery('product_id');

	page_transfer2($page);
}
?>