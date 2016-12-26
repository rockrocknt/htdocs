<div id="content_title_sanpham">
    <div id="title_sanpham">        
        <div class="title_content" style="padding-top:<?php
		if(strpos($cat['name_vn'],"<br />")>0)
			print('2px ;padding-left:62px;');
		else
			print('11px ;padding-left:57px;');
        ?>">&#272;&#7863;t H&agrave;ng</div>
    </div>
    <div id="background_pixel"><img src="images/background_pixel.png" /></div>
    <div id="frame_center" >
    	<div style="padding: 0px 10px 10px 10px; width:100%">
	        <div style="padding-bottom:20px;">
		    <?=$info['content_vn']?></div>
        <div align="center">
        <span style="font-family:Arial, Helvetica, sans-serif; font-weight:bold; color:#FF0000; font-size:12px;">&#272;i&#7873;n th&ocirc;ng tin &#273;&#7847;y &#273;&#7911; v&agrave; g&#7917;i v&#7873; cho ch&uacute;ng t&ocirc;i</span><br />
        	<br />
        	<form action="index.php?do=contact&act=send" method="post" onSubmit="return CheckForm(this);" name="fContact">
            	<table border="0" cellpadding="0" cellspacing="15" style="font-weight:bold; width:460px;">
                	<tr>
                    	<td align="right" style="padding-right:0px; width:150px;">H&#7885; v&agrave; t&ecirc;n&nbsp;<font style="color:#FF0000">*</font></td>
                        <td align="left" style="padding-left:5px;"><input type="text" name="name" style="width:170px;" /></td>
               	  </tr>
                  <tr>
                    	<td align="right" style="padding-right:0px;">&#272;&#7883;a ch&#7881;&nbsp;<font style="color:#FF0000">&nbsp;&nbsp;</font></td>
                        <td align="left" style="padding-left:5px;"><input type="text" name="address" style="width:170px;" /></td>
               	  </tr>
                  <tr>
                    	<td align="right" style="padding-right:0px;">Email&nbsp;<font style="color:#FF0000">*</font></td>
                        <td align="left" style="padding-left:5px;"><input type="text" name="email" style="width:170px;" /></td>
               	  </tr>
                  <tr>
                    	<td align="right" style="padding-right:0px;">&#272;i&#7879;n tho&#7841;i&nbsp;<font style="color:#FF0000">*</font></td>
                        <td align="left" style="padding-left:5px;"><input type="text" name="phone" style="width:170px;" /></td>
               	  </tr>
                  <tr>
                    	<td align="right" style="padding-right:0px;">N&#7897;i dung tin g&#7917;i&nbsp;<font style="color:#FF0000">*</font></td>
                    <td align="left" style="padding-left:5px;"><textarea  name="content" style="width:260px; height:160px;"></textarea></td>
               	  </tr>
                  <tr>
                    	<td align="right" style="padding-right:0px;">&nbsp;</td>
                    <td align="left" style="padding-left:5px;"><input type="image" src="images/bt_guidi.jpg" />&nbsp;&nbsp;<img border="0" src="images/bt_nhaplai.jpg" onclick="document.getElementById('fContact').reset();" style="cursor:hand;" />
                    </td>
               	  </tr>
                </table>
            </form>
      </div>
        </div>
    </div>
</div>
            