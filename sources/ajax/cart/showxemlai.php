
<?php
	global $FullUrl, $prefix_url, $lg, $payments, $banklist; 
    $num = cart::getQuantity();
    $firstname = SafeFormValue('firstname');
    $lastname = SafeFormValue('lastname');
    $address = SafeFormValue('address');
    $city = SafeFormValue('city');
    $phone = SafeFormValue('phone');
$email = SafeFormValue('email');
$note = SafeFormValue('note');


// <link href="<?php echo $FullUrl;  /css/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" />
?>
<table id="addressFormTable" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td colspan="2" class="titlecart">
                   XEM LẠI THÔNG TIN THANH TOÁN
                </td>
            </tr>
            <tbody>

            <tr>
                <td align="right" width="140px">

                    <div class="addressformlabel">Tên<span class="formrequired">*</span></div>

                </td>
                <td>
                    <?=$firstname?>
                </td>
            </tr>


            <tr>
                <td align="right" width="140px">

                    <div class="addressformlabel"> Họ<span class="formrequired">*</span></div>

                </td>
                <td>
                    <div><?=$lastname?>
                    </div>
                </td>
            </tr>

            <tr><td colspan="2"><div><img src="/image_site/spacer01.gif" border="0" height="15" width="1"></div></td></tr>


            <tr>
                <td align="right">
                    <div class="addressformlabel">Địa chỉ thanh toán<span class="formrequired">*</span> </div>
                </td>
                <td>
                    <div>
                        <?=$address?>
                    </div>
                </td>
            </tr>
            <tr>


            </tr>



            <tr>
                <td><div><img src="/image_site/spacer01.gif" border="0" height="1" width="1"></div></td>
                <td>

                </td>
            </tr>

            <tr>
                <td align="right">
                    <div class="addressformlabel">Tỉnh/ Thành phố<span class="formrequired">*</span> </div>
                </td>
                <td>
                    <div>
                        <?=$city?>
                    </div>
                </td>
            </tr>





            <tr><td colspan="2"><div><img src="/image_site/spacer01.gif" border="0" height="15" width="1"></div></td></tr>


            <tr>
                <td colspan="2">
                    <input name="billContact.address.country" value="US" id="country" type="hidden">
                </td>
            </tr>


            <tr>
                <td align="right" width="140px">
                    <div class="addressformlabel" nowrap=""> Phone Number<span class="formrequired">*</span> </div>
                </td>
                <td>

                    <div>
                        <?=$phone?>
                    </div>

                </td>


            </tr>

            <tr>
                <td align="right">
                    <div class="addressformlabel"> Email Address<span class="formrequired">*</span></div>
                </td>
                <td>
                    <div> <?=$email?></div>
                </td>
            </tr>


            <tr>
                <td align="right">
                    <div class="addressformlabel"> Ghi chú thêm: </div>
                </td>
                <td>
                    <div>

                        <?=$note?>

                    </div>
                </td>
            </tr>

            <?php /*
            <tr>
                <td colspan="2" class="titlecart">
                    THÔNG TIN GIAO HÀNG
                </td>
            </tr>

            <tr>
                <td colspan="2" >
                    <div>
                        <input name="cungthongtin" id="cungthongtin"
                               value="off"
                               onchange="sameinfo_pay('<?=$FullUrl?>')"
                               type="checkbox">
                      <label for="cungthongtin" class="bold">   Cùng thông tin với người thanh toán
                      </label>
                    </div>
                </td>
            </tr>


            <tr>
                <td align="right" width="140px">

                    <div class="addressformlabel">Tên người nhận hàng<span class="formrequired">*</span></div>

                </td>
                <td>
                    <input name="r_firstName" id="r_firstName" maxlength="40" size="20" value="" class="firstname" type="text">
                </td>
            </tr>


            <tr>
                <td align="right" width="140px">

                    <div class="addressformlabel"> Họ người nhận hàng<span class="formrequired">*</span></div>

                </td>
                <td>
                    <div><input name="r_lastName"
                                id="r_lastName"
                                maxlength="40" size="17" value="" class="lastname" type="text"></div>
                </td>
            </tr>

            <tr><td colspan="2"><div><img src="/image_site/spacer01.gif" border="0" height="15" width="1"></div></td></tr>


            <tr>
                <td align="right">
                    <div class="addressformlabel">Địa chỉ giao hàng<span class="formrequired">*</span> </div>
                </td>
                <td>
                    <div><input name="r_address"
                                id="r_address"
                                maxlength="50" size="35" value="" class="address" type="text"></div>
                </td>
            </tr>
            <tr>


            </tr>



            <tr>
                <td><div><img src="/image_site/spacer01.gif" border="0" height="1" width="1"></div></td>
                <td>

                </td>
            </tr>

            <tr>
                <td align="right">
                    <div class="addressformlabel">Tỉnh/ Thành phố<span class="formrequired">*</span> </div>
                </td>
                <td>
                    <div><input name="r_city"
                                id="r_city"
                                maxlength="50" size="35" value="" class="address" type="text"></div>
                </td>
            </tr>





            <tr><td colspan="2"><div><img src="/image_site/spacer01.gif" border="0" height="15" width="1"></div></td></tr>


            <tr>
                <td colspan="2">
                    <input name="billContact.address.country" value="US" id="country" type="hidden">
                </td>
            </tr>


            <tr>
                <td align="right" width="140px">
                    <div class="addressformlabel" nowrap=""> Phone Number<span class="formrequired">*</span> </div>
                </td>
                <td>

                    <div><input name="r_phone"
                                id="r_phone"
                                maxlength="20" size="12" value="" class="phone" type="text"></div>

                </td>


            </tr><tr>
                <td align="right">
                    <div class="addressformlabel"> Email Address<span class="formrequired">*</span></div>
                </td>
                <td>
                    <div><input name="r_email"
                                id="r_email"
                                maxlength="100" size="35" value="" class="firstname" type="text"></div>
                </td>
            </tr>


            */ ?>

            <tbody>



            <tr><td colspan="2"><div><img src="/image_site/spacer01.gif" border="0" height="10" width="1"></div></td></tr>

            </tbody></table>




        <div class="accRightButton" style="float: right;"><input id="btnContinueBillingForm"
                                           name="ContinueBillingForm"
                                           src="<?=$FullUrl?>/image_site/dscp_THANHTAON.gif"
                                           alt="Continue"
                                           onclick="hoantat('<?=$FullUrl?>');"
                                           type="image"></div>
    </form>
<input type="hidden" id="firstname" value="<?=$firstname?>">
<input type="hidden" id="lastname" value="<?=$lastname?>">
<input type="hidden" id="address" value="<?=$address?>">
<input type="hidden" id="city" value="<?=$city?>">
<input type="hidden" id="phone" value="<?=$phone?>">
<input type="hidden" id="email" value="<?=$email?>">
<textarea rows="" cols="" id="note" class="none"><?=$note?></textarea>

<script type="text/javascript">
    function hoantat(fullUrl)
    {

        $.post(fullUrl + "/ajax.php?do=cart&act=send",{
                firstname:$('#firstname').val(),
                lastname:$('#lastname').val(),
                address: $('#address').val(),
                city: $('#city').val(),
                phone: $('#phone').val(),
                email: $('#email').val(),
                note: $('#note').val(),
                typeGuest : $('#typeGuest').val()
            },
            function(data)
            {
                var obj = eval('(' + data + ')');
               // alert(obj['id']);
                alert(obj['url']);
               // location.href=obj['url'];
            });
    }
</script>