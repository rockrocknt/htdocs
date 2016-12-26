<div class="tintuc_folder">
    <div class="left_ftintuc">
        <a class="img_ftintuc" title="<?=$name?>" href="<?=$link?>">
            <img src="<?=$article->getImage($size["width"])?>"
                 alt="<?=$name?>" title="<?=$name?>"
                 style="margin-top:0px;" height="83" width="146"></a>
    </div>
    <div class="right_ftintuc">
        <a title="<?=$name?>" href="<?=$link?>">
            <h4 class="list_tintuc"><?=$name?>
            </h4></a>
        <p class="content_tintuc">
            <?= $article->getShort()?>...
        </p>

    </div>
</div>
<?php return; ?>

<li>
    <p class="title-art-list"><a title="<?=$name?>" href="<?=$link?>"><?=$name?></a></p>
    <div>
    <a class="images" title="<?=$name?>" href="<?=$link?>"> <img src="<?=$article->getImage($size["width"])?>" <?=$h>0?'style="margin-top:'.$h.'px"':""?> alt="<?=$name?>" title="<?=$name?>" /> </a>
    </div>
    <div class="intro_art">
        <p style="font-size:11px; font-style:italic; color:#a3a1a1;"><?=FormatDate($article->getDate())?> // <?=number_format($article->getView())." ".SITE_VIEW?></p>
        <p><?=$article->getShort()?></p>
    </div>
    <p><a href="<?=$link?>" title="<?=SITE_DETAIL?>"><?=SITE_DETAIL?> &rarr;</a></p>
</li>