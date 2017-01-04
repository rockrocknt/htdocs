<?php
// This is new config file, written by Mr.Holmes!
global $key, $email, $mau;
$key = "4ce66c9f2849705ab6711cc7adc4dd62";
$email = 'vxuanlong@gmail.vn';
$mau = 'ITop001';


define('SUB_DOMAIN', 'http://demo.myphamchonam.com/');
define('DOMAIN', 'http://www.myphamchonam.com');
define('DOMAINIMAGE', 'http://www.myphamchonam.com');
define('SUB_DOMAIN_LOCAL', 'http://localhost/koss');


global $db, $FullUrl;
//var_dump($_SERVER);
// local
$db_user = 'myphamnew';
$db_pass = 'myphamnew';
$db_name = 'myphamnew';
$db_host = 'localhost';
$ip = $_SERVER['SERVER_NAME'] ;
//echo $ip;
if (strpos($ip, 'myphamchonam') !== false) {
    $db_user = 'phannu_mpham2016';
    $db_name = 'phannu_mpham2016';
    $db_pass = 'Sbv1vd6Jxq';
    $db_host = 'localhost';

}




include "class_mysql.php";



if ($ip == "mypham.dev")
{



    $FullUrl = "";
}else
    $FullUrl = "";

$db = new class_mysql();

global $link;

$link = $db->db_connect($db_host, $db_user, $db_pass);

$db->db_select_db($db_name) || die("Could not connect to SQL db");

mysql_query("SET NAMES 'UTF8'");
