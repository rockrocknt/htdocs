<?php
global $title_bar, $do, $cat, $lg, $FullUrl, $catphukien;
$currentcat = currentCat();
?>
<?php
$temp = new Categories($currentcat);
$listChild = $temp->getChilds();
?>
<div class="sidebar">
    <h3 class="title" style="color: <?= $currentcat["bgcolor_code"] ?>">
        <?= $currentcat["name_" . $lg] ?>
    </h3>
    <nav>
        <nav>
            <?php
            if ($cat1['alias'] == "phukiensinhnhat")
                include "widget_html/leftmenusinhnhat.php";
            else
                include "widget_html/leftmenuphukien.php";
            ?>
        </nav>
    </nav>
</div>
<div class="wp-container">
    <?= $title_bar ? $title_bar : navigationBar() ?><br/>
    <div class="banner-cate-promotion">
        <a href="<?= $currentcat["banner_top_url"] ?>" title="Info">
            <img src="<?= $FullUrl . "/" . $currentcat["img_topbanner"] ?>" width="750" alt=""/>
        </a>
    </div>
    <hr>
    <div class="product-content category-content">
        <h3 class="">
            <? echo $currentcat["name_" . $lg]; ?>
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
        <ul class="list-category">

            <?php
            for ($i = 0; $i < count($listChild); $i++) {
                if (isset($listChild[$i])) {
                    $item = $listChild[$i];
                    $temp2 = new Categories($item);
                    $link = $temp2->getLink();
                    ?>
                    <li>
                        <h4>
                            <a href="<?= $link ?>">
                              <p>   <? echo $temp2->getName(); ?></p>
                            </a>
                        </h4>
                        <a href="<?= $link ?>" >
                            <img src="<? echo $FullUrl . "/" . $item['img'] ?>" width="298" height="298">
                        </a>



                    </li>
                <?php
                }
            }
            ?>


        </ul>
    </div>
</div>
