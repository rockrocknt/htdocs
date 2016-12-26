<? 
	global $info; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<? if(isset($_SESSION['mess'])){ ?>
<div class="nNote nSuccess hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['mess']?></strong></p>
</div>
<? }; unset($_SESSION['mess']); ?>

<? if(isset($_SESSION['error'])){ ?>
<div class="nNote nFailure hideit" style="margin:20px 0 -22px; clear:both;">
    <p><strong><?=$_SESSION['error']?></strong></p>
</div>
<? }; unset($_SESSION['error']); ?>

<form name="supplier" id="validate" class="form" action="admin.php?do=infos&act=editsm" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Cấu hình email - <span style="color:#f00;">CHÚ Ý: Phần này rất quan trọng, cần phải cấu hình đúng để nhận được email liên hệ, đơn hàng... từ khách hàng</span></h6>
		</div>
		<div class="formRow">
			<label>Mail nhận thư</label>
			<div class="formRight">
                <input type="text" name="mail_contact" id="mail_contact" class="tipS validate[required,custom[email]]" value="<?=$info['mail_contact']?>" />
                <span class="formNote">Khi người dùng liên hệ hoặc mua hàng, sẽ gởi mail vào email này! Chỉ nhập một email duy nhất!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mail được BCC</label>
			<div class="formRight">
                <input type="text" name="mail_list" class="tipS" value="<?=$info['mail_list']?>" />
                <span class="formNote">Các email sẽ được BCC (đơn hàng, liên hệ), viết liền không khoảng trắng và ngăn cách nhau bởi dấu chấm phẩy (;)</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tên hiển thị</label>
			<div class="formRight">
                <input type="text" name="mail_name" class="tipS" value="<?=$info['mail_name']?>" />
                <span class="formNote">Để cho người dùng biết là mail này từ đâu gởi tới!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tài khoản mail</label>
			<div class="formRight">
                <input type="text" name="mail_user" id="mail_user" class="tipS validate[required,custom[email]]" value="<?=$info['mail_user']?>" />
                <span class="formNote">Tài khoản mail dùng để gởi mail! Có thể dùng gmail hoặc webmail!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mật khẩu mail</label>
			<div class="formRight">
                <input type="password" name="mail_pass" id="mail_pass" class="tipS validate[required]" value="<?=$info['mail_pass']?>" />
                <span class="formNote">Mật khẩu của tài khoản mail ngay bên trên</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mail host</label>
			<div class="formRight">
                <input type="text" name="mail_host" id="mail_host" class="tipS validate[required]" value="<?=$info['mail_host']?>" />
                <span class="formNote">Host của tài khoản mail phía trên. Nếu là webmail thì host dạng <strong>(tên miền).(phần mở rộng) ví dụ: imgroup.vn</strong>. Nếu là gmail thì host là <strong>smtp.gmail.com</strong></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow none">
			<label>Thông tin <br />mail footer VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Trong các template email tiếng Việt gởi đi (liên hệ, đặt hàng ...), phía dưới cùng có phần thông tin của công ty! Thay đổi thông tin này tại đây."> </label>
			<div class="formRight"><?php echo $CKEditor->editor("mail_footer_vn", $info['mail_footer_vn']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Thông tin <br />mail footer EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Trong các template email tiếng Anh gởi đi (liên hệ, đặt hàng ...), phía dưới cùng có phần thông tin của công ty! Thay đổi thông tin này tại đây."> </label>
			<div class="formRight"><?php echo $CKEditor->editor("mail_footer_en", $info['mail_footer_en']);?></div>
			<div class="clear"></div>
		</div>
        <div class="formRow" >
            <label>Email Template đơn hàng: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Trong các template email tiếng Anh gởi đi (liên hệ, đặt hàng ...), phía dưới cùng có phần thông tin của công ty! Thay đổi thông tin này tại đây."> </label>
            <div class="formRight">
                <span class="formNote">Email gởi cho khách lúc đặt hàng</span>
                <?php echo $CKEditor->editor("email_order_vn", $info['email_order_vn']);?></div>
            <div class="clear"></div>
        </div>
        <div class="formRow" >
            <label>Top bar:

                <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" > </label>
            <div class="formRight">


                <textarea rows="10" cols="" class="tipS" name="topbar_vn"><?=$info["topbar_vn"]?></textarea>
                <span class="formNote"><a href="<?=GOOGLE_DOC?>" target="_blank">xem mẫu</a></span>

            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow" >
            <label>Thông tin chung ở trang chi tiết info:

                <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" > </label>
            <div class="formRight">
                <?php echo $CKEditor->editor("motanganchung_vn", $info['motanganchung_vn']);?></div>
            <div class="clear"></div>
        </div>

        <div class="formRow" >
            <label>Liên hệ ở trang chi tiết sản phẩm:

                <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" > </label>
            <div class="formRight">
                <?php echo $CKEditor->editor("lienhechitietsanpham_vn", $info['lienhechitietsanpham_vn']);?></div>
            <div class="clear"></div>
        </div>
	</div>
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Google Analytics & Webmaster Tools</h6>
		</div>
		<div class="formRow">
			<label>Mã Google Analytics:</label>
			<div class="formRight">
				<textarea rows="10" cols="" class="tipS" name="google_analytics"><?=$info["google_analytics"]?></textarea>
                <span class="formNote">Đoạn mã Google Analytics được lấy từ Google, dùng để thống kê lượt truy cập vào website</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>File webmaster tools:</label>
			<div class="formRight">
				<?php if(file_exists($info['webmaster'])) { 
					echo $info['webmaster'];
				?>
                    <a href="admin.php?do=infos&act=delete_img&id=<?=$info['id']?>&img_del=webmaster" title="Xoá file">Xoá file</a>
                    <br />
                <? } ?>
                <input type="file" name="webmaster" class="file_1" size="50" />
                <div class="clear"></div>
                <span class="formNote">File html được lấy từ Google Webmaster Tools để xác minh website</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>File sitemap.xml:</label>
			<div class="formRight">
				<?php if(file_exists($info['sitemap'])) { 
					echo $info['sitemap'];
				?>
                    <a href="admin.php?do=infos&act=delete_img&id=<?=$info['id']?>&img_del=sitemap" title="Xoá file">Xoá file</a>
                    <br />
                <? } ?>
                <input type="file" name="sitemap" class="file_1" size="50" />
                <div class="clear"></div>
                <span class="formNote">File sitemap.xml dùng để khai báo cho Google về cấu trúc của website. Tạo file sitemap.xml <a href="http://www.xml-sitemaps.com/" target="_blank"><strong>tại đây</strong></a></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>File Robots.txt:</label>
			<div class="formRight">
				<?php if(file_exists($info['robot'])) { 
					echo $info['robot'];
				?>
                    <a href="admin.php?do=infos&act=delete_img&id=<?=$info['id']?>&img_del=robot" title="Xoá file">Xoá file</a>
                    <br />
                <? } ?>
                <input type="file" name="robot" class="file_1" size="50" />
                <div class="clear"></div>
                <span class="formNote">File Robots.txt dùng để chỉ định cho Google các trang cần index hoặc không index!</span>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Logo & Favicon</h6>
		</div>
		<div class="formRow">
			<label>Tên logo VN</label>
			<div class="formRight">
                <input type="text" name="logoname_vn" class="tipS" value="<?=$info['logoname_vn']?>" />
                <span class="formNote">Tên hiển thị tại logo ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên logo EN</label>
			<div class="formRight">
                <input type="text" name="logoname_en" class="tipS" value="<?=$info['logoname_en']?>" />
                <span class="formNote">Tên hiển thị tại logo ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Hình logo:</label>
			<div class="formRight">
				<?php if(file_exists($info['logo'])) { ?>
            		<img src="<?=getTimThumb($info['logo'], 100)?>" alt="" />
                    <a href="admin.php?do=infos&act=delete_img&id=<?=$info['id']?>&img_del=logo" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
                <? } ?>
                <input type="file" name="logo" class="file_1" size="50" />
                <div class="clear"></div>
                <span class="formNote">Hình logo website (ảnh PNG, GIF, JPEG, JPG)</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Hình favicon:</label>
			<div class="formRight">
				<?php if(file_exists($info['favicon'])) { ?>
            		<img src="<?=getTimThumb($info['favicon'], 20)?>" alt="" />
                    <a href="admin.php?do=infos&act=delete_img&id=<?=$info['id']?>&img_del=favicon" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
                <? } ?>
                <input type="file" name="favicon" class="file_1" size="50" />
                <div class="clear"></div>
                <span class="formNote">Hình favicon hiển thị ở phía trên tab của trình duyệt (ảnh PNG, ICO, JPEG, JPG)</span>
			</div>
			<div class="clear"></div>
		</div>
	</div>
    <div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Cấu hình phân trang</h6>
		</div>
        <div class="formRow">
          <label>Sản phẩm:</label>
          <div class="formRight">
          	<input type="text" name="paging_product" style="width:20px; text-align:center;" value="<?=$info['paging_product']?>" class="tipS" onkeypress="return OnlyNumber(event)" />
            <span class="formNote">Nhập số lượng sản phẩm bạn muốn hiển thị trong 1 trang</span>
          </div>
          <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Sản phẩm trong trang mobile:</label>
            <div class="formRight">
                <input type="text" name="paging_product_mobile" style="width:20px; text-align:center;" value="<?=$info['paging_product_mobile']?>" class="tipS" onkeypress="return OnlyNumber(event)" />
                <span class="formNote">Nhập số lượng sản phẩm bạn muốn hiển thị trong 1 trang khi duyệt trong mobile</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
          <label>Tin tức:</label>
          <div class="formRight">
          	<input type="text" name="paging_article" style="width:20px; text-align:center;" value="<?=$info['paging_article']?>" class="tipS" onkeypress="return OnlyNumber(event)" />
            <span class="formNote">Nhập số lượng tin tức bạn muốn hiển thị trong 1 trang</span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
          <label>Danh mục:</label>
          <div class="formRight">
          	<input type="text" name="paging_submenu" style="width:20px; text-align:center;" value="<?=$info['paging_submenu']?>" class="tipS" onkeypress="return OnlyNumber(event)" />
            <span class="formNote">Nhập số lượng danh mục bạn muốn hiển thị trong 1 trang</span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
          <label>Bình luận:</label>
          <div class="formRight">
          	<input type="text" name="paging_comment" style="width:20px; text-align:center;" value="<?=$info['paging_comment']?>" class="tipS" onkeypress="return OnlyNumber(event)" />
            <span class="formNote">Nhập số lượng bình luận bạn muốn hiển thị trong 1 sản phẩm/tin tức.</span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
          <label>Sản phẩm liên quan:</label>
          <div class="formRight">
          	<input type="text" name="num_relate_product" style="width:20px; text-align:center;" value="<?=$info['num_relate_product']?>" class="tipS" onkeypress="return OnlyNumber(event)" />
            <span class="formNote">Nhập số lượng sản phẩm liên quan ở cuối mỗi sản phẩm chi tiết.</span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
          <label>Tin liên quan:</label>
          <div class="formRight">
          	<input type="text" name="num_relate_article" style="width:20px; text-align:center;" value="<?=$info['num_relate_article']?>" class="tipS" onkeypress="return OnlyNumber(event)" />
            <span class="formNote">Nhập số lượng tin tức liên quan ở cuối mỗi tin tức chi tiết.</span>
          </div>
          <div class="clear"></div>
        </div>
	</div>
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Bảo trì website</h6>
		</div>
        <div class="formRow">
          <label>Bảo trì:</label>
          <div class="formRight">
            <input type="checkbox" name="bao_tri" id="check1" value="1" <?=($info['bao_tri']==1)?'checked="checked"':''?> />
            <label for="check1">Bảo trì</label>
            <div class="clear"></div>
            <span class="formNote">Check để tạm đóng website, phần quản lý CMS vẫn vào được bình thường!</span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
         <label>Bắt đầu:</label>
          <div class="formRight">
          	<? $bat_dau = getdate(strtotime($info['bat_dau'])) ?>
            <span class="f11">Chọn giờ: </span><input type="text" class="timepicker" name="gio_bat_dau"size="10" value="<?=$bat_dau['hours'].':'.$bat_dau['minutes'].':'.$bat_dau['seconds']?>" />
            <span class="f11">Chọn ngày: </span><input type="text" class="datepicker" name="bat_dau" value="<?=$bat_dau['mday'].'-'.$bat_dau['mon'].'-'.$bat_dau['year']?>" readonly="readonly" />
            <div class="clear"></div>
            <span class="formNote">Thời gian bắt đầu bảo trì, định dạng ngày-tháng-năm!</span>
          </div>
            <div class="clear"></div>
         </div>
        <div class="formRow">
         <label>Kết thúc:</label>
          <div class="formRight">
          	<? $ket_thuc = getdate(strtotime($info['ket_thuc'])) ?>
            <span class="f11">Chọn giờ: </span><input type="text" class="timepicker" name="gio_ket_thuc" size="10" value="<?=$ket_thuc['hours'].':'.$ket_thuc['minutes'].':'.$ket_thuc['seconds']?>" />
            <span class="f11">Chọn ngày: </span><input type="text" class="datepicker" name="ket_thuc" value="<?=$ket_thuc['mday'].'-'.$ket_thuc['mon'].'-'.$ket_thuc['year']?>" readonly="readonly" />
            <div class="clear"></div>
            <span class="formNote">Thời gian kết thúc bảo trì, định dạng ngày-tháng-năm, thời gian kết thúc phải sau thời gian bắt đầu!</span>
          </div>
            <div class="clear"></div>
         </div>
	</div>
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Các cấu hình khác</h6>
		</div>
        <div class="formRow">
			<label>Google map:</label>
			<div class="formRight">
				<textarea rows="5" cols="" class="tipS" name="googlemap"><?=$info["googlemap"]?></textarea>
                <span class="formNote">Đoạn mã iframe lấy từ Google Map dùng hiển thị bản đồ của công ty!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Trang 404: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Khi người dùng vào 1 link không tồn tại sẽ chuyển đến trang này!"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("404page", $info['404page']);?></div>
			<div class="clear"></div>
		</div>
		<?php /*?><div class="formRow">
			<label>Link Google+:</label>
			<div class="formRight">
            	<input type="text" name="googleplus" title="Nhập link Google+ của bạn" class="tipS" value="<?=htmlspecialchars($info['googleplus'])?>" />
			</div>
			<div class="clear"></div>
		</div><?php */?>
        <div class="formRow">
            <label>order footer:</label>
            <div class="formRight"><?php echo $CKEditor->editor("order_footer_vn", $info['order_footer_vn']);?></div>

            <div class="clear"></div>
        </div>
		<div class="formRow">
			<label>HTML footer VN</label>
            <div class="formRight">


                <textarea rows="10" cols="" class="tipS" name="copyright_vn"><?=$info["copyright_vn"]?></textarea>
                <span class="formNote"><a href="<?=GOOGLE_DOC?>" target="_blank">xem mẫu</a></span>


            </div>
			<div class="clear"></div>
		</div>
        <div class="formRow" <?=$showEnglish?>>
			<label>Copyright EN</label>
            <div class="formRight"><?php echo $CKEditor->editor("copyright_en", $info['copyright_en']);?></div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
          <label>Tùy chọn: </label>
          <div class="formRight">
          	<div style="float:left;">
                <input type="checkbox" name="showcomment" id="showcomment" value="1" <?=($info['showcomment']==1)?'checked="checked"':''?> />
                <label for="showcomment">Hiện khung bình luận</label>
                <input type="checkbox" name="checkcomment" id="checkcomment" value="1" <?=($info['checkcomment']==1)?'checked="checked"':''?> />
                <label for="checkcomment">Kiểm duyệt bình luận <img src="./images/admin/question-button.png" alt="Upload hình" class="icon_que tipS" original-title="Kiểm duyệt bình luận của người dùng trước khi hiển thị." /></label>
                <input type="checkbox" name="showslider" id="showslider" value="1" <?=($info['showslider']==1)?'checked="checked"':''?>/>
                <label for="showslider">Hiện slider trang chủ</label>
                <?php /*?><input type="checkbox" name="showlanguage" id="showlanguage" value="1" <?=($info['showlanguage']==1)?'checked="checked"':''?> />
                <label for="showlanguage">Web 2 ngôn ngữ</label><?php */?>
                <input type="checkbox" name="noindex" id="noindex" value="1" <?=($info['noindex']==1)?'checked="checked"':''?> />
                <label for="noindex">Noindex website <img src="./images/admin/question-button.png" alt="Upload hình" class="icon_ques tipS" original-title="Check nếu bạn KHÔNG MUỐN Google index website của bạn (trong trường hợp website còn để dữ liệu mẫu)!" /></label>
            </div>
            <?php /*?><div style="float:left;">
                <input type="checkbox" name="showoptin" id="showoptin" value="1" <?=($info['showoptin']==1)?'checked="checked"':''?>/>
                <label for="showoptin">Hiện opt-in</label>
                <input type="checkbox" name="showcart" id="showcart" value="1" <?=($info['showcart']==1)?'checked="checked"':''?>/>
                <label for="showcart">Hiện giỏ hàng</label>
            </div><?php */?>
          </div>
          <div class="clear"></div>
        </div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$info['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>