<? global $stips, $plpage; ?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Bạn có chắc muốn xoá danh mục này?'))
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
		var url="ajax/check.php";
		url=url+"?id="+value;
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=ReadyTreeFilterChanged ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
	
	function ReadyTreeFilterChanged(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 	
			if(xmlHttp.responseText != "0")
				location.href = "admin.php?do=categories&act=list&cid="+xmlHttp.responseText+"&root=1";
			else{
				alert('Danh mục này không phải thể loại có menu con!');
			}
		}
	}
</script>
<div class="searchWidget" style="position:absolute; top:83px; left:356px; margin-top:0;">
    <form name="f2" method="post" action="admin.php?do=categories&act=search" id="validate">
        <input type="text" value="<?=SafeQueryString('kw')?>" class="validate[required]" name="kw"
               placeholder="Nhập s tiêu đề danh mục cần tìm" id="key" />
        <input type="submit" value="" name="find">
    </form>
</div>



<form name="f" id="f" method="post">
<div class="control_frm" style="margin-top:0">
  	<div style="float:left;">
    	<input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=categories&act=add&cid=<?=$_GET["cid"]?>&root=1'" />
        <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=categories&act=show&cid=<?=$_GET["cid"]?>&root=1<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>');return false;" />
        <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=categories&act=hide&cid=<?=$_GET["cid"]?>&root=1<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>');return false;" />
        <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=categories&act=dellist&cid=<?=$_GET["cid"]?>&root=1');return false;" />
        <br/>

        <select name="cid_menu_left" style="width: 350px;">
            <option value="0">cid của menu left</option>
            <?
            $sql = "select * from categories where comp = 5   order by name_vn";
            $comps2 = $db->getAll($sql);
            foreach ($comps2 as $display) {
                ?>
                <option value="<?=$display['id']?>" ><?=$display['name_vn']?></option>
            <? } ?>

            <?
            $sql = "select * from categories where comp = 2   order by name_vn";
            $comps2 = $db->getAll($sql);
            foreach ($comps2 as $display) {
                ?>
                <option value="<?=$display['id']?>" >--<?=$display['name_vn']?></option>
            <? } ?>


        </select>

        <input type="button" class="blueB" value="Update" onclick="ChangeAction('admin.php?do=categories&act=update_cid_menuleft&cid=121&root=1<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>');return false;" />


    </div>
    <div style="float:right;">
        <div class="selector">
			<?php
				$basecat["id"] = 1;
                $cc = new Categories($basecat);
                $tree = $cc->admin_tree_filter(1, $_GET['cid'], 0);
                echo $tree;
            ?>
        </div>        
    </div>
  	<img src="./images/admin/question-button.png" alt="Tooltip" class="icon_que tipS" style="float:right; margin:5px 5px 0 0;" original-title="Dùng để di chuyển đến các danh mục thuộc thể loại có menu con">
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
    <h6>Danh sách các danh mục</h6>
  </div>
  <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
    <thead>
      <tr>
        <td></td>
        <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
        <td class="sortCol"><div>Tên danh mục<span></span></div></td>
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
            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Số thứ tự của danh mục, xếp từ nhỏ đến lớn" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('categories', '<?=$stips[$i]['id']?>')" />
            <br/>
            <?=$stips[$i]["id"]?>
            <div id="ajaxloader">
                <img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
        </td>
        <td class="title_name_data">
            <?
                $link = 'admin.php?do=categories&act=edit&id='.$stips[$i]["id"].'&cid='.$stips[$i]["pid"].'&root=1'.(isset($_GET['page'])?'&page='.$_GET['page']:'');
            ?>
            <a href="<?=$link?>" class="tipS SC_bold" title=""><?=$stips[$i]["name_vn"]?></a>
            <br/>(cid_menu_left=<?=$stips[$i]['cid_menu_left']?>)
        </td>
        <td align="center">
            <?
				global $db;
				$sql = "select * from component where id=".$stips[$i]["comp"];
				$r = $db->getRow($sql);

                if ($stips[$i]["has_child"] == '1')
                    $link = 'admin.php?do=categories&cid='.$stips[$i]["id"].'&root=1';

                else
                {
					if (strlen($r['back_link'])>2)
                    	$link = 'admin.php'.$r['back_link'].'&cid='.$stips[$i]['id'];
					else
						$link = "";
                }



            ?>

            <? if ($link) { ?>
            <?=$r["name"]?>
            <p>


            <?php if ($stips[$i]["comp"] == 2) { ?>
                <a href="/admin.php?do=images&type=4&cid=<?=$stips[$i]["id"]?>">Menu trái danh mục sản phẩm </a>- <a target="_blank" href="http://goo.gl/nHwndX">Giải thích</a><br/>

            <?php
            }
            ?>
                <a href="<?=$link?>" class="tipS SC_bold" title="">
            	<?php if ($stips[$i]["comp"] == 1) { ?>
                Click để quản lý tin tức
                <?php } else if ($stips[$i]["comp"] == 2) { ?>
                    <?php if ($stips[$i]["categories_displaytype_id"] == 1) { ?>
                Click để quản lý sản phẩm
                        <?php } ?>
                <?php } else if ($stips[$i]["comp"] == 9) { ?>
                Click để quản lý danh mục con
                <?php }else  if ($stips[$i]["comp"] == 6) {?>
                    Click để quản lý hình ảnh catalogue
                    <?php
                }
                ?>

                </a>

                <br/>
                <?php if ($stips[$i]["comp"] == 2) { ?>
                <a  target="_blank" href="admin.php?do=categories&act=list_thutusanpham&cid=<?=$stips[$i]["id"]?>" class="tipS SC_bold none" title="">
                    Quản lý thứ tự SẢN PHẨM
                </a>
                <?php }?>
            </p>
			<? } else { echo $r["name"]; } ?>
            <br/>
            <?php
            if (($stips[$i]['pid'] == 290))

            {
                //  echo "co banner";
                $cid = $stips[$i]['id'];
                ?>
                <br/>
                <a class="tipS SC_bold" href="admin.php?do=images&cid=<?=$cid?>&type=2">Quản lý Banner SẢN PHẨM nhỏ bên phải</a>
            <?
            }
            ?>



            <?php
            if (($stips[$i]['categories_displaytype_id'] == 2)
            && ($stips[$i]['has_child'] == 1))
            {
              //  echo "co banner";
                $cid = $stips[$i]['id'];
                ?>
            <a class="tipS SC_bold" href="admin.php?do=images&cid=<?=$cid?>&type=1">Quản lý Banner lớn</a>
                <br/>
                <a class="tipS SC_bold" href="admin.php?do=images&cid=<?=$cid?>&type=2">Quản lý Banner nhỏ</a>
                <?
            }
            ?>

            <?php
            if (($stips[$i]['categories_displaytype_id'] == 9)
                && ($stips[$i]['has_child'] == 1))
            {
                //  echo "co banner";
                $cid = $stips[$i]['id'];
                ?>
                <a class="tipS SC_bold" href="admin.php?do=images&cid=<?=$cid?>&type=1">Quản lý Banner lớn</a>

            <?
            }
            ?>
            <?php
            if (($stips[$i]['categories_displaytype_id'] == 4)
                && ($stips[$i]['has_child'] == 1))
            {
                //  echo "co banner";
                $cid = $stips[$i]['id'];
                ?>
                <a class="tipS SC_bold" href="admin.php?do=images&cid=<?=$cid?>&type=2">Quản lý Banner nhỏ</a>

            <?
            }
            ?>
            <?php
            if (($stips[$i]['categories_displaytype_id'] == 13)
                && ($stips[$i]['has_child'] == 1))
            {
                //  echo "co banner";
                $cid = $stips[$i]['id'];
                ?>
                <a class="tipS SC_bold" href="admin.php?do=images&cid=<?=$cid?>&type=1">Quản lý Banner lớn</a>

            <?
            }
            ?>


            <?php
            if (($stips[$i]['categories_displaytype_id'] == 7)
                && ($stips[$i]['comp'] == 3))
            {
                //  echo "co banner";
                $cid = $stips[$i]['id'];
                ?>

                <br/>
                <a class="tipS SC_bold" href="admin.php?do=images&cid=<?=$cid?>&type=2">Quản lý Banner nhỏ</a>
            <?
            }
            ?>


            <?php
            if (($stips[$i]['categories_displaytype_id'] == 10)
                && ($stips[$i]['comp'] == 3))
            {
                //  echo "co banner";
                $cid = $stips[$i]['id'];
                ?>

                <br/>
                <a class="tipS SC_bold" href="admin.php?do=images&cid=<?=$cid?>&type=2">Quản lý Banner lớn</a>
            <?
            }
            ?>

            <?
            // trang chu
            if ($stips[$i]["comp"] == 5) { ?>
                <a href="/admin.php?do=images&type=1&cid=<?=$stips[$i]["id"]?>">Slider lớn </a><br/>
                <a href="/admin.php?do=images&type=2&cid=<?=$stips[$i]["id"]?>">3 banner nhỏ </a><br/>
                <a href="/admin.php?do=images&type=3&cid=<?=$stips[$i]["id"]?>">Danh mục sản phẩm (ở trang chủ này) </a><br/>
                <a href="/admin.php?do=images&type=6&cid=<?=$stips[$i]["id"]?>">Thông tin bổ ích (Cat ID) </a><br/>
                <br/>
                <a href="/admin.php?do=images&type=4&cid=<?=$stips[$i]["id"]?>">Menu trái danh mục sản phẩm </a>- <a target="_blank" href="http://goo.gl/nHwndX">Giải thích</a><br/>
                <a href="/admin.php?do=images&type=5&cid=<?=$stips[$i]["id"]?>">Logo thương hiệu </a><br/>

            <?php } ?>


        </td>
        <td align="center">
            <a href="admin.php?do=categories&act=change_active&cid=<?=$stips[$i]["pid"]?>&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>&root=1" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
        </td>
        <td class="actBtns">
            <a href="admin.php?do=categories&act=edit&id=<?=$stips[$i]["id"]?>&cid=<?=$_GET["cid"]?>&root=1<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" title="" class="smallButton tipS" original-title="Sửa danh mục"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
            <a href="" onclick="CheckDelete('admin.php?do=categories&act=del&id=<?=$stips[$i]["id"]?>&cid=<?=$_GET["cid"]?>&root=1'); return false;" title="" class="smallButton tipS" original-title="Xóa danh mục"><img src="./images/admin/icons/dark/close.png" alt=""></a> 
            <? if ($_GET['cid'] != 1) { 
				$cat = new Categories($stips[$i]);
			?>
            <a href="<?=$cat->getLink()?>" target="_blank" title="" class="smallButton tipS" original-title="Xem danh mục"><img src="./images/admin/eye_inv.png" alt=""></a> 
            <? } ?>
        </td>
      </tr>
      <? } ?>
      <? } else { ?>
      <tr>
        <td colspan="6" align="center">Không có danh mục nào</td>
      </tr>
      <? } ?>
    </tbody>
  </table>
</div>
</form>