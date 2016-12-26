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
</script>
<script language="javascript">
function checkAll()
{
	if(document.f.all.checked == true)
	{
		for(var i=0;i<20;i++)
		{
			
			document.getElementById("check"+i).checked = true;
		}
	}
	else
	{
		for(var i=0;i<20;i++)
		{
			
			document.getElementById("check"+i).checked = false;
		}
	}
}

function tran()
{
	location.href="admin.php?do=page&act=add";
}

function ChangeAction(str){
	if(confirm("Are You Sure?"))
	{
		document.f.action = str;
		document.f.submit();
	}
}
</script>

<form name="f" id="f" method="post">
<!--  start message-green -->
<? if(isset($_SESSION['mess'])){ ?>
<div id="message-green">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td class="green-left"><?=$_SESSION['mess']==1?'Add successfully':$_SESSION['mess']?>
        <a href="admin.php?do=tags&act=add<?=isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:''?><?=isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:''?><?=isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:''?>">
        <?=$_SESSION['mess']=='Add successfully'?'Add new one.':''?>
        </a></td>
      <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
    </tr>
  </table>
</div>
<? }; unset($_SESSION['mess']); ?>
<!--  end message-green -->
<div id="actions-box" style="margin-bottom:10px;"> <a class="action-slider activated" href=""></a>
  <div id="actions-box-slider" style="display: none;"> <? if($_SESSION['group_user']!=2){ ?><a class="action-delete" onclick="ChangeAction('admin.php?do=tags&act=dellist<?=isset($_GET['page'])?'&page='.$_GET['page']:''?><?=isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:''?><?=isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:''?><?=isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:''?>');return false;" href="">Delete</a><? } ?> <a class="action-edit" onclick="ChangeAction('admin.php?do=tags&act=show<?=isset($_GET['page'])?'&page='.$_GET['page']:''?><?=isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:''?><?=isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:''?><?=isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:''?>');return false;"  href="">Show</a> <a class="action-hide" onclick="ChangeAction('admin.php?do=tags&act=hide');return false;" href="">Hide</a> </div>
  <div class="clear"></div>
</div>
<div style="height:20px;">&nbsp;</div>
<table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
  <tbody>
    <tr>
      <th class="table-header-check" width="39"><a id="toggle-all"></a> </th>
      <th class="table-header-repeat line-left minwidth-1" width="90"><a href="">Order <img alt="Save" title="Save" width="20" height="20" border="0" align="absmiddle" onclick="ChangeAction('admin.php?do=tags&act=order<?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" style="cursor:pointer;" src="images/admin/save.png"></a></th>
      <th class="table-header-repeat line-left" width="120"><a href="">Bài viết</a></th>
      <th class="table-header-repeat line-left" width="100"><a href="">Sản Phẩm</a></th>
      <th class="table-header-repeat line-left" width="100"><a href="">Danh mục</a></th>
      <th class="table-header-repeat line-left"><a href="">Tên Tag</a></th>
      <th class="table-header-repeat line-left" width="20"><a href="">Show</a></th>
      <th class="table-header-options line-left"><a href="">Action</a></th>
    </tr>
    <? 
													if($c>0 && $stips!=null) {
													for ($i=0;$i<count($stips);$i++) {?>
    <tr>
      <td><input type="checkbox" name="iddel[]" class="ui-helper-hidden-accessible" value="<?=$stips[$i]["tags_id"]?>" id="check<?=$i?>" /></td>
      <td align="center"><input type="text" size="2" value="<?=$stips[$i]["tags_num"]?$stips[$i]["tags_num"]:0?>" style="text-align:center;" name="ordering[]" onkeypress="return OnlyNumber(event)" />
        <input type="hidden" name="id[]" value="<?=$stips[$i]["tags_id"]?>" /></td>
      <td><?=$stips[$i]["art_name"]?></td>
      <td><?=$stips[$i]["pro_name"]?></td>
      <td><?=$stips[$i]["cat_name"]?></td>
      <td><a href="admin.php?do=tags&act=edit&id=<?=$stips[$i]["tags_id"]?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>">
        <?=strip_tags($stips[$i]["tags_name"])?>
        </a></td>
      <td align="center"><a href="admin.php?do=tags&act=change_active&id=<?=$stips[$i]["tags_id"]?>&current=<?=$stips[$i]["tags_active"]?>&page=<?=isset($_GET['page'])?$_GET['page']:1; ?>">
        <?php
																if($stips[$i]["tags_active"]=='1'){
															?>
        <img src="images/admin/checked.png" border="0"  width="24" height="24" title="Edit"/>
        <?	}else{	?>
        <img src="images/admin/hide.png" border="0"  width="24" height="24" title="Edit"/>
        <?	}	?>
        </a></td>
      <td><a title="Edit" class="icon-1 info-tooltip" href="admin.php?do=tags&act=edit&id=<?=$stips[$i]["tags_id"]?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>"></a> <? if($_SESSION['group_user']!=2){ ?><a class="icon-2 info-tooltip" href="#" title="Delete" onclick="CheckDelete('admin.php?do=tags&act=del&id=<?=$stips[$i]["tags_id"]?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');"></a><? } ?></td>
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
