<?php
global $FullUrl, $prefix_url, $cat, $lg, $product, $title_bar;
$currentcat = currentCat();
?>
<?php
$temp = new Categories($currentcat);
$listChild = $temp->getChilds();
?>

<section class="page-title">
		<div class="container">	  
	      <div class="row">
		    <div class="col-sm-12 col-md-12 title">
			  <h2><?php  echo $currentcat['h1_vn']; ?></h2>
              <ol class="breadcrumb">
                 
				<li><a class="pathway" href="/">Trang chủ</a></li>                
				<li class="active"><?php  echo $cat->getName(); ?></li>				  
		      </ol>
			</div>
		  </div>
		</div>
</section>

<section class="main-body">
<div class="container">
<div class="row">
	<div class="col-sm-12 col-md-12">
			<?php
        for ($i = 0; $i < count($listChild); $i++) {
        if (isset($listChild[$i])) {
        $item = $listChild[$i];
        $temp2 = new Categories($item);
        $link = $temp2->getLink();
		$name = $temp2->getName();
		$img = "/". $temp2->img;
        ?>
		<div class="col-sm-3 col-md-3">
			   <div class="thumbnail"><a class="product-image" 
			   href="<?=$link?>" title="<?=$name?>">
					<img src="<?=$img?>" alt="<?=$name?>" height="270" width="270"></a></div>
			   <div class="product-info">
				  <h3 class="product-name"><a href="<?=$link?>" title="<?=$name?>"><?=$name?></a></h3>
				  
				  
			   </div>
			</div>
		<?php
			}
		}
		?>
	
				
			
			
	</div>
</div>
</div>
</section>

<?php
return;  
global $FullUrl, $prefix_url, $cat, $lg, $product, $title_bar;
$currentcat = currentCat();
?>

    <!-- Titlebar
    ================================================== -->
    <section class="titlebar">
        <div class="container">
            <div class="sixteen columns">
                <h2><?php
                    echo $cat->getName();
                    ?></h2>

                <nav id="breadcrumbs">

                    <?= $title_bar ? $title_bar : navigationBar() ?>


                </nav>
            </div>
        </div>
    </section>


    <!-- Content
    ================================================== -->

    <!-- Container -->
    <div class="container">
        <div class="twelve columns">
            <div class="extra-padding">

                <!-- Post -->
                <article class="post single">
                    <?php
                    echo $cat->getContent();
                    ?>
                </article>
            </div>
        </div>
        <?php include "widget_html/gioithieu_sidebar.php"; ?>


    </div>
    <!-- Container / End -->

<?php return; ?>