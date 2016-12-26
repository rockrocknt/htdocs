<? 
	global $optintype; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<form name="supplier" id="validate" class="form" action="admin.php?do=optin_type&act=<?=$_GET['act']=='add'?'addsm':'editsm'?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tên chương trình VN: </label>
			<div class="formRight">
                <input type="text" name="name_vn" title="Nhập tên chương trình tiếng Việt" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($optintype['otn_type_name_vn'])?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow" <?=$showEnglish?>>
			<label>Tên chương trình EN:</label>
			<div class="formRight">
                <input type="text" name="name_en" title="Nhập tên chương trình tiếng Anh" class="tipS" value="<?=htmlspecialchars($optintype['otn_type_name_en'])?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nội dung chính VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Nội dung chính của chương trình opt-in bằng tiếng Việt"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("otn_type_content_vn", $optintype['otn_type_content_vn']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Nội dung chính EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Nội dung chính của chương trình opt-in bằng tiếng Anh"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("otn_type_content_en", $optintype['otn_type_content_en']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Thông báo VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Nội dung thông báo sau khi người dùng opt-in thành công bằng tiếng Việt"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("alert_vn", $optintype['alert_vn']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Thông báo EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Nội dung thông báo sau khi người dùng opt-in thành công bằng tiếng Anh"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("alert_en", $optintype['alert_en']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tiêu đề mail VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Tiêu đề email sẽ gởi cho khách hàng (Tiếng Việt)"></label>
			<div class="formRight">
                <input type="text" name="email_subject_vn" title="Nhập tiêu đề email tiếng Việt" id="email_subject_vn" class="tipS validate[required]" value="<?=htmlspecialchars($optintype['email_subject_vn'])?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow" <?=$showEnglish?>>
			<label>Tiêu đề mail EN:  <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Tiêu đề email sẽ gởi cho khách hàng (Tiếng Anh)"></label>
			<div class="formRight">
                <input type="text" name="email_subject_en" title="Nhập tiêu đề email tiếng Anh" class="tipS" value="<?=htmlspecialchars($optintype['email_subject_en'])?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Template email VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Nội dung email sẽ gởi cho khách hàng bằng Tiếng Việt. CHÚ Ý: việc chỉnh sửa sai có thể làm cho hệ thống không gởi mail được!"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("email_template_vn", $optintype['email_template_vn']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Template email EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Nội dung email gởi cho khách hàng bằng Tiếng  Anh"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("email_template_en", $optintype['email_template_en']);?></div>
			<div class="clear"></div>
		</div>
		<?php /*?><div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<? if($_GET['act'] == 'edit' && file_exists($optintype['otn_type_image'])) { ?>
                    <img src="<?=$optintype['otn_type_image']?>" width="100px"  />
                    <a href="admin.php?do=optin_type&act=delete_img&id=<?=$optintype['id']?>&img_del=otn_type_image<?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
              	<? } ?>
				<input type="file" id="file" name="img" />
				<img src="./images/admin/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="Tải hình đại diện cho chương trình (ảnh JPEG, GIF , JPG , PNG)">
			</div>
			<div class="clear"></div>
		</div><?php */?>
		<div class="formRow">
			<label>Tải file download:</label>
			<div class="formRight">
            	<? if($_GET['act'] == 'edit' && file_exists($optintype['otn_type_file'])) { 
					echo $optintype['otn_type_file'];
				?>
                    <a href="admin.php?do=optin_type&act=delete_img&id=<?=$optintype['id']?>&img_del=otn_type_file<?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="Xoá ảnh">Xoá file</a>
                    <br />
              	<? } ?>
				<input type="file" id="file1" name="optin_type_file" />
				<img src="./images/admin/question-button.png" alt="Upload hình" class="icon_question tipS" original-title="File download của chương trình: (zip, rar, doc, docx, xls, xlsx, pdf)">
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
          <label>Tùy chọn:</label>
          <div class="formRight">
            <input type="checkbox" name="active" id="check1" value="1" <?=($optintype['otn_type_active']==1 || $_GET['act']=='add')?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>
          </div>
          <div class="clear"></div>
        </div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$optintype['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>