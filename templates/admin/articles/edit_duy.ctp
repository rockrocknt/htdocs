<? global $article; ?>
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
	url=url+"&comp=1";
	xmlHttp.onreadystatechange=ReadyTreeFilterChanged1 ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);
}

function ReadyTreeFilterChanged1(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		if(xmlHttp.responseText != "0"){
			//location.href = "admin.php?do=articles&act=list&cid="+xmlHttp.responseText;
			//document.getElementById('frmEdit').submit();
		}
		else{
			alert('Thể loại này không thể chứa bài viết');
		}
	}
}

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
	url=url+"&comp=1";
	xmlHttp.onreadystatechange=ReadyTreeFilterChanged ;
	xmlHttp.open("GET",url,true);
	xmlHttp.send(null);

}
function ReadyTreeFilterChanged(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		if(xmlHttp.responseText != "0"){
			if(FormIsValid())
				document.getElementById('frmEdit').submit();
		}
		else{
			alert('Thể loại này không thể chứa bài viết');
		}
	}
}
</script>
<script language="javascript">
function FormIsValid()
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

<form name="supplier" id="frmEdit" action="admin.php?do=articles&act=<?php
			if($_GET['act'] == 'add')
				print('addsm');
			else
				print('editsm');
        	?><?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?><?=isset($_GET['page'])?'&page='.$_GET['page']:''?>" method="post" enctype="multipart/form-data">
  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td><!-- start id-form -->
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
          <tr>
            <th valign="top">Thể Loại:</th>
            <td><?php
				$c = new Categories();
				$cid = $article['cid']?$article['cid']:'';
				if(isset($_GET['cid']))
					$cid = $_GET['cid'];
					
				$tree = $c->admin_tree_filter(1, $cid, 1);
				echo $tree;
			?></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Tiêu Đề VN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="name_vn" id="name_vn" value="<?=htmlspecialchars($article['name_vn'])?>"  /></td>
            <td><div id="NameVNErrorMess" style="display:none">
                    <div class="error-left"></div>
                    <div class="error-inner">this field is required.</div>
                </div></td>
          </tr>
          <?php /*?><tr>
            <th valign="top">Tiêu Đề EN:</th>
            <td><input type="text" class="textboxroundequalfckeditor" name="name_en" value="<?=htmlspecialchars($article['name_en'])?>"  /></td>
            <td></td>
          </tr><?php */?>
          <tr>
            <th valign="top">Image:</th>
            <td  width="400px"><?php
				if($_GET['act'] == 'edit' && $article['img'])
				{
				?>
              <img src="<?=$article['img']?>" width="100px"  /><br />
              <? } ?>
              <input type="file" name="img" class="file_1" size="50" /></td>
            <td><div class="bubble-left"></div>
              <div class="bubble-inner">JPEG, GIF , JPG , PNG</div>
              <div class="bubble-right"></div></td>
          </tr>
          <tr>
            <th valign="top">Tin lớn ở trang chủ</th>
            <td><input type="checkbox" name="hot_news_big" value="1" <?php
                    if($article['hot_news_big']=='1')
                        print('checked');
                    ?>  /></td>
            <td></td>
          </tr>
          <tr>
            <th>Số thứ Tự:</th>
            <td ><input type="text" size="5" name="num" value="<?php
        if($_GET['act']=='add')
			print('0');
		else
			print($article['num']);?>" onkeypress="return OnlyNumber(event)" /></td>
          </TR>
          <TR>
            <th>Ẩn/Hiện:</th>
            <td><input type="checkbox" name="active" value="1" <?php
			if( $_GET['act']=='add' || $article['active']==1)
				print('checked');
		?> /></td>
          </TR>
          <tr>
            <th>Mô Tả Ngắn VN:</th>
            <td><textarea class="textboxroundequalfckeditor" cols="70" rows="5" name="short_vn"><?php echo htmlspecialchars($article['short_vn']); ?>
