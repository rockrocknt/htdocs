<? global $cat; ?>

<script language="javascript">
function CheckHasChild(chk){
	if(chk.checked==false){
		document.getElementById('comp').disabled = false;
	}
	else{
		document.getElementById('comp').selectedIndex  = 0;
	}
}

function ValidationForm()
{
	var name_vn = document.getElementById("name_vn");
	var NameVNErrorMess = document.getElementById("NameVNErrorMess");
	var unique_key_vn = document.getElementById("unique_key_vn");
	var LinkVNErrorMess = document.getElementById("LinkVNErrorMess");
	
	FieldIsValidEqualFckEditorJS(name_vn, NameVNErrorMess);
	FieldIsValidEqualFckEditorJS(unique_key_vn, LinkVNErrorMess);
	
	return FieldIsValidEqualFckEditorJS(name_vn, NameVNErrorMess) && FieldIsValidEqualFckEditorJS(unique_key_vn, LinkVNErrorMess);
}
</script>

<form onsubmit="return ValidationForm();" name="supplier" id="frmEdit" action="admin.php?do=userlog&act=<?php
  
			$isAdd = false;
			if($_GET['act'] == 'add')
			{
				print('addsm');
				$isAdd = true;
			}
			else
			{
				print('deletesm');
			}
        	?>&cid=<?=$_GET["cid"]?>&root=<?=$_GET["root"]?><?=(isset($_GET['page'])?'&page='.$_GET['page']:'')?>" method="post" enctype="multipart/form-data">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td><!-- start id-form -->
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
          <tr>
            <th valign="top">Tên Loại VN:</th>
            <td><input type="text" name="name_vn" id="name_vn" class="textboxroundequalfckeditor" value="<?
						if (!$isAdd)
						{ 
						   echo $cat['name_vn'];
						}
						?>" /></td>
            <td>
            	<div id="NameVNErrorMess" style="display:none">
                    <div class="error-left"></div>
                    <div class="error-inner">This field is required.</div>
                </div>
            </td>
          </tr>
          <tr>
            <th valign="top">Tên Loại EN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="name_en"   value="<? 
						if (!$isAdd)
						{ 
						echo	$cat['name_en'];
						}
						?>"  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Image:</th>
            <td  width="400px"><?php
				if($_GET['act'] == 'edit' && $cat['img'])
				{
				?>
              <img src="<?=$cat['img']?>" width="100px"  /><br />
              <? } ?>
              <input type="file" name="img" class="file_1" size="50" /></td>
            <td><div class="bubble-left"></div>
              <div class="bubble-inner">JPEG, GIF , JPG , PNG</div>
              <div class="bubble-right"></div></td>
          </tr>
          <tr>
            <th valign="top">Số Thứ Tự</th>
            <td><input type="text"  class="textboxroundequalfckeditor" style="width:20px;" size="5" name="stt" value="<?php
        if($_GET['act']=='add')
			print('0');
		else
			print($cat['num']);
		?>" onKeyPress="return OnlyNumber(event)" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Show</th>
            <td ><input type="checkbox" name="showed" value="showed" <?php
				if (!$isAdd)
						{ 	
						if($cat['showed']=='1')
							{
									print('checked');
								} 		  
									
						}else
						{
							print('checked');
							}
		?> />  </td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Danh mục hot</th>
            <td ><input type="checkbox" name="hot_cat_showed" value="1" <?php
				if (!$isAdd)
						{ 	
						if($cat['hot_cat_showed']=='1')
							{
									print('checked');
								} 		  
									
						}
		?>/> </td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Có Menu Con?</th>
            <td><input type="checkbox" name="has_child" value="has_child" onClick="CheckHasChild(this);" <?php
				if (!$isAdd)
			{
				if($cat['has_child']=='1')
					print('checked');
			}
			
		?>  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Component</th>
            <td><select  class="styledselect-day" style="width:200px;" name="comp" id="comp" <?php
				/*if($cat['has_child']=='1')
					print('disabled="true"');*/
            ?>>
                <?php
					global $db;
					$sql = "select id, name from component where active=1 order by id asc";
					$comps = $db->getAll($sql);
					if($comps){
						for($i=0;$i<count($comps);$i++){
				?>
                <option value="<?=$comps[$i]['id']?>" <?php
								if (!$isAdd)
			{
								if($cat['comp']==$comps[$i]['id'])
								{
									print('selected');
								}
			}
								if($_GET['act']=='add' && $comps[$i]['name']=='None')
									print('selected');
                            ?>>
                <?=$comps[$i]['name']?>
                </option>
                <?
						}
					}
				?>
              </select></td>
            <td><input type="hidden" name="id" value="<? 
			if (!$isAdd)
			{
				echo $cat['id'];
			}
			?>" /></td>
          </tr>
          <TR>
						<TH valign="top">Mô Tả VN:</TH>
						<TD>
							<?php
								echo $CKEditor->editor("desc_vn", $cat['desc_vn']);
							?>
						</TD>
					</TR>
					<TR>
						<TH valign="top">Mô Tả EN:</TH>
						<TD >
                            <?php
								echo $CKEditor->editor("desc_en", $cat['desc_en']);
							?>
						</TD>
					</TR>
                    <TR>
            <TH valign="top">SEO Footer VN:</TH>
            <TD >
             	<?php
								echo $CKEditor->editor("seo_f_vn", $cat['seo_f_vn']);
							?>
          	</TD>
          </TR>
          <TR>
            <TH valign="top"><strong>SEO Footer EN:</strong></TH>
            <TD><?php
								echo $CKEditor->editor("seo_f_en", $cat['seo_f_en']);
							?></TD>
          </TR>
          <tr>
            <th valign="top"></th>
            <td> 
              <input type="button" class="form-submit" value=" Tạo SEO " onClick="CreateTitleSEO();"  />
              <div class="bubble-left"></div>
              	<div class="bubble-inner">Tạo SEO</div>
              	<div class="bubble-right"></div>
              </td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Link VN</th>
            <td><input class="textboxroundequalfckeditor" type="text" size="50" name="unique_key_vn" id="unique_key_vn" value="<?
			if (!$isAdd)
			{
     echo       $cat['unique_key_vn'];
			}
			?>" /></td>
            <td>
            	<div id="LinkVNErrorMess" style="display:none">
                    <div class="error-left"></div>
                    <div class="error-inner">This field is required.</div>
                </div>
            </td>
          </tr>
          <tr>
            <th valign="top">Link EN:</th>
            <td><input class="textboxroundequalfckeditor" type="text" size="50" name="unique_key_en" value="<?
			if (!$isAdd)
			{
	echo            $cat['unique_key_en'];
			}
			?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Title VN</th>
            <td class="noheight"><input          class="textboxroundequalfckeditor" type="text" size="70" name="title_vn" value="<?
						if (!$isAdd)
			{
	echo                        $cat['title_vn'];
			}
			?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Title EN:</th>
            <td><input   class="textboxroundequalfckeditor"  type="text" size="70" name="title_en" value="<?
						if (!$isAdd)
			{
	echo                        $cat['title_en'];
			}
			
			?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th>Keyword VN:</th>
            <td><input   class="textboxroundequalfckeditor"  type="text" size="70" name="keyword_vn" value="<? 
														if (!$isAdd)
			{

					echo  $cat['keyword_vn'];
			}
								?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th>Keyword EN:</th>
            <td><input type="text" size="70" class="textboxroundequalfckeditor"  name="keyword_en" value="<?=$isAdd?'':$cat['keyword_en']?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th>Description VN</th>
            <td><textarea class="textboxroundequalfckeditor" cols="70" rows="5" name="des_vn"><?=$isAdd?'':$cat['des_vn']?>
</textarea></td>
            <td></td>
          </tr>
          <tr>
            <th>Description EN</th>
            <td><textarea class="textboxroundequalfckeditor" cols="70" rows="5" name="des_en"><?=$isAdd?'':$cat['des_en']?>
</textarea></td>
            <td></td>
          </tr>
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