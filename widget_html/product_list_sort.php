
      <?php
        global $do, $tpl;
      $currentCat = currentCat();
      $typesort = getquery('typesort');
      ?>
      <input type="hidden" id="currentUrl" value="/<?php echo $currentCat['unique_key_vn']; ?>/" >
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
                        <li>
                            <a class="<?php echoSelectActive(1, $typesort, 'active'); ?>"
                               href="/<?php echo $currentCat['unique_key_vn']; ?>/?typesort=1">Mới nhất</a>
                        </li>
                        <li><a
                                class="<?php echoSelectActive(3, $typesort, 'active'); ?>"
                                href="/<?php echo $currentCat['unique_key_vn']; ?>/?typesort=3"
                                >Giá từ thấp đến cao</a></li>
                        <li><a
                                class="<?php echoSelectActive(4, $typesort, 'active'); ?>"
                                href="/<?php echo $currentCat['unique_key_vn']; ?>/?typesort=4"
                                >Giá từ cao đến thấp</a></li>
                        <li><a
                                class="<?php echoSelectActive(2, $typesort, 'active'); ?>"
                                href="/<?php echo $currentCat['unique_key_vn']; ?>/?typesort=2"
                                >Xem nhiều nhất</a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
       <?php endif; ?>

