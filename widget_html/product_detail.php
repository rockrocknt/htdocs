<div class="span9 ">
   <div class="page-content">
      <div class="products-page-head">
         <h1><?php echo $product->getName(); ?></h1>
         <div class="tag-line">
            &nbsp;
         </div>
      </div>
      <div class="row-fluid">
         <div class="span7">
            <?php require_once "widget_html/productDetail_images.php"; ?>
         </div>
         <div class="span5">
          <?php require_once "widget_html/productDetail_info.php"; ?>
         </div>
      </div>
      <?php require_once "widget_html/productDetail_content.php"; ?>
      <div class="middle-header-holder">
         <div class="middle-header">Có thể bạn thích</div>
      </div>
      <div class="products-holder related-products">
         <?php require_once "widget_html/productDetail_relatedProducts.php"; ?>

      </div>
   </div>
</div>