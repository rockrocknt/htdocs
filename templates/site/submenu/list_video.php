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



<link rel="stylesheet" href="<?= $FullUrl ?>/css_site/4.9.video.css">
<link rel="stylesheet" href="<?= $FullUrl ?>/css_site/stylesheetcity.css">
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?= $FullUrl ?>/fancy215/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?= $FullUrl ?>/fancy215/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- Add fancyBox - media helper (this is optional) -->
<script type="text/javascript" src="<?= $FullUrl ?>/fancy215/helpers/jquery.fancybox-media.js?v=1.0.0"></script>

<script type="text/javascript">
    $(document).ready(function() {
        /*
         *  Simple image gallery. Uses default settings
         */
        $('#fancybox').fancybox();



    });
    $(document).ready(function() {
        $('.fancybox-media').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            helpers : {
                media : {}
            }
        });
    });
</script>

<div id="landing_wrapper" style="float: left;">

<div id="landing_head">

    <table cellpadding="0" cellspacing="0">
        <tbody><tr>
            <td id="pc_tv_cell"><div id="logo_block_default">

                    <br>
                    <img src="http://www.partycity.com/images/set_c/en_us/local/content/party_ideas/ideas-video.jpg" alt="Browse 100+ party inspiration videos with our fave tips for a WOW celebration. Thrill the kids with awesome and easy birthday ideas, learn how to make a balloon arch, find elegant bridal ideas and more!">
                </div>

                <div id="logo_block_halloween" style="display:none; width: 251px;">
                    <a href="/party+ideas.do" style="color: white"><img src="https://www.partycity.com/images/set_c/en_us/local/content/party_ideas/party-ideas_medium-white.gif" alt=""></a>
                    <p style="color: #6DB907; margin-left:5px;">
                        Conjure a YOU-nique look<br> &nbsp;this Halloween!</p>
                </div>
            </td>
            <td id="slideshow_cell">
                <div id="slideshow_container">
                    <div id="slideshow_images"><!-- start new slideshow set -->
                        <?php
                            $list = ImagesGroup::getImagesByCid($cat->getID(),1);
                        ?>
                        <div id="slideshow_images_1" class="slideshow_images" style="opacity: 1; z-index: 1;">
                            <img src="<?=$FullUrl."/".$list[0]["img_vn"]?>" usemap="#feature_1_map" alt="">
                            <map name="feature_1_map" id="feature_1_map">
                                <area shape="rect" coords="00,12, 727,282" class="fancybox-media" href="<?=$FullUrl."/".$list[0]["url_vn"]?>" alt="Click to Play">
                            </map>
                        </div>

                        <div id="slideshow_images_2" class="slideshow_images" style="opacity: 0; z-index: 0;">
                            <img src="<?=$FullUrl."/".$list[1]["img_vn"]?>" usemap="#feature_2_map" alt="">
                            <map name="feature_2_map" id="feature_2_map">
                                <area shape="rect" coords="00,12, 727,282" class="fancybox-media"
                                      href="<?=$FullUrl."/".$list[1]["url_vn"]?>" alt="Click to Play">
                            </map>
                        </div>

                        <div id="slideshow_images_3" class="slideshow_images" style="opacity: 0; z-index: 0;">
                            <img src="<?=$FullUrl."/".$list[2]["img_vn"]?>" usemap="#feature_3_map" alt="">
                            <map name="feature_3_map" id="feature_3_map">
                                <area shape="rect" coords="00,12, 727,282" class="fancybox-media"
                                      href="<?=$FullUrl."/".$list[2]["url_vn"]?>I" alt="Click to Play">
                            </map>
                        </div>

                    </div>

                    <div id="slideshow_controls">
                        <img id="slideshow_control_1" onclick="mihJumpToSlide('slideshow_images', 1)" src="http://html.quanaobetrai.net/image_site/slide-btn-1-off-on.gif" alt="">
                        <img id="slideshow_control_2" onclick="mihJumpToSlide('slideshow_images', 2)" src="http://html.quanaobetrai.net/image_site/slide-btn-2-off.gif" alt="">
                        <img id="slideshow_control_3" onclick="mihJumpToSlide('slideshow_images', 3)" src="http://html.quanaobetrai.net/image_site/slide-btn-3-off.gif" alt="">
                        <img id="slideshow_control_action" onclick="mihStopSlideshow('slideshow_images')" src="/images/set_c/en_us/local/content/slideshow/slide-btn-play-off.gif" alt="">
                    </div>

                    <div id="featured_img_set" class="slideshow_image_set"><!-- start new slideshow set -->

                        <div id="featured_img_set__slideshow_images_1" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Gateway_Video_monster-high-2.jpg" usemap="#featured_img_set__feature_1_map" alt="">
                            <map name="featured_img_set__feature_1_map" id="featured_img_set__feature_1_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(null, null, 1015, null, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="featured_img_set__slideshow_images_2" class="slideshow_images" style="opacity: 1;filter: alpha(opacity=100);z-index: 0;">
                            <img src="/image_site/gateway-video_monsters-u.jpg" usemap="featured_img_set__#feature_2_map" alt="">
                            <map name="featured_img_set__feature_2_map" id="featured_img_set__feature_2_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:initializeVideoPlayer(590, 167, 1051, 2486, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="featured_img_set__slideshow_images_3" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Gateway_Video_toy-story-2.jpg" usemap="#featured_img_set__feature_3_map" alt="">
                            <map name="featured_img_set__feature_3_map" id="featured_img_set__feature_3_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(581, 159, 1049, 2232, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                    </div><!-- end this slideshow set -->

                    <div id="halloween_img_set" class="slideshow_image_set"><!-- start new slideshow set -->

                        <div id="halloween_img_set__slideshow_images_1" class="slideshow_images" style="opacity: 1;filter: alpha(opacity=100);z-index: 0;">
                            <img src="/image_site/Gateway_Video_how-to-zombie.jpg" usemap="#halloween_img_set__feature_1_map" alt="">
                            <map name="halloween_img_set__feature_1_map" id="halloween_img_set__eature_1_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(null, null, 1004, null, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="halloween_img_set__slideshow_images_2" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Gateway_Video_how-to-vampire.jpg" usemap="#halloween_img_set__feature_2_map" alt="">
                            <map name="halloween_img_set__feature_2_map" id="halloween_img_set__feature_2_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(null, null, 1003, null, 'gateway', 'halloween_video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="halloween_img_set__slideshow_images_3" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Gateway_Video_how-to-fog-machine-2.jpg" usemap="#halloween_img_set__feature_3_map" alt="">
                            <map name="halloween_img_set__feature_3_map" id="halloween_img_set__feature_3_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(null, null, 1001, null, 'gateway', 'halloween_video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                    </div><!-- end this slideshow set -->


                    <div id="girls_bday_img_set" class="slideshow_image_set"><!-- start new slideshow set -->

                        <div id="girls_bday_img_set__slideshow_images_1" class="slideshow_images" style="opacity: 1;filter: alpha(opacity=100);z-index: 0;">
                            <img src="/image_site/Gateway_Video_monster-high-2.jpg" usemap="#girls_bday_img_set__feature_1_map" alt="">
                            <map name="girls_bday_img_set__feature_1_map" id="girls_bday_img_set__feature_1_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(597, 174, 1015, 2883, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="girls_bday_img_set__slideshow_images_2" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Gateway_Video_hello-kitty.jpg" usemap="#girls_bday_img_set__feature_2_map" alt="">
                            <map name="girls_bday_img_set__feature_2_map" id="girls_bday_img_set__feature_2_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(600, 176, 262, 2992, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="girls_bday_img_set__slideshow_images_3" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Gateway_Video_minnie-2.jpg" usemap="#girls_bday_img_set__feature_3_map" alt="">
                            <map name="girls_bday_img_set__feature_3_map" id="girls_bday_img_set__feature_3_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(null, null, 1014, null, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                    </div><!-- end this slideshow set -->
                    <div id="boys_bday_img_set" class="slideshow_image_set"><!-- start new slideshow set -->

                        <div id="boys_bday_img_set__slideshow_images_1" class="slideshow_images" style="opacity: 1;filter: alpha(opacity=100);z-index: 0;">
                            <img src="/image_site/Gateway_Video_mickey-2.jpg" usemap="#boys_bday_img_set__feature_1_map" alt="">
                            <map name="boys_bday_img_set__feature_1_map" id="boys_bday_img_set__feature_1_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(null, null, 1013, null, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="boys_bday_img_set__slideshow_images_2" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Gateway_Video_toy-story-2.jpg" usemap="#boys_bday_img_set__feature_2_map" alt="">
                            <map name="boys_bday_img_set__feature_2_map" id="boys_bday_img_set__feature_2_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(581, 159, 1049, 2232, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="boys_bday_img_set__slideshow_images_3" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/gateway-video_monsters-u.jpg" usemap="#boys_bday_img_set__feature_3_map" alt="">
                            <map name="boys_bday_img_set__feature_3_map" id="boys_bday_img_set__feature_3_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(594, 171, 1051, 2627, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                    </div><!-- end this slideshow set -->
                    <div id="wedding_img_set" class="slideshow_image_set"><!-- start new slideshow set -->

                        <div id="wedding_img_set__slideshow_images_1" class="slideshow_images" style="opacity: 1;filter: alpha(opacity=100);z-index: 0;">
                            <img src="/image_site/Bridal_Video_bachelorette.jpg" usemap="#wedding_img_set__feature_1_map" alt="">
                            <map name="wedding_img_set__feature_1_map" id="wedding_img_set__feature_1_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(583, 161, 240, 2364, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="wedding_img_set__slideshow_images_2" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Bridal_Video_bridal-shower.jpg" usemap="#wedding_img_set__feature_2_map" alt="">
                            <map name="wedding_img_set__feature_2_map" id="wedding_img_set__feature_2_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(584, 162, 239, 2365, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                        <div id="wedding_img_set__slideshow_images_3" class="slideshow_images" style="opacity: 0;filter: alpha(opacity=0);z-index: 0;">
                            <img src="/image_site/Bridal_Video_rehearsal.jpg" usemap="#wedding_img_set__feature_3_map" alt="">
                            <map name="wedding_img_set__feature_3_map" id="wedding_img_set__feature_3_map">
                                <area shape="rect" coords="00,12, 727,282" href="javascript:mihStopSlideshow('slideshow_images');initializeVideoPlayer(585, 163, 238, 2366, 'gateway', 'video_landing_page', 'slideshow');thefmvideo.playerCreation();" alt="Click to Play">
                            </map>
                        </div>

                    </div><!-- end this slideshow set -->
                </div><!-- end of slideshow container -->
                <script type="text/javascript" src="/js_site/slideshow-new.js"></script><!-- Start the slideshow moving -->
            </td>
        </tr>
        </tbody></table>

