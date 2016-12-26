<? global $stips, $plpage; ?>

<script language="javascript">
    function CheckDelete(l){
        if(confirm('Bạn có chắc muốn xoá số lượng này?'))
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
                location.href = "admin.php?do=products&act=list&productatt_id="+xmlHttp.responseText;
            else{
                alert('Danh mục này không thuộc thể loại sản phẩm!');
            }
        }
    }
</script>

<form name="form2" id="form2" method="post" class="form"
    action="admin.php?do=products&act=edit_soluongsm&id=<?=$_GET[id]?>"
    >
    <div class="selector">
        <select name="mausac">
            <option value="0">Tất cả các màu</option>
            <?php
            global $productattList,$db;
            $sql = "select * from `productattchild` where `productatt_id` = 2";
            $productattList = $db -> getAll($sql);

            for($i = 0; $i < count($productattList); $i++)
            {
                $productatt = $productattList[$i];
                ?>
                <option value="<?=$productatt['productattchild_id']?>"

                    ><?=$productatt['productattchild_name_vn']?></option>

            <?php
            }
            ?>
        </select>
    </div>
    <div class="selector">
        <select name="size">
            <option value="0">Tất cả các size</option>
            <?php
            global $productattList,$db;
            $sql = "select * from `productattchild` where `productatt_id` = 1";
            $productattList = $db -> getAll($sql);

            for($i = 0; $i < count($productattList); $i++)
            {
                $productatt = $productattList[$i];
                ?>
                <option value="<?=$productatt['productattchild_id']?>"

                    ><?=$productatt['productattchild_name_vn']?></option>

            <?php
            }
            ?>
        </select>
     </div>
    <input name="soluong" type="text" class="tipS" style="width: 50px" placeholder="Số lượng">
    <input type="submit" class="blueB" value="Thêm" onclick="" />
    </form>
<br/>
<br/>
<form name="f" id="f" method="post">
    <div class="control_frm" style="margin-top:0;">
        <div style="float:left;">

            <input type="button" class="blueB" value="Xoá"
                   onclick="ChangeAction('admin.php?do=products&act=dellistsoluongsm<?=isset($_GET['id'])?('&id='.$_GET['id']):''?>');return false;" />
        </div>
        <div style="float:right;">
            <div class="selector">

            </div>
        </div>
        <?php
        /*
         *<img  src="./images/admin/question-button2.png" alt="Tooltip" class="icon_que tipS dnone" style="float:right; margin:5px 5px 0 0;" original-title="Dùng để di chuyển đến các danh mục thuộc thể loại sản phẩm (có màu xanh)">
         */
        ?>

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
            <h6>Quản lý số lượng sản phẩm "<span style="color: brown;"><?=$product['name_vn']?></span>"</h6>
            <?php // var_dump($stips); ?>
        </div>
        <table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
            <thead>
            <tr>
                <td></td>

                <td class="sortCol"><div>Màu sắc / Size<span></span></div></td>
                <td width="100">Số lượng</td>
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
                for ($i=0; $i<count($stips); $i++) {
                    $row = $stips[$i];
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" name="iddel[]" value="<?=$stips[$i]["productqty_id"]?>" id="check<?=$i?>" />
                        </td>

                        <td class="title_name_data">
                            <?php
                            global $db,$product,$stips, $productQty, $colorList,$sizeList;
                            for($count=0;$count<count($colorList);$count++)
                            {
                                if ($colorList[$count]['productattchild_id']== $row['productcolor_id'])
                                {
                                    ?>
                                    <img src="/<?php echo $colorList[$count]['productattchild_img']; ?>"/>
                            <?php
                                    echo $colorList[$count]['productattchild_name_vn'];
                                }
                            }
                            ?>/

                            <?php
                            global $db,$product,$stips, $productQty, $colorList,$sizeList;
                            for($count=0;$count<count($sizeList);$count++)
                            {
                                if ($sizeList[$count]['productattchild_id']== $row['productsize_id'])
                                {
                                    ?>

                                    <?php
                                    echo $sizeList[$count]['productattchild_name_vn'];
                                }
                            }
                            ?>


                        </td>
                        <td align="center">
                            <input type="text" value="<?=$stips[$i]["productquantity"]?>" name="ordering[]"
                                   onkeypress="return OnlyNumber(event)"
                                   class="tipS smallText"
                                   original-title="Số thứ tự sản phẩm, xếp từ nhỏ đến lớn"
                                   id="number<?=$stips[$i]['productqty_id']?>"
                                   onchange="return updateSoluong('productqty', '<?=$stips[$i]['productqty_id']?>')" />
                        </td>

                        <td class="actBtns">

                            <a href="" onclick="CheckDelete('admin.php?do=products&act=delsoluongsm&productqty_id=<?=$stips[$i]["productqty_id"]?><?=isset($_GET['id'])?'&id='.$_GET['id']:''?>'); return false;" title="" class="smallButton tipS" original-title="Xóa sản phẩm"><img src="./images/admin/icons/dark/close.png" alt=""></a>

                            <? $product = new products($stips[$i]); ?>



                        </td>
                    </tr>
                <? } ?>
            <? } else { ?>
                <tr>
                    <td colspan="10" align="center">Không có thuộc tính con</td>
                </tr>
            <? } ?>
            </tbody>
        </table>
    </div>
</form>
<script type="text/javascript">
    function updateSoluong(table, id)
    {
        var num = $('#number'+id).val();

        $('#ajaxloader'+id).css('display', 'block');
        $.ajax({
            type: 'POST',
            url: baseurl + '/ajax.php?do=number&act=update_soluong',
            data: {'table':table,'id':id,
                'num':num
            },

            success: function(data) {
                $('#ajaxloader'+id).css('display', 'none');
                $('#number'+id).val(num)
            }
        });
    }
</script>