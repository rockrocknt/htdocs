<?php
global $cat, $lg,$currentcat, $products, $FullUrl, $plpage;
$_SESSION['CONTINUE_SHOPPING_URL'] = GetFullUrl();
$currentcat = currentCat();
$cat = new Categories($currentcat);
?>
<section class="section-two-columns">
    <div class="container">
        <div class="row-fluid">
            <?php include "widget_html/product_list_sidebar.php"; ?>
            <?php
            global $showsort, $FullUrl,$plpage;
            global $listProduct, $products;

            $currentcat = currentCat();
            $uniqe = $currentcat['unique_key_vn'];

            $typesort = getquery('typesort');
            if ($typesort == "") $typesort = 4;
            ?>
            <div class="span9">
                <div class="products-list-head">
                    <h1><?=$currentcat['name_vn']?></h1>
                    <div class="tag-line">
                        <?=$currentcat['short_vn']?>
                    </div>

                </div>
                <?php $product_lists = $listProduct; ?>
                <div id="list-view" class="products-list products-holder  tab-pane">
                    <?php for ($j = 0; $j < count ($product_lists); $j++):
                        $productObj = new products($product_lists[$j]);
                        ?>
                        <div class="list-item">
                            <?php include "widget_html/product_list_item_listview.php"; ?>
                        </div>
                    <?php endfor; ?>
                </div>
                <?php  ?>


                <div id="grid-view" class="products-grid products-holder active tab-pane">
                    <?php

                    $row             = ceil (count ($product_lists) / 3);
                    $k               = 0;
                    $limit           = 1;
                    ?>
                    <?php if (!empty ($product_lists)): ?>
                        <?php for ($i = 0; $i < $row; $i++): ?>
                            <div class="row-fluid">
                                <?php for ($j = $k; $j < count ($product_lists); $j++):
                                    $productObj = new products($product_lists[$j]);
                                    ?>
                                    <div class="span4">
                                        <?php include "widget_html/product_list_item.php"; ?>
                                    </div>
                                    <?php
                                    if ($limit >= 3)
                                    {
                                        $j++;
                                        $k     = $j;
                                        $limit = 1;
                                        break;
                                    }
                                    $limit ++;
                                    ?>
                                <?php endfor; ?>
                            </div>
                        <?php endfor; ?>
                    <?php endif; ?>
                </div>
                <div class="pagination-container">

                    <nav class="pagination">
                        <?php
                        // plpage_seo_sort in functions.php
                        echo $plpage;
                        ?>
                    </nav>
                </div>
            </div>

        </div>
    </div>
</section>
