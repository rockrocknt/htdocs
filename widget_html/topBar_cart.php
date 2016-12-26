<?php

    global $lg, $FullUrl, $prefix_url;
	
$num = cart::getQuantity();
if ($num <1) {
unset($_SESSION['coupon']);
//echo EMPTY_CART;
    return;

}
$totalall = cart::getTotalMoney();

?>
<script>
function close_cart_btn()
{
    //$('#miniCart').toggle();
}
</script>
                        <a href="/xem-gio-hang.html" class="">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                            Giỏ hàng (<span><?php echo $num; ?></span> sản phẩm)
                        </a>
                        <div class="block-cart" id="miniCart">
                            <div class="content-wrapper clearfix">

                                <div class="minicart-wrapper">
                                    <p class="block-subtitle">
                                        Sản phẩm đã chọn <?php /* <span class="pull-right" id="cart-close" onclick="close_cart_btn();">X</span> */ ?>
                                    </p>

                                    <div>
                                        <ul class="mini-products-list" id="cart-sidebar">
											<?php
            
											$qty  = cart::getQuantity();

											
											$total = 0;

											$listPro = cart::getCart();
											
											for($i=0;$i<count($listPro);$i++)
											{
												$product3 = $listPro[$i];
											?>
                                            <li class="item odd" xmlns="http://www.w3.org/1999/html">
											    <a href="<?=$product3['link']?>" title="<?=$product3['name']?>" class="product-image">
													<img width="70" height="70"  src="/<?=$product3['img']?>" alt="<?=$product3['name']?>">
												</a>
                                                <div class="product-details">
                                                    <p class="product-name">
													<a href="<?=$product3['link']?>"><?=$product3['name']?></a>
													 
															</p>
                                                    <p class="category"><?php echo $product3['categoryName']; ?></p>
													<?php /*
                                                    <p class="type">
                                                        Shrub Rose </p>
														*/ 
														?>
                                                    <div class="info-wrapper">
                                                        <p class="qty-wrapper">Số lượng: <?=$product3['soluong']?></p>
                                                        <p class="price-box">
                                                            <span class="price"><?php echo formatPrice($product3['thanhtien']); ?></span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
											<?php 
											} //for($i=0;$i<count($listPro);$i++)
											?>
											<?php /*
                                            <li class="item last even" xmlns="http://www.w3.org/1999/html">
                                                <a title="Teasing Georgia" class="product-image" href="#"><img width="70" height="70" alt="Teasing Georgia" src="http://www.davidaustinroses.co.uk/media/catalog/product/cache/1/thumbnail/70x70/9df78eab33525d08d6e5fb8d27136e95/T/e/Teasing_Georgia_1.jpg"></a>
                                                <div class="product-details">
                                                    <p class="product-name"><a href="#">Teasing
                                                            Georgia</a></p>
                                                    <p class="category">Bare Root Rose</p>
                                                    <p class="type">
                                                        Shrub Rose </p>
                                                    <div class="info-wrapper">
                                                        <p class="qty-wrapper">Qty: 1</p>
                                                        <p class="price-box">
                                                            <span class="price">£16.50</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
											*/ ?>
											
                                        </ul>
                                    </div>
                                    <script type="text/javascript">
                                        //decorateList('cart-sidebar', 'none-recursive');
                                        $j('document').ready(function () {
                                            var minicartOptions = {
                                                formKey: "wqi73csudlMJ61uQ"
                                            };
                                            var Mini = new Minicart(minicartOptions);
                                            Mini.init();
                                        });
                                    </script>

                                    <div id="minicart-widgets">
                                    </div>
                                    <div class="block-content">
                                        <p class="subtotal">
                                            <span class="label">Tổng cộng</span> <span class="price"><?php echo formatPrice($totalall); ?></span></p>
                                    </div>

                                    <div class="minicart-actions clearfix">
                                        <ul class="checkout-types minicart">
                                            <li>
                                                <a title="Xem giỏ hàng" class="button checkout-button" href="/xem-gio-hang.html">
                                                    Xem Giỏ hàng </a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>