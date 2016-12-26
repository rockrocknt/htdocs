<a href="http://www.tuixachnam.vn/milord/" title="cặp da công sở doanh nhân văn phòng"><img src="/pictures/cap-da-nam-cao-cap-milord.jpg" alt="cặp da công sở doanh nhân văn phòng" title="cặp da công sở doanh nhân văn phòng" /></a>
<? 
	global $FullUrl, $lg, $cat1, $cat_link_in_article_list; 

	if($products_of_article) {
		$cat_link_in_article_list = GetCategoryProduct($products_of_article[0]);
?>

<div class="sb-box">
  <h3 class="h3-title"><a href="<?=$cat_link_in_article_list?>" title="<?=$cat["name_$lg"]?>">Bấm vào xem tất cả <?=$cat["name_$lg"]?></a></h3>
  <div class="product">
    <? 
  	 $j = 0;
	 foreach($products_of_article as $key => $product)
	 {
		$j = $j + 1; 
		$product_img = GetImage($product['img']);
		
		if(!empty($product['name_'.$lg]))
			$product_link = GetProductLink2($product, $lg); 
		else
			$product_link = "#";
			
		$product_title = htmlspecialchars($product['name_'.$lg]);
		$link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $product['id'] . "&amp;lg=$lg&amp;sl=1";
  ?>
    <div class="pro-list <? if($j==4){echo 'last';$j=0;}?>">
      <ul>
        <li class="pro-img"><a href="<?=$product_link?>" title="$product_title"><img src="<?=$FullUrl?>/<?=$product_img?>" alt="<?=$product_title?>" title="<?=$product_title?>" /></a></li>
        <li class="pro-name"><a href="<?=$product_link?>" title="$product_title">
          <?=$product_title?>
          </a></li>
        <li class="pro-price">
          <?=number_format($product['price'])?>đ</li>
        <li class="pro-buy"><a class="btn-buy" href="<?=$link_buy?>" title="<?=$product_title?>">Mua ngay</a> <a class="xem-them btn-buy" href="<?=$product_link?>" title="<?=$product_title?>">Xem</a></li>
      </ul>
    </div>
    <? }?>
    <? if(!empty($cat_link_in_article_list)){ ?>
    <div class="cl"></div>
    <div class="view-all"><a href="<?=$cat_link_in_article_list?>" title="<?=$cat["name_$lg"]?>">Bấm vào đây để xem tất cả sản phẩm <?=strtolower($cat["name_$lg"])?></a></div>
    <? } ?>
  </div>
</div>
<? }else Template::UserControl('LatestProductsInMain'); ?>

