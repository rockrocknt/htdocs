 <?php
	include "key.php";	
	include "class_mysql.php";
	
	global $db, $FullUrl;
	
	$FullUrl = "";
	
	$db = new class_mysql();
	
	global $link;
	
	$link = $db->db_connect($db_host, $db_user, $db_pass);
	
	$db->db_select_db($db_name) || die("Could not connect to SQL db");
	
	mysql_query("SET NAMES 'UTF8'");
?>