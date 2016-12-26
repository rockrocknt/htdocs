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
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/stylesheetcity.css">


<div class="fill_slot_for_pi">
<div class="left_column_for_pi">
<h1 class="h1_for_pi">
    <? echo $currentcat["name_".$lg] ; ?>

</h1>
<div id="addthis_toolbox_wrapper_div">

    <div id="socialmedia">
        <!--Social Media Buttons-->

        <div id="social_widgets">
            <div id="facebook_like_cell" style="width: 80px; padding-top: 2px;"><iframe frameborder="0" style="width: 80px; height: 21px;" scrolling="no" src="https://www.facebook.com/plugins/like.php?api_key=&amp;locale=en_US&amp;sdk=joey&amp;ref=.UfE_AHDXMEk.like&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D25%23cb%3Df1c5fb011%26origin%3Dhttp%253A%252F%252Fwww.partycity.com%252Ff26172451c%26domain%3Dwww.partycity.com%26relation%3Dparent.parent&amp;href=http%3A%2F%2Fwww.partycity.com%2Fcontent%2Fchristmas%2Bparty%2Bideas.do&amp;node_type=link&amp;width=&amp;height=&amp;font=arial&amp;layout=button_count&amp;colorscheme=light&amp;action=like&amp;show_faces=false&amp;send=false&amp;extended_social_context=false"></iframe></div>
            <div id="pinit_cell" style="width: 80px;"><a class="PIN_1404632788500_pin_it_button_20 PIN_1404632788500_pin_it_button_en_20_gray PIN_1404632788500_pin_it_button_inline_20 PIN_1404632788500_pin_it_beside_20" data-pin-href="//www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.partycity.com%2Fcontent%2Fchristmas%2Bparty%2Bideas.do&amp;media=http%3A%2F%2Fs7d5.scene7.com%2Fis%2Fimage%2FPartyCity%2FChristmas_DIY_Ideas_0174%3Fwid%3D145&amp;guid=UepKcMHCfTta-0&amp;description=Christmas%20Party%20Ideas%20-%20Party%20City" data-pin-log="button_pinit" data-pin-config="beside"><span class="PIN_1404632788500_pin_it_button_count" id="PIN_1404632788500_pin_count_0"><i></i>455</span></a></div>
            <div id="google_plus_cell" style="width: 80px;"><div style="text-indent: 0px; margin: 0px; padding: 0px; background: none repeat scroll 0% 0% transparent; border-style: none; float: none; line-height: normal; font-size: 1px; vertical-align: baseline; display: inline-block; width: 90px; height: 20px;" id="___plusone_0"><iframe width="100%" frameborder="0" hspace="0" marginheight="0" marginwidth="0" scrolling="no" style="position: static; top: 0px; width: 90px; margin: 0px; border-style: none; left: 0px; visibility: visible; height: 20px;" tabindex="0" vspace="0" id="I0_1404632788872" name="I0_1404632788872" src="https://apis.google.com/_/+1/fastbutton?usegapi=1&amp;size=medium&amp;width=80&amp;origin=http%3A%2F%2Fwww.partycity.com&amp;url=http%3A%2F%2Fwww.partycity.com%2Fcontent%2Fchristmas%2Bparty%2Bideas.do&amp;gsrc=3p&amp;ic=1&amp;jsh=m%3B%2F_%2Fscs%2Fapps-static%2F_%2Fjs%2Fk%3Doz.gapi.vi.MzTYhdvqvLA.O%2Fm%3D__features__%2Fam%3DAQ%2Frt%3Dj%2Fd%3D1%2Ft%3Dzcms%2Frs%3DAItRSTNAExn6UFnYyokvCPE-8CU3Tg479w#_methods=onPlusOne%2C_ready%2C_close%2C_open%2C_resizeMe%2C_renderstart%2Concircled%2Cdrefresh%2Cerefresh%2Conload&amp;id=I0_1404632788872&amp;parent=http%3A%2F%2Fwww.partycity.com&amp;pfname=&amp;rpctoken=11078218" data-gapiattached="true" title="+1"></iframe></div></div>
        </div>

    </div>


