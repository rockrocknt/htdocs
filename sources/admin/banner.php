<?
include("./class/resize_image.php");
switch($act){
	case "edit":	
	Edit();
	$tpl="edit";
	break;
	
	case "add":	
	$title_page = "Add";
	$tpl="edit";
	break;
	
	case "del":
	Del();
	break;
	
	case "dellist":
	DelList();
	break;
		
	case "show":
	ChangeShow();
	break;
	
	case "hide":
	ChangeHide();
	break;		
			
	case "order":
	Order();
	break;
	
	case "addsm":
	case "editsm":
	Editsm();
	break;
	
	case "change_home":
	change_home();
	break;
		
	case "change_auto":
	change_auto();
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
	if(isset($_GET['cid']) && $_GET['cid']!=1)
		$sql="select * from banner where cid=".$_GET['cid']." order by num asc ";	
	else
		$sql="select * from banner order by num asc, id desc ";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $banner;
	$id=$_GET["id"];
	$sql = "select * from banner where id=$id";
	$banner = $db->getRow($sql);
}
function DelList()
{
	global $db;
	$id=$_POST["iddel"];
	
	for($i=0;$i<count($id);$i++){		
		$sqlstmt="select img from `banner` where id=".$id[$i];
		$r = $db->getRow($sqlstmt);
		if(file_exists($r['img'])) unlink($r['img']);
		
		$sql="delete from banner where id=".$id[$i];
		$db->query($sql);
	}
	$msg="Delete successfully";	
	$_SESSION['mess'] = $msg;	
	$page="admin.php?do=banner". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function Del()
{
	global $db;
	$id=$_GET["id"];

	$sqlstmt="select img from `banner` where id=$id";
	$r = $db->getRow($sqlstmt);
	if(file_exists($r['img'])) unlink($r['img']);		
	$sql="delete from banner where id=".$id;
	$db->query($sql);	
		
	$msg="Delete successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=banner". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function ChangeShow()
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update banner set active=1 where id=".$id[$i];
		$db->query($sql);		
	}
	$msg="Update successfully";
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=banner". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function ChangeHide()
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update banner set active=0 where id=".$id[$i];
		$db->query($sql);		
	}
	$msg="Update successfully";	
	$_SESSION['mess'] = $msg;	
	$page="admin.php?do=banner". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function change_home()
{
	global $db;
	$id=$_GET["id"];

	$active = $_GET['current']==1?0:1;
	$sql="update banner set active='$active' where id=$id";
	$db->query($sql);	

	$msg="Update successfully";	
	
	if(!empty($_GET['cid']))
		$page="admin.php?do=banner&cid=".$_GET['cid'] . "&page=" . ($_GET['page']!=""?$_GET['page']:1);
	else
		$page="admin.php?do=banner";
	$_SESSION['mess'] = $msg;
	page_transfer2($page);
}
function change_auto()
{
	global $db;
	$id=$_GET["id"];
	$cid = $_GET["cid"];
	
	if($cid == 118 || $cid == 117 || $cid == 116)
	{
		$unactive = 0;
		$active = 1;
		
		$sql="update banner set active='$unactive' where cid=$cid and id <> $id";
		$db->query($sql);	
		
		$sql="update banner set active='$active' where id = $id";
		$db->query($sql);	
		
	}	
	else
	{
		$active = $_GET['current']==1?0:1;
		$sql="update banner set active='$active' where id=$id";
		$db->query($sql);	
	}
	
	$msg="Update successfully";	
		
	if(!empty($_GET['cid']))
		$page="admin.php?do=banner&cid=".$_GET['cid'] . "&page=" . ($_GET['page']!=""?$_GET['page']:1);
	else
		$page="admin.php?do=banner";
	$_SESSION['mess'] = $msg;
	page_transfer2($page);
	
}
function Order()
{
	global $db;
	$id=$_POST["id"];	
	$ordering=$_POST["ordering"];		
	for($i=0;$i<count($id);$i++){
		$sql="update banner set num=".$ordering[$i]." where id=".$id[$i];
		$db->query($sql);		
	}
	$msg="Order successfully";		
	$page="admin.php?do=banner". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	$_SESSION['mess'] = $msg;
	page_transfer2($page);
}
function Editsm()
{
	global $db,$act;
	$active = isset($_POST['active'])?'1':'0';
	$cid = $_POST["cat"];
	
	$arr['name_vn']=isset($_POST["name_vn"])?$_POST["name_vn"]:'';
	$arr['name_en']=isset($_POST["name_en"])?$_POST["name_en"]:'';
	$arr['desc_vn']=isset($_POST["desc_vn"])?$_POST["desc_vn"]:'';
	$arr['desc_en']=isset($_POST["desc_en"])?$_POST["desc_en"]:'';
	$arr['link']=isset($_POST["link"])?$_POST["link"]:'';
	$arr['num']=isset($_POST["num"])?$_POST["num"]:'';
	$arr['cid']=$cid;	
	$arr['active']= $active;
	
	if(!empty($active))
	{
		if($cid == 120 || $cid == 118 || $cid == 117 || $cid == 116 || $cid == 113)
		{
			$unactive = 0;
						
			$sql="update banner set active = '$unactive' where cid = $cid";
			$db->query($sql);				
		}
	}
	
	if(isset($_FILES['img']['name'] ) && $_FILES['img']['size']>0){
		$img = $_FILES['img']['name'];
		$start = strpos($img,".");
		$type = substr($img,$start,strlen($img));
		$filename = 'imgroup-'.time().$type;
		$filename = strtolower($filename);
		
		copy($_FILES['img']['tmp_name'], "./upload/images/" . $filename);
		
		if($cid == 115)
		{
			$image = new SimpleImage();
		   	$image->load("./upload/images/" . $filename);
		   	$image->resize(CST_BANNER_WIDTH, CST_BANNER_HEIGHT);
		   	$image->save("./upload/images/" . $filename);			
		}
		else if($cid == 117)
		{
			$image = new SimpleImage();
		   	$image->load("./upload/images/" . $filename);
		   	$image->resize(CST_ICON_TITLE_WIDTH, CST_ICON_TITLE_HEIGHT);
		   	$image->save("./upload/images/" . $filename);			
		}
			
		$arr['img'] = "upload/images/" . $filename;		 
	}

	if ($act=="addsm")
	{			
		vaInsert('banner',$arr);
		$msg="Add successfully";
	}
	else
	{
		$id=$_POST['id'];
		if (isset($arr['img'])){
			$sqlstmt="select img from `banner` where id=$id";
			$r = $db->getRow($sqlstmt);
			if(file_exists($r['img'])) unlink($r['img']);
		}			
		vaUpdate('banner',$arr,' id='.$id);	
		$msg="Edit successfully";		
	}	
	$page="admin.php?do=banner". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	$_SESSION['mess'] = $msg;
	page_transfer2($page);
}
?>