<?
	$text = "";
	if(!isset($_GET['act']))
		$text = "Tất cả";
	else if($_GET['act']=='edit')
		$text = "Chỉnh sửa";

	$id = SafeQueryString('id');
	if ($id) {
		$sql = "select * from payments where id=$id";
		$item = $db->getRow($sql);
	}
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li> <a href="admin.php?do=payments">Hệ thống thanh toán</a> </li>
            <? if ($id) { ?>
            <li><a href="#" onclick="return false;"><?=$item['name_vn']?></a></li>
            <? } ?>
            <li class="current"><a href="#" onclick="return false;"><?=$text?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>