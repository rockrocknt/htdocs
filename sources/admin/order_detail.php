<?
include("ckeditor_config.php");	
switch($act){
	case "edit":	
	Edit();
	$title_page = "CMS - Chỉnh sửa sản phẩm";
	$tpl="edit";
	break;
	
	case "add":	
	$title_page = "CMS - Thêm sản phẩm";
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
	
	case "change_home":
	change_home();
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
	
	default:
	ShowList();
	$title_page = "CMS - Sản phẩm";
	$tpl="list";
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	if(isset($_GET['cid']) && $_GET['cid']!=1 && $_GET['cid']!='')
		$sql="select p.* from order_detail p where p.cid=".$_GET['cid']." order by p.num asc, p.id desc ";
	else
		$sql="select * from order_detail order by odr_id desc ";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Edit()
{
	global $db, $product;
	$id=$_GET["id"];
	$sql = "select * from order_detail where id=$id";
	$product = $db->getRow($sql);
}

function ShowCopy()
{
	global $db,$stips;
	$sql = "select c.id from categories c, order_detail p where p.id=".$_GET['id']." and p.cid=c.id;";
	$r = $db->getRow($sql);
	$sql="select * from categories where  id<>".$r['id']." and comp=2 order by num asc, id asc";
	//id<>".$_GET['cid']." and
	$stips = array();
	DeQuiCp($stips, 345);
	//print_r($stips);
}

function DeQuiCp(&$Cats, $pid){
	global $db;
	$sql = "select id,pid,name_vn,has_child from categories where pid=$pid order by num asc, id asc";
	$r = $db->getAll($sql);
	if($r){
		foreach($r as $cat){
			if($cat['has_child'] == 1){
				DequiCp($Cats, $cat['id']);
			}
			else{
				$Cats[] = $cat;
			}
		}
	
	}
}

function CopySm()
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$arr = array();
		$arr['product_id'] = $_GET['id'];
		$arr['cat_id'] = $id[$i];
		vaInsert('asc_product_cat',$arr);
	}	
	$msg="Copy successfully";		
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function Order()
{
	global $db;
	$id=$_POST["id"];	
	$ordering=$_POST["ordering"];		
	for($i=0;$i<count($id);$i++){
		$sql="update order_detail set num=".$ordering[$i]." where id=".$id[$i];
		$db->query($sql);		
	}
	$msg="Order successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function DelList()
{
	global $db;
	$id=$_POST["iddel"];		
	for($i=0;$i<count($id);$i++){
		$sqlstmt="select img from `order_detail` where id=".$id[$i];
		$r = $db->getRow($sqlstmt);
		if(file_exists($r['img'])) unlink($r['img']);		
		
		$sql="delete from categories where pid=337 and alias=".$id[$i];
		$db->query($sql);	
		
		$sql="delete from order_detail  where id=".$id[$i];
		$db->query($sql);		
	}
	$msg="Delete successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function ChangeShow()
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update order_detail set active=1 where id=".$id[$i];
		$db->query($sql);		
	}
	$msg="Update successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function ChangeHide()
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update order_detail set active=0 where id=".$id[$i];
		$db->query($sql);		
	}
	$msg="Update successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function Del()
{
	global $db;
	$id=$_GET["id"];

	$sqlstmt="select img from `order_detail` where id=$id";
	$r = $db->getRow($sqlstmt);
	if(file_exists($r['img'])) unlink($r['img']);		
	$sql="delete from categories where pid=337 and alias=".$id;
	$db->query($sql);	
	$sql="delete from order_detail  where id=".$id;
	$db->query($sql);	
		
	$msg="Delete successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function un_home()
{
	global $db;
	//$id=$_GET["id"];
//
//	$home = $_GET['current']==1?0:1;
//	$sql="update order_detail set home=".$home." where id=".$id;
//	$db->query($sql);	
		
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update order_detail set home=0 where id=".$id[$i];
		$db->query($sql);		
	}
	
	$msg="Update successfully";	
	$pagename = isset($_GET['pagename'])?$_GET['pagename']:'';
	
	if($pagename == 'item_home')
		$page="admin.php?do=item_home";
	else 
	{
		$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	}
	
	$_SESSION['mess'] = $msg;
	
	page_transfer2($page);
}
function change_home()
{
	global $db;
	//$id=$_GET["id"];
//
//	$home = $_GET['current']==1?0:1;
//	$sql="update order_detail set home=".$home." where id=".$id;
//	$db->query($sql);	
		
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update order_detail set home=1 where id=".$id[$i];
		$db->query($sql);		
	}
	
	$msg="Update successfully";	
	$pagename = isset($_GET['pagename'])?$_GET['pagename']:'';
	
	if($pagename == 'item_home')
		$page="admin.php?do=item_home";
	else 
	{
		$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	}
	
	$_SESSION['mess'] = $msg;
	
	page_transfer2($page);
}
function change_is_main_group()
{
	global $db;
	$id=$_GET["id"];

	$home = $_GET['current']==1?0:1;
	$sql="update order_detail set is_main_group=".$home." where id=".$id;
	$db->query($sql);	
		
	$msg="Update successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function change_pro()
{
	global $db;
	$id=$_GET["id"];

	$home = $_GET['current']==1?0:1;
	$sql="update order_detail set special=".$home." where id=".$id;
	$db->query($sql);	
		
	$msg="Update successfully";		
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}
function Editsm()
{
	global $db,$act;	
	$arr['code']=$_POST["code"];	
	$arr['num']=$_POST["num"];	
	$arr['active'] = $_POST['active']=='1'?'1':'0';
	$arr['is_contact'] = $_POST['is_contact']=='on'?'1':'0';		
	$arr['cid']=$_POST['cat'];	
	$arr['price']=$_POST["price"];
	$arr['size']= $_POST["size"];
	
	$arr['name_vn']= $_POST["name_vn"];	
	$arr['descs_vn']= $_POST["descs_vn"];	
	$arr['production_vn']= $_POST["production_vn"];
	$arr['warranty_vn']= $_POST["warranty_vn"];
	$arr['seo_f_vn']= $_POST["seo_f_vn"];	
				
	
	$arr['name_en']= $_POST["name_en"];	
	$arr['descs_en']= $_POST["descs_en"];
	$arr['production_en']= $_POST["production_en"];	
	$arr['warranty_en']= $_POST["warranty_en"];
	$arr['seo_f_en']= $_POST["seo_f_en"];	

	$arr['unique_key_vn']=$_POST["unique_key_vn"];
	$arr['unique_key_en']=$_POST["unique_key_en"];
	$arr['title_vn']=$_POST["title_vn"];
	$arr['title_en']=$_POST["title_en"];
	$arr['keyword_vn']=$_POST["keyword_vn"];
	$arr['keyword_en']=$_POST["keyword_en"];
	$arr['des_vn']=$_POST["des_vn"];
	$arr['des_en']=$_POST["des_en"];
	
	//group
	$arr['is_main_group'] = $_POST['is_main_group']=='1'?'1':'0';		
	$arr['group_name_vn']= $_POST["group_name_vn"];	
	$arr['group_name_en']= $_POST["group_name_en"];	
	if($arr['group_name_vn']==""){
		$arr['group_name_vn']= $_POST["name_vn"];	
		$arr['group_name_en']= $_POST["name_en"];	
	}
	if(isset($_FILES['img']['name'] ) && $_FILES['img']['size']>0){
		$img = $_FILES['img']['name'];
		$start = strpos($img,".");
		$type = substr($img,$start,strlen($img));
		CheckUpload($type);
		//$filename = 'artseed-'.time().$type;
		$filename = strtolower($filename);
		$filename = RenameFile($filename);
		if(file_exists( "./upload/images/" . $filename)){
			$filename = substr($img, 0, $start);
			$filename = $_POST["unique_key_vn"] . '-' . time() . $type;
		}
		else
		{
					 
		}
		copy($_FILES['img']['tmp_name'], "./upload/images/" . $filename) ;
		$arr['img'] = "upload/images/" . $filename;
	}
	
	if(isset($_FILES['img_thumb']['name'] ) && $_FILES['img_thumb']['size']>0){
		$img = $_FILES['img_thumb']['name'];
		$start = strpos($img,".");
		$type = substr($img,$start,strlen($img));
		CheckUpload($type);
		$filename = 'artseed-thumb-'.time().$type;
		$filename = strtolower($filename);
		copy($_FILES['img_thumb']['tmp_name'], "./upload/images/" . $filename) ;
		$arr['img_thumb'] = "upload/images/" . $filename;		 
	}
	
	if(isset($_FILES['img_home']['name'] ) && $_FILES['img_home']['size']>0){
		$img = $_FILES['img_home']['name'];
		$start = strpos($img,".");
		$type = substr($img,$start,strlen($img));
		CheckUpload($type);
		$filename = 'artseed-home-'.time().$type;
		$filename = strtolower($filename);
		copy($_FILES['img_home']['tmp_name'], "./upload/images/" . $filename) ;
		$arr['img_home'] = "upload/images/" . $filename;		 
	}
	
	if ($act=="addsm")
	{
		$postId = vaInsert('order_detail',$arr);
		$msg="Add successfully";
		
		//index du lieu trong site_search
		$arr2 = array();
		$arr2['title_vn'] = $arr['name_vn'];
		$arr2['body_vn'] = $arr['code'] . " " . $arr['descs_vn'] . " " . $arr['production_vn'] . " " . $arr['warranty_vn'] . " " . $arr['keyword_vn'] . " " . $arr['des_vn'];
		$arr2['title_en'] = $arr['name_en'];
		$arr2['body_en'] = $arr['code'] . " " . $arr['descs_en'] . " " . $arr['production_en'] . " " . $arr['warranty_en'] . " " . $arr['keyword_en'] . " " . $arr['des_en'];
		$arr2['type'] = 2; //san pham
		$arr2['id_item'] = $postId;
		$arr2['link_vn'] = GetProductLink2($arr, "vn");
		if($arr['name_en'] <> ""){
			$arr2['link_en'] = GetProductLink2($arr, "en");
		}
		$new_id2 = vaInsert('site_search',$arr2);
	}
	else
	{
		/*$imgdel=$_POST["iddel"];		
		foreach($imgdel as $img){
			$arr[$img] = '';
		}*/
	
		$id=$_POST['id'];
		if (isset($arr['img'])){
			$sqlstmt="select img from `order_detail` where id=$id";
			$r = $db->getRow($sqlstmt);
			if(file_exists($r['img'])) unlink($r['img']);
		}
		if (isset($arr['img_home'])){
			$sqlstmt="select img_home from `order_detail` where id=$id";
			$r = $db->getRow($sqlstmt);
			if(file_exists($r['img_home'])) unlink($r['img_home']);
		}
		if (isset($arr['img_thumb'])){
			$sqlstmt="select img_thumb from `order_detail` where id=$id";
			$r = $db->getRow($sqlstmt);
			if(file_exists($r['img_thumb'])) unlink($r['img_thumb']);
		}
		vaUpdate('order_detail',$arr,' id='.$id);	
		$msg="Edit successfully";		
		
		//index du lieu trong site_search
		$sql = "select * from site_search where type=2 and id_item=$id";
		$ss = $db->getRow($sql);
		
		$arr2 = array();
		$arr2['title_vn'] = $arr['name_vn'];
		$arr2['body_vn'] = $arr['code'] . " " . $arr['descs_vn'] . " " . $arr['production_vn'] . " " . $arr['warranty_vn'] . " " . $arr['keyword_vn'] . " " . $arr['des_vn'];
		$arr2['title_en'] = $arr['name_en'];
		$arr2['body_en'] = $arr['code'] . " " . $arr['descs_en'] . " " . $arr['production_en'] . " " . $arr['warranty_en'] . " " . $arr['keyword_en'] . " " . $arr['des_en'];
		$arr2['type'] = 2; //san pham
		$arr2['id_item'] = $postId;
		$arr2['link_vn'] = GetProductLink2($arr, "vn");
		if($arr['name_en'] <> ""){
			$arr2['link_en'] = GetProductLink2($arr, "en");
		}
		vaUpdate('site_search',$arr2,' id='.$ss['id']);
	}
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=order_detail". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

?>