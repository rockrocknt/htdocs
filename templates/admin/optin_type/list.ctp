<? global $stips, $page, $set_per_page, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá chương trình này?'))
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
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=optin_type&act=add'" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=optin_type&act=dellist');return false;" />
    </div>
</div>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['mess']?></strong><a href="admin.php?do=optin_type&act=add"><?=$_SESSION['mess']=="Thêm thành công!"?'Thêm chương trình khác':''?></a></p>
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
    <h6>Danh sách các chương trình Opt-In</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td class="sortCol"><div>Tên chương trình<span></span></div></td>
        <td width="300">Nội dung</td>
        <td class="tb_data_small">Tập tin</td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="150">Thao tác</td>
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
            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Nhập số thứ tự" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('optin_type', '<?=$stips[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
        <td class="title_name_data">
            <a href="admin.php?do=optin_type&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" class="tipS SC_bold" title=""><?=$stips[$i]["otn_type_name_vn"]?></a>
        </td>
        <td align="center"><?=$stips[$i]["otn_type_content_vn"]?></td>
        <td align="center">
            <a class="smallButton" href="#" onclick="return false;" style="cursor:default;"><img src="./images/admin/icons/color/<?=file_exists($stips[$i]["otn_type_file"])?'tick':'hide'; ?>.png" alt="" /></a>
        </td>
        <td align="center">
            <a href="admin.php?do=optin_type&act=change_active&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["otn_type_active"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['otn_type_active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['otn_type_active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=optin_type&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="" class="smallButton tipS" original-title="Sửa chương trình"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=optin_type&act=del&id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa chương trình"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="7" align="center">Không có chương trình nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>