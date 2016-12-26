<nav class="breadcrumb__wrapper">
        <div class="container">
            <ul class="breadcrumb">
                <li><a class="pathway" href="/">Trang chủ</a></li>
                <li class="active">Liên hệ</li>	
            </ul>
        </div>
</nav>
<section class="main-body">
<div class="container">
<div class="row">
                    <div class="col-xs-12 col-sm-6 section">
                        <!-- Information -->
                        <!-- Section 1 -->
						<?php /*
                        <div class="section_title">
                            <h2>Liên hệ</h2>
                        </div>
						*/ ?>
                        <div class="section_content" style="display: block;">
						<div style="margin-bottom:10px; font-size:15px;">
        <p>
	<font color="#800080"><span style="font-size: 26px;"><b>Cửa hàng Hoa Hồng Leo Cô Long</b></span></font></p>
<p>
	<font color="#000000"><span style="font-size: 18px;"><b><i>Cung cấp cây giống Hoa Hồng Leo đa dạng màu</i></b></span></font></p>
<p style="margin: 0px; padding: 0px; color: rgb(5, 5, 5); font-family: Tahoma, Geneva, sans-serif; font-size: 13px; line-height: 25px;">
	<strong style="margin: 0px; padding: 0px;">Cửa hàng hồng leo: Số 4/2, đường số 3, KP4, P. Bình An, Quận 2, TP. Hồ Chí Minh (<em><span style="color:#b22222;">đầu đường Trần Não chạy 50m nhìn tay trái thấy ĐƯỜNG SỐ 2, chạy vào 300m sẽ thấy ĐƯỜNG SỐ 3</span></em>)</strong></p>
<p style="margin: 0px; padding: 0px; color: rgb(5, 5, 5); font-family: Tahoma, Geneva, sans-serif; font-size: 13px; line-height: 25px;">
	<strong style="margin: 0px; padding: 0px;">Hotline:&nbsp;</strong><strong style="margin: 0px; padding: 0px;"><span style="margin: 0px; padding: 0px; color: rgb(255, 0, 0);"><strong style="margin: 0px; padding: 0px;"><span style="margin: 0px; padding: 0px;">0937 932 766</span></strong>&nbsp;- Ms Dung</span></strong></p>
<p>
	<span style="font-size: 14px;"><strong>Thời gian làm việc từ: <span style="color:#b22222;">9h00 - 18h00</span> từ <span style="color:#b22222;">thứ 3 - chủ nhật </span>hàng tuần (thứ 2 nghỉ)</strong></span><br>
	<br>
	<em><span style="font-size: 14px;">Điền ngay thắc mắc hoặc thông tin cần hỗ trợ của bạn chuyên gia của chúng tôi sẽ tư vấn và phản hồi trong vòng 8h làm việc</span></em></p>
    </div>
                        </div>
						<iframe src="https://www.google.com/maps/d/embed?mid=zdyOPSGRRa2c.knOQG7maIMQ4" width="100%" height="480"></iframe>
                    </div>
					<div class="col-xs-12 col-sm-6 section">
						<div class="extra-padding left">
							
							<h4 class="margin_bottom_30">Vui lòng nhập thông tin liên hệ</h4>
							
							<!-- Contact Form -->
                            <form action="" id="contactform">
                                <div class="form-group">
                                    <label for="">Họ tên: <span class="required">*</span></label>
                                    <input class="form-control input-sm" id="name" type="text">
                                </div>
                                <div class="form-group">
                                    <label for="">Số điện thoại: <span class="required">*</span></label>
                                    <input class="form-control input-sm" id="phone" type="text">
                                </div>
								<div class="form-group">
												<label>Email: <span>*</span></label>
												<input name="email" id="email" class="form-control input-sm" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" type="email">
											</div>
                                <div class="form-group">
                                    <label for="">Nội dung: <span class="required">*</span></label>
                                    <textarea name="" id="description" cols="40" rows="3" class="form-control input-sm"></textarea>
                                </div>
                                <div class="form-group">
                                    <input class="button" onclick="sendcontact('');return false;" value="GỬI YÊU CẦU" type="submit">
                                </div>
                            </form>
                            <!-- Contact Form / End -->
							<script type="text/javascript">
    function sendcontact(fullUrl)
    {
        if ($("#name").val()=="")
        {
            alert("Nhập họ tên!");
            $("#name").focus();
            return;
        }
        if ($("#phone").val()=="")
        {
            alert("Nhập phone!");
            $("#phone").focus();
            return;
        }

        if (!IsEmail($("#email").val()))
        {
            alert("Nhập email!");
            $("#email").focus();
            return;
        }


        if ($("#description").val()=="")
        {
            alert("Nhập nội dung!");
            $("#description").focus();
            return;
        }
        $('#loading').toggle();
        $('#submit').toggle();
        $.post(fullUrl + "/ajax.php?do=contact&act=send",{
                name: $('#name').val(),
                email: $('#email').val(),
                phone:$('#phone').val(),
                message:$('#description').val()
            },
            function(data)
            {
                // alert(data);
                var obj = eval('(' + data + ')');
                alert(obj['mess']);
                $('#loading').toggle();
                $('#submit').toggle();
            });

    }
