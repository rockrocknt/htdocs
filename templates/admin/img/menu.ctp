<?
	$cid = SafeQueryString('cid');
	$id = SafeQueryString('id');

	if ($cid == 1)
		$menu = "Hình Slider";
	
	$text = "";
	if(!isset($_GET['act']))
		$text = "Tất cả";
	else if($_GET['act']=='edit')
		$text = "Chỉnh sửa";
	else if($_GET['act']=='add')
		$text = "Thêm";
		
	if ($id) {
		$sql = "select * from img where id=$id";
		$item = $db->getRow($sql);
	}
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li> <a href="admin.php?do=img_group&act=detail&cid=<?=$cid?>"><?=$menu?></a> </li>
            <? if ($id) { ?>
            <li><a href="#" onclick="return false;"><?=$item['name_vn']?></a></li>
            <? } ?>
            <li class="current"><a href="#" onclick="return false;"><?=$text?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>