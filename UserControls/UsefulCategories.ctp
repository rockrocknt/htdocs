<? 
	global $FullUrl, $lg, $cat1, $useful_menu; 
?>

<? if($useful_menu){ ?>
<div class="sb-box">
  <h3 class="h3-title">Thông tin hữu ích</h3>
  <div class="sb-ct sanpham-hot">
    <ul class="pro-menu">
     <?php
    	foreach($useful_menu as $key1 => $value1){
			$cat_img = $value1['img'];
      ?>
      <li>
        <p><a href="<?=$value1['link'];?>" title="<?=$value1['name'];?>" <?=isset($_GET['cat1'])?($_GET['cat1']==$value1["unique_key"])?'class="active"':'':'';?>><?php /*?><? if($cat_img){ ?><img alt="<?=$value1['name'];?>" src="<?=$FullUrl?>/<?=$cat_img?>" /><? } ?><br/><?php */?><?=trim($value1['name'])?></a></p>
      </li>
   <? } ?>
    </ul>
  </div>
</div>
<? } ?>