</script>

<img src="/CaptchaSecurityImages.php" style="display:none;">
							

								
						</div>
					</div>
				</div>
</div>
</section>
<?php
return;
global $FullUrl, $lg;
$current = currentCat();
$cat = new Categories($current);
$googlemap = Info::getInfoField('googlemap');
?>
<!-- Titlebar
================================================== -->
<section class="titlebar margin-bottom-0">
    <div class="container">
        <div class="sixteen columns">
            <h1>Liên hệ</h1>

            <nav id="breadcrumbs">
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>Liên hệ</li>
                </ul>
            </nav>
        </div>
    </div>
</section>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container fullwidth-element">

    <!-- Google Maps -->
    <section class="google-map-container none">
        <? // echo $googlemap; ?>
    </section>
    <!-- Google Maps / End -->

</div>
<!-- Container / End -->


<!-- Container -->
<div class="container">
    <div class="six columns">

        <?php  echo $cat->getShort(); ?>


    </div>

    <!-- Contact Form -->
    <div class="ten columns">
        <div class="extra-padding left">
            <h3 class="headline">Vui lòng nhập thông tin liên hệ</h3><span class="line margin-bottom-25"></span><div class="clearfix"></div>

            <!-- Contact Form -->
            <section id="contact">

                <!-- Success Message -->
                <mark id="message"></mark>

                <!-- Form -->
                <form method="post" name="contactform" id="contactform">

                    <fieldset>

                        <div>
                            <label>Họ tên:<span>*</span></label>
                            <input name="name" type="text" id="name" />
                        </div>
                        <div>
                            <label>Số điện thoại:<span>*</span></label>
                            <input name="name" type="text" id="phone" />
                        </div>
                        <div>
                            <label >Email: <span>*</span></label>
                            <input name="email" type="email" id="email" pattern="^[A-Za-z0-9](([_\.\-]?[a-zA-Z0-9]+)*)@([A-Za-z0-9]+)(([\.\-]?[a-zA-Z0-9]+)*)\.([A-Za-z]{2,})$" />
                        </div>

                        <div>
                            <label>Nội dung: <span>*</span></label>
                            <textarea name="comment" cols="40" rows="3" id="description" spellcheck="true"></textarea>
                        </div>

                    </fieldset>
                    <div id="result"></div>
                    <div id="loading" style="font-style: italic;"  class="loading none">Đang xử lý, xin bạn hãy đợi...</div>
                        <input type="submit"
                               onclick="sendcontact('<?=$FullUrl?>');return false;"
                               class="submit" id="submit" value="Gởi yêu cầu" />
                    <div class="clearfix"></div>
                </form>

            </section>
            <!-- Contact Form / End -->
        </div>
    </div>
</div>
<!-- Container / End -->
<script type="text/javascript">
    function sendcontact(fullUrl)
    {
        if ($("#name").val()=="")
        {
            alert("Nhập họ tên!");
            $("#name").focus();
            return;
        }
        if ($("#phone").val()=="")
        {
            alert("Nhập phone!");
            $("#phone").focus();
            return;
        }

        if (!IsEmail($("#email").val()))
        {
            alert("Nhập email!");
            $("#email").focus();
            return;
        }


        if ($("#description").val()=="")
        {
            alert("Nhập nội dung!");
            $("#description").focus();
            return;
        }
        $('#loading').toggle();
        $('#submit').toggle();
        $.post(fullUrl + "/ajax.php?do=contact&act=send",{
                name: $('#name').val(),
                email: $('#email').val(),
                phone:$('#phone').val(),
                message:$('#description').val()
            },
            function(data)
            {
                // alert(data);
                var obj = eval('(' + data + ')');
                alert(obj['mess']);
                $('#loading').toggle();
                $('#submit').toggle();
            });

    }
</script>

<img src="<?=$FullUrl?>/CaptchaSecurityImages.php" class="none"/>