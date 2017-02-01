
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
               <div id="collapseOne" class="accordion-body collapse danhmucsidebar">
                  <div class="accordion-inner">
                     <ul>
                         <?php
                         $listDanhMuc = ImagesGroup::get_img_by_cid (6, 100);
                         foreach ($listDanhMuc as $item)
                         {
                             $name = $item['name_vn'];
                             $link = $item['url_vn'];
                             if ($item['category_id'] > 0)
                             {
                                 $catObj = new Categories (Categories::getCatByID ($item['category_id']));
                                 $link   = $catObj->getLink ();
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
                  <a class="accordion-toggle " data-toggle="collapse"  href="#collapseTwo">
                     Thương hiệu
                  </a>
               </div>
               <div id="collapseTwo" class="accordion-body collapse danhmucsidebar">
                  <div class="accordion-inner">
                     <ul>
                         <?php
                         $listDanhMuc = ImagesGroup::get_img_by_cid (10, 100);
                         foreach ($listDanhMuc as $item)
                         {
                             $name = $item['name_vn'];
                             $link = $item['url_vn'];
                             if ($item['category_id'] > 0)
                             {
                                 $catObj = new Categories (Categories::getCatByID ($item['category_id']));
                                 $link   = $catObj->getLink ();
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

            <!--@nghiephai start add more left menu-->
            <div class="accordion-group">
               <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse"  href="#collapseVideo">
                     Video
                  </a>
               </div>
               <div id="collapseVideo" class="accordion-body collapse ">
                  <div class="accordion-inner">
                     <iframe width="220" height="180" src="//www.youtube.com/embed/2B0RFm5AudQ" frameborder="0" allowfullscreen=""></iframe>  </div>
               </div>
            </div>
            <!--@nghiephai end add more left menu-->

            <!--@nghiephai Start bai viet moi nhat -->
            <div class="accordion-group">
               <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse"  href="#collapsePost">
                     Bài viết mới nhất
                  </a>
               </div>
               <div id="collapsePost" class="accordion-body collapse danhmucsidebar">
                  <div class="accordion-inner">
                     <ul>
                         <?php
                         $listBaiViet = articles::getlatest_cid (5, 723);
                         foreach ($listBaiViet as $item)
                         {
                             $name = $item['name_vn'];
                             $link = '';

                             if ($item['cid'] > 0)
                             {
                                 $catObj = new Categories (Categories::getCatByID ($item['cid']));
                                 $link   = $catObj->getLink () . $item['unique_key_vn'] . ".html";
                             }
                             ?>
                            <li><a href="<?php echo $link; ?>"><?php echo $name; ?></a></li>
                            <?php
                        }
                        ?>

                     </ul>
                     <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FMyphamchonamgioi&amp;width=240&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:258px;" allowtransparency="true"></iframe>
                  </div>

               </div>
            </div>
            <!--End bai viet moi nhat -->

            <!--@nghiephai Start Chia sẻ bạn bè  -->
            <div class="accordion-group">
               <div class="accordion-heading">
                  <a class="accordion-toggle" data-toggle="collapse"  href="#collapseOptin">
                     Cửa hàng Mỹ phẩm Cho Nam
                  </a>
               </div>
               <div id="collapseOptin" class="accordion-body collapse ">

                  <p>Nơi Chuyên cung cấp các loại mỹ phẩm dành riêng cho nam giúp cho bạn trai tự tin hơn trong giao tiếp, và thể hiện bản thân</p>
                  <div style="font-size: 13px;color: #fff;padding: 15px;margin-bottom: 10px;border: 0px dashed #2980b9;background: #2980b9;border-radius: 4px;">
                     <center>
                        <b>Đăng ký nhận ngay bí kíp hướng dẫn 30 NGÀY LÀM ĐẸP CHO NAM!!!</b></center>
                     <br>
                     <center>
                        <img src="https://1.bp.blogspot.com/-qmJxEIpCiFE/V75HJmKqc_I/AAAAAAAABoQ/ig7c1Yf_C6IJOa9cTiDI9ZTMlscVQXsPgCLcB/s1600/431052501.png"></center>
                     <p>
                        <br>
                        Bạn sẽ không hối hận đâu! Các chuyên gia của chúng tôi là những người đã có thâm niên 5 năm trong nghề tư vấn làm đẹp và điều tuyệt vời hơn là họ sẽ tư vấn cho bạn HOÀN TOÀN MIỄN PHÍ!</p>
                     <br>
                     <form action="https://app.getresponse.com/add_contact_webform_v2.html?u=BbTud&amp;webforms_id=6345701" class="editor-loaded" data-editable="container.form" method="post" style="overflow: hidden;">
                        <div>
                           <input aria-required="true" class="placeholder padding" data-tab-index="" id="webform_c_7y67s" maxlength="" minlength="" name="webform[email]" placeholder="Email address" tabindex="1" type="text" value=""><br>
                           <br>
                           <input class="placeholder padding" data-tab-index="" id="webform_c_y666y" maxlength="" minlength="" name="webform[name]" placeholder="Name" tabindex="2" type="text" value=""></div>
                        <div>
                           <br>
                           <br>
                           <br>
                           <center><input class="jfk-button jfk-button-action " id="ss-submit" name="submit" type="submit" value="Nhận Ngay"></center></div>
                        <div style="clear:both">
                           &nbsp;</div>
                     </form>
                  </div>
               </div>
            </div>
            <!--End Chia sẻ bạn bè  -->

         </div>

      </div> 

      <hr>
      <?php include "widget_html/product_list_sort.php"; ?>

   </div>
</div>