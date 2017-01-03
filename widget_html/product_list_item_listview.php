<div class="row-fluid">
<div class="span4">
    <div class="thumb">
        <img alt="<?php echo $productObj->getName(); ?>"
             src="<?=DOMAINIMAGE?>/<?php echo $productObj->getImage2(); ?>" />
    </div>
</div>
<div class="span8">
    <h3><?php echo $productObj->getName(); ?></h3>

    <div class="desc">
        <?php echo $productObj->getShortDes(); ?>
    </div>
    <?php include "widget_html/product_list_item_gia.php"; ?>

    <div class="buttons-holder">
        <a class="cusmo-btn add-button" href="#"
           onclick="addtocartandredirect('','<?php echo $productObj->getID(); ?>','qty');return false;"
            >MUA NGAY</a>
        <a class="cusmo-btn gray add-button" href="<?php echo $productObj->getLink(); ?>">XEM NGAY</a>
        <?php /* ?>
        <a class="add-to-wishlist-btn" href="#"><i class="icon-plus"></i> Add to wishlist</a>
        <?php */ ?>
    </div>
</div>
</div>
<?php return; ?>
<div class="product-item">
    <a href="<?php echo $productObj->getLink(); ?>">
        <img alt="" src="<?=DOMAINIMAGE?>/<?php echo $productObj->getImage2(); ?>" />
        <h3><?php echo $productObj->getName(); ?></h3>
    </a>
    <div class="tag-line">
        <span><?php echo $productObj->getShortDes(); ?></span>

    </div>
    <div class="price">
        <?php echo formatPrice($productObj->getPrice()); ?>
    </div>
    <a class="cusmo-btn add-button" href="<?php echo $productObj->getLink(); ?>">XEM NGAY</a>
</div>
