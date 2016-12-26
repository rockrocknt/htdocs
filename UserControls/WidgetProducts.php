<?php
	global $lg, $FullUrl;

	$type = $parameters['type'];
	$widgetName = $parameters["name_$lg"];
	$limit = $parameters['qlimit'];
	$cid = $parameters["cid"];
	$widgetProducts = getWidgetProducts($type, $limit);
?>
<?php if ($widgetProducts) { ?>
	<?php if ($cid == 3) { ?>
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
                        $size = fixSize($product->getImageNoThumb(), 173, 155);
                        $img = $product->getImage($size["width"]);
						$h = number_format((155-$size["height"])/2);
                        include(TPL_DIR.'products/item.php');
                } ?>
            </ul>
        </div>
    </div>
    <?php } else { ?>
    <div class="container-ct-sidebar">
        <h3 class="title-side-bar"><?=$widgetName?></h3>
        <div class="ct-sidebar">
            <ul class="list-products-sidebar">
                <?php foreach ($widgetProducts as $obj) { 
                    $product = new products($obj);
                    $name = $product->getName();
                    $link = $product->getLink();
                ?>
                    <li>
                        <div><a title="<?=$name?>" href="<?=$link?>"><img src="<?=$product->getImage(158)?>" title="<?=$name?>" alt="<?=$name?>" /></a></div>
                        <p><a title="<?=$name?>" href="<?=$link?>"><?=$name?></a></p>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
    <?php } ?>
<?php } ?>