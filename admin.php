<?php

	session_start();
	global $lg, $prefix_url;
	$lg = "vn";
	$prefix_url = "/";
	define('TPL_MODULE','./modules/');
	define('CLASS_DIR','class/');
	define('TPL_DIR_ADMIN','templates/admin/');
	define('SRC_DIR_ADMIN','sources/admin/');
	define('CLASS_DIR_ADMIN','class/');
	
	include('language/'.$lg.'.php');
	include("./includes/config.php");
	include("./includes/functions.php");
	if (!isValidConfigFile("./includes/config.php")) {
		die(LICENSE_ERROR);
	}
	include("./includes/va_db.php");
	
	include(CLASS_DIR."info.class.php");
	include(CLASS_DIR."banned.class.php");
	include(CLASS_DIR."articles.class.php");
	include(CLASS_DIR."products.class.php");
	include(CLASS_DIR."categories.class.php");
	include(CLASS_DIR."cms.functions.class.php");
	include(CLASS_DIR."members.class.php");
	include(CLASS_DIR."email.class.php");
	include(CLASS_DIR."albums.class.php");
include(CLASS_DIR."imagegroup.class.php");
include(CLASS_DIR."include.class.php");
	BannedIp::Check();

	$do   = isset($_GET["do"])  ? $_GET["do"] :'main';
	$act   = isset($_GET["act"])  ? $_GET["act"]  : "";
	$page   = isset($_GET["page"])  ? $_GET["page"]  : '1';//for paging
	
	if(!isset($_SESSION["store_login"]) || $do=="login"){
		$do="login";
		require("./sources/admin/login.php");
	}
	else{
		if (!file_exists("./sources/admin/".$do.".php")){
			$msg="Chức năng này không tồn tại!";
			$p='./admin.php';
			page_transfer($msg,$p);
		}
		else{
			cmsFunction::PhanQuyenAdmin($do);
			require("./sources/admin/".$do.".php");
		}
		include("./sources/admin/masterpage.php");
	}
?>