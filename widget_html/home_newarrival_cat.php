
<?php
global $db, $FullUrl, $lg,$catList;
$currentcat =currentCat();
//$catList = ImagesGroup::getimgbycid(25, 0);
//$productList = $imagesList[0]['name_vn'];
$catList= ImagesGroup::getImagesByCid($currentcat['id'],3);
//$catList= ImagesGroup::getImagesByCid(151,3);
?>


<?php
for ($iaa = 0; $iaa < count($catList); $iaa++) {
    if (!isset($catList[$iaa]['id'])) continue;
    $catt = $catList[$iaa];
//    $catobjj = new Categories(Categories::getCatByID($catList[$iaa]['category_id']));
    $catobjj = new Categories(Categories::getCatByID($catList[$iaa]['url_vn']));
    $catlink = $catobjj->getLink();
    ?>
<section class="new-arrivals-container">
<div class="col-sm-12 col-md-12">
        <div class="module title3 heading-line">
            <a href="<?=$catlink?>" style="float:right;" class="link-2"><i class="uk-icon-location-arrow"></i>&nbsp;Xem thêm </a>
            <h3 onclick="redirect('<?=$catlink?>');" class="module-title homeCat"><span><?= $catobjj->getName() ?></span></h3>
        </div>
</div>
<div class="col-sm-12 col-md-12 productListRowHome">
		<?php
            $productList = $catt['desc_vn'];
            global $lg, $db;
            $list = explode(";", $productList);
            $where = "";
            for ($i = 0; $i < count($list); $i++) {
                if (is_numeric($list[$i])) {
                    if ($where != "") $where .= " or `id`=" . $list[$i];
                    else $where = " `id`=" . $list[$i];
                }

            }
            $sql = "select  *   from products  where  ( " . $where . " and name_$lg<>'' and active=1) order by id desc";
            $lastProducts = $db->getAll($sql);
            for ($ii = 0; $ii < count($list); $ii++) {
                $id = $list[$ii];
                $j = 0;
                $countproduct = 0;

                foreach ($lastProducts as $key => $product) {

                    //      if (($countproduct>1) && ($ismobile)) continue;
                    $countproduct++;
                    if ($product['id'] == $id) {
                        $img = $FullUrl . "/" . $product['img'];
                        $name = $product['name_vn'];
                        $temp = Categories::getCatByID($product['cid']);
                        $category_name = $temp['name_vn'];
                        $productobj = new products($product);
                        $link = $productobj->getLink();
                        $nametag="h3";
                        //    include TPL_DIR . "/products/item.php";
                            ?>
						<div class="col-xs-6 col-sm-4 col-md-3 productListItem detail__wrapper"
						 
						>
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
											<img src="/upload/css/conhang.png" width="70" class="img-right">
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
                    <?
                    } // if ($product['id'] == $id)
                }
            }
            ?>
</div>
</section>

<?php } // for ($iaa = 0; $iaa < count($catList); $iaa++) ?>



<?php return; ?>
<section class="new-arrivals-container">
<div class="col-sm-12 col-md-12">
    <div class="module title3 col-sm-9">
		<h3 class="module-title">Product Category </h3>		
	</div>
	<div class="col-sm-3">
		<a style="float:right;"><i class="uk-icon-location-arrow"></i>&nbsp;Xem thêm<a>
	</div>
</div>
	
<div class="col-sm-12 col-md-12">
	<?php for ($i=0 ; $i< 4; $i++) { ?>
					<div class="col-sm-3 col-md-3">
			   <div class="thumbnail"><a class="product-image" href="http://www.davidaustinroses.co.uk/a-shropshire-lad-climbing-rose" title="A Shropshire Lad"><img src="http://www.davidaustinroses.co.uk/media/catalog/product/cache/1/small_image/270x270/9df78eab33525d08d6e5fb8d27136e95/A/_/A_Shropshire_Lad_Clg_1_2.jpg" alt="A Shropshire Lad" height="270" width="270"></a></div>
			   <div class="product-info">
				  <h3 class="product-name"><a href="http://www.davidaustinroses.co.uk/a-shropshire-lad-climbing-rose" title="A Shropshire Lad">A Shropshire Lad</a></h3>
				  <div class="category">English Rose - bred by David Austin</div>
				  <div class="type">English Leander Hybrid</div>
			   </div>
			   <div class="price-box">
				  <p class="minimal-price">
					 <span class="price" id="product-minimal-price-1463">
					 £16.50                </span>
				  </p>
			   </div>
			</div>
        <?php
	}
	?>
</div>	
</section>
<?php return; ?>