</div>

<div id="landing_tab_containter">
    <!-- If you change the tab names, then also change "id=" of the tabs below in all 3 places to match. -->
    <!-- If you change the tab names then also change any inbound links on other pages that point to here with the old tab name in the url. -->
    <!-- if you change the tab names don't forget to change the id_of_tab_opened_by_default.  Search lower on page to find it. -->

    <div id="featured_tab" class="landing_tab_on" onclick="video_landing_ns.jumpToTab(this.id)">
        <img id="featured_tab_img" src="http://www.partycity.com/images/set_c/en_us/local/content/video_landing_pages/buttons/videos/featured-videos-ON.gif" alt="Featured Birthday Videos" title="Featured Birthday Videos"></div>
    <div id="girls_bday_tab" class="landing_tab_off" onclick="video_landing_ns.jumpToTab(this.id)">
        <img id="girls_bday_tab_img" src="http://www.partycity.com/images/set_c/en_us/local/content/video_landing_pages/buttons/videos/girls-videos-OFF.gif" alt="Girls Birthday Videos" title="Girls Birthday Videos"></div>

    <div id="boys_bday_tab" class="landing_tab_off" onclick="video_landing_ns.jumpToTab(this.id)">
        <img id="boys_bday_tab_img" src="http://www.partycity.com/images/set_c/en_us/local/content/video_landing_pages/buttons/videos/boys-videos-OFF.gif" alt="Boys Birthday Videos" title="Boys Birthday Videos"></div>

    <div id="wedding_tab" class="landing_tab_off" onclick="video_landing_ns.jumpToTab(this.id)">
        <img id="wedding_tab_img" src="http://www.partycity.com/images/set_c/en_us/local/content/video_landing_pages/buttons/videos/wedding-videos-OFF.gif" alt="Wedding Videos" title="Wedding Videos"></div>

    <!--<div id="halloween_tab" class="landing_tab_off" onclick="video_landing_ns.jumpToTab(this.id)">
        <img id="halloween_tab_img" src="/images/set_c/en_us/local/content/video_landing_pages/buttons/videos/halloween-videos-OFF.gif" alt="Halloween Videos" title="Halloween Videos" /></div>-->

    <script type="text/javascript">
        var id_of_tab_opened_by_default = "featured_tab"; /* edit this line to use the id=  of the tab you want to open on page load.*/
    </script>
    <!-- *************************************** attention ************************************************* -->
    <!-- When tab names are changed, you need to change the first part of the "id=" twice in the section above this message and once in the section below. -->
    <!-- Change all 3 "id=" at the same time so they all match or they wont work. Don't forget to change the alt and title of the tabs above too-->
