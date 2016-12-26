<?php
	global $FullUrl;
	$cart2 = cart::getcart();
	$tongsanpham = cart::getQuatity(); 
	if ($tongsanpham < 1) return 0;
?>  
  <div id="top-left"></div>
  <div id="mid-left">
    <h3>Giỏ hàng</h3>
      <ul class="list-cart">
     <?php
			$total = 0;
			$soluong = 0;
			for($i=0;$i<$tongsanpham;$i++){
				$item = $cart2[$i];
				$k = $i + 1;
				$total += $item['thanhtien'];
				$soluong += $item['soluong'];
		?>
       <li> 
       <span class="img-buy"><img width="40px" height="40px" alt="" src="<?=$FullUrl.'/'.GetImage($item['img'])?>"></span>
        <div>
        	<span style="font-weight:bold;"><?php echo $item['name_'.$lg]." ".$item['code'] ?></span>
            <span style="font-size:11px;">Giá:<?php echo number_format($item['price']);?>đ&nbsp;&nbsp;Số lượng:<?php echo $item['soluong'];?></span>
        </div>
        <div class="floatleft"><a onclick="return Cart('<?php echo $item['id'];?>', '', 'delete')" title="Xóa" href="#"></a></div>
      </li>
      <?php
			}
	  ?>
            </ul>
    <span class="tong-so"> <strong>Số lượng:&nbsp;&nbsp;</strong><?php echo number_format($soluong); ?></span><br>
    <span class="tong-so"> <strong>Tổng tiền:&nbsp;</strong><?php echo number_format($total)." ".CST_CURRENCY_CODE; ?></span> 
     <a onclick="window.location.href='<?=$FullUrl?>/index.php?do=cart&amp;act=view'" class="thanhtoan">Xem giỏ hàng</a>
     <a onclick="window.location.href='<?=$FullUrl?>/index.php?do=cart&amp;act=checkout'" class="thanhtoan">Thanh toán</a>
     <a title="Ẩn giỏ hàng" href="#" onclick="return hideCart();" id="click-cart-1"> Ẩn giỏ hàng </a>
     </div>
  <div id="bottom-left"></div>