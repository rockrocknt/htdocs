<?php
global $FullUrl,$catSanPham, $prefix_url, $lg, $product,$title_bar;

$relateProducts = $product->getRelateNew();
$currentcat= Categories::getCatByID($product->getCID());


$customfields = $product->getCustomField();
$showcomment = Info::getInfoField('showcomment');

$proObj = $product->obj;
$catSanPham['cid_menu_left'] = $proObj['cid_cua_groupcha'];

$name = $product->getName();
$code = $product->getCode();
$price = $product->getPrice();
$id = $product->getID();
$content = $product->getContent();
$tags = $product->getTag();
$img = $FullUrl."/".$product->getImageNoThumb();

$cat = new Categories($currentcat);
?>

<section class="section-two-columns">
    <div class="container">
        <div class="row-fluid">
            <?php include "widget_html/product_list_sidebar.php"; ?>
            <?php include "widget_html/product_detail.php"; ?>
        </div>
    </div>
</section>

<link href="/css/chosen.css" rel="stylesheet">
<script type="text/javascript" src="/js/chosen.jquery.min.js"></script>

<?php
return;
	global $FullUrl,$catSanPham, $prefix_url, $lg, $product,$title_bar;

	$relateProducts = $product->getRelateNew();
    $currentcat= Categories::getCatByID($product->getCID());


	$customfields = $product->getCustomField();
	$showcomment = Info::getInfoField('showcomment');

$proObj = $product->obj;
$catSanPham['cid_menu_left'] = $proObj['cid_cua_groupcha'];

$name = $product->getName();
$code = $product->getCode();
$price = $product->getPrice();
$id = $product->getID();
$content = $product->getContent();
$tags = $product->getTag();
$img = $FullUrl."/".$product->getImageNoThumb();

$cat = new Categories($currentcat);

?>
 <nav class="breadcrumb__wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a class="pathway" href="/">Trang chủ</a></li>
                <li><a class="pathway" href="/shop-online/">Shop Online</a></li>
                <li class="active"><a class="pathway" href="/hoa-hong-leo/">Hoa hồng leo</a></li>
            </ul>
        </div>
</nav>
<section class="top-a" style="padding-top:1px;">
        <div class="container woocommerce-page woocommerce">
            <div class="row singleProductPage">
                <div class="col-sm-12 singleProductImage">
                    <div itemscope="" itemtype="http://schema.org/Product"
                         id="product-1292" class="post-1292 product type-product status-publish has-post-thumbnail
				product_cat-chicken 
				product_cat-meat-2 
				featured shipping-taxable purchasable product-type-simple product-cat-chicken product-cat-meat-2 instock">
						
						<?php include "widget_html/productDetail_images.php"; ?>
                        
                        <?php include "widget_html/productDetail_info.php"; ?>

                    </div>

                </div>
                <div class="col-sm-12">
                    <div class="module title2">
                        <h3 class="module-title">Mô tả chi tiết</h3>
                    </div>
                    <div class="productDescription">
						<?php 
						echo str_replace("font-family:", "", $product->getContent());
						?>
                    </div>
                </div>
            </div>
        </div>
    </section>

	<?php include "widget_html/productDetail_relatedProducts.php"; ?>

	
<?php
return;
	global $FullUrl,$catSanPham, $prefix_url, $lg, $product,$title_bar;

	$relateProducts = $product->getRelateNew();
    $currentcat= Categories::getCatByID($product->getCID());


	$customfields = $product->getCustomField();
	$showcomment = Info::getInfoField('showcomment');

$proObj = $product->obj;
$catSanPham['cid_menu_left'] = $proObj['cid_cua_groupcha'];

$name = $product->getName();
$code = $product->getCode();
$price = $product->getPrice();
$id = $product->getID();
$content = $product->getContent();
$tags = $product->getTag();
$img = $FullUrl."/".$product->getImageNoThumb();

$cat = new Categories($currentcat);

?>
<nav class="breadcrumb__wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a class="pathway" href="/">Trang chủ</a></li>
                <li><a class="pathway" href="/shop-online/">Shop Online</a></li>
                <li class="active"><a class="pathway" href="/hoa-hong-leo/">Hoa hồng leo</a></li>
            </ul>
        </div>
</nav>


<section class="top-a">	  
<div class="container woocommerce-page woocommerce">
	<div class="row">
		<div class="col-sx-12 col-sm-12 col-md-12 col-lg-12">
			<div itemscope="" itemtype="http://schema.org/Product" 
				id="product-1292" class="post-1292 product type-product status-publish has-post-thumbnail 
				product_cat-chicken 
				product_cat-meat-2 
				featured shipping-taxable purchasable product-type-simple product-cat-chicken product-cat-meat-2 instock">
				
					
						<?php include "widget_html/sanPhamChiTietHinh.php"; ?>
					
						<?php include "widget_html/sanPhamChiTietInfo.php"; ?>
					
				
			</div>
			<div class="col-sm-12 col-md-12">
				<div class="module title2">
					<h3 class="module-title">Mô tả chi tiết</h3>
				</div>
				<div class="productDescription">
					<?php echo $content; ?>
				</div>
			</div>	
		</div>
		
	</div>
</div>
</section>



