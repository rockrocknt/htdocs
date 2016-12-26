<?php
global $showsort, $FullUrl,$plpage;
global $listProduct, $products;

$currentcat = currentCat();
$uniqe = $currentcat['unique_key_vn'];

$typesort = getquery('typesort');
if ($typesort == "") $typesort = 4;
/*
if ($currentcat['categories_displaytype_id']==4)
{
    $typesort=5;
}
*/
//echo $typesort;
?>
<div class="twelve columns margin_top_15_pc">
    <div class="clearfix">
        <div class="navigationpc">
            <nav id="breadcrumbs" style="float: left;">
                <?
				/*
                if ($currentcat['comp']==30)
                {
                    $topcha = Categories::getCatByID($currentcat['cid_menu_left']);
                    ?>
                    <ul class="nav-bar">
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a itemprop="title" href="/" title="Trang chủ">
                    Trang chủ
                    </a>
                    </li>
                    <?php  $cidnotshow = array(1017);
                    //if (!(in_array($topcha['id'], $cidnotshow)))
                    if ($currentcat['categories_displaytype_id'] != 8)
                    {
                    ?>
                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="/<?=$topcha['unique_key_vn']?>/" itemprop="url"
                           title="<?=$topcha['name_vn']?>"><?=$topcha['name_vn']?></a>
                    </li>
                    <?php }
                    ?>

                    <li itemscope="" itemtype="http://data-vocabulary.org/Breadcrumb">
                        <a href="<?=curPageURL()?>" itemprop="url"
                           title="<?=$currentcat['name_vn']?>"><?=$currentcat['name_vn']?></a>
                    </li>
                    </ul>
                <?
                }else
                {
                    echo $title_bar ? $title_bar : navigationBar();
                }

				*/
                ?>
            </nav>

        </div>
        <div class="navigationmobile" style="margin-left: 0px;">

            <nav id="breadcrumbs" style="float: left;">
                <?php // $title_bar ? $title_bar : navigationBar() ?>
            </nav>

        </div>
        <div class="clearfix"></div>
        <div class="seotitle">
            <h1><?=$currentcat['name_vn']?></h1>
            <?=$currentcat['short_vn']?>
        </div>
    </div>
    <?php
    //if (($typesort != 5) && ($showsort != "0")) {
	if (true) {
        ?>
		<script>
		function changeSort()
		{
			<?php 
				//$my_url = "/".$cat1key."/";
				$queryArr = getQueryArray();
				$searchTerm = "";
				if (!empty($queryArr)) {
					foreach ($queryArr as $key => $value) {
						if (!empty($key) && ($key != 'page')  && ($key != 'typesort')){
							$searchTerm .= '&' . $key . '=' . $value;
						}
					}
				}
				$my_url = "?" . $searchTerm;
			?>
			var url = $('#currentUrl').val() + "<?php echo $my_url; ?>";
			location.href = url + "&typesort=" + $('#sortproduct').val();
		}
		</script>
        <div class="clearfix xemtheodiv" style="width: 100%;">
            <span class="xemtheo">
            Bạn đang xem
            </span>
            <!-- Ordering   -->
            <select id="sortproduct"
                    class="neworderby"
                <?php
                /*

                if(!ismobile())
                {
                    ?>
                    class="orderby"
                <?
                }
                ?>
                    style="<?php if (ismobile()) {?>

                        margin-top: 20px;padding:10px 12px;
                    <? }else   {?>
                        margin-top: 0px;
                    <? }?>
                        "
                */ ?>

                    onchange="changeSort();">
                <option value="1" <? echoSelectID(1, $typesort); ?>>Mới nhât</option>
                <option value="2" <? echoSelectID(2, $typesort); ?>>Xem nhiều nhất</option>
                <option value="3" <? echoSelectID(3, $typesort); ?>>Giá từ Thấp đến Cao</option>
                <option value="4" <? echoSelectID(4, $typesort); ?>>Giá từ Cao đến Thấp</option>
            </select>
        </div>
    <? } ?>
    <? $relateProducts = $products; ?>
    <!-- Products Mobile-->
    
        <div class="">
            <div class="clearfix"></div>
            <div class="product-list  with-rating">
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
						<div class="col-xs-6 col-sm-4 col-md-3 productListItem detail__wrapper">
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
                    <? } ?>
                <? } //  if (isset($relateProducts[0])){ ?>
            </div>
        </div>


        <div class="clearfix"></div>
		
		<?php 
		include "widget_html/productlist_content_page.php";
		?>
		
		
		<?php /*
        <!-- Pagination -->
        <div class="pagination-container" style="margin-bottom:0px !important; ">
            <nav class="pagination">
                <ul>
                    <?= $plpage ?>
                </ul>
            </nav>
			<?php 
			if (!empty($plpage)) {
				
				//$my_url = "/".$cat1key."/";
				$queryArr = getQueryArray();
				$searchTerm = "";
				if (!empty($queryArr)) {
					foreach ($queryArr as $key => $value) {
						if (!empty($key) && ($key != 'page') ){
							$searchTerm .= '&' . $key . '=' . $value;
						}
					}
				}
				$my_url = "?" . $searchTerm. "&viewall=1";
				
			?>
				<a href="/<?php echo $currentCat['unique_key_vn']; ?>/<?php echo $my_url; ?>">Xem TẤT CẢ</a>
			<?php
			} // if (!empty($plpage)) {
			?>
        </div>
        <div class="clear20" style="height: 20px"></div>
		*/ ?>


    <!-- Products PC-->
   
    </div>



</div>

