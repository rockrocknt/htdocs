<? global $FullUrl, $prefix_url, $order_detail; ?>
<div class="wcontent">
  <div class="wrap_page_content">
    <div class="right_title">
      <h4>
        <?=ODER_DETAIL?>
      </h4>
    </div>
    <div class="content">
    	<div>
        	<a href="<?=$FullUrl.$prefix_url?>history-transactions.html">>>Back<<</a><br/>
            <b><?=PAYMENT_INFO?></b><br/>
        	<? if($order_detail[0]['odr_payment_name']) echo '<b>' . LABEL_NAME . ':</b> ' . $order_detail[0]['odr_payment_name']?><br/>
            <? if($order_detail[0]['odr_payment_phone']) echo '<b>' . LABEL_PHONE . ':</b> ' . $order_detail[0]['odr_payment_phone']?><br/>
            <? if($order_detail[0]['odr_payment_address']) echo '<b>' . LABEL_ADDRESS . ':</b> ' . $order_detail[0]['odr_payment_address']?><br/>
            <? if($order_detail[0]['odr_payment_email']) echo '<b>' . LABEL_EMAIL . ':</b> ' . $order_detail[0]['odr_payment_email']?><br/>
            <? if($order_detail[0]['odr_payment_company']) echo '<b>' . COMPANY . ':</b> ' . $order_detail[0]['odr_payment_company']?><br/>
        </div><br/>
        <div>
            <b><?=SHIPPING_INFO?></b><br/>
            <? if($order_detail[0]['odr_shipping_name']) echo '<b>' . LABEL_NAME . ':</b> ' . $order_detail[0]['odr_shipping_name']?><br/>
            <? if($order_detail[0]['odr_shipping_phone']) echo '<b>' . LABEL_PHONE . ':</b> ' . $order_detail[0]['odr_shipping_phone']?><br/>
            <? if($order_detail[0]['odr_shipping_address']) echo '<b>' . LABEL_ADDRESS . ':</b> ' . $order_detail[0]['odr_shipping_address']?><br/>
            <? if($order_detail[0]['odr_shipping_email']) echo '<b>' . LABEL_EMAIL . ':</b> ' . $order_detail[0]['odr_shipping_email']?><br/>
            <? if($order_detail[0]['odr_shipping_company']) echo '<b>' . COMPANY . ':</b> ' . $order_detail[0]['odr_shipping_company']?><br/>
        </div>
      <table id="Table_01" width="100%"  border="0" cellpadding="0" cellspacing="0" class="ListCart" align="center">
        <!--DWLayoutTable-->
        <tr>
          <td width="100%" valign="top"><form action="index.php?do=cart&amp;act=update&amp;lg=<?=$lg?>" method="post" name="f" id="f" onsubmit="return CheckForm()">
              <table cellpadding="3" cellspacing="0" border="0" width="100%" align="center" class="menu_cap2" id="cart">
                <tr>
                  <td width="5%" align="center" class="table_title"><?php echo NO; ?></td>
                  <td class="table_title" align="center">Name</td>
                  <td width="20%" align="center" class="table_title">Price</td>
                  <td width="5%" align="center" class="table_title">Quantity</td>
                  <td width="10%" align="center" class="table_title"></td>
                </tr>
                <tr valign="top">
                  <td colspan="7" align="center" class="text"><hr size="1" style="border-top: 1px solid #F2D8DD;"/></td>
                </tr>
                <tr valign="top">
                  <td colspan="7" align="center" class="text" height="15"></td>
                </tr>
                <?
											global $lg;
											$total = 0;
											if($order_detail){
											foreach($order_detail as $i => $value)
											{
												$total += $value['price'] * $value['od_pro_quantity'];
											?>
                <tr valign="top">
                  <td colspan="7" align="center" class="text" height="10"></td>
                </tr>
                <tr valign="top">
                  <td align="center" class="title" valign="middle"><?=$i+1?><input type="hidden" value="<?=$value['odr_id']?>" name="item[]" /></td>
                  <td class="title" valign="middle" align="center"><?=$value['name_'.$lg]?></td>
                  <td class="title" valign="middle" align="center"><?=number_format($value['price']) .CST_CURRENCY_CODE?></td>
                  <td class="title" valign="middle" align="center"><?=$value['od_pro_quantity']?></td>
                  <td class="title" valign="middle" align="left"><?=number_format($value['price'] * $value['od_pro_quantity']).CST_CURRENCY_CODE?></td>
                </tr>
                <? if($i != (count($order_detail)-1)) { ?>
                <tr valign="top">
                  <td colspan="7" align="center" class="text" height="10"></td>
                </tr>
                <tr valign="top">
                  <td colspan="7" align="center" class="text"><hr size="1" style="border-top: 1px solid #F2D8DD;"/></td>
                </tr>
                <? } } ?> 
				<tr>
                	<td colspan="3" align="center"></td>
                    <td align="center"><b>Total:</b></td>
                    <td><?=number_format($total).CST_CURRENCY_CODE?></td>
                </tr>
				<? } else{ ?>
                <tr>
                	<td colspan="4" align="center"><strong>No Data</strong></td>
                </tr>
                <? } ?>
              </table>
            </form></td>
        </tr>
        <tr>
          <td height="23" valign="top">&nbsp;</td>
        </tr>
      </table>
    </div>
  </div>
</div>
