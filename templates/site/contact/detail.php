<section class="section-contact">
    <div class="container">
        <div class="row-fluid">
            <div class="span12">
        <iframe src="https://www.google.com/maps/d/embed?mid=zqEW8_yHn6SI.kVB4RsFNZ0Rc"
                width="100%" height="450" frameborder="0" style="border:0"></iframe>
            </div>
        </div>
        <div class="row-fluid">
            <div class="span6">
                <div class=" contact-form-holder">

                    <h4>leave message</h4>

                    <div class="message-box"></div>

                    <form class="contact-form" method="post" novalidate="novalidate">

                        <div class="control-group inline-block span6">

                            <div class="controls">
                                <label class="form-label ">Name</label>

                                <input id="cname" name="name" size="25" class="required cusmo-input span12">

                            </div>
                        </div>

                        <div class="control-group inline-block span6">

                            <div class="controls">
                                <label class="form-label">Email</label>
                                <input id="cemail" name="mail" class="required cusmo-input span12">

                            </div>
                        </div>

                        <div class="control-group">

                            <div class="controls">
                                <label class="form-label">Your Message</label>

                                <textarea id="ccomment" name="msj" rows="5" cols="5" class="required span12 cusmo-input"></textarea>
                            </div>
                        </div>

                        <div class="text-right">
                            <input class="submit cusmo-btn narrow" value="SUBMIT" type="submit">
                        </div>
                        <div id="loading" class="pull-right">
                            <img alt="" src="/images/loader.gif">
                        </div>
                    </form>
                </div>
            </div>
            <div class="span6">
                <div class="contact-info-boxes">
                    <?php
                    $cate = currentCat();
                    echo $cate['content_vn'];
                    ?>
                </div>
            </div>
        </div>

    </div>
    <img src="/CaptchaSecurityImages.php" style="display:none;">



</section>
<?php return; ?>
<section class="section-two-columns">
<div class="container">
<div class="row-fluid">

</div>
</div>
</section>
<?php return; ?>
<section class="main-body">
<div class="container">
<div class="row">
                    <div class="col-xs-12 col-sm-6 section">
                        <?php
                        $cate = currentCat();
                        echo $cate['content_vn'];
                        ?>
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