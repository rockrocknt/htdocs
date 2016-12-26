<? 
	global $FullUrl, $lg, $cat1, $tag_menu; 
?>

<? if($tag_menu){ ?>
<div class="sb-box">
  <h3 class="h3-title">Xem theo nhu cầu</h3>
  <div class="sb-ct sanpham-hot">
    <ul class="pro-menu">
    <li>Túi xách, cặp da<ul>
     <?php
    	foreach($tag_menu as $key1 => $value1){
			$cat_img = $value1['img'];
            if(strpos($value1['name'],'cặp') !== false || strpos($value1['name'],'cặp da') !== false){
      ?>
      <li>
        <p><a href="<?=$value1['link'];?>" title="<?=$value1['name'];?>" <?=isset($_GET['cat1'])?($_GET['cat1']==$value1["unique_key"])?'class="active"':'':'';?>><?php /*?><? if($cat_img){ ?><img alt="<?=$value1['name'];?>" src="<?=$FullUrl?>/<?=$cat_img?>" /><? } ?><br/><?php */?><?=trim($value1['name'])?></a></p>
      </li>
   <? }} ?>
   	  <li><a href="/cap-da-that/" title="Cặp da thật">Cặp da thật</a></li>
      <li><a href="/cap-khoa-so/" title="Cặp khóa số cao cấp">Cặp khóa số cao cấp</a></li>
   </ul></li>
   <li>Túi đựng Ipad<ul>
     <?php
    	foreach($tag_menu as $key1 => $value1){
			$cat_img = $value1['img'];
            if(strpos($value1['name'],'Ipad') !== false){
      ?>
      <li>
        <p><a href="<?=$value1['link'];?>" title="<?=$value1['name'];?>" <?=isset($_GET['cat1'])?($_GET['cat1']==$value1["unique_key"])?'class="active"':'':'';?>><?php /*?><? if($cat_img){ ?><img alt="<?=$value1['name'];?>" src="<?=$FullUrl?>/<?=$cat_img?>" /><? } ?><br/><?php */?><?=trim($value1['name'])?></a></p>
      </li>
   <? }} ?>
   </ul></li>
   <li>Ví da, bóp da nam<ul>
   		<li><a href="/vi-da-nam/" title="Ví da nam cao cấp hàng hiệu">Ví da, bóp da nam cao cấp hàng hiệu</a></li>
     <?php
    	foreach($tag_menu as $key1 => $value1){
			$cat_img = $value1['img'];
            if(strpos($value1['name'],'Ví') !== false){
      ?>
      <li>
        <p><a href="<?=$value1['link'];?>" title="<?=$value1['name'];?>" <?=isset($_GET['cat1'])?($_GET['cat1']==$value1["unique_key"])?'class="active"':'':'';?>><?php /*?><? if($cat_img){ ?><img alt="<?=$value1['name'];?>" src="<?=$FullUrl?>/<?=$cat_img?>" /><? } ?><br/><?php */?><?=trim($value1['name'])?></a></p>
      </li>
   <? }} ?>
   </ul></li>
   <li>Dây nịt, thắt lưng da nam<ul>
     <?php
    	foreach($tag_menu as $key1 => $value1){
			$cat_img = $value1['img'];
            if(strpos($value1['name'],'thắt lưng') !== false){
      ?>
      <li>
        <p><a href="<?=$value1['link'];?>" title="<?=$value1['name'];?>" <?=isset($_GET['cat1'])?($_GET['cat1']==$value1["unique_key"])?'class="active"':'':'';?>><?php /*?><? if($cat_img){ ?><img alt="<?=$value1['name'];?>" src="<?=$FullUrl?>/<?=$cat_img?>" /><? } ?><br/><?php */?><?=trim($value1['name'])?></a></p>
      </li>
   <? }} ?>
   </ul></li>
   <li>Túi du lịch nam<ul>
   		<li><a href="/tui-trong/" title="Túi trống cao cấp">Túi trống cao cấp</a></li>
   </ul></li>
    </ul>
  </div>
</div>
<? } ?>

<div class="sb-box">
  <h3 class="h3-title">Xem theo hiệu</h3>
  <div class="sb-ct sanpham-hot">
    <ul class="pro-menu brand-list">
     <?php
    	foreach($menu as $key1 => $value1){
			$cat_img = $value1['img'];
            if($value1['unique_key'] != "cap-da-that" && $value1['unique_key'] != "tui-trong" && $value1['unique_key'] != "cap-khoa-so" && $value1['unique_key'] != "vi-da-nam"){
      ?>
      <li>
        <p><a href="<?=$value1['link'];?>" title="<?=$value1['name'];?>" <?=isset($_GET['cat1'])?($_GET['cat1']==$value1["unique_key"])?'class="active"':'':'';?>><?=trim(str_replace("Sản phẩm", "", $value1['name']))?></a></p>
      </li>
   <? }} ?>
    </ul>
  </div>
</div>