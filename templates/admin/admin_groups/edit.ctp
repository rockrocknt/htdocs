<? global $group, $dolist, $recentdo; ?>

<form name="supplier" id="validate" class="form" action="admin.php?do=admin_groups&act=<?=$_GET['act']=='add'?'addsm':'editsm'?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tên nhóm quản trị</label>
			<div class="formRight">
                <input type="text" name="name" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($group['name'])?>" />
                <span class="formNote">Nhập tên nhóm quản trị</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mô tả:</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" name="short_vn"><?=$group["short"]?></textarea>
                <span class="formNote">Viết mô tả về nhóm quản trị</span>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow" style="border-bottom:medium none; padding-bottom:0;">
        	<label>Phân quyền cho nhóm quản trị</label>
                <div class="clear"></div>
            	<span class="formNote">Nhóm quản trị sẽ có quyền truy cập vào các quyền được chọn ở ô bên phải. Sử dụng các nút ở giữa để chọn hoặc bỏ chọn quyền!</span>
           	<div class="clear"></div>
        </div>
        <div class="body">
            <div class="leftPart">
				<div class="filter"><span>Tìm: </span><input type="text" id="box1Filter" class="boxFilter" /><input type="button" id="box1Clear" class="fBtn" value="x" /><div class="clear"></div></div>                   
                <select id="box1View" multiple="multiple" class="multiple" style="height:250px;">
                    <? if ($dolist) {
						foreach ($dolist as $key=>$item) { ?>
                    	<option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <? }} ?>
                </select>
				<span id="box1Counter" class="countLabel"></span>
				<div class="dn"><select id="box1Storage" name="box1Storage"></select></div>
            </div>

            <div class="dualControl">
                <button id="to2" type="button" class="basic mr5 mb15">Thêm</button>
                <button id="allTo2" type="button" class="basic">Thêm tất cả</button><br />
                <button id="to1" type="button" class="basic mr5">Xóa</button>
                <button id="allTo1" type="button" class="basic">Xóa tất cả</button>
            </div>

            <div class="rightPart">
				<div class="filter"><span>Tìm: </span><input type="text" id="box2Filter" class="boxFilter" /><input type="button" id="box2Clear" class="fBtn" value="x" /><div class="clear"></div></div>
                <select id="box2View" multiple="multiple" class="multiple" name="doList[]" style="height:250px;">
                    <? 
						if ($recentdo) {
						foreach ($recentdo as $key=>$item) { ?>
                    	<option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <? }} ?>
                </select>
				<span id="box2Counter" class="countLabel"></span>
				<div class="dn"><select id="box2Storage"></select></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
          <label>Tuỳ chọn</label>
          <div class="formRight">
          	<input type="checkbox" name="active" value="1" <?=($group['active']==1 || $_GET['act'] == 'add')?'checked="checked"':''?> />
            <label>Hiển thị</label>
          </div>
          <div class="clear"></div>
        </div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$group['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>