<div class="module title3"><h3 class="module-title">Hoa hồng leo</h3>
<h4 style="float:right;">Xem thêm</div>
</div>
<div class="uk-grid uk-grid-divider big">
                      <div class="uk-width-medium-1-4">
                        <p><img src="/images/mau/mau.jpg"/></p>
                        <div style="" class="ecwid-productBrowser-productNameLink ecwid-singleLine">Marketing</div>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
                      <div class="uk-width-medium-1-4">
                        <p><i class="uk-icon-shopping-basket uk-icon-medium uk-text-primary"></i></p>
                        <h4>Placement</h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
                      <div class="uk-width-medium-1-4">
                        <p><i class="uk-icon-area-chart uk-icon-medium uk-text-primary"></i></p>
                        <h4>Analysis</h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
                      <div class="uk-width-medium-1-4">
                        <p><i class="uk-icon-codepen uk-icon-medium uk-text-primary"></i></p>
                        <h4>Identity</h4>
                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium</p>
                      </div>
</div>


<div class="ecwid-productBrowser ecwid-productBrowser-CategoryPage ecwid-productBrowser-CategoryPage-15703381">
   <div style="width: 100%;">
      <table class="ecwid-productBrowser-innerTable" style="width: 100%;" cellpadding="0" cellspacing="0">
         <tbody>
             
            <tr>
               <td style="vertical-align: top;" align="left">
                  <div>
                     <div>
                        <div class="ecwid-productBrowser-head">Meat</div>
                        <div itemprop="category" class="ecwid-productBrowser-categoryPath">
                           <span class="ecwid-productBrowser-categoryPath-categoryLabel gwt-InlineLabel">Category: </span>
                           <div style="display: inline;" class="ecwid-productBrowser-categoryPath-categoryLink ecwid-productBrowser-categoryPath-storeLink"><a href="#!/c/0/offset=0&amp;sort=normal" onclick="javascript: return false;">Store</a></div>
                           <span class="ecwid-productBrowser-categoryPath-separator ecwid-productBrowser-categoryPath-separator-first gwt-InlineLabel">&nbsp;&gt;&nbsp;</span>
                           <div style="display: inline;" class="ecwid-productBrowser-categoryPath-categoryLink"><a href="#!/Meat/c/15703381/offset=0&amp;sort=normal" onclick="javascript: return false;">Meat</a></div>
                        </div>
                        <div></div>
                        <div style="" class="ecwid-productBrowser-categoryDescription">
                           <div class="gwt-HTML">
                              <p><img src="https://s3.amazonaws.com/images.ecwid.com/images/wysiwyg/category/7667255/15703381/1450113295832151590956/meat-cat.png"></p>
                           </div>
                        </div>
                        <table aria-hidden="true" style="display: none;" class="ecwid-productBrowser-subcategories-mainTable" cellpadding="0" cellspacing="0">
                           <colgroup>
                              <col>
                              <col>
                              <col>
                              <col>
                              <col>
                              <col>
                           </colgroup>
                           <tbody></tbody>
                        </table>
                        <div class="ecwid-productBrowser-category ecwid-enableDetailedTaxes">
                           <div style="">                              
                              <table style="width: 100%;" class="ecwid-ProductsList-content" cellpadding="0" cellspacing="0">                                 
                                 <tbody>
                                    <tr>
                                       <td>
                                          <div class="ecwid-productBrowser-productsGrid">
                                             <table class="ecwid-productBrowser-productsGrid-mainTable ecwid-productBrowser-productsGrid-v2" cellpadding="0" cellspacing="0">
                                                <tr>
                                                   <td style="width: 33%;" class="ecwid-productBrowser-productsGrid-label">
                                                      <div class="ecwid-productBrowser-productDragLabel ecwid-productBrowser-productDragLabel-invisible">Drag &amp; Drop Me to the Bag</div>
                                                   </td>
                                                   <td style="width: 33%;" class="ecwid-productBrowser-productsGrid-label">
                                                      <div class="ecwid-productBrowser-productDragLabel ecwid-productBrowser-productDragLabel-invisible">Drag &amp; Drop Me to the Bag</div>
                                                   </td>
                                                   <td style="width: 33%;" class="ecwid-productBrowser-productsGrid-label">
                                                      <div class="ecwid-productBrowser-productDragLabel ecwid-productBrowser-productDragLabel-invisible">Drag &amp; Drop Me to the Bag</div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="vertical-align: middle; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellTop ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673142">
                                                      <div style="width: 100%;">
                                                         <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productTopFragment">
                                                            <table style="width: 100%;" cellpadding="0" cellspacing="0">
                                                               <colgroup>
                                                                  <col>
                                                               </colgroup>
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center">
                                                                        <table class="ecwid-productBrowser-productsGrid-productTopFragment-inner" cellpadding="0" cellspacing="0">
                                                                           <colgroup>
                                                                              <col>
                                                                              <col>
                                                                           </colgroup>
                                                                           <tbody>
                                                                              <tr>
                                                                                 <td style="vertical-align: top;">
                                                                                    <div class="ecwid-imgLoaded"><a href="#!/Salmon/p/57673142/category=15703381" onclick="javascript: return false;"><img alt="Salmon" title="Salmon" style="width: 230px; max-width: 230px; height: 230px; border-style: none; text-decoration: none; cursor: pointer;" src="https://s3.amazonaws.com/images.ecwid.com/images/7667255/355824460.jpg" height="230" width="230"></a></div>
                                                                                 </td>
                                                                                 <td style="vertical-align: top;">
                                                                                    <div style="position: relative; width: 0px; height: 0px;">
                                                                                       <div class="gwt-HTML">
                                                                                          <div class="ecwid-productBrowser-productsGrid-inTheBagTick">&nbsp;</div>
                                                                                       </div>
                                                                                    </div>
                                                                                 </td>
                                                                              </tr>
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td style="vertical-align: middle; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellTop ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673147">
                                                      <div style="width: 100%;">
                                                         <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productTopFragment">
                                                            <table style="width: 100%;" cellpadding="0" cellspacing="0">
                                                               <colgroup>
                                                                  <col>
                                                               </colgroup>
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center">
                                                                        <table class="ecwid-productBrowser-productsGrid-productTopFragment-inner" cellpadding="0" cellspacing="0">
                                                                           <colgroup>
                                                                              <col>
                                                                              <col>
                                                                           </colgroup>
                                                                           <tbody>
                                                                              <tr>
                                                                                 <td style="vertical-align: top;">
                                                                                    <div class="ecwid-imgLoaded"><a href="#!/Pork/p/57673147/category=15703381" onclick="javascript: return false;"><img alt="Pork" title="Pork" style="width: 230px; max-width: 230px; height: 230px; border-style: none; text-decoration: none; cursor: pointer;" src="https://s3.amazonaws.com/images.ecwid.com/images/7667255/355824470.jpg" height="230" width="230"></a></div>
                                                                                 </td>
                                                                                 <td style="vertical-align: top;">
                                                                                    <div style="position: relative; width: 0px; height: 0px;">
                                                                                       <div class="gwt-HTML">
                                                                                          <div class="ecwid-productBrowser-productsGrid-inTheBagTick">&nbsp;</div>
                                                                                       </div>
                                                                                    </div>
                                                                                 </td>
                                                                              </tr>
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td style="vertical-align: middle; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellTop ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673150">
                                                      <div style="width: 100%;">
                                                         <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productTopFragment">
                                                            <table style="width: 100%;" cellpadding="0" cellspacing="0">
                                                               <colgroup>
                                                                  <col>
                                                               </colgroup>
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center">
                                                                        <table class="ecwid-productBrowser-productsGrid-productTopFragment-inner" cellpadding="0" cellspacing="0">
                                                                           <colgroup>
                                                                              <col>
                                                                              <col>
                                                                           </colgroup>
                                                                           <tbody>
                                                                              <tr>
                                                                                 <td style="vertical-align: top;">
                                                                                    <div class="ecwid-imgLoaded"><a href="#!/Chicken/p/57673150/category=15703381" onclick="javascript: return false;"><img alt="Chicken" title="Chicken" style="width: 230px; max-width: 230px; height: 230px; border-style: none; text-decoration: none; cursor: pointer;" src="https://s3.amazonaws.com/images.ecwid.com/images/7667255/355824474.jpg" height="230" width="230"></a></div>
                                                                                 </td>
                                                                                 <td style="vertical-align: top;">
                                                                                    <div style="position: relative; width: 0px; height: 0px;">
                                                                                       <div class="gwt-HTML">
                                                                                          <div class="ecwid-productBrowser-productsGrid-inTheBagTick">&nbsp;</div>
                                                                                       </div>
                                                                                    </div>
                                                                                 </td>
                                                                              </tr>
                                                                           </tbody>
                                                                        </table>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </div>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="vertical-align: top; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellMiddle ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673142">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productMiddleFragment">
                                                         <div>
                                                            <div style="" class="ecwid-productBrowser-productNameLink ecwid-singleLine"><a style="width: 66px;" href="#!/Salmon/p/57673142/category=15703381" onclick="javascript: return false;">Salmon</a></div>
                                                            <div class="gwt-HTML">
                                                               <div class="ecwid-productBrowser-sku">SKU  0000012345</div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td style="vertical-align: top; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellMiddle ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673147">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productMiddleFragment">
                                                         <div>
                                                            <div style="" class="ecwid-productBrowser-productNameLink ecwid-singleLine"><a style="width: 43px;" href="#!/Pork/p/57673147/category=15703381" onclick="javascript: return false;">Pork</a></div>
                                                            <div class="gwt-HTML">
                                                               <div class="ecwid-productBrowser-sku">SKU  000004371</div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td style="vertical-align: top; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellMiddle ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673150">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productMiddleFragment">
                                                         <div>
                                                            <div style="" class="ecwid-productBrowser-productNameLink ecwid-singleLine"><a style="width: 72px;" href="#!/Chicken/p/57673150/category=15703381" onclick="javascript: return false;">Chicken</a></div>
                                                            <div class="gwt-HTML">
                                                               <div class="ecwid-productBrowser-sku">SKU  00001</div>
                                                            </div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="vertical-align: top; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellMiddle ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673142">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productCostFragment">
                                                         <div>
                                                            <div class="ecwid-productBrowser-price notranslate"><span class="ecwid-productBrowser-price-value notranslate">$1.99</span></div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td style="vertical-align: top; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellMiddle ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673147">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productCostFragment">
                                                         <div>
                                                            <div class="ecwid-productBrowser-price notranslate"><span class="ecwid-productBrowser-price-value notranslate">$12.99</span></div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td style="vertical-align: top; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellMiddle ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673150">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productCostFragment">
                                                         <div>
                                                            <div class="ecwid-productBrowser-price notranslate"><span class="ecwid-productBrowser-price-value notranslate">$7.80</span></div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td style="vertical-align: middle; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellBottom ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673142">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productBottomFragment">
                                                         <div>
                                                            <div class="ecwid-BuyNow"><button style="" class="ecwid-btn ecwid-btn--primary ecwid-btn--buyNow ecwid-btn--actionOK" type="button"><span>Buy Now</span></button><span aria-hidden="true" style="display: none;" class="ecwid-BuyNow-outOfStockLabel">In stock</span></div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td style="vertical-align: middle; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellBottom ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673147">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productBottomFragment">
                                                         <div>
                                                            <div class="ecwid-BuyNow"><button style="" class="ecwid-btn ecwid-btn--primary ecwid-btn--buyNow ecwid-btn--actionOK" type="button"><span>Buy Now</span></button><span aria-hidden="true" style="display: none;" class="ecwid-BuyNow-outOfStockLabel">In stock</span></div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                   <td style="vertical-align: middle; width: 33%;" class="ecwid-productBrowser-productsGrid-cell ecwid-productBrowser-productsGrid-cellBottom ecwid-productBrowser-productsGrid-productInside ecwid-product-id-57673150">
                                                      <div style="cursor: pointer;" class="ecwid-productBrowser-productsGrid-productBottomFragment">
                                                         <div>
                                                            <div class="ecwid-BuyNow"><button style="" class="ecwid-btn ecwid-btn--primary ecwid-btn--buyNow ecwid-btn--actionOK" type="button"><span>Buy Now</span></button><span aria-hidden="true" style="display: none;" class="ecwid-BuyNow-outOfStockLabel">In stock</span></div>
                                                         </div>
                                                      </div>
                                                   </td>
                                                </tr>
                                                <tr>
                                                   <td></td>
                                                   <td></td>
                                                   <td></td>
                                                </tr>
                                             </table>
                                          </div>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>
                                          <table aria-hidden="true" style="width: 100%; display: none;" cellpadding="0" cellspacing="0">
                                             <colgroup>
                                                <col>
                                             </colgroup>
                                             <tbody>
                                                <tr>
                                                   <td align="center">
                                                      <div class="ecwid-pager ecwid-pager-hasTopSeparator"><a target="_blank" href="http://www.ecwid.com?utm_source=7667255&amp;utm_medium=powered-by-link&amp;utm_campaign=Ecwid%20stores" class="ecwid-poweredBy">Powered by Ecwid</a><span style="visibility: hidden; display: none;" class="ecwid-pager-link ecwid-pager-link-disabled ecwid-pager-prev-label">« <span>Previous</span></span><span style="visibility: hidden;" class="gwt-InlineLabel"> | </span><span class="gwt-InlineLabel">Page: </span><span class="ecwid-pager-link ecwid-pager-link-disabled"><span>1</span></span><span style="visibility: hidden;" class="gwt-InlineLabel"> | </span><span style="visibility: hidden; display: none;" class="ecwid-pager-link ecwid-pager-link-disabled ecwid-pager-next-label"><span>Next</span> »</span></div>
                                                   </td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                        <div></div>
                     </div>
                  </div>
               </td>
            </tr>
            <tr>
               <td style="vertical-align: top;" align="left">
                  <div aria-hidden="true" style="display: none;"></div>
               </td>
            </tr>
         </tbody>
      </table>
   </div>
</div>
