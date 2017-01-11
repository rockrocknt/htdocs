<? 
	global $cat; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
	
	$h1_vn = $h2_vn = $seo_des_vn = $h1_en = $h2_en = $seo_des_en = "";
	if ($cat["seo_f_vn"])
	{
		$h1_vn = getString($cat["seo_f_vn"], "<h1>", "</h1>");
		$h2_vn = getString($cat["seo_f_vn"], "<h2>", "</h2>");
		$seo_des_vn = getString($cat["seo_f_vn"], "<p>", "</p>");
	}
	if ($cat["seo_f_en"])
	{
		$h1_en = getString($cat["seo_f_en"], "<h1>", "</h1>");
		$h2_en = getString($cat["seo_f_en"], "<h2>", "</h2>");
		$seo_des_en = getString($cat["seo_f_en"], "<p>", "</p>");
	}
    $seo_des_vn =$cat["des_vn"];
?>

<script type="text/javascript">
	function TreeFilterChanged(value){
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request");
		  return;
		  } 
		var url="ajax/check.php";
		url=url+"?id="+value;
		url=url+"&sid="+Math.random();
		xmlHttp.onreadystatechange=ReadyTreeFilterChanged;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	}
	
	function ReadyTreeFilterChanged(){
		if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
		{ 	
			if(xmlHttp.responseText != "0"){		
				//location.href = "admin.php?do=categories&act=add&cid="+xmlHttp.responseText;
			}
			else{
				alert('Danh mục này không phải thể loại có menu con!');
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
		var url="ajax/check.php";
		url=url+"?id="+value;
		url=url+"&sid="+Math.random();
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
				alert('Danh mục này không phải thể loại có menu con!');
			}
		}
	}
	
	function alertWarning(){
		if(confirm("Các thông tin trong phần 'Nội dung SEO' sẽ bị trở về trạng thái ban đầu!"))
		{
			return CreateTitleSEO();
		}
	}
	
	function checkComponent(newcomp, oldcom, flag) {
        /*
		if (oldcom == 5) {
			alert('Đây là trang chủ, vui lòng không đổi thể loại!');
			location.reload();
		}
		*/
		if (oldcom == 23) {
			alert('Đây là trang liên hệ, vui lòng không đổi thể loại!');
			location.reload();
		}
		if (oldcom == 1) {
			if (!confirm("Nếu bạn đổi thể loại, các Bài viết trong danh mục này sẽ bị sai link! Cần cập nhật lại link!")) {
				location.reload();
			}
		}
		if (oldcom == 2) {
			if (!confirm("Nếu bạn đổi thể loại, các Sản phẩm trong danh mục này sẽ bị sai link! Cần cập nhật lại link!")) {
				location.reload();
			}
		}
		if ((oldcom == 9)) {
			if (!confirm("Nếu bạn đổi thể loại, các Danh mục con trong danh mục này sẽ bị sai link! Cần cập nhật lại link!")) {
				location.reload();
			}
		}
		if (newcomp == 3) {
			$('.html_content_vn').show();
			if (flag == 1) {
				$('.html_content_en').show();
			}
		}
		else{
			$('.html_content_vn').hide();
			$('.html_content_en').hide();
		}
	}
</script>

<form name="supplier" id="validate" class="form" action="admin.php?do=categories&act=<?=$_GET['act']=='add'?'addsm':'editsm'?>&cid=<?=$_GET["cid"]?>&root=1<?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
        <div class="widget">
            <div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
                <h6>Nhập dữ liệu</h6>
            </div>
            <div class="formRow">
                <label>Danh mục cha</label>
                <div class="formRight">
                    <div class="selector">
                        <?php
                            $c = new Categories();
                            $cid = $cat['pid']?$cat['pid']:'';
                            if(isset($_GET['cid']))
                                $cid = $_GET['cid'];

                            $tree = $c->admin_tree_filter(1, $cid, 0);
                            echo $tree;
                        ?>
                    </div>
                    <div class="clear"></div>
                    <span class="formNote">Hãy chọn những danh mục thuộc thể loại có menu con. Chú ý: 1 danh mục không thể làm danh mục con của chính nó!</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow">
                <label>Tên danh mục VN</label>
                <div class="formRight">
                    <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($cat['name_vn'])?>" />
                    <span class="formNote">Nhập tên danh mục sẽ hiển thị ở trang tiếng Việt</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow ">
                <label>Group Name VN

                    <br/>

                </label>
                <div class="formRight">
                    <input type="text" name="group_name_vn" id="group_name_vn" class="tipS" value="<?=htmlspecialchars($cat['group_name_vn'])?>" />
