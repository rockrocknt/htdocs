<?php
global $title_bar, $do, $cat, $lg, $FullUrl, $catphukien;
$currentcat = currentCat();
$catytuongtiec = new Categories(Categories::getCatByAlias("ytuongtiec"));
$catytuonggiangsinh = new Categories(Categories::getCatByAlias("ytuonggiangsinh"));
$catnhungytuongtochuctiec = new Categories(Categories::getCatByAlias("nhungytuongtochuctiec"));


?>
<?php
$temp = new Categories($currentcat);
$listChild = $temp->getChilds();
?>
<?= $title_bar ? $title_bar : navigationBar() ?><br/>
<link rel="stylesheet" href="<?= $FullUrl ?>/css_site/stylesheetcity.css">
<div style="float: left;">

<!-- Start - Added for PCCY 25 -->
<script type="text/javascript" src="/text/scripts/swfobject.js"></script>
<script type="text/javascript" src="/text/scripts/RetailTVEmbed5.js"></script>
<script type="text/javascript" src="/text/scripts/future_merchants.js"></script>
<!-- End - Added for PCCY 25 -->


<script type="text/javascript" src="<?= $FullUrl ?>/js_site/jcarousellite.min.js"></script>
<style type="text/css">
.png {
    behavior: url('/image_site/iepngfix.htc');
    margin: 3px
}

#carousel_items li {
    border-bottom: 1px solid #BBF0F4;
    height: 50px;
    cursor: pointer
}

#aside img {
    border: 1px solid #2FB456
}

#partyIdeas a:link {
    text-decoration: none;
}

#partyIdeas a:visited {
    text-decoration: none;
}

#partyIdeas a:hover {
    text-decoration: underline;
}

#partyIdeas a:active {
    text-decoration: none;
}

#partyIdeas {
    margin: 0 auto;
    width: 990px;
    background: #fff;
    color: #333333
}

#header {
    padding: 0px 20px 0px 20px;
}

#section-navigation {
    float: left;
    width: 232px;
    margin-right: 10;
    display: inline;
    font-size: 13px;
}

#section-navigation ul li {
    margin: 0 0 1em;
    padding: 0;
    list-style-type: none;
}

#content {
    float: left;
    margin-left: 2px;
    width: 748px;
}

#content h1 {
    font-size: 24pt;
    margin: 0 0 0 -20px;
    padding-left: 45px;
    line-height: 63px;
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
}

#content h3 {
    font-size: 12pt;
}

#aside {
    float: right;
    width: 232px;
    margin: 0;
    display: inline;
}

#center {
    padding: 0px 2px;
    width: 506px
}

.headerLink {
    font-size: 8pt;
    font-weight: normal
}

#relatedProductsHeader, #L1Header, #L2Header, #M1Header, #M2Header, #rightHeader {
    -webkit-border-top-left-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -moz-border-radius-topleft: 10px;
    -moz-border-radius-topright: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    padding: 10px 10px 8px 20px;
    font-size: 20px;
}

#M1Header {
    margin-top: 10px
}

#productZone, #L1, #L2, #M1, #M2, #rightContent {
    padding: 10px 0;
    margin-bottom: 10px;
}

#rightContent {
    font-size: 13px;
}

#M1, #L1, #L2 {
    padding-left: 10px;
}

#M2 img {
    border: 1px solid #E63A84
}

#bio {
    padding: 5px;
    margin-bottom: 10px;
    -webkit-border-bottom-right-radius: 10px;
    -webkit-border-bottom-left-radius: 10px;
    -moz-border-radius-bottomright: 10px;
    -moz-border-radius-bottomleft: 10px;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px
}

#bio {
    padding: 8px;
}

#zone1 {
    -webkit-border-radius: 10px;
    -moz-border-radius: 10px;
    border-radius: 10px;
    margin-bottom: 10px;
    padding: 3px 10px;
    min-height: 57px;
}

.nameFeaturedContentSection {
    font-size: 20px;
    margin: 10px 10px 0 10px;
}

