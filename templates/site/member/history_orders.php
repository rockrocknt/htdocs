<? global $FullUrl, $orders; ?>
<div class="wcontent">
  <div class="wrap_page_content">
    <div class="right_title">
      <h4>
        <?=HISTORY_TRANSACTION?>
      </h4>
    </div>
    <div class="content">
      <table id="Table_01" width="100%"  border="0" cellpadding="0" cellspacing="0" class="ListCart" align="center">
        <!--DWLayoutTable-->
        <tr>
          <td width="100%" valign="top"><form action="index.php?do=cart&amp;act=update&amp;lg=<?=$lg?>" method="post" name="f" id="f" onsubmit="return CheckForm()">
              <table cellpadding="3" cellspacing="0" border="0" width="100%" align="center" class="menu_cap2" id="cart">
                <tr>
                  <td width="5%" align="center" class="table_title"><?php echo NO; ?></td>
                  <td width="10%" class="table_title" align="center">ID</td>
                  <td width="30%" align="center" class="table_title">Date</td>
                  <td align="center" class="table_title">Status</td>
                </tr>
                <tr valign="top">
                  <td colspan="7" align="center" class="text"><hr size="1" style="border-top: 1px solid #F2D8DD;"/></td>
                </tr>
                <tr valign="top">
                  <td colspan="7" align="center" class="text" height="15"></td>
                </tr>
                <?
											global $orders, $FullUrl;
											if($orders){
											foreach($orders as $i => $value)
											{
											?>
                <tr valign="top">
                  <td colspan="7" align="center" class="text" height="10"></td>
                </tr>
                <tr valign="top">
                  <td align="center" class="title" valign="middle"><?=$i+1?><input type="hidden" value="<?=$value['odr_id']?>" name="item[]" /></td>
                  <td class="title" valign="middle" align="center"><a href="<?=$FullUrl?>/index.php?do=member&act=orderdetail&oid=<?=$value['odr_id']?>"><b><?=$value['odr_id']?></b></a></td>
                  <td class="title" valign="middle"><?=$value['odr_insert_date']?></td>
                  <td class="title" valign="middle" align="center"><?=GetOrderStatus($value['odr_status'])?></td>
                </tr>
                <? if($i != (count($orders)-1)) { ?>
                <tr valign="top">
                  <td colspan="7" align="center" class="text" height="10"></td>
                </tr>
                <tr valign="top">
                  <td colspan="7" align="center" class="text"><hr size="1" style="border-top: 1px solid #F2D8DD;"/></td>
                </tr>
                <? } } } else{ ?>
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
