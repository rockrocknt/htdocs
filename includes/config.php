<?php
// This is new config file, written by Mr.Holmes!
global $key, $email, $mau;
include "key.php";
global $db, $FullUrl;
$ip = $_SERVER['REMOTE_ADDR'] ;

if ($ip != "127.0.0.1")
{

}
include "class_mysql.php";



if ($ip == "127.0.0.1")
{
    $FullUrl = "";
}else
    $FullUrl = "";

$db = new class_mysql();

global $link;

$link = $db->db_connect($db_host, $db_user, $db_pass);

$db->db_select_db($db_name) || die("Could not connect to SQL db");

mysql_query("SET NAMES 'UTF8'");
?>