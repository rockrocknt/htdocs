<?php
$cid         = 2;
$limit       = 3;
global $getimgbycid;
$getimgbycid = ImagesGroup::getimgbycid ($cid, $limit);
?>

<section class="section-home-products">
   <div class="container">
      <div class="controls-holder nav-tabs">
         <ul class="inline">
            <li class="active"><a data-toggle="tab" href="#hot-products">Sản phẩm mới</a></li>
            <li><a data-toggle="tab" href="#new-products">Đang hot</a></li>
            <li><a data-toggle="tab" href="#best-sellers">Bán chạy</a></li>
         </ul>
      </div>
      <div class="tab-content">
          <?php if (!empty ($getimgbycid)): ?>
              <?php foreach ($getimgbycid as $key => $imgbycid): ?>
                  <?php

                  $active = "";
                  if ($key == 0)
                  {
                      $active = "active";
                      $div_id = "hot-products";
                  }
                  else if ($key == 1)
                      $div_id          = "new-products";
                  else if ($key == 2)
                      $div_id          = "best-sellers";
                  ?>
                 <!--Start hot-products, new-products, best-sellers-->
                 <div id="<?= $div_id ?>" class="products-holder <?= $active; ?> tab-pane ">
                     <?php
                     global $product_lists;
                     $product_id_list = $imgbycid['url_vn'];
                     $product_lists   = products::getByProductIDList ($product_id_list);

                     $row             = ceil (count ($product_lists) / 4);
                     $k               = 0;
                     $limit           = 1;
                     ?>
                     <?php if (!empty ($product_lists)): ?>
                         <?php for ($i = 0; $i < $row; $i++): ?>

                            <div class="row-fluid">
                                <?php for ($j = $k; $j < count ($product_lists); $j++):
                                    $productObj = new products($product_lists[$j]);
                                    ?>
                                   <div class="span3">
                                      <?php include "widget_html/product_list_item.php"; ?>
                                   </div> 
                                   <?php
                                   if ($limit >= 4)
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
                 <!--End hot-products, new-products, best-sellers-->
             <?php endforeach; ?>
         <?php endif; ?>
      </div>
   </div>
</section>