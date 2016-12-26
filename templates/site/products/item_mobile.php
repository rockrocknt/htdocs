<li><a href="<?=$link?>">
        <img style="width:95px;float: left;" src="<?=$img?>" alt="<?=$name?>" />
        <div class="product-list-desc" style="float: left;max-width: 62%;">
            <div><?=$name?></div>

            Mã: <?=$productobj->getCode()?>
            <br/>
            <i>
                <?php if ($productobj->dangKhuyenMai()) {
                    ?>
                    <span style="text-decoration: line-through;font-weight: normal">
                        <? echo formatPrice($productobj->getPriceSale());
                        ?>
                    </span>
                <?}?>
                <b style="
                <?php if ($productobj->dangKhuyenMai()) {
                    ?>background-color: #FFECB7;
                <?}?>
                    ">  <? echo formatPrice($productobj->getPrice()); ?></b>
            </i>
            <br/>
            <?php
            if ($productobj->ishethang()){?>
                <span class="hethangclass"><?=hethang?></span>
            <?
            }
            ?>
        </div>
    </a></li>
