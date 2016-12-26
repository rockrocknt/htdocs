<?php
	include("../class/info.class.php");
	include('../includes/config.php');
	include("../includes/va_db.php");
	global $db;
	$ga = Info::getValueByKey("googleanalytics");
	echo $ga;
?>