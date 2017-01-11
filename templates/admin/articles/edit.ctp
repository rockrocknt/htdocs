<? 
	global $article, $tags; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'': '';
?>

<script type="text/javascript">
	function TreeFilterChanged(value){
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request");
		  return;
		  } 
		var url="ajax/checkComp.php";
		url=url+"?id="+value;
		url=url+"&sid="+Math.random();
		url=url+"&comp=1";
		xmlHttp.onreadystatechange=ReadyTreeFilterChanged;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
	
	function ReadyTreeFilterChanged(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			if(xmlHttp.responseText != "0"){		
				//location.href = "admin.php?do=articles&act=add&cid="+xmlHttp.responseText;
			}
			else{
				alert('Danh mục này không phải thể loại tin tức!');
			}
		}
	}

	function TreeFilterChanged2(value){
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request");
		  return;
		  }
		var url="ajax/checkComp.php";
		url=url+"?id="+value;
		url=url+"&sid="+Math.random();
		url=url+"&comp=1";
		xmlHttp.onreadystatechange=ReadyTreeFilterChanged2;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
	
	function ReadyTreeFilterChanged2(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{
			if(xmlHttp.responseText != "0"){
				$('#validate').submit();
			}
			else{
				alert('Danh mục này không phải thể loại tin tức!');
			}
		}
	}
	
	function alertWarning(){
		if(confirm("Các thông tin trong phần 'Nội dung SEO' sẽ bị trở về trạng thái ban đầu!"))
		{
			return CreateTitleSEO();
		}
	}
</script>

<? if (cmsFunction::isLockItem($article)) {
	$p = 'admin.php?do=articles';
	page_transfer2($p);
} ?>

