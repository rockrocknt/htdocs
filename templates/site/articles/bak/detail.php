<?php 

	global $lg, $FullUrl, $article; 

	$showcomment = Info::getInfoField('showcomment');
	$relateArticles = $article->getRelate();
    $currentcat =Categories::getCatByID($article->getCID());
	$tags = $article->getTag();
?>



    <!-- Titlebar
    ================================================== -->
    <section class="titlebar">
        <div class="container">
            <div class="sixteen columns">
                <h2><?=$article->getName()?></h2>

                <nav id="breadcrumbs">
                    <ul class="nav-bar">
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a itemprop="title" href="/" title="Trang chủ">
                            Trang chủ
                        </a>
                    </li>
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="/<?=$currentcat['unique_key_vn']?>/" itemprop="url"
                           title="<?=$currentcat['name_vn']?>"><?=$currentcat['name_vn']?></a>
                    </li>
                        </ul>
                    <?


                    // $title_bar ? $title_bar : navigationBar() ?>
                </nav>
            </div>
        </div>
    </section>



    <div class="container">



        <div class="twelve columns">


            <div class="extra-padding">

                <!-- Post -->
                <article class="post single">

                    <figure class="post-img none">
                        <a href=""
                           class="mfp-image"
                           title="First Image Title">
                            <img src="<?php echo getFullUrl2()."/". $article->getImageNoThumb(); ?>" alt=""/>
                            <div class="hover-icon"></div>
                        </a>
                    </figure>
                    <? /*
                    <section class="date">
                        <?php
                      $obj2 = $article->obj;
                       // echo $obj2['dated'];
                        $list = explode(' ',$obj2['dated']);
                        $list = explode('-',$list[0]);
                        ?>
                        <span class="day"><?=$list[2]?></span>
                        <span class="month"><?=$list[1]?>/<?=$list[0]?></span>
                    </section>
                    */ ?>

                    <section class="post-content">

                        <header class="meta">
                            <?php //Template::UserControl('TagsDetailArt');?>
                        </header>

                        <?php
                        $objj= $article->obj;

                        if ($objj['idarticle']>0)
                        {

                            echo html_entity_decode($article->getContent());
                        }else
                        {
                            $str =  $article->getContent();
                            $str = str_replace("font-size: small;","",$str);
                            //  word-wrap: break-word !important;
                            $str = str_replace("font-family: arial, helvetica, sans-serif;","",$str);
                            echo $str;
                        }

                        ?>
                        <?php // Template::UserControl('Tags');?>
                        <!-- Share Buttons -->
                        <div class="clearfix"></div>
                        <div style="">
                            <?php include "widget_html/share.php" ?>

                            <div class="clearfix"></div>
                        </div>

                    </section>

                </article>

                <div class="relatedPost">
                    <h3 class="headline">Tin liên quan</h3>
                    <span class="line margin-bottom-0"></span>
                    <div style="clear: both">&nbsp;</div>
                    <!-- Post / End -->
                    <nav class="categories">
                        <ul>
                            <?php if ($relateArticles) { ?>

                                <?php
                                foreach ($relateArticles as $obj) {
                                    $art = new articles($obj);
                                    $name = $art->getName();
                                    ?>
                                    <li><a href='<?=$art->getLink()?>' title="<?=$name?>"> <?=$name?></a></li>
                                <?php } ?>

                            <?php } ?>

                        </ul>
                    </nav>
                </div>


                <? /*
		<!-- Masonry Wrapper-->
                <div id="masonry-wrapper">
                    <?php if ($relateArticles) { ?>

                        <?php
                        $count=0;
                        foreach ($relateArticles as $obj) {
                            $count++;
                            $article = new articles($obj);
                            $name = $article->getName();
                            $link = $article->getLink();
                            $size = fixSize($article->getImageNoThumb(), 88, 78);
                            $h = number_format((78-$size["height"])/2);
                            // include(TPL_DIR.'articles/item.php');
                            ?>
                            <!-- Post #1 -->
                            <div class="one-third column masonry-item">
                                <article class="from-the-blog">
                                    <?php if (file_exists($obj['img'])) {?>
                                        <figure class="from-the-blog-image">
                                            <a href="<?=$link?>"><img src="<? echo  $FullUrl."/".$obj['img'];?>" alt="<?=htmlspecialchars($name)?>" /></a>
                                            <div class="hover-icon"></div>
                                        </figure>
                                    <?php } ?>

                                    <section class="from-the-blog-content">
                                        <a href="<?=$link?>"><h5><?=$name?></h5></a>


                                        <a href="<?=$link?>" class="button gray"><?= SITE_DETAIL ?></a>
                                    </section>

                                </article>
                            </div>

                        <?
                        } ?>

                    <?php } // else echo SITE_NO_NEWS; ?>




                </div>
		 */ ?>

            </div>
        </div>


        <?php include "widget_html/chitiettintuc_sidebar.php"; ?>



    </div>
	
	
	
	