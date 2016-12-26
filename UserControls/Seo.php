<div class="index_footer">
    <div class="footer">
        <div class="index_L">
            <p class="footer_info">

                <?php
                global $do,$act,$seo;

                if ((($do !='products') && ($act!='detail')) || (($do !='articles') && ($act!='detail')))
                {
                    $cat = new Categories(currentCat());
                    echo $cat->getSEO();
                }

                else
                {
                    echo $seo['seo_f_vn'];
                }
                ?>

                 <br>© Bản quyền thuộc về <a target="_blank" href="IMGroup.vn"> www.IMGroup.vn</a>

        </div>
        <div class="index_R">
            <?php
            $root["id"] = 121;
            $root = new Categories($root);
            $Menu1 = $root->getChilds();
            //    var_dump($Menu1);
            ?>
            <ul class="menu_bottom">
                <?php
                global $FullUrl, $prefix_url, $lg, $cat1 , $Menu2;
                ?>
                <?php
                for($i=(count($Menu1)-1);$i>=0;$i--){
                    $obj = $Menu1[$i];
                    //foreach ($Menu1 as $i=>$obj){
                    $menu = new Categories($obj);
                    $link = $menu->getLink();
                    $name = $menu->getName();
                    $unique_key = $menu->getUniqueKey();
                    ?>


                    <?php if ($i==0) { ?>
                        <li  ><a  href="<?=$FullUrl.$prefix_url?>" title="<?=$name?>"><?=$name?></a></li>
                    <?php } else { ?>
                        <li
                            <?php
                            if ($i== (count($Menu1)-1))
                            {
                                ?>
                                class="end"
                            <?
                            }
                            ?>
                            >
                            <a  <?=$menu->hasExtLink()&&$menu->openInNewTab()?'target="_blank"':''?> href="<?=$link?>" title="<?=$name?>">
                                <?=$name?>
                            </a>
                        </li>
                    <?php

                    } // if ($i==0) {
                    ?>




                <?php } ?>
            </ul>

        </div>
		
    </div>
	
	<div style="clear:both;"></div>
</div>


<?php
return;
?>
<div class="sfooter">
    <?php
    $cat = new Categories(currentCat());
    echo $cat->getSEO();
    ?>
</div>