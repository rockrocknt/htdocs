<?php
global $db, $lg;
global $title_bar,$title_page,$FullUrl, $keywords, $descriptions, $cat, $tpl, $mainWidgets;
?>
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/stylesheetcity.css">
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/member_register.css">
<?= $title_bar ? $title_bar : navigationBar() ?><br/>

<div style="float: left;width: 990px; ">

    <div><img src="<?=$FullUrl?>/bosanpham_files/spacer01.gif" width="1" height="27" border="0"></div>

    <div>
        <script>
            /*
             var account_top_images = new Array("/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/myinformation_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/addressbook_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/itemhistory_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/wishlists_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/orderhistory_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/logout_top_on.gif");
             preLoadCatImages(account_top_images);
             */
        </script>


        <table width="990" border="0" cellspacing="0" cellpadding="0">

            <tbody><tr>
                <td align="left" valign="top"><img src="<?=$FullUrl?>/image_site/register_mhd.gif" border="0" alt="My Account - Register"></td>
            </tr>

            <tr>
                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="15" width="1" border="0"></td>
            </tr>

            <tr>
                <td align="right">
                    <div class="formrequiredtext" id="requiredFieldMsg">
                        <span class="formrequired">*</span>Indicates a required field
                    </div>
                </td>
            </tr>

            <tr>
                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="1" height="0" border="0"></td>
            </tr>
            </tbody></table>

    </div>

    <div>

        <table border="0" cellpadding="0" cellspacing="0" width="990">
            <form name="accountRegisterForm" method="post" action="/account/registerusername.do?method=submit"></form>

            <tbody><tr>
                <td>

                    <div class="colorsubheader">Email Address &amp; Password</div>
                    <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="5" width="1" border="0"></div>
                    <div class="default">Enter your email address, which will serve as the Username for your account, and type in a password.</div>
                    <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="10" width="1" border="0"></div>
                    <div><table border="0" cellspacing="0" cellpadding="0">

                            <tbody><tr>
                                <td align="right">
                                    <span class="formrequired">*</span>
      <span class="formlabel">
        Your email address:
      </span>
                                </td>
                                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="5" height="1" border="0"></td>
                                <td>
                                    <input type="text" name="customer.email" maxlength="100" value="" class="login" id="customerEmail">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="1" height="5" border="0"></td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <span class="formrequired">*</span>
      <span class="formlabel">

        Your password:
      </span>
                                </td>
                                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="5" height="1" border="0"></td>
                                <td>
                                    <input type="password"
                                           id="loginPassword"
                                           name="loginPassword" maxlength="50" value="" class="login">
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3"><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="1" height="5" border="0"></td>
                            </tr>
                            <tr>
                                <td align="right">
                                    <span class="formrequired">*</span>
                                    <span class="formlabel">Please re-enter your<br> password:</span>
                                </td>
                                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="5" height="1" border="0"></td>
                                <td>
                                    <input type="password"
                                           id="loginPasswordConfirm"
                                           name="loginPasswordConfirm" maxlength="50" value="" class="login">
                                </td>
                            </tr>

                            </tbody></table>
                    </div>
                    <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="20" width="1" border="0"></div>

                    <div>

                        <div class="colorsubheader">Email Opt-in</div>
                        <div><html:img src="${siteImages.spacer}" width="1" height="${site.layout.subHeadSpacerHeight}" border="0"></html:img></div>
                        <div>
                            <table border="0" cellspacing="0" cellpadding="0">
                                <tbody><tr valign="top">
                                    <td><input type="checkbox" name="emailSignup" checked=""></td>
                                    <td><html:img src="${siteImages.spacer}" width="${site.layout.formSpacerWidth}" height="1" border="0"></html:img></td>
                                    <td><span class="formlabel"><div><html:img src="${siteImages.spacer}" width="2" height="4" border="0"></html:img></div>
                Sign me up for Party City's Email Updates about new services and special offers.</span>
                                    </td>
                                </tr>
                                </tbody></table>
                        </div>
                        <div><html:img src="${siteImages.spacer}" width="1" height="${site.layout.spacerHeight}" border="0"></html:img></div>



                    </div>
                    <div align="right">
                        <input type="image"
                               name="create"
                               onclick="registerMember();return false;"
                               src="<?=$FullUrl?>/image_site/continue_btn.gif"
                               border="0"
                               alt="Continue"></div>
                </td>
            </tr>


            </tbody></table>
    </div>
    <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="1" height="10" border="0"></div>

</div>
<script type="text/javascript">
    function registerMember()
    {
        if(!IsEmail($('#customerEmail').val()))
        {
            alert('Nhập email');
            $('#customerEmail').focus();
            return;
        }

        if ($('#loginPassword').val()=="")
        {
            alert('Nhập password');
            $('#customerEmail').focus();
            return;
        }
        if ($('#loginPassword').val() != $('#loginPasswordConfirm').val())
        {
            alert('Nhập lại password');
            $('#customerEmail').focus();
            return;
        }


            $.post('<?=$FullUrl?>' + "/ajax.php?do=member&act=register",{
                    email: $('#customerEmail').val(),
                    password:$('#loginPassword').val()
                },
                function(data)
                {
                    <?php $cate  = Categories::getCatBycate_type_ID(15);
                    $cateObj = new Categories($cate);
                    $link = $cateObj->getLink(); ?>
                            location.href= '<?=$link?>';
                   // getCart('<?=$FullUrl?>');
                });

    }
</script>
