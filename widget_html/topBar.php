<!-- Top Bar -->
<section class="top-bar" id="top-bar">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6" id="top2">
                <ul class="contact-info">
                    <li>
                        <a class="phoneTopBar" href="tel:+0906 630 766">
                            <i class="uk-icon-phone"></i> +0906 630 766
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@hoahongcolong.com"> <i class="uk-icon-envelope"></i> info@hoahongcolong.com</a>
                    </li>
                    <li class="top-bar-cart">
					<?php 
						include "widget_html/topBar_cart.php";
					?>
					</li>
                </ul>
            </div>
            <div class="col-xs-12 col-md-6">
                <form action="#" method="get" class="search-frm">
                    <input class="search-input"
                           id="searchKey"
                           onkeydown="
						   //alert(event.keyCode);
						   console.log(event.keyCode);
						   if(event.which == 13 || event.keyCode == 13 || parseInt(event.keyCode) == 13){srccode=true;
						   
						   
						   SearchAdvance();
						   return false;
						   
						   }else{srccode=false;}" type="text" placeholder="Bạn muốn tìm sản phẩm gì..." value="">
                    <button onclick="SearchAdvance();return false;" class="search-btn"></button>
                    <a href="/tim-kiem-nang-cao/" title="" class="search-more">Tìm kiếm nâng cao</a>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- /Top Bar -->