.author {
    font-size: 10px;
    margin: 5px 10px 5px 10px;
}

.intro {
    font-size: 13px;
    margin: 0px 10px 5px 10px;
}

.moreBy {
    font-size: 12px;
    margin: 10px 10px;
    font-weight: 700
}

#photoTeaserName {
    color: #2FB456;
    font-size: 20px;
    margin: 10px 10px
}

#photoTeaserName a:link, #photoTeaserName a:visited, #photoTeaserName a:active {
    text-decoration: none;
    color: #2FB456
}

#photoTeaserName a:hover {
    text-decoration: underline;
    color: #2FB456
}

#photoTeaserCopy {
    font-size: 13px;
    margin: 0px 10px 10px
}

.teaserName {
    font-size: 12px;
    margin: 10px 0;
    color: #333333;
    font-weight: bold;
}

.large_img {
    width: 490px;
    height: 290px;
    border: 1px solid #2AC2D0;
}

.clear {
    clear: both
}

.carousel_container {
    float: right;
    width: 220px;
    margin-right: 5px;
}

.content_img {
    float: left
}

#rightContent img {
    border: 1px solid #2FB456
}

.on {
    background-color: #BBF0F4;
    color: #000;
}

a.next, a.prev {
    background-color: #BBF0F4;
    cursor: pointer;
    text-align: center;
}

.carousel_container	a.next {
    margin-top: 1px;
    height: 17px;
    display: block;
    -webkit-border-bottom-right-radius: 10px;
    -webkit-border-bottom-left-radius: 10px;
    -moz-border-radius-bottomright: 10px;
    -moz-border-radius-bottomleft: 10px;
    border-bottom-right-radius: 10px;
    border-bottom-left-radius: 10px;
}

.carousel_container	a.prev {
    display: block;
    height: 17px;
    margin-bottom: 1px;
    -webkit-border-top-left-radius: 10px;
    -webkit-border-top-right-radius: 10px;
    -moz-border-radius-topleft: 10px;
    -moz-border-radius-topright: 10px;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.carousel_container a.disabled {
    opacity: 0.5;
    filter: alpha(opacity=60);
    cursor: default;
}

.IdeaLink a {
    color: #333 !important;
    text-decoration: none;
}

#carousel_items li a {
    color: #333333 !important;
}

    /* Classes added by Lovelina */
.HRborder {
    border-bottom: 1px solid #E63A84;
    margin: 15px;
}

.HRborder img {
    border: none !important;
}

.buttonImg {
    margin: 20px 10px 0;
}

.buttonImg img {
    border-width: 0px !important;
}

#leftSection {
    width: 232px;
}

.TName {
    padding: 2px 0 0 0;
    height: 38px;
}
</style>
<!-- Main Container Start -->
<div id="mainContainer">
<!-- Party Ideas for top 3 col's -->
<div id="partyIdeas">
<!-- Left Section Start -->
<div id="leftSection" style="float:left;">

    <div id="section-navigation">

        <div id="L1Header" style="background-color:#867CDA;color:#FFF;font-size: 18px;">
            <?php
            $cattemp = new Categories(Categories::getCatByAlias("ytuonggirl"));
            echo $cattemp->getNameTab();
            ?>
        </div>
        <div id="L1" style="border:5px solid #867CDA;background-color:#EDEBF9">
            <a href="<?php echo $cattemp->getLink(); ?>">
                <img
                    src="<?php echo $FullUrl . "/" . $cattemp->getImageNoThumb(); ?>"

                    width="202"
                    height="202"
                    style="margin-bottom:10px;"
                    ></a>

            <div style="padding-bottom:10px; padding-right: 5px;">
                <?php echo $cattemp->getShort(); ?>
            </div>
            <div class="IdeaLink"><a href=""></a>
                <a href="<?php echo $cattemp->getLink(); ?>">
                    <img src="<?= $FullUrl ?>/image_site/party-ideas-btn-girls-purp.gif"
                         alt="Girls Party Ideas"></a></div>
        </div>

        <div id="L2Header" style="background-color:#009ADA;color:#FFF;font-size: 18px;">
            <?php
            $cattemp = new Categories(Categories::getCatByAlias("ytuongboy"));
            echo $cattemp->getNameTab();
            ?>
        </div>
        <div id="L2" style="border:5px solid #009ADA;background-color:#D5EAF2">

            <img
                src="<?php echo $FullUrl . "/" . $cattemp->getImageNoThumb(); ?>"

                width="202"
                height="202"
                style="margin-bottom:10px;">

            <div style="padding-right: 5px;"><?php echo $cattemp->getShort(); ?><br><br></div>
            <div class="IdeaLink"><a href=""></a><a href="<?php echo $cattemp->getLink(); ?>"><img
                        src="<?= $FullUrl ?>/image_site/party-ideas-btn-boys-blue.gif" alt="Boys Party Ideas"></a></div>
        </div>

        <div>
            <?php include "widget_html/optin_trangytuong.php"; ?>

        </div>

    </div>

    <!-- End of Left Section -->
