<?php
	global $FullUrl, $lg, $articles, $plpage;
$cur = currentCat();
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

<!-- Container -->
<div class="container">

<div class="twelve columns">

    <!-- Masonry Wrapper-->
    <div id="masonry-wrapper">
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
                <!-- Post #1 -->
                <div class="one-third column masonry-item">
                    <article class="from-the-blog">
                        <?php
                        $obj['img'] = str_replace("/images","images",$obj['img']);
                        $showimage = file_exists($obj['img']);
                        $img = $FullUrl."/".$obj['img'];
                        if (strpos($obj['img'],'http') !== false) {
                            $showimage=true;
                            $img = $obj['img'];
                        }

                        if ($showimage) {?>
                            <figure class="from-the-blog-image">
                                <a href="<?=$link?>"><img src="<? echo $img  ?>" alt="<?=htmlspecialchars($name)?>" /></a>
                                <div class="hover-icon"></div>
                            </figure>
                        <?php } ?>

                        <section class="from-the-blog-content">
                            <a href="<?=$link?>"><h5><?=$name?></h5></a>

                            <span><?// echo strip_tags($article->getShort());
                                if ($obj['idarticle'] > 0)
                                {
                                    //echo html_entity_decode($obj["short_$lg"]);
                                    echo strip_tags(html_entity_decode($obj["short_$lg"]));
                                }else
                                    echo strip_tags($article->getShort());
                                ?></span>
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
    <div class="four columns" id="imageWrapper">
        <?php include "templates/site/articles/articles_list_sidebar.php"; ?>
    </div>
</div>
<!-- Container / End -->

