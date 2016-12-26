<? global $stips, $page, $set_per_page, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá nhóm quản trị này?'))
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
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=admin_groups&act=add'" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=admin_groups&act=dellist');return false;" />
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
    <h6>Các nhóm quản trị đã tạo</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>
        <td class="sortCol"><div>Tên nhóm quản trị<span></span></div></td>
        <td width="300">Mô tả</td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td>Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="6"><?=$plpage?></td>
      </tr>
    </tfoot>
    <tbody>
    <? for ($i=0; $i<count($stips); $i++) { ?>
      <tr>
        <td>
            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]["id"]?>" id="check<?=$i?>" />
        </td>
        <td align="center"><?=($page-1)*$set_per_page+$i+1?></td>
        <td class="title_name_data">
            <a href="admin.php?do=admin_groups&act=edit&id=<?=$stips[$i]["id"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" class="tipS SC_bold"><?=$stips[$i]["name"]?></a>
        </td>
        <td><?=$stips[$i]["short"]?></td>
        <td align="center">
        	<? if ($stips[$i]["id"] == 1) { ?>
            <a href="#" onclick="return false;" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Hiện':'Ẩn'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
            <? } else { ?>
            <a href="admin.php?do=admin_groups&act=change_active&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
            <? } ?>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=admin_groups&act=edit&id=<?=$stips[$i]["id"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="smallButton tipS" original-title="Sửa nhóm quản trị"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=admin_groups&act=del&id=<?=$stips[$i]["id"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa nhóm quản trị"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>