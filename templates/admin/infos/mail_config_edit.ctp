<? global $cat; ?>
<script language="javascript">

function ValidationForm()
{
	FieldIsValid($("#content_vn"), $("#ContentVNErrorMess"));
	
	return FieldIsValid($("#content_vn"), $("#ContentVNErrorMess"));
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

<form name="supplier" id="frmEdit" action="admin.php?do=infos&act=<?php
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
            <th valign="top">Name:</th>
            <td><input type="text" class="textboxround" name="name_vn" value="<?=$info['name_vn']?>" readonly="readonly" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Content:</th>
            <td><input type="text" class="textboxround" name="content_vn" id="email" value="<?=$info['content_vn']?>" /></td>
            <td>
            	<div id="EmailErrorMess" style="display:none">
                    <div class="error-left"></div>
                    <div class="error-inner">Email is not valid.</div>
                </div>
            </td>
          </tr>
          <tr>
            <th></th>
            <td><input type="hidden" name="id" value="<?=$info['id']?>"  /> <input type="submit" name="Submit" value="Save" class="form-submit" /></td>
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