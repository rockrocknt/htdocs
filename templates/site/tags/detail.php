<? global $lg, $FullUrl, $productActive, $products_anews, $cat, $product_2;  ?>
<?
	$img = GetImage($productActive['img']);
	$link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $productActive['id'] . "&amp;lg=$lg&amp;sl=1";
?>
<?
	$link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $productActive['id'] . "&amp;lg=$lg&amp;sl=1";
?>
<script type="text/javascript">
    $(function() {
        $( "#tabs" ).tabs();
    });
</script>

<div class="pro-photo-detail"> <img width="300" src="<?=$FullUrl?>/<?=$img?>" alt="<?=$productActive["name_$lg"]?>" /> </div>
<div class="pro-info-detail">
    <h1 class="title-detail">
        <?php /*?><p style="margin-bottom:15px"><img src="<?=$FullUrl?>/upload/images/kos-logo.png" alt="KOS Logo" /></p><?php */?>
        <?=$productActive["name_$lg"]?>
    </h1>
    <ul>
        <li><strong>Mã sản phẩm:</strong>
            <?=$productActive["code"]?>
        </li>
        <? if($productActive["size"]){ ?>
            <li><strong>Kích thước:</strong>
                <?=$productActive["size"]?>
            </li>
        <? } ?>
        <? if($productActive["production_vn"]){ ?>
            <li><strong>Miêu tả:</strong>
                <?=$productActive["production_vn"]?>
            </li>
        <? } ?>
        <li><strong style="float:left;line-height: 31px;margin-right: 20px;">Giá:
                <?=number_format($productActive["price"])?>đ</strong></li>
        <? if ($product['is_available']){ ?>
            <?php /*?><li><img src="<?=$FullUrl?>/images/bao-hanh-vali-keo-chinh-hang.png" width="450" alt="Bảo hành sản phẩm vali kéo chính hãng" title="Bảo hành sản phẩm vali kéo chính hãng" /></li><?php */?>
            <li><a href="<?=$link_buy?>" class="btn-buy" title="<?=$productActive["name_$lg"]?>">Mua ngay</a> <a id="show_huong_dan" class="xem-them btn-buy" href="#huon_dan_mua" style="
    float: left;
    font-size: 10px;
    font-weight: bold;
">Hướng dẫn mua</a></li>
        <? }else{ ?>
            <li>Cháy hàng</li>
        <? } ?>
        <li><img src="<?=$FullUrl?>/images/chi-tiet-vali-keo.jpg" alt="chi tiết vali kéo"/></li>
        <li><?php //Template::UserControl('Share'); ?></li>
    </ul>
</div>
<div class="cl" style="margin-top:20px">&nbsp;</div>
<div class="mau-xanh"><?=info::getValueByKey("huongdanmuahangtrongchitietsanpham")?info::getValueByKey("huongdanmuahangtrongchitietsanpham"):"";?></div>


<div id="tabs">
    <ul>
        <li><a href="#tabs-1">HÌNH ẢNH CHI TIẾT SẢN PHẨM</a></li>
        <li><a href="#tabs-2">VIDEO SẢN PHẨM</a></li>
    </ul>
    <div id="tabs-1">
        <div class="mo-ta">
            <h3 class="h3-title">Hình ảnh chi tiết sản phẩm</h3>
            <? $arr = getimagesize($img); ?>
            <? if(file_exists($productActive['img'])){ ?><img title="<?=$productActive["name_$lg"]?> hình minh họa 1" alt="<?=$productActive["name_$lg"]?> hình minh họa 1" <?=$arr[0]>650?'class="hinh-anh"':'';?> src="<?=$FullUrl?>/<?=$img?>" /><br/><br/><? } ?>

            <? for($i = 1; $i <= 10; $i++){ ?>
                <? $img = GetImage($productActive["img$i"]);
                $arr1 = getimagesize($img); ?>
                <? if(file_exists($productActive["img$i"])){ ?><img title="<?=$productActive["name_$lg"]?> hình minh họa <?=$i+1?>" alt="<?=$productActive["name_$lg"]?> hình minh họa <?=$i+1?>" <?=$arr1[0]>650?'class="hinh-anh"':'';?> src="<?=$FullUrl?>/<?=$img?>" /><br/><br/><? } ?>
            <? } ?>

            <?=$productActive["descs_$lg"]?>
        </div>
        <a href="#"></a>
    </div>
    <div id="tabs-2">
        <h3>Video sản phẩm</h3>
    </div>
</div>

