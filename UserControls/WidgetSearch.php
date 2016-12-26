<?php
	global $lg, $FullUrl, $prefix_url;
?>
<div class="right-top-box">
	<div class="top-cart">
    	<a title="<?=SITE_VIEWCART?>" href="<?=$FullUrl.$prefix_url.($lg=='vn'?'xem-gio-hang.html':'view-cart.html')?>">[<?=cart::getQuantity()?>] <?=CAT_PRODUCTS?></a>
    </div>
    <p class="cl"></p>
    <div class="top-search">
        <form onsubmit="return SearchGoogle();" action="#">
            <input type="text" id="search-key" value="<?=SITE_KEYWORD?>" onfocus="if (this.value == '<?=SITE_KEYWORD?>') {this.value = '';}" onblur="if (this.value == '') {this.value = '<?=SITE_KEYWORD?>';}" />
            <input type="submit" id="search-button" value="" />
        </form>
    </div>
</div>