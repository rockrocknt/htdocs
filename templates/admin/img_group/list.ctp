<? global $stips; ?>
<script language="javascript">
	function CheckDelete(l){
		if(confirm('Are You Sure?'))
		{
			location.href = l;	
		}
	}															
</script>
<!--  styled select box script version 1 -->
<script src="js/jquery/jquery.selectbox-0.5.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
	$('.styledselect_form_1').selectbox({ inputClass: "styledselect_form_1" });
	$('.styledselect_form_2').selectbox({ inputClass: "styledselect_form_2" });
});

function ChangeAction(str){
	if(confirm("Are You Sure?"))
	{
		document.f.action = str;
		$('#f').trigger("submit");
	}
}
</script>

<form name="f" id="f" method="post">
<? if(isset($_SESSION['error'])){ ?>
<!--  start message-red -->
<div id="message-red">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td class="red-left"><?=$_SESSION['error']?>
        . <a href="javascript:history.go(-1)">Xin thử lại.</a></td>
      <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
    </tr>
  </table>
</div>
<!--  end message-red -->
<? }; unset($_SESSION['error']); ?>
<!--  start message-green -->
<? if(isset($_SESSION['mess'])){ ?>
<div id="message-green">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td class="green-left"><?=$_SESSION['mess']==1?'Add successfully':$_SESSION['mess']?>
        <a href="admin.php?do=users&act=dellist">
        <?=$_SESSION['mess']==1?'Add new one.':''?>
        </a></td>
      <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
    </tr>
  </table>
</div>
<? }; unset($_SESSION['mess']); ?>
<!--  end message-green -->
<div style="height:20px;">&nbsp;</div>
<table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
  <tbody>
    <tr>
      <th class="table-header-repeat line-left minwidth-1" width="50"><a style="cursor:default;">Id</a></th>
      <th class="table-header-repeat line-left minwidth-1" width="90"><a href="">Order <img alt="Save" title="Save" width="20" height="20" border="0" align="absmiddle" onclick="ChangeAction('admin.php?do=img_group&act=order<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" style="cursor:pointer;" src="images/admin/save.png"></a></th>
      <th class="table-header-repeat line-left" ><a href="">Name</a></th>
      <th class="table-header-repeat line-left" width="400"><a href="">Description</a></th>
    </tr>
    <? 
													if($c>0 && $stips!=null) {
													for ($i=0;$i<count($stips);$i++) {?>
    <tr>
      <td><?=$stips[$i]["id"]?></td>
      <td align="center"><input type="text" size="2" onkeypress="return OnlyNumber(event)" value="<?=$stips[$i]["num"]?>" style="text-align:center;" name="ordering[]" />
        <input type="hidden" name="id[]" value="<?=$stips[$i]["id"]?>" /></td>
      <td valign="middle"><a href="admin.php?do=img_group&act=detail&groupid=<?=$stips[$i]["id"]?>">
        <?=$stips[$i]["name_vn"]?>
        </a></td>
      <td valign="middle"><?=$stips[$i]["short_vn"]?></td>
    </tr>
    <?  }}else{ ?>
    <tr>
    	<td colspan="8" align="center"><strong>No Data</strong></td>
    </tr>
    <? } ?>
  </tbody>
</table>
<!--  start paging.............. -->
<?=$plpage?>
<!--  end paging................ -->
