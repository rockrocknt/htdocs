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
    <input type="button" class="blueB" value="Thêm NHIỀU HÌNH MỚI"
            <?php if (getquery('cid') != ""){?>
                onclick="location.href='admin.php?do=images&act=addMultiImage&type=<?=$_GET['type']?>&cid=<?=$_GET['cid']?>'"
            <?php }else
                if (getquery('product_id') != "")
                {
                    $type = isset($_GET['type'])?$_GET['type']:0;
                    ?>
                    onclick="location.href='admin.php?do=images&act=addMultiImage&type=<?=$type?>&product_id=<?=$_GET['product_id']?>'"
                <?php
                }
            if (getquery('article_id') != "")
            {
                $type = isset($_GET['type'])?$_GET['type']:0;
                ?>
                onclick="location.href='admin.php?do=images&act=addMultiImage&type=<?=$type?>&article_id=<?=$_GET['article_id']?>'"
            <?php
            }


            ?>
            />


    	<input type="button" class="blueB none" value="Thêm"
            <?php if (getquery('cid') != ""){?>
               onclick="location.href='admin.php?do=images&act=add&type=<?=$_GET['type']?>&cid=<?=SafeQueryString('cid')?>'"
        <?php }else
            {
                $type = isset($_GET['type'])?$_GET['type']:0;
                ?>
                onclick="location.href='admin.php?do=images&act=add&type=<?=$type?>&product_id=<?=$_GET['product_id']?>'"
        <?php
            }
        ?>
            />
        <input type="button" class="blueB" value="Thêm 1 hình"
            <?php if (getquery('cid') != ""){?>
                onclick="location.href='admin.php?do=images&act=addone&type=<?=$_GET['type']?>&cid=<?=$_GET['cid']?>'"
            <?php }else
                if (getquery('product_id') != "")
                {
                    $type = isset($_GET['type'])?$_GET['type']:0;
                    ?>
                    onclick="location.href='admin.php?do=images&act=addone&type=<?=$type?>&product_id=<?=$_GET['product_id']?>'"
                <?php
                }
            if (getquery('article_id') != "")
            {
                $type = isset($_GET['type'])?$_GET['type']:0;
                ?>
                onclick="location.href='admin.php?do=images&act=addone&type=<?=$type?>&article_id=<?=$_GET['article_id']?>'"
            <?php
            }


            ?>
            />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=images&act=show&type=<?=$_GET['type']?>&cid=<?=SafeQueryString('cid')?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=images&act=hide&type=<?=$_GET['type']?>&cid=<?=SafeQueryString('cid')?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=images&act=dellist&type=<?=$_GET['type']?>&cid=<?=SafeQueryString('cid')?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>');return false;" />
    </div>
</div>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['mess']?></strong><a href="admin.php?do=images&act=add<?=isset($_GET['cid'])?('&cid='.$_GET['cid']):''?>&type=<?=$_GET['type']?>"><?=$_SESSION['mess']=="Thêm thành công!"?'Thêm ảnh khác':''?></a></p>
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
    <h6>Danh sách các hình ảnh</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td>Ảnh</td>
        <td class="sortCol"><div>Tên ảnh<span></span></div></td>
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
        </td>
        <td align="center">
            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Nhập stt ảnh" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('images', '<?=$stips[$i]['id']?>')" />
            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
        <td>
			<? if (file_exists($stips[$i]["img_vn"])) { ?>
            <img src="<?=$stips[$i]["img_vn"]?>" width="200" alt="" />
            <? } ?>
            <br/>
            Link: <a href="<? echo $stips[$i]["url_vn"]; ?>" target="_blank"><? echo $stips[$i]["url_vn"]; ?></a>
            <br/>
            category_id: <? echo $stips[$i]["category_id"]; ?>
        </td>
        <td class="title_name_data SC_bold">
            <a href="admin.php?do=images&act=edit&type=<?=$_GET['type']?>&cid=<?=SafeQueryString('cid')?>&id=<?=$stips[$i]["id"]?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>" class="tipS SC_bold" title=""><?=$stips[$i]["name_vn"]?></a>
        </td>
        <td align="center">
            <a href="admin.php?do=images&act=change_active&id=<?=$stips[$i]["id"]?>&cid=<?=SafeQueryString('cid')?>&current=<?=$stips[$i]["active"]?>&type=<?=$_GET['type']?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=images&act=edit&cid=<?=SafeQueryString('cid')?>&id=<?=$stips[$i]["id"]?>&type=<?=$_GET['type']?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>" title="" class="smallButton tipS" original-title="Sửa ảnh"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=images&act=del&cid=<?=SafeQueryString('cid')?>&id=<?=$stips[$i]["id"]?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>&type=<?=$_GET['type']?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa ảnh"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="7" align="center">Không có ảnh nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>