<?php
global $cat, $lg,$currentcat, $products, $FullUrl, $plpage;
$_SESSION['CONTINUE_SHOPPING_URL'] = GetFullUrl();
$currentcat = currentCat();
$cat = new Categories($currentcat);

?>
<script type="text/javascript" src="/js/bootstrap-slider.js"></script>
<section class="section-two-columns">
    <div class="container">
        <div class="row-fluid">
            <?php include "widget_html/product_list_sidebar.php"; ?>
            <?php include "widget_html/product_list_content.php"; ?>
        </div>
    </div>
</section>

<?php
return;
	global $cat, $lg,$currentcat, $products, $FullUrl, $plpage;
	$_SESSION['CONTINUE_SHOPPING_URL'] = GetFullUrl();
$currentcat = currentCat();
$cat = new Categories($currentcat);

?>
<nav class="breadcrumb__wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a class="pathway" href="/">Trang chủ</a></li>
				<?php 
				$catshop = Categories::getById($currentcat['pid']);
				?>
				<?php if ($catshop['id'] != 121) { ?>
                <li><a class="pathway" href="/<?php echo $catshop['unique_key_vn'] ?>/"><?php echo $catshop['name_vn'] ?></a></li> 
				<?php } ?>
                <li class="active"><?php  echo $cat->getName(); ?></li>	
            </ul>
        </div>
</nav>

<section class="top-a">	  
<div class="container-fluid">
	<div class="row">
		<div class="col-md-2">
			<?php include "widget_html/productlist_sidebar.php"; ?>
		</div>
		<div class="col-md-10">
			<?php // include "widget_html/sanPhamList.php"; ?>
			<?php
            include "widget_html/productlist_content.php"; ?>
		</div>
	</div>
</div>
</section>
