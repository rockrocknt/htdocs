<? 
	global $info; 
	$temp = Info::getInfoField('showlanguage');
	$showEnglish = $temp==1?'':'style="display:none;"';
?>

<? if(isset($_SESSION['mess'])){ ?>
<div class="clear"></div>
<div class="nNote nSuccess hideit" style="margin:20px 0;">
    <p><strong><?=$_SESSION['mess']?></strong></p>
</div>
<? }; unset($_SESSION['mess']); ?>

<form name="supplier" id="frmEdit" class="form" action="admin.php?do=thankyou&act=editsm" method="post" enctype="multipart/form-data">
	<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/list.png" alt="" class="titleIcon" />
			<h6>Nhập dữ liệu</h6>
		</div>
		<div class="formRow">
			<label>Nội dung trang kết <br />thúc đơn hàng VN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung trang kết thúc đơn hàng sẽ hiển thị ở trang tiếng Việt. Sau khi khách mua hàng xong sẽ hiện ra trang này!"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("thankyou_vn", $info['thankyou_vn']);?></div>
			<div class="clear"></div>
		</div>
		<div class="formRow" <?=$showEnglish?>>
			<label>Nội dung trang kết <br />thúc đơn hàng EN: <img src="./images/admin/question-button.png" alt="Tooltip"  class="icon_que tipS" original-title="Viết nội dung trang kết thúc đơn hàng sẽ hiển thị ở trang tiếng Anh. Sau khi khách mua hàng xong sẽ hiện ra trang này!"> </label>
			<div class="formRight"><?php echo $CKEditor->editor("thankyou_en", $info['thankyou_en']);?></div>
			<div class="clear"></div>
		</div>
        <?php /*?><div class="formRow">
          <label>Tỷ giá USD:</label>
          <div class="formRight">
          	<input type="text" name="rate" id="price" value="<?=$info['rate']?>" class="tipS" style="width:100px;" /> vnđ
            <span class="formNote">Tỷ giá chuyển đổi từ USD sang VNĐ</span>
          </div>
          <div class="clear"></div>
        </div><?php */?>
        <?php /*?><div class="formRow">
          <label>Tỷ lệ %:</label>
          <div class="formRight">
          	<input type="text" name="percent" style="width:20px; text-align:center;" value="<?=$info['percent']?>"  title="Tăng giá hoặc giảm giá đồng loạt các sản phẩm (giảm giá thì nhập số âm)" class="tipS" />
            <span class="formNote">Dùng để điều chỉnh tăng giá hoặc giảm giá đồng loạt tất cả sản phẩm. Nếu giảm giá thì nhập số âm.</span>
          </div>
          <div class="clear"></div>
        </div><?php */?>
		<div class="formRow">
			<div class="formRight">
            	<input type="hidden" name="id" value="<?=$info['id']?>" />
				<a href="#" onclick="return $('#frmEdit').submit(); return false;" class="wButton bluewB m10"><span>Hoàn tất</span></a>
			</div>
			<div class="clear"></div>
		</div>
	</div>
</form>