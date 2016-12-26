<? global $FullUrl, $lg,$title_bar;
$cat = new Categories(currentCat());
if (!isset($_SESSION['member'])) 
{ 
echo "Bạn đăng nhập để dùng chức năng này.";
return;
}
$member = $_SESSION['member'];
?>
<div class="ct-div-sub">
<?=$title_bar?$title_bar:navigationBar()?>			
<div class="title">
					<img src="/images/btn_icon.png" style="float: left;">	
					<h1 class="h1title"><?=$cat->getName()?></h1> 
					<img src="/images/btn_fooder.png" style="float: left;">
</div>
<?php
			$currentcat = Categories::getCurrentCat();
			if (!$currentcat['content_vn']=='')
			{
			?>
			<div >
			<?php
			echo $currentcat['content_vn'];
			?>
			</div>
		<?php
			}
		?>
		
		<div class="content_dangky">
    <div id="registerLearn" >
	<fieldset class="register">
		<legend class="legend_txt">Ảnh của học viên</legend>
		<table>
			
			<tr>
				<td>Ảnh <span class="require">*</span>:</td>
				<td>
			<?php
				$avatar = "images/site/avatar_none.png";
				
				if (file_exists($member['img']) && (isset($member['img']))) { 
				$avatar = $member['img'];
				}
				?>	
				<img height="150" src="/<?=$avatar?>" />
				<br/>
				<form name="supplier" id="upavatarform" class="form" action="" method="post" enctype="multipart/form-data">
				Thay đổi ảnh: <input name="img" type="file" />
				
				</form>
			   </td>
			</tr>
			 
			 
</tbody></table>

<p align="left">

<a id="btn_login" onclick="luuanh(); return false;" href="">
<img class="btn_login" alt="Lưu" src="/images/btn_luu.png">
</a></p>
</fieldset>
	
		<fieldset class="register">
		<legend class="legend_txt">Thông tin cơ bản</legend>
		<table>
			<tbody>
			<tr class="input">
				<td>Họ và tên học viên <span class="require">*</span>:</td>
				<td><input type="text" id="name" name="name" value="<?=$member['name']?>"></td>
			</tr>
			<tr>
				<td>Ngày tháng năm sinh <span class="require">*</span>:</td>
				<td><input type="text" id="birthday" name="birthday" value="<?=$member['ngaysinh']?>"></td>
			</tr>
			<tr>
				<td>Giới tính :</td>
				<td>
					<select id="sex" name="sex" class="input">
						<option value="1" selected>Nam</option>
						<option value="0">Nữ</option>
					</select>
				</td>
			</tr>
			<tr>
				<td>Tên phụ huynh :</td>
				<td><input type="text" id="parent" name="parent" value="<?=$member['parent_name']?>"></td>
			</tr>
    <tr>
        <td>Địa chỉ :</td>
        <td><input type="text" id="address" name="address" value="<?=$member['address']?>"></td>
    </tr>
    <tr>
        <td>Điện thoại liên lạc <span class="require">*</span>:</td>
        <td><input type="text" id="phone" name="phone" value="<?=$member['phone']?>"></td>
    </tr>
    <tr>
        <td>Email <span class="require"></span>:</td>
        <td>
		<?=$member['email']?>
		<input style="display:none;" type="text" id="email" name="email" value="<?=$member['email']?>">
		</td>
    </tr>
</tbody></table>

<p align="center">

<a id="btn_login" onclick="saveprofile(); return false;" href="">
<img class="btn_login" alt="Lưu" src="/images/btn_luu.png">
</a></p>
</fieldset>

<fieldset class="register">
		<legend class="legend_txt">Đổi mật khẩu</legend>
		<table>
			<tbody>
			<tr class="input">
				<td>Mật khẩu hiện tại <span class="require">*</span>:</td>
				<td><input type="password" id="oldpass" name="oldpass" ></td>
			</tr>
			<tr>
				<td>Mật khẩu mới <span class="require">*</span>:</td>
				<td><input type="password" id="newpass" /></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu mới :</td>
				<td>
					 <input type="password" id="newpass_again" />
				</td>
			</tr>
			 
</tbody></table>

<p align="center">

<a id="btn_login" onclick="changepass(); return false;" href="">
<img class="btn_login" alt="Lưu" src="/images/btn_luu.png">
</a></p>
</fieldset>


<fieldset class="register">
    <legend class="legend_txt">Tham gia lớp tại: </legend>
	
	<strong>    <?=$member['sanhoc']?> </strong>
        <!--<input type="radio" checked="checked" name="yard" value="165 Đường Hoàng Hoa Thám, Quận Tân Bình"> 165 Đường Hoàng Hoa Thám, Quận Tân Bình <br/>
    <input type="radio" name="yard" value="18D Hoàng Hoa Thám, P4, Tân Bình, Hồ Chí Minh"> 18D Hoàng Hoa Thám, P4, Tân Bình, Hồ Chí Minh <br/>
    <input type="radio" name="yard" value="194 Đường Trần Văn Dư, P 13, Quận Tân Bình, Hồ Chí Minh"> 194 Đường Trần Văn Dư, P 13, Quận Tân Bình, Hồ Chí Minh-->
</fieldset>
<fieldset class="register">
    <legend class="legend_txt">Cấp độ học: </legend>
    <strong>    <?=$member['capdohoc']?> </strong>
</fieldset>
<fieldset class="register">
    <legend class="legend_txt">Thời gian học: </legend>
   <strong>    <?=$member['thoigianhoc']?> </strong>
</fieldset>

<div id="divloading" class="none">Đang xử lý. Xin bạn hãy đợi!...</div>
</div>  </div>
		        
					
						 
            </div>