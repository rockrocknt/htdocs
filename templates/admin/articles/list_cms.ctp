<? global $stips, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá tin tức này?'))
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
				alert('Danh mục này không phải thể loại tin tức!');
			}
		}
	}
</script>

<div class="searchWidget" style="position:absolute; top:83px; left:132px; margin-top:0;">
    <form name="f2" method="post" action="admin.php?do=articles&act=search" id="validate">
        <input type="text" value="<?=SafeQueryString('kw')?>" class="validate[required]" name="kw" placeholder="Nhập tiêu đề, nội dung tin tức cần tìm" id="key" />
        <input type="submit" value="" name="find">
    </form>
</div>

<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=articles&act=add<?=isset($_GET['cid'])?('&cid='.$_GET['cid']):''?>'" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=articles&act=dellist<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?>');return false;" />
    </div>
    <div style="float:right;">
        <div class="selector">
			<?php
                $cc = new Categories();
            	$tree = $cc->admin_tree_filter(1, isset($_GET['cid'])?$_GET['cid']:0, 1);
                echo $tree;
            ?>
        </div>  
    </div>
  	<img src="./images/admin/question-button.png" alt="Tooltip" class="icon_que tipS" style="float:right; margin:5px 5px 0 0;" original-title="Dùng để di chuyển đến các danh mục thuộc thể loại tin tức (có màu xanh)">
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
    <h6>Danh sách các tin tức</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td>Ảnh</td>
        <td class="sortCol"><div>Tên tin tức<span></span></div></td>
        <td class="sortCol" width="200"><div>Người tạo<span></span></div></td>
        <td width="100">Ngày viết</td>
        <td width="200">Ngày hiện</td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="250">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="9"><?=$plpage?></td>
      </tr>
    </tfoot>
    <tbody>
    <? 
		if ($stips) {
		for ($i=0; $i<count($stips); $i++) { ?>
      <tr>
        <td>
            <? if (cmsFunction::isNoEdit($stips[$i])) { } else {?><input type="checkbox" name="iddel[]" value="<?=$stips[$i]["id"]?>" id="check<?=$i?>" /><? } ?>
        </td>
        <td align="center">
            <input type="text" value="<?=$stips[$i]["num"]?>" readonly="readonly" class="tipS smallText" id="number<?=$stips[$i]['id']?>" />
        </td>
        <td>
        <?php if (file_exists($stips[$i]["img"])) { ?>
        <img src="<?=getTimThumb($stips[$i]["img"], 100)?>" alt="" />
        <? } ?>
        </td>
        <td class="title_name_data SC_bold">
            <? if (cmsFunction::isNoEdit($stips[$i])) { echo $stips[$i]["name_vn"]; } else {?><a href="admin.php?do=articles&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS"><?=$stips[$i]["name_vn"]?></a><? } ?>
        </td>
        <td align="center"><?=$stips[$i]['admin_name']?></td>
      	<td><?=formatDate($stips[$i]['dated'])?></td>
        <td align="center"><?=formatDateTime($stips[$i]['publish_date'])?></td>
        <td align="center">
            <a class="smallButton" href="#" onclick="return false;" style="cursor:default;"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
			<? if (cmsFunction::isNoEdit($stips[$i])) { 
            } else { ?>
            <a href="admin.php?do=articles&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="" class="smallButton tipS" original-title="Sửa tin tức"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=articles&act=del&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa tin tức"><img src="./images/admin/icons/dark/close.png" alt=""></a>
            <? } ?>
            <? $article = new articles($stips[$i]); ?>
            <a href="<?=$article->getLink()?>" target="_blank" title="" class="smallButton tipS" original-title="Xem tin tức"><img src="./images/admin/eye_inv.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="9" align="center">Không có tin tức nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>