</div>
<?php
// type = 2 banner nho
$catytuongluau = currentCat();
$imagesList= ImagesGroup::getImagesByCid($catytuongluau["id"],1,0);

if (file_exists($imagesList[0]["img_vn"])){
?>

<div class="product_group_pcgw">
    <div id="slideshow_images">

        <div style="opacity: 1; z-index: 1;" class="slideshow_images" id="slideshow_images_1">
            <a href="/content/christmas+desserts+ideas.do">
                <img width="730" height="278" class="img_under_txt_pcgw"
                     alt="YummyChristmas Treats"
                     src="<?php echo $FullUrl."/". $imagesList[0]["img_vn"]; ?>"

                    >
            </a>
        </div>

        <div style="opacity: 0; z-index: 0;" class="slideshow_images" id="slideshow_images_2">
            <a href="/content/santacon+santa+suits+and+christmas+costumes.do">
                <img width="730" height="278" class="img_under_txt_pcgw"
                     alt="SantaCon Christmas Costumes"
                     src="<?php echo $FullUrl."/".$imagesList[1]["img_vn"]; ?>">
            </a>
        </div>

    </div>
    <div id="slideshow_controls">
        <img src="<?=$FullUrl?>/image_site/slide-btn-1-off-on.gif" onclick="mihJumpToSlide('slideshow_images', 1)" id="slideshow_control_1" alt="">
        <img src="<?=$FullUrl?>/image_site/slide-btn-2-off.gif" onclick="mihJumpToSlide('slideshow_images', 2)" id="slideshow_control_2" alt="">
        <!--<img alt="" id="slideshow_control_3" onclick="mihJumpToSlide('slideshow_images', 3)" src="/images/set_c/en_us/local/content/slideshow/slide-btn-3-off.gif" />-->
        <!--<img src="<?=$FullUrl?>/image_site/slide-btn-pause-off.gif" onclick="mihClearSlideshowSlide('slideshow_images')" id="slideshow_control_action" alt="">-->
    </div>
    <script src="/text/content/guide_articles/admin/scripts/slideshow.js" type="text/javascript"></script>
</div>
<? }?>


<p style="clear:both; display:inline-block; padding-top:11px; margin-bottom: 0px;" class="paragraph_font_for_pi">
    <?php
    echo strip_tags($currentcat['short_'.$lg]);
    ?>
</p>
    <?php
    for ($i = 0; $i < count($listChild); $i++) {
        if (isset($listChild[$i])) {
            $item = $listChild[$i];
            $temp2 = new Categories($item);
            $link = $temp2->getLink();
            ?>
            <?php if (($i==0) )  { ?>
                <div class="horizontal_line_for_pi"></div>
            <?}?>
            <!------------------------------- gallery ------------------------------------------------------------------------------->
            <h2 class="row_headline_for_pi">
                <a style="color: #C80203;" href="<?=$link?>">
                    <img
                        alt="<?=$temp2->getName()?>"
                        class="row_thumbnail_for_pi"
                        width="145"
                        height="145"
                        src="<?=$FullUrl."/".$temp2->getImageNoThumb()?>">
                    <?=$temp2->getName()?>
                </a>
            </h2>
            <p class="paragraph_font_for_pi">
                <?php echo strip_tags($temp2->getShort()); ?>

            </p>
            <ul class="row_linkstack_for_pi">
                <li><a href="<?=$temp2->getLink()?>" class="green_link_arrow13px_for_pi">Visit Gallery</a></li>
                <li><a href="/product/christmas+candy+buffet.do" class="green_link_arrow13px_for_pi">Shop All Christmas Candy Buffet</a></li>
                <li><a href="/category/holiday+parties/christmas+party+supplies/christmas+decorations/christmas+table+decorations.do" class="green_link_arrow13px_for_pi">Shop Christmas Table Decorations</a></li>
            </ul>
            <div class="horizontal_line_for_pi"></div>
            <!------------------------------- gallery -------------------------------------------------------------------------->


        <?php
        }
    }
    ?>





