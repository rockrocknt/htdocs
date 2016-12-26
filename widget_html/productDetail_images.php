<?php 

global $lg;
		$imagesList = ImagesGroup::getImagesByProductID($product->getID());
		$imageMain = $img;
?>
<div class="images"> 
                            <a
							    id="img0"
                                    data-uk-lightbox="{group:'my-group'}"
                                    href="<?=$img?>"
                                    itemprop="image" class="woocommerce-main-image zoom" title=""
                                    >
                                <img width="600"
                                     src="<?=$img?>"
                                     class="attachment-shop_single wp-post-image"
                                     />
                            </a>
							<?php
							for ($i = 0; $i < count($imagesList); $i++) {
										if (empty($imagesList[$i])) continue;
										$item = $imagesList[$i];
											$img = getFullUrl2()."/".$item['img_'.$lg]
										
										?> 
								<a
								id="img<?php echo ($i+1); ?>"
                                    data-uk-lightbox="{group:'my-group'}"
                                    href="<?=$img?>"
                                    itemprop="image" class="woocommerce-main-image zoom none" title=""
                                    >
                                <img width="600"
                                     src="<?=$img?>"
                                     class="attachment-shop_single wp-post-image"
                                     />
                            </a>
							<?php 
							}
							?>
							<script type="text/javascript">
							function showImageBig(index)
							{
								$(".woocommerce-main-image").each(function() {
									$(this).hide();
									$('#img' + index).show();
								});
							}
							</script>
                            <div class="thumbnails columns-3 thumbnailImages">
							<!-- main image -->
							<?php $i=0; 
							$img = $imageMain;
							?>
								<a 
											onclick="showImageBig('<?php echo ($i); ?>');return false"
								href="<?=$img?>"
							>
												<img 
												width="100"
												class="rsImg"
													 
													 src="<?=$img?>" data-rsTmb="<?=$img?>"  />
											</a>
							<!-- END main image -->				
                                <?php
									
									for ($i = 0; $i < count($imagesList); $i++) {
										if (isset($imagesList[$i])) {
											$item = $imagesList[$i];
											$img = getFullUrl2()."/".$item['img_'.$lg]
											?>
											<a 
											onclick="showImageBig('<?php echo ($i+1); ?>');return false"
								href="<?=$img?>"
							>
												<img 
												width="100"
												class="rsImg"
													 alt="<? echo $product->getName(); ?>"
													 src="<?=$img?>" data-rsTmb="<?=$img?>"  />
											</a>

										<?
										}//if (isset($imagesList[$i])) {
									}// for ($i = 0; $i < count($imagesList); $i++) {
									?>
								
								<?php
								/*
									
									for ($i = 0; $i < count($imagesList); $i++) {
										if (isset($imagesList[$i])) {
											$item = $imagesList[$i];
											$img = getFullUrl2()."/".$item['img_'.$lg]
											?>
											<a 
							data-uk-lightbox="{group:'my-group'}" 
							href="<?=$img?>"
							>
												<img 
												width="100"
												class="rsImg"
													 alt="<? echo $product->getName(); ?>"
													 src="<?=$img?>" data-rsTmb="<?=$img?>"  />
											</a>

										<?
										}//if (isset($imagesList[$i])) {
									}// for ($i = 0; $i < count($imagesList); $i++) 
									*/
									
									?>
                                
                            </div>
</div>


<?php return ;?>
<div class="images">
                            <a
                                    data-uk-lightbox="{group:'my-group'}"
                                    href="<?=$img?>"
                                    itemprop="image" class="woocommerce-main-image zoom" title=""
                                    >
                                <img width="600"
                                     src="<?=$img?>"
                                     class="attachment-shop_single wp-post-image"
                                     />
                            </a>
                            <div class="thumbnails columns-3 thumbnailImages">
                                
								<?php 
									$imagesList = ImagesGroup::getImagesByProductID($product->getID());
								
								?>
								<?
									global $lg;
									for ($i = 0; $i < count($imagesList); $i++) {
										if (isset($imagesList[$i])) {
											$item = $imagesList[$i];
											$img = getFullUrl2()."/".$item['img_'.$lg]
											?>
											<a 
							data-uk-lightbox="{group:'my-group'}" 
							href="<?=$img?>"
							>
												<img 
												width="100"
												class="rsImg"
													 alt="<? echo $product->getName(); ?>"
													 src="<?=$img?>" data-rsTmb="<?=$img?>"  />
											</a>

										<?
										}//if (isset($imagesList[$i])) {
									}// for ($i = 0; $i < count($imagesList); $i++) {
									?>
                                
                            </div>
</div>

<?php 
return;
global $lg;
		$imagesList = ImagesGroup::getImagesByProductID($product->getID());
		
?>
<div class="images"> 
                            <a
                                    data-uk-lightbox="{group:'my-group'}"
                                    href="<?=$img?>"
                                    itemprop="image" class="woocommerce-main-image zoom" title=""
                                    >
                                <img width="600"
                                     src="<?=$img?>"
                                     class="attachment-shop_single wp-post-image"
                                     />
                            </a>
                            <div class="thumbnails columns-3 thumbnailImages">
                                
								
								<?
									
									for ($i = 0; $i < count($imagesList); $i++) {
										if (isset($imagesList[$i])) {
											$item = $imagesList[$i];
											$img = getFullUrl2()."/".$item['img_'.$lg]
											?>
											<a 
							data-uk-lightbox="{group:'my-group'}" 
							href="<?=$img?>"
							>
												<img 
												width="100"
												class="rsImg"
													 alt="<? echo $product->getName(); ?>"
													 src="<?=$img?>" data-rsTmb="<?=$img?>"  />
											</a>

										<?
										}//if (isset($imagesList[$i])) {
									}// for ($i = 0; $i < count($imagesList); $i++) {
									?>
                                
                            </div>
</div>


<?php return ;?>
<div class="images">
                            <a
                                    data-uk-lightbox="{group:'my-group'}"
                                    href="<?=$img?>"
                                    itemprop="image" class="woocommerce-main-image zoom" title=""
                                    >
                                <img width="600"
                                     src="<?=$img?>"
                                     class="attachment-shop_single wp-post-image"
                                     />
                            </a>
                            <div class="thumbnails columns-3 thumbnailImages">
                                
								<?php 
									$imagesList = ImagesGroup::getImagesByProductID($product->getID());
								
								?>
								<?
									global $lg;
									for ($i = 0; $i < count($imagesList); $i++) {
										if (isset($imagesList[$i])) {
											$item = $imagesList[$i];
											$img = getFullUrl2()."/".$item['img_'.$lg]
											?>
											<a 
							data-uk-lightbox="{group:'my-group'}" 
							href="<?=$img?>"
							>
												<img 
												width="100"
												class="rsImg"
													 alt="<? echo $product->getName(); ?>"
													 src="<?=$img?>" data-rsTmb="<?=$img?>"  />
											</a>

										<?
										}//if (isset($imagesList[$i])) {
									}// for ($i = 0; $i < count($imagesList); $i++) {
									?>
                                
                            </div>
</div>
