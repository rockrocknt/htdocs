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

<form name="supplier" id="validate" class="form" action="admin.php?do=productattchild&act=<?=$_GET['act']=='add'?'addsm':'editsm'?><?=isset($_GET['productatt_id'])?('&productatt_id='.$_GET['productatt_id']):''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Thuộc tiêu chí cha</label>
			<div class="formRight">
            	<div class="selector">
                    <select name="productatt_id">
                        <?php
                        global $productattList;
                        $parent = isset($_GET['productatt_id'])?(''.$_GET['productatt_id']):'';
                        for($i = 0; $i < count($productattList); $i++)
                        {
                            $productatt = $productattList[$i];
                            ?>
                        <option value="<?=$productatt['productatt_id']?>"
                            <?php
                            if ($parent == $productatt['productatt_id'])
                            echo "selected";
                            ?>
                            ><?=$productatt['productatt_name_vn']?></option>

                        <?php
                        }
                        ?>

                    </select>

                </div>
                <div class="clear"></div>
            	<span class="formNote">Đây là thuộc tính cha</span>
			</div>
			<div class="clear"></div>
		</div>
        <div class="formRow">
            <label>Số thứ tự: </label>
            <div class="formRight">
                <input type="text" class="tipS" value="<?=$_GET['act']=='add'?'0':$product['productattchild_num']?>" name="num" style="width:20px; text-align:center;" onkeypress="return OnlyNumber(event)" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>
		<div class="formRow">
			<label>Tên tiêu chí con</label>
			<div class="formRight">
                <input type="text" name="name_vn" id="name_vn" class="tipS validate[required]" value="<?=htmlspecialchars($product['productattchild_name_vn'])?>" />
                <span class="formNote"></span>
			</div>
			<div class="clear"></div>
		</div>

        <div class="formRow">
            <label>Mã màu (dùng cho Tiêu chí cha là Màu sắc)</label>
            <div class="formRight">
                <input type="text" name="productattchildc_colorcode" id="productattchildc_colorcode" class="tipS validate[required]" value="<?=htmlspecialchars($product['productattchildc_colorcode'])?>" />
                <span class="formNote"></span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow" style="display: none;">
            <label>Tải hình ảnh:</label>
            <div class="formRight">
                <? if($_GET['act'] == 'edit' && file_exists($product["productattchild_img"])) { ?>
                    <img src="<?=getTimThumb($product["productattchild_img"], 100)?>" alt="" />
                    <br />
                <? } ?>
                <input type="file" id="file" name="img" />
                <div class="clear"></div>
                <span class="formNote"> chỉ sử dụng khi thuộc tính cha là Màu sắc(ảnh đuôi JPEG, GIF , JPG , PNG)</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Giá Trị Min</label>
            <div class="formRight">
                <input type="text" name="productattchild_minvalue" id="productattchild_minvalue" class="tipS" value="<?=htmlspecialchars($product['productattchild_minvalue'])?>" />
                <span class="formNote">chỉ sử dụng khi Thuộc tiêu chí cha KHOẢNG GIÁ</span>
            </div>
            <div class="clear"></div>
        </div>

        <div class="formRow">
            <label>Giá Trị Max</label>
            <div class="formRight">
                <input type="text" name="productattchild_maxvalue" id="productattchild_maxvalue" class="tipS" value="<?=htmlspecialchars($product['productattchild_maxvalue'])?>" />
                <span class="formNote">chỉ sử khi Thuộc tiêu chí cha KHOẢNG GIÁ</span>
            </div>
            <div class="clear"></div>
        </div>
	</div>

	<div class="widget">

		<div class="formRow">
			<div class="formRight">
                <input type="hidden" name="productattchild_id" id="id_this_articles" value="<?=$product['productattchild_id']?>" />

            	<input type="submit" class="blueB"   value="Hoàn tất" />
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>