<?php
global $cat, $lg,$currentcat, $products, $FullUrl, $plpage;
$_SESSION['CONTINUE_SHOPPING_URL'] = GetFullUrl();
$currentcat= currentCat();

?>
<?php
    $img = $FullUrl."/images/titlebar_bg_01.jpg";
    if (file_exists($currentcat['img_topbanner']))
    {
        $img = $FullUrl."/".$currentcat['img_topbanner'];
    }
    ?>

    <section class="container fullwidth-element home-slider"
        <?php /*
         style="background-image:url(<?=$img?>)"
    */ ?>
        >

        <?  if (file_exists($currentcat['img_topbanner']))
        { ?>
            <img src="<?=$img?>" />
        <?  } ?>
        <?php /* ?>
    <div class="parallax-content">
        <h2><span><? echo $currentcat['name_'.$lg]; ?></span></h2>
    </div>

        */ ?>



    </section>
    <div class="container">

        <?php
        if (ismobile()){
            if (!isIpad())
            {
                ?>
                <?php global $showsort;
                $showsort = 2;
                ?>
                <?php
                include "widget_html/productlist_content.php"; ?>
                <?php include "widget_html/productlist_sidebar.php"; ?>
            <?
            }else{ //   if (!isIpad()) la iPad
                ?>

                <?php include "widget_html/productlist_sidebar.php"; ?>
                <?php global $showsort;
                $showsort = 2;
                ?>
                <?php
                include "widget_html/productlist_content.php"; ?>

            <?
            }

            ?>

        <?
        }else {
            ?>

            <?php include "widget_html/productlist_sidebar.php"; ?>
            <?php global $showsort;
            $showsort = 2;
            ?>
            <?php
            include "widget_html/productlist_content.php"; ?>

        <?
        }
        ?>




    </div>
<?php return ; ?>

<?php global $cat, $cat1, $cat2, $lg, $products, $FullUrl, $tag, $tagCat2; ?>

<? 
	global $FullUrl, $lg; 

	if($products) {
?>
<h2 style="color:#00F;font-size:24px;">&gt;&gt; <?=ucfirst(trim(str_replace("Sản phẩm", "", $cat['name_vn'])))?><br/><br/></h2>
<div class="product">
  <? 
  	 $j = 0;
	 foreach($products as $key => $product)
	 {
		$j = $j + 1; 
		$product_img = GetImage($product['img']);
         $product_link = "#";
		/*
		if(!empty($product['name_'.$lg]))
			$product_link = GetProductLinkFull($product, $lg); 
		else
			$product_link = "#";
		*/
		$product_title = htmlspecialchars($product['name_'.$lg]);
		$link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $product['id'] . "&amp;lg=$lg&amp;sl=1";
  ?>
  <div class="pro-list <? if($j==4){echo 'last';$j=0;}?>">
    <ul>
      <li class="pro-img"><a target="_blank" href="<?=$product_link?>" title="<?=$product_title?>"><img src="<?=$FullUrl?>/<?=$product_img?>" alt="<?=$product_title?>" title="<?=$product_title?>" /></a></li>
      <li class="pro-name"><a target="_blank" href="<?=$product_link?>" title="<?=$product_title?>"><?=$product_title?></a></li>
      <? if($product['size']){ ?><li class="pro-name">Size: <?=$product['size']?></a></li><? } ?>
      <li class="pro-price">Giá: <?=number_format($product['price'])?>đ</li>
      <li class="pro-buy">
      <? if ($product['is_available']) { ?>
    	<a class="btn-buy" href="<?=$link_buy?>" title="<?=$product_title?>">Mua ngay</a> <a target="_blank" class="xem-them btn-buy" href="<?=$product_link?>" title="<?=$product_title?>">Xem</a>
    <? } else { ?>
    	<a class="btn-buy" href="#" title="<?=$product_title?>">Cháy hàng</a>
        <p class="sold-out-list"><img src="<?=$FullUrl?>/images/sold-out-list.png" alt="sold-out-list" /></p>
    <? } ?> 
      </li>
    </ul>
  </div>
  <? }?>
</div>
<? } ?>
<?php Template::UserControl('CatProduct'); ?>
<?php Template::UserControl('Stars'); ?>