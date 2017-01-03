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
          <?php require_once "widget_html/productDetail_images.php"; ?>
         </div>
      </div>
      <div class="product-tabs">
         <div class="controls-holder nav-tabs">
            <ul class="inline">
               <li class="active"><a data-toggle="tab" href="#description">Description</a></li>
               <li><a data-toggle="tab" href="#how-to-use">How to use</a></li>
               <li><a data-toggle="tab" href="#reviews">Reviews (2)</a></li>
            </ul>
         </div>

         <div class="tab-content">
            <div id="description" class=" active tab-pane ">
               <p>
                  Pellentesque eleifend quam venenatis convallis consequat. Sed iaculis tortor eu ipsum fermentum, at commodo risus suscipit. Proin id sapien consectetur, sollicitudin elit vel, consectetur risus. Integer vitae dictum mi, a consectetur eros. Aenean sagittis arcu in eros malesuada pretium. Proin at arcu in mauris cursus consectetur at ac urna. Nulla vel ullamcorper tellus, non semper turpis. Vestibulum eget tortor posuere, porta odio non, volutpat massa. Morbi ut odio rutrum, lobortis mi nec, condimentum dolor.
               </p>
               <p>
                  Praesent pretium velit eu nulla mollis elementum. Quisque est leo, pellentesque a porttitor et, laoreet scelerisque massa. Nulla semper tristique mi in sagittis. In sit amet auctor mauris. Proin egestas interdum placerat. Aenean quis neque metus. Mauris egestas, dolor eu pulvinar laoreet, nulla magna sollicitudin lorem, ac scelerisque purus justo sit amet odio. Aliquam a metus semper, dictum dui et, vulputate velit. Nulla volutpat porta nisl, in pretium velit varius nec. Maecenas at hendrerit erat. Vestibulum auctor at leo id aliquam.
               </p>
            </div>

            <div id="how-to-use" class=" tab-pane ">
               <p>
                  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi lacinia fermentum diam fringilla interdum. Morbi non ipsum nunc. Proin congue nisi vitae sapien facilisis, ac semper tellus tincidunt. Proin tristique sapien id nunc suscipit venenatis vitae non magna. Nulla tempor pretium nunc in suscipit. Vivamus adipiscing imperdiet mi, non pharetra velit malesuada et. Proin ultrices est diam, eu aliquam tellus ullamcorper at. Fusce volutpat vestibulum mauris in scelerisque. Phasellus egestas quam et pellentesque convallis. Praesent mollis orci a tortor ornare, ac tincidunt urna rhoncus. Mauris hendrerit at enim in laoreet. Vivamus ornare, leo eget varius laoreet, leo mauris interdum turpis, sed dapibus dolor tortor a erat. Vivamus congue erat est, vel mollis nisi vestibulum id. Duis sapien sem, condimentum vel adipiscing porta, imperdiet at turpis.
               </p>
               <ul>
                  <li>Pellentesque eleifend quam</li>
                  <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit</li>
                  <li>Quisque est leo, pellentesque a porttitor</li>
                  <li>Morbi lacinia fermentum diam fringilla</li>
               </ul>
            </div>

            <div id="reviews" class=" tab-pane ">
               <textarea placeholder="Your review here" class="span12" id="write-review-text"></textarea>

               <div class="review-info">
                  <div class="remaining-chars">
                     <span id="counter">210</span> characters left
                  </div>

                  <div class="star-holder">
                     <strong>Rating</strong>
                     <div class="star" data-score="3"></div>

                     <button type="submit" class="cusmo-btn">add review</button>
                  </div>
               </div>
               <hr>

               <div class="recent-reviews">
                  <div class="review-item">
                     <div class="row-fluid">
                        <div class="span2">
                           <div class="thumb">
                              <img alt="avatar" src="images/default-avatar.png" />
                           </div>
                        </div>
                        <div class="span10">
                           <div class="body">
                              <h4>Angela</h4>
                              <span class="date">10.08.2013</span>
                              <p>
                                 Pellentesque eleifend quam venenatis convallis consequat. Sed iaculis tortor eu ipsum fermentum, at commodo risus suscipit.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>

                  <div class="review-item">
                     <div class="row-fluid">
                        <div class="span2">
                           <div class="thumb">
                              <img alt="avatar" src="images/default-avatar.png" />
                           </div>
                        </div>
                        <div class="span10">
                           <div class="body">
                              <h4>Kate</h4>
                              <span class="date">02.03.2013</span>
                              <p>
                                 Pellentesque eleifend quam venenatis convallis consequat. Sed iaculis tortor eu ipsum fermentum, at commodo risus suscipit.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>

                  <hr>
               </div>

            </div>

         </div>
      </div>

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