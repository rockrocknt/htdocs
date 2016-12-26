<?php

    global $lg, $FullUrl, $prefix_url;
     
if (isset($_POST['id'])){
    $qtty = SafeFormValue('qty');
    if (!is_numeric($qtty))    $qtty=1;
    $id = SafeFormValue('id');
    $product =new products(products::getbyID($id));
    $price =  $product->getPrice();

    cart::addProduct($id,$qtty,0,0);
    cart::setQuantity($id, $qtty);
}

if (isset($_POST['iddel'])){

    $id = SafeFormValue('iddel');
    cart::delProduct($id);
}
$num = cart::getQuantity();
if ($num <1) {
unset($_SESSION['coupon']);
//echo EMPTY_CART;
?>
<p class="alert alert-info">Không có sản phẩm nào trong giỏ hàng của bạn.</p>
<input type="hidden" id="emptyCart" value="1" />
<?php 
    return;
}
?>


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
		}
	
	?>

<div class="clear"></div>




<div class="clearfix cart display-single-price">
   <div class="page-title title-buttons">
      <h1>Giỏ hàng</h1>
   </div>
   <div class="only-large">
   <form action="" method="post">
      <input name="form_key" value="pUPlBn9EEITn8rJP" type="hidden">
      <table id="shopping-cart-table" class="cart-table data-table">
         <colgroup>
            <col width="150">
            <col>
            <col width="170">
            <col width="170">
            <col width="170">
         </colgroup>
         <thead>
            <tr class="first last">
               <th rowspan="1"><span class="nobr">Sản phẩm</span></th>
               <th rowspan="1">&nbsp;</th>
               <th rowspan="1" class="a-center">
                  <span class="first">Số lượng mua</span>
               </th>
               <th class="a-center cart-price-head" colspan="1">
                  <!--                            <div class="cart-price-placeholder">-->
                  <span class="nobr">Đơn giá</span>
                  <!--                            </div>-->
               </th>
               <th class="a-center cart-total-head" colspan="1">
                  <!--                            <div class="cart-total-placeholder">-->
                  <span class="first">Thành tiền</span>
                  <!--                            </div>-->
               </th>
            </tr>
         </thead>		<?php /*
         <tfoot>
            <tr class="first last ">
               <td colspan="50" class="a-right cart-footer-actions last">
                  <a target="_blank" href="/"><strong>Xem phí vận chuyển</strong></a>                    
               </td>
            </tr>
         </tfoot>		*/ ?>
         <tbody>
            <?php
            
            $qty  = cart::getQuantity();

            if ($qty > 0) {
            $total = 0;

            $listPro = cart::getCart();
			
            for($i=0;$i<count($listPro);$i++)
            {
                $product3 = $listPro[$i];
            ?>

            <tr class="first last odd productCartRow">
               <td class="product-cart-image">
                  <a href="<?=$product3['link']?>" title="<?=$product3['name']?>" class="product-image">
                  <img src="<?=$product3['img']?>" alt="<?=$product3['name']?>">
                  </a>
                  
               </td>
               <td class="product-cart-info">
                  <h2 class="product-name">
                     <a href="<?=$product3['link']?>"><?=$product3['name']?></a>
                  </h2>
                  <?php
                  /*
                  <p class="category">Bare Root Rose</p>
                  <p class="type">Shrub Rose</p>
                  <p class="a-left cart_delivery">
                     <span class="data"><strong>Delivery : </strong> November 2016</span>&nbsp;<i class="tooltip tip-info tooltip-triggered" title="<p>This is some dummy text for delivery items...and  this for test.</p>"></i>
                  </p>
                  */
                  ?>
                  <a href="#" title="X Remove" onclick="delProduct('<?=$FullUrl?>','<?=$product3['id']?>');return false;" class="remove-link">
                  X Xóa sản phẩm</a>
               </td>
               <td class="a-center product-cart-actions" data-rwd-label="Qty">
			   
				<div>
                                        <div class="qtyminus"
										id="tru<?=$product3['id']?>" onclick="trusoluong('<?=$FullUrl?>','tru<?=$product3['id']?>','<?=$product3['id']?>');"
										></div>
                                        <input pattern="\d*" 
				  
				  name="cart[<?=$product3['id']?>][qty]" 				  
				  id="qty<?=$product3['id']?>"
				  value="<?=$product3['soluong']?>" size="4" title="Qty" class="input-text qty" maxlength="12" type="text">
                                        <div class="qtyplus"
										id="cong<?=$product3['id']?>"  onclick="congsoluong('<?=$FullUrl?>','cong<?=$product3['id']?>','<?=$product3['id']?>');"
										></div>
                </div>
									
									
                   
				  <?php /*
				  <a 
				  onclick="capnhatsoluong('<?=$FullUrl?>','<?=$product3['id']?>')" 
				  style="float:left;">Cập nhật</a>  
				  */?>
                  
               </td>
               <td class="product-cart-price" data-rwd-label="Price" data-rwd-tax-label="Excl. Tax">
                  <span class="cart-price">
                  <span class="price"><?php echo formatPrice($product3['price']); ?></span>            
                  </span>
               </td>
               <!-- inclusive price starts here -->
               <!--Sub total starts here -->
               <td class="product-cart-total last" data-rwd-label="Subtotal">
                  <span class="cart-price">
                  <span class="price"><?php echo formatPrice($product3['thanhtien']); ?></span>                                            
                  </span>
               </td>
            </tr>

            <?php 
            } // for($i=0;$i<count($listPro);$i++)
			} // if ($qty > 0) 
            ?>
		
         </tbody>
      </table>
   </form>
   </div><!-- class= only large -->
   <div class="only-medium">

                    <div class="medium-cart">
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
                        <div class="list-item">
                            <div class="tit">&nbsp;</div>
                            <div class="cnt">
                                <a href="<?php echo $product3['link']; ?>"><img src="<?php echo $product3['img']; ?>" alt="<?php echo $product3['name']; ?>"></a>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="tit">Tên sản phẩm</div>
                            <div class="cnt">
                                <a class="name" href="<?php echo $product3['link']; ?>"><?php echo $product3['name']; ?></a>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="tit">Đơn giá</div>
                            <div class="cnt">
                                <span class="price"><?php echo formatPrice($product3['price']); ?></span>
                            </div>
                        </div>
                        <div class="list-item">
                            <div class="tit">Số lượng</div>
                            <div class="cnt">
                                <div>
                                    <div class="qtyminus"
									id="trumobile<?=$product3['id']?>" 
						onclick="trusoluong('<?=$FullUrl?>','trumobile<?=$product3['id']?>','<?=$product3['id']?>');"
									></div>
                                    <input type='text' pattern="\d*" name="quantity" 
									value='<?=$product3['soluong']?>'
									
									id="qty" class="input-text qty"  title=""/>
                                    <div class="qtyplus"
									id="congmobile<?=$product3['id']?>"  onclick="congsoluong('<?=$FullUrl?>','congmobile<?=$product3['id']?>','<?=$product3['id']?>');"
									></div>
									<?php /*
                                    <a onclick="capnhatsoluong('','98')" style="margin-left: 5px;">Cập nhật</a>
									*/?>
                                </div>
                                <!--<input value="1" type="number" min="1" max="28" title="">-->

                            </div>
                        </div>
						<div class="list-item">
                            <div class="tit">Thành tiền</div>
                            <div class="cnt">
                                <span class="price"><?php echo formatPrice($product3['thanhtien']); ?></span>
                            </div>
                        </div>
						<div class="list-item">
                            <div class="tit">&nbsp;</div>
                            <div class="cnt">
                                <a href="#" title="Remove" onclick="delProduct('','98');return false;" class="remove-link">x Xóa sản phẩm</a>
                            </div>
                        </div>
						  <?php }
        } //if ($qty > 0)
        ?> 
						
                        
                        
                    </div>
 
                </div>
	<?php  include "./templates/site/cart/promoCode.php"; ?>			
	
	<div class="row">
        <div class="col-xs-12 col-md-6 pull-right">
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
	<div class="row">
        <div class="col-xs-12 col-md-6 pull-right">
            <div class="checkout">
                <button type="button" onclick="window.location='/thanh-toan.html';" class="button btn-proceed-checkout btn-checkout">thanh toán</button>
				  
				
            </div>			<button type="button" onclick="window.location='/';" class="continueShopping button btn-proceed-checkout btn-checkout">Tiếp tục mua hàng</button>				  
        </div>
    </div>
	
	
	<div class="row">
   <div class="col-md-6">
    
   </div>
   <div class="col-md-6 cart-totals-wrapper">
      <div class="cart-totals">
         <ul class="checkout-types bottom">
            <li></li>
            <li class="method-giftregistry-cart-link"></li>
            <li class="method-accepted-payment-types">
               <p class="payment-type">
                  <span class="text">Accepted Payment Types</span>
                  <span class="img">
                  <img src="http://www.davidaustinroses.co.uk/media/jbanners/secure-payment.png" alt="Accepted Payment Types">
                  </span>
               </p>
            </li>
         </ul>
      </div>
   </div>
   <!-- <div class="cart-totals-wrapper"> -->
   </div>
</div>

 