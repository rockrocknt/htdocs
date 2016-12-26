<?php
global $title_bar,$do,$cat,$lg, $FullUrl,$catphukien;
$currentcat = currentCat();
?>
<?php
$temp = new Categories($currentcat);
$listChild = $temp->getChilds();
?>

<script type="text/javascript" src="<?=$FullUrl?>/fancy215/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?=$FullUrl?>/fancy215/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- Add fancyBox - media helper (this is optional) -->
<script type="text/javascript" src="<?= $FullUrl ?>/fancy215/helpers/jquery.fancybox-media.js?v=1.0.0"></script>

<script type="text/javascript">
    $(document).ready(function() {
        /*
         *  Simple image gallery. Uses default settings
         */

        $('.quick-shop').fancybox({"width":930,"height":530});
        $('.fancybox').fancybox({"width":930,"height":530});
        $('.fancybox-media').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            helpers : {
                media : {}
            }
        });

    });
    function fancyboxvideo()
    {

        $('#avideo').trigger('click');
        // alert('helo');
    }
</script>

<div class="sidebar">
    <h3 class="title" style="color: <?= $currentcat["bgcolor_code"] ?>">
        <?= $currentcat["name_".$lg] ?>
    </h3>
    <nav>
        <?php include "widget_html/leftmenusinhnhat.php"; ?>
    </nav>
</div>
<div class="wp-container">
    <?=$title_bar?$title_bar:navigationBar()?>
    <br/>
    <?php if (file_exists($currentcat["img_topbanner"])) {?>
        <div class="banner-cate-promotion">
            <a href="<?=$currentcat["banner_top_url"]?>" title="Info">
                <img src="<?=$FullUrl."/".$currentcat["img_topbanner"]?>" width="750" alt="" />
            </a>
        </div>
    <?} ?>

    <hr>
    <div class="product-content">
        <?php
        for ($i = 0; $i < count($listChild); $i++) {
        if (isset($listChild[$i])) {
        $item = $listChild[$i];
        $temp2 = new Categories($item);
        $link = $temp2->getLink();
        ?>
            <h3 class="">
                <? echo $temp2->getName(); ?>
            </h3>
            <div class="clear"></div>
            <ul class="list-product">
                <?php
                $products = products::getbycid($temp2->getID());

                /*
                for ($iaa = 0; $iaa < count($products); $iaa++) {
                    if (isset($products[$iaa])) {
                        $item = $products[$iaa];
                        $temp2 = new products($item);
                        $link = $temp2->getLink();
                        ?>
                        <li>
                            <a
                                class="fancybox"
                                data-fancybox-type="iframe"
                                data-fancybox-width="900"
                                href="/index.php?do=products&act=detail_quickview&master=index_empty&id=<?=$item['id']?>"

                                >
                                <img src="<? echo $FullUrl."/".$item['img'] ?>" style="max-width: 172px;" height="172">
                            </a>
                            <div class="product-decs">
                                <a
                                   class="quick-shop"
                                   data-fancybox-type="iframe"
                                   data-fancybox-width="900"
                                    <?php if ($temp2->coFlash()) { ?>

                                        href="/index.php?do=products&act=detail_quickview_nho&master=index_empty&id=<?=$item['id']?>"
                                    <?}else{?>
                                        href="/index.php?do=products&act=detail_quickview&master=index_empty&id=<?=$item['id']?>"
                                    <? } ?>

                                    >
                                    quick shop
                                </a>
                                <h3>
                                    <a

                                       class="fancybox"
                                       data-fancybox-type="iframe"
                                       data-fancybox-width="900"
                                       href="/index.php?do=products&act=detail_quickview&master=index_empty&id=<?=$item['id']?>"

                                        >
                                        <? echo $temp2->getName(); ?>
                                    </a>
                                </h3>
                                <p class="none">

                                </p>

                                <?php if ($temp2-> getPriceSale() > 0) { ?>
                                    <p class="price" style="text-decoration: line-through;">
                                        <?
                                        echo    formatPrice($temp2->getPriceSale());
                                        ?>
                                    </p>
                                <?
                                }?>
                                <p class="price">
                                    <?
                                    echo    formatPrice($temp2->getPrice());
                                    ?>
                                </p>
                            </div>
                        </li>
                    <?php
                    } // if (isset($products[$i])) {
                } // for ($i = 0; $i < count($products); $i++) {
                */
                ?>
            </ul>
            <?
            // show san pham
            //$product_in_one_row = $item['product_in_one_row'];
            global $listProduct;
            $listProduct = $products;

            include "widget_html/productsList.php";
            ?>
            <div class="clear"></div>
        <?php
            } //if (isset($listChild[$i])) {
        } // for ($i = 0; $i < count($listChild); $i++) {
        ?>









        <h3 class="none">
            <? echo $currentcat["name_".$lg]; ?>
        </h3>
        <ul class="sort-box none">
            <li>
                <label>Sắp xếp</label>
            </li>
            <li>
                <select class="sort">
                    <option selected="selected" value="0">Lựa chọn của chúng tôi</option>
                    <option value="1">Lựa chọn 1</option>
                    <option value="2">Lựa chọn 2</option>
                </select>
            </li>
        </ul>
        <div class="clear"></div>
        <ul class="list-product none">

            <?php
            for ($i = 0; $i < count($listChild); $i++) {
                if (isset($listChild[$i])) {
                    $item = $listChild[$i];
                    $temp2 = new Categories($item);
                    $link = $temp2->getLink();
                    ?>
                    <li>
                        <a href="<?=$link?>" >
                            <img src="<? echo $FullUrl."/".$item['img'] ?>" width="172" height="172">
                        </a>
                        <div class="product-decs">
                            <a title="Info" href="#" class="quick-shop none">
                                quick shop
                            </a>
                            <h3>
                                <a href="<?=$link?>">
                                    <? echo $temp2->getName(); ?>
                                </a>
                            </h3>
                            <p class="none">

                            </p>
                            <p class="price none">
                                $2.99
                            </p>
                        </div>
                    </li>
                <?php
                }
            }
            ?>


        </ul>
    </div>
