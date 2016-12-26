<div class="menu_top"><ul class="menu_top">
        <li class="search"><div class="bg_search">
                <input
                    onkeydown="if (event.keyCode == 13) SearchGoogle();"
                    id="key-search"  placeholder="Tìm kiếm..." class="L" type="text" />
                <input type="submit"
                       id="btnsearch"
                       value=""
                       onclick="SearchGoogle();"
                       class="btn_search" /></div></li>

        <li  ><a href="/huong-dan-mua-hang/"  class="end">Hướng dẫn mua hàng</a></li>
        <li style="display: none;"><a href="#">Login <span class="icon_login L"></span></a></li>
        <li><a href="<?php
            global  $FullUrl,$prefix_url,$lg;
            $num = cart::getQuantity();
            echo $FullUrl.$prefix_url.($lg=='vn'?'xem-gio-hang.html':'view-cart.html');
            ?>"><span class="icon_shop L"></span> Giỏ hàng(<?=$num?>)</a></li>


    </ul></div>

<?php Template::UserControl('Categories'); ?>
<?php
return;
	global $FullUrl, $prefix_url, $do;
	$showslider = Info::getInfoField('showslider');
?>
<div class="header">
    <div class="hcontent">
    	<?php Template::UserControl('Logo'); ?>
        <?php Template::UserControl('WidgetSearch'); ?>
	</div>
    <?php Template::UserControl('Categories'); ?>
    <?php if ($do=="main") if ($showslider) Template::UserControl('Slider'); ?>
</div>