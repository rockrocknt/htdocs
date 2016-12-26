<?php global $FullUrl;
$qty  = cart::getQuantity();
$totalall = 0;
?>
<script type="text/javascript">var srccode;</script>
<div id="accRightSection">

    <div>
        <div id="accCartHeader">
            <div class="accRightLink"><a href="<?=$FullUrl?>/xem-gio-hang.html">Sửa</a></div>

            <div id="basketHeader" class="accBasketHeading">GIỎ HÀNG</div>
        </div>
        <div id="accCart" class="accRightContainer">

            <div class="accBasketCount">(<?=$qty?> sản phẩm)</div>
            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>

                <?php


                if ($qty > 0)
                {
                    $total = 0;
                    $listPro = cart::getCart();
                    for($i=0;$i<count($listPro);$i++)
                    {
                        $product3 = $listPro[$i];
                        ?>

                        <tr>
                            <td colspan="3"></td>
                        </tr>


                        <tr valign="top">

                            <td>
                                <div>

                                    <img
                                        width="80"
                                        height="80"
                                        src="<?=$FullUrl."/". $product3["img"]?>" border="0" alt="276274" class="basketItemImage">

                                </div>

                            </td>

                            <td></td>
                            <td>

                                <div class="accProductName"><?=$product3["name"]?></div>

                                <div class="none">12ft Foil Garland</div>

                                <div class="accTableItem accShortDesc">

                                </div>

                                <div>Quantity:<span class="accTableItemValue"><?=$product3["soluong"]?></span></div>

                                <div class="accTableItem">Price:<span class="accTableItemValue">
                                        <?=formatPrice($product3["thanhtien"])?></span></div>


                            </td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>
                        <tr>
                            <td class="accGrayDivider" colspan="3"></td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                        </tr>




                        <?php
                        $total+= $product3["thanhtien"];
                        $totalall += $product3["thanhtien"];

                        ?>

                    <?
                    }//for($i=0;$i<count($listPro);$i++)
                    ?>
                <?}
                ?>







                <tr>
                    <td colspan="3"></td>
                </tr>
                </tbody>

            </table>
        </div>
    </div>

    <div class="accRightHeader">
        <div class="accSummaryHeading">Chi tiết</div>
    </div>
    <div id="accSummary" class="accRightContainer">
        <div id="summary_container">
            <input value="$2.98" id="gCartSummary" type="hidden">



            <table border="0" cellpadding="0" cellspacing="0" width="100%">
                <tbody>
                <tr class="accSumRevRow">
                    <td class="accSumRevLeftCol"><div class="tableitem"><b>Tiền hàng </b></div></td>
                    <td class="accSumRevRightCol"><div class="tableitem"><b><? echo formatPrice($total); ?></b></div></td>

                </tr>

                <?php

                if (isset($_SESSION['coupon'])){

                    $coupon = $_SESSION['coupon'];
                    if ($coupon['min_order'] <= $total)
                    {
                        $totalall = $total-$coupon['sotiengiam'];
                    ?>
                    <tr class="accSumRevRow">
                        <td class="accSumRevLeftCol"><div class="tableitem"><b>Giảm giá <?=$coupon['code']?> </b></div></td>
                        <td class="accSumRevRightCol"><div class="tableitem"><b><? echo "-".formatPrice($coupon['sotiengiam']); ?></b></div></td>

                    </tr>
                <?
                    }
                }// if (isset($_SESSION['coupon']))?>
                <tr>
                    <td colspan="2"><div class="tableitembottomdivbg"></div></td>
                </tr>

                <tr class="accSumRevRow">
                    <td class="accSumRevLeftCol"><div class="tableitem"><a href="javascript:flyopen(600,400,'/popup/EstTaxShip/estimate_tax_popup.do','esttax')">Thuế VAT (10%)</a></div></td>
                    <td class="accSumRevRightCol"><div class="tableitem">$0.00</div></td>
                </tr>

                <tr class="accSumRevRow">


                    <td class="accSumRevLeftCol"><div class="tableitem"><a href="javascript:flyopen(600,400,'/popup/EstTaxShip/estimate_ship_popup.do','esttax')">Phí vận chuyển</a></div></td>



                    <td class="accSumRevRightCol"><div class="tableitem">$7.95</div></td>
                </tr>

                <tr><td colspan="2"><div class="std_Height"><!--  --></div></td></tr>
                <tr class="accSumRevRow">
                    <td class="accSumRevLeftCol"><div class="tableitem"><div class="accOrderTotal"><b>Tổng cộng</b></div></div></td>
                    <td class="accSumRevRightCol"><div class="tableitem"><div class="accOrderTotal"><b><? echo formatPrice($totalall); ?></b></div></div></td>
                </tr>


                <tr>
                    <td colspan="2"><div class="tableitembottomdivbg" style="height: 3px;">
                            <img src="<?=$FullUrl?>/bosanpham_files/spacer01.gif" border="0" height="2" width="1"></div></td>
                </tr>


                <tr>
                    <td colspan="2">

                        <div class="sourcecodeboxNobdr" id="sourceCodeDiv">




                            <form onsubmit="return false" method="post" id="sourceCodeForm" name="sourceCodeForm">

                                <div class="sourcecodebox">
                                    <table border="0" cellpadding="0" cellspacing="0">
                                        <tbody><tr><td class="promoLabel" colspan="2">Mã khuyến mãi ?</td></tr>

                                        <tr>
                                            <td>
                                                <input
                                                    style="width: 151px;"
                                                <?php /*    onkeydown="if( event.keyCode == 13){ checkCoupon('<?=$FullUrl?>');srccode=true;}else {srccode=false;}"

 */?>
                                                    value="" id="sourceCode" maxlength="18"
                                                    name="sourcecode" type="text"></td>
                                            <td>
                                                <input class="std_BasketSourceCodeImgMargin"
                                                       alt="Apply Button"
                                                       src="/image_site/apply.gif"
                                                       onclick="checkCouponClick('<?=$FullUrl?>');return false; "
                                                       name="sourceCode2" border="0" type="image">
                                            </td>
                                        </tr>

                                        <tr><td class="promoInstruction" colspan="2">Mỗi đơn hàng chỉ được sử dụng một mã khuyến mại.</td></tr>
                                        </tbody></table>
                                </div>

                            </form>

                        </div>
                    </td>
                </tr>
                </tbody></table></div>
    </div>
    <div class="std_FillSlot1Padding" id="fillSlot1"></div>

</div>
<script type="text/javascript">
    function checkCoupon(fullUrl)
    {

        if($('#sourceCode').val()=="")
        {
            alert('Nhập mã khuyến mãi!');

            return false;
        }

       // alert(srccode);
       // if ($)
    }
    function checkCouponClick(fullUrl)
    {

        if($('#sourceCode').val()=="")
        {
            alert('Nhập mã khuyến mãi!');
            $('#sourceCode').focus();
            return false;
        }
        $.post(fullUrl + "/ajax.php?do=coupon&act=check",{
                code:$('#sourceCode').val()
            },
            function(data)
            {
                var obj = eval('(' + data + ')');
                if (obj['error'] == 1)
                {
                    alert(obj['mess']);
                    return;
                }
                showcartbox_checkout("<?=$FullUrl?>");

            });
    }
</script>
