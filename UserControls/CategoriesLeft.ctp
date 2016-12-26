<?php
global $FullUrl, $prefix_url, $lg, $cat1, $Menu1, $Menu2;
?>
<?php
$catCatalogue = Categories::getCatByComp(6);

$catCatalogue = new Categories($catCatalogue);
?>
<li style="font-weight: bold;">
    <a    href="<?=$catCatalogue->getLink()?>" title="<?=$catCatalogue->getName()?>">

        <?=$catCatalogue->getName()?>

    </a>

</li>
<?php

$root["id"] = 154;
$root = new Categories($root);
$Menu1 = $root->getChilds();
foreach ($Menu1 as $i=>$obj){
    $menu = new Categories($obj);
    $link = $menu->getLink();
    $name = $menu->getName();
    $unique_key = $menu->getUniqueKey();
    ?>
        <li>
        <a  <?=$menu->hasExtLink()&&$menu->openInNewTab()?'target="_blank"':''?> href="<?=$link?>" title="<?=$name?>">

            <?=$name?>

        </a>

    </li>
<?php } ?>
