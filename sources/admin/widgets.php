<?php
include("ckeditor_config.php");
switch($act){
	case "edit":	
		Edit();
		$title_page = "CMS - Chỉnh sửa widget";
		$tpl="edit";
		break;
	
	case "add":
		Add();
		$tpl="edit";
		$title_page = "CMS - Thêm widget";
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
	
	case "change_active":
		changeStatus('active');
		break;
	
	case "addsm":
	case "editsm":
		Editsm();
		break;
	
	default:
		ShowList();
		$title_page = "CMS - Danh sách widget";
		$tpl="list";
}

function changeStatus($field)	// dao trang thai cua $field
{
	global $db;
	$id=$_GET["id"];
	
	$status = $_GET['current']==1?0:1;
	$sql="update widgets set $field='$status' where id=$id";
	$db->query($sql);	

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=widgets".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update widgets set $field=1 where id=".$id[$i];
		$db->query($sql);		
	}

	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=widgets&cid=".$_GET['cid'].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
	global $db;
	$id=$_POST["iddel"];
	for($i=0;$i<count($id);$i++){
		$sql="update widgets set $field=0 where id=".$id[$i];
		$db->query($sql);		
	}
	
	$_SESSION['mess'] = "Sửa thành công!";
	$page="admin.php?do=widgets&cid=".$_GET['cid'].(isset($_GET['page'])?'&page='.$_GET['page']:'');
	page_transfer2($page);
}

