<?
	global $db;
	
	$cid = $_GET['cid'];	
	$sql = "select * from widgets where id=$cid";
	$parent = $db->getRow($sql);
	
	$id = SafeQueryString('id');
	if ($id) {
		$sql = "select * from widgets where id=$id";
		$current = $db->getRow($sql);
	}

	$text = "";
	if(!isset($_GET['act']))
		$text = "Tất cả";
	else if($_GET['act']=='edit')
		$text = "Chỉnh sửa";
	else if($_GET['act']=='add')
		$text = "Thêm";
?>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <? if ($parent['name_vn']) { ?>
            <li><a href="admin.php?do=widgets&cid=<?=$cid?>"><?=$parent['name_vn']?></a></li>
            <? } ?>
            <? if ($id) { ?>
            <li><a href="#" onclick="return false;"><?=$current['name_vn']?></a></li>
            <? } ?>
            <li class="current"><a href="#" onclick="return false;"><?=$text?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>