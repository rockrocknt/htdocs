<? global $stips, $page, $set_per_page, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá log này?'))
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
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=userlog&act=dellist');return false;" />
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
    <h6>Danh sách các hoạt động</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>
        <td class="sortCol"><div>Quản trị viên<span></span></div></td>
        <td class="sortCol" width="200"><div>IP truy cập<span></span></div></td>
        <td width="600"><div>Chi tiết hoạt động</div></td>
        <td width="250">Ngày</td>
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
        <td align="center"><?=($page-1)*$set_per_page+$i+1?></td>
        <td class="title_name_data">
        <?php
			global $db;
			$sql="SELECT * FROM admin WHERE id = ".$stips[$i]['user_id'];
			$row= $db ->getRow($sql);
			echo $row['username'];
		?>
        </td>
        <td align="center"><?=$stips[$i]["ip_address"]?></td>
        <td align="center"><?=$stips[$i]["note"]?></td>
        <td align="center"><?=formatDateTime($stips[$i]["insert_date"])?></td>
        <td class="actBtns">
            <a href="" onclick="CheckDelete('admin.php?do=userlog&act=del&id=<?=$stips[$i]["id"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa log"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="7" align="center">Không có log nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>