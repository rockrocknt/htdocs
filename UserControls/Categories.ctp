<?php
global $MenuFoot, $FullUrl, $prefix_url, $lg, $cat1, $Menu1, $Menu2;
$MenuFoot = $Menu1;
$showlanguage = Info::getInfoField('showlanguage');
$cat = new Categories($cat1);
?>
<ul class="menu_center">
    <?php
    foreach ($Menu1 as $i=>$obj){
        $menu = new Categories($obj);
        $link = $menu->getLink();
        $name = $menu->getName();
        $unique_key = $menu->getUniqueKey();
        ?>
    <?php if ($i==0) { ?>
        <li <?=!isset($cat1)?'class="actived"':''?> ><a  href="<?=$FullUrl.$prefix_url?>" title="<?=$name?>"><?=$name?></a></li>
    <?php } else { ?>
        <li <?=isset($cat1)&&($cat->getUniqueKey()==$unique_key)?'class="actived"':''?>
            <?php

            if ($i== (count($Menu1)-1))
            {
                ?>
               style="background: none"
                <?
            }
            ?>
            >
            <a  <?=$menu->hasExtLink()&&$menu->openInNewTab()?'target="_blank"':''?> href="<?=$link?>" title="<?=$name?>">

                <?=$name?>
                <?php if ($Menu2[$i]) { ?>
                    <span class="module_arrow"></span>
                <?php } ?>
            </a>
            <?php if ($Menu2[$i]) { ?>
            <div class="menu_hover">
                <div class="hover_top"></div>
                    <?php
                    foreach ($Menu2[$i] as $j=>$obj) {
                        $submenu = new Categories($obj);
                        $link = $submenu->getLink();
                        $name = $submenu->getName();
                        ?>
                        <p><a  href="<?=$link?>" <?=$submenu->hasExtLink()&&$submenu->openInNewTab()?'target="_blank"':''?>><span></span><?=$name?></a></p>
                    <?php } ?>
            </div>
            <?php
            }
            } // if ($i==0) {
        ?>
        </li>



    <?php } ?>
        </ul>
<?php
return;
	global $FullUrl, $prefix_url, $lg, $cat1, $Menu1, $Menu2;
	$showlanguage = Info::getInfoField('showlanguage');
	$cat = new Categories($cat1);
?>
<div id="ddsmoothmenu" class="ddsmoothmenu">
    <ul class="navi">
        <?php
			foreach ($Menu1 as $i=>$obj){
				$menu = new Categories($obj);
				$link = $menu->getLink();
				$name = $menu->getName();
				$unique_key = $menu->getUniqueKey();
		?>
        <?php if ($i==0) { ?>
        <li class="first"><a <?=!isset($cat1)?'class="active"':''?> href="<?=$FullUrl.$prefix_url?>" title="<?=$name?>"><?=$name?></a></li>
        <?php } else { ?>
        <li ><a <?=isset($cat1)&&($cat->getUniqueKey()==$unique_key)?'class="active"':''?> <?=$menu->hasExtLink()&&$menu->openInNewTab()?'target="_blank"':''?> href="<?=$link?>" title="<?=$name?>"><?=$name?></a>
        	<?php if ($Menu2[$i]) { ?>
            <ul>
                <?php
					foreach ($Menu2[$i] as $j=>$obj) {
						$submenu = new Categories($obj);
                        $link = $submenu->getLink();
						$name = $submenu->getName();
				?>
                <li> <a href="<?=$link?>" title="<?=$name?>" <?=$submenu->hasExtLink()&&$submenu->openInNewTab()?'target="_blank"':''?>><?=$name?></a> </li>
                <?php } ?>
            </ul>
            <?php } ?>
        </li>
        <?php } ?>
        <?php } ?>
    </ul>
    <?php if ($showlanguage) Template::UserControl("Flag") ?>
</div>