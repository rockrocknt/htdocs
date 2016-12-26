<? 
	global $cat, $recentCat, $catList, $notDisplayList, $info, $fullCats; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>
<script type="text/javascript">
	function checkCompWidget(value, flag) {
		if(value==7){
			$('.html_content_vn').show();
			if (flag == 1) {
				$('.html_content_en').show();
			}
		}
		else{
			$('.html_content_vn').hide();
			$('.html_content_en').hide();
		}
		if(value==1){
			$('.cattype').show();
		}
		else{
			$('.cattype').hide();
		}
		if(value==2){
			$('.producttype').show();
		}
		else{
			$('.producttype').hide();
		}
		if(value==3){
			$('.articletype').show();
		}
		else{
			$('.articletype').hide();
		}
		if(value==4){
			$('.facebook').show();
		}
		else{
			$('.facebook').hide();
		}
		if(value==2 || value==3 || value==1){
			$('.numberQuery').show();
		}
		else{
			$('.numberQuery').hide();
		}
	}
</script>
<form name="supplier" id="validate" class="form" action="admin.php?do=widgets&act=<?=$_GET['act']=='add'?'addsm':'editsm'?>&cid=<?=$_GET["cid"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tên widget VN</label>
			<div class="formRight">
                <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($cat['name_vn'])?>" />
                <span class="formNote">Tên widget sẽ hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên widget EN</label>
			<div class="formRight">
                <input type="text" name="name_en" class="tipS" value="<?=htmlspecialchars($cat['name_en'])?>" />
                <span class="formNote">Tên widget sẽ hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
            <label>Tuỳ chọn</label>
          <div class="formRight">
            <input type="checkbox" name="active" id="check1" value="1" <?=($cat['active']==1 || $_GET['act']=='add')?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$cat['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow">
        	<?
				global $db;
				
				if ($_GET['cid'] == 3)
					$sql = "select * from modules_widget where active=1 and (id=3 or id=2 or id=7 or id=1) order by num asc";
				else
					$sql = "select * from modules_widget where active=1 order by num asc";
				$comps = $db->getAll($sql);
			?>
			<label>Chọn thể loại:</label>
			<div class="formRight">
            	<div class="selector">
                    <select name="comp" onchange="checkCompWidget(this.value, '<?=$temp?>')">
                        <? foreach ($comps as $comp) { ?>
                        <option value="<?=$comp['id']?>" <?=$cat['comp']==$comp['id']?'selected="selected"':''?>><?=$comp['name']?></option>
                        <? } ?>
                    </select>
                </div>
			</div>
			<div class="clear"></div>
		</div>
       	<? // san pham ?>
        <div class="formRow producttype" <?=$cat['comp']==2?'':'style="display:none;"'?>>
          <label>Loại sản phẩm:</label>
          <div class="formRight">
            <input type="radio" name="ptype" id="sp1" value="2" <?=($cat['type']==2 || $_GET['act']=='add')?'checked="checked"':''?> />
            <label for="sp1">SP Mới nhất</label>
            <input type="radio" name="ptype" id="sp2" value="3" <?=($cat['type']==3)?'checked="checked"':''?> />
            <label for="sp2">SP Xem nhiều nhất</label>
            <input type="radio" name="ptype" id="sp3" value="1" <?=($cat['type']==1)?'checked="checked"':''?> />
            <label for="sp3">SP Ngẫu nhiên</label>
            <input type="radio" name="ptype" id="sp4" value="5" <?=($cat['type']==5)?'checked="checked"':''?> />
            <label for="sp4">SP Bán chạy</label>
            <input type="radio" name="ptype" id="sp5" value="4" <?=($cat['type']==4)?'checked="checked"':''?> />
            <label for="sp5">SP Khuyến mãi</label>
            <div class="clear"></div>
            <span class="formNote">Các sản phẩm thoả điều kiện sẽ được đưa vào trong widget</span>
          </div>
          <div class="clear"></div>
        </div>
        <? // tin tuc ?>
        <div class="formRow articletype" <?=$cat['comp']==3?'':'style="display:none;"'?>>
          <label>Loại tin tức:</label>
          <div class="formRight">
            <input type="radio" name="atype" id="new1" value="2" <?=($cat['type']==2 || $_GET['act']=='add')?'checked="checked"':''?> />
            <label for="new1">Tin mới nhất</label>
            <input type="radio" name="atype" id="new2" value="3" <?=($cat['type']==3)?'checked="checked"':''?> />
            <label for="new2">Tin xem nhiều nhất</label>
            <input type="radio" name="atype" id="new3" value="1" <?=($cat['type']==1)?'checked="checked"':''?> />
            <label for="new3">Tin ngẫu nhiên</label>
            <input type="radio" name="atype" id="new4" value="4" <?=($cat['type']==4)?'checked="checked"':''?> />
            <label for="new4">Tin hot</label>
            <div class="clear"></div>
            <span class="formNote">Các tin tức thoả điều kiện sẽ được đưa vào trong widget</span>
          </div>
          <div class="clear"></div>
        </div>
        <? // khung html ngoai ?>
		<div class="formRow html_content_vn" <?=$cat['comp']==7?'':'style="display:none;"'?>>
			<label>Nội dung VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung của widget hiển thị ở trang tiếng Việt"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("content_vn", $cat['content_vn']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow html_content_en" <?=$cat['comp']==7&&$temp==1?'':'style="display:none;"'?>>
			<label>Nội dung EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung của widget hiển thị ở trang tiếng Anh"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("content_en", $cat['content_en']);?></div>
			<div class="clear"></div>
		</div>
        <div class="facebook" <?=$cat['comp']==4?'':'style="display:none;"'?>>
            <div class="formRow">
                <label>Link Facebook:</label>
                <div class="formRight">
                    <input type="text" name="facebook" class="tipS" value="<?=htmlspecialchars($info['facebook'])?>" />
                    <span class="formNote">Nhập link <strong>fanpage Facebook</strong> của bạn, ví dụ: https://www.facebook.com/IMGroupVietnam</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Chiều cao</label>
                <div class="formRight">
                    <input type="text" class="tipS" value="<?=$info['fbheight']?>" name="fbheight" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" /> px
                    <span class="formNote">Chiều cao của khung facebook sẽ hiển thị, đơn vị tính bằng pixel</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Chiều rộng</label>
                <div class="formRight">
                    <input type="text" class="tipS" value="<?=$info['fbwidth']?>" name="fbwidth" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" /> px
                    <span class="formNote">Chiều rộng của khung facebook sẽ hiển thị, đơn vị tính bằng pixel</span>
                </div>
                <div class="clear"></div>
            </div>
        </div>
        <div class="formRow cattype" style="border-bottom:medium none; padding-bottom:0; <?=$cat['comp']==1||$_GET['act']=='add'?'':'display:none;'?>">
        	<label>Chọn các danh mục đưa vào widget</label>
                <div class="clear"></div>
            	<span class="formNote">Những danh mục được chọn bên cột phải sẽ hiển thị trong widget. Sử dụng các nút ở giữa để chọn hoặc bỏ chọn danh mục! <strong>Lưu ý: Widget kiểu danh mục ở trang chủ chỉ được chọn 1 danh mục duy nhất và chỉ áp dụng đối với 2 kiểu danh mục tin tức và sản phẩm!</strong></span>
           	<div class="clear"></div>
        </div>
		<div class="body cattype" <?=$cat['comp']==1||$_GET['act']=='add'?'':'style="display:none;"'?>>
			<div class="leftPart">
				<div class="filter"><span>Tìm: </span><input type="text" id="box1Filter" class="boxFilter" /><input type="button" id="box1Clear" class="fBtn" value="x" /><div class="clear"></div></div>
				<select id="box1View" multiple="multiple" class="multiple" style="height:250px;">
                    <? if ($catList) {
						foreach ($catList as $key=>$item) { ?>
                    	<option value="<?=$item['id']?>"><?=$item['name_vn']?></option>
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
                <select id="box2View" multiple="multiple" class="multiple" name="catList[]" style="height:250px;">
                    <? 
						if ($recentCat) {
						foreach ($recentCat as $key=>$item) { ?>
                    	<option value="<?=$item['id']?>"><?=$item['name_vn']?></option>
                    <? }} ?>
                </select>
				<span id="box2Counter" class="countLabel"></span>
				<div class="dn"><select id="box2Storage"></select></div>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow numberQuery" <?=$cat['comp']==2 || $cat['comp']==3 || $cat['comp']==1 || $_GET['act']=='add'?'':'style="display:none;"'?>>
          <label>Số lượng:</label>
          <div class="formRight">
          	<input type="text" name="qlimit" style="width:20px; text-align:center;" value="<?=$_GET['act']=='add'?'4':$cat['qlimit']?>" class="tipS" onkeypress="return OnlyNumber(event)" />
            <span class="formNote">Số lượng (tin tức/sản phẩm) bạn muốn hiển thị trong widget</span>
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
        	<label>Danh mục <br />không hiện widget:</label>
			<div class="formRight">
            	<span class="formNote">Những danh mục được check sẽ không hiển thị widget này!</span>
            	<?php foreach ($fullCats as $cList) { ?>
            	<p style="float:left; width:33%;">
                	<?php 
					$bool = false;
					for ($index=0; $index<count($notDisplayList); $index++) { 
						if ($notDisplayList[$index]["catid"] == $cList["id"]) {
							$bool = true;
							break;
						}
					}
					?>
                	<input type="checkbox" value="<?=$cList["id"]?>" <?=$bool?'checked="checked"':""?> id="notDP<?=$cList["id"]?>" name="notDisplayList[]" />
                    <label for="notDP<?=$cList["id"]?>"><?=$cList["name_vn"]?></label>
                </p>
                <?php } ?>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$cat['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>