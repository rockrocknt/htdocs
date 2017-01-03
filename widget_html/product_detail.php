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
         <div class="middle-header">you will also like</div>
      </div>
      <div class="products-holder related-products">
         <div class="row-fluid">
            <div class="span4">
               <div class="product-item">

                  <img alt="" src="images/p1.jpg" />
                  <h1>versace</h1>
                  <div class="tag-line">
                     <span>yellow diamond</span>
                     <span>toilet water spray</span>
                  </div>
                  <div class="price">
                     $270.00
                  </div>
                  <a class="cusmo-btn add-button" href="#">add to cart</a>

               </div>
            </div>
            <div class="span4">
               <div class="product-item">
                  <img alt="" src="images/p2.jpg" />
                  <h1>estee lauder</h1>
                  <div class="tag-line">
                     <span>yellow diamond</span>
                     <span>toilet water spray</span>
                  </div>
                  <div class="price">
                     $122.00
                  </div>
                  <a class="cusmo-btn add-button" href="#">add to cart</a>
               </div>
            </div>
            <div class="span4">
               <div class="product-item">
                  <img alt="" src="images/p3.jpg" />
                  <h1>burberry</h1>
                  <div class="tag-line">
                     <span>yellow diamond</span>
                     <span>toilet water spray</span>
                  </div>
                  <div class="price">
                     $120.00
                  </div>
                  <a class="cusmo-btn add-button" href="#">add to cart</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>