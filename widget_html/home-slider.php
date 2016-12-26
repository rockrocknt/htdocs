<section id="home" class="home-slider">
   <div class="container">
      <div class="flexslider">
         <ul class="slides">
             <?php
             $listMenu = ImagesGroup::getimgbycid (1);
             foreach ($listMenu as $img)
             {
                 $imgName = $img['img_vn'];
                 $name    = $img['name_vn'];
                 $url_vn  = $img['url_vn'];
                 ?>
                <li class="slide">
                   <a href="/<?php echo $url_vn; ?>">
                      <img alt="<?php echo $name; ?>" src="/<?php echo $imgName; ?>" />
                   </a> 
                    <!--  <div class="flex-caption">
                      <h1>embrace</h1>
                      <div class="medium">
                         <span>to the new season</span>
                      </div>
                      <div class="small">
                         <span>very short one or two sentences</span>
                      </div>
                      <div class="small yellow">
                         <span>portable.beauty.personal</span>
                      </div>
                      <div >
                         <span><a class="cusmo-btn" href="/<?php echo $url_vn; ?>">see details</a></span>
                      </div>
                   </div>-->
                </li>
                <?php
                // break;
            }
            ?>
         </ul>
      </div>
   </div>
</section>