</div><!-- end of "landing_tab_containter" -->


<div id="landing_tabs"><!-- start of all tabs -->
<div id="featured_body" class="landing_tab_body_on"><!-- start of a tab -->
    <?php
    $featuredCategory = Categories::getCatByAlias("featuredvideo");
    $artcleList = articles::getByCid($featuredCategory['id']);
    $col = 0;
    for($ia=0;$ia< count($artcleList);$ia++)
    {
        if ($col==0)
        {?>
            <div class="landing_row"><!-- start a row -->
        <?
        }
        if (isset($artcleList[$ia]))
        {
            $item2= $artcleList[$ia];
            ?>
            <a href="<?=$item2['link_youtube']?>" class="fancybox-media">
                <img src="<?=$FullUrl."/".$item2['img']?>" alt="IMAGE VIDEO">
                <?=$item2['name_'.$lg]?>
            </a>

        <?
            $col++;
        }
        if ($col==4)
        {
            $col =0;
            ?>
            </div><!-- end a row -->
                <?
        }
    }
    if ($col <4)
    {?>
            </div><!-- end a row -->
    <?}
    ?>
<? /*

    <div class="landing_row"><!-- start a row -->
        <a href="javascript:initializeVideoPlayer(null, null, 1065, null, 'gateway', 'video_landing_page', 'thumbnail');thefmvideo.playerCreation();">
            <img src="http://s7d5.scene7.com/is/image/PartyCity/home-video-cinderella?$idea_landing_thumbs$" alt="">
            Cinderella Party Video
        </a>
    </div><!-- end of a row -->
*/ ?>



