<? global $stips, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá nick này?'))
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
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=nicks&act=add'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=nicks&act=show<?=isset($_GET['page'])?"&page=".$_GET['page']:''?>');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=nicks&act=hide<?=isset($_GET['page'])?"&page=".$_GET['page']:''?>');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=nicks&act=dellist');return false;" />
    </div>
</div>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['mess']?></strong></p>
</div>
<? }; unset($_SESSION['mess']); ?>

<div class="widget">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Các nick đã tạo</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td class="sortCol"><div>Thông tin<span></span></div></td>
        <td class="sortCol"><div>Nick Yahoo<span></span></div></td>
        <td class="sortCol"><div>Nick Skype<span></span></div></td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td>Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="7"><?=$plpage?></td>
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
            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Số thứ tự hỗ trợ, xếp từ nhỏ đến lớn" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('nicks', '<?=$stips[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
        <td class="title_name_data">
            <a href="admin.php?do=nicks&act=edit&id=<?=$stips[$i]["id"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" class="tipS SC_bold">
				<?=$stips[$i]["name_vn"]?><br />
                <?=$stips[$i]["phone"]?>
            </a>
        </td>
        <td align="center"><?=$stips[$i]["yahoo"]?></td>
        <td align="center"><?=$stips[$i]["skype"]?></td>
        <td align="center">
            <a href="admin.php?do=nicks&act=change_active&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=nicks&act=edit&id=<?=$stips[$i]["id"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="smallButton tipS" original-title="Sửa nick"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=nicks&act=del&id=<?=$stips[$i]["id"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa nick"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="7" align="center">Không có nick hỗ trợ nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>