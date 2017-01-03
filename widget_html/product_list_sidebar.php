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
      <?php
        global $do, $tpl; ?>
       <?php if (($do == 'products') && ($tpl == 'list')) : ?>
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
                        <li><a href="#">Mới nhất</a></li>
                        <li><a href="#">Giá từ thấp đến cao</a></li>
                        <li><a href="#">Giá từ cao đến thấp</a></li>
                        <li><a href="#">Xem nhiều nhất</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
       <?php endif; ?>

   </div>
</div>