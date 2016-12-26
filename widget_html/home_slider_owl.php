<div class="uk-slidenav-position" data-uk-slideshow>
    <ul class="uk-slideshow">
	
	<?php
                global $db,$FullUrl,$lg;
                $currentcat = currentCat();
                //$imagesList= ImagesGroup::getimgbycid(1,0);
                $imagesList= ImagesGroup::getImagesByCid($currentcat['id'],1);
                ?>

                <?

                for ($i = 0; $i < count($imagesList); $i++) {
                    if (isset($imagesList[$i])) {
                        $item = $imagesList[$i];

                        $transition = "fade";
                        if ($item['transitiontype'] == 2) $transition = "zoomout";
                        if ($item['transitiontype'] == 3) $transition = "fadetotopfadefrombottom";
                        $img = $FullUrl."/".$item['img_'.$lg];
                        $datax = 145;
                        if ($item['textalign'] == 2) $datax = 750;
                        $link = ImagesGroup::getLink($item['url_vn']);


                        ?>
                        <!-- Slide home owl  -->
                        <li>
                            <?php /*
                            <a href="<?=$link?>">
                            <img src="<?=$img?>"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            </a>
                             */ ?>
                            <a href="<?=$link?>">

                            <img src="<?=$img?>"

                                 alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            </a>

                        </li>
                    <?
                    }
                }
                ?>
             
                                
    </ul>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-previous" data-uk-slideshow-item="previous"></a>
    <a href="" class="uk-slidenav uk-slidenav-contrast uk-slidenav-next" data-uk-slideshow-item="next"></a>
    <ul class="uk-dotnav uk-dotnav-contrast uk-position-bottom uk-flex-center">
        <li data-uk-slideshow-item="0"><a href=""></a></li>
        <li data-uk-slideshow-item="1"><a href=""></a></li>
    </ul>
</div>
<?php return; ?>
<div class="container fullwidth-element " style="">

    <div class="tp-banner-container">
        <div id="owl-slider">
                <?php
                global $db,$FullUrl,$lg;
                $currentcat = currentCat();
                //$imagesList= ImagesGroup::getimgbycid(1,0);
                $imagesList= ImagesGroup::getImagesByCid($currentcat['id'],1);
                ?>

                <?

                for ($i = 0; $i < count($imagesList); $i++) {
                    if (isset($imagesList[$i])) {
                        $item = $imagesList[$i];

                        $transition = "fade";
                        if ($item['transitiontype'] == 2) $transition = "zoomout";
                        if ($item['transitiontype'] == 3) $transition = "fadetotopfadefrombottom";
                        $img = $FullUrl."/".$item['img_'.$lg];
                        $datax = 145;
                        if ($item['textalign'] == 2) $datax = 750;
                        $link = ImagesGroup::getLink($item['url_vn']);


                        ?>
                        <!-- Slide home owl  -->
                        <div class="item">
                            <?php /*
                            <a href="<?=$link?>">
                            <img src="<?=$img?>"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            </a>
                             */ ?>
                            <a href="<?=$link?>">

                            <img src="<?=$img?>"

                                 alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            </a>

                        </div>
                    <?
                    }
                }
                ?>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){


        $("#owl-slider").owlCarousel({
            autoPlay: 6000,
            items : 1,
            singleItem:true,
            itemsDesktop : [960,1],
            navigation : false
        });

        // ------------------ End Document ------------------ //
    });
</script>