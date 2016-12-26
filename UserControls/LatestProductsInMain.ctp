<? 
	global $FullUrl, $lg, $products_in_main; 
	
	if($products_in_main) {
?>

<div class="sb-box">
  <h3 class="h3-title"><a href="<?=$FullUrl?>/tat-ca-san-pham.html" title="<?=$hot_cat["name_vn"]?>">Bấm vào xem tất cả <b>Túi xách nam</b></a></h3>
  <div class="product">
    <? 
  	 $j = 0;
	 foreach($products_in_main as $key => $product)
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
        <li class="pro-img"><a href="<?=$product_link?>" title="$product_title"><img src="<?=$FullUrl?>/<?=$product_img?>" alt="<?=$product_title?>" title="<?=$product_title?>" /></a></li>
        <li class="pro-name"><a href="<?=$product_link?>" title="<?=$product_title?>">
          <?=$product_title?>
          </a></li>
        <li class="pro-price">
          <?=number_format($product['price'])?>đ</li>
        <li class="pro-buy"><a class="btn-buy" href="<?=$link_buy?>" title="<?=$product_title?>">Mua ngay</a> <a class="xem-them btn-buy" href="<?=$product_link?>" title="<?=$product_title?>">Xem</a></li>
      </ul>
    </div>
    <? }?>
    <div class="cl"></div>
    <div class="view-all"><a href="<?=$FullUrl?>/tat-ca-san-pham.html" title="<?=$hot_cat["name_vn"]?>">Bấm vào để xem tất cả sản phẩm</a></div>
  </div>
</div>
<? } ?>