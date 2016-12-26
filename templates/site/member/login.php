<? global $lg, $FullUrl, $member; ?>
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/stylesheetcity.css">
<?= $title_bar ? $title_bar : navigationBar() ?><br/>
<div style="float: left;width: 798px;">

    <div><img src="<?=$FullUrl?>/bosanpham_files/spacer01.gif" width="1" height="27" border="0"></div>

    <div>
        <script>
            /*
             var account_top_images = new Array("/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/myinformation_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/addressbook_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/itemhistory_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/wishlists_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/orderhistory_top_on.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/global/globalgraphics/spacer01.gif","/images/set_c/en_us/local/localnav/logout_top_on.gif");
             preLoadCatImages(account_top_images);
             */
        </script>


        <table width="798" border="0" cellspacing="0" cellpadding="0">

            <tbody><tr>
                <td align="left" valign="top"><img src="<?=$FullUrl?>/image_site/registersignin_mhd.gif" border="0" alt="My Account - Register/Sign-In"></td>
            </tr>

            <tr>
                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="15" width="1" border="0"></td>
            </tr>

            <tr>
                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="1" height="0" border="0"></td>
            </tr>
            </tbody></table>

    </div>

    <div>

        <table border="0" cellpadding="0" cellspacing="0" width="798">
            <form name="accountRegisterForm" method="post" action="/account/login.do?method=view" id="mainForm"></form>

            <tbody><tr valign="top">

                <td>
                    <table cellspacing="0" cellpadding="0" border="0" width="383">
                        <tbody><tr>
                            <td>
                                <div class="colorsubheader">Đăng nhập vào Tài khoản thành viên</div>
                                <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="10" width="1" border="0"></div>
                                <div class="default">Vui lòng nhập email , mật khẩu và nhấp chuột  vào <b>“Đăng nhập”</b>.</div>
                                <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="10" width="1" border="0"></div>

                                <div class="formlabel">Email</div>
                                <div><input type="text" id="loginEmail" name="loginEmail" maxlength="100" size="15" value="" class="login"></div>

                                <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="5" width="1" border="0"></div>
                                <div class="formlabel">Password</div>
                                <div><input type="password" id="loginPassword" name="loginPassword" maxlength="50" size="15" value="" class="login"></div>

                                <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="10" width="1" border="0"></div>
                                <div style="margin-top:10px;"><input type="image"
                                                                     onclick="login('<?=$FullUrl?>','<?php
                                                                     $catetm = Categories::getCatBycate_type_ID(15);
                                                                     $cateobj = new Categories($catetm);
                                                                     echo $cateobj->getLink();

                                                                     ?>');return false;"

                                                                     name="login" src="<?=$FullUrl?>/image_site/signin_btn.gif" border="0" alt="Sign In"></div>

                                <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="10" width="1" border="0"></div>
                                <div class="default">Bạn quyên mật khẩu?<a href="/account/passwordrecovery.do?from=account">&nbsp;Click here.</a>
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                </td>


                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="1" width="15" border="0"></td>
                <td class="verticalrule"><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="1" width="1" border="0"></td>
                <td><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="1" width="15" border="0"></td>


                <td>
                    <table border="0" cellspacing="0" cellpadding="0" width="383">
                        <tbody><tr>
                            <td>
                                <div class="colorsubheader">Đăng ký thành viên Party Shop !</div>
                                <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="10" width="1" border="0"></div>
                                <div class="default">Hãy tham gia thành viên để nhận được các thông tin khuyến mãi và các chương trình chăm sóc khách hàng dành riêng cho thành viên của Party shop.</div>




                                <div>
                                <img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" height="10" width="1" border="0"></div>
                                <div>
                                    <?php
                                    $catlogin = Categories::getCatByAlias("memberregister");
                                    $linkcat = new Categories($catlogin);

                                    ?>
                                    <input type="image" onclick="location.href='<?=$linkcat->getLink()?>'" name="register" src="<?=$FullUrl?>/image_site/createNewAccount_btn.gif" border="0" alt="Register">
                                </div>
                            </td>
                        </tr>
                        </tbody></table>
                </td>
            </tr>


            </tbody></table>
    </div>
    <div><img src="/images/set_c/en_us/global/globalgraphics/spacer01.gif" width="1" height="10" border="0"></div>

</div>