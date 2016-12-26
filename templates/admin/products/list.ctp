<? global $stips, $plpage; ?>

<script language="javascript">
    function CheckDelete(l){
        if(confirm('Bạn có chắc muốn xoá sản phẩm này?'))
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
                alert('Danh mục này không thuộc thể loại sản phẩm!');
            }
        }
    }
</script>

<div class="searchWidget" style="position:absolute; top:83px; left:358px; margin-top:0;">
    <form name="f2" method="post" action="admin.php?do=products&act=search" id="validate">
        <input type="text" value="<?=SafeQueryString('kw')?>" class="validate[required]" name="kw" placeholder="Nhập tên sản phẩm cần tìm" id="key" />
        <input type="submit" value="" name="find">
    </form>
</div>

<form name="f" id="f" method="post">
    <div class="control_frm" style="margin-top:0;">
        <div style="float:left;">
            <input type="button" class="blueB" value="Thêm" onclick="location.href='admin.php?do=products&act=add<?=isset($_GET['cid'])?('&cid='.$_GET['cid']):''?>'" />

            <?php if ($_SESSION['group_user'] == 1) {
                ?>
                <input type="button" class="blueB" value="HẾT HÀNG" onclick="ChangeAction('admin.php?do=products&act=set_hethang<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>');return false;" />
            <?
            }
            ?>
            
            <input type="button" class="blueB" value="Hiện" onclick="ChangeAction('admin.php?do=products&act=show<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>');return false;" />
            <input type="button" class="blueB" value="Ẩn" onclick="ChangeAction('admin.php?do=products&act=hide<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>');return false;" />
            <input type="button" class="blueB" value="Xoá" onclick="ChangeAction('admin.php?do=products&act=dellist<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>');return false;" />

            <br/>

            <select name="cid_cua_groupcha" style="width: 350px;">
                <option value="0">cid của Nhóm sản phẩm cha</option>
                <?
                $sql = "select * from categories where comp = 5 and id<> 151";
                $comps2 = $db->getAll($sql);
                foreach ($comps2 as $display) {
                    ?>
                    <option value="<?=$display['id']?>" ><?=$display['name_vn']?> - <?=$display['id']?></option>
                <? } ?>
            </select>

            <input type="button" class="blueB" value="Update" onclick="ChangeAction('admin.php?do=products&act=update_cid_cua_groupcha&<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?>&root=1<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>');return false;" />

        </div>
        <div style="float:right;">
            <div class="selector">
                <?php
                $cc = new Categories();
                $tree = $cc->admin_tree_filter(1, isset($_GET['cid'])?$_GET['cid']:0, 2);
                echo $tree;
                ?>
            </div>
        </div>
        <img src="./images/admin/question-button.png" alt="Tooltip" class="icon_que tipS" style="float:right; margin:5px 5px 0 0;" original-title="Dùng để di chuyển đến các danh mục thuộc thể loại sản phẩm (có màu xanh)">
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
            <h6>Danh sách các sản phẩm</h6>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
            <thead>
            <tr>
                <td></td>
                <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">ID</a></td>
                <td width="150">Hình ảnh</td>
                <td>Mã SP</td>
                <td class="sortCol"><div>Tên sản phẩm<span></span></div></td>
                <td width="100">Giá bán hiện tại</td>
                <td width="100">Giá chưa khuyến mãi</td>
                <td class="tb_data_small">Ẩn/Hiện</td>
                <td width="100">Khuyến mãi</td>
                <td width="200">Thao tác</td>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <td colspan="10"><?=$plpage?></td>
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
                            <input type="text" value="<?=$stips[$i]["num"]?>" name="ordering[]"
                                   onkeypress="return OnlyNumber(event)"
                                   class="tipS smallText " original-title="Số thứ tự sản phẩm, xếp từ nhỏ đến lớn" id="number<?=$stips[$i]['id']?>" onchange="return updateNumber('products', '<?=$stips[$i]['id']?>')" />
                            <br/>
                            <?=$stips[$i]["id"]?>
                            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['id']?>" src="images/site/loader.gif" alt="loader" /></div>
                        </td>
                        <td align="center">
                            <img src="<?=$stips[$i]["img"]?>" alt="<?=$stips[$i]["img"]?>" width="50" alt="" />

                        </td>
                        <td align="center"><?=$stips[$i]["code"]?></td>
                        <td class="title_name_data">
                            <a style="color: brown;" href="admin.php?do=products&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold"><?=$stips[$i]["name_vn"]?></a>
                            <br/>
                            cid_cua_groupcha=<?=$stips[$i]["cid_cua_groupcha"]?>
                            <br/>
                            Số lượng: <?=$stips[$i]["soluong"]?>(is_available = <?=$stips[$i]["is_available"]?> )<br/>
                            <a
                                href="admin.php?do=products&act=edit_thuoctinh&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold none">
                                <img src="images/admin/thuoctinh.png"/>
                                Thuộc tính s.phẩm</a>

                            <a href="admin.php?do=products&act=edit_soluong&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold none">
                                <img src="images/admin/soluongsp.png"/>
                                Số lượng s.phẩm</a>

                            <a href="admin.php?do=images&product_id=<?=$stips[$i]["id"]?>" class="tipS SC_bold">

                                Hình ảnh s.phẩm</a>

                            <br/>

                            <br/>
                            <div class="none">
                                Số lượng trong kho:<strong><?=$stips[$i]["soluong"]?></strong>
                            </div>
                        </td>
                        <td align="center"><?=number_format($stips[$i]["price"]).' '.CST_CURRENCY_CODE?></td>
                        <td align="center"><?=number_format($stips[$i]["price_sale"]?$stips[$i]["price_sale"]:$stips[$i]["price"]).' '.CST_CURRENCY_CODE?></td>
                        <td align="center">
                            <a href="admin.php?do=products&act=change_active<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?>&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" title="" class="smallButton tipS" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>"><img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt=""></a>
                        </td>
                        <td align="center">
                            <a href="#" onclick="return false;" class="smallButton tipS"><img src="./images/admin/icons/color/<?=$stips[$i]['price_sale']?'tick':'hide'?>.png" alt=""></a>
                        </td>
                        <td class="actBtns">
                            <a href="admin.php?do=products&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
                            <a href="" onclick="CheckDelete('admin.php?do=products&act=del&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/admin/icons/dark/close.png" alt=""></a>
                            <? $product = new products($stips[$i]); ?>
                            <a href="<?=$product->getLink()?>" target="_blank" title="" class="smallButton tipS" original-title="Xem sản phẩm"><img src="./images/admin/eye_inv.png" alt=""></a>
                        </td>
                    </tr>
                <? } ?>
            <? } else { ?>
                <tr>
                    <td colspan="10" align="center">Không có sản phẩm nào</td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>
</form>