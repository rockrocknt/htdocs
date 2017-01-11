<?php
global $FullUrl, $lg, $articles, $plpage;
$cur        = currentCat ();
$currentcat = currentCat ();
$cat        = new Categories ($cur);
?>
<section class="section-two-columns">
   <div class="container">
      <div class="row-fluid">
          <?php include "widget_html/product_list_sidebar.php"; ?>
         <div class="span9">

            <div id="list-view" class="products-list products-holder active tab-pane">
               <!-- Start Articles -->
               <?php
               if ($articles)
               {
                   ?>
                   <?php
                   $count = 0;
                   foreach ($articles as $obj)
                   {
                       $count++;
                       $article = new articles ($obj);
                       $name    = $article->getName ();
                       $link    = $article->getLink ();
                       ?>
                       <div class="list-item">
                          <div class="row-fluid">
                             <div class="span4">
                                <div class="thumb">
                                   <a href="<?= $link ?>">
                                      <img alt="" src="<?php echo DOMAINIMAGE; ?>/<?php echo $article->img; ?>" />
                                   </a>
                                </div>
                             </div>
                             <div class="span8">
                                <h1> <a href="<?= $link ?>"> <?= $name ?> </a></h1>
                                <div class="inf">
                                   <span class="tme"><?php echo $article->getDate (); ?></span>
                                   <span>/</span>
                                   <span>Lượt xem : <?php echo $article->getView (); ?> </span>
                                </div>
                                <div class="articleShort">
                                    <?php echo $article->getShort (); ?>
                                </div>
                                <p class="readmore">
                                   <a href="<?php echo $link; ?>">Xem tiếp</a>
                                </p> 
                             </div>
                          </div>
                       </div>
                       <?php
                   }
               }
               ?>
               <!-- End Articles -->
                <div class="clear">&nbsp;</div>
               <!-- Start Pagination -->
               <div class="pagination-container masonry">
                  <nav class="pagination">
                     <ul>
                         <?= $plpage ?>
                     </ul>
                  </nav>
               </div>
               <!-- End Pagination -->
               
            </div>
         </div>
      </div>
   </div>
</section>

