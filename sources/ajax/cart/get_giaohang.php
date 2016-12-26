<?php 
	global $FullUrl, $prefix_url, $lg, $payments, $banklist; 
    $num = cart::getQuantity();
// <link href="<?php echo $FullUrl;  /css/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" />
?>
<div class="accContent" id="billing_container">
    <form method="post" name="billingForm" id="billingForm" action="/checkout/accordioncheckout.do?method=submit" onsubmit="return false">
        <table id="addressFormTable" border="0" cellpadding="0" cellspacing="0">
            <tbody>
            <tr>
                <td colspan="2" class="titlecart">
                    THÔNG TIN THANH TOÁN
                </td>
            </tr>
            <tbody>

            <tr>
                <td align="right" width="140px">

                    <div class="addressformlabel">Tên<span class="formrequired">*</span></div>

                </td>
                <td>
                    <input name="firstname"
                           id="firstname"
                           maxlength="40" size="20" value="" class="firstname"
                           type="text">
                </td>
            </tr>


            <tr>
                <td align="right" width="140px">

                    <div class="addressformlabel"> Họ<span class="formrequired">*</span></div>

                </td>
                <td>
                    <div><input
                            name="lastname"
                            id="lastname"
                            maxlength="40" size="17" value="" class="lastname" type="text"></div>
                </td>
            </tr>

            <tr><td colspan="2"><div><img src="/image_site/spacer01.gif" border="0" height="15" width="1"></div></td></tr>


            <tr>
                <td align="right">
                    <div class="addressformlabel">Địa chỉ giao hàng<span class="formrequired">*</span> </div>
                </td>
                <td>
                    <div><input
                            id="address"
                            name="address"

                            maxlength="50" size="35"

                            value="<?php
                            echo Members::getfield('address_giaohang');

                            ?>" class="address" type="text"></div>
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
                    <div><input name="city"
                                id="city"
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

                    <div><input name="phone"
                                id="phone"
                                maxlength="20" size="12" value="<?php
                        if (isset($_SESSION['member_phone']))
                        {
                            echo $_SESSION['member_phone'];
                        }
                        ?>" class="phone" type="text"></div>

                </td>


            </tr>

            <tr>
                <td align="right">
                    <div class="addressformlabel"> Email Address<span class="formrequired">*</span></div>
                </td>
                <td>
                    <div><input name="email"
                                id="email"
                                maxlength="100" size="35" value="<?php
                        if (isset($_SESSION['member_email']))
                        {
                            echo $_SESSION['member_email'];
                        }
                        ?>"
                                class="firstname" type="text"></div>
                </td>
            </tr>


            <tr>
                <td align="right">
                    <div class="addressformlabel"> Ghi chú thêm: </div>
                </td>
                <td>
                    <div>

                    <textarea rows="5" id="note" name="note"  style="width: 279px;"></textarea>

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




        <div class="accRightButton"><input id="btnContinueBillingForm"
                                           name="ContinueBillingForm"
                                           src="<?=$FullUrl?>/image_site/dscp_continue.gif"
                                           alt="Continue"
                                           onclick="show_xemlai('<?=$FullUrl?>');"
                                           type="image"></div>

    </form>
    <div id="accEditLogin" class="std_DisplayNone">
        Guest
    </div>

</div>
<script type="text/javascript">
    function show_xemlai(fullUrl)
    {
        if (!trueform()) return false;
        $('#divthongtingiaohang').fadeOut();
        $('#step2').show();
        $.post(fullUrl + "/ajax.php?do=cart&act=showxemlai",{
                firstname:$('#firstname').val(),
                lastname:$('#lastname').val(),
                address: $('#address').val(),
                city: $('#city').val(),
                phone: $('#phone').val(),
                email: $('#email').val(),
                note: $('#note').val()
            },
            function(data)
            {
                $('#divxemlai').html(data);
                $('#divxemlai').fadeIn();
               // $("#pagecart").html(data);
            });
    }
    function trueform()
    {
        if ($('#firstname').val() == "")
        {
            alert("Nhập tên!");
            $('#firstname').focus()
            return false;
        }
        if ($('#lastname').val() == "")
        {
            $('#lastname').focus()
            return false;
        }
        if ($('#address').val() == "")
        {
            $('#address').focus()
            return false;
        }

        if ($('#city').val() == "")
        {
            $('#city').focus()
            return false;
        }

        if ($('#phone').val() == "")
        {
            $('#phone').focus()
            return false;
        }


        if ($('#email').val() == "")
        {
            $('#email').focus()
            return false;
        }
        return true;

    }
</script>