</div>
<div class="right_column_for_pi">

    <a href="/category/holiday+parties/christmas+party+supplies/santa+suits+accessories.do">
        <img width="232" height="348" style="margin-bottom:14px;" alt="Santa Suit Accessories" src="upload_site/hub-banner-santa-suits.jpg">
    </a>

    <a href="/category/holiday+parties/christmas+party+supplies/christmas+decorations/hanging+christmas+decorations.do">
        <img width="232" height="301" style="margin-bottom:14px;" alt="Christmas Hanging Decoration Supplies" src="upload_site/hub-banner-christmas-decorations.jpg">
    </a>
    <h2 class="sidebar_headline_for_pi">
        <a style="color: #67c748;" href="/party+ideas.do">
            MORE PARTY IDEAS
        </a>
    </h2>

    <h2 style="background-color:#67c748; color:white;" class="sidebar_subhead_for_pi">
        <a href="/content/party+idea+galleries.do?tab=winter_tab">
            <font color="white">
                Christmas Party Ideas
            </font>
        </a>

    </h2>
    <ul class="sidebar_linkstack_for_pi">
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/christmas+candy+buffet+ideas.do">Christmas Candy Buffet Ideas</a></li>

        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/diy+christmas+gift+wrapping+ideas.do">DIY Gift Wrap Ideas for Everyone
            </a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/diy+christmas+wreaths+ideas.do">DIY Christmas Wreath Ideas</a></li>

        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/bright+christmas+tablescapes+ideas.do">Bright Christmas Tablescape Ideas</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/melted+chocolate+christmas+treats+ideas.do">Dip and Drizzle Christmas Treats </a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/christmas+mantel+decorating+ideas.do">A Sleighful of Jolly Mantel Ideas</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/santacon+santa+suits+and+christmas+costumes.do">Wonderful SantaCon Costume Ideas</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/santa+christmas+costume+ideas+gallery.do">7 Ways to Be Santa</a></li>

        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/sexy+santa+christmas+costume+ideas+for+women.do"> 10 Sexy Santa Costumes for Women</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/christmas+desserts+ideas.do">Christmas Treat Ideas</a></li>

        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/christmas+cookie+exchange+party+ideas+and+recipes+gallery.do">Christmas Cookie Exchange Ideas</a></li>
    </ul>

    <!--<h2 class="sidebar_subhead_for_pi" style="background-color:#67c748; color:white;">
        <a href="/content/party+idea+galleries.do?tab=summer_tab">
            <font color="white">
Summer Party Ideas
            </font>
        </a>

    </h2>
    <ul class="sidebar_linkstack_for_pi">
        <li><a href="/content/luau+party+ideas.do" class="black_to_purpleunderline_link_for_pi">Luau Party Ideas</a></li>
        <li><a href="/content/summer+party+tablescape+idea+gallery.do" class="black_to_purpleunderline_link_for_pi">Summer Party Theme Ideas</a></li>
    </ul>-->


    <h2 style="background-color:#67c748; color:white;" class="sidebar_subhead_for_pi"><a href="/party+ideas.do"><font color="white">
                Top Party Idea Searches</font></a> </h2>
    <ul class="sidebar_linkstack_for_pi">
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/candy+buffet+ideas.do">Candy Buffet Ideas</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/girls+birthday+party+ideas+3.do">Girls Birthday Party Ideas</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/boys+birthday+party+ideas.do">Boys Birthday Party Ideas</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/baby+shower+ideas.do">Baby Shower Ideas and Tips</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/halloween+party+ideas.do">Halloween Party and Costume Ideas</a></li>
        <li><a class="black_to_purpleunderline_link_for_pi" href="/content/graduation+party+ideas.do">Graduation Party Ideas</a></li>
    </ul>

    <br>

    <div id="pinwidget">
        <a data-pin-board-width="350" data-pin-scale-height="350" data-pin-scale-width="68" href="http://pinterest.com/partycity/christmas-party-ideas/" data-pin-do="embedBoard"></a>

    </div>

    <!---social media------>


    <!---emd social media---->

</div>
</div>

<div class="clear"></div>