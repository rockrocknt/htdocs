<? global $stips, $plpage, $page, $set_per_page, $adminGroups; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá quản trị viên này?'))
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
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=users&act=add'" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=users&act=dellist');return false;" />
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
    <h6>Danh sách các quản trị viên</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>
        <td class="tb_data_small"><a href="#" class="tipS">ID</a></td>
        <td class="sortCol"><div>Tên quản trị viên<span></span></div></td>
        <td class="sortCol"><div>Nhóm<span></span></div></td>
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
        <td align="center"><?=$stips[$i]["id"]?></td>
        <td class="title_name_data">
            <a href="admin.php?do=users&act=edit&id=<?=$stips[$i]["id"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" class="tipS SC_bold" title=""><?=$stips[$i]["username"]?></a>
        </td>
        <td align="center">
		<? foreach ($adminGroups as $group) { 
			if ($stips[$i]['group']==$group['id'])
			{
				echo $group["name"];
				break;
			}
		}
		?>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=users&act=edit&id=<?=$stips[$i]["id"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="smallButton tipS" original-title="Sửa quản trị viên"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=users&act=del&id=<?=$stips[$i]["id"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa quản trị viên"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>