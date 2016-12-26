<? 
	global $payment; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<form name="supplier" id="validate" class="form" action="admin.php?do=payments&act=editsm" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tên phương thức VN</label>
			<div class="formRight">
                <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($payment['name_vn'])?>" />
                <span class="formNote">Nhập tên phương thức thanh toán hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên phương thức EN</label>
			<div class="formRight">
                <input type="text" name="name_en" class="tipS" value="<?=htmlspecialchars($payment['name_en'])?>" />
                <span class="formNote">Nhập tên phương thức thanh toán hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
        <? if ($payment['alias']=='Nganluong' || $payment['alias']=='Baokim' || $payment['alias']=='Paypal') { ?>
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" class="tipS validate[required,custom[email]]" value="<?=$payment['email']?>" />
                <span class="formNote">Nhập email bạn đã đăng ký tài khoản trên Ngân Lượng/Bảo Kim/ Paypal</span>
			</div>
			<div class="clear"></div>
		</div>
        <? } ?>
        <? if ($payment['alias']=='Tructiep') { ?>
		<div class="formRow">
			<label>Tải bản đồ</label>
			<div class="formRight">
            	<? if($_GET['act'] == 'edit' && file_exists($payment["img"])) { ?>
            		<img src="<?=getTimThumb($payment["img"], 100)?>" alt="" />
                    <a href="admin.php?do=payments&act=delete_img&id=<?=$payment['id']?>&img_del=img" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
              	<? } ?>
				<input type="file" id="file" name="img" />
                <div class="clear"></div>
            	<span class="formNote">Bản đồ hướng dẫn đường đi (ảnh đuôi JPEG, GIF , JPG , PNG)</span>
			</div>
			<div class="clear"></div>
		</div>
        <? } ?>
		<div class="formRow">
			<label>Mô tả VN <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung mô tả phương thức thanh toán hiển thị ở trang tiếng Việt"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("content_vn", $payment['content_vn']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Mô tả EN <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung mô tả phương thức thanh toán hiển thị ở trang tiếng Anh"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("content_en", $payment['content_en']);?></div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
            <label>Số thứ tự</label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$payment['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
                <span class="formNote">Số thứ tự hiển thị, ưu tiên từ nhỏ đến lớn</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
          <label>Tùy chọn</label>
          <div class="formRight">
            <input type="checkbox" name="active" id="active" value="1" <?=($payment['active']==1)?'checked="checked"':''?> />
            <label for="active">Hiển thị</label>
          </div>
          <div class="clear"></div>
        </div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$payment['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>