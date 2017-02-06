<?php
global $lg, $FullUrl, $article;

$showcomment    = Info::getInfoField ('showcomment');
$relateArticles = $article->getRelate ();
$currentcat     = Categories::getCatByID ($article->getCID ());

$tags = $article->getTag ();
$cur  = $currentcat;

$cat = new Categories ($cur);
?>

<section class="section-two-columns">
   <div class="container">
      <div class="row-fluid">
         <!--Start left sidebar-->
         <?php include "widget_html/product_list_sidebar.php"; ?>
         <!--End left sidebar-->

         <!--Start content detail-->
         <div class="span9 ">
            <div class="page-content">
               <div class="postDetail">
                  <h1><?php echo $article->getName (); ?></h1>
                  <div class="tag-line">
                      <?php echo $article->getShort (); ?>
                  </div>
               </div>
               <div class="col-sm-12 art-statistic">
               <?php /*   <p>Ngày đăng: <?php echo $article->getDate (); ?></p>

 */?>
                  <p>Lượt xem:  <?php echo $article->getView (); ?></p>
               </div>

               <div class="col-sm-12 blogPost">
                   <?php echo str_replace ("Arial", "", $article->getContent ()); ?>
               </div>
               <!--Start bai viet lien quan -->
               <?php include "widget_html/articleDetail_relatedArticles.php"; ?>
               <!--End bai viet lien quan -->
               <!--Start san pham hot -->
               <div class="col-sm-3 col-xs-12">
                  <?php // include "widget_html/articleList_hotProducts.php"; ?>
               </div>
               <!--End san pham hot -->
            </div>
         </div>
         <!--End content detail -->
      </div>
   </div>
</section>

