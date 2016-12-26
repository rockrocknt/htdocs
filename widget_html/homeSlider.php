  <!-- Slider -->
	  <section id="ukSlider" class="uk-slider-section">
        <div class="container-fluid">
	      <div class="row">                        
            <div class="col-md-12 padding-0">		
              <div class="uk-slidenav-position" data-uk-slideshow="{animation: 'swipe', autoplay:true}">
                <ul class="uk-slideshow uk-overlay-active">

				  <?php
                global $db,$FullUrl,$lg;
                $currentcat = currentCat();
                //$imagesList= ImagesGroup::getimgbycid(1,0);
                $imagesList= ImagesGroup::getImagesByCid($currentcat['id'],1);
                ?>

                <?php

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
                         <li aria-hidden="false" class="uk-active" style="animation-duration: 500ms; width: 100%; height: auto;">
                            <?php /*
                            <a href="<?=$link?>">
                            <img src="<?=$img?>"  alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            </a>
                             */ ?>
                            <a href="<?=$link?>">

                            <img src="<?=$img?>"
								width="1920" height="700"
                                 alt="slidebg1"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
                            </a>

                        </li>
                    <?
                    }
                }
                ?>	
			   
                </ul>
                <a data-uk-slideshow-item="previous" class="uk-slidenav  uk-slidenav-previous uk-hidden-touch" href="#"></a>
                <a data-uk-slideshow-item="next" class="uk-slidenav  uk-slidenav-next uk-hidden-touch" href="#"></a>				
              </div>
		    </div>
		  </div>
	    </div>
	  </section>
	  <!-- /Slider -->