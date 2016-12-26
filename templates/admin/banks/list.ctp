<? global $stips, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá ngân hàng này?'))
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
<div class="control_frm" style="margin-top:0">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=banks&act=add'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=banks&act=show');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=banks&act=hide');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=banks&act=dellist');return false;" />
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
    <h6>Các ngân hàng</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td>Ảnh</td>
        <td class="sortCol"><div>Tên ngân hàng<span></span></div></td>
        <td class="sortCol" width="200"><div>Tên chủ tài khoản<span></span></div></td>
        <td class="sortCol" width="200"><div>Số tài khoản<span></span></div></td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="100">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="8"><?=$plpage?></td>
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
            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Số thứ tự ngân hàng, xếp từ nhỏ đến lớn" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('banks', '<?=$stips[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
        <td>
        <?php if (file_exists($stips[$i]["img"])) { ?>
        <img src="<?=getTimThumb($stips[$i]["img"], 100)?>" alt="" />
        <? } ?>
        </td>
        <td class="title_name_data">
            <a href="admin.php?do=banks&act=edit&id=<?=$stips[$i]["id"]?>" class="tipS SC_bold"><?=$stips[$i]["bank_vn"]?></a>
        </td>
        <td align="center"><?=$stips[$i]['name']?></td>
        <td align="center"><?=$stips[$i]['card']?></td>
        <td align="center">
            <a href="admin.php?do=banks&act=change_active&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=banks&act=edit&id=<?=$stips[$i]["id"]?>" title="" class="smallButton tipS" original-title="Sửa ngân hàng"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=banks&act=del&id=<?=$stips[$i]["id"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa ngân hàng"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="8" align="center">Không có ngân hàng nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>