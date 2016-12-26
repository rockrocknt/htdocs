<?php
/**
 * Created by JetBrains PhpStorm.
 * User: long
 * Date: 2/27/16
 * Time: 10:38 AM
 * To change this template use File | Settings | File Templates.
 */
global $page, $do, $act ,$tpl, $db, $title_page, $keywords, $descriptions;
global $cat1;

$REQUEST_URI = $_SERVER["REQUEST_URI"];
//echo $REQUEST_URI;
if ($REQUEST_URI == "/xem-gio-hang.html")  {
	$do = "cart";
	$act = "view";
	$title_page = "Giỏ hàng của bạn";
	$keywords = "";
	$descriptions = "Mua hồng leo đẹp";
}
if ($REQUEST_URI == "/thanh-toan.html")  {
	
	$do = "cart";
	$act = "checkout";
	$title_page = "Thanh toán";
	$keywords = "";
	$descriptions = "Thanh toán đơn hàng ";
}


if ($REQUEST_URI == "/cms")  {
	?>
	<script>
	location.href = "/admin.php";
	</script>
	<?
	die("linkDacBiet");
}

if ($cat1['unique_key_vn'] == 'mua-1-vali-ricardo-tang-1-vali-skyway')
{
    $do='linkDacBiet';
    $tpl = 'mua1vali';
    $filename = TPL_DIR.$do.'/'.$tpl."/".$tpl.'.php';
    //echo $filename;
    if(file_exists($filename))
        include($filename);
    else
        print('This page is not available'.$filename);
    die();
}
