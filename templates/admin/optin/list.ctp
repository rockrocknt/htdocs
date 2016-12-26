<? global $stips, $page, $set_per_page, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá email này?'))
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
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=optin&act=dellist<?=isset($_GET['type'])?"&type=".$_GET['type']:''?>');return false;" />
        <input type="button" class="blueB" value="Xuất Excel" onclick="location.href='admin.php?do=optin&act=export'" />
    </div>
</div>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['mess']?></strong></p>
</div>
<? }; unset($_SESSION['mess']); ?>

<div class="widget" style="margin-top:20px;">
  <div class="title"><span class="titleIcon">
    <input type="checkbox" id="titleCheck" name="titleCheck" />
    </span>
    <h6>Danh sách các email Opt-In</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>
        <td width="300">Thông tin</td>
        <td class="sortCol"><div>Chương trình<span></span></div></td>
        <td width="300">Ngày</td>
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
            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]["otn_id"]?>" id="check<?=$i?>" />
        </td>
        <td align="center"><?=($page-1)*$set_per_page+$i+1?></td>
        <td>
			<strong>- Tên:</strong> <?=$stips[$i]["otn_name"]?><br />
            <strong>- Email:</strong> <?=$stips[$i]["otn_email"]?>
        </td>
        <td class="title_name_data"><?=$stips[$i]["otn_type_name_vn"]?></td>
        <td align="center"><?=formatDateTime($stips[$i]["otn_insert_date"])?></td>
        <td class="actBtns">
            <a href="" onclick="CheckDelete('admin.php?do=optin&act=del&type=<?=isset($_GET['type'])?$_GET['type']:''; ?>&id=<?=$stips[$i]["otn_id"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa email"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="7" align="center">Không có email nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>