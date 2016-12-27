<div class="summary entry-summary">

                            <h1 itemprop="name" class="product_title entry-title primaryColor"><?=$name?></h1>

                            <div itemprop="offers" itemscope="" itemtype="http://schema.org/Offer">
								<p class="productCategories">
									<span><?php echo  $product->getCatName();?></span>
								</p>
                                 
								<?php
  if ($product->dangKhuyenMai()) { ?>
    <p class="priceNormal"><span class="amount"><?php echo formatPrice($product->getPriceSale()); ?></span></p>
    <p class="price"><strong>Giá Khuyến mãi: </strong><span class="amount"><?php echo formatPrice($price); ?></span></p>
  <?php  
  } //if ($product->dangKhuyenMai()) 
  else { ?>
			<p class="price">
									<strong>Giá: </strong>
									<span class="amount"><?php echo formatPrice($price); ?></span>
			</p>
    
    <?php
  }
  ?>
  
                                <meta itemprop="price" content="$price">
                                <meta itemprop="priceCurrency" content="VND">
                                <link itemprop="availability" href="http://schema.org/InStock">
								<p class="code"><strong>Mã sản phẩm: </strong><span
                                        class="amount"><?php echo $product->getCode(); ?></span></p>

                            </div>
                            <div itemprop="description" class='productShortDes'>
                                <?php echo $proObj['short_vn']; ?>
                            </div>


                            


                            <div class="woo-share">
                                <span>Chia sẻ: </span>
								<ul>
								<li><div class="fb-like" data-href="<?php echo GetFullUrl(); ?>" 
								data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
								</li>
								</ul>
								<?php /*
                                <ul>
            <li>
                <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo GetFullUrl(); ?>"><i class="uk-icon-facebook"></i></a>
            </li>
            <li>
                <a href="https://twitter.com/home?status=<?php echo GetFullUrl(); ?>"><i class="uk-icon-twitter"></i></a>
            </li>
            <li>
                <a href="https://plus.google.com/share?url=<?php echo GetFullUrl(); ?>"><i class="uk-icon-google-plus"></i></a>
            </li>
            <li>
                <a href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?php echo GetFullUrl(); ?>&amp;title=&amp;summary=&amp;source="><i class="uk-icon-linkedin"></i></a>
            </li>
        </ul>
		*/ ?>
                            </div>
                            <div class="lienhechitietsanpham hdmuahang">
                                <div class="uk-accordion" data-uk-accordion>
                                    <h3 class="uk-accordion-title"><i class="fa fa-certificate"></i>&nbsp;Chính sách ưu đãi</h3>
                                    <div class="uk-accordion-content"><?php 
                                    $img = ImagesGroup::getImgById(74);
                                    echo $img['text2_vn'];
                                    ?></div>
                                    <h3 class="uk-accordion-title"><i class="fa fa-shopping-bag"></i>&nbsp;Hướng dẫn mua hàng</h3>
                                    <div class="uk-accordion-content"><?php 
                                    $img = ImagesGroup::getImgById(75);
                                    if (!empty($img))
                                      echo $img['text2_vn'];
                                    ?></div>
                                </div>

                                 <?php
                // echo Info::getInfoField('lienhechitietsanpham_vn');
                ?>
                            </div>
							
							<form class="cart" method="post" enctype="multipart/form-data">

                                <div class="quantity"><input step="1" min="1" name="quantity" value="1" title="Qty"
                                                             class="input-text qty text" size="4" type="number"
                                                             id="qty"
                                ></div>

                                <input name="add-to-cart" value="1292" type="hidden">

                                <button 
										
										
										type="submit"
                                        onclick="addtocartandredirect('','<?php echo $product->getID(); ?>','qty');return false;"
                                        class="single_add_to_cart_button button alt">Mua hàng
                                </button>
                                <?php 
                                if (isset($_SESSION["store_login"]))
                                {
                                ?>
                                chỉ hiện khi đang login admin
                                <a href="/index.php?do=cart&act=add&id=<?php echo $product->getID(); ?>&lg=vn&sl=1">LINK MUA SAN PHAM NAY</a>
                                <?php } ?>

                            </form>
                        </div>