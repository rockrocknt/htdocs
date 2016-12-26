<?
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
            <li> <a href="admin.php?do=images&type=<?=$_GET['type']?>&cid=<?=$_GET['cid']?>">Hình ảnh</a> </li>
            <li class="current"><a href="#" onclick="return false;"><?=$text?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>
<div class="clear"></div>