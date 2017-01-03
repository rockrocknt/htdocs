<?php
$relateProducts = $product->getRelatedProducts();
$product_lists = $relateProducts;
$proPerRow = 3;
$row             = ceil (count ($product_lists) / $proPerRow);
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
        if ($limit >= $proPerRow)
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
<?php
return;
?>
<!-- productDetail_relatedProducts -->
<?php 
global $product;
$relateProducts = $product->getRelatedProducts();

?>
<section class="new-arrivals-container">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="module title3 heading-line">
						<a href="/san-pham-con-hang/" style="float:right;" class="link-2"><i class="uk-icon-location-arrow"></i>&nbsp;Xem thêm </a>
						<h3 onclick="redirect('/san-pham-con-hang/');" class="module-title homeCat"><span>CÓ THỂ BẠN QUAN TÂM</span></h3>
					</div>
				</div>
				<div class="col-sm-12 col-md-12 productListRowHome">
				
					
					
					<?php
                if (isset($relateProducts[0])) {
                    foreach ($relateProducts as $key => $obj) {
                        $product = $obj;
                        $img = $FullUrl . "/" . $product['img'];
                        if (file_exists($product['img2'])) {
                            $img2 = $FullUrl . "/" . $product['img2'];
                        } else
                            $img2 = $img;

                        $name = $product['name_vn'];
                        $temp = Categories::getCatByID($product['cid']);
                        $category_name = $temp['name_vn'];
                        $productobj = new products($product);
                        $link = $productobj->getLink();
                        ?>
						
						<?php include "templates/site/products/item.php"; ?>
						
                    <? } ?>
                <? } //  if (isset($relateProducts[0])){ ?>
				
				</div>
			</div>
		</div>
	</section>