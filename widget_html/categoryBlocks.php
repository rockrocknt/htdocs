<?php 

global $db;

?>
<section class="top-a">
    <div class="container">
        <div class="row">

<div class="module title3"><h3 class="module-title">Shop online</h3></div>

<div class="recipe">
    <div class="uk-grid uk-grid-divider big">
			<?php
			global $db,$FullUrl,$lg;
			//$imagesList= ImagesGroup::getimgbycid(5,0);
			$imagesList= ImagesGroup::getImagesByCid($currentcat['id'], 2);
			?>
			<?php
			for ($i = 0; $i < count($imagesList); $i++) {
				if ($i > 2) continue;
				
					if (isset($imagesList[$i])) {
					$item = $imagesList[$i];
					$name = $item['name_vn'];
					$img = $FullUrl."/".$item['img_'.$lg];
					$link = $item['url_vn'];
					$desc = $item['desc_vn'];
					?>
					
					<div class="uk-width-medium-1-3 detail__wrapper">
							   <div class="img__wrapper">
											<img class="pointer" onclick="redirect('<?php echo $link; ?>');" src="<?=$img?>"/>
											<a href="<?=$link?>" class="detail" title="Xem chi tiết">Xem chi tiết</a>
								</div>
								<h4><a href="<?=$link?>" class="link-1"><?=$name?></a></h4>
								<p><?php echo strip_tags($desc); ?></p>
					</div>
					
					<?php } // if (isset($imagesList[$i])) { ?>
			<?php } // for ($i = 0; $i < count($imagesList); $i++) { ?>
	</div>
</div>
</div>
    </div>
</section>