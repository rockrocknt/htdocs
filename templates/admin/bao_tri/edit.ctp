<? global $user; ?>
<!--  start message-red -->
<? if(isset($_SESSION['error'])){ ?>
    <div id="message-red">
        <table border="0" width="100%" cellpadding="0" cellspacing="0">
        <tr>
            <td class="red-left"><?=$_SESSION['error']?>.</td>
            <td class="red-right"><a class="close-red"><img src="images/table/icon_close_red.gif"   alt="" /></a></td>
        </tr>
        </table>
    </div>
<!--  end message-red -->
<? }; unset($_SESSION['error']); ?>
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
<form name="supplier" action="admin.php?do=bao_tri&act=editsm" method="post" enctype="multipart/form-data">

  <table border="0" width="100%" cellpadding="0" cellspacing="0">
    <tr valign="top">
      <td><!-- start id-form -->
        <table border="0" cellpadding="0" cellspacing="0"  id="id-form">
          <tr>
            <th valign="top">Bảo trì:</th>
            <td><input type="checkbox" name="bao_tri" <?php echo $bao_tri['bao_tri']?"checked":""; ?> value="1" /></td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Bắt đầu:</th>
            <td width="260">
            	<input type="text" name="bat_dau" class="textboxround" id="bat_dau" value="<?php echo $bat_dau['year'].'-'.$bat_dau['mon'].'-'.$bat_dau['mday']; ?>" readonly  /></td><td width="25"> <a href="" id="date-pick"><img src="images/forms/icon_calendar.jpg"   alt="" /></td>
                <td>       
                <strong> Giờ</strong>
                <select name="gio_bat_dau" class="styledselect-day">
					<?php
                        for($i=0;$i<24;$i++){
                    ?>
                        <option value="<?php echo $i; ?>" <?php echo $bat_dau['hours']==$i?"selected":""; ?>><?php echo $i; ?></option>
                    <?php
                        }
                    ?>
                </select>
                <strong> Phút</strong>
                <select name="phut_bat_dau" class="styledselect-day">
					<?php
                        for($i=0;$i<60;$i++){
                    ?>
                        <option value="<?php echo $i; ?>" <?php echo $bat_dau['minutes']==$i?"selected":""; ?>><?php echo $i; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </td>
            <td></td>
          </tr>
          <tr>
            <th valign="top">Kết thúc:</th>
            <td width="260">
            	<input type="text" name="ket_thuc" class="textboxround"  id="ket_thuc" value="<?php echo $ket_thuc['year'].'-'.$ket_thuc['mon'].'-'.$ket_thuc['mday']; ?>" readonly  /></td><td width="25"> <a href="" id="date-pick1"><img src="images/forms/icon_calendar.jpg"   alt="" /></td>
                <td>            
            <strong> Giờ</strong>
            <select name="gio_ket_thuc" class="styledselect-day">
            <?php
				for($i=0;$i<24;$i++){
			?>
            	<option value="<?php echo $i; ?>" <?php echo $ket_thuc['hours']==$i?"selected":""; ?>><?php echo $i; ?></option>
            <?php
				}
			?>
            </select>
            <strong> Phút</strong>
            <select name="phut_ket_thuc" class="styledselect-day">
            <?php
				for($i=0;$i<60;$i++){
			?>
            	<option value="<?php echo $i; ?>" <?php echo $ket_thuc['minutes']==$i?"selected":""; ?>><?php echo $i; ?></option>
            <?php
				}
			?>
            </select>
            </td>
            <td></td>
          </tr>
          <tr>
            <th></th>
            <td><input type="hidden" name="id" value="<?php echo $bao_tri['id']; ?>" /> <input type="submit" name="Submit"  value=" Save " class="form-submit" value=" Save " /></td>
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