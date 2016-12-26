<?
include("ckeditor_config.php");
switch($act){
	case "edit":	
	Edit();
	$tpl="edit";
	$title_page = "CMS - Giới thiệu";
	break;	

	case "editsm":
	Editsm();
	break;
	
	default:
	Edit();
	$tpl="edit";
	$title_page = "CMS - Giới thiệu";
	break;
}

function Edit()
{
	global $db, $intro;
	$id=$_GET["cid"];

	$sql = "select name_vn from categories where id=".$id;
	$r = $db->getRow($sql);
	$arr['id']=$id;
	$arr['name_vn'] = $r['name_vn'];
	vaInsert('intro',$arr);

	$sql = "select * from intro where id=$id";
	$intro = $db->getRow($sql);
}
function Editsm()
{
	global $db,$act;	
	$arr['content_vn']=$_POST["content_vn"];	
	$arr['content_en']=$_POST["content_en"];	
	$arr['name_vn']=$_POST["name_vn"];	
	$arr['name_en']= $_POST["name_en"] ;	
	if(isset($_FILES['img']['name'] ) && $_FILES['img']['size']>0){
		$img = $_FILES['img']['name'];
		$start = strpos($img,".");
		$type = substr($img,$start,strlen($img));
		$filename = 'img'.time().$type;
		$filename = strtolower($filename);
		copy($_FILES['img']['tmp_name'], "./upload/images/" . $filename) ;
		$arr['img'] = "upload/images/" . $filename;		 
	}
	$id=$_POST['id'];	
	vaUpdate('intro',$arr,' id='.$id);	
	$msg="Edit successfully";		
	$page="admin.php?do=intro&cid=".$_POST['id'];
	$_SESSION['mess'] = $msg;				
	page_transfer2($page);
}
?>