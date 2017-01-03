
    <?php if ($productObj->dangKhuyenMai()) { ?>
    <div class="price">
        <span><?php echo formatPrice($productObj->getPrice()); ?></span>
        <span class="old"><?php echo formatPrice($productObj->getPriceSale()); ?></span>
    </div>
    <?php } else { ?>
    <div class="price">
        <span><?php echo formatPrice($productObj->getPrice()); ?></span>
    </div>
    <?php }; ?>

