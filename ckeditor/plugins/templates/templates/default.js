/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/
CKEDITOR.addTemplates('default',{imagesPath:CKEDITOR.getUrl(CKEDITOR.plugins.getPath('templates')+'templates/images/'),templates:
																					 [
																					  {
																						  title:'SEO and FOOTER',
																						  image:'template1.gif',
																						  description:'SEO and FOOTER.',html:'<h1>Chủ đề chính của page đó, 1 - 2 từ khóa chính</h1><h2>chủ đề phụ của page đó, 2 - 3 từ khóa còn lại</h2><p>Vài dòng mô tả về nội dung page đó, gom các từ khóa quan trọng vào, 2 - 3 từ khóa, độ dài khoảng 2 dòng</p><p>Vài link quan trọng dẫn đến trang con của page này (có thể không có)</p>'
                                                                                      },
                                                                                         {
                                                                                             title:"Mô tả sản phẩm",
                                                                                             description:'bảng mô tả sản phẩm ',
                                                                                             html:'<table class="basic-table">						<tr>							<th>Size</th>							<td>Small, Medium, Largem, Extra Large</td>						</tr>						<tr>							<th>Colors</th>							<td>Blue, color, Red</td>						</tr>						<tr>							<th>Material</th>							<td>75% Cotton, 25% Polyester</td>						</tr>						<tr>							<th>Weight</th>							<td>N/A</td>						</tr>					</table>'

                                                                                         }
                                                                                         ,
                                                                                         {
                                                                                             title:"Widget Categories Post Sidebar",
                                                                                             description:'trong trang chi tiet tin tuc ',
                                                                                             html:'<!-- Categories --><div class="widget">	<h3 class="headline">		Thông tin hữu ích</h3>	<div class="clearfix">		&nbsp;</div>	<nav class="categories">		<ul>			<li>				<a href="/mua-tui-xach-nam-o-dau-tphcm/">Mua túi xách nam ở đâu TPHCM</a></li>			<li>				<a href="#">Lifestyle</a></li>			<li>				<a href="#">Entertainment</a></li>			<li>				<a href="#">Technology</a></li>			<li>				<a href="#">World</a></li>		</ul>	</nav></div>'

                                                                                         }
                                                                                         ,
                                                                                         {
                                                                                             title:"Widget About Us  Post Sidebar",
                                                                                             description:'trong trang chi tiet tin tuc ',
                                                                                             html:'<div class="widget margin-top-0">	<h3 class="headline">		About</h3>	<div class="clearfix">		&nbsp;</div>	<p>		Malesuada scelerisque dignissim massa lectus, ultricies diam consequat aliquam imperdiet egestas ultrices etiam.</p></div>'

                                                                                         }

                                                                                         ,
                                                                                         {
                                                                                             title:"Menu con thường",
                                                                                             description:'dạng xổ xuống bình thường',
                                                                                             html:'<ul><li><a href="#">menu con 1</a></li><li><a href="#">menu con 2</a></li></ul>'

                                                                                         }

                                                                                         ,
                                                                                         {
                                                                                             title:"Menu con dạng cột",
                                                                                             description:'dạng từng cột',
                                                                                             html:'<div class="mega">                        <div class="mega-container">                            <div class="one-column">                                <ul>                                    <li><span class="mega-headline">Example Pages</span></li>                                    <li><a href="contact.html">Contact</a></li>                                    <li><a href="about.html">About Us</a></li>                                    <li><a href="services.html">Services</a></li>                                    <li><a href="faq.html">FAQ</a></li>                                    <li><a href="404-page.html">404 Page</a></li>                                </ul>                            </div>                            <div class="one-column">                                <ul>                                    <li><span class="mega-headline">Featured Pages</span></li>                                    <li><a href="index-2.html">Business Homepage</a></li>                                    <li><a href="shop-with-sidebar.html">Default Shop</a></li>                                    <li><a href="blog-masonry.html">Masonry Blog</a></li>                                    <li><a href="variable-product-page.html">Variable Product</a></li>                                    <li><a href="portfolio-dynamic-grid.html">Dynamic Grid</a></li>                                </ul>                            </div>                            <div class="one-column hidden-on-mobile">                                <ul>                                    <li><span class="mega-headline">Paragraph</span></li>                                    <li><p>This <a href="#">Mega Menu</a> can handle everything. Lists, paragraphs, forms...</p></li>                                </ul>                            </div>                            <div class="one-fourth-column hidden-on-mobile">                                <a href="#" class="img-caption margin-reset">                                    <figure>                                        <img src="images/menu-banner-01.jpg" alt="" />                                        <figcaption>                                            <h3>Jeans</h3>                                            <span>Pack for Style</span>                                        </figcaption>                                    </figure>                                </a>                            </div>                            <div class="one-fourth-column hidden-on-mobile">                                <a href="#" class="img-caption margin-reset">                                    <figure>                                        <img src="images/menu-banner-02.jpg" alt="" />                                        <figcaption>                                            <h3>Sunglasses</h3>                                            <span>Nail the Basics</span>                                        </figcaption>                                    </figure>                                </a>                            </div>                            <div class="clearfix"></div>                        </div>                    </div>'

                                                                                         },
                                                                                         {
                                                                                             title:"TOP BAR",
                                                                                             description:'HTML top bar',
                                                                                         html:'<!-- Top Bar Menu -->        <div class="ten columns">            <ul class="top-bar-menu">                <li><i class="fa fa-phone"></i> (564) 123 4567</li>                <li><i class="fa fa-envelope"></i> <a href="#">mail@example.com</a></li>                <li>                    <div class="top-bar-dropdown">                        <span>English</span>                        <ul class="options">                            <li><div class="arrow"></div></li>                            <li><a href="#">English</a></li>                            <li><a href="#">Polish</a></li>                            <li><a href="#">Deutsch</a></li>                        </ul>                    </div>                </li>                <li>                    <div class="top-bar-dropdown">                        <span>USD</span>                        <ul class="options">                            <li><div class="arrow"></div></li>                            <li><a href="#">USD</a></li>                            <li><a href="#">PLN</a></li>                            <li><a href="#">EUR</a></li>                        </ul>                    </div>                </li>            </ul>        </div>        <!-- Social Icons -->        <div class="six columns">            <ul class="social-icons">                <li><a class="youtube" href="https://www.youtube.com/channel/UC8BdqyDSqzNX4s6K3SuhQZA"><i class="icon-youtube"></i></a></li>                <li><a class="facebook" href="https://www.facebook.com/kosshop.vn"><i class="icon-facebook"></i></a></li>                <li><a class="twitter" href="#"><i class="icon-twitter"></i></a></li>                <li><a class="dribbble" href="#"><i class="icon-dribbble"></i></a></li>                <li><a class="gplus" href="https://plus.google.com/u/2/b/109976263824195358204/dashboard/overview"><i class="icon-gplus"></i></a></li>                <li><a class="pinterest" href="#"><i class="icon-pinterest"></i></a></li>            </ul>        </div>'
                                                                                         }


                                                                                         ,{
																						  title:'Nội dung trang cám ơn',
																						  image:'template1.gif',
																						  description:'Nội dung trang cám ơn',
																						  html:'<div class="content">'+ 
        '<div class="thanks_content">'+
        '<p class="thanks_title">C&aacute;m ơn bạn đ&atilde; gởi th&ocirc;ng tin đến ch&uacute;ng t&ocirc;i.</p>'+
        '<p>Ch&uacute;ng t&ocirc;i sẽ trả lời bạn trong thời gian sớm nhất. Nếu c&oacute; bất kỳ thắc mắc n&agrave;o, xin'+ 'đừng ngần ngại li&ecirc;n hệ với ch&uacute;ng t&ocirc;i để được giải đ&aacute;p.</p>'+
        '<div class="thanks_hotline">'+
        '<p class="thanks_style">[Số điện thoại của bạn]</p>'+
        '<p>[T&ecirc;n của bạn]</p>'+
        '</div>'+
        '<div class="thanks_email">'+
        '<p class="thanks_style">[Email của ban]</p>'+
        '<p>Bộ phận Chăm s&oacute;c KH</p>'+
        '</div>'+
        '</div>'+
        '<ul class="list_address">'+
        '<li>'+
        '<p class="thanks_title">Showroom</p>'+
        '[Địa chỉ của bạn]'+
        '<p>ĐT: [Điện thoại] - Fax: [Fax của bạn]</p>'+
        '</li>'+
        '<li>'+
        '<p class="thanks_title">Nh&agrave; m&aacute;y</p>'+
        '[Địa chỉ của bạn] ĐT: [Điện thoại của bạn] - Fax: [Fax của bạn]</li>'+
        '<li>'+
        '<p class="thanks_title">Trụ sở ch&iacute;nh</p>'+
        '<p>[Địa chỉ của bạn] ĐT: [Điện thoại của bạn] - Fax: [Fax của bạn]</p>'+
        '<p>MST: [M&atilde; số thuế]</p>'+
        '<p>Email: [Email của bạn]</p>'+
        '<p>YM!: [Yahoo của bạn]</p>'+
        '<p>Skype: [Skype của bạn]</p>'+
        '<p>[Website của bạn]</p>'+
        '</li>'+
		'<li>'+
        '<p class="thanks_title">Thông tin thanh toán</p>'+
        '<p>Tài khoản: [Tài khoản thanh toán của bạn]</p>' +
        '</li>'+
        '</ul>'+
        '</div>'}
																						  
																						  ]});