<span class="formNote">Dùng để hiện bài viết intro liên quan. Format: tui-xach-nam ( chi 1 key thoi de select where = key này)</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow" <?=$showEnglish?>>
                <label>Tên danh mục EN</label>
                <div class="formRight">
                    <input type="text" name="name_en" class="tipS" value="<?=htmlspecialchars($cat['name_en'])?>" />
                    <span class="formNote">Nhập tên danh mục sẽ hiển thị ở trang tiếng Anh</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Liên kết ngoài (VN)</label>
                <div class="formRight">
                    <input type="text" name="ext_url_vn" class="tipS" value="<?=$cat['ext_url_vn']?>" />
                    <span class="formNote">Khi bấm vào danh mục sẽ chuyển đến trang liên kết này, mặc định bỏ trống</span>
                </div>
                <div class="clear"></div>
            </div>




            <div class="formRow" <?=$showEnglish?>>
                <label>Liên kết ngoài (EN)</label>
                <div class="formRight">
                    <input type="text" name="ext_url_en" class="tipS" value="<?=$cat['ext_url_en']?>" />
                    <span class="formNote">Khi bấm vào danh mục sẽ chuyển đến trang liên kết này, mặc định bỏ trống</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow none">
                <label>Liên kết ngoài</label>
                <div class="formRight">
                    <input type="text" name="ext_url" class="tipS" value="<?=$cat['ext_url']?>" />
                    <span class="formNote">Khi bấm vào danh mục sẽ chuyển đến trang liên kết này, mặc định bỏ trống</span>
                </div>
                <div class="clear"></div>
            </div>




            <?php // if ($_GET["cid"] != 121) { ?>
            <div class="formRow ">
                <label>Hình đại diện:</label>
                <div class="formRight">
                    <? if($_GET['act'] == 'edit' && file_exists($cat["img"])) { ?>
                        <img src="<?=$cat["img"]?>" width="200" alt="" />
                        <a href="admin.php?do=categories&act=delete_img&id=<?=$cat['id']?>&img_del=img<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>&root=1" title="Xoá ảnh">Xoá ảnh</a>
                        <br />
                    <? } ?>
                    <input type="file" id="file" name="img" />
                    <div class="clear"></div>
                    <span class="formNote">Tải hình đại diện cho danh mục (ảnh đuôi JPEG, GIF , JPG , PNG)</span>
                </div>
                <div class="clear"></div>
            </div>

            <?php // if ($_GET["cid"] != 121) { ?>
            <div class="formRow" <?=$showEnglish?>>
                <label>Hình đại diện Thể loại:</label>
                <div class="formRight">
                    <? if($_GET['act'] == 'edit' && file_exists($cat["img_vn"])) { ?>
                        <img src="<?=$cat["img_vn"]?>" width="200" alt="" />
                        <a href="admin.php?do=categories&act=delete_img&id=<?=$cat['id']?>&img_del=img_vn<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>&root=1" title="Xoá ảnh">Xoá ảnh</a>
                        <br />
                    <? } ?>
                    <input type="file"   name="img_vn" />
                    <div class="clear"></div>
                    <span class="formNote">Tải hình đại diện cho danh mục (ảnh đuôi JPEG, GIF , JPG , PNG)</span>
                </div>
                <div class="clear"></div>
            </div>

            <?php // if ($_GET["cid"] != 121) { ?>
            <div class="formRow" <?=$showEnglish?>>


            <label>Hình đại diện Thể loại:(EN)</label>
                <div class="formRight">
                    <? if($_GET['act'] == 'edit' && file_exists($cat["img_en"])) { ?>
                        <img src="<?=$cat["img_en"]?>" width="200" alt="" />
                        <a href="admin.php?do=categories&act=delete_img&id=<?=$cat['id']?>&img_del=img_en<?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>&root=1" title="Xoá ảnh">Xoá ảnh</a>
                        <br />
                    <? } ?>
                    <input type="file"   name="img_en" />
                    <div class="clear"></div>
                    <span class="formNote">Tải hình đại diện cho danh mục (ảnh đuôi JPEG, GIF , JPG , PNG)</span>
                </div>
                <div class="clear"></div>
            </div>



            <div class="formRow none">
                <label>Đường dẫn của Banner Top</label>
                <div class="formRight">
                    <input type="text" name="banner_top_url" class="tipS" value="<?=$cat['banner_top_url']?>" />
                    <span class="formNote">Khi bấm vào banner top sẽ chuyển đến trang liên kết này, mặc định bỏ trống</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
              <label>Tùy chọn:</label>
              <div class="formRight">
                <input type="checkbox" name="active" id="active" value="1" <?=($cat['active']==1 || $_GET['act']=='add')?'checked="checked"':''?> />
                <label for="active">Hiển thị</label>

              </div>
              <div class="clear"></div>
            </div>
            <div class="formRow">
                <label>Số thứ tự: </label>
                <div class="formRight">
                    <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$cat['num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)">
                    <span class="formNote">Thứ tự hiển thị của danh mục, sắp xếp tăng dần từ nhỏ đến lớn</span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow">
                <?
                    global $db;
                    if ($_GET['act']=='add') {
                        $sql = "select * from component where active=1 and id<>5 and id<>23 order by id asc";
                    } else {
                        $sql = "select * from component where active=1 order by id asc";
                    }
                $sql = "select * from component where active=1 order by id asc";
                    $comps = $db->getAll($sql);
                ?>
                <label>Chọn thể loại:</label>
                <div class="formRight">
                    <a target="_blank" href="">
                        Link tổng hợp thể loại
                    </a>
                    <div class="selector" style="clear: right;">
                        <select name="comp" onchange="checkComponent(this.value, '<?=$cat['comp']?>', '<?=$temp?>')">
                            <? foreach ($comps as $comp) { ?>
                            <option value="<?=$comp['id']?>" <?=$cat['comp']==$comp['id']?'selected="selected"':''?>><?=$comp['name']?></option>
                            <? } ?>
                        </select>
                    </div>


                    </div>
                    <div class="clear"></div>
                    <span class="formNote">Mỗi thể loại có chức năng khác nhau. Ví dụ: loại Tin tức để chứa tin tức, loại Sản phẩm để chứa sản phẩm, loại Có menu con để chứa các danh mục con khác.</span>

                    <div class="clear"></div>
                </div>
        <?
        global $db;
        $sql = "select * from categories_displaytype ";
        $comps = $db->getAll($sql);

        ?>
        <div class="formRow">
            <br/>
            <label>Kiểu hiển thị:</label>
            <div class="formRight">
                <div class="selector">
                    <select name="categories_displaytype_id" style="width: 350px;">
                        <? foreach ($comps as $display) {

                            ?>
                            <option value="<?=$display['categories_displaytype_id']?>" <?=$cat['categories_displaytype_id']==$display['categories_displaytype_id']?'selected="selected"':''?>><?=$display['categories_displaytype_name']?></option>
                        <? } ?>
                    </select>
                </div>


                </div>
			<div class="clear"></div>
		</div>

            <div class="formRow none">
                <br/>
                <label>Cid menu left danh mục sản phẩm:</label>
                <div class="formRight">
                    <div class="selector">
                        <select name="cid_menu_left" style="width: 350px;">
                            <?
                            $sql = "select * from categories where comp = 5  order by name_vn";
                            $comps2 = $db->getAll($sql);
                            foreach ($comps2 as $display) {
                                ?>
                                <option value="<?=$display['id']?>" <?=$cat['cid_menu_left']==$display['id']?'selected="selected"':''?>><?=$display['name_vn']?>  <?=$display['id']?></option>
                            <? } ?>


                            <?
                            $sql = "select * from categories where comp = 2  order by name_vn";
                            $comps2 = $db->getAll($sql);
                            foreach ($comps2 as $display) {
                                ?>
                                <option value="<?=$display['id']?>" <?=$cat['cid_menu_left']==$display['id']?'selected="selected"':''?>><?=$display['name_vn']?>  <?=$display['id']?></option>
                            <? } ?>

                        </select>

                    </div>


                </div>
                <br/><br/>
                <span class="formNote">Nếu kiểu hiển thị là "Show các vali giảm giá (thể loại Thẻ Tag)" thì field cid list mình nhập cid top cha cao nhất (khi list sẽ lấy sản phẩm thuộc cid này)</span>
                <div class="clear"></div>
            </div>

            <div class="formRow " >
                <label>Text cần tìm cho Kiểu hiển thị là Sản Phẩm Thương hiệu </label>
                <div class="formRight">
                    <input type="text" name="search_key" class="tipS" value="<?=$cat['search_key']?>" />
                    <span class="formNote">Hiện cat danh mục sản phẩm ở sidebar trong Giới Thiệu- mẫu: ;1;2;</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow " >
                <label>product cid list</label>
                <div class="formRight">
                    <input type="text" name="productcidlist" class="tipS" value="<?=$cat['productcidlist']?>" />
                    <span class="formNote">Hiện cat danh mục sản phẩm ở sidebar trong Giới Thiệu- mẫu: ;1;2;</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow " >
                <label>Giá min</label>
                <div class="formRight">
                    <input type="text" name="product_min_price" class="tipS" value="<?=$cat['product_min_price']?>" />
                    <span class="formNote">dùng cho thể loại Giới Thiệu - Kiểm hiển thị Lọc giá. Format : 1000000</span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow " >
                <label>Giá max</label>
                <div class="formRight">
                    <input type="text" name="product_max_price" class="tipS" value="<?=$cat['product_max_price']?>" />
                    <span class="formNote">dùng cho thể loại Giới Thiệu - Kiểm hiển thị Lọc giá
                        nếu để 0 thì không xét max
                    </span>
                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow " >
                <label>cid list</label>
                <div class="formRight">
                    <input type="text" name="cidlist" class="tipS" value="<?=$cat['cidlist']?>" />
                    <span class="formNote">dùng cho thể loại (Giới thiệu hoặc Có menu con) - Kiểu show tất cả sản phẩm- mẫu: ;1;2;</span>
                </div>
                <div class="clear"></div>
            </div>



            <div class="formRow ">
                <label>Dạng menu con

                </label>
                <div class="formRight">
                    <input type="text" name="menu_con_type" class="tipS" value="<?=$cat['menu_con_type']?>" />
                    <span class="formNote">1: menu con dạng bình thường , 2 menu con dạng nhiều cột - thể loại Menu con hoặc trang chủ. 0 là ko show menu con</span>
                </div>
                <div class="clear"></div>
            </div>


            <div class="formRow">
                <label>Html menu con:</label>
                <div class="formRight">
                    <span class="formNote">HTML của menu con ở menu chính - thể loại Có Menu Con hoặc Trang chủ </span>

                    <?php // echo $CKEditor->editor("html_menucon_vn", $cat['html_menucon_vn']);?>

                    <textarea rows="10" cols="" class="tipS" name="html_menucon_vn"><?=$cat["html_menucon_vn"]?></textarea>
                    <span class="formNote"><a href="<?=GOOGLE_DOC?>" target="_blank">xem mẫu</a></span>


                </div>
                <div class="clear"></div>
            </div>

            <div class="formRow none">
                <label>Số Sản phẩm trên 1 dòng (: </label>
                <div class="formRight">
                    <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'2':$cat['product_in_one_row']?>" name="product_in_one_row" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
                    <span class="formNote">Số sản phẩm trên 1 dòng, chỉ ứng dụng trong Thể loại Sản phẩm - Bình thường </span>
                </div>
                <div class="clear"></div>
            </div>
            <div class="formRow " >
                <label>Product ID list</label>
                <div class="formRight">
                    <input type="text" name="productidlistlienquan" class="tipS" value="<?=$cat['productidlistlienquan']?>" />
                    <span class="formNote">trong thể loại giới thiệu hiện product liên quan ở sidebar. không nhập thì hiện random.
                      vd: 7;9;10
                    </span>
                </div>
                <div class="clear"></div>
            </div>



		<div class="formRow">
			<label>Mô tả ngắn VN:</label>
			<div class="formRight">

                <?php
                $content = "";
                if (isset($cat['short_vn']))
                {
                    if ($cat['short_vn'] == ""){
                        $content =$cat['short_desc'];
                    }else
                    {
                        $content = $cat['short_vn'];
                    }
                }

                echo $CKEditor->editor("short_vn", $content);?>


                <span class="formNote">Đoạn mô tả ngắn danh mục sẽ hiển thị ở trang tiếng Việt</span> 
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Mô tả ngắn EN:</label>
			<div class="formRight">
                <?php echo $CKEditor->editor("short_en", $cat['short_en']);?>

                <span class="formNote">Đoạn mô tả ngắn danh mục sẽ hiển thị ở trang tiếng Anh</span> 
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow html_content_vn"

            <?
            /*
            $cat['comp']==3 || $cat['comp']==23?'':'style="display:none;"'
            */
            ?>>
			<label>Nội dung chính VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung chính của danh mục hiển thị ở trang tiếng Việt"> </label>
			<div class="formRight">

                <?php
                $content = "";
                if (isset($cat['content_vn']))
                {
                    if ($cat['content_vn'] == ""){
                        global $db;
                        $sql = "select * from intro where  id=".$cat['id'];
                        $row = $db->getRow($sql);
                        $content = $row['content_vn'];
                    }else
                    {
                        $content = $cat['content_vn'];
                    }
                }
                echo $CKEditor->editor("content_vn", $content);?>

            </div>
			<div class="clear"></div>
		</div>
		<div class="formRow html_content_en" <?=($cat['comp']==3 || $cat['comp']==23) && $temp==1?'':'style="display:none;"'?>>
			<label>Nội dung chính EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung chính của danh mục hiển thị ở trang tiếng Anh"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("content_en", $cat['content_en']);?></div>
			<div class="clear"></div>
		</div>
	</div>
    <div class="widget">
        <div class="formRow">
            <label>SEO footer:</label>
            <div class="formRight">

                <?php echo $CKEditor->editor("seo_f_vn", $cat['seo_f_vn']);?>


                <span class="formNote">seo footer </span>
            </div>
            <div class="clear"></div>
        </div>


    </div>
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Nội dung SEO</h6><span class="mynotes">- Phần dành cho Google đọc</span>
		</div>
        <div class="formRow">
            <label>Thẻ h1

            </label>
            <div class="formRight">
                <input type="text" value="<?php
                if (isset($cat['id'])){
                    $string = $cat['h1_vn'];
                    if ($string == "")
                        $string = $cat['name_vn'];
                    echo $string;
                }else{

                }

                ?>" name="h1_vn" id="h1_vn" class="tipS " />
                <span class="formNote"><?=CMS_H1_VN?></span>
            </div>
            <div class="clear"></div>
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
			<label>Link danh mục VN</label>
			<div class="formRight">
				<input type="text" value="<?=$cat['unique_key_vn']?>" name="unique_key_vn" id="unique_key_vn" class="tipS validate[required]" />
                <span class="formNote"><?=CMS_LINK_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Link danh mục EN</label>
			<div class="formRight">
				<input type="text" value="<?=$cat['unique_key_en']?>" name="unique_key_en" class="tipS" />
                <span class="formNote"><?=CMS_LINK_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Tiêu đề page</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($cat['title_vn'])?>" name="title_vn" class="tipS" />
                <span class="formNote"><?=CMS_TITLE_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Tiêu đề page EN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($cat['title_en'])?>" name="title_en" class="tipS" />
                <span class="formNote"><?=CMS_TITLE_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Từ khóa VN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($cat['keyword_vn'])?>" name="keyword_vn" class="tipS" />
                <span class="formNote"><?=CMS_KEYWORD_VN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Từ khóa EN</label>
			<div class="formRight">
				<input type="text" value="<?=htmlspecialchars($cat['keyword_en'])?>" name="keyword_en" class="tipS" />
                <span class="formNote"><?=CMS_KEYWORD_EN?></span>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<label>Mô tả page:</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" name="des_vn"><?=$cat['des_vn']?></textarea>
                <span class="formNote"><?=CMS_DESCRIPTION_VN?></span>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_vn_char" value="<?=$cat['des_vn_char']?>" /> ký tự <b><?=CMS_SO_LUONG_GIOI_HAN?></b>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Mô tả page EN:</label>
			<div class="formRight">
				<textarea rows="8" cols="" class="tipS" name="des_en"><?=$cat['des_en']?></textarea>
                <span class="formNote"><?=CMS_DESCRIPTION_EN?></span>
                <input readonly="readonly" type="text" style="width:25px; margin-top:10px; text-align:center;" name="des_en_char" value="<?=$cat['des_en_char']?>" /> ký tự <b><?=CMS_SO_LUONG_GIOI_HAN?></b>
			</div>
			<div class="clear"></div>
		</div>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$cat['id']?>" />
            	<input type="button" class="blueB" onclick="TreeFilterChanged2(document.getElementById('cat').value); return false;" value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>