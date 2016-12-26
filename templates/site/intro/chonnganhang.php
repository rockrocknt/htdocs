<?php
global $FullUrl, $prefix_url, $cat, $lg, $product, $title_bar;
$currentcat = currentCat();
?>

    <!-- Titlebar
    ================================================== -->
    <section class="titlebar">
        <div class="container">
            <div class="sixteen columns">
                <h1><?php
                    echo $cat->getName();
                    ?></h1>


            </div>
        </div>
    </section>


    <!-- Content
    ================================================== -->

    <!-- Container -->
    <div class="container">
        <div class="twelve columns">
            <div class="extra-padding">

                <!-- Post -->
                <article class="post single">
                    <?php global $error;
                    echo $error; ?>
                    <!--  -->
                    <?php
                    // echo Info::getInfoField('motanganchung_vn');
                    //  echo $cat->getShort();
                    ?>
                    <?php

                        echo $cat->getContent();

                    ?>
                    <!-- Share Buttons -->
                    <div class="clearfix"></div>
                    <form  name="NLpayBank" action="" method="post">
                    <div class="boxContent">
                        <p><i>

                                <ul class="cardList clearfix">
                                    <li class="bank-online-methods ">
                                        <label for="vcb_ck_on">
                                            <i class="VCB" title="TechComBank – Ngân hàng kỹ thương Việt Nam"></i>
                                            <input type="radio" value="VCB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="tcb_ck_on">
                                            <i class="TCB" title="Ngân hàng Nam Á"></i>
                                            <input type="radio" value="TCB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="bnt_atm_agb_ck_on">
                                            <i class="AGB" title="Ngân hàng Nông nghiệp &amp; Phát triển nông thôn"></i>
                                            <input type="radio" value="AGB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="bidv_ck_on">
                                            <i class="BIDV" title="Ngân hàng TMCP Đầu tư &amp; Phát triển Việt Nam"></i>
                                            <input type="radio" value="BIDV"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_scb_ck_on">
                                            <i class="SCB" title="Ngân hàng Sài Gòn Thương tín"></i>
                                            <input type="radio" value="SCB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_exb_ck_on">
                                            <i class="EXB" title="Ngân hàng Xuất Nhập Khẩu"></i>
                                            <input type="radio" value="EXB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="bnt_atm_pgb_ck_on">
                                            <i class="PGB" title="Ngân hàng Xăng dầu Petrolimex"></i>
                                            <input type="radio" value="PGB"  name="bankcode" >

                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="bnt_atm_gpb_ck_on">
                                            <i class="GPB" title="Ngân hàng TMCP Dầu khí Toàn Cầu"></i>
                                            <input type="radio" value="GPB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="nab_ck_on">
                                            <i class="NAB" title="Ngân hàng Nam Á"></i>
                                            <input type="radio" value="NAB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="bnt_atm_sgb_ck_on">
                                            <i class="SGB" title="Ngân hàng Sài Gòn Công Thương"></i>
                                            <input type="radio" value="SGB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="vnbc_ck_on">
                                            <i class="ABB" title="Ngân hàng An Bình"></i>
                                            <input type="radio" value="ABB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="vib_ck_on">
                                            <i class="VIB" title="VIB - Ngân Hàng Quốc Tế"></i>
                                            <input type="radio" value="VIB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="mb_ck_on">
                                            <i class="MB" title="MB - Ngân hàng TMCP Quân Đội"></i>
                                            <input type="radio" value="MB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="MSB_ck_on">
                                            <i class="MSB" title="MaritimeBank – Ngân hàng TMCP Hàng Hải Việt Nam"></i>
                                            <input type="radio" value="MSB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="ojb_ck_on">
                                            <i class="OJB" title="Ngân hàng TMCP Đại Dương (OceanBank)"></i>
                                            <input type="radio" value="OJB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="sml_atm_bab_ck_on">
                                            <i class="BAB" title="Ngân hàng Bắc Á"></i>
                                            <input type="radio" value="BAB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="icb_ck_on">
                                            <i class="ICB" title="VietinBank - Ngân hàng TMCP Công thương Việt Nam"></i>
                                            <input type="radio" value="ICB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="shb_ck_on">
                                            <i class="SHB" title="SHB - Ngân hàng TMCP Sài Gòn - Hà Nội"></i>
                                            <input type="radio" value="SHB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="VPB_ck_on">
                                            <i class="VPB" title="VP Bank - Ngân hàng Việt Nam Thịnh Vượng"></i>
                                            <input type="radio" value="VPB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="DAB_ck_on">
                                            <i class="DAB" title="Dong A Bank - Ngân hàng TMCP Đông Á"></i>
                                            <input type="radio" value="DAB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="TPB_ck_on">
                                            <i class="TPB" title="TienphongBank - Ngân hàng Tiên phong"></i>
                                            <input type="radio" value="TPB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="ACB_ck_on">
                                            <i class="ACB" title="ACB - Ngân hàng Á Châu"></i>
                                            <input type="radio" value="ACB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="OCB_ck_on">
                                            <i class="OCB" title="OCB - Ngân hàng Phương Đông"></i>
                                            <input type="radio" value="OCB"  name="bankcode" >
                                        </label></li>

                                    <li class="bank-online-methods ">
                                        <label for="HDB_ck_on">
                                            <i class="HDB" title="HDBank - Ngân hàng TMCP Phát Triển TP Hồ Chí Minh"></i>
                                            <input type="radio" value="HDB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="NVB_ck_on">
                                            <i class="NVB" title="NaviBank - Ngân hàng TMCP Quốc dân"></i>
                                            <input type="radio" value="NVB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="VAB_ck_on">
                                            <i class="VAB" title="VietABank - Ngân hàng Việt Á"></i>
                                            <input type="radio" value="VAB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="LVB_ck_on">
                                            <i class="LVB" title="LienVietPostBank - Ngân hàng Bưu điện Liên Việt"></i>
                                            <input type="radio" value="LVB"  name="bankcode" >
                                        </label></li>
                                    <li class="bank-online-methods ">
                                        <label for="BVB_ck_on">
                                            <i class="BVB" title="BaoVietBank - Ngân hàng Bảo Việt"></i>
                                            <input type="radio" value="BVB"  name="bankcode" >
                                        </label></li>


                                </ul>

                    </div>
                        <input type="submit"
                               name="nlpayment"
                               class="continue button color"
                               value="CHUYỂN KHOẢN"
                            ></a>
                    </form>

                </article>





            </div>
        </div>
        <?php include "widget_html/gioithieu_sidebar.php"; ?>
        <?php // include "widget_html/gioithieu_sanphamlienquan.php"; ?>

    </div>
    <!-- Container / End -->

