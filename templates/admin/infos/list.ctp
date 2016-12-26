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

<form name="f" method="post"  action="admin.php?do=infos&act=dellist"  onsubmit="return confirm('Are You Sure?');">
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
<table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
  <tbody>
    <tr>
      <th class="table-header-check"><font color="#FFFFFF">Stt</font> </th>
      <th class="table-header-repeat line-left minwidth-1"><a style="cursor:default;">Name</a></th>
      <th class="table-header-options line-left"><a href="">Action</a></th>
    </tr>
    <? 
													if($c>0 && $stips!=null) {
														$count = 1;
													for ($i=0;$i<count($stips);$i++) {?>
    <? if($stips[$i]['iftp_id'] == 1){ ?>
    <tr>
      <td align="center"><?=$count++?></td>
      <td><a href="admin.php?do=infos&act=edit&id=<?=$stips[$i]["id"]?>">
        <?=$stips[$i]["name_vn"]?>
        </a></td>
      <td><a title="Edit" class="icon-1 info-tooltip" href="admin.php?do=infos&act=edit&id=<?=$stips[$i]["id"]?>"></a></td>
    </tr>
    <? } } } else{ ?>
    <tr>
    	<td colspan="3" align="center"><strong>No Data</strong></td>
    </tr>
    <? } ?>
  </tbody>
</table>
<!--  start paging.............. -->
<?=$plpage?>
<!--  end paging................ -->