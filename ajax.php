<?php
	session_start();
	global $lg, $prefix_url;
	
	include('./includes/config.php');
	include("./includes/functions.php");
	if(isset($_GET['lg'])){
		$lg = SafeQueryString("lg");
	}
	else
		$lg = 'vn';
	$prefix_url = $lg=="vn"?"/":"/en/";
	
	include('language/'.$lg.'.php');
	if (!isValidConfigFile("./includes/config.php")) {
		die(LICENSE_ERROR);
	}
	define('TPL_DIR','templates/site/');
	define('SRC_DIR','sources/site/');
	define('CLASS_DIR','class/');
	include("./includes/va_db.php");
	
	include(CLASS_DIR.'bao_tri.class.php');
	include(CLASS_DIR."info.class.php");
	include(CLASS_DIR."template.php");
	include(CLASS_DIR."cart.class.php");
	include(CLASS_DIR."categories.class.php");
	include(CLASS_DIR."email.class.php");
	include(CLASS_DIR."members.class.php");
	include(CLASS_DIR."comment.class.php");
	include(CLASS_DIR."products.class.php");
    include(CLASS_DIR."coupon.class.php");
include(CLASS_DIR."imagegroup.class.php");


include(CLASS_DIR."include.class.php");
	global $page,$do,$act,$tpl, $db, $title_page, $keywords, $descriptions;
	$do   = isset($_GET["do"])  ? $_GET["do"] :'';
	$act   = isset($_GET["act"])  ? $_GET["act"] :'default';

	$path = "sources/ajax/".$do."/".$act.".php";
	
	if (file_exists($path)){
		
		require($path);
	}
	else{
		$msg="Bạn đang được đưa về trang chủ!!!";
		$p='/index.php';
		echo $msg . " ".$path ;				
	}
?>
