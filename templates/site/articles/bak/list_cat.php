<?php
	global $FullUrl, $lg, $articles,$title_bar, $plpage;
$cur = currentCat();
$currentcat = $cur;
?>

<!-- Titlebar
================================================== -->
<section class="titlebar">
    <div class="container">
        <div class="sixteen columns">


            <nav id="breadcrumbs">
                <?= $title_bar ? $title_bar : navigationBar() ?>
            </nav>

            <div class="clearfix"></div>
            <div class="seotitle" style="padding-left: 0px;">
                <h1><?=$currentcat['name_vn']?></h1>
                <?=$currentcat['short_vn']?>
            </div>
        </div>
    </div>
</section>

<!-- Content
================================================== -->
<!-- Container PC -->
<div class="container onlymaxwidth767">

    <div class="sixteen columns ">

        <?php
        if ($articles) { ?>
        <ul class="product-list">
            <?php
            $count=0;
            foreach ($articles as $obj) {
            $count++;
            $article = new Categories($obj);
            $name = $article->getName();
            $link = $article->getLink();
            //   $size = fixSize($article->getImageNoThumb(), 88, 78);
            //    $h = number_format((78-$size["height"])/2);
            // include(TPL_DIR.'articles/item.php');
            $img = $article->getImageNoThumb();
            ?>

            <li><a href="<?=$link?>">
                    <img style="width:95px;" src="/<?=$img?>" alt="<?=$name?>" />
                    <div class="product-list-desc"><?=$name?>
                    </div>
                </a></li>
            <? } ?>
        </ul>
        <?php } ?>

        <!-- Pagination -->
        <div class="clearfix"></div>
        <div class="pagination-container masonry" >
            <nav class="pagination" >
                <ul>

                    <?=$plpage?>
                </ul>
            </nav>


        </div>
    </div>


</div>
<div class="clearfix"></div>

<!-- Container PC -->
<div class="container onlyminwidth768">

    <!-- Masonry Wrapper-->
    <div id="masonry-wrapper">
        
        <?php

        if ($articles) { ?>

            <?php
            $count=0;
            foreach ($articles as $obj) {
                $count++;
                $article = new Categories($obj);
                $name = $article->getName();
                $link = $article->getLink();
             //   $size = fixSize($article->getImageNoThumb(), 88, 78);
            //    $h = number_format((78-$size["height"])/2);
                // include(TPL_DIR.'articles/item.php');
                $img = $article->getImageNoThumb();
                ?>
                <!-- Post #1 -->
                <div class="one-third column masonry-item">
                    <article class="from-the-blog">
                        <?php
                        if (file_exists($img)){
                        //if (file_exists($obj['img'])) {?>
                        <figure class="from-the-blog-image">
                            <a href="<?=$link?>"><img src="<? echo   "/".$img;?>" alt="<?=htmlspecialchars($name)?>" /></a>
                            <div class="hover-icon"></div>
                        </figure>
                    <?php } ?>

                        <section class="from-the-blog-content">
                            <a href="<?=$link?>"><h5><?=$name?></h5></a>

                            <span><? echo strip_tags($article->getShort()); ?></span>
                            <a href="<?=$link?>" class="button gray"><?= SITE_DETAIL ?></a>
                        </section>

                    </article>
                </div>

            <?
            } ?>

        <?php } else echo SITE_NO_NEWS; ?>




    </div>

    <!-- Pagination -->
    <div class="pagination-container masonry">
        <nav class="pagination">
            <ul>

                <?=$plpage?>
            </ul>
        </nav>


    </div>

</div>
<!-- Container / End -->


<?php
return;
$cat = new Categories(currentCat());
$cat->countView();
$relates = $cat->getRelate();
$a = currentCat();
$catTinTuc = new Categories(Categories::getCatByAlias("tintuc"));
$catPress = new Categories(Categories::getCatByAlias("press_release"));
$media_inquiries = new Categories(Categories::getCatByAlias("media_inquiries"));
?>
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/master1_tintuclist.6.css">
<?=$title_bar?$title_bar:navigationBar()?>
<div class="wp" style="float: left;">
<div style="width:990px">
<div id="press-center">
<div id="tabs" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
<?php if ($cat->getAlias()!= "") {?>

<ul class="ui-tabs-nav ui-helper-reset ui-helper-clearfix ui-widget-header ui-corner-all">
    <li class="ui-state-default ui-corner-top
    <?php if ($catTinTuc->getUniqueKey()==$cat->getUniqueKey()) {?>ui-tabs-selected ui-state-active<?}?>
    ">

        <a href="<?=$catTinTuc->getLink()?>"
           ><?=$catTinTuc->getName()?>
        </a>

    </li>
    <li class="ui-state-default ui-corner-top
    <?php if ($catPress->getUniqueKey()==$cat->getUniqueKey()) {?>ui-tabs-selected  ui-state-active<?}?>
    ">
        <a href="<?=$catPress->getLink()?>"
           ><?=$catPress->getName()?>

        </a>
    </li>
    <li class="last ui-state-default ui-corner-top
    <?php if ($media_inquiries->getUniqueKey()==$cat->getUniqueKey()) {?>ui-tabs-selected ui-state-active<?}?>
    ">
        <a href="<?=$media_inquiries->getLink()?>">
            <?=$media_inquiries->getName()?></a>
    </li>
</ul>
<br class="clear">
<?} ?>
<div id="news" class="ui-tabs-panel ui-widget-content ui-corner-bottom">

