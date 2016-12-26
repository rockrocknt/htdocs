<? global $stips, $page, $set_per_page, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá ảnh này?'))
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
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=img&act=add&cid=<?=$_GET['cid']?>'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=img&act=show&cid=<?=isset($_GET['cid'])?$_GET['cid']:''?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>'); return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=img&act=hide&cid=<?=isset($_GET['cid'])?$_GET['cid']:''?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=img&act=dellist&cid=<?=isset($_GET['cid'])?$_GET['cid']:''?>'); return false;" />
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
    <h6>Danh sách</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td>Ảnh</td>
        <td class="sortCol"><div>Tên<span></span></div></td>
        <td width="300">Đường dẫn</td>
        <td class="tb_data_small">Ẩn/Hiện</td>
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
            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]["id"]?>" id="check<?=$i?>" />
            <?=$stips[$i]["id"]?>
        </td>
        <td align="center">
            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Nhập stt ảnh" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('img', '<?=$stips[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
        <td>

            <img src="<?=$stips[$i]["img_vn"]?>" width="150" alt="<?=$stips[$i]["img_vn"]?>" />

        </td>
        <td class="title_name_data">
            <a href="admin.php?do=img&act=edit<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''; ?>&id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" class="tipS SC_bold" title=""><?=$stips[$i]["name_vn"]?></a>
            <div class="content_control_hide">
                <ul class="ct_hide">
                    <li><a href="admin.php?do=img&act=edit<?=isset($_GET['cid'])?"&cid=".$_GET['cid']:''; ?>&id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" title="">Sửa</a> | </li>
                    <li><a href="" onclick="CheckDelete('admin.php?do=img&act=del<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''; ?>&id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>'); return false;" title="">Xóa</a></li>
                </ul>
            </div>
        </td>
        <td align="center"><?=$stips[$i]["url_vn"]?></td>
        <td align="center">
            <a href="admin.php?do=img&act=change_active&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''; ?>&current=<?=$stips[$i]["active"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=img&act=edit<?=isset($_GET['cid'])?"&cid=".$_GET['cid']:''; ?>&id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" title="" class="smallButton tipS" original-title="Sửa ảnh"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=img&act=del<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''; ?>&id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa ảnh"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="7" align="center">Không có dữ liệu nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>