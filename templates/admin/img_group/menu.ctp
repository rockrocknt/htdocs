<?
	$text = "Tất cả";
	$cid = SafeQueryString('cid');
$menu = "Quản lý";
	if ($cid == 1)
		$menu = "Hình Slider";
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li> <a href="admin.php?do=img_group&act=detail&cid=<?=$cid?>"><?=$menu?></a> </li>
            <li class="current"><a href="#" onclick="return false;"><?=$text?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>