</div><!-- end of contents for this tab and start of the next tab -->

<div id="girls_bday_body" class="landing_tab_body_off">

    <?php
    $featuredCategory = Categories::getCatByAlias("girlvideo");
    $artcleList = articles::getByCid($featuredCategory['id']);
    $col = 0;
    for($ia=0;$ia< count($artcleList);$ia++)
    {
        if ($col==0)
        {?>
            <div class="landing_row"><!-- start a row -->
        <?
        }
        if (isset($artcleList[$ia]))
        {
            $item2= $artcleList[$ia];
            ?>
            <a href="<?=$item2['link_youtube']?>" class="fancybox-media">
                <img src="<?=$FullUrl."/".$item2['img']?>" alt="IMAGE VIDEO">
                <?=$item2['name_'.$lg]?>
            </a>

            <?
            $col++;
        }
        if ($col==4)
        {
            $col =0;
            ?>
            </div><!-- end a row -->
        <?
        }
    }
    if ($col <4)
    {?>
</div><!-- end a row -->
<?}
?>

</div><!-- end of contents for this tab and start of the next tab -->
<div id="boys_bday_body" class="landing_tab_body_off">

    <?php
    $featuredCategory = Categories::getCatByAlias("boyvideo");
    $artcleList = articles::getByCid($featuredCategory['id']);
    $col = 0;
    for($ia=0;$ia< count($artcleList);$ia++)
    {
        if ($col==0)
        {?>
            <div class="landing_row"><!-- start a row -->
        <?
        }
        if (isset($artcleList[$ia]))
        {
            $item2= $artcleList[$ia];
            ?>
            <a href="<?=$item2['link_youtube']?>" class="fancybox-media">
                <img src="<?=$FullUrl."/".$item2['img']?>" alt="IMAGE VIDEO">
                <?=$item2['name_'.$lg]?>
            </a>

            <?
            $col++;
        }
        if ($col==4)
        {
            $col =0;
            ?>
            </div><!-- end a row -->
        <?
        }
    }
    if ($col <4)
    {?>
</div><!-- end a row -->
<?}
?>
</div><!-- end of contents for this tab and start of the next tab -->
<div id="wedding_body" class="landing_tab_body_off">
    <?php
    $featuredCategory = Categories::getCatByAlias("weddingvideo");
    $artcleList = articles::getByCid($featuredCategory['id']);
    $col = 0;
    for($ia=0;$ia< count($artcleList);$ia++)
    {
        if ($col==0)
        {?>
            <div class="landing_row"><!-- start a row -->
        <?
        }
        if (isset($artcleList[$ia]))
        {
            $item2= $artcleList[$ia];
            ?>
            <a href="<?=$item2['link_youtube']?>" class="fancybox-media">
                <img src="<?=$FullUrl."/".$item2['img']?>" alt="IMAGE VIDEO">
                <?=$item2['name_'.$lg]?>
            </a>

            <?
            $col++;
        }
        if ($col==4)
        {
            $col =0;
            ?>
            </div><!-- end a row -->
        <?
        }
    }
    if ($col <4)
    {?>
</div><!-- end a row -->
<?}
?>
</div><!-- end of contents for this tab and start of the next tab -->
</div>
<br/>

<div class="clear"></div>
<script type="text/javascript" src="<?= $FullUrl ?>/js_site/content_landing_page-new.js"></script>