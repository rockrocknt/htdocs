<?
	$text = "";
	if(!isset($_GET['act']) || $_GET['act']=='list')
		$text = "Tất cả";
	else if($_GET['act']=='edit')
		$text = "Chỉnh sửa";
	else if($_GET['act']=='add')
		$text = "Thêm";

	$id = SafeQueryString('id');
	if ($id) {
		$sql = "select * from admin where id=$id";
		$item = $db->getRow($sql);
	}
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li> <a href="admin.php?do=users">Quản trị viên</a> </li>
            <? if ($id) { ?>
            <li><a href="#" onclick="return false;"><?=$item['username']?></a></li>
            <? } ?>
            <li class="current"><a href="#" onclick="return false;"><?=$text?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>