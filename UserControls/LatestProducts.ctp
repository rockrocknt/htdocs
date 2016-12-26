<? 
	global $FullUrl, $lg; 

	if($hot_products) {
?>

<div class="sb-box">
  <h3 class="h3-title">Sản phẩm tiêu biểu</h3>
  <div class="sb-ct sanpham-hot">
    <ul>
      <? 
  	 $j = 0;
	 foreach($hot_products as $key => $product)
	 {
		$j = $j + 1; 
		$product_img = GetImage($product['img']);
		
		if(!empty($product['name_'.$lg]))
			$product_link = GetProductLinkFull($product, $lg); 
		else
			$product_link = "#";
			
		$product_title = htmlspecialchars($product['name_'.$lg]);
  ?>
      <li>
        <p><a href="<?=$product_link?>" title="<?=$product_title?>"><img src="<?=$FullUrl?>/<?=$product_img?>" alt="<?=$product_title?>" width="179px" /></a></p>
        <p><a href="<?=$product_link?>" title="<?=$product_title?>"><?=$product_title?></a></p>
      </li>
   <? } ?>
    </ul>
  </div>
</div>
<? } ?>
