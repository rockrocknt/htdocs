<? global $FullUrl, $lg, $tags, $parentTags, $homeTags, $parentLevel2Tags; ?>
<? if($tags || $parentTags || $homeTags || $parentLevel2Tags){
    //var_dump($homeTags);
    ?>
<div class="tag">
<span class="title">Từ khóa bài viết:</span>
    <? if($tags){ foreach($tags as $key => $tag){ ?> <a title="<?=strip_tags($tag["tags_name"]);?>" href="<?=$FullUrl?>/tag/<?=$tag["tags_unique_key"]?>"><?=trim($tag["tags_name"])?></a><?=count($tags)!=($key+1)?",":""?><? }} ?><?=$tags&&$parentTags?", ":"";?><? if($parentTags){ foreach($parentTags as $key => $tag){ ?><a title="<?=strip_tags($tag["tags_name"]);?>" href="<?=$FullUrl?>/tag/<?=$tag["tags_unique_key"]?>"><?=trim($tag["tags_name"])?></a><?=count($parentTags)!=($key+1)?", ":""?><? }} ?><?=($tags||$parentTags)&&$homeTags?", ":"";?><? if($homeTags){ foreach($homeTags as $key => $tag){ ?><a title="<?=strip_tags($tag["tags_name"]);?>" href="<?=$FullUrl?>/tag/<?=$tag["tags_unique_key"]?>"><?=trim($tag["tags_name"])?></a><?=count($homeTags)!=($key+1)?", ":""?><? }} ?><?=($tags||$parentLevel2Tags)&&$parentLevel2Tags?", ":"";?><? if($parentLevel2Tags){ foreach($parentLevel2Tags as $key => $tag){ ?><a title="<?=strip_tags($tag["tags_name"]);?>" href="<?=$FullUrl?>/tag/<?=$tag["tags_unique_key"]?>"><?=trim($tag["tags_name"])?></a><?=count($parentLevel2Tags)!=($key+1)?", ":""?><? }} ?>
</div>
<? } ?>