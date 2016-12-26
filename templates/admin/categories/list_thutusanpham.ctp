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

<div class="searchWidget none" style="position:absolute; top:83px; left:252px; margin-top:0;">
    <form name="f2" method="post" action="admin.php?do=products&act=search" id="validate">
        <input type="text" value="<?=SafeQueryString('kw')?>"
               class="validate[required] none" name="kw" placeholder="Nhập tên sản phẩm cần tìm" id="key" />
        <input type="submit" value="" name="find">
    </form>
</div>

<form name="f" id="f" method="post">
    <div class="control_frm" style="margin-top:0;">
        <div style="float:left;">
            <input type="button" class="blueB none" value="Thêm" onclick="location.href='admin.php?do=products&act=add<?=isset($_GET['cid'])?('&cid='.$_GET['cid']):''?>'" />
            <input type="button" class="blueB none" value="Hiện" onclick="ChangeAction('admin.php?do=products&act=show<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" />
            <input type="button" class="blueB none" value="Ẩn" onclick="ChangeAction('admin.php?do=products&act=hide<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>');return false;" />
            <input type="button" class="blueB none" value="Xoá" onclick="ChangeAction('admin.php?do=products&act=dellist<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?>');return false;" />
        </div>
        <div style="float:right;" class="none">
            <div class="selector none">
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
    <div class="none">
        Chú ý: đối với sản phẩm có màu sắc, chỉ cần sắp xếp 1 SẢN PHẨM có nhiều MÀU SẮC trước
        <a target="_blank"
           href="https://drive.google.com/file/d/0B5W58W12F-zYM0NLSVJIU2hfejA/edit?usp=sharing">link</a>
    </div>
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
                <td class="tb_data_small"><a href="#" class="tipS" style="margin: 5px;">Thứ tự</a></td>
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
                            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]['pcID']?>" id="check<?=$i?>" />
                        </td>
                        <td align="center">
                            <input type="text" value="<?=$stips[$i]["pcNum"]?>"
                                   name="ordering[]"
                                   onkeypress="return OnlyNumber(event)"
                                   class="tipS smallText" original-title="Số thứ tự sản phẩm, xếp từ nhỏ đến lớn"
                                   id="number<?=$stips[$i]['pcID']?>"
                                   onchange="return updateNumber('product_category', '<?=$stips[$i]['pcID']?>')" />
                            <br/>
                            <?=$stips[$i]["id"]?>
                            <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$stips[$i]['pcID']?>" src="images/site/loader.gif" alt="loader" /></div>
                        </td>
                        <td align="center">
                            <?php if (file_exists($stips[$i]["img"])) { ?>
                                <img src="<?=getTimThumb($stips[$i]["img"], 100)?>" alt="" />
                            <? } ?>
                        </td>
                        <td align="center"><?=$stips[$i]["code"]?></td>
                        <td class="title_name_data">
                            <a style="color: brown;" href="admin.php?do=products&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold"><?=$stips[$i]["name_vn"]?></a>
                            <br/>

                            <a
                                href="admin.php?do=products&act=edit_thuoctinh&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold none">
                                <img src="images/admin/thuoctinh.png"/>
                                Thuộc tính s.phẩm</a>

                            <a href="admin.php?do=products&act=edit_soluong&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold none">
                                <img src="images/admin/soluongsp.png"/>
                                Số lượng s.phẩm</a>

                            <a href="admin.php?do=images&product_id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold">

                                Hình ảnh s.phẩm</a>

                            <br/>
                            <a target="_blank" href="admin.php?do=products&act=danhmucphu&product_id=<?=$stips[$i]["id"]?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" class="tipS SC_bold">

                                Danh mục phụ</a>
                            <br/>
                            Số lượng trong kho:<strong><?=$stips[$i]["soluong"]?></strong>

                        </td>
                        <td align="center"><?=number_format($stips[$i]["price"]).' '.CST_CURRENCY_CODE?></td>
                        <td align="center"><?=number_format($stips[$i]["price_sale"]?$stips[$i]["price_sale"]:$stips[$i]["price"]).' '.CST_CURRENCY_CODE?></td>
                        <td align="center">
                            <a

                                href="admin.php?do=products&act=change_active<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?>&id=<?=$stips[$i]["id"]?>&current=<?=$stips[$i]["active"]?><?=isset($_GET['page'])?"&page=".$_GET['page']:''?>" title=""
                                class="smallButton tipS none" original-title="<?=$stips[$i]['active']?'Click để ẩn':'Click để hiện'?>">
                                <img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt="">
                            </a>
                            <img src="./images/admin/icons/color/<?=$stips[$i]['active']?'tick':'hide'?>.png" alt="">
                        </td>
                        <td align="center">
                            <a href="#" onclick="return false;" class="smallButton tipS"><img src="./images/admin/icons/color/<?=$stips[$i]['price_sale']?'tick':'hide'?>.png" alt=""></a>
                        </td>
                        <td class="actBtns ">
                            <div class="none">
                                <a href="admin.php?do=products&act=edit&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="" class="smallButton tipS" original-title="Sửa sản phẩm"><img src="./images/admin/icons/dark/pencil.png" alt=""></a>
                                <a href="" onclick="CheckDelete('admin.php?do=products&act=del&id=<?=$stips[$i]["id"]?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/admin/icons/dark/close.png" alt=""></a>
                                <? $product = new products($stips[$i]); ?>
                                <a href="<?=$product->getLink()?>" target="_blank" title="" class="smallButton tipS" original-title="Xem sản phẩm"><img src="./images/admin/eye_inv.png" alt=""></a>
                            </div>
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