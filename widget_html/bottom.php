
<!-- Bottom -->
<section class="bottom-b">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-md-3">
                <div class="module title1">
                    <div class="module-content">
                        <!-- logo footer -->
                        <p><img title="hồng leo cô long" src="/upload/images/2016/06/01/logo-hong-leo-co-long-1464798634.png" alt="Logo hồng leo cô long"></p>						<?php 						$imgg = ImagesGroup::getImgById(32);						echo $imgg['text2_vn'];						?>
                        
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="module title1">
                    <h3 class="module-title">Hướng dẫn</h3>
                    <div class="module-content">
                        <ul>
							<?php 
							$imagesList= ImagesGroup::getimgbycid(20,0);
							for ($i = 0; $i < count($imagesList); $i++) {
								$img = $imagesList[$i];
							?>
							<li><a href="<?php echo $img['url_vn']; ?>"><?php echo $img['name_vn']; ?></a></li>
							<?php }
							?>
                             


                        </ul>
                        <br>
                        <p class="grayscale">
                            <img src="/images/elements/american.png" alt="Payments">
                            <img src="/images/elements/electron.png" alt="Payments">
                            <img src="/images/elements/maestro.png" alt="Payments">
                            <img src="/images/elements/master.png" alt="Payments">
                            <img src="/images/elements/paypal.png" alt="Payments">
                            <img src="/images/elements/visa.png" alt="Payments">
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="module title1">
                    <h3 class="module-title">Facebook</h3>
                    <div class="module-content">

                        <div class="fb-page"
                             data-href="https://www.facebook.com/hoahongleo.net"
                             data-tabs="timeline"
                             data-width="320"
                             data-height="250"
                             data-small-header="false" 
							 data-adapt-container-width="true" 
							 data-hide-cover="false" 
							 data-show-facepile="true">
							 <div class="fb-xfbml-parse-ignore">
							 <blockquote cite="https://www.facebook.com/hoahongleo.net">
							 <a href="https://www.facebook.com/hoahongleo.net">HoaHongLeo.Net</a>
						</blockquote></div></div>

                    </div>

                </div>
            </div>
            <div class="col-sm-4 col-md-3">
                <div class="module title1">
                    <h3 class="module-title">Liên hệ:</h3>					<?php 						$imgg = ImagesGroup::getImgById(77);						echo $imgg['text2_vn'];						?>					<?php /*
                    <div class="module-content">
                        <div class="no-margin">
                            <p>Cửa hàng Hoa hồng leo Cô Long</p>
                            <p>Địa chỉ cửa hàng: 4/2, Đường số 3, P.Bình An, Quận 2, TP. Hồ Chí Minh.</p>
                            <p><i class="uk-icon-envelope"></i>&nbsp;&nbsp;Email : info@hoahongcolong.com</p>
                            <p class="uk-text-contrast"><i class="uk-icon-phone "></i> Hotline:&nbsp;&nbsp;0906 630 766 - Ms Dung</p>

                        </div>
                        <div class="module title1" style="margin-top: 15px;"><h3 class="module-title">Follow us</h3></div>
                        <p>
                            <a class="uk-icon-button uk-icon-linkedin" href="#"></a>
                            <a class="uk-icon-button uk-icon-facebook" href="#"></a>
                            <a class="uk-icon-button uk-icon-twitter" href="#"></a>
                            <a class="uk-icon-button uk-icon-youtube" href="#"></a>
                        </p>
                    </div>					*/ ?>
                </div>
            </div>
        </div>
    </div>
	<?php 
	if (
		($do == "main") 
		|| ($do == "articles" && $act== "list") 
		|| ($do == "products" && $act== "list") 
		)
	{ 
	?>
    <div class="container seofooter">
        <div class="sfooter">
            <h1><?php echo $cat1['h1_vn']; ?></h1>
			<?php echo $cat1['seo_f_vn']; ?>
        </div>
    </div>
	<?php 
	}
	?>
</section>
<!-- Bottom -->
﻿