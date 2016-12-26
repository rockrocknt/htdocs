<?php 
	global $FullUrl, $lg;
	$thankyou = Info::getInfoField("thankyou_$lg");
?>
<div class="index_Ce">
    <div class="header">
        <?php Template::UserControl('Header'); ?>
    </div>

    <div class="content" style="padding: 10px;">

        <h4 class="title_content"><?=TITLE_FINISH_ORDER?></h4>
        <div class="cart-container">
            <div class="check_out"><?=$thankyou?></div>
        </div>
    </div>
</div>
<br class="clean">
