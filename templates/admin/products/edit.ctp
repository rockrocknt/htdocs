<? global $product, $stips, $customfields, $tags;

	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
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
		url=url+"&comp=2";
		xmlHttp.onreadystatechange=ReadyTreeFilterChanged;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
	
	function ReadyTreeFilterChanged(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 	
			if(xmlHttp.responseText != "0"){		
				//location.href = "admin.php?do=products&act=add&cid="+xmlHttp.responseText;
			}
			else{
				alert('Danh mục này không thuộc thể loại sản phẩm!');
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
		url=url+"&comp=2";
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
				alert('Danh mục này không thuộc thể loại sản phẩm!');
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

<form name="supplier" id="validate" class="form"
      action="admin.php?do=products&act=<?=$_GET['act']=='add'?'addsm':'editsm'?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Danh mục SP</label>
			<div class="formRight">
            	<div class="selector">
					<?php
                        $c = new Categories();
                        $cid = $product['cid']?$product['cid']:'';
                        if(isset($_GET['cid']))
                            $cid = $_GET['cid'];
                        
                        $tree = $c->admin_tree_filter(1, $cid, 2);
                        echo $tree;
                    ?>
                </div>
                <div class="clear"></div>
            	<span class="formNote">Hãy chọn những danh mục thuộc thể loại sản phẩm (có màu xanh)</span>
			</div>
			<div class="clear"></div>
		</div>

        <?php
        global $db;
        //$product['tag_id_1']
        $sql ="select * from `categories` where `comp`='2'   order by `name_vn` asc ";
        $listCate= $db->getAll($sql);
        // var_dump($listCate);
        ?>



		<div class="formRow">
			<label>Tên sản phẩm VN</label>
			<div class="formRight">
                <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($product['name_vn'])?>" />
                <span class="formNote">Nhập tên sản phẩm sẽ hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên sản phẩm EN</label>
			<div class="formRight">
                <input type="text" name="name_en" class="tipS" value="<?=htmlspecialchars($product['name_en'])?>" />
                <span class="formNote">Nhập tên sản phẩm sẽ hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
        <?php /*?><div class="formRow">
          <label for="tags">Tag sản phẩm:</label>
          <div class="formRight">
            <input type="text" id="tags" name="tags" class="tags" value="" />
            <span class="formNote">Nhập tag cho sản phẩm, mỗi tag cách nhau bằng phím enter hoặc dấu phẩy (,). <strong>Chú ý: không nên copy mà nên gõ tay vào để tránh bị các ký tự đặc biệt.</strong></span>
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
        <div class="formRow ">
            <label>Giá bán hiện tại: </label>
            <div class="formRight">
                <input type="text" id="price" name="price" value="<?=$product['price']?>" class="tipS" style="width:150px;" /> vnđ
                <span class="formNote">Nếu không nhập giá thì sản phẩm sẽ hiện chữ Liên hệ</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow ">
            <label>Giá chưa khuyến mãi:</label>
            <div class="formRight">
                <input type="text" id="price_sale" name="price_sale" value="<?=$product['price_sale']?>" class="tipS" style="width:150px;" /> vnđ
                <span class="formNote">Nếu không khuyến mãi thì để mặc định là 0.</span>
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Mã sản phẩm:</label>
            <div class="formRight">
                <input type="text" id="code_pro" name="code" value="<?=htmlspecialchars($product['code'])?>" class="tipS smalltipS" />
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <br/>
            <label>cid của Nhóm sản phẩm cha:</label>
            <div class="formRight">
                <div class="selector">
                    <select name="cid_cua_groupcha" style="width: 350px;">
                        <option value="0">Chọn danh mục</option>
                        <?
                        $sql = "select * from categories where comp = 5 and id<> 151";
                        $comps2 = $db->getAll($sql);
                        foreach ($comps2 as $display) {
                            ?>
                            <option value="<?=$display['id']?>" <?=$product['cid_cua_groupcha']==$display['id']?'selected="selected"':''?>><?=$display['name_vn']?></option>
                        <? } ?>
                    </select>
                </div>


            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Đánh giá sao:</label>
            <div class="formRight">
                <input type="text" id="rate" name="rate" value="<?=htmlspecialchars($product['rate'])?>" class="tipS smalltipS" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số lượng review:</label>
            <div class="formRight">
                <input type="text" id="so_luong_reviews"
                       name="so_luong_reviews"
                       value="<?=htmlspecialchars($product['so_luong_reviews'])?>"
                       class="tipS smalltipS" />
            </div>
            <div class="clear"></div>
        </div>
        <div class="formRow">
            <label>Số lượng trong kho:</label>
            <div class="formRight">
                <input type="text" id="soluong" name="soluong" value="<?php 
					if (isset($product['soluong'])) {
						echo htmlspecialchars($product['soluong']); 
					}else
					{
						echo "0";
					}
				
				?>" class="tipS smalltipS" />
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow none">
            <label>Text khi số lượng = 0 :</label>
            <div class="formRight">
                <input type="text" id="texthethang" name="texthethang" value="<?=$product['texthethang']?>" class="tipS smalltipS" />
                <span class="formNote">Mặc định để là HẾT HÀNG</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow none">
            <label>Link Flash của sản phẩm<br/>
            Dùng chrome lấy link
                <br>
                <a target="_blank" href="https://docs.google.com/presentation/d/1NmXctrtaC3lFXTl2XiOA4yPzmLsvP6-RmaRANp4O5tA/edit?usp=sharing">
                    Hướng dẫn
                </a>

            </label>
            <div class="formRight none">
                <input type="text" name="link_flash" id="link_flash" class="tipS " value="<?=$product['link_flash']?>" />
                <span class="formNote">Link Flash của sản phẩm</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow ">
            <label>Group name  :</label>
            <div class="formRight">
                <input type="text" id="group_name_vn" name="group_name_vn" value="<?=$product['group_name_vn']?>" class="tipS smalltipS" />
                <span class="formNote">1 key de lấy sản phẩm liên quan vi du: tui-xach-nam</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow ">
            <label>Group name   2:</label>
            <div class="formRight">
                <input type="text" id="group_name2_vn" name="group_name2_vn" value="<?=$product['group_name2_vn']?>" class="tipS smalltipS" />
                <span class="formNote">như 7 tac , 5 tac</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow ">
            <label>Màu sắc:</label>
            <div class="formRight">
                <input type="text" id="color" name="color" value="<?=$product['color']?>" class="tipS smalltipS" />
                <span class="formNote">như đỏ xanh dương</span>
            </div>
            <div class="clear"></div>
        </div>




        <div class="formRow">
            <label>Hình thumb 1:</label>
            <div class="formRight">
                <? if($_GET['act'] == 'edit' && file_exists($product["img"])) { ?>
                    <img src="<?=$product["img"]?>" width="100" alt="" />
                    <a href="admin.php?do=products&act=delete_img&id=<?=$product['id']?>&img_del=img<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
                <? } ?>
                <input type="file" id="file" name="img" />
                <div class="clear"></div>
                <span class="formNote">Tải hình đại diện cho sản phẩm (ảnh đuôi JPEG, GIF , JPG , PNG)
                    420 x 535
                    ex: http://vasterad.com/themes/trizzy/images/shop_item_01_hover.jpg
                </span>
            </div>
            <div class="clear"></div>
        </div>


        <div class="formRow">
            <label>Hình thumb 2:</label>
            <div class="formRight">
                <? if($_GET['act'] == 'edit' && file_exists($product["img2"])) { ?>
                    <img src="<?=$product["img2"]?>" width="100" alt="" />
                    <a href="admin.php?do=products&act=delete_img&id=<?=$product['id']?>&img_del=img2<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" title="Xoá ảnh">Xoá ảnh</a>
                    <br />
                <? } ?>
                <input type="file" id="file2" name="img2" />
                <div class="clear"></div>
                <span class="formNote">Tải hình thumb khi hover cho sản phẩm (ảnh đuôi JPEG, GIF , JPG , PNG)
                    420 x 535
                    ex: http://vasterad.com/themes/trizzy/images/shop_item_01_hover.jpg
                </span>
            </div>
            <div class="clear"></div>
        </div>



        <div class="formRow">
          <label>Tùy chọn:</label>
          <div class="formRight">
            <input type="checkbox" name="is_noindex" id="check2" <?=($product['is_noindex']==1)?'checked="checked"':''?> />
            <label for="check2">Noindex, nofollow <img src="./images/admin/question-button.png" alt="Upload hình" class="icon_que tipS" original-title="Check nếu bạn muốn Google không index sản phẩm này!" /></label>
            <input type="checkbox" name="active" id="check1" value="1" <?=($product['active']==1 || $_GET['act']=='add')?'checked="checked"':''?> />
            <label for="check1">Hiển thị</label>
            <div style="display: none;">
            <input type="checkbox" name="bestseller" id="check3" value="1" <?=($product['bestseller']==1)?'checked="checked"':''?> />
            <label for="check3">Sản Phẩm mới <img src="./images/admin/question-button.png" alt="Upload hình" class="icon_que tipS" original-title="Check nếu bạn muốn sản phẩm được hiện thêm icon New màu đỏ!" /></label>
            </div>
              <div class="none">
              <input type="checkbox" name="not_in_widget"

                     id="not_in_widget" value="1" <?=($product['is_smallimg_quickview']==1)?'checked="checked"':''?> />
            	<label for="not_in_widget">Hiện Icon New - Sản phẩm mới<img src="./images/admin/question-button.png" alt="Tooltip" class="icon_que tipS" original-title="Check nếu bạn muốn sản phẩm được hiện thêm icon New màu đỏ!"></label>
              </div>



          </div>
          <div class="clear"></div>
        </div>
        <div class="formRow none">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$product['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
                <span class="formNote">Số thứ tự hiển thị của sản phẩm, ưu tiên từ nhỏ đến lớn</span>
            </div>
            <div class="clear"></div>
        </div>


		<div class="formRow">
			<label>Mô tả ngắn VN:</label>
			<div class="formRight">
                <?php echo $CKEditor->editor("short_vn", $product['short_vn']);?>


                <span class="formNote">Đoạn mô tả ngắn sản phẩm hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
            <label>Mô tả ngắn ở trang danh mục sản phẩm:</label>
            <div class="formRight">

                <?php echo $CKEditor->editor("descs_en", $product['descs_en']);?>

                <span class="formNote">Đoạn mô tả ngắn sản phẩm hiển thị ở trang tiếng Anh</span>
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Mô tả ngắn EN:</label>
			<div class="formRight">

                <?php echo $CKEditor->editor("short_en", $product['short_en']);?>

                <span class="formNote">Đoạn mô tả ngắn sản phẩm hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Nội dung chính VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung chính của sản phẩm hiển thị ở trang tiếng Việt"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("content_vn", $product['content_vn']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Nội dung chính EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung chính của sản phẩm hiển thị ở trang tiếng Anh"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("content_en", $product['content_en']);?></div>
			<div class="clear"></div>
		</div>
	</div>
    <div class="widget" style="display: none;">
		<div class="title"><img src="./images/admin/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Custom Fields</h6><span class="mynotes">- Thêm các field tuỳ chỉnh</span>
		</div>
        <div>
        	<table cellpadding="0" cellspacing="0" width="100%" class="sTable withCheck mTable" id="checkAll">
                <thead>
                  <tr>
                  	<td style="width:50px !important;"><div>Thứ tự</div></td>
                    <td width="200"><div>Tên field VN</div></td>
                    <td width="300">Giá trị VN</td>
                    <td width="200">Tên field EN</td>
                    <td width="300">Giá trị EN</td>
                    <td width="100">Thao tác</td>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <td colspan="6"></td>
                  </tr>
                </tfoot>
                <tbody id="tableField">
                <? 
                    if ($stips) {
                    for ($i=0; $i<count($stips); $i++) { 
						$id = $stips[$i]['id'];
					?>
                  <tr id="row<?=$id?>">
                    <td>
                    	<input type="hidden" name="listField[]" value="<?=$id?>" />
                        <input type="text" value="<?=$stips[$i]["num"]?>" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Nhập stt" id="number<?=$id?>" onchange="return updateNumber('customfields', '<?=$id?>')" style="width:50%;" />
                    </td>
                    <td><input id="name_vn<?=$id?>" style="width:90%;" type="text" value="<?=$stips[$i]["name_vn"]?>" /></td>
                    <td align="center"><textarea style="width:90%; resize:none;" id="value_vn<?=$id?>"><?=$stips[$i]["value_vn"]?></textarea></td>
                    <td align="center"><input style="width:90%;" id="name_en<?=$id?>" type="text" value="<?=$stips[$i]["name_en"]?>" /></td>
                    <td align="center"><textarea style="width:90%; resize:none;" id="value_en<?=$id?>"><?=$stips[$i]["value_en"]?></textarea></td>
                    <td class="actBtns">
            			<a href="" onclick="updateField(<?=$id?>); return false;" title="" class="smallButton tipS" original-title="Cập nhật custom field"><img src="./images/admin/icons/dark/save.png" alt=""></a>
                        <a href="" onclick="deleteField(<?=$id?>, <?=$product['id']?>); return false;" title="" class="smallButton tipS" original-title="Xóa custom field"><img src="./images/admin/icons/dark/close.png" alt=""></a>
            			<div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$id?>" src="images/site/loader.gif" alt="loader" /></div>
                    </td>
                  </tr>
                  <? } ?>
                  <? } else { ?>
                  <tr id="nofield">
                    <td colspan="6" align="center">Không có custom field nào</td>
                  </tr>
                  <? } ?>
                </tbody>
              </table>
        </div>
		<div class="formRow">
			<label>Chọn field:</label>
			<div class="formRight">
            	<div class="selector">
                    <select onchange="fillValue(this.value)">
                        <option>--- chọn 1 field có sẵn ---</option>
                        <? foreach ($customfields as $field) { ?>
                        <option><?=$field['name_vn']?></option>
                        <? } ?>
                    </select>
                    <input type="hidden" id="alias_custom" name="alias" value="" />
                </div>
                <div class="clear"></div>
            	<span class="formNote">Có thể chọn field mẫu có sẵn hoặc tự thêm field mới, chỉ cần nhập đầy đủ thông tin vào các ô bên dưới</span>
                <div class="ajaxloader"><img src="images/site/loader.gif" alt="loader" /></div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tên field VN</label>
			<div class="formRight">
				<input type="text" value="" id="cname_vn" class="tipS" />
                <span class="formNote">Tên custom field hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Giá trị VN:</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" id="cvalue_vn"></textarea>
                <span class="formNote">Giá trị của custom field hiển thị ở trang tiếng Việt</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tên field EN</label>
			<div class="formRight">
				<input type="text" value="" id="cname_en" class="tipS" />
                <span class="formNote">Tên custom field hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Giá trị EN:</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" id="cvalue_en"></textarea>
                <span class="formNote">Giá trị của custom field hiển thị ở trang tiếng Anh</span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
            	<input type="button" class="blueB" id="addField" value="Thêm custom field" />
			</div>
			<div class="clear"></div>
		</div>
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
			<label>Link sản phẩm VN</label>
			<div class="formRight">
				<input type="text" value="<?=$product['unique_key_vn']?>" name="unique_key_vn" id="unique_key_vn" class="tipS validate[required]" />
                <span class="formNote"><?=CMS_LINK_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Link sản phẩm EN</label>
			<div class="formRight">
				<input type="text" value="<?=$product['unique_key_en']?>" name="unique_key_en" class="tipS" />
                <span class="formNote"><?=CMS_LINK_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tiêu đề page</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($product['title_vn'])?>" name="title_vn" class="tipS" />
                <span class="formNote"><?=CMS_TITLE_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tiêu đề page EN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($product['title_en'])?>" name="title_en" class="tipS" />
                <span class="formNote"><?=CMS_TITLE_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Từ khóa VN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($product['keyword_vn'])?>" name="keyword_vn" class="tipS" />
                <span class="formNote"><?=CMS_KEYWORD_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Từ khóa EN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($product['keyword_en'])?>" name="keyword_en" class="tipS" />
                <span class="formNote"><?=CMS_KEYWORD_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mô tả page</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" name="des_vn"><?=$product['des_vn']?></textarea>
                <span class="formNote"><?=CMS_DESCRIPTION_VN?></span>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_vn_char" value="<?=$product['des_vn_char']?>" /> ký tự <b><?=CMS_SO_LUONG_GIOI_HAN?></b>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Mô tả page EN:</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" name="des_en"><?=$product['des_en']?></textarea>
                <span class="formNote"><?=CMS_DESCRIPTION_EN?></span>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_en_char" value="<?=$product['des_en_char']?>" /> ký tự <b><?=CMS_SO_LUONG_GIOI_HAN?></b>
			</div>
			<div class="clear"></div>
		</div>
		
	</div>
	<?php // include "tieuChiTimKiem.php"; ?>
	<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="id" id="id_this_articles" value="<?=$product['id']?>" />
                <input type="hidden" id="type_of_tag" value="products" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(document.getElementById('cat').value); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div> 
</form>