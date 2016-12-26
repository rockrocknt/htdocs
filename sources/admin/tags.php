<?
include("ckeditor_config.php");	
switch($act){
	case "edit":	
	Edit();
	$title_page = "CMS - Chỉnh sửa tags";
	$tpl="edit";
	break;
	
	case "add":	
	$title_page = "CMS - Thêm tags";
	$tpl="edit";
	break;
	
	case "copy":
	ShowCopy();
	$tpl="copy";
	break;
	
	case "copysm":
	CopySm();
	break;
	
	case "del":
	Del();
	break;

	case "un_home":
	un_home();
	break;
	
	case "change_is_main_group":
	change_is_main_group();
	break;
	
	case "change_pro":
	change_pro();
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
	
	case "change_special":
	change_special();
	break;
	
	case "change_home":
	change_home();
	break;
	
	case "change_active":
	change_active();
	break;
	
	default:
	ShowList();
	$title_page = "CMS - tags";
	$tpl="list";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	
	$sql="select *, (select name_vn from articles where id = tags_article) as art_name, (select name_vn from products where id = tags_product) as pro_name, (select name_vn from categories where id = tags_cat) as cat_name from tags order by tags_num asc, tags_id desc";
	
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $tag;
	$id=$_GET["id"];
	$sql = "select * from tags where tags_id = $id";
	$tag = $db->getRow($sql);
}

function Order()
{
	global $db;
	$id=$_POST["id"];	
	$ordering=$_POST["ordering"];		
	for($i=0;$i<count($id);$i++){
		$sql="update tags set tags_num=".$ordering[$i]." where tags_id = ".$id[$i];
		$db->query($sql);		
	}
	$msg="Order successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=tags" . (isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:'') . (isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:'') . (isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function DelList()
{
	global $db;
	$id=$_POST["iddel"];		
	for($i=0;$i<count($id);$i++){
		$sql="delete from tags where tags_id = ".$id[$i];
		$db->query($sql);		
	}
	
	$msg="Delete successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=tags" . (isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:'') . (isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:'') . (isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function change_active()
{
	global $db;
	$id=$_GET["id"];
	
	$active = $_GET['current']==1?0:1;
	$sql="update tags set tags_active = '$active' where tags_id = $id";
	$db->query($sql);	
	
	$msg="Update successfully";	
	
	$page="admin.php?do=tags" . (isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:'') . (isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:'') . (isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	
	$_SESSION['mess'] = $msg;
	page_transfer2($page);
}

function ChangeShow()
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update tags set tags_active = 1 where tags_id = ".$id[$i];
		$db->query($sql);		
	}
	$msg="Update successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=tags" . (isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:'') . (isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:'') . (isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function ChangeHide()
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update tags set tags_active=0 where tags_id=".$id[$i];
		$db->query($sql);		
	}
	$msg="Update successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=tags" . (isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:'') . (isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:'') . (isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function Del()
{
	global $db;
	$id=$_GET["id"];
	
	$sql="delete from tags where tags_id=".$id;
	$db->query($sql);	
		
	$msg="Delete successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=tags" . (isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:'') . (isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:'') . (isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function Editsm()
{
	global $db,$act;
	$pro_id = SafeQueryString("pro_id");
	$art_id = SafeQueryString("art_id");
	$cat_id = SafeQueryString("cat_id");
	$tags_name = $_POST["tags_name"];
	$tags_name = str_replace("<p>", "", $tags_name);
	$tags_name = str_replace("</p>", "", $tags_name);
		
	$arr['tags_name'] = $tags_name;	
	$arr['tags_keyword'] = $_POST["tags_keyword"];	
	$arr['tags_unique_key'] = $_POST['tags_unique_key'];
	if(!empty($art_id))
		$arr['tags_article'] = $art_id;
	if(!empty($pro_id))
		$arr['tags_product'] = $pro_id;
	if(!empty($cat_id))
		$arr['tags_cat'] = $cat_id;
	$arr['tags_active'] = isset($_POST['tags_active'])?$_POST['tags_active']:'0';
	
	if ($act=="addsm")
	{
		$postId = vaInsert('tags',$arr);
		$msg="Add successfully";
	}
	else
	{
		$id=$_POST['id'];
		
		vaUpdate('tags',$arr,' tags_id='.$id);	
		$msg="Edit successfully";	
	}
	
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=tags" . (isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:'') . (isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:'') . (isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

?>