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
            <div class="span9">
                <div class="products-list-head">
                    <h1><?=$currentcat['name_vn']?></h1>
                    <div class="tag-line">
                        <?=$currentcat['short_vn']?>
                    </div>

                </div>
                <?php include "widget_html/home_newarrival_cat.php"; ?>
            </div>

        </div>
    </div>
</section>
