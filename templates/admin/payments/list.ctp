<? global $stips; ?>

<script language="javascript">	
	function ChangeAction(str){
		if(confirm("Bạn có chắc chắn?"))
		{
			document.f.action = str;
			document.f.submit();
		}
	}
</script>

<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0">
  	<div style="float:left;">
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=payments&act=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=payments&act=hide');return false;" />
    </div>
</div>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['mess']?></strong></p>
</div>
<? }; unset($_SESSION['mess']); ?>

<? if(isset($_SESSION['error'])){ ?>
<div class="nNote nFailure hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['error']?></strong></p>
</div>
<? }; unset($_SESSION['error']); ?>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Danh sách các hình thức thanh toán</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td>Ảnh</td>
        <td class="sortCol"><div>Tên hình thức thanh toán<span></span></div></td>
        <td width="300">Mô tả</td>
        <td width="300">Chú ý</td>
        <td class="tb_data_small">Áp dụng</td>
        <td width="100">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="8"></td>
      </tr>
    </tfoot>
    <tbody>
    <? 
		if ($stips) {
		for ($i=0; $i<count($stips); $i++) { ?>
      <tr>
        <td>
            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]["id"]?>" id="check<?=$i?>" />
        </td>
        <td align="center">
            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Số thứ tự, xếp từ nhỏ đến lớn" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('payments', '<?=$stips[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
        <td>
        <?php if (file_exists($stips[$i]["img"])) { ?>
        <img src="<?=getTimThumb($stips[$i]["img"], 100)?>" alt="" />
        <? } ?>
        </td>
        <td class="title_name_data">
            <a href="admin.php?do=payments&act=edit&id=<?=$stips[$i]["id"]?>" class="tipS SC_bold"><?=$stips[$i]["name_vn"]?></a><br />
            <? if ($stips[$i]["alias"] == "Bank") { ?>
            <a href="admin.php?do=banks" style="font-style:italic;">--> Thêm Tài khoản ngân hàng</a>
            <? } else if ($stips[$i]["alias"] == "123Pay") { ?>
            <a href="admin.php?do=banks123pay" style="font-style:italic;">--> Xem các ngân hàng 123Pay</a>
            <? } ?>
        </td>
        <td><?=SubStrEx(strip_tags($stips[$i]['content_vn']), 50)?></td>
        <td><?=$stips[$i]['note']?></td>
        <td align="center">
            <a href="admin.php?do=payments&act=change_active&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=payments&act=edit&id=<?=$stips[$i]["id"]?>" title="" class="smallButton tipS" original-title="Sửa"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="8" align="center">Không có phương thức thanh toán nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>