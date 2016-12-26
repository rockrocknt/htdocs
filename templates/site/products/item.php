
<div class="col-sm-4 col-md-3 productListItem detail__wrapper">
								<div class="thumbnail img__wrapper">

									<a class="product-image"
									   href="<?=$link?>" title="<?=$name?>">
										<img src="<?=$img?>" alt="<?=$name?>" height="270" width="270"></a>

									<a href="<?=$link?>" class="detail" title="<?=$name?>">Xem chi tiết</a>
								</div>

								<div class="product-info">
									<h3 class="product-name"><a href="<?=$link?>" title="<?php echo $name; ?>"><?php echo $name; ?></a></h3>
									<div
									<?php
										if ($productobj->isConHang()) {
											//<img src="http://placehold.it/80x35" class="img-right">
										?>
										style="height:32px;"
									<?php
										} 
										?>
									>
										<img src="/upload/css/<?php echo $product['rate']; ?>starRate.png"  alt="star Rate" class="starRate">
									</div>
									<div class="type img-right__wrapper">
										<a href="<?php echo $productobj->getCatLink();  ?>"><?php echo $productobj->getCatName();  ?></a>
										<?php
										if ($productobj->isConHang()) {
											//<img src="http://placehold.it/80x35" class="img-right">
										?>
											<img src="/upload/css/conhang.png"  width="70" class="img-right">
										<?php
										} 
										?>
									</div>
									<div class="short_desc_product"><?php echo $product['short_desc_vn'];  ?></div>

								</div>
								<div class="price-box">
									<p class="minimal-price">
										<div class="productItemCode">Mã: <?=$productobj->getCode()?></div>
										<span class="price" id="product-minimal-price-1463">
										<?php echo formatPrice($productobj->getPrice()) ?>               </span>
									</p>
								</div>
						</div>