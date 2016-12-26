

<link rel="stylesheet" href="/css/checkout.css">
<!-- Titlebar
================================================== -->
<section class="page-title">
		<div class="container">	  
	      <div class="row">
		    <div class="col-sm-12 col-md-12 title">
			  <h2>Thông tin giao hàng</h2>
              <ol class="breadcrumb">
                 
				<li><a class="pathway" href="/">Trang chủ</a></li>                
				<li><a class="pathway" href="/xem-gio-hang.html">Giỏ hàng</a></li>             
				<li class="active">Thanh toán</li>				  
		      </ol>
			</div>
		  </div>
		</div>
</section>
<section class="main-body">
	<div class="container">
		<div class="row">
				<?php
global $lg, $FullUrl, $prefix_url;
$tongsanpham = cart::getQuatity();
if ($tongsanpham) {
    ?>
    <div class="container">

        <div class="col-md-6 col-xs-12">

            <!-- Billing Details Content -->
            <div class="checkout-section active"><span>1</span> Thông tin giao hàng</div>
            <div class="checkout-content">

                <label>Họ tên: <abbr>*</abbr></label><input
                    class="input-text " id="firstname" value="<?php
                echo getsession('firstname')
                ?>" type="text">
                <label>Email: <abbr>*</abbr></label><input
                    class="input-text " id="email" value="<?php
                echo getsession('email');
                ?>" type="text">
                <label>Số điện thoại: <abbr>*</abbr></label>
                <input class="input-text "  id="phone"  value="<?php
                echo getsession('phone');
                ?>" type="text">
                <label>Địa chỉ giao hàng: <abbr>*</abbr></label>
                <input class="input-text "  id="address"  value="<?php
                echo getsession('address_giaohang');

                ?>" type="text">

                <?php
                if (isset($_SESSION['testaccount']))
                {
                ?>

                <label>Tỉnh: <abbr>*</abbr></label>
                <input class="input-text "  id="city"  value="<?php
                echo getsession('address_tinh');

                ?>" type="text">
                <?php
                }
                ?>

                <?php /*
                <div class="fullwidth none">
                    <label class="billing">Cách thanh toán: <abbr>*</abbr></label>
                    <select style="width: 450px;" id="cachthanhtoan" class="estshipMethod" name="shipMethod" onchange="onchangetinhddd('');">
                        <?php
                        $cachthanhtoan  = getsession('cachthanhtoan');
                        if ($cachthanhtoan == "") $cachthanhtoan =1;
                        ?>
                        <option <?php echoSelectID($cachthanhtoan,1) ?> value="1">Thanh toán cho người giao hàng (chỉ áp dụng cho nội thành tp.HCM và Hà Nội)</option>
                        <option <?php echoSelectID($cachthanhtoan,2) ?> value="2">Chuyển khoản qua ngân hàng</option>
                    </select>

                </div>
                */ ?>
                Ghi chú thêm:
                <textarea name="comment" cols="40" rows="4" id="note" class="txt"><?=getsession("note")?></textarea>
                <div class="clearfix"></div>
            </div>

            <div class="checkout-section active"><span>2</span>Cách thanh toán</div>
            <div class="checkout-content" id="payment">
                <ul class="payment_methods methods">
                    <li class="payment_method_bacs">
                        <input
                            id="payment_method_bacs"
                            class="input-radio"
                            name="payment_method"
                            value="1"
                            checked="checked"
                            data-order_button_text=""
                            type="radio">
                        <label for="payment_method_bacs">Thanh toán tận nơi (nếu ở TPHCM)</label>
                        <div style="display: none;" class="payment_box payment_method_bacs"><p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</p>
                        </div>						</li>
                    <li class="payment_method_cheque">
                        <input id="payment_method_cheque"
                               class="input-radio"
                               name="payment_method"
                               value="2"
                               data-order_button_text=""
                               type="radio">
                        <label for="payment_method_cheque">Thanh toán chuyển khoản (nếu ở các tỉnh thành khác)</label>
                        </li>
                 <li class="payment_method_cheque">
                        <input id="payment_method_cuahang"
                               class="input-radio"
                               name="payment_method"
                               value="3"
                               data-order_button_text=""
                               type="radio">
                        <label for="payment_method_cuahang">Thanh toán tại cửa hàng (nếu đến cửa hàng xem cây và mua)</label>
                        </li>
                 



                    <li>
                        <div class="payment_box payment_method_cheque" style="display: block;">
                            <p><a href="/mua-hang-online/" target="_blank" title="xem cách thanh toán online"><font size="3"> &gt;&gt;xem cách thanh toán online&lt;&lt; </font></a></p>
                        </div>
                    </li>

                </ul>
            </div>
            <div class="clearfix"></div>
            <div id="loading" class="none"><img src="/image_site/loading_spinner.gif" style="width:40px;" />Đang xử lý, xin bạn hãy đợi....</div>
			
				<button type="button" 
				id="btnHoanTat"
				onclick="finishcheckout('<?=$FullUrl?>');return false;"
				title="Thanh toán" class="btn-hoantat button btn-proceed-checkout btn-checkout" 
				>
				   HOÀN TẤT</button>
			
            

            <div class="input-radio">Bằng cách đặt hàng, bạn đồng ý với<a class="dieukhoan" href="/dieu-khoan-su-dung-hongleo/" target="_blank"> Điều khoản sử dụng</a> của HongLeoCoLong.vn</div>


        </div>

        <!-- Billing Details / Enc -->


        <!-- Checkout Cart -->
        <div class="col-md-6 col-xs-12">
            <div class="checkout-section cart">Giỏ hàng - <a href="<?=$FullUrl?>/xem-gio-hang.html">Chỉnh sửa</a></div>
            <!-- Cart -->
            <?php /*
            <table class="stacktable small-only">
                <tbody>
                <tr class="st-space">
                    <td></td>
                    <td></td>
                </tr>
                <tr class="st-new-item">
                    <td class="st-key"></td>
                    <td class="st-val st-head-row"><img src="images/small_product_list_08.jpg" alt=""></td>
                </tr>
                <tr>
                    <td class="st-key"></td>
                    <td class="st-val"><a href="#">Converse All Star Trainers</a></td>
                </tr>
                <tr>
                    <td class="st-key">Price</td>
                    <td class="st-val">$79.00</td>
                </tr>
                <tr>
                    <td class="st-key">Qty</td>
                    <td class="st-val">1</td>
                </tr>
                <tr>
                    <td class="st-key">Total</td>
                    <td class="st-val">$79.00</td>
                </tr>
                <tr class="st-space">
                    <td></td>
                    <td></td>
                </tr>

                </tbody>
            </table>
 */?>
            <table class="cart-table responsive-table stacktable large-only">

                <tbody><tr>
                    <th class="hide-on-mobile">Sản phẩm</th>

                    <th>Giá</th>
                    <th>S.lượng</th>
                    <th>Tổng cộng</th>
                </tr>

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
                    <?php
                    $total+= $product3["thanhtien"];
                    ?>
                <!-- Item #1 -->
                <tr>
                    <td class="hide-on-mobile" align="center">
                        <img src="<?=$FullUrl."/". $product3["img"]?>"
                                                    style="width: 70px;" alt="">
                        
                        <a href="<?=$product3["link"]?>"><?=$product3["name"]?></a>
                    </td>

                    <td><?= formatPrice($product3["price"])?></td>
                    <td class="qty-checkout"><?=$product3["soluong"]?></td>
                    <td class="cart-total"><?= formatPrice($product3["thanhtien"])?></td>
                </tr>

                <?
                }//for($i=0;$i<count($listPro);$i++)
                    ?>
                <?}
                ?>

                </tbody></table>
			<?php /*
            <!-- Apply Coupon Code / Buttons -->
            <table class="cart-table bottom">

                <tbody>

                <?php if (isset($_SESSION['coupon'])) {
                    $coupon = $_SESSION['coupon'];

                    $sotiengiam = $coupon['sotiengiam'];
                    //echo $totalall." ".$sotiengiam;
                    $totalall = $total;
                    if ($coupon['coupontype'] == 0)
                        $totalall = $totalall- $sotiengiam;
                    else{
                        $sotiengiam =($totalall * $sotiengiam) / 100;

                        $totalall = $totalall - ( $sotiengiam);
                    }

                    // $row = $_SESSION['coupon'];
                    $total =  $totalall;
                    ?>


                    <tr>
                        <th class="checkout-totals">
                            <div class="checkout-subtotal">
                                Mã khuyến mãi (<?=$coupon['code']?>) : <span>-<?=formatPrice($sotiengiam)?></span>
                            </div>
                        </th>
                    </tr>



                <?}?>

                <tr>
                    <th class="checkout-totals">
                        <div class="checkout-subtotal" style="font-weight: normal;">
                            Phí vận chuyển:  thông báo sau.
                        </div>
                    </th>
                </tr>

                <tr>
                    <th class="checkout-totals">
                        <div class="checkout-subtotal">
                            Tổng cộng: <span><? echo formatPrice($total);?></span>
                        </div>
                    </th>
                </tr>




                </tbody>
			</table>
			*/ ?>
				
				<div class="row">
        <div class="col-xs-12 col-md-12 pull-right">
            <div class="cart-result">
                <div>
                    <div class="tit">Tổng tiền hàng</div>
                    <div class="cnt">
                        <span class="price"><?php echo formatPrice($totalall); ?></span>
                    </div>
                </div>
				<?php $totalall = cart::getTotalMoney();
        ?>
			<?php
        if (isset($_SESSION['coupon'])) {
            $coupon = $_SESSION['coupon'];
            // mac dinh
            $sotiengiam = $coupon['sotiengiam'];
            if ($coupon['coupontype'] == 0)
                $totalall = $totalall- $sotiengiam;
            else{
                $sotiengiam =($totalall * $sotiengiam) / 100;

                $totalall = $totalall - ( $sotiengiam);
            }

           // $totalall =  $totalall - $row['sotiengiam'];

            ?>
            <div>
                    <div class="tit">Mã khuyến mãi    (<?=$coupon['code']?>)</div>
                    <div class="cnt">
                        <span class="price">-<?=formatPrice($sotiengiam)?></span>
                    </div>
                </div>
        <?}?>
                
                <div>
                    <div class="tit">Phí vận chuyển</div>
                    <div class="cnt">
                        Tùy thuộc vào khu vực <a href="#">Xem qui định</a>
                    </div>
                </div>
                <div>
                    <div class="tit">Tổng đơn hàng</div>
                    <div class="cnt">
                        <span class="price"><strong><?php echo formatPrice($totalall); ?></strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
        </div>
        <!-- Checkout Cart / End -->


    </div>

<?
} else {
    $page = $FullUrl . "/";
    page_transfer2($page);
} ?>
		</div>
	</div>
</section>


