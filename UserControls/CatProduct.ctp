<? global $FullUrl, $lg; ?>
<? if($tag_menus){ ?>
<div class="sb-box">
  <h3 class="h3-title">Xem theo nhu cầu</h3>
  <div class="product nhucau">
  	<ul class="product-cat">
  	<? 
		foreach($tag_menus as $key => $tag_menu){
			$cid = $tag_menu["id"];
			$link = $FullUrl . "/" . $tag_menu["unique_key_vn"] . "/";
	?>
    <li <?=($key+1)%4==0?"class='no-margin'":"";?>><a href="<?=$link?>" title="<?=$tag_menu["name_vn"]?>"><span class="cat-name"><?=$tag_menu['name_vn']?></span></a></li>
    <? } ?>
    </ul>
  </div>
</div>
<? } ?>
<? if($hot_cats){ ?>
<div class="sb-box">
  <h3 class="h3-title">Xem túi xách nam theo hiệu</h3>
  <div class="product brand">
  	<ul class="product-cat">
  	<? 
		foreach($hot_cats as $key => $hot_cat){
			$cid = $hot_cat["id"];
			$link = $FullUrl . "/" . $hot_cat["unique_key_vn"] . "/"; 
	?>
    <li <?=($key+1)%4==0?"class='no-margin'":"";?>><a href="<?=$link?>" title="<?=$hot_cat["name_vn"]?>"><img src="<?=$FullUrl?>/<?=$hot_cat["img"]?>" alt="<?=$hot_cat["name_vn"]?>" />
    <br/><span class="cat-name"><?=ucfirst(trim(str_replace("Sản phẩm", "", $hot_cat['name_vn'])))?></span>
    </a></li>
    <? } ?>
    </ul>
  </div>
</div>
<? } ?>