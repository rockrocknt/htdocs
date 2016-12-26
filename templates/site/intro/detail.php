<?php
global $FullUrl, $prefix_url, $cat, $lg, $product, $title_bar;
$currentcat = currentCat();
?>
<nav class="breadcrumb__wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a class="pathway" href="/">Trang chủ</a></li>
                <li class="active"><?php  echo $cat->getName(); ?></li>	
            </ul>
        </div>
</nav>
	  
<section class="main-body">
<div class="container">
<div class="row">
	<div class="col-sm-12 col-md-8">
				  <article itemtype="http://schema.org/Article" itemscope="" class="item item-page">
					<meta content="en-GB" itemprop="inLanguage">
					<div itemprop="articleBody">
					  <?php  echo $cat->getContent(); ?>
					</div>							
				  </article>
	</div>
	<div class="col-sm-12 col-md-4">
		<?php 
		$imgList = ImagesGroup::getimgbycid(25);
		if (!empty($imgList[0])) {
			echo $imgList[0]['text2_vn'];
		}
		?>
	</div>

</div>
</div>
</section>