<?php
global $cat, $lg, $currentcat, $products, $FullUrl, $plpage;
$_SESSION['CONTINUE_SHOPPING_URL'] = GetFullUrl();
$currentcat = currentCat();

?>
<!-- Titlebar
================================================== -->
<section class="container fullwidth-element home-slider"
    <?php /*
         style="background-image:url(<?=$img?>)"
    */
    ?>
    >

    <?  if (file_exists($currentcat['img_topbanner'])) {
        ?>
        <img src="<?= $img ?>"/>
    <? } ?>
    <?php /* ?>
    <div class="parallax-content">
        <h2><span><? echo $currentcat['name_'.$lg]; ?></span></h2>
    </div>

        */
    ?>


</section>

<div class="container">

    <?php
    if (ismobile()) {
        if (isIpad()) {
            global $showsort, $typesort;
            $showsort = 0;
            $typesort = 5;
            include "widget_html/productlist_sidebar.php";
        }
    }else // la pc
    {
        global $showsort, $typesort;
        $showsort = 0;
        $typesort = 5;
        include "widget_html/productlist_sidebar.php";
    }?>



    <?php
    global $listProduct, $db, $products;
    global $db, $stips, $page, $plpage, $set_per_page, $c;

    //$currentcat;
    $list = explode(";", $currentcat['cidlist']);
    $where = "";
    for ($iaaa = 0; $iaaa < count($list); $iaaa++) {
        if (is_numeric($list[$iaaa])) {
            if ($where != "") $where .= " or `cid`=" . $list[$iaaa];
            else $where = " `cid`=" . $list[$iaaa];
        }

    }
    $typesort = 5;
    // $price = explode('-',SafeQueryString('price'));

    //$min = SafeQueryString('min');
    // $max =SafeQueryString('max');
    $min = $currentcat['product_min_price'];
    $max = $currentcat['product_max_price'];

    $sql = "select * from products where  active=1 order by `is_available` desc, id desc ";
    if (($min > 0) && ($max > 0)) {
        // var_dump($_GET);
        $sql = "select * from products where (price > $min) and (price < $max) and active=1 order by `is_available` desc,price desc";
    }
    if (($min > 0) && ($max == 0)) {
        // var_dump($_GET);
        $sql = "select * from products where (price > $min)   and active=1 order by `is_available` desc,price desc";
    }
    if (($min == 0) && ($max < 0)) {
        // var_dump($_GET);
        $sql = "select * from products where (price < $max)   and active=1 order by `is_available` desc,price desc";
    }
    // echo $sql;
    $cat = new Categories(currentCat());
    $set_per_page = Info::getInfoField('paging_product');
    // $set_per_page = 2;
    // $set_per_page = 200;
    $page = isset($_GET["page"]) ? $_GET["page"] : '1'; //for paging
    $result = $cat->getListwithSQL_locgia($page, $set_per_page, $sql);
    //var_dump($result);
    $plpage = $result['paging'];
    $products = $result['list'];

    // echo $sql;
    //  $products = $db->getAll($sql);
    // var_dump($products);
    include "widget_html/productlist_content.php"; ?>
    <?php
    if (ismobile()) {
        if (!isIpad()) {
            global $showsort, $typesort;
            $showsort = 0;
            $typesort = 5;
            include "widget_html/productlist_sidebar.php";
        }
    }?>
</div>