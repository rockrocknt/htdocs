<?
	global $FullUrl;
?>
<p class="title-contact h3-title">Vui lòng nhập thông tin liên hệ</p>
<form action="<?php echo $FullUrl; ?>/index.php?do=contact&amp;act=send" enctype="multipart/form-data" method="post" id="formcontact">
  <table class="form-contact" border="0">
    <tr>
      <td width="23%" class="title-form">Tên:</td>
      <td width="77%"><input class="input-txt" type="text" name="HoTenInput" id="namex" /></td>
    </tr>
    <tr>
      <td class="title-form">Số điện thoại:</td>
      <td><input type="text" class="input-txt"  name="DienThoaiInput" id="dienthoai" /></td>
    </tr>
    <tr>
      <td class="title-form">Email:</td>
      <td><input type="text" class="input-txt"  name="EmailInput" id="emailx" /></td>
    </tr>
    <tr>
      <td class="title-form">Nội dung:</td>
      <td><textarea name="TinNhanInput" class="input-txt"  id="noidung" cols="5" rows="5" ></textarea></td>
    </tr>
    <tr>
      <td></td>
      <td><input type="button" class="click-chon" value="Gửi" onclick="return Register();" />
      <input type="reset" class="click-chon" value="Làm Lại" />
        </td>
    </tr>
  </table>
</form>
<div id="dia-chi-lien-he">
  <?php echo $info['content_vn']; ?>
</div>
<div class="map-contact">

<? $googlemap = Info::getValueByKey('googlemap'); ?>
<? if($googlemap) echo $googlemap; ?>

</div>
<?=isset($_SESSION['mess'])?AlertMessage($_SESSION['mess']):''; unset($_SESSION['mess']);?>
