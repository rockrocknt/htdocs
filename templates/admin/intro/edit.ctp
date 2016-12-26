<? global $intro; ?>
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
	url=url+"&comp=3";
	xmlHttp.onreadystatechange=ReadyTreeFilterChanged ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}
function ReadyTreeFilterChanged(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 	
		if(xmlHttp.responseText != "0"){		
			//location.href = "admin.php?do=intro&cid="+xmlHttp.responseText;
		}
		else{
			alert('Thể loại này không thể chứa giới thiệu');
		}
	}
}
</script>
<script language="javascript">
function ValidationForm()
{
	FieldIsValidEqualFckEditor($("#name_vn"), $("#NameVNErrorMess"));
	
	return FieldIsValidEqualFckEditor($("#name_vn"), $("#NameVNErrorMess"));
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
<!--  start message-green -->
	<? if(isset($_SESSION['mess'])){ ?>
    <div id="message-green">
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="green-left"><?=$_SESSION['mess']==1?'Add successfully':$_SESSION['mess']?> <a href="admin.php?do=users&act=dellist"><?=$_SESSION['mess']==1?'Add new one.':''?></a></td>
            <td class="green-right"><a class="close-green"><img src="images/table/icon_close_green.gif"   alt="" /></a></td>
        </tr>
        </table>
    </div>
    <? }; unset($_SESSION['mess']); ?>
<!--  end message-green -->
<form name="supplier" id="frmEdit" action="admin.php?do=intro&act=<?php
			if(isset($_GET['act']) && $_GET['act'] == 'add')
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
				$tree = $c->admin_tree_filter(1,isset($_GET['cid'])?$_GET['cid']:0,3);
				echo $tree;
			?></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Name VN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="name_vn" id="name_vn" value="<?=htmlspecialchars($intro['name_vn'])?>"  /></td>
            <td><div id="NameVNErrorMess" style="display:none">
                <div class="error-left"></div>
                <div class="error-inner">This field is required.</div>
              </div></td>
          </tr>
          <tr>
            <th valign="top">Name EN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="name_en" value="<?=htmlspecialchars($intro['name_en'])?>"  /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Image:</th>
            <td  width="400px">
				<?php
				if($intro['img'])
				{
				?>
                <img  src="<?=$intro['img']?>" width="100"  /><br />
			<? } ?>
              <input type="file" name="img" class="file_1" size="50" /></td>
            <td><div class="bubble-left"></div>
              <div class="bubble-inner">JPEG, GIF , JPG , PNG</div>
              <div class="bubble-right"></div></td>
          </tr>
          <tr>
            <th>Mô Tả VN:</th>
            <td><?php
					echo $CKEditor->editor("content_vn", $intro['content_vn']);
				?></td>
            <td></td>
          </tr>
          <tr>
            <th>Mô Tả EN:</th>
            <td><?php
					echo $CKEditor->editor("content_en", $intro['content_en']);
				?></td>
            <td></td>
          </tr>
          <tr>
            <th></th><input type="hidden" name="id" value="<?=$intro['id']?>"  />
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