</div>

<!-- Right Section Start -->
<div id="rightSection" style="margin-left: 240px;">

<div id="resizableContent" style="overflow:auto;height:auto;">
    <div id="aside">

        <div id="rightHeader" style="background-color:#2FB456;color:#fff;font-size: 18px;">
            <? echo $catytuonggiangsinh->getNameTab();
            $listChild = $catytuonggiangsinh->getChilds();
            $newestCat = $listChild[0];
            $newestCatObj = new Categories($newestCat);
            $link = $newestCatObj->getLink();
            ?>
        </div>
        <div id="rightContent"
             style="border: 5px solid rgb(47, 180, 86); overflow: auto; height: 678px; background-color: rgb(255, 255, 255);">


            <div>
                <div><a href="<?= $link ?>">
                        <img style="width:200px;margin:0 0 5px 10px;"
                             src="<? echo $FullUrl . "/" . $newestCatObj->getImageNoThumb(); ?>"
                             width="200"
                            />
                    </a>
                </div>
                <div id="photoTeaserName">
                    <a href="<?= $link ?>"><?= $newestCatObj->getName(); ?></a>
                </div>
                <div id="photoTeaserCopy">
                    <?= strip_tags($newestCatObj->getName()); ?>
                </div>
            </div>


            <div style="font-size:12px;margin:10px 10px;font-weight:700">More Photo Galleries</div>
            <?php
            for ($z = 1; $z < 5; $z++) {
                if (isset($listChild[$z])) {
                    $newestCat = $listChild[$z];
                    $newestCatObj = new Categories($newestCat);
                    $link = $newestCatObj->getLink();
                    ?>
                    <div>


                        <div style="float:left">
                            <a href="<?= $link ?>"><img
                                    style="width:75px;margin:5px 5px 5px 10px"
                                    src="<? echo $FullUrl . "/" . $newestCatObj->getImageNoThumb(); ?>">
                            </a>
                        </div>


                        <div style="padding-top:5px; padding-right: 5px;">
                            <a style="color:#333; font-size: 12px;"
                               href="<?= $link ?>">
                                <?= strip_tags($newestCatObj->getName()); ?></a></div>
                        <div style="clear:both"></div>
                    </div>
                <?
                }
            } // for
            ?>



            <div class="buttonImg">

                <a href="<? echo $catytuonggiangsinh->getLink(); ?>"><img
                        src="<?= $FullUrl ?>/image_site/green-ideas-btn.gif"
                        border="0"></a></div>

        </div>

    </div>

    <div id="center">

        <div id="M2Header" style="background-color:#E63A84;color:#ffffff">

            <span style="float:right"><a style="color:#ffffff" class="headerLink"
                                         href="<?= $catytuongtiec->getLink() ?>">More
                    &gt;</a></span>
            <?php

            echo $catytuongtiec->getNameTab();
            ?>
        </div>
        <div id="M2" style="border: 5px solid rgb(230, 58, 132); height: 678px;">
            <?php
            $temp = new Categories($catytuongtiec->obj);
            $listChild = $temp->getChilds();
            $newestCat = $listChild[0];
            $newestCatObj = new Categories($newestCat);
            $link = $newestCatObj->getLink();
            ?>

            <div>
                <a href="<?= $link ?>">
                    <img style="margin-left:10px"
                         width="474px"
                         height="264"
                         src="<?php echo $FullUrl . "/" . $newestCat['img_topbanner']; ?>">
                </a>
            </div>
            <div class="nameFeaturedContentSection"><a href="<?= $link ?>"
                                                       style="color:#E63A84;">Lu-Wow
                    <?php echo $newestCat["name_" . $lg]; ?></a></div>
            <div class="intro" style="padding: 1px;">
                <?php echo strip_tags($newestCat["short_" . $lg]); ?>
            </div>
            <div class="intro"></div>
            <!--<hr width="465" style="color:#E63A84;"> -->
            <!-- <div class="moreBy">More Featured Videos</div> -->
            <div class="HRborder"><img src="<?= $FullUrl ?>/image_site/spacer01.gif" width="1" height="1"
                                       border="0"></div>
            <div style="padding: 0px 0 0 4px;">


                <?php
                for ($i = 1; $i < 8; $i++) {
                    if (isset($listChild[$i])) {
                        $item = $listChild[$i];
                        $temp2 = new Categories($item);
                        $link = $temp2->getLink();
                        ?>
                        <div style="float:left; width:143px;margin:5px 8px;">
                            <div><a href="<?= $link ?>">
                                    <img
                                        src="<?php echo $FullUrl . "/" . $temp2->getImageNoThumb(); ?>"
                                        width="136"
                                        height="76"
                                        border="0"></a></div>
                            <div class="TName"><a href="<?= $link ?>" class="teaserName">
                                    <?= $temp2->getName() ?>
                                </a></div>
                        </div>
                    <?php
                    }
                }
                ?>

                <div style="clear:left;"></div>

                <div class="buttonImg" style="margin-top: 0px !important;">

                    <a href="<?= $catytuongtiec->getLink() ?>"><img
                            src="<?= $FullUrl ?>/image_site/magenta-ideas-btn.gif" border="0"></a>

                </div>
                <div style="clear:left;"></div>
            </div>

        </div>

    </div>