function ShowList()
{
	global $db,$stips,$page,$plpage,$set_per_page,$c;
	$set_per_page=20; 
	$sql="select * from widgets where cid=".$_GET['cid']." order by num asc, id asc";
	$c = $db->numRows($db->query($sql));
	$plpage = plpage($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$stips = $db->getAll($sqlstmt);
}

function Add()
{
	global $db, $catList, $fullCats, $info;
	
	$sql = "select * from categories where id<>121 and id<>1";
	$catList = $fullCats = $db->getAll($sql);
	
	$sql = "select facebook, fbwidth, fbheight from infos";
	$info = $db->getRow($sql);
}

function Edit()
{
	global $db, $cat, $recentCat, $catList, $notDisplayList, $fullCats, $info;

	$id = $_GET["id"];
	$sql = "select * from widgets where id=$id";
	$cat = $db->getRow($sql);
	
	$sql = "select * from categories where id<>121 and id<>1";
	$fullCats = $db->getAll($sql);
	
	$sql = "select facebook, fbwidth, fbheight from infos";
	$info = $db->getRow($sql);	
	
	$sql = "select * from widgets_categories where active=1 and widgetid=$id";
	$catids = $db->getAll($sql);
	$where = "";
	
	if ($catids[0]) {
		foreach ($catids as $i=>$catid)
		{
			if ($i==0)
				$where .= "id=".$catid["catid"];
			else
				$where .= " or id=".$catid["catid"];
		}
	}
	
	$sql1 = "select * from categories where id<>121 and id<>1 and ($where)";
	$recentCat = $db->getAll($sql1);
	$sql2 = "select id from categories where id<>121 and id<>1 and ($where)";
	if ($where)
		$sql3 = "select * from categories where id<>121 and id<>1 and id not in ($sql2)";
	else
		$sql3 = "select * from categories where id<>121 and id<>1";
	$catList = $db->getAll($sql3);
	
	$sql = "select * from widgets_not_display_categories where active=1 and widgetid=$id";
	$notDisplayList = $db->getAll($sql);
}

function DeleteWidget($id){
	global $db;

	$sql = "select * from widgets where id=$id";
	$r = $db->getRow($sql);

	if($r && $r['is_deleted'] == 1){
		$sql = "delete from widgets where id=".$id." and is_deleted=1";
		$db->query($sql);
		$sql = "delete from widgets_categories where widgetid=$id";
		$db->query($sql);
		insertLog('Xoá widgets: '.$r['name_vn']);
	}
}

function Del()
{
	global $db;
	$id=$_GET["id"];
	
	DeleteWidget($id);
	
	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=widgets&cid=".$_GET['cid'];
	page_transfer2($page);
}

function DelList()
{
	global $db;
	$id = $_POST["iddel"];
	
	for($i=0;$i<count($id);$i++){
		DeleteWidget($id[$i]);
	}
	
	$_SESSION['mess'] = "Xoá thành công!";
	$page="admin.php?do=widgets&cid=".$_GET['cid'];
	page_transfer2($page);
}

function Editsm()
{
	global $db,$act;
	
	$id=isset($_POST["id"])?$_POST["id"]:'';
	$arr['name_vn']= SafeFormValue('name_vn');
	$arr['name_en']= SafeFormValue('name_en');
	
	$arr['num']=isset($_POST["num"])?$_POST["num"]:'';
	$arr['active'] = isset($_POST['active'])?'1':'0';	
	$arr['comp'] = isset($_POST['comp'])?$_POST["comp"]:'';
	if ($arr['comp']==2)
		$arr['type'] = isset($_POST['ptype'])?$_POST["ptype"]:'';
	else if ($arr['comp']==3)
		$arr['type'] = isset($_POST['atype'])?$_POST["atype"]:'';
	$arr['cid']=$_GET['cid'];
	$arr['qlimit'] = isset($_POST['qlimit'])?$_POST["qlimit"]:'';

	$arr['content_vn'] = isset($_POST['content_vn'])?$_POST["content_vn"]:'';
	$arr['content_en'] = isset($_POST['content_en'])?$_POST["content_en"]:'';
	$catList = isset($_POST["catList"])?$_POST["catList"]:'';
	$notDisplayList = isset($_POST["notDisplayList"])?$_POST["notDisplayList"]:'';
	
	if ($arr['comp']==4)
	{
		$info['facebook'] = isset($_POST['facebook'])?$_POST['facebook']:'https://www.facebook.com/IMGroupVietnam';
		$info['fbheight'] = isset($_POST['fbheight'])?$_POST['fbheight']:200;
		$info['fbwidth'] = isset($_POST['fbwidth'])?$_POST['fbwidth']:100;
		vaUpdate('infos', $info, ' id=1');
	}
	
	if ($act=="addsm")
	{
		$id = vaInsert('widgets', $arr);
		$msg = "Thêm thành công!";
		insertLog('Thêm widgets: '.$arr['name_vn']);
		if ($catList)
		{
			foreach ($catList as $catid)
			{
				$detail['widgetid'] = $id;
				$detail['catid'] = $catid;
				vaInsert('widgets_categories', $detail);
			}
		}

		$detail = array();
		if ($notDisplayList)
		{
			foreach ($notDisplayList as $catid)
			{
				$detail['widgetid'] = $id;
				$detail['catid'] = $catid;
				vaInsert('widgets_not_display_categories', $detail);
			}
		}
	}
	else
	{
		vaUpdate('widgets',$arr,' id='.$id);		
		$msg = "Sửa thành công!";
		insertLog('Sửa widgets: '.$arr['name_vn']);
		$sql = "update widgets_categories set active=0 where widgetid=$id";
		$db->query($sql);
		$sql = "update widgets_not_display_categories set active=0 where widgetid=$id";
		$db->query($sql);
		
		if ($catList)
		{
			foreach($catList as $catid)
			{
				$sql = "update widgets_categories set active=1 where active=0 and widgetid=$id and catid=$catid";
				$db->query($sql);
				if (!$db->db_affected_rows())
				{
					$detail['widgetid'] = $id;
					$detail['catid'] = $catid;
					vaInsert('widgets_categories', $detail);
				}
			}
		}
		
		$detail = array();
		if ($notDisplayList)
		{
			foreach($notDisplayList as $catid)
			{
				$sql = "update widgets_not_display_categories set active=1 where active=0 and widgetid=$id and catid=$catid";
				$db->query($sql);
				if (!$db->db_affected_rows())
				{
					$detail['widgetid'] = $id;
					$detail['catid'] = $catid;
					vaInsert('widgets_not_display_categories', $detail);
				}
			}
		}
	}	
	$_SESSION['mess'] = $msg;
	$page="admin.php?do=widgets&cid=".$_GET['cid']. (isset($_GET['page'])?'&page='.$_GET['page']:'');
	
	page_transfer2($page);
}
?>