</div>

<?php
return;
	global $lg, $FullUrl, $prefix_url, $submenus, $plpage;
?>
<div class="ct-div-sub">
  <?php if ($submenus) { ?>
    <ul class="list_articles">
		<?php foreach ($submenus as $obj) {
            $submenu = new Categories($obj);
            $link = $submenu->getLink();
            $name = $submenu->getName();
			$comp = $submenu->getComp();
			$size = fixSize($submenu->getImageNoThumb(), 88, 78);
			$h = number_format((78-$size["height"])/2);
        ?>
        <li> 
           	<p class="title-art-list"><a title="<?=$name?>" href="<?=$link?>"><?=$name?></a></p>
            <a class="images" title="<?=$name?>" href="<?=$link?>"> <img src="<?=$submenu->getImage($size["width"])?>" <?=$h>0?'style="margin-top:'.$h.'px"':""?> alt="<?=$name?>" /> </a>
            <div class="intro_art">
            	<p><?=$submenu->getShort()?></p>
            </div>
            <?php if ($submenu->getHasChild()==0) { ?>
                <p class="meta_art">
            		<?php if ($comp==1 || $comp==2) { ?>
                	<span><strong><?=$submenu->getNumItem()?></strong> <?=$comp==1?CAT_NEWS:CAT_PRODUCTS?></span>
                	<?php } ?>
                    <span><strong><?=number_format($submenu->getView())?></strong> <?=SITE_VIEW?></span>
                </p>
            <?php } else { ?>
                <p class="meta_art">
                	<span><strong><?=$submenu->getNumChild()?></strong> <?=SITE_SUB_MENU?></span>
                </p>
            <?php } ?>
        </li>
        <?php } ?>
    </ul>
  	<?=$plpage?>
  <?php } else echo SITE_NO_NEWS; ?>
</div>