</textarea></td>
            <td></td>
          </tr>
          <?php /*?><tr>
            <th>Mô Tả Ngắn EN:</th>
            <td><textarea class="textboxroundequalfckeditor" cols="70" rows="5" name="short_en"><?php echo htmlspecialchars($article['short_en']); ?></textarea></td>
            <td></td>
          </tr><?php */?>
          <TR>
            <th valign="top">Chi Tiết VN:</th>
            <td><?php
								echo $CKEditor->editor("content_vn", $article['content_vn']);
							?></td>
         	<td></td>              
          </TR>
          <?php /*?><TR>
            <th valign="top">Chi Tiết EN:</th>
            <td ><?php
								echo $CKEditor->editor("content_en", $article['content_en']);
							?></td>
          	<td></td>
          </TR>
           <tr>
            <th valign="top">Tên sản phẩm điều hướng</th>
            <td class="noheight"><input class="textboxroundequalfckeditor" type="text" size="70" name="pro_name" value="<?=htmlspecialchars($article['pro_name'])?>" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Link sản phẩm điều hướng</th>
            <td class="noheight"><input class="textboxroundequalfckeditor" type="text" size="70" name="pro_link" value="<?=htmlspecialchars($article['pro_link'])?>" /></td>
            <td></td>
          </tr><?php */?>
          <tr>
            <th valign="top"></th>
            <td><input type="hidden" name="id" value="<?=$article['id']?>" />
              
              <input type="button" class="form-submit" value=" Tạo SEO " onclick="CreateTitleSEO();"  />
              <div class="bubble-left"></div>
              	<div class="bubble-inner">Tạo SEO</div>
              	<div class="bubble-right"></div>
              </td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Link VN</th>
            <td><input class="textboxroundequalfckeditor" type="text" size="50" name="unique_key_vn" id="unique_key_vn" value="<?=$article['unique_key_vn']?>" /></td>
            <td><div id="LinkVNErrorMess" style="display:none">
                <div class="error-left"></div>
                <div class="error-inner">this field is required.</div>
              </div></td>
          </tr>
          <?php /*?><tr>
            <th valign="top">Link EN:</th>
            <td><input class="textboxroundequalfckeditor" type="text" size="50" name="unique_key_en" value="<?=$article['unique_key_en']?>" /></td>
            <td></td>
          </tr><?php */?>
          <tr>
            <th valign="top">Title VN</th>
            <td class="noheight"><input class="textboxroundequalfckeditor" type="text" size="70" name="title_vn" value="<?=htmlspecialchars($article['title_vn'])?>" onKeyDown="CountLeft(this.form.title_vn, this.form.title_vn_char, 0);" onKeyUp="CountLeft(this.form.title_vn, this.form.title_vn_char, 0);" /><div class="bubble-left"></div>
              <div class="bubble-inner"><input readonly type="text" name="title_vn_char" id="title_vn_char" size="1" value="0"> <b>(Tốt nhất là 70 ký tự)</b></div>
              <div class="bubble-right"></div></td>
            <td></td>
          </tr>
          <?php /*?><tr>
            <th valign="top">Title EN:</th>
            <td><input   class="textboxroundequalfckeditor"  type="text" size="70" name="title_en" value="<?=htmlspecialchars($article['title_en'])?>" /></td>
            <td></td>
          </tr><?php */?>
          <tr>
            <th>Keyword VN:</th>
            <td><input class="textboxroundequalfckeditor" type="text" size="70" name="keyword_vn" value="<?=htmlspecialchars($article['keyword_vn'])?>" /></td>
            <td></td>
          </tr>
          <?php /*?><tr>
            <th>Keyword EN:</th>
            <td><input type="text" size="70" class="textboxroundequalfckeditor"  name="keyword_en" value="<?=htmlspecialchars($article['keyword_en'])?>" /></td>
            <td></td>
          </tr><?php */?>
          <tr>
            <th>Description VN</th>
            <td><textarea onKeyDown="CountLeft(this.form.des_vn, this.form.des_vn_char, 0);" onKeyUp="CountLeft(this.form.des_vn, this.form.des_vn_char, 0);" class="textboxroundequalfckeditor" cols="70" rows="5" name="des_vn"><?=htmlspecialchars($article['des_vn'])?>
</textarea><div class="bubble-left"></div>
              <div class="bubble-inner"><input readonly type="text" name="des_vn_char" id="des_vn_char" size="1" value="0"> <b>(Tốt nhất là 150 ký tự)</b></div>
              <div class="bubble-right"></div></td>
            <td></td>
          </tr>
          <?php /*?><tr>
            <th>Description EN</th>
            <td><textarea class="textboxroundequalfckeditor" cols="70" rows="5" name="des_en"><?=htmlspecialchars($article['des_en'])?>
</textarea></td>
            <td></td>
          </tr><?php */?>
          <tr>
            <th></th>
            <td><input type="button" name="Submit" class="form-submit" value="Save" onclick="TreeFilterChanged1(document.getElementById('cat').value);" /></td>
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