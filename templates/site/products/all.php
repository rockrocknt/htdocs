<? global $cat, $cat1, $cat2, $lg, $products, $FullUrl, $tag, $tagCat2; ?>

<? 
	global $FullUrl, $lg, $plpage; 

	if($products) {
?>
<div class="product">
	<a href="http://www.tuixachnam.vn/milord/" title="cặp da doanh nhân Milord"><img src="<?=$FullUrl?>/images/cap-da-doanh-nhan-milord.jpg" title="cặp da doanh nhân Milord" alt="cặp da doanh nhân Milord" /></a><br/><br/>
  <? 
  	 $j = 0;
	 foreach($products as $key => $product)
	 {
		$j = $j + 1; 
		$product_img = GetImage($product['img']);
		
		if(!empty($product['name_'.$lg]))
			$product_link = GetProductLinkFull($product, $lg); 
		else
			$product_link = "#";
			
		$product_title = htmlspecialchars($product['name_'.$lg]);
		$link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $product['id'] . "&amp;lg=$lg&amp;sl=1";
  ?>
  <div class="pro-list <? if($j==4){echo 'last';$j=0;}?>">
    <ul>
      <li class="pro-img"><a href="<?=$product_link?>" title="<?=$product_title?>"><img src="<?=$FullUrl?>/<?=$product_img?>" alt="<?=$product_title?>" title="<?=$product_title?>" /></a></li>
      <li class="pro-name"><a href="<?=$product_link?>" title="<?=$product_title?>"><?=$product_title?></a></li>
      <? if($product['size']){ ?><li class="pro-name">Size: <?=$product['size']?></a></li><? } ?>
      <li class="pro-price">Giá: <?=number_format($product['price'])?>đ</li>
      <li class="pro-buy">
      <? if ($product['is_available']) { ?>
    	<a class="btn-buy" href="<?=$link_buy?>" title="<?=$product_title?>">Mua ngay</a> <a class="xem-them btn-buy" href="<?=$product_link?>" title="<?=$product_title?>">Xem</a>
    <? } else { ?>
    	<a class="btn-buy" href="#" title="<?=$product_title?>">Cháy hàng</a>
        <p class="sold-out-list"><img src="<?=$FullUrl?>/images/sold-out-list.png" alt="sold-out-list" /></p>
    <? } ?> 
      </li>
    </ul>
  </div>
  <? }?>
</div>
<? } ?>
<div style="clear:both;"></div>
<?=$plpage;?>
<?php Template::UserControl('CatProduct'); ?>