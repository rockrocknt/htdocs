<?php
	global $FullUrl;
	$flag = changeLanguage();
?>
<div class="flag_box">
    <a href="<?=$flag["flag_link"]?>" title="<?=$flag["flag_title"]?>"><img src="<?=$FullUrl?>/images/site/<?=$flag["flag_img"]?>.png" alt="<?=$flag["flag_title"]?>" title="<?=$flag["flag_title"]?>" /></a>
</div>