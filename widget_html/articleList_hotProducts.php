<!-- articleList_hotProducts.php -->

<?php

$limit = 3;
/*
if ($currentcat['id'] != 985 ) {
	$articlesList = products::getRandom($limit, $currentcat['id']);
} 
if ($currentcat['id'] == 985 ) {
	$articlesList = articles::getlatest_cid($limit, 0);
}
*/
$productList = products::getRandom($limit);
?>

<div class="news_hot_pd">
							<div class="side_title">
								<h3>Sản phẩm HOT</h3>
								
							</div>
							<div class="sidepd_list">
								 
								<?php
								foreach ($productList as $product2) {
									$productobj = new products($product2);
									$link = $productobj->getLink();
									$img = $FullUrl."/".$product2['img'];
									$name = $product2['name_vn'];
								?>
								<div class="sidepd_one">
									<a href="<?php echo $link; ?>" class="sidepd_one_img">
										<img src="<?php echo $img; ?>" alt="<?php echo $name; ?>">
										<span class="hot_flash"></span>
									</a>
									<div class="sidepd_one_des">
										<div class="sidepd_one_title">
											<h3>
												<a href='<?php echo $link; ?>'><?php echo $name; ?></a>
											</h3>
											<div class="short_desc_product"><?php echo $product2['short_desc_vn'];  ?></div>
										</div>
										<div class="sidepd_one_price">
											
											<div class="sidepd_one_price">
													Giá : <?php echo formatPrice($productobj->getPrice()) ?>
											</div>
										</div>
									</div>
								</div>
								<?php
								}
								?>
								 
								
							</div>
							<?php /*
							<a href="#" class="button detail_btn">Tất cả sp bán chạy</a>
							*/ ?>
						</div>