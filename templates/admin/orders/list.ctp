<? global $stips, $plpage, $page, $set_per_page; ?>

<script src="js/admin/orders.js"></script>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá đơn hàng này?'))
		{
			location.href = l;	
		}
	}
	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.f.action = str;
			document.f.submit();
		}
	}
</script>

<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0;">
  	<div style="float:left;">
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=orders&act=dellist');return false;" />
    </div>
</div>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;"">
    <p><strong><?=$_SESSION['mess']?></strong></p>
</div>
<? }; unset($_SESSION['mess']); ?>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Danh sách các đơn hàng chưa hoàn thành</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Mã ĐH</a></td>
        <td class="sortCol"><div>Người nhận hàng<span></span></div></td>
        <td width="200"><div>Ngày đặt hàng</div></td>
        <td width="300"><div>Trạng thái</div></td>
        <td>Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="6"><?=$plpage?></td>
      </tr>
    </tfoot>
    <tbody>
    <? if ($stips) {
		for ($i=0; $i<count($stips); $i++) { ?>
      <tr>
        <td>
            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]["odr_id"]?>" id="check<?=$i?>" />
        </td>
        <td align="center"><?=$stips[$i]["odr_id"]?></td>
        <td class="title_name_data">
            <div class="order-infos">
            	<p><span class="order-info-title">Tên:</span><span><?=$stips[$i]['receiveName']?></span></p>
                <p><span class="order-info-title">Email:</span><span><?=$stips[$i]['receiveEmail']?></span></p>
                <p><span class="order-info-title">Phone:</span><span><?=$stips[$i]['receivePhone']?></span></p>
                <p><span class="order-info-title">Địa chỉ:</span><span><?=$stips[$i]['receiveAddress']?></span></p>
                <p>
                    <?php
                    $string = "Thanh toán cho người giao hàng (chỉ áp dụng cho nội thành tp.HCM và Hà Nội)";
                    if ($stips[$i]['paymentid']==2)
                    {
                        $string = "Chuyển khoản";
                        // $template = str_replace('[CACHTHANHTOAN]', "Chuyển khoản", $template);
                    }
                    if ($stips[$i]['paymentid']==3)
                    {
                        $string = "Thanh toán chuyển khoản online ngay";
                        // $template = str_replace('[CACHTHANHTOAN]', "Chuyển khoản", $template);
                    }
                    ?>
                    <?= $string?> <br/>
                    <?= $stips[$i]['odr_note']?>
                </p>
            </div>
        </td>
        <td align="center"><?=formatDateTime($stips[$i]['odr_insert_date'])?></td>
        <td class="orders">
        <div class="selector">
            <select name="type" id="status<?=$stips[$i]['odr_id']?>" onchange="UpdateStatus('status<?=$stips[$i]['odr_id']?>','<?=$stips[$i]["odr_id"]?>')">
              <option value="0" <?=$stips[$i]['odr_status'] =="0"?"selected":""; ?>>Chưa thanh toán</option>
              <option value="1" <?=$stips[$i]['odr_status'] =="1"?"selected":""; ?>>Đã thanh toán</option>
              <option value="2" <?=$stips[$i]['odr_status'] =="2"?"selected":""; ?>>Đã xử lý</option>
            </select>
        </div>&nbsp;&nbsp;
        <a class="smallButton" href="#" onclick="return false;" style="cursor:default;"><img title="<?=products::getStatus($stips[$i]['odr_status'])?>" src="<?=products::getStatusImage($stips[$i]['odr_status'])?>" alt="" /></a>
        <? if ($stips[$i]["odr_view"]==0) { ?>
        <span class="numberTop" style="float:none; margin:0; display:inline-block">NEW</span>
        <? } ?>
        </td>
        <td class="actBtns">
            <a href="" onclick="CheckDelete('admin.php?do=orders&act=del&id=<?=$stips[$i]["odr_id"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa đơn hàng"><img src="./images/admin/icons/dark/close.png" alt=""></a> 
            <a href="admin.php?do=orders&act=detail&id=<?=$stips[$i]["odr_id"]?>" title="" class="smallButton tipS" original-title="Xem chi tiết"><img src="./images/admin/eye_inv.png" alt=""></a>
        </td>
      </tr>
      <? }} else { ?>
      <tr>
        <td colspan="6" align="center">Không có đơn hàng nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>