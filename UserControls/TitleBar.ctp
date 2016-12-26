<? global $FullUrl, $title_bar, $do, $act, $lg; ?>

<div class="title-bar">
  <ul class="navigation">
  	<? if($do=="main"){ ?>
    <li><a href="<?=$FullUrl?>/">Trang chủ</a> &raquo;</li>
    <? }else if($do=="cart"){ ?>
	<li><a href="<?=$FullUrl?>/">Trang chủ</a> &raquo; <a href="<?=$FullUrl;?>/index.php?do=cart&amp;act=view&amp;lg=vn">Giỏ hàng</a></li>
    <? }else if($do=="contact" && $act=="successful"){ ?>
	<li><a href="<?=$FullUrl?>/">Trang chủ</a> &raquo;</li>	
	<? }else{ ?>
    <?=$title_bar?>
    <? } ?>
  </ul>
</div>
