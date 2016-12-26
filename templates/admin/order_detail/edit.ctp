<? global $product; ?>
<script language="javascript">
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
			//location.href = "admin.php?do=products&act=list&cid="+xmlHttp.responseText;
			//document.getElementById('frmEdit').submit();
		}
		else{
			alert('Thể loại này không thể chứa sản phẩm');
		}
	}
}
</script>
<script language="javascript">
function ValidationForm()
{
	FieldIsValidEqualFckEditor($("#name_vn"), $("#NameVNErrorMess"));
	FieldIsValidEqualFckEditor($("#unique_key_vn"), $("#LinkVNErrorMess"));
	FieldIsValidEqualFckEditor($("#price"), $("#PriceErrorMess"));
	
	return FieldIsValidEqualFckEditor($("#name_vn"), $("#NameVNErrorMess")) && FieldIsValidEqualFckEditor($("#unique_key_vn"), $("#LinkVNErrorMess")) && FieldIsValidEqualFckEditor($("#price"), $("#PriceErrorMess"));
}

$(document).ready( function() {
$("#frmEdit").submit(function(){ 
    if(ValidationForm())  
        return true;
    else  
        return false;  
});
});
</script>

<form name="supplier" id="frmEdit" action="admin.php?do=products&act=<?php
			if($_GET['act'] == 'add')
				print('addsm');
			else
				print('editsm');
        	?>" method="post" enctype="multipart/form-data">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td><!-- start id-form -->
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
          <tr>
            <th valign="top">Thể Loại:</th>
            <td><?php
				$c = new Categories();
				$tree = $c->admin_tree_filter(1,$product['cid'],2);
				echo $tree;
			?></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Name VN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="name_vn" id="name_vn" value="<?=htmlspecialchars($product['name_vn'])?>"  /></td>
            <td><div id="NameVNErrorMess" style="display:none">
                <div class="error-left"></div>
                <div class="error-inner">This field is required.</div>
              </div></td>
          </tr>
          <tr>
            <th valign="top">Name EN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="name_en" value="<?=htmlspecialchars($product['name_en'])?>"  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Code:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="code" value="<?=htmlspecialchars($product['code'])?>"  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Size:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="size" value="<?php
															if($_GET['act']=='add')
																print('0');
															else
																print(htmlspecialchars($product['size']));?>"  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Giá:</th>
            <td><input type="text" onkeypress="return OnlyNumber(event)" class="textboxroundequalfckeditor" id="price" name="price" value="<?php
															if($_GET['act']=='add')
																print('0');
															else
																print($product['price']);?>"  /></td>
            <td><div id="PriceErrorMess" style="display:none">
                <div class="error-left"></div>
                <div class="error-inner">This field is required.</div>
              </div></td>
          </tr>
          <tr>
            <th valign="top">Nhà sản xuất VN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="production_vn" value="<?=isset($_GET['id'])?htmlspecialchars($product['production_vn']):''?>"  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Nhà sản xuất EN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="production_en" value="<?=isset($_GET['id'])?htmlspecialchars($product['production_en']):''?>"  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Bảo hành VN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="warranty_vn" value="<?=isset($_GET['id'])?htmlspecialchars($product['warranty_vn']):'1 năm'?>"  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Bảo hành EN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="warranty_en" value="<?=isset($_GET['id'])?htmlspecialchars($product['warranty_en']):'1 year'?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Image:</th>
            <td  width="400px"><?php
				if($_GET['act'] == 'edit' && $product['img'])
				{
				?>
              <img src="<?=$product['img']?>" width="100px"  /><br />
              <? } ?>
              <input type="file" name="img" class="file_1" size="50" /></td>
            <td><div class="bubble-left"></div>
              <div class="bubble-inner">JPEG, GIF , JPG , PNG</div>
              <div class="bubble-right"></div></td>
          </tr>
          <tr>
            <th valign="top">Show</th>
            <td ><input type="checkbox"  name="active" value="1" <?php
			if( $_GET['act']=='add' || $product['active']=='1')
				print('checked');
		?> /></td>
            <td></td>
          </tr>
          <tr>
            <th>Mô Tả VN:</th>
            <td><?php
								echo $CKEditor->editor("descs_vn", $product['descs_vn']);
							?></td>
            <td></td>
          </tr>
          <tr>
            <th>Mô Tả EN:</th>
            <td><?php
								echo $CKEditor->editor("descs_en", $product['descs_en']);
							?></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top"></th>
            <td><input type="hidden" name="id" value="<?=$product['id']?>" />
              
              <input type="button" class="form-submit" value=" Tạo SEO " onclick="CreateTitleSEO();"  />
              <div class="bubble-left"></div>
              	<div class="bubble-inner">Tạo SEO</div>
              	<div class="bubble-right"></div>
              </td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Link VN</th>
            <td><input class="textboxroundequalfckeditor" type="text" size="50" name="unique_key_vn" id="unique_key_vn" value="<?=$product['unique_key_vn']?>" /></td>
            <td><div id="LinkVNErrorMess" style="display:none">
                <div class="error-left"></div>
                <div class="error-inner">This field is required.</div>
              </div></td>
          </tr>
          <tr>
            <th valign="top">Link EN:</th>
            <td><input class="textboxroundequalfckeditor" type="text" size="50" name="unique_key_en" value="<?=$product['unique_key_en']?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Title VN</th>
            <td class="noheight"><input          class="textboxroundequalfckeditor" type="text" size="70" name="title_vn" value="<?=htmlspecialchars($product['title_vn'])?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Title EN:</th>
            <td><input   class="textboxroundequalfckeditor"  type="text" size="70" name="title_en" value="<?=htmlspecialchars($product['title_en'])?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th>Keyword VN:</th>
            <td><input   class="textboxroundequalfckeditor"  type="text" size="70" name="keyword_vn" value="<?=htmlspecialchars($product['keyword_vn'])?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th>Keyword EN:</th>
            <td><input type="text" size="70" class="textboxroundequalfckeditor"  name="keyword_en" value="<?=htmlspecialchars($product['keyword_en'])?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th>Description VN</th>
            <td><textarea class="textboxroundequalfckeditor" cols="70" rows="5" name="des_vn"><?=htmlspecialchars($product['des_vn'])?>
