<?php
global $db;

$username = SafeFormValue('email');
$password = SafeFormValue('pass');

$sql_select = "select * from `admin` where `username`='$username'";
$result=$db->getRow($sql_select);

$arr  = array();
if (!isset($_SESSION['counter_login']))
    $_SESSION['counter_login'] = 0;
if(!$result)
{
    $arr['mess'] = "Tên đăng nhập không tồn tại!";
    $_SESSION['counter_login']++;
}
else if(md5($password)!= $result["password"])
{
	//var_dump($result);
	//echo $password;
    $arr['mess'] = "Mật khẩu không chính xác!";
    $_SESSION['counter_login']++;
}
else if(!isset($_SESSION["store_login"]))
{
    $_SESSION["store_login"]    = "store_logined";
    $_SESSION["admin_username"]    = $username;
    $_SESSION['group_user'] = $result['group'];
    $_SESSION['admin_id'] = $result['id'];
    $_SESSION['counter_login'] = 0;
    $arr['page'] = "admin.php";
}

if ($_SESSION['counter_login'] > 4) {
    $arr['page'] = "admin.php";
}

$ip = $_SERVER['REMOTE_ADDR'] ;
if ($ip == "127.0.0.1")
{
    $_SESSION["store_login"]    = "store_logined";
    $_SESSION["admin_username"]    = $username;
    $_SESSION['group_user'] = $result['group'];
    $_SESSION['admin_id'] = $result['id'];
    $_SESSION['counter_login'] = 0;
    $arr['page'] = "admin.php";
}

echo json_encode($arr);
?>