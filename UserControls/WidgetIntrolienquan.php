

<!-- Tabs -->
<div class="widget margin-top-40" >

    <ul class="tabs-nav blog">
        <li class="active"><a href="#tab1">Liên Quan</a></li>
        <li><a href="#tab2">Xem nhiều</a></li>

    </ul>

    <!-- Tabs Content -->
    <div class="tabs-container">

        <div class="tab-content" id="tab1">

            <!-- Recent Posts -->
            <ul class="widget-tabs">
                <?php
				$curr = new Categories(currentcat());
				
                $listpost = $curr->getSameGroupName(5);
				
				
				
                for($z=0;$z<count($listpost); $z++){
                    $item = $listpost[$z];
                    $artobj = new Categories($item);
                    $link = $artobj->getLink();

                    $obj2 = $artobj->obj;
                    // echo $obj2['dated'];
                    $list = explode(' ',$obj2['dated']);
                    $list = explode('-',$list[0]);

                    ?>
                    <li>
                        <div class="widget-thumb">
                            <a href="<?= $link ?>"><img width="74" src="<?=GetImageFULLURL($item['img'])?>" alt="" /></a>
                        </div>

                        <div class="widget-text">
                            <h4><a href="<?= $link ?>"><?=$item['name_vn']?></a></h4>
                            <span style="display:none;"><?=$list[2]?>/<?=$list[1]?>/<?=$list[0]?></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>

                <?}
                ?>


            </ul>

        </div>

        <div class="tab-content" id="tab2">

            <!-- Featured Posts -->
            <ul class="widget-tabs">

                <?php
                $listpost = Categories::getmostviewed(5);
				
				
                for($z=0;$z<count($listpost); $z++){
                    $item = $listpost[$z];
                    $artobj = new Categories($item);
                    $link = $artobj->getLink();

                    $obj2 = $artobj->obj;
                    // echo $obj2['dated'];
                    $list = explode(' ',$obj2['dated']);
                    $list = explode('-',$list[0]);

                    ?>
                    <li>
                        <div class="widget-thumb">
                            <a href="<?= $link ?>"><img width="74" src="<?=GetImageFULLURL($item['img'])?>" alt="" /></a>
                        </div>

                        <div class="widget-text">
                            <h4><a href="<?= $link ?>"><?=$item['name_vn']?></a></h4>
                            <span style="display:none;"><?=$list[2]?>/<?=$list[1]?>/<?=$list[0]?></span>
                        </div>
                        <div class="clearfix"></div>
                    </li>

                <?}
                ?>
            </ul>
        </div>


    </div>

</div>







<?php
return;
global $lg, $FullUrl;

$type = $parameters['type'];
$widgetName = $parameters["name_$lg"];
$limit = $parameters['qlimit'];
$cid = $parameters['cid'];
$widgetArticles = getWidgetArticles($type, $limit);
?>
<?php if ($widgetArticles) { ?>
    <?php if ($cid == 3) { ?>
        <div class="container-sub-div">
            <h3 class="title-h3"><?=$widgetName?></h3>
            <div class="ct-div-sub">
                <?php
                $mainNews = new articles($widgetArticles[0]);
                $mainLink = $mainNews->getLink();
                $mainName = $mainNews->getName();
                ?>
                <div class="main_news">
                    <p class="main_news_title"><a href="<?=$mainLink?>" title="<?=$mainName?>"><?=$mainName?></a></p>
                    <div class="main_news_img"><a href="<?=$mainLink?>" title="<?=$mainName?>"><img src="<?=$mainNews->getImage(115)?>" alt="<?=$mainName?>" title="<?=$mainName?>" /></a></div>
                    <p><?=$mainNews->getShort()?></p>
                </div>
                <?php if ($widgetArticles[1]) { ?>
                    <ul class="list_articles_home">
                        <?php for ($i=1; $i<count($widgetArticles); $i++) {
                            $article = new articles($widgetArticles[$i]); ?>
                            <li><a href="<?=$article->getLink()?>" title="<?=$article->getName()?>"><?=$article->getName()?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
    <?php } else { ?>
        <div class="container-ct-sidebar">
            <h3 class="title-side-bar"><?=$widgetName?></h3>
            <div class="ct-sidebar">
                <ul class="list-news-sidebar">
                    <?php foreach ($widgetArticles as $obj) {
                        $article = new articles($obj);
                        $name = $article->getName();
                        $link = $article->getLink();
                        $size = fixSize($article->getImageNoThumb(), 50, 50);
                        ?>
                        <li>
                            <div>
                                <a class="images" title="<?=$name?>" href="<?=$link?>"><img src="<?=$article->getImage($size["width"])?>" title="<?=$name?>" alt="<?=$name?>" /></a>
                            </div>
                            <p><a title="<?=$name?>" href="<?=$link?>"><?=$name?></a></p>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    <?php } ?>
<?php } ?>