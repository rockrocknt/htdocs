<? global $stips, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá widget này?'))
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
<div class="control_frm" style="margin-top:0">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=widgets&act=add&cid=<?=$_GET["cid"]?>'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=widgets&act=show&cid=<?=$_GET["cid"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=widgets&act=hide&cid=<?=$_GET["cid"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=widgets&act=dellist&cid=<?=$_GET["cid"]?>');return false;" />
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
    <h6>Danh sách các widget</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td class="sortCol"><div>Tên widget<span></span></div></td>
        <td class="sortCol"><div>Thể loại<span></span></div></td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td>Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="6"><?=$plpage?></td>
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
        <td align="center">
            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Thứ tự hiển thị, xếp từ nhỏ đến lớn" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('widgets', '<?=$stips[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
        <td class="title_name_data">
            <? if ($stips[$i]["comp"] == '0') {?>
            	<a href="admin.php?do=widgets&cid=<?=$stips[$i]["id"]?>" class="tipS SC_bold" title=""><?=$stips[$i]["name_vn"]?></a>
            <? } else { ?>
            	<a href="admin.php?do=widgets&act=edit&id=<?=$stips[$i]["id"]?>&cid=<?=$_GET["cid"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="tipS SC_bold" ><?=$stips[$i]["name_vn"]?></a>
            <? } ?>
        </td>
        <td align="center">
			<?php
                global $db;
                $sql = "select * from modules_widget where id=".$stips[$i]["comp"];
                $r = $db->getRow($sql);
                echo $r["name"];
            ?>
        </td>
        <td align="center">
            <a href="admin.php?do=widgets&act=change_active&cid=<?=$stips[$i]["cid"]?>&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=widgets&act=edit&id=<?=$stips[$i]["id"]?>&cid=<?=$_GET["cid"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="smallButton tipS" original-title="Sửa widget"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=widgets&act=del&id=<?=$stips[$i]["id"]?>&cid=<?=$_GET["cid"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa widget"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="6" align="center">Không có widget nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>