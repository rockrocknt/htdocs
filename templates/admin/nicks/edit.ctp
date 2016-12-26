<? 
	global $nick; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<form name="supplier" id="validate" class="form" action="admin.php?do=nicks&act=<?=$_GET['act']=='add'?'addsm':'editsm'?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tên VN</label>
			<div class="formRight">
                <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=$nick['name_vn']?>" />
                <span class="formNote">Nhập tên người hỗ trợ hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên EN</label>
			<div class="formRight">
                <input type="text" name="name_en" class="tipS" value="<?=$nick['name_en']?>" />
                <span class="formNote">Nhập tên người hỗ trợ hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nick Yahoo</label>
			<div class="formRight">
                <input type="text" name="yahoo" class="tipS" value="<?=$nick['yahoo']?>" />
                <span class="formNote">Nhập nick hỗ trợ Yahoo. <strong>Lưu ý:</strong> nick là <strong>abcdef@yahoo.com</strong> thì chỉ nhập là <strong>abcdef (bỏ phần đuôi @yahoo.com)</strong></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nick Skype</label>
			<div class="formRight">
                <input type="text" name="skype" class="tipS" value="<?=$nick['skype']?>" />
                <span class="formNote">Nhập nick hỗ trợ Skype</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Điện thoại</label>
			<div class="formRight">
                <input type="text" name="phone" id="phone" class="tipS validate[required]" value="<?=$nick['phone']?>" />
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
          <label>Tùy chọn:</label>
          <div class="formRight">
            <input type="checkbox" name="active" id="check1" value="1" <?=($nick['active']==1 || $_GET['act']=='add')?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$nick['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
                <span class="formNote">Thứ tự hiển thị nick hỗ trợ, ưu tiên từ nhỏ đến lớn</span>
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$nick['id']?>" />
                <input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>