<?php
	global $lg, $FullUrl, $article; 

	$showcomment = Info::getInfoField('showcomment');
	$relateArticles = $article->getRelate();
    $currentcat =Categories::getCatByID($article->getCID());
	
	$tags = $article->getTag();
$cur = $currentcat;

$cat = new Categories($cur);
?>
<section class="page-title">
		<div class="container">	  
	      <div class="row">
		    <div class="col-sm-12 col-md-12 title">
			  <h2><?php  echo $currentcat['h1_vn']; ?></h2>
              <ol class="breadcrumb">
                 
				<li><a class="pathway" href="/">Trang chủ</a></li>                
				             
				<li class="active"><a class="pathway" href="/<?php echo $currentcat['unique_key_vn']; ?>/"><?php  echo $cat->getName(); ?></a></li>				  
		      </ol>
			</div>
		  </div>
		</div>
</section>

<section class="">
	<div class="container">
		  <div class="row">
			<div class="col-sm-9 col-xs-12">
              <div class="blog" itemscope="" itemtype="http://schema.org/Blog">
    			  <article class="item column-1" itemprop="blogPost" itemscope="" itemtype="http://schema.org/BlogPosting">
                        <div class="col-sm-12 titleArticle">
                            <h1><?php echo $article->getName(); ?></h1>
                        </div>
                        <div class="col-sm-12 articleShot">
                            <?php echo $article->getShort(); ?>
                        </div>
                        <div class="col-sm-12 art-statistic">
                            <p>Ngày đăng: <?php echo $article->getDate(); ?></p>
                            <p>Lượt xem:  <?php echo $article->getView(); ?></p>
                        </div>
                        <div class="col-sm-12 blogPost">
                            <?php echo str_replace("Arial", "",$article->getContent()); ?>
                        </div>
                    </article>
					<div class="socials_shared">
								<div class="gp_share" style="display: inline-block; vertical-align: top">
									<!-- Place this tag in your head or just before your close body tag. -->
									<script src="https://apis.google.com/js/platform.js" async defer></script>
									<!-- Place this tag where you want the +1 button to render. -->
									<div class="g-plusone" data-size='standard' data-annotation="inline" data-width="300"></div>
								</div>
								<div class="fb_share" style='overflow: hidden; vertical-align: top; height: 65px; display: inline-block; width: 100%;'>
									<div class="fb-like"   data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
								</div>
							</div>
			  </div>
			  <?php 
				include "widget_html/articleDetail_relatedArticles.php"; 
			  ?>
			  <?php /*
			  <div class="relatedPost">
					<div class="container-sub-div">
						<h3 class="title-h3">Tin liên quan</h3>
						<div class="ct-div-sub">
							<ul class="other-news">
										<li><a href="/hoa-hong-leo/cach-trong-va-cham-soc-hoa-hong-leo-thai.html" title="Cách trồng và chăm sóc hoa hồng leo Thái"> › Cách trồng và chăm sóc hoa hồng leo Thái</a></li>
									</ul>
						</div>
					</div>
			  </div>
			  */ ?>
			</div>
			<div class="col-sm-3 col-xs-12">
				<?php include "widget_html/articleList_hotProducts.php"; ?>
			</div>
			
		  </div>
    </div>
</section>