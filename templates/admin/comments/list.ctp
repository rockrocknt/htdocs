<? global $stips, $page, $set_per_page, $plpage, $products, $articles; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá nội dung bình luận này?'))
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
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=comments&act=show<?=isset($_GET['page'])?'&page='.$_GET['page']:''?>')" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=comments&act=hide<?=isset($_GET['page'])?'&page='.$_GET['page']:''?>')" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=comments&act=dellist');return false;" />
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
    <h6>Danh sách các bình luận</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">STT</a></td>
        <td class="sortCol"><div>Thông tin người dùng<span></span></div></td>
        <td width="300">Nội dung bình luận</td>
        <td width="200">Ngày</td>
        <td class="tb_data_small">Ẩn/Hiện</td>
        <td width="250">Thao tác</td>
      </tr>
    </thead>
    <tfoot>
      <tr>
        <td colspan="8"><?=$plpage?></td>
      </tr>
    </tfoot>
    <tbody>
    <? if ($stips) {
		for ($i=0; $i<count($stips); $i++) { ?>
      <tr>
        <td>
            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]["cmt_id"]?>" id="check<?=$i?>" />
        </td>
        <td align="center"><?=($page-1)*$set_per_page+$i+1?></td>
        <td class="title_name_data">
            <div class="order-infos">
            	<p><span class="order-info-title">Tên:</span><span><?=$stips[$i]['cmt_name']?></span></p>
                <p><span class="order-info-title">Email:</span><span><?=$stips[$i]['cmt_email']?></span></p>
                <p>
                    <?php
                    $avatar = "/image_site/avatar.jpg";
                    if (file_exists($stips[$i]['cmt_avatar'])){
                        $avatar = "/".$stips[$i]['cmt_avatar'];
                    }
                    ?>
                <div class="avatar" style="width: 70px;">
                    <img src="<?=$avatar?>"  style="width: 70px;"   alt="" />
                </div>
                </p>
            </div>
        </td>
        <td>
            <?=$stips[$i]['cmt_sao']?> sao<br/>
        <?php
        if ($stips[$i]["cmt_post_id"] > 0)
        {
            $product = products::getbyID($stips[$i]["cmt_post_id"]);
            $proobj = new products($product);
            ?>
            <a href="<?=$proobj->getLink()?>" target="_blank"><?=$proobj->getName()?></a>
        <?
        }
        ?>
            <br/>
            <?=SubStrEx(strip_tags($stips[$i]["cmt_content"]), 200)?>
        </td>
        <td align="center"><?=formatDate($stips[$i]["cmt_insert_date"])?></td>
        <td align="center">
        	<a href="admin.php?do=comments&act=change_active&id=<?=$stips[$i]["cmt_id"]?>&current=<?=$stips[$i]["cmt_active"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['cmt_active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['cmt_active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns" style="text-align:left;">
            <a href="" onclick="CheckDelete('admin.php?do=comments&act=del&cmt_id=<?=$stips[$i]["cmt_id"]?>'); return false;" title="" class="smallButton tipS" original-title="Xóa bình luận"><img src="./images/admin/icons/dark/close.png" alt=""></a>
            <a href="admin.php?do=comments&act=detail&id=<?=$stips[$i]["cmt_id"]?>" target="_blank" class="smallButton tipS" original-title="Xem chi tiết"><img src="./images/admin/eye_inv.png" alt=""></a>
			<? if ($stips[$i]["view"]==0) { ?>
            <span class="numberTop" style="float:none; margin:0; display:inline-block">NEW</span>
            <? } ?>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="8" align="center">Không có bình luận nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>