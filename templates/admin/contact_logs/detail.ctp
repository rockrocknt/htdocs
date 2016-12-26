<? 
	global $db, $contact;
?>

<form name="supplier" id="frmEdit" class="form" action="admin.php?do=contact_logs&act=viewsm<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Thông tin chi tiết liên hệ</h6>
		</div>
		<div class="formRow">
			<label>Họ tên</label>
			<div class="formRight">
                <input type="text" name="name" class="tipS" disabled="disabled" value="<?=$contact['name'];?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" class="tipS" disabled="disabled" value="<?=$contact['email']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Số điện thoại</label>
			<div class="formRight">
                <input type="text" name="phone" class="tipS" disabled="disabled" value="<?=$contact['phone']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nội dung liên hệ:</label>
			<div class="formRight">
				<textarea rows="20" cols="" class="tipS" name="short_vn" disabled="disabled"><?=$contact["message"]?></textarea>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$contact['id']?>" />
            		<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>