<div class="span3">
   <div class="sidebar">
      <div class="accordion-widget category-accordions">

         <div class="accordion" >
            <div class="accordion-group">
               <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse"  href="#collapseOne">
                     Danh mục sản phẩm
                  </a>
               </div>
               <div id="collapseOne" class="accordion-body collapse ">
                  <div class="accordion-inner">
                     <ul>
                        <?php
                        $listDanhMuc = ImagesGroup::get_img_by_cid(6,100);
                        foreach($listDanhMuc as $item) {
                            $name = $item['name_vn'];
                            $link = $item['url_vn'];
                            if ($item['category_id'] > 0) {
                                $catObj = new Categories(Categories::getCatByID($item['category_id']));
                                $link = $catObj->getLink();
                            }
                        ?>
                            <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
                        <?php
                        }
                        ?>
                     </ul>
                  </div>
               </div>
            </div>

            <div class="accordion-group">
               <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse"  href="#collapseTwo">
                     Thương hiệu
                  </a>
               </div>
               <div id="collapseTwo" class="accordion-body collapse ">
                  <div class="accordion-inner">
                     <ul>
                         <?php
                         $listDanhMuc = ImagesGroup::get_img_by_cid(10,100);
                         foreach($listDanhMuc as $item) {
                             $name = $item['name_vn'];
                             $link = $item['url_vn'];
                             if ($item['category_id'] > 0) {
                                 $catObj = new Categories(Categories::getCatByID($item['category_id']));
                                 $link = $catObj->getLink();
                             }
                             ?>
                             <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
                         <?php
                         }
                         ?>
                     </ul>
                  </div>
               </div>
            </div>
         </div>


      </div> 

      <hr>

      <div class="accordion-widget filter-accordions">

         <div class="accordion" >
            <div class="accordion-group">
               <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse"  href="#collapse11">
                     Sắp xếp theo
                  </a>
               </div>
               <div id="collapse11" class="accordion-body collapse in">
                  <div class="accordion-inner">

                     <ul>
                        <li><a href="#">popoular</a></li>
                        <li><a href="#">lowest price</a></li>
                        <li><a href="#">largest price</a></li>
                        <li><a href="#">A-Z</a></li>
                        <li><a href="#">Z-A</a></li>
                     </ul>
                  </div>
               </div>
            </div>

            <div class="accordion-group">
               <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse"  href="#collapse12">
                     capacity
                  </a>
               </div>
               <div id="collapse12" class="accordion-body collapse in">
                  <div class="accordion-inner">

                     <ul>
                        <li><a href="#">30 ml</a></li>
                        <li><a href="#">40 ml</a></li>
                        <li><a href="#">60 ml</a></li>
                        <li><a href="#">150 ml</a></li>
                        <li><a href="#">200 ml</a></li>
                     </ul>
                  </div>
               </div>
            </div>


            <div class="accordion-group">
               <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse"  href="#collapse13">
                     price from-to
                  </a>
               </div>
               <div id="collapse13" class="accordion-body collapse in price-range">
                  <div class="accordion-inner price-range-holder">

                     <input type="text" class="price-slider span12" value="" >
                     <div class="min-value">
                        $100
                     </div>
                     <div class="max-value">
                        $700
                     </div>
                  </div>
               </div>
            </div>



         </div>


      </div> 
   </div>
</div>