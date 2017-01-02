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
