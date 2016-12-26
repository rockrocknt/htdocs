<? 
	global $bank; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<form name="supplier" id="validate" class="form" action="admin.php?do=banks&act=<?=$_GET['act']=='add'?'addsm':'editsm'?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tên chủ tài khoản</label>
			<div class="formRight">
                <input type="text" name="name" id="name" class="tipS validate[required]" value="<?=htmlspecialchars($bank['name'])?>" />
                <span class="formNote">Nhập tên chủ tài khoản</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Số tài khoản</label>
			<div class="formRight">
                <input type="text" name="card" id="card" class="tipS validate[required]" value="<?=htmlspecialchars($bank['card'])?>" />
                <span class="formNote">Nhập số tài khoản</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tên Ngân hàng VN</label>
			<div class="formRight">
                <input type="text" name="bank_vn" id="bank_vn" class="tipS validate[required]" value="<?=htmlspecialchars($bank['bank_vn'])?>" />
                <span class="formNote">Nhập tên Ngân hàng hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên Ngân hàng EN</label>
			<div class="formRight">
                <input type="text" name="bank_en" class="tipS" value="<?=htmlspecialchars($bank['bank_en'])?>" />
                <span class="formNote">Nhập tên Ngân hàng hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Chi nhánh</label>
			<div class="formRight">
                <input type="text" name="branch" class="tipS" value="<?=htmlspecialchars($bank['branch'])?>" />
                <span class="formNote">Nhập chi nhánh ngân hàng</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tải hình ảnh</label>
			<div class="formRight">
            	<? if($_GET['act'] == 'edit' && file_exists($bank["img"])) { ?>
                    <img src="<?=getTimThumb($bank["img"], 100)?>" alt="" />
                    <a href="admin.php?do=banks&act=delete_img&id=<?=$bank['id']?>&img_del=img" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
              	<? } ?>
				<input type="file" id="file" name="img" />
                <div class="clear"></div>
            	<span class="formNote">Tải hình đại diện ngân hàng (ảnh đuôi JPEG, GIF , JPG , PNG)</span>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
            <label>Số thứ tự</label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$bank['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Tuỳ chọn</label>
          <div class="formRight">
            <input type="checkbox" name="active" id="active" value="1" <?=($bank['active']==1)||$_GET['act']=='add'?'checked="checked"':''?> />
            <label for="active">Hiển thị</label>
          </div>
          <div class="clear"></div>
        </div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$bank['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>