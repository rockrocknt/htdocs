<?
	$text = "Tất cả";
	
	if (isset($_GET['act'])&&$_GET['act']=='detail') {
		$text = "Chi tiết";
	}
?>
<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
            <li> <a href="admin.php?do=contact_logs">Liên hệ</a> </li>
            <li class="current"><a href="#" onclick="return false;"><?=$text?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>