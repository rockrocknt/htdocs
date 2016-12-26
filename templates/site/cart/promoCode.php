<!-- templates/site/cart/promoCode.php; -->
<div class="row">
        <div class="col-sm-12">
            <div class="promo">
                <form id="discount-coupon-form" action="" method="post" class="clearfix">
                    <input placeholder="Mã khuyến mãi" class="input-text" id="inputcoupon" name="coupon_code" value="" type="text">
                    <button  onclick="checkcoupon('','inputcoupon');return false;"  type="button" title="Sử dụng" class="button">SỬ DỤNG</button>
                </form>
                <div class="btn-cart">
                    <button  onclick="window.location='/thanh-toan.html';"  type="button" class="button btn-proceed-checkout btn-checkout">thanh toán</button>
                </div>
            </div>
        </div>
</div>
<?php return; ?>
<!-- templates/site/cart/promoCode.php; -->
<div class="cart-forms">
                        <form id="discount-coupon-form" action="" method="post">
    <div class="discount">
        
        <div class="discount-form">
            <input name="remove" id="remove-coupone" value="0" type="hidden">
            <div class="field-wrapper">
                <input placeholder="Mã khuyến mãi" class="input-text" id="inputcoupon" name="coupon_code" value="" type="text">
                <div class="button-wrapper">
<button type="button" title="Sử dụng" 
class="button" onclick="checkcoupon('','inputcoupon');return false;" value="Apply">SỬ DỤNG</button>
                </div>
            </div>
        </div>
    </div>
</form>
 
</div>
