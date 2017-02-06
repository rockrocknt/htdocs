<?php
function echoFooterEchoLi($list)
{
    if (empty($list)) return;
    for ($i = 0; $i < count($list); $i++) {
        $item = $list[$i];
        if (empty($item['id'])) continue;
        ?>
        <li><a href="<?php echo $item['url_vn']; ?>"><?php echo $item['name_vn']; ?></a></li>
    <?php
    }
}
?>
<section class="section-footer">
   <div class="container">
      <div class="row-fluid">
         <div class="span3">
            <div class="footer-links-holder">
               <h2>Về chúng tôi</h2>
               <ul>
                  <?php
                  $cid = 30;
                  $list = ImagesGroup::getimgbycid($cid);
                  echoFooterEchoLi($list);
                  ?>
               </ul>
            </div>
         </div>
         <div class="span3">
            <div class="footer-links-holder">
               <h2>Hỗ trợ</h2>
               <ul>
                   <?php
                   $cid = 31;
                   $list = ImagesGroup::getimgbycid($cid);
                   echoFooterEchoLi($list);
                   ?>
               </ul>
            </div>
         </div>
         <div class="span3">
            <div class="footer-links-holder">
               <h2>Tài khoản của bạn</h2>
               <ul>
                  <li><a href="#" >Đăng nhập</a></li>
                  <li><a href="#" >Đăng ký</a></li>
               </ul>
            </div>
         </div>
         <div class="span3">
             <iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2FMyphamchonamgioi&amp;width=240&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:240px; height:258px;" allowtransparency="true"></iframe>
         </div>
      </div>
   </div>
</section>