<?php return; ?>
    <link rel="stylesheet" href="<?= $FullUrl ?>/css_site/stylesheetcity.css">
    <link rel="stylesheet" href="<?= $FullUrl ?>/css_site/master1_gioithieu.css">
<?php
$obj = $cat->obj;
?>
<?php
$width = "600px";
if (!file_exists($obj['img_topbanner'])) {
    $width = "990px";

}
?>

<?= $title_bar ? $title_bar : navigationBar() ?>
    <div class="clr">&nbsp;</div>
    <table style="float: left;width: <?= $width ?>" cellpadding="0" cellspacing="0" border="0">
        <tbody>
        <tr>
            <td valign="top">

                <div class="custserv-tablehd" style="width: <?= $width ?>"><?php
                    echo $cat->getName();
                    ?></div>
                <br>

                <div id="custserv-content" style="width: <?= $width ?>">
                    <?php /*
                <div id="custserv-content-callout">
                    <div class="wearefun">We are Fun!  Let's Party.</div>
                    <b>We want to help you:</b><br>

                    <span class="aboutus-bullet">Plan each of your events!</span>
                    <span class="aboutus-bullet">Make each party<br>the best ever!</span>
                    <span class="aboutus-bullet">Make a difference in<br>all of your celebrations!</span>
                </div>
                Party City is the leader in the party goods industry. We are America's largest specialty party goods chain and the country's premiere <a href="/category/halloween+costumes.do" class="alink" onclick="s_objectID=&quot;http://www.partycity.com/category/halloween+costumes.do_3&quot;;return this.s_oc?this.s_oc(e):true">Halloween</a> specialty retailer.
                Party City operates more than 800 <a href="/storelocator.do" class="alink" onclick="s_objectID=&quot;http://www.partycity.com/storelocator.do_1&quot;;return this.s_oc?this.s_oc(e):true">company-owned and franchise stores</a> throughout the United States and Puerto Rico.
                <br><br>
                Party City Corporation is owned by Party City Holdings, Inc. and has its headquarters in Rockaway, New Jersey.
                <br><br>
                The Company designs, manufactures and distributes party goods through its vertically aligned retailers as well as other retailers worldwide.
                The Company's worldwide locations include their corporate headquarters in Elmsford, NY as well as locations throughout Asia, Europe, the Americas and Australia.
                The Company operates seven state of the art distribution centers throughout the world and six manufacturing facilities domestically.
                Product is manufactured both in the United States and overseas.
 */
                    ?>
                    <?= $cat->getContent() != "" ? $cat->getContent() : SITE_NO_NEWS ?>
                    <br><br><br>
                </div>
            </td>

            <?php
            if (file_exists($obj['img_topbanner'])) {
                ?>
                <td valign="top">

                    <img src="<?php


                    echo $FullUrl . "/" . $obj['img_topbanner'];
                    ?>" width="300" border="0">

                </td>

            <?php
            }
            ?>
        </tr>
        </tbody>
    </table>

<?php return; ?>
    <div class="index_Ce">
        <div class="header">
            <?php Template::UserControl('Header'); ?>
        </div>
        <?php
        $cat = new Categories(currentCat());
        $cat->countView();
        $relates = $cat->getRelate();
        $a = currentCat();
        ?>
        <div class="content">
            <?php

            //  var_dump($a);
            if (file_exists($a["img_topbanner"])) {
                ?>
                <div class="banner_center"><img width="651" src="/<?= $a["img_topbanner"] ?>"></div>
            <?php
            }
            ?>


            <?= $title_bar ? $title_bar : navigationBar() ?>

            <div class="chitiettintuc_folder">
                <div class="right_chitiettin">
                    <h4 class="list_tintuc">
                        <?php
                        echo $cat->getName();
                        ?>
                    </h4>

                    <p class="content_tintuc">
                        <?= $cat->getContent() != "" ? $cat->getContent() : SITE_NO_NEWS ?>
                        <br>
                    </p>


                </div>

            </div>


        </div>

    </div>

    <br class="clean"/>
<?php
/*

<div class="ct-div-sub post-content">
<?=$cat->getContent()!=""?$cat->getContent():SITE_NO_NEWS ?>
<?php // Template::UserControl('ShareSocials', $cat) ?>
</div>
<?php if ($relates) { ?>
<div class="container-sub-div">
<h3 class="title-h3"><?=CAT_RELATE_NEWS?></h3>
<div class="ct-div-sub">
    <ul class='other-news'>
    <?php
        foreach ($relates as $obj) {
        $art = new Categories($obj);
        $name = $art->getName();
    ?>
        <li><a href='<?=$art->getLink()?>' title="<?=$name?>"> &rsaquo; <?=$name?></a></li>
    <?php } ?>
    </ul>
</div>
</div>

<?php } ?>
<?php
*/
?>