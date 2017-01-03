<?php
$num = cart::getQuantity();
if ($num < 1) return; ?>
<ul class="dropdown-menu" >
    <?php
    $listPro = cart::getCart();
    for($i=0;$i<count($listPro);$i++)
    {
    $product3 = $listPro[$i];
    $productId = $product3['id'];
    $productObj = $product3["productObj"];
    ?>
    <li>
        <div class="basket-item">
            <div class="row-fluid">
                <div class="span4">
                    <div class="thumb">
                        <img src='<?=DOMAINIMAGE."/". $product3["img"]?>' />
                    </div>
                </div>
                <div class="span8">
                    <div class="title"><?=($productObj->getName())?></div>
                    <div class="price"><?=formatPrice($productObj->getPrice())?></div>
                </div>
            </div>
            <?php /*
            <a class="close-btn" href="#"></a>
            */ ?>
        </div>
    </li>
    <?php
    }
    ?>



    <li class="checkout">
        <a href="/xem-gio-hang.html" class="cusmo-btn">Xem Giỏ Hàng</a>
    </li>
</ul>