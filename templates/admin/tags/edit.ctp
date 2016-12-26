<? global $tag; ?>

<script language="javascript">
function FormIsValid()
{
	var name_vn = document.getElementById("tags_keyword");
	var NameVNErrorMess = document.getElementById("NameVNErrorMess");
	var unique_key_vn = document.getElementById("tags_unique_key");
	var LinkVNErrorMess = document.getElementById("LinkVNErrorMess");
	
	FieldIsValidEqualFckEditorJS(name_vn, NameVNErrorMess);
	FieldIsValidEqualFckEditorJS(unique_key_vn, LinkVNErrorMess);
	
	return FieldIsValidEqualFckEditorJS(name_vn, NameVNErrorMess) && FieldIsValidEqualFckEditorJS(unique_key_vn, LinkVNErrorMess);
}
</script>

<form name="supplier" id="frmEdit" action="admin.php?do=tags&act=<?php
			if($_GET['act'] == 'add')
				print('addsm');
			else
				print('editsm');
        	?><?=isset($_GET['pro_id'])?'&pro_id='.$_GET['pro_id']:''?><?=isset($_GET['art_id'])?'&art_id='.$_GET['art_id']:''?><?=isset($_GET['cat_id'])?'&cat_id='.$_GET['cat_id']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" method="post" enctype="multipart/form-data">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td><!-- start id-form -->
        
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
          <tr>
            <th valign="top">Tên tag:</th>
            <td><?php
				echo $CKEditor->editor("tags_name", $tag['tags_name']);
			?></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Từ khóa tag:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="tags_keyword" id="tags_keyword" value="<?=htmlspecialchars($tag['tags_keyword'])?>"  /></td>
            <td><div id="NameVNErrorMess" style="display:none">
                    <div class="error-left"></div>
                    <div class="error-inner">this field is required.</div>
                </div></td>
          </tr>
          <tr>
            <th valign="top">Show</th>
            <td ><input type="checkbox" name="tags_active" value="1" <?php
			if( $_GET['act']=='add' || $tag['tags_active']=='1')
				print('checked');
		?> /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top"></th>
            <td><input type="hidden" name="id" value="<?=$tag['tags_id']?>" />
              <input type="button" class="form-submit" value=" Tạo SEO " onclick="CreateTagSEO();"  />
              <div class="bubble-left"></div>
              <div class="bubble-inner">Tạo SEO</div>
              <div class="bubble-right"></div></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Link VN</th>
            <td><input class="textboxroundequalfckeditor" type="text" size="50" name="tags_unique_key" id="tags_unique_key" value="<?=$tag['tags_unique_key']?>" /></td>
            <td><div id="LinkVNErrorMess" style="display:none">
                <div class="error-left"></div>
                <div class="error-inner">this field is required.</div>
              </div></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="submit" name="Submit"  class="form-submit" value="Save" onclick="return FormIsValid();" /></td>
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
