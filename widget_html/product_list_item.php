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
<?php return; ?>
<div class="product-item">
               <div class="dot-badge red">
                  hot 
               </div>
               <div class="dot-badge yellow">
                  new 
               </div>
               <a href="products-page.html">
                  <img alt="" src="/images/p1.jpg" />
                  <h1>versace</h1>
               </a>
               <div class="tag-line">
                  <span>yellow diamond</span>
                  <span>toilet water spray</span>
               </div>
               <div class="price">
                  $270.00
               </div>
               <a class="cusmo-btn add-button" href="#">add to cart</a>

</div>