</div>

<div id="content">

<div id="M1Header" style="background-color:#2AC2D0;color:#ffffff">

        <span style="float:right"><a style="color:#ffffff" class="headerLink"
                                     href="<? echo $catnhungytuongtochuctiec->getLink(); ?>">
                More &gt;</a></span>
    <? echo $catnhungytuongtochuctiec->getNameTab(); ?>
</div>
<div id="M1" style="border:5px solid #BBF0F4">


    <script type="text/javascript">
        jQuery(function () {
            jQuery("ul#carousel_items li").live("click", function () {
                jQuery("#carousel_items li").removeClass("on");
                var content_id = jQuery(this).attr("class").replace("headline_", "");
                jQuery("#content_img").html(jQuery("#" + content_id).find(".carouselImage").clone()).fadeIn(100);
                jQuery(this).addClass("on");
            });
            jQuery(".carousel_container").hover(function () {
                jQuery(".carousel").trigger('pauseCarousel');
            }, function () {
                jQuery(".carousel").trigger('resumeCarousel');
            });
            jQuery("li[class^='headline_']").hover(function () {
                jQuery(this).trigger("click");
            });
            jQuery(".headline_1").trigger("click");
            jQuery(".carousel").jCarouselLite({
                btnNext: ".next",
                btnPrev: ".prev",
                vertical: true,
                visible: 5,
                pause: false,
                auto: 3000,
                speed: 1000,
                beforeStart: function (a) {
                    jQuery("#carousel_items li").removeClass("on");
                    var content_id = jQuery(a[1]).attr("class").replace("headline_", "");
                    jQuery("#content_img").fadeOut(400, function () {
                        jQuery(this).html(jQuery("#" + content_id).find(".carouselImage").clone()).fadeIn()
                    });
                    var next_item = "." + jQuery(a[1]).attr("class");
                    jQuery(next_item).addClass("on");
                }
            });
        });
    </script>
    <div>
        <div class="carousel_container">
            <a class="prev" href="#"><img class="png" src="<?= $FullUrl ?>/image_site/arrowup.png"></a>
            <!-- Carousel goes here -->
            <div class="carousel"
                 style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; height: 255px;">
                <ul id="carousel_items"
                    style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; height: 775px; top: -306px;">

                    <?php

                    $temp = new Categories($catnhungytuongtochuctiec->obj);

                    $listChild = $temp->getChilds();
                    for ($i = 0; $i < count($listChild); $i++) {
                        if (isset($listChild[$i])) {
                            $item = $listChild[$i];
                            $temp2 = new Categories($item);
                            $link = $temp2->getLink();
                            $tempcount = $i+1;
                            ?>


                            <li class="headline_<?=$tempcount?>"
                                style="color: rgb(51, 51, 51); font-size: 16px; overflow: hidden; float: none; width: 220px; height: 50px;">
                                <div style="height:100%;width:100%;"
                                     onclick="javscript:document.location='<?= $link ?>';">
                                    <a
                                        href="<?= $link ?>"><?=$temp2->getName()?></a>
                                    <br><a
                                        style="font-size:12px;" href="/content/rainbow+party+ideas.do"></a></div>
                            </li>
                        <? }
                    } ?>


                </ul>
            </div>
            <a class="next" href="#"><img class="png" src="<?= $FullUrl ?>/image_site/arrowdown.png"></a>

        </div>
        <div id="content_img" style="display: block;">
            <a class="carouselImage"
               href="/content/candy+buffet+ideas+robins+egg+blue.do"><img
                    class="large_img"
                    src="http://s7d5.scene7.com/is/image/PartyCity/Always_Forever_Candy_2013_0041_V3?wid=490&amp;hei=290&amp;op_sharpen=0&amp;resMode=sharp2&amp;op_usm=1.2,1,4,0"></a>
        </div>
        <div class="clear"></div>
    </div>
    <div id="content_store" style="display:none">
      <?  for ($i = 0; $i < count($listChild); $i++) {
        if (isset($listChild[$i])) {
        $item = $listChild[$i];
        $temp2 = new Categories($item);
        $link = $temp2->getLink();
        $tempcount = $i+1;
        ?>

            <div id="<?=$tempcount?>">
                <a class="carouselImage"
                   href="<?=$link?>">
                    <img
                        width="490"
                        height="291"
                        class="large_img"
                   src="<?=$FullUrl."/".$item['img_topbanner']?>"></a>
            </div>


        <? }
        } ?>





    </div>

</div>

<div>

    <div style="width:748px;">
        <style>
            #outer {
                background-image: url('<?=$FullUrl?>/image_site/party-ideas-pinterest-widget.jpg');
                background-repeat: no-repeat;
                position: relative;
                width: 748px;
                height: 290px;
                margin: 0;
                padding: 0;
            }

            element.style {
                height: 150px;
                width: 562px;
            }

            #pinwidget {
                margin: 0px 0 0 150px;
                padding: 4px 0 25px 0;
            }

            #button {
                position: absolute;
                top: 202px;
                left: 29px;
                display: block;
                width: 80px;
                height: 30px;
            "}
        </style>

        <div id="outer">
            <a id="button" href="http://pinterest.com/partycity/" target="_new"></a>

            <div id="pinwidget">
                <a data-pin-do="embedBoard" href="http://www.pinterest.com/partycity/luau-party-ideas/"
                   target="_new"></a>
                <script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>
            </div>
        </div>
    </div>

</div>

</div>
</div>

</div>
</div>

<!-- End of Right Section -->
</div>


