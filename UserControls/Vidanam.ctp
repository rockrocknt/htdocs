<div style="clear:both"></div>
<? 
		global $product;
		if ($vidanam && $product["cid"] != "743") {
			$j=0;
	  	for ($i=count($vidanam)-1; $i>=0; $i--){ 
			$j=$j+1;
			$img = GetImage($vidanam[$i]["img"]); 
			$link = GetProductLink2($vidanam[$i], $lg); 
			$link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $vidanam[$i]['id'] . "&amp;lg=$lg&amp;sl=1";
	?>
    
    <div class="pro-list <? if($j==4){echo 'last';$j=0;}?>">
      <ul>
        <li class="pro-img"><a href="<?=$link?>" title="<?=$vidanam[$i]["name_$lg"]?>"><img src="<?=$FullUrl?>/<?=$img?>" alt="<?=$vidanam[$i]["name_$lg"]?>" /></a></li>
        <li class="pro-name"><a href="<?=$link?>" title="<?=$vidanam[$i]["name_$lg"]?>">
          <?=$vidanam[$i]["name_$lg"]?>
          </a></li>
        <li class="pro-price"><?=number_format($vidanam[$i]["price"])?> VNĐ</li>
        <li class="pro-buy">
        	<? if ($vidanam[$i]['is_available']) { ?>
    	<a class="btn-buy" href="<?=$link_buy?>" title="<?=$vidanam[$i]["name_$lg"]?>">Mua ngay</a> <a class="xem-them btn-buy" href="<?=$link?>" title="<?=$vidanam[$i]["name_$lg"]?>">Xem</a>
    <? } else { ?>
    	<a class="btn-buy" href="#" title="<?=$vidanam[$i]["name_$lg"]?>">Cháy hàng</a>
        <p class="sold-out-list"><img src="<?=$FullUrl?>/images/sold-out-list.png" alt="sold-out-list" /></p>
    <? } ?> 
    </li>
      </ul>
    </div>
    <? }}?>