<? if($products_anews || $product_2){ ?>
<div class="san-pham-khac">
  <h3 class="h3-title">Sản phẩm cùng loại</h3>
  <div class="product">
    <? 
		if ($products_anews) {
			$j=0;
	  	for ($i=count($products_anews)-1; $i>=0; $i--){ 
			$j=$j+1;
			$img = GetImage($products_anews[$i]["img"]); 
			$link = GetProductLink2($products_anews[$i], $lg); 
			$link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $products_anews[$i]['id'] . "&amp;lg=$lg&amp;sl=1";
	?>
    <div class="pro-list <? if($j==4){echo 'last';$j=0;}?>">
      <ul>
        <li class="pro-img"><a href="<?=$link?>" title="<?=$products_anews[$i]["name_$lg"]?>"><img src="<?=$FullUrl?>/<?=$img?>" alt="<?=$products_anews[$i]["name_$lg"]?>" /></a></li>
        <li class="pro-name"><a href="<?=$link?>" title="<?=$products_anews[$i]["name_$lg"]?>">
          <?=$products_anews[$i]["name_$lg"]?>
          </a></li>
        <li class="pro-price"><?=number_format($products_anews[$i]["price"])?> VNĐ</li>
        <li class="pro-buy">
        	<? if ($products_anews[$i]['is_available']) { ?>
    	<a class="btn-buy" href="<?=$link_buy?>" title="<?=$products_anews[$i]["name_$lg"]?>">Mua ngay</a> <a class="xem-them btn-buy" href="<?=$link?>" title="<?=$products_anews[$i]["name_$lg"]?>">Xem</a>
    <? } else { ?>
    	<a class="btn-buy" href="#" title="<?=$products_anews[$i]["name_$lg"]?>">Cháy hàng</a>
        <p class="sold-out-list"><img src="<?=$FullUrl?>/images/sold-out-list.png" alt="sold-out-list" /></p>
    <? } ?> 
    </li>
      </ul>
    </div>
    <? }}?>
    <? 
		if ($product_2) {
			$j=0;
	  	for ($i=count($product_2)-1; $i>=0; $i--){ 
			$j=$j+1;
			$img = GetImage($product_2[$i]["img"]); 
			$link = GetProductLink2($product_2[$i], $lg); 
			$link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $product_2[$i]['id'] . "&amp;lg=$lg&amp;sl=1";
	?>
    <div class="pro-list <? if($j==4){echo 'last';$j=0;}?>">
      <ul>
        <li class="pro-img"><a href="<?=$link?>" title="<?=$product_2[$i]["name_$lg"]?>"><img src="<?=$FullUrl?>/<?=$img?>" alt="<?=$product_2[$i]["name_$lg"]?>" /></a></li>
        <li class="pro-name"><a href="<?=$link?>" title="<?=$product_2[$i]["name_$lg"]?>">
          <?=$product_2[$i]["name_$lg"]?>
          </a></li>
        <li class="pro-price"><?=number_format($product_2[$i]["price"])?> VNĐ</li>
        <li class="pro-buy">
        	<? if ($product_2[$i]['is_available']) { ?>
    	<a class="btn-buy" href="<?=$link_buy?>" title="<?=$product_2[$i]["name_$lg"]?>">Mua ngay</a> <a class="xem-them btn-buy" href="<?=$link?>" title="<?=$product_2[$i]["name_$lg"]?>">Xem</a>
    <? } else { ?>
    	<a class="btn-buy" href="#" title="<?=$product_2[$i]["name_$lg"]?>">Cháy hàng</a>
        <p class="sold-out-list"><img src="<?=$FullUrl?>/images/sold-out-list.png" alt="sold-out-list" /></p>
    <? } ?> 
    </li>
      </ul>
    </div>
    <? }}?>
  </div>
</div>
<? }else{ ?>
<div class="san-pham-khac">
<h3 class="h3-title">&nbsp;</h3>
  <div class="product">
    <div class="pro-list"></div>
</div>
</div> 
  
  
<? } ?>
<div class="cl"></div>
<div style="display:none"><div id="huon_dan_mua" style="padding:20px;"><?=info::getValueByKey("huongdanmuahang")?info::getValueByKey("huongdanmuahang"):"";?></div></div>
<script>
    $(document).ready(function(e) {
        $("a#show_huong_dan").fancybox({
            'titleShow'     : false,
            'transitionIn'	: 'elastic',
            'transitionOut'	: 'elastic',
            'easingIn'      : 'easeOutBack',
            'easingOut'     : 'easeInBack',
            'width':600
        });
    });
</script>