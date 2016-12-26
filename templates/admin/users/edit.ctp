<? global $user, $adminGroups; ?>

<form name="supplier" id="validate" class="form" action="admin.php?do=users&act=<?=$_GET['act']=='add'?'addsm':'editsm'?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tên truy cập</label>
			<div class="formRight">
                <input type="text" name="username" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($user['username'])?>" <?=$_GET['act']!='add'?'readonly="readonly"':''?> />
                <span class="formNote">Tên truy cập để đăng nhập vào CMS</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Email</label>
			<div class="formRight">
                <input type="text" name="email" id="email" class="tipS validate[required,custom[email]]" value="<?=$user['email']?>" />
                <span class="formNote">Email dùng để nhận lại mật khẩu</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mật khẩu</label>
			<div class="formRight">
                <input type="password" name="password" id="password" class="tipS <?=($_GET['act']=='add')?'validate[required]':''?>" value="" />
                <span class="formNote">Mật khẩu để đăng nhập vào CMS</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nhập lại mật khẩu</label>
			<div class="formRight">
                <input type="password" id="password2" class="tipS <?=($_GET['act']=='add')?'validate[required,equals[password]]':''?>" value="" />
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nhóm quản trị:</label>
			<div class="formRight">
            	<div class="selector">
                    <select name="group">
                        <? foreach ($adminGroups as $group) { ?>
                            <option value="<?=$group['id']?>" <?=$user['group']==$group['id']?'selected':''; ?>><?=$group["name"]?></option>
                        <? } ?>
                    </select>
                </div>
                <div class="clear"></div>
            	<span class="formNote">Quản trị viên thuộc nhóm quản trị nào sẽ chỉ dùng được những chức năng mà nhóm đó được phân quyền!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$user['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>