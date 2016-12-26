<? global $banner; ?>
<script language="javascript">
function TreeFilterChanged1(value){
	xmlHttp=GetXmlHttpObject();
	if (xmlHttp==null)
	  {
	  alert ("Browser does not support HTTP Request");
	  return;
	  } 
	var url="ajax/checkComp.php";
	url=url+"?id="+value;
	url=url+"&sid="+Math.random();
	url=url+"&comp=7";
	xmlHttp.onreadystatechange=ReadyTreeFilterChanged ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
	
}
function ReadyTreeFilterChanged(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{ 	
		if(xmlHttp.responseText != "0"){		
			//location.href = "admin.php?do=banner&act=list&cid="+xmlHttp.responseText;
			document.getElementById('frmEdit').submit();
		}
		else{
			alert('Thể loại này không thể chứa bảng hiệu');
		}
	}
}
function ValidationForm()
{
	FieldIsValid($("#name_vn"), $("#NameVNErrorMess"));
	
	return FieldIsValid($("#name_vn"), $("#NameVNErrorMess"));
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
<form name="supplier" id="frmEdit" action="admin.php?do=banner<?=(isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');?>&act=<?php
			if($_GET['act'] == 'add')
				print('addsm');
			else
				print('editsm');
        	?>        
            " method="post" enctype="multipart/form-data">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td><!-- start id-form -->
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
          <tr>
            <th valign="top">Thể Loại:</th>
            <TD ><?php
				$c = new Categories();
				$tree = $c->admin_tree_filter(1,isset($banner['cid'])?$banner['cid']:isset($_GET['cid'])?$_GET['cid']:0,7);
				echo $tree;
			?></TD>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Tên VN:</th>
            <td><input type="text" class="textboxround" name="name_vn" id="name_vn" value="<?=$banner['name_vn']?>" />
            	<div id="NameVNErrorMess" style="display:none">
                    <div class="error-left"></div>
                    <div class="error-inner">This field is required.</div>
                </div>
            </td> 
            <td></td>           
          </tr>
          <tr>
            <th valign="top">Tên EN:</th>
            <td><input type="text" class="textboxround" name="name_en" value="<?=$banner['name_en']?>" /></td>
          </tr>
          <tr>
            <th valign="top" height="25" valign="top">Ảnh</th>
            <TD  align="left" valign="top"><?php
				if($_GET['act'] == 'edit' && $banner['img'])
				{
				?>
              <img src="<?=$FullUrl;?>/<?=$banner['img']?>" width="100" height="100" /><br />
              <? } ?>
              <input type="file" name="img" class="file_1" style="width: 240px !important;" value="<?=$_GET['act']=='editsm'?$banner['img']: '' ?>"/></TD>
              <td></td>
          </tr>
          <tr>
            <th valign="top">Link:</th>
            <td width="764px"><textarea class="textboxround" name="link" ><?=$banner['link']?$banner['link']:'http://www'?></textarea>
            	<div class="bubble-left"></div>
              	<div class="bubble-inner">(<u>Ghi chú:</u> xin vui lòng điền "http://www" trong đường link của bạn. Thí dụ: http://www.tenmien.com)</div>
              	<div class="bubble-right"></div>
            </td>
            </tr>
          </tr>
          <tr>
            <th valign="top">Số thứ tự:</th>
            <td>
            	<input type="text" class="textboxround" onkeypress="return OnlyNumber(event)" style="width: 20px !important;" size="5" name="num" value="<?php
                    if($_GET['act']=='add')
                        print('0');
                    else
                        print($banner['num']);?>" />
            </td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Show</th>
            <td ><input type="checkbox"  name="active" value="1" <?php
			if($banner['active']=='1')
				print('checked');
		?> /> 	</td>
            <td></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="hidden" name="id" value="<?=$banner['id']?>"  /> <input type="submit" name="Submit"  value=" Save " class="form-submit" value=" Save " /></td>
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