<br class="clear">

<div id="blogs-websites">

<h1><? echo $cat->getName(); ?></h1>
    <div class="none">
<div class="see-all"><a href="/category/press+releases/web+view+all.do" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases/web+view+all.do_1&quot;;return this.s_oc?this.s_oc(e):true">More</a></div>
<div class="section-pager  none">
    <a class="first_link" href="" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_19&quot;;return this.s_oc?this.s_oc(e):true"></a><a class="previous_link" href="" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_20&quot;;return this.s_oc?this.s_oc(e):true"></a><a class="page_link first active_page" href="" longdesc="0" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_21&quot;;return this.s_oc?this.s_oc(e):true" style="display: inline;">1</a><a class="page_link" href="" longdesc="1" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_22&quot;;return this.s_oc?this.s_oc(e):true" style="display: inline;">2</a><a class="page_link" href="" longdesc="2" style="display: inline;" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_23&quot;;return this.s_oc?this.s_oc(e):true">3</a><a class="page_link" href="" longdesc="3" style="display: inline;" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_24&quot;;return this.s_oc?this.s_oc(e):true">4</a><a class="page_link last" href="" longdesc="4" style="display: inline;" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_25&quot;;return this.s_oc?this.s_oc(e):true">5</a><a class="next_link" href="" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_26&quot;;return this.s_oc?this.s_oc(e):true"></a><a class="last_link" href="" onclick="s_objectID=&quot;http://www.partycity.com/category/press+releases.do?MobileOptOut=2_27&quot;;return this.s_oc?this.s_oc(e):true"></a></div>
<div class="section-results">Showing <span class="showing">1 - 4</span> of <span class="total">20</span> results</div>
    </div>
<br class="clear">
<ul class="content">
    <?php if ($articles) { ?>

        <?php
        $count=0;
        foreach ($articles as $obj) {
            $count++;
            $article = new articles($obj);
            $name = $article->getName();
            $link = $article->getLink();
            $size = fixSize($article->getImageNoThumb(), 88, 78);
            $h = number_format((78-$size["height"])/2);
           // include(TPL_DIR.'articles/item.php');
            ?>

            <li class="four-col <?php if ($count == 4) echo "last"; ?>" style="display: list-item;">


                <a target="_new" href="<?=$link?>">
                    <img
                        width="173"
                        src="<? echo  $FullUrl."/".$obj['img'];?>" border="0"></a><br>

                <p><a target="_new" href="<?=$link?>"
                        ><strong><?=$name?></strong></a></p>


            </li>
            <?
        } ?>
        <?=$plpage?>
    <?php } else echo SITE_NO_NEWS; ?>


</ul>
<br class="clear">

</div>

<br class="clear">
</div>

</div>
<div class="clear" style="height:20px;"></div>
</div>
</div>

</div>
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
        if (file_exists($a["img_topbanner"]))
        {
            ?>
            <div class="banner_center"><img width="651"   src="/<?=$a["img_topbanner"]?>"></div>
        <?php
        }
        ?>
        <?=$title_bar?$title_bar:navigationBar()?>
        <?php if ($articles) { ?>

                <?php foreach ($articles as $obj) {
                    $article = new articles($obj);
                    $name = $article->getName();
                    $link = $article->getLink();
                    $size = fixSize($article->getImageNoThumb(), 88, 78);
                    $h = number_format((78-$size["height"])/2);
                    include(TPL_DIR.'articles/item.php');
                } ?>

            <?=$plpage?>
        <?php } else echo SITE_NO_NEWS; ?>
    </div>
</div>

<br class="clean"/>
<?php
return;
?>
<div class="ct-div-sub">

</div>