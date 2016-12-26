<?php global $FullUrl; ?>
<div id="gClose"  onclick="javascript:jQuery('.globalCartNonEmpty').hide();">X</div>

<div class="globalCartItemHeaderBlock">
    <div class="globalCartItemHeaderItem">Item</div>

    <div class="globalCartItemHeaderQuantity">Qty</div>

    <div class="globalCartItemHeaderPrice">Price</div>

</div>


<div class="globalcartBody">


    <div class="globalCartItemInfo globalCartItemInfo1Bg" style="height: auto !important;">

        <?php
        $qty  = cart::getQuantity();

        if ($qty > 0)
        {
            $total = 0;
            $listPro = cart::getCart();
            for($i=0;$i<count($listPro);$i++)
            {
                $product3 = $listPro[$i];
                ?>
                <div class="itemNameAndImage">
                    <div class="itemImage">
                        <a href="<?=$product3["link"]?>" >
                            <img
                                width="55"
                                height="55"
                                src="<?=$FullUrl."/". $product3["img"]?>" border="0" alt="276274" class="basketItemImage">
                        </a>
                    </div>

                    <div class="itemNameAndQty">
                        <div class="name">
                            <a href="<?=$product3["link"]?>"><?=$product3["name"]?></a>
                        </div>

                        <div class="none">17in Foil Balloon</div>

                    </div>

                    <div class="itemPersonalization">

                    </div>
                </div>

                <div class="qty"><?=$product3["soluong"]?></div>

                <?php
            $total+= $product3["thanhtien"];
                ?>
                <div class="priceEach"><div class="cartmenupriceitem"><?=formatPrice($product3["thanhtien"])?></div></div>
            <?
            }//for($i=0;$i<count($listPro);$i++)
            ?>
        <?}
        ?>






    </div>

</div>
<div class="globalcartFooter">

    <div class="globalCartTotal">

        <div class="subtotal">Tổng giá:&nbsp;<?=formatPrice($total)?></div>

    </div>


    <div class="viewBasketAndCheckout">
        <div class="globalCartViewBasketBtn">
            <a href="<?=$FullUrl?>/xem-gio-hang.html">
                <img src="<?=$FullUrl?>/image_site/vieweditBasket_btn.png"
                     style="max-width: 149px !important;height: 32px !important;"
                     border="0" alt="View/edit Basket">

            </a>
        </div>

        <form id="globalCartCheckoutForm" action="<?=$FullUrl?>/index.php?do=cart&act=checkout" method="post" onsubmit="">

            <input type="hidden" name="itemPk" value="282197439">
            <input type="hidden" name="qty" id="qty_282197439" value="1">
            <input type="hidden" name="option" id="optionTypeValues_282197439" value="none">

            <div class="globalCartCheckoutBtn">
                <input type="image" name="Checkout"
                       onclick="redirect('<?=$FullUrl?>/index.php?do=cart&act=checkout');return false;"
                       src="<?=$FullUrl?>/image_site/checkout_btn.png"

                       border="0" alt="Checkout">
            </div>

        </form>

    </div>
</div>

<div class="saveShopBasket">
    <a href="/account.do?method=start"><img src="image_site/shopOnDevice_gc_btn.png" border="0" alt="Save Basket &amp; Shop on Any Device"></a>
</div>