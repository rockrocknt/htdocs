<? 
	global $db, $order, $stips;

	$sql = "select * from payments where id=".$order["paymentid"];
	$payment = $db->getRow($sql);
	
	if ($payment["alias"] == "Bank")
	{
		$sql = "select * from banks where id=".$order["paymenttype"];
		$bank = $db->getRow($sql);
	}
?>

<form name="supplier" id="frmEdit" class="form" action="admin.php?do=orders&act=viewsm<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Thông tin người mua hàng</h6>
		</div>
		<div class="formRow">
			<label>Họ tên</label>
			<div class="formRight">
                <input type="text" name="name" class="tipS" disabled="disabled" value="<?=$order['orderName'];?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" class="tipS" disabled="disabled" value="<?=$order['orderEmail']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Số điện thoại</label>
			<div class="formRight">
                <input type="text" name="phone" class="tipS" disabled="disabled" value="<?=$order['orderPhone']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Địa chỉ</label>
			<div class="formRight">
                <input type="text" class="tipS" disabled="disabled" value="<?=$order['orderAddress']?>" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Thông tin người nhận hàng</h6>
		</div>
		<div class="formRow">
			<label>Họ tên</label>
			<div class="formRight">
                <input type="text" name="name" class="tipS" disabled="disabled" value="<?=$order['receiveName'];?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" class="tipS" disabled="disabled" value="<?=$order['receiveEmail']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Số điện thoại</label>
			<div class="formRight">
                <input type="text" name="phone" class="tipS" disabled="disabled" value="<?=$order['receivePhone']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Địa chỉ giao hàng</label>
			<div class="formRight">
                <input type="text" name="address" class="tipS" disabled="disabled" value="<?=$order['receiveAddress']?>" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Chi tiết đơn hàng</h6>
		</div>
		<div class="formRow">
			<label>Mã đơn hàng</label>
			<div class="formRight">
                <input type="text" class="tipS" disabled="disabled" value="<?=$order['odr_id']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Ngày đặt hàng</label>
			<div class="formRight">
                <input type="text" name="dated" class="tipS" disabled="disabled" value="<?=formatDateTime($order['odr_insert_date'])?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
			<label>Cách thanh toán</label>
			<div class="formRight">
                <input type="text" name="payment" class="tipS" disabled="disabled" value="<?
					echo $payment["name_vn"].($bank?" - ".$bank["bank_vn"]:""); 
				?>" />
			</div>
			<div class="clear"></div>
        </div>
		<div class="formRow">
			<label>Lời nhắn khách hàng</label>
			<div class="formRight">
				<textarea rows="8" cols="" readonly="readonly" class="tipS"><?=$order["odr_note"]?></textarea>
			</div>
			<div class="clear"></div>
		</div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
            <thead>
              <tr>
                <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>
                <td><div>Thông tin sản phẩm</div></td>
                <td><div>Hình sản phẩm</div></td>
                <td width="200"><div>Giá</div></td>
                <td width="150"><div>Số lượng</div></td>
                <td width="200">Thành tiền</td>
              </tr>
            </thead>
            <tfoot>
              <tr>
              	<td></td>
                <td colspan="5">
                	<input type="hidden" name="id" value="<?=$order['odr_id']?>" />
            		<input type="submit" class="blueB" value="Hoàn tất" style="width:90px; margin-top:10px;" />
                </td>
              </tr>
            </tfoot>
            <tbody>
            <? 
				$percent = Info::getInfoField('percent');
				$total = 0;
				for ($i=0; $i<count($stips) && $stips; $i++) { 
				$price = $stips[$i]['price_sale']?$stips[$i]['price_sale']:$stips[$i]['price'];
				$price += $price*$percent/100;
				$total += $price * $stips[$i]['od_pro_quantity'];
			?>
              <tr>
                <td align="center"><?=$i+1?></td>
                <td class="title_name_data">
                    <div class="order-infos">
                        <p><span class="order-info-title">Tên SP:</span><span><?=$stips[$i]['name_vn']?></span></p>
                        <?php if ($stips[$i]['code']) { ?>
                        <p><span class="order-info-title">Mã SP:</span><span><?=$stips[$i]['code']?></span></p>
                        <?php } ?>
                        <?php if ($stips[$i]['od_size']) { ?>
                        <p><span class="order-info-title">Kích thước:</span><span><?=$stips[$i]['od_size']?></span></p>
                        <?php } ?>
                    </div>
                </td>
                <td><img src="<?=$stips[$i]["img"]?>" alt="" width="100" /></td>
                <td align="center"><?=number_format($price).CST_CURRENCY_CODE?></td>
                <td align="center"><?=$stips[$i]['od_pro_quantity']?></td>
                <td><strong><?=number_format($price * $stips[$i]['od_pro_quantity']).CST_CURRENCY_CODE?></strong></td>
              </tr>
              <? } ?>
              <tr>
                <td align="right" colspan="5">Tổng giá trị đơn hàng</td>
                <td><strong style="color:#f00; font-size:20px;"><?=number_format($total).CST_CURRENCY_CODE?></strong></td>
              </tr>
            </tbody>
          </table>
	</div>
</form>