<?php
	global $lg, $FullUrl; 
	$sliderImg = getImagesFromGroup('HomeSlider');
?>
<div class="slider-wrapper theme-default">
    <div class="ribbon"></div>
    <div id="slider" class="nivoSlider">
	<?php if ($sliderImg) { ?>
    	<?php foreach ($sliderImg as $slider) { 
			$name = $slider["name_$lg"];
			$img = getTimThumb($slider["img"], 960, 350);
		?>
        <a href="<?=$slider['url']?>" target="_blank" title="<?=$name?>"> <img src="<?=$img?>" title="<?=$name?>" alt="<?=$name?>" /> </a>
        <?php } ?>
	<?php } else { ?>
        <a href="#" target="_blank" title=""> <img src="/images/site/default-slider.jpg" alt="slider" title="slider" /> </a>
    <?php } ?>
    </div>
</div>