<form name="supplier" id="validate" class="form" action="admin.php?do=articles&act=<?=$_GET['act']=='add'?'addsm':'editsm'?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Danh mục tin tức</label>
			<div class="formRight">
            	<div class="selector">
					<?php
                        $c = new Categories();
                        $cid = $article['cid']?$article['cid']:'';
                        if(isset($_GET['cid']))
                            $cid = $_GET['cid'];
                        
                        $tree = $c->admin_tree_filter(1, $cid, 1);
                        echo $tree;
                    ?>
                </div>
                <div class="clear"></div>
            	<span class="formNote">Hãy chọn những danh mục thuộc thể loại tin tức (có màu xanh)!</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tên tin tức VN</label>
			<div class="formRight">
                <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($article['name_vn'])?>" />
                <span class="formNote">Nhập tên tin tức hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên tin tức EN</label>
			<div class="formRight">
                <input type="text" name="name_en" class="tipS" value="<?=htmlspecialchars($article['name_en'])?>" />
                <span class="formNote">Nhập tên tin tức hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow none">
            <label>Link YouTube (trang VIDEO)</label>
            <div class="formRight">
                <input type="text" name="link_youtube" id="link_youtube" class="tipS " value="<?=$article['link_youtube']?>" />

            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow ">
            <label>Link ngoài (VN)</label>
            <div class="formRight">
                <input type="text" name="ext_url_vn" id="ext_url_vn" class="tipS " value="<?=$article['ext_url_vn']?>" />

            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow " style="display:none;">
            <label>Link ngoài (EN)</label>
            <div class="formRight">
                <input type="text" name="ext_url_en" id="ext_url_en" class="tipS " value="<?=!empty($article['ext_url_en']) ? $article['ext_url_en'] : ''; ?>" />

            </div>
            <div class="clear"></div>
        </div>


        <?php /*?><div class="formRow">
          <label for="tags">Tag tin tức:</label>
          <div class="formRight">
            <input type="text" id="tags" name="tags" class="tags" value="" />
            <span class="formNote">Nhập tag cho tin tức, mỗi tag cách nhau bằng phím enter hoặc dấu phẩy (,). <strong>Chú ý: không nên copy mà nên gõ tay vào để tránh bị các ký tự đặc biệt.</strong></span>
            <p>
            <?
				if ($tags) {
            	foreach ($tags as $tag){
			?>
            <span class="tag_on_ar"><span><?=$tag["name_tag"]?></span><a href="#" title="Xóa tag">x</a></span>
            <? }} ?>
            </p>
          </div>
          <div class="clear"></div>
        </div><?php */?>
		<div class="formRow">
			<label>Tải hình ảnh:</label>
			<div class="formRight">
            	<? if($_GET['act'] == 'edit' && file_exists($article["img"])) { ?>
                    <img src="<?=$article["img"]?>" width="200" alt="" />
                    <a href="admin.php?do=articles&act=delete_img&id=<?=$article['id']?>&img_del=img<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
              	<? } ?>
				<input type="file" id="file" name="img" />
                <div class="clear"></div>
                <span class="formNote">Tải hình đại diện cho tin tức (ảnh đuôi JPEG, GIF , JPG , PNG)</span>
			</div>
			<div class="clear"></div>
		</div>
        <? if (cmsFunction::isNewsManager()) { ?>
        <div class="formRow">
          <label>Tùy chọn:</label>
          <div class="formRight">
          	<div style="float:left;">
                <input type="checkbox"  name="is_noindex" id="check2" value="1" <?=($article['is_noindex']==1)?'checked="checked"':''?> />
                <label for="check2">Noindex, nofollow <img src="./images/admin/question-button.png" alt="Upload hình" class="icon_que tipS" original-title="Check nếu bạn muốn Google không index tin tức này!" /></label>
                <input type="checkbox" name="is_lock" id="check3" value="1" <?=($article['is_lock']==1)?'checked="checked"':''?> />
                <label for="check3">Khoá tin tức <img src="./images/admin/question-button.png" alt="Tooltip" class="icon_que tipS" original-title="Khoá tin lại không cho phép chỉnh sửa (trừ nhóm admin được phân quyền quản lý tin tức)"></label>
                <input type="checkbox" name="active" id="active" value="1" <?=($article['active']==1 || $_GET['act']=='add')?'checked="checked"':''?> />
                <label for="active">Hiển thị</label>
                <input type="checkbox" name="active_future" id="active_future" value="1" <?=($article['active_future']==1)?'checked="checked"':''?> />
                <label for="active_future">Hẹn giờ post tin <img src="./images/admin/question-button.png" alt="Tooltip" class="icon_que tipS" original-title="Đến thời gian bạn chọn, tin tức sẽ hiện ra."></label>
                <input type="checkbox" name="hot" id="hot" value="1" <?=($article['hot']==1)?'checked="checked"':''?> />
                <label for="hot">Tin hot <img src="./images/admin/question-button.png" alt="Tooltip" class="icon_que tipS" original-title="Check nếu bạn muốn đánh dấu tin tức là tin hot"></label>
            </div>
            <div style="float:left;">
                <input type="checkbox" name="not_in_widget" id="not_in_widget" value="1" <?=($article['not_in_widget']==1)?'checked="checked"':''?> />
            	<label for="not_in_widget">Không hiển thị trong widget<img src="./images/admin/question-button.png" alt="Tooltip" class="icon_que tipS" original-title="Check nếu bạn muốn tin tức này KHÔNG hiển thị trong các widget bạn tạo ra!"></label>
            </div>
          </div>
          <div class="clear"></div>
        </div>
         <div class="formRow" id="chose_date_time" <?=($article['active_future']==1)?'style="display:block;"':''?>>
         <label>Thời gian post:</label>
          <div class="formRight">
			  <? $bat_dau = getdate(strtotime($article['publish_date'])) ?>
              <span class="f11">Chọn ngày: </span>
              <input type="text" class="datepicker" name="publish_date" value="<?=$article['publish_date']?($bat_dau['mday'].'-'.$bat_dau['mon'].'-'.$bat_dau['year']):''?>" readonly="readonly" />
               <span class="f11">Chọn giờ: </span>
               <input type="text" class="timepicker" name="publish_time"size="10" value="<?=$article['publish_date']?($bat_dau['hours'].':'.$bat_dau['minutes'].':'.$bat_dau['seconds']):''?>" />
               <span class="formNote">Chọn ngày giờ post tin, định dạng ngày-tháng-năm giờ-phút-giây</span>
          </div>
            <div class="clear"></div>
         </div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$article['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
                <span class="formNote">Số thứ tự hiển thị của tin tức, ưu tiên từ nhỏ đến lớn</span>
            </div>
            <div class="clear"></div>
        </div>
        <? } else { ?>
            <input type="hidden" name="is_noindex" value="<?=$article['is_noindex']?>" />
        <? } ?>

        <div class="formRow " >
            <label>cid list</label>
            <div class="formRight">
                <input type="text" name="cidlist" class="tipS" value="<?=$article['cidlist']?>" />
                <span class="formNote">Tin liên quan cột phải khi vào chi tiết tin tức- mẫu: ;1;2;</span>
            </div>
            <div class="clear"></div>
        </div>


        <div class="formRow " >
            <label>product cid list</label>
            <div class="formRight">
                <input type="text" name="productcidlist" class="tipS" value="<?=$article['productcidlist']?>" />
                <span class="formNote">DANH MỤC SẢN PHẨM LIÊN QUAN cột phải khi vào chi tiết tin tức- mẫu: ;1;2;</span>
            </div>
            <div class="clear"></div>
        </div>


        <div class="formRow " >
            <label>product list</label>
            <div class="formRight">
                <input type="text" name="productlist" class="tipS" value="<?=$article['productlist']?>" />
                <span class="formNote">Sản phẩm liên quan cột phải khi vào chi tiết tin tức- mẫu: ;1;2;</span>
            </div>
            <div class="clear"></div>
        </div>

            <div class="formRow">
                    <label>Mô tả ngắn VN:</label>
                    <div class="formRight">
                            <textarea rows="8" cols="" class="tipS " name="short_vn" id="short_vn"><?=$article["short_vn"]?></textarea>
            <span class="formNote">Đoạn mô tả ngắn tin tức sẽ hiển thị ở trang tiếng Việt</span>
                    </div>
                    <div class="clear"></div>
            </div>
            <div class="formRow" <?=$showEnglish?>>
                    <label>Mô tả ngắn EN:</label>
                    <div class="formRight">
                            <textarea rows="8" cols="" class="tipS" name="short_en"><?=$article["short_en"]?></textarea>
            <span class="formNote">Đoạn mô tả ngắn tin tức sẽ hiển thị ở trang tiếng Anh</span>
                    </div>
                    <div class="clear"></div>
            </div>
            <div class="formRow">
                    <label>Nội dung chính VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung chính của tin tức sẽ hiển thị ở trang tiếng Việt"> </label>
                    <div class="formRight"><?php echo $CKEditor->editor("content_vn", $article['content_vn']);?></div>
                    <div class="clear"></div>
            </div>
            <div class="formRow" <?=$showEnglish?>>
                    <label>Nội dung chính EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung chính của tin tức sẽ hiển thị ở trang tiếng Anh"> </label>
                    <div class="formRight"><?php echo $CKEditor->editor("content_en", $article['content_en']);?></div>
                    <div class="clear"></div>
            </div>

        <!--Start NghiepHai Them thuoc tinh-->
        <div class="formRow " >
            <label>idcategory</label>
            <div class="formRight">
                <input type="text" name="idcategory" class="tipS" value="<?=$article['idcategory']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow " >
            <label>admin_id</label>
            <div class="formRight">
                <input type="text" name="admin_id" class="tipS" value="<?=$article['admin_id']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow " >
            <label>admin_name</label>
            <div class="formRight">
                <input type="text" name="admin_name" class="tipS" value="<?=$article['admin_name']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
    <div class="formRow " >
            <label>categories_displaytype_id</label>
            <div class="formRight">
                <input type="text" name="categories_displaytype_id" class="tipS" value="<?=$article['categories_displaytype_id']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow " >
            <label>pro_link</label>
            <div class="formRight">
                <input type="text" name="pro_link" class="tipS" value="<?=$article['pro_link']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow " >
            <label>pro_name</label>
            <div class="formRight">
                <input type="text" name="pro_name" class="tipS" value="<?=$article['pro_name']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow " >
            <label>vote</label>
            <div class="formRight">
                <input type="text" name="vote" class="tipS" value="<?=$article['vote']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow " >
            <label>view</label>
            <div class="formRight">
                <input type="text" name="view" class="tipS" value="<?=$article['view']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>hot_news_big</label>
            <div class="formRight">
                <input type="text" name="hot_news_big" class="tipS" value="<?=$article['hot_news_big']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>is_contact</label>
            <div class="formRight">
                <input type="text" name="is_contact" class="tipS" value="<?=$article['is_contact']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>idarticle</label>
            <div class="formRight">
                <input type="text" name="idarticle" class="tipS" value="<?=$article['idarticle']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>note_img_vn</label>
            <div class="formRight">
                <input type="text" name="note_img_vn" class="tipS" value="<?=$article['note_img_vn']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>note_img_en</label>
            <div class="formRight">
                <input type="text" name="note_img_en" class="tipS" value="<?=$article['note_img_en']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>bonus</label>
            <div class="formRight">
                <input type="text" name="bonus" class="tipS" value="<?=$article['bonus']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>price</label>
            <div class="formRight">
                <input type="text" name="price" class="tipS" value="<?=$article['price']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>sSource</label>
            <div class="formRight">
                <input type="text" name="sSource" class="tipS" value="<?=$article['sSource']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>home</label>
            <div class="formRight">
                <input type="text" name="home" class="tipS" value="<?=$article['home']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
         <div class="formRow " >
            <label>clear_link</label>
            <div class="formRight">
                <input type="text" name="clear_link" class="tipS" value="<?=$article['clear_link']?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
        <!--End NghiepHai Them thuoc tinh-->
	</div>

	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung SEO</h6><span class="mynotes">- Phần dành cho Google đọc</span>
		</div>
		<div class="formRow">
			<label>Tạo SEO</label>
			<div class="formRight">
            	<input type="button" class="blueB" onclick="<?=$_GET['act']=='add'?'CreateTitleSEO();':'alertWarning();'?>" value="Tạo SEO" />
                <span class="formNote"><?=CMS_CREATE_SEO?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Link tin tức VN</label>
			<div class="formRight">
				<input type="text" value="<?=$article['unique_key_vn']?>" name="unique_key_vn" id="unique_key_vn" class="tipS validate[required]" />
                <span class="formNote"><?=CMS_LINK_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Link tin tức EN</label>
			<div class="formRight">
				<input type="text" value="<?=$article['unique_key_en']?>" name="unique_key_en" class="tipS" />
                <span class="formNote"><?=CMS_LINK_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tiêu đề page</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($article['title_vn'])?>" name="title_vn" class="tipS" />
                <span class="formNote"><?=CMS_TITLE_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tiêu đề page EN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($article['title_en'])?>" name="title_en" class="tipS" />
                <span class="formNote"><?=CMS_TITLE_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Từ khóa VN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($article['keyword_vn'])?>" name="keyword_vn" class="tipS" />
                <span class="formNote"><?=CMS_KEYWORD_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Từ khóa EN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($article['keyword_en'])?>" name="keyword_en" class="tipS" />
                <span class="formNote"><?=CMS_KEYWORD_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mô tả page</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" name="des_vn"><?=$article['des_vn']?></textarea>
                <span class="formNote"><?=CMS_DESCRIPTION_VN?></span>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_vn_char" value="<?=$article['des_vn_char']?>" /> ký tự <b><?=CMS_SO_LUONG_GIOI_HAN?></b>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Mô tả page EN:</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" name="des_en"><?=$article['des_en']?></textarea>
                <span class="formNote"><?=CMS_DESCRIPTION_EN?></span>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_en_char" value="<?=$article['des_en_char']?>" /> ký tự <b><?=CMS_SO_LUONG_GIOI_HAN?></b>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id" id="id_this_articles" value="<?=$article['id']?>" />
                <input type="hidden" id="type_of_tag" value="articles" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(document.getElementById('cat').value); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>