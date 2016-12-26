<?
	global $lg, $FullUrl, $widgetMenu1, $widgetMenu2, $widgetMenu3, $widgetName, $cat1, $cat2, $cid, $limit;
	$cat = new Categories(currentCat());
	$cat1_obj = new Categories($cat1);
	$cat2_obj = new Categories($cat2);
?>
<?php if ($widgetMenu1) { ?>
	<?php if ($cid == 3) { 
		$topMenu = new Categories($widgetMenu1[0]);
		if ($topMenu->getComp()==1) {
			$widgetArticles = $topMenu->getItemsWidget($limit);
			if ($widgetArticles) { ?>
            <div class="container-sub-div">
                <h3 class="title-h3"><?=$widgetName?></h3>
                <div class="ct-div-sub">
				<?php
                    $mainNews = new articles($widgetArticles[0]);
                    $mainLink = $mainNews->getLink();
                    $mainName = $mainNews->getName();
                ?>
                <div class="main_news">
                    <p class="main_news_title"><a href="<?=$mainLink?>" title="<?=$mainName?>"><?=$mainName?></a></p>
                    <div class="main_news_img"><a href="<?=$mainLink?>" title="<?=$mainName?>"><img src="<?=$mainNews->getImage(115)?>" alt="<?=$mainName?>" title="<?=$mainName?>" /></a></div>
                    <p><?=$mainNews->getShort()?></p>
                </div>
                <?php if ($widgetArticles[1]) { ?>
                <ul class="list_articles_home">
                    <?php for ($i=1; $i<count($widgetArticles); $i++) {
                            $article = new articles($widgetArticles[$i]); ?>
                            <li><a href="<?=$article->getLink()?>" title="<?=$article->getName()?>"><?=$article->getName()?></a></li>
                    <?php } ?>
                </ul>
                <?php } ?>
                </div>
            </div>
			<?php }
		} else if ($topMenu->getComp()==2) { 
			$widgetProducts = $topMenu->getItemsWidget($limit);
			if ($widgetProducts) { ?>
            <div class="container-sub-div">
                <h3 class="title-h3"><?=$widgetName?></h3>
                <div class="ct-div-sub">
                    <ul class="list-sp">
			<?php foreach ($widgetProducts as $key=>$obj) {
					$product = new products($obj);
					$link = $product->getLink();
					$name = $product->getName();
					$price = $product->getPriceSale();
					$id = $product->getID();
					$size = fixSize($product->getImageNoThumb(), 140, 155);
					$img = $product->getImage($size["width"]);
					$h = number_format((155-$size["height"])/2);
					$isSaleoff = $product->isSaleOff();
					$percent = $product->getPercent();
					include(TPL_DIR.'products/item.php');
                } ?>
                </ul>
            </div>
        </div>
		<?php }
		} ?>
    <?php } else { ?>
    <div class="container-ct-sidebar">
        <h3 class="title-side-bar"><?=$widgetName?></h3>
        <div class="ct-sidebar">
            <ul class="recent-news">
                <?php foreach ($widgetMenu1 as $i=>$obj1) { 
                    $menu = new Categories($obj1);
                    $active = $cat1_obj->getUniqueKey()==$menu->getUniqueKey()?'class="Active"':'';
                ?>
                <li>
                    <a <?=$active?> href="<?=$menu->getLink()?>" title="<?=$menu->getName()?>" <?=$menu->hasExtLink()&&$menu->openInNewTab()?'target="_blank"':''?>><span> &rsaquo; </span><?=$menu->getName()?></a>
                    <?php if ($menu->getHasChild()==1 && $widgetMenu2[$i][0]) { ?>
                        <ul class="sub-widgetmenu">
                            <?php foreach ($widgetMenu2[$i] as $j=>$obj2) { 
                                $menu = new Categories($obj2);
                                $active = $cat2_obj->getUniqueKey()==$menu->getUniqueKey()?'class="Active"':'';
                            ?>
                            <li>
                                <a <?=$active?> href="<?=$menu->getLink()?>" title="<?=$menu->getName()?>" <?=$menu->hasExtLink()&&$menu->openInNewTab()?'target="_blank"':''?>><span> &rsaquo; </span><?=$menu->getName()?></a>
                                <?php if ($menu->getHasChild()==1 && $widgetMenu3[$i][$j][0]) { ?>
                                <ul class="sub-widgetmenu">
                                    <?php foreach ($widgetMenu3[$i][$j] as $obj3) { 
                                        $menu = new Categories($obj3);
                                        $active = $cat->getUniqueKey()==$menu->getUniqueKey()?'class="Active"':'';
                                    ?>
                                    <li>
                                        <a <?=$active?> href="<?=$menu->getLink()?>" title="<?=$menu->getName()?>" <?=$menu->hasExtLink()&&$menu->openInNewTab()?'target="_blank"':''?>><span> &rsaquo; </span><?=$menu->getName()?></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                                <?php } ?>
                            </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php } ?>
<?php } ?>