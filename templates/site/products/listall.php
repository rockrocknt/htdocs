<? global $cat, $cat1, $cat2, $lg, $products, $FullUrl, $tag, $tagCat2; ?>

<div class="main-product">
  <div><?=$title_bar?></div>
  <?	
		if(!empty($cat['seo_f_'.$lg])){	
	?>
		<?=$cat['seo_f_' . $lg];?>
		<? }else if($tag){ ?>
      
        <? } ?>
  <? 
  	if($products){ 
		$w = 175;
		$h = 117;
		foreach($products as $product){
		$link = GetArtLinkFull($product, $lg);
		$link = $FullUrl.$link;
		$img = GetImage($product['img']);
		$size = fixSize($img, $w, $h);
		$product_buy = 'onclick="return Cart(\''.$product['id'].'\', \''.$FullUrl.'\', \'add\')"';
  ?>
  <div class="pro-num">
  	<h3><a class="tooltip" href="<?=$link?>"><?=$product["name_$lg"]?></a></h3>
    <div class="photo-pro"> <a class="tooltip" href="<?=$link?>"><img src="<?=GetPHPThumb($img, $size['width'], $size['height']);?>" width="<?=$size['width'];?>" height="<?=$size['height'];?>" alt="<?=$product["name_$lg"]?>" style="margin-top:<?=ImageCenter($size['height'], $h)?>px;" /></a></div>
    <span class="price">
	<?=number_format($product["price"])?><?=CST_CURRENCY_CODE?>
    </span>
    <? if ($product['is_available']) { ?>
    	<span class="buy"><a href="#" title="Mua hàng" <?=$product_buy?>>Mua</a></span>
    <? } else { ?>
    	<span class="sold-out">Cháy hàng</span>
        <p class="sold-out-list"><img src="<?=$FullUrl?>/images/sold-out-list.png" alt="sold-out-list" /></p>
    <? } ?>
    <pre class="hidden">
        <div class="name"><?=$product["name_$lg"]?></div>
        <? if ($product["code"]) { ?>
        <div class="name">Mã SP: <?=$product["code"]?></div>
        <? } ?>
        <div class="picture_only" src="<?=$FullUrl.'/'.GetImage($product['img'])?>"><img src="<?=$FullUrl.'/'.GetImage($product['img'])?>" alt=""></div>
	</pre>
  </div>
  <? } ?>
  <? }else echo NO_NEWS; ?>
    <div class="cl"></div>
    <?php echo $plpage; ?>
    <div class="cl"></div>
</div>
