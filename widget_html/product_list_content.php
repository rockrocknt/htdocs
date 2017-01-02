<?php
global $showsort, $FullUrl,$plpage;
global $listProduct, $products;

$currentcat = currentCat();
$uniqe = $currentcat['unique_key_vn'];

$typesort = getquery('typesort');
if ($typesort == "") $typesort = 4;
?>
<div class="span9">
   <div class="products-list-head">
       <h1><?=$currentcat['name_vn']?></h1>
       <div class="tag-line">
           <?=$currentcat['short_vn']?>
       </div>

   </div>
   <?php $product_lists = $listProduct; ?>
   <div id="list-view" class="products-list products-holder  tab-pane">
<?php for ($j = 0; $j < count ($product_lists); $j++):
    $productObj = new products($product_lists[$j]);
    ?>
      <div class="list-item">
             <?php include "widget_html/product_list_item_listview.php"; ?>
      </div>
<?php endfor; ?>
   </div>
   <?php  ?>


   <div id="grid-view" class="products-grid products-holder active tab-pane">
       <?php

       $row             = ceil (count ($product_lists) / 3);
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
              if ($limit >= 3)
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
   </div>
   <div class="pagination-container">

       <nav class="pagination">
           <?php
           // plpage_seo_sort in functions.php
           echo $plpage;
           ?>
       </nav>
   </div>
</div>
<?php
return;
global $showsort, $FullUrl,$plpage;
global $listProduct, $products;

$currentcat = currentCat();
$uniqe = $currentcat['unique_key_vn'];

$typesort = getquery('typesort');
if ($typesort == "") $typesort = 4;
?>
<div class="span9">
    <div class="products-list-descriptin">
        <h1><?=$currentcat['name_vn']?></h1>
        <div class="tag-line">

            <?=$currentcat['short_vn']?>
        </div>
        <div class="image-holder">
            <img alt="" src="/images/woman.JPG" />
        </div>
    </div>

    <div id="list-view" class="products-list products-holder  tab-pane">
        <?php
        $relateProducts = $products;

        ?>
        <?php
        if (isset($relateProducts[0])) {
            foreach ($relateProducts as $key => $obj) {
                ?>
                <div class="list-item">
                    <div class="row-fluid">
                        <div class="span4">
                            <div class="thumb">
                                <img alt="" src="/images/p1.jpg" />
                            </div>
                        </div>
                        <div class="span8">
                            <h1>versace</h1>
                            <div class="tag-line">
                                yellow diamond toilet water spray
                            </div>
                            <div class="desc">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam sed lorem dapibus, mollis lorem a, venenatis risus. In felis dui, gravida vel tincidunt vel, venenatis sed orci.
                            </div>
                            <div class="price">
                                <span>$112.00</span>
                                <span class="old">$220.00</span>
                            </div>
                            <div class="buttons-holder">
                                <a class="cusmo-btn add-button" href="#">add to cart</a>
                                <a class="cusmo-btn gray add-button" href="products-page.html">details</a>
                                <a class="add-to-wishlist-btn" href="#"><i class="icon-plus"></i> Add to wishlist</a>
                            </div>
                        </div>
                    </div>

                </div>
            <?php
            } // foreach ($relateProducts as $key => $obj) {
        } ?>
    </div>


<?php return; ?>