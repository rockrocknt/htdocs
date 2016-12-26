<? 
	global $member; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<form name="supplier" id="validate" class="form" action="admin.php?do=member&act=addsm<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Họ tên</label>
			<div class="formRight">
                <input type="text" name="name_vn" title="Nhập họ tên thành viên" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($member['name_vn'])?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" id="email" title="Nhập email thành viên" class="tipS validate[required,custom[email]]" value="<?=$member['email']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mật khẩu</label>
			<div class="formRight">
                <input type="password" name="password" id="password" title="Mật khẩu để đăng nhập với email phía trên" class="tipS validate[required]" value="<?=$member['password']?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Địa chỉ</label>
			<div class="formRight">
                <input type="text" name="address" title="Địa chỉ thành viên" class="tipS" value="<?=htmlspecialchars($member['address'])?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Điện thoại</label>
			<div class="formRight">
                <input type="text" name="phone" title="Số điện thoại thành viên" class="tipS" value="<?=htmlspecialchars($member['phone'])?>" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$member['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>