</textarea></td>
            <td></td>
          </tr>
          <tr>
            <th>Description EN</th>
            <td><textarea class="textboxroundequalfckeditor" cols="70" rows="5" name="des_en"><?=htmlspecialchars($product['des_en'])?>
</textarea></td>
            <td></td>
          </tr>
          <TR>
            <TH valign="top">SEO Footer VN:</TH>
            <TD ><?php
								echo $CKEditor->editor("seo_f_vn", $product['seo_f_vn']);
							?></TD>
            <td></td>
          </TR>
          <TR>
            <TH valign="top"><strong>SEO Footer EN:</strong></TH>
            <TD><?php
								echo $CKEditor->editor("seo_f_en", $product['seo_f_en']);
							?></TD>
            <td></td>
          </TR>
          <tr>
            <th></th>
            <td><input type="submit" name="Submit"  value=" Save " class="form-submit" value=" Save " /></td>
            <td></td>
          </tr>
        </table>
        <!-- end id-form  --></td>
      <td><!--  start related-activities -->
        <div id="related-activities">
          <!--  start related-act-top -->
          <!-- end related-act-top -->
          <!--  start related-act-bottom -->
          <!-- end related-act-bottom -->
        </div>
        <!-- end related-activities --></td>
    </tr>
    <tr>
      <td><img src="images/shared/blank.gif" width="695" height="1" alt="blank" /></td>
      <td></td>
    </tr>
  </table>
  <div class="clear"></div>
</form>