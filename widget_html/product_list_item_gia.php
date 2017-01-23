
    <?php if ($productObj->dangKhuyenMai()) { ?>
    <div class="price">
        <span><?php echo formatPrice($productObj->getPrice()); ?></span>
        <span class="price_old">
            <del><?php echo formatPrice($productObj->getPriceSale()); ?></del>
        </span>
    </div>
    <?php } else { ?>
    <div class="price">
        <span><?php echo formatPrice($productObj->getPrice()); ?></span>
    </div>
    <?php }; ?>

