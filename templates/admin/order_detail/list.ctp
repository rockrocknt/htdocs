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
function TreeFilterChanged(value){
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	  {
	  alert ("Browser does not support HTTP Request");
	  return;
	  } 
	var url="ajax/checkComp.php";
	url=url+"?id="+value;
	url=url+"&sid="+Math.random();
	url=url+"&comp=2";
	xmlHttp.onreadystatechange=ReadyTreeFilterChanged ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}
function ReadyTreeFilterChanged(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 	
		if(xmlHttp.responseText != "0")
			location.href = "admin.php?do=products&act=list&cid="+xmlHttp.responseText;
		else{
			alert('Mục này không thể chứa sản phẩm');
		}
	}
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
        <a href="admin.php?do=products&act=add">
        <?=$_SESSION['mess']=='Add successfully'?'Add new one.':''?>
        </a></td>
      <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
    </tr>
  </table>
</div>
<? }; unset($_SESSION['mess']); ?>
<!--  end message-green -->
<div style="float:right;margin-bottom:10px;">
  <?php
		$cat = new Categories();
		$tree = $cat->admin_tree_filter(1,isset($_GET['cid'])?$_GET['cid']:0,2);
		echo $tree;
	?>
</div>
<div id="actions-box" style="margin-bottom:10px;"> <a class="action-slider activated" href=""></a>
  <div id="actions-box-slider" style="display: none;"> <a class="action-add" href="admin.php?do=products&act=add">Add</a> <a class="action-delete" onclick="ChangeAction('admin.php?do=products&act=dellist<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" href="">Delete</a> <a class="action-home" onclick="ChangeAction('admin.php?do=products&act=change_home<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" href="">Home</a> <a class="action-unhome" onclick="ChangeAction('admin.php?do=products&act=un_home<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" href="">UnHome</a> <a class="action-edit" onclick="ChangeAction('admin.php?do=products&act=show<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;"  href="">Show</a> <a class="action-hide" onclick="ChangeAction('admin.php?do=products&act=hide<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?>');return false;" href="">Hide</a> </div>
  <div class="clear"></div>
</div>
<div style="height:20px;">&nbsp;</div>
<table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
  <tbody>
    <tr>
      <th class="table-header-check" width="39"><a id="toggle-all"></a> </th>
      <th class="table-header-repeat line-left minwidth-1" width="90"><a href="">Order <img alt="Save" title="Save" width="20" height="20" border="0" align="absmiddle" onclick="ChangeAction('admin.php?do=products&act=order<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" style="cursor:pointer;" src="images/admin/save.png"></a></th>
      <th class="table-header-repeat line-left" width="120"><a href="">Image</a></th>
      <th class="table-header-repeat line-left" width="100"><a href="">Code</a></th>
      <th class="table-header-repeat line-left"><a href="">Name</a></th>
      <th class="table-header-repeat line-left" width="20"><a href="">Home</a></th>
      <th class="table-header-repeat line-left" width="20"><a href="">Show</a></th>
      <th class="table-header-options line-left"><a href="">Action</a></th>
    </tr>
    <? 
													if($c>0 && $stips!=null) {
													for ($i=0;$i<count($stips);$i++) {?>
    <tr>
      <td><input type="checkbox" name="iddel[]" class="ui-helper-hidden-accessible" value="<?=$stips[$i]["id"]?>" id="check<?=$i?>" /></td>
      <td align="center"><input type="text" size="2" value="<?=$stips[$i]["num"]?$stips[$i]["num"]:0?>" style="text-align:center;" name="ordering[]" onkeypress="return OnlyNumber(event)" />
        <input type="hidden" name="id[]" value="<?=$stips[$i]["id"]?>" /></td>
      <td><?php
																if(file_exists($stips[$i]['img']))
																{
															?>
        <img align="absmiddle" src="<?=$FullUrl;?>/<?=$stips[$i]['img']?>" width="100" border="0" />
        <? } ?></td>
      <td><?=$stips[$i]["code"]?></td>
      <td><a href="admin.php?do=products&act=edit&id=<?=$stips[$i]["id"]?>">
        <?=$stips[$i]["name_vn"]?>
        </a></td>
      <td align="center"><img src="images/admin/<?php echo $stips[$i]['home']?'checked':'hide'; ?>.png" border="0"  width="24" height="24" /></td>
      <td align="center"><img src="images/admin/<?php echo $stips[$i]['active']?'checked':'hide'; ?>.png" border="0"  width="24" height="24" /></td>
      <td><a title="Edit" class="icon-1 info-tooltip" href="admin.php?do=products&act=edit&id=<?=$stips[$i]["id"]?>"></a> <a class="icon-2 info-tooltip" href="#" title="Delete" onclick="CheckDelete('admin.php?do=products&act=del&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');"></a></td>
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
