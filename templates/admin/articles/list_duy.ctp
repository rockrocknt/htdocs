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
	url=url+"&comp=1,21";
	xmlHttp.onreadystatechange=ReadyTreeFilterChanged ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);

}
function ReadyTreeFilterChanged(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		if(xmlHttp.responseText != "0")
			location.href = "admin.php?do=articles&act=list&cid="+xmlHttp.responseText;
		else{
			alert('Mục này không thể chứa bài viết');
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

<!--  start message-green -->
<? if(isset($_SESSION['mess'])){ ?>
<div id="message-green">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr>
      <td class="green-left"><?=$_SESSION['mess']==1?'Add successfully':$_SESSION['mess']?>
        <a href="admin.php?do=articles&act=add">
        <?=$_SESSION['mess']=='Add successfully'?'Add new one.':''?>
        </a></td>
      <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
    </tr>
  </table>
</div>
<? }; unset($_SESSION['mess']); ?>
<!--  end message-green -->
<div style="float:left;margin-bottom:10px;width:100%;">
<form name="f2" method="post" action="admin.php?do=articles&act=search">
  <span style="float:left;padding-top:9px;font-weight:bold;">Nhập nội dung tin tức cần tìm:</span>
  <input value="<?=SafeQueryString('kw')?>" style="float:left;" type="text" name="kw" class="textboxround" />
  &nbsp;&nbsp;
  <input style="float:left;" type="submit" class="form-submit" />
</form>
</div>
<form name="f" id="f" method="post" action="admin.php?do=articles&act=dellist<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" onsubmit="return confirm('Are You Sure?');">
<div style="float:right;margin-bottom:10px;">
  <?php
		$cc = new Categories();
		$tree = $cc->admin_tree_filter(1,isset($_GET['cid'])?$_GET['cid']:0,1);
		echo $tree;
	?>
</div>
<div id="actions-box" style="margin-bottom:10px;"> <a class="action-slider activated" href=""></a>
  <div id="actions-box-slider" style="display: none;"> <a class="action-add" href="admin.php?do=articles&act=add<?php echo isset($_GET['cid'])?('&cid='.$_GET['cid']):''; ?>">Add</a>
    <? if($_SESSION['group_user']!=2){ ?>
    <a class="action-delete" onclick="ChangeAction('admin.php?do=articles&act=dellist<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" href="">Delete</a>
    <? } ?>
    <a class="action-edit" onclick="ChangeAction('admin.php?do=articles&act=show<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;"  href="">Show</a> <a class="action-hide" onclick="ChangeAction('admin.php?do=articles&act=hide<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?>');return false;" href="">Hide</a> </div>
  <div class="clear"></div>
</div>
<div style="height:20px;">&nbsp;</div>
<table width="100%" cellspacing="0" cellpadding="0" border="0" id="product-table">
  <tbody>
    <tr>
      <th class="table-header-check" width="39"><a id="toggle-all"></a> </th>
      <th class="table-header-repeat line-left minwidth-1" width="90"><a href="">Order <img alt="Save" title="Save" width="20" height="20" border="0" align="absmiddle" onclick="ChangeAction('admin.php?do=articles&act=order<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" style="cursor:pointer;" src="images/admin/save.png"></a></th>
      <th class="table-header-repeat line-left" width="120"><a href="">Image</a></th>
      <th class="table-header-repeat line-left"><a href="">Name</a></th>
      <th class="table-header-repeat line-left" width="20"><a href="">Home</a></th>
      <th class="table-header-repeat line-left" width="20"><a href="">Big</a></th>
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
      <td><a href="admin.php?do=articles&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>">
        <?=$stips[$i]["name_vn"]?>
        </a></td>
      <td><a href="admin.php?do=articles&act=change_home&cid=<?=$stips[$i]["cid"]?>&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["home"]?>&page=<?=isset($_GET['page'])?$_GET['page']:1; ?>">
        <?php
																if($stips[$i]["home"]=='1'){
															?>
        <img src="images/admin/checked.png" border="0"  width="24" height="24" title="Edit"/>
        <?	}else{	?>
        <img src="images/admin/hide.png" border="0"  width="24" height="24" title="Edit"/>
        <?	}	?>
        </a></td>
      <td><a href="admin.php?do=articles&act=change_big&cid=<?=$stips[$i]["cid"]?>&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["hot_news_big"]?>&page=<?=isset($_GET['page'])?$_GET['page']:1; ?>">
        <?php
																if($stips[$i]["hot_news_big"]=='1'){
															?>
        <img src="images/admin/checked.png" border="0"  width="24" height="24" title="Edit"/>
        <?	}else{	?>
        <img src="images/admin/hide.png" border="0"  width="24" height="24" title="Edit"/>
        <?	}	?>
        </a></td>
      <td><a href="admin.php?do=articles&act=change_active&cid=<?=$stips[$i]["cid"]?>&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?>&page=<?=isset($_GET['page'])?$_GET['page']:1; ?>">
        <?php
																if($stips[$i]["active"]=='1'){
															?>
        <img src="images/admin/checked.png" border="0"  width="24" height="24" title="Edit"/>
        <?	}else{	?>
        <img src="images/admin/hide.png" border="0"  width="24" height="24" title="Edit"/>
        <?	}	?>
        </a></td>
      <td><a title="Edit" class="icon-1 info-tooltip" href="admin.php?do=articles&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>"></a>
        <? if($_SESSION['group_user']!=2){ ?>
        <a class="icon-2 info-tooltip" href="#" title="Delete" onclick="CheckDelete('admin.php?do=articles&act=del&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');"></a>
        <? } ?>
        <a href="admin.php?do=tags&act=add&art_id=<?=$stips[$i]["id"]?>" title="Tạo tag">Tạo tag</a></td>
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