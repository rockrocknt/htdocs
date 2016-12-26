<?php
global $cat, $lg,$currentcat, $products, $FullUrl, $plpage;
$_SESSION['CONTINUE_SHOPPING_URL'] = GetFullUrl();
$currentcat= currentCat();

?>
<!-- Titlebar
================================================== -->
<section class="parallax-titlebar fullwidth-element"  data-background="#000" data-opacity="0.45" data-height="160">
    <?php
    $img = $FullUrl."/images/titlebar_bg_01.jpg";
    if (file_exists($currentcat['img_topbanner']))
    {
        $img = $FullUrl."/".$currentcat['img_topbanner'];
    }
    ?>
    <img src="<?=$img?>" alt="<?php echo strip_tags($currentcat['name_'.$lg]) ?>" />

    <div class="parallax-overlay"></div>


    <div class="parallax-content">
        <h2>Shop <span><? echo $currentcat['name_'.$lg]; ?></span></h2>

        <nav id="breadcrumbs">
           

                <?= $title_bar ? $title_bar : navigationBar() ?>


            
        </nav>
    </div>

</section>

<div class="container">

    <?php include "widget_html/productlist_sidebar.php"; ?>

    <?php
    global $listProduct,$db,$products;
    global $db,$stips,$page,$plpage,$set_per_page,$c;

    //$currentcat;
    $list = explode (";",$currentcat['cidlist']);
    $where = "";
    for($iaaa=0;$iaaa<count($list);$iaaa++)
    {
        if (is_numeric($list[$iaaa]))
        {
            if ($where != "") $where .= " or `cid`=".$list[$iaaa];
            else $where = " `cid`=".$list[$iaaa];
        }

    }
    $typesort=1;
    $sql = "select * from products where ". $where." and name_$lg<>'' and active=1 order by id desc";
    $typesort = getquery('typesort');
    if ($typesort==2)
    {
        $sql = "select * from products where ". $where." and name_$lg<>'' and active=1 order by `view` desc";
    }
    if ($typesort==3)
    {
        $sql = "select * from products where ". $where." and name_$lg<>'' and active=1 order by `price` asc";
    }
    if ($typesort==4)
    {
        $sql = "select * from products where ". $where." and name_$lg<>'' and active=1 order by `price` desc";
    }

    $cat = new Categories(currentCat());
    $set_per_page = Info::getInfoField('paging_product');
   // $set_per_page = 2;
    // $set_per_page = 200;
    $page   = isset($_GET["page"])  ? $_GET["page"]  : '1';//for paging
    $result = $cat->getListwithSQL($page, $set_per_page,$sql);
     //var_dump($result);
    $plpage = $result['paging'];
    $products = $result['list'];

    // echo $sql;
  //  $products = $db->getAll($sql);
   // var_dump($products);
    include "widget_html/productlist_content.php"; ?>

</div>