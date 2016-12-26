<?php
	global $FullUrl, $lg, $articles, $plpage;
$cur = currentCat();
$currentcat = currentCat();
$cat = new Categories($cur);
?>
<?php /*
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
*/ ?>
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
		    <div class="col-sm-9 col-xs-12">
              <div class="blog" itemscope="" itemtype="http://schema.org/Blog">
				<?php if ($articles) { ?>

            <?php
            $count=0;
            foreach ($articles as $obj) {
                $count++;
                $article = new articles($obj);
                $name = $article->getName();
                $link = $article->getLink();                
                ?>
				
				
				<div class="items-row row-0 row clearfix">
				  <div class="col-sm-12">
					
				    <article class="item column-1" itemprop="blogPost" itemscope="" itemtype="http://schema.org/BlogPosting">
					<div class="col-sm-12">
						<div class="entry-header has-post-format">							
							<span class="post-format"><i class="uk-icon-comment-o"></i></span>
							 <h2 itemprop="name">
								<a href="<?=$link?>" itemprop="url">
									<?=$name?>
								</a>
							</h2>		
						</div>
					</div>
						<div class="col-sm-12 articleShort" style="margin-top:10px;">
						
							<div class="col-sm-4" style="padding-left:0px;">
							<img 
							
							src="/<?php echo $article->img;?>"/>
							</div>
							<div class="col-sm-8">
								<div class="inf">
                                    <span class="tme"><?php echo $article->getDate(); ?></span>
                                    <span> / </span>
                                    <span><?php echo $article->getView(); ?> lượt xem</span>
                                </div>
								<div class="articleShort"> <?php echo $article->getShort(); ?> </div>
								<p class="readmore">
                                    <a href="<?php echo $link; ?>" itemprop="url">
                                        Xem tiếp <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                                    </a>
                                </p>
							</div>
						</div>
						<?php /*
						<div class="col-sm-12">
						<br/>
							<p class="readmore">
							<a class="btn btn-default" href="<?=$link?>" itemprop="url">
							  Xem tiếp ...	
							</a>
							</p>
						</div>
						*/ ?>
							
					</article>
					
				  </div>
				</div>
				
			<?php
			}
			}
			?>
			   
			  </div>
			  </div>
			  
			  <div class="col-sm-3 col-xs-12">
				<?php include "widget_html/articleList_hotProducts.php"; ?>
			</div>
			  
			  
			</div>
</div>			
			  
</section>

<?php
return;
	global $FullUrl, $lg, $articles, $plpage;
$cur = currentCat();
$currentcat = currentCat();
?>

<!-- Titlebar
================================================== -->
<section class="titlebar">
    <div class="container">
        <div class="sixteen columns">


            <nav id="breadcrumbs">
                <?= $title_bar ? $title_bar : navigationBar() ?>
            </nav>

            <div class="clearfix"></div>
            <div class="seotitle" style="padding-left: 0px;">
                <h1><?=$currentcat['name_vn']?></h1>
                <?=$currentcat['short_vn']?>
            </div>
        </div>
    </div>
</section>

<!-- Content
================================================== -->

<!-- Container -->
<div class="container">

<div class="twelve columns">

    <!-- Masonry Wrapper-->
    <div id="masonry-wrapper">
        <?php if ($articles) { ?>

            <?php
            $count=0;
            foreach ($articles as $obj) {
                $count++;
                $article = new articles($obj);
                $name = $article->getName();
                $link = $article->getLink();
                $size = fixSize($article->getImageNoThumb(), 88, 78);
                $h = number_format((78-$size["height"])/2);
                // include(TPL_DIR.'articles/item.php');
                ?>
                <!-- Post #1 -->
                <div class="one-third column masonry-item">
                    <article class="from-the-blog">
                        <?php

                        //if ($obj['idarticle'] < 2300)
                         //   $obj['img'] = str_replace("/images","images",$obj['img']);
                        $showimage = file_exists($obj['img']);
                        $img = $FullUrl."/".$obj['img'];
                        if (strpos($obj['img'],'http') !== false) {
                            $showimage=true;
                            $img = $obj['img'];
                        }
                        $img = "/".$obj['img'];
                        $img= str_replace("//","/",$img);

                     //   if (($showimage)|| ($obj['idarticle'] > 2300))
                        {

                            ?>
                            <figure class="from-the-blog-image">
                                <a href="<?=$link?>">
                                    <img src="<? echo $img  ?>"/>
                                        <div class="hover-icon"></div>
                            </figure>
                        <?php } ?>

                        <section class="from-the-blog-content">
                            <a href="<?=$link?>"><h5><?=$name?></h5></a>

                            <span><?// echo strip_tags($article->getShort());
                                if ($obj['idarticle'] > 0)
                                {
                                    //echo html_entity_decode($obj["short_$lg"]);
                                    echo strip_tags(html_entity_decode($obj["short_$lg"]));
                                }else
                                    echo strip_tags($article->getShort());
                                ?></span>
                            <a href="<?=$link?>" class="button gray"><?= SITE_DETAIL ?></a>
                        </section>

                    </article>
                </div>

            <?
            } ?>

        <?php } else echo SITE_NO_NEWS; ?>




    </div>

    <!-- Pagination -->
    <div class="pagination-container masonry">
        <nav class="pagination">
            <ul>

                <?=$plpage?>
            </ul>
        </nav>


    </div>

</div>
    <div class="four columns" id="imageWrapper">
        <?php include "templates/site/articles/articles_list_sidebar.php"; ?>
    </div>
</div>
<!-- Container / End -->

