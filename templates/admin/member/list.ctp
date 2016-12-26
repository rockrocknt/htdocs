<? global $members, $page, $set_per_page, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá thành viên này?'))
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
    	<?php /*?><input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=member&act=add'" /><?php */?>
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=member&act=dellist');return false;" />
        <input type="button" class="blueB" value="Xuất Excel" onclick="location.href='admin.php?do=member&act=export'" />
    </div>
</div>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['mess']?></strong><a href="admin.php?do=member&act=add"><?=$_SESSION['mess']=="Thêm thành công!"?'Thêm thành viên khác':''?></a></p>
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
    <h6>Danh sách các thành viên</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>
        <td class="sortCol"><div>Họ tên<span></span></div></td>
        <td width="150"><div>Email</div></td>
        <td width="300"><div>Địa chỉ</div></td>
        <td width="100"><div>Điện thoại</div></td>
        <td width="200"><div>Ngày đăng ký</div></td>
        <td>Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="8"><?=$plpage?></td>
      </tr>
    </tfoot>
    <tbody>
    <? 
		if ($members) {
		for ($i=0; $i<count($members); $i++) { ?>
      <tr>
        <td>
            <input type="checkbox" name="iddel[]" value="<?=$members[$i]["id"]?>" id="check<?=$i?>" />
        </td>
        <td align="center"><?=($page-1)*$set_per_page+$i+1?></td>
        <td class="title_name_data SC_bold">
        	<?=$members[$i]["name"]?>
        </td>
        <td align="center"><?=$members[$i]["email"]?></td>
        <td align="center"><?=$members[$i]["address"]?></td>
        <td align="center"><?=$members[$i]["phone"]?></td>
        <td align="center"><?=formatDateTime($members[$i]["insert_date"])?></td>
        <td class="actBtns">
            <a href="" onclick="CheckDelete('admin.php?do=member&act=del&id=<?=$members[$i]["id"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa thành viên"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="8" align="center">Không có thành viên nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>