<? global $FullUrl, $prefix_url, $lg, $logo; ?>

<a href="<?=$FullUrl.$prefix_url?>" title="<?=$logo["name_$lg"]?>"><img src="<?=$FullUrl?>/<?=file_exists($logo['img'])?$logo['img']:'images/logo.png'?>" alt="<?=$logo["name_$lg"]?>" /></a>