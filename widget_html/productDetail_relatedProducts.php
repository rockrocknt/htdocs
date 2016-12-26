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