<?php
 global $title_bar,$do,$cat,$lg, $FullUrl,$catphukien;
$currentcat = currentCat();
?>
<?php
$temp = new Categories($currentcat);
$listChild = $temp->getChilds();
?>
<div class="sidebar">
    <h3 class="title" style="color: <?= $currentcat["bgcolor_code"] ?>">
       <?= $currentcat["name_".$lg] ?>
    </h3>
    <nav>
        <?php include "widget_html/leftmenusinhnhat.php"; ?>
    </nav>
</div>
<div class="wp-container">
    <?=$title_bar?$title_bar:navigationBar()?>
    <br/>
    <div class="banner-cate-promotion">


        <a href="<?=$currentcat["banner_top_url"]?>" title="Info">
            <img src="<?=$FullUrl."/".$currentcat["img_topbanner"]?>" width="750" alt="" />
        </a>
    </div>
    <hr>
    <div class="product-content">
        <h3 class="">
            <? echo $currentcat["name_".$lg]; ?>
        </h3>
        <ul class="sort-box none">
            <li>
                <label>Sắp xếp</label>
            </li>
            <li>
                <select class="sort">
                    <option selected="selected" value="0">Lựa chọn của chúng tôi</option>
                    <option value="1">Lựa chọn 1</option>
                    <option value="2">Lựa chọn 2</option>
                </select>
            </li>
        </ul>
        <div class="clear"></div>
        <ul class="list-product">

            <?php
            if (isset($listChild[0])) {
                $firtchild =new Categories($listChild[0]);
                $listChild_chau = $firtchild->getChilds();
                $listChild = $listChild_chau;
            }
            for ($i = 0; $i < count($listChild); $i++) {
                    if (isset($listChild[$i])) {
                    $item = $listChild[$i];
                    $temp2 = new Categories($item);
                    $link = $temp2->getLink();
                    ?>
                    <li>
                        <a href="<?=$link?>" >
                            <img src="<? echo $FullUrl."/".$item['img'] ?>" width="172" height="172">
                        </a>
                        <div class="product-decs">
                            <a title="Info" href="#" class="quick-shop none">
                                quick shop
                            </a>
                            <h3>
                                <a href="<?=$link?>">
                                    <? echo $temp2->getName(); ?>
                                </a>
                            </h3>
                            <p class="none">

                            </p>
                            <p class="price none">
                                $2.99
                            </p>
                        </div>
                    </li>
            <?php
                    }
            }
            ?>


        </ul>
    </div>
</div>
