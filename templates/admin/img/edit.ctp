<? 
	global $image; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<form name="supplier" id="validate" class="form" action="admin.php?do=img&act=<?=$_GET['act']=='add'?'addsm':'editsm'?><?=(isset($_GET['cid'])?'&cid='.$_GET['cid']:'')?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Tên VN:</label>
			<div class="formRight">
                <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($image['name_vn'])?>" />
                <span class="formNote">Tên hình sẽ hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên EN:</label>
			<div class="formRight">
                <input type="text" name="name_en" class="tipS" value="<?=htmlspecialchars($image['name_en'])?>" />
                <span class="formNote">Tên hình sẽ hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>

        <div class="formRow ">
            <label>ID danh mục <br/> :</label>
            <div class="formRight">
                <input type="text" name="category_id" id="category_id" class="tipS" value="<?=$image['category_id']?>" />
                <span class="formNote">chỉ dùng cho "4 menu chính"!</span>
            </div>
            <div class="clear"></div>
        </div>

		<div class="formRow">
			<label>Đường dẫn(VN):</label>
			<div class="formRight">
                <input type="text" name="url_vn" id="url_vn" class="tipS" value="<?=$image['url_vn']?>" />
                <span class="formNote">Khi người dùng bấm vào hình sẽ chuyển đến trang này!</span>
			</div>
			<div class="clear"></div>
		</div>

        <div class="formRow" <?=$showEnglish?>>
            <label>Đường dẫn (EN):</label>
            <div class="formRight">
                <input type="text" name="url_en" id="url_en" class="tipS" value="<?=$image['url_en']?>" />
                <span class="formNote">Khi người dùng bấm vào hình sẽ chuyển đến trang này!</span>
            </div>
            <div class="clear"></div>
        </div>


		<div class="formRow">
			<label>Tải file ảnh:</label>
			<div class="formRight">
            	<? if($_GET['act'] == 'edit' && file_exists($image["img_vn"])) { ?>
            		<img src="<?=$image["img_vn"]?>" width="100" alt="" />
                    <a href="admin.php?do=img&act=delete_img&id=<?=$image['id']?>&img_del=img_vn<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
              	<? } ?>
				<input type="file" id="file" name="img_vn" />
                <div class="clear"></div>
                <span class="formNote">Tải hình ảnh (ảnh đuôi JPEG, GIF , JPG , PNG)</span>
			</div>
			<div class="clear"></div>
		</div>


        <div class="formRow">
            <label>Text 1 (VN):</label>
            <div class="formRight">

                <textarea name="text1_vn"><?=
                    str_replace("”", "'", $image['text1_vn']);


                    ?></textarea>
                <span class="formNote">chỉ dùng cho slider Home</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Text 2 (VN):</label>
            <div class="formRight">
            
                <?php echo $CKEditor->editor("text2_vn", $image['text2_vn']);?>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Text Link (VN):</label>
            <div class="formRight">
                <input type="text" name="text3_vn" id="text3_vn" class="tipS" value="<?=$image['text3_vn']?>" />
                <span class="formNote">chỉ dùng cho slider Home</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow ">
            <label>Canh text (VN):</label>
            <div class="formRight">
                <input type="text" name="textalign" id="textalign" class="tipS" value="<?=$image['textalign']?>" />
                <span class="formNote">chỉ dùng cho slider Home: 1 canh trái, 2 canh phai</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Kiểu đổi animation:</label>
            <div class="formRight">
                <input type="text" name="transitiontype" id="transitiontype" class="tipS" value="<?=$image['transitiontype']?>" />
                <span class="formNote">chỉ dùng cho slider Home: 1 fade, 2 zoomout, 3 fadetotopfadefrombottom</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
          <label for="check1">Hiển thị</label>
          <div class="formRight">
            <input type="checkbox" name="active" id="check1" value="1" <?=($image['active']==1 || $_GET['act']=='add')?'checked="checked"':''?> />
          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$image['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$image['id']?>" />
            	<input type="submit" class="blueB" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>