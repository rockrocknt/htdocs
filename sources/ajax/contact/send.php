<?php
global $FullUrl, $prefix_url;

$arr['name'] = SafeFormValue("name");
$arr['phone'] = SafeFormValue("phone");
$arr['email'] = SafeFormValue("email");
$arr['message'] = SafeFormValue("message");
if (isset($_POST['madonhang'])){
    $arr['madonhang'] = SafeFormValue("madonhang");
}

$captcha = SafeFormValue("captcha");
//if (!empty($arr['message']) && IsValidEmail($arr['email'])){
if(isset($_SESSION['security_code'])) {
    //if($captcha == $_SESSION['security_code']) {
    if (!empty($arr['name']) && !empty($arr['message']) && IsValidEmail($arr['email'])) {
        vaInsert('contact_logs',$arr);
        $arr['website'] = GetFullDomain();

        if (Email::sendEmailContact($arr)) {
            $rel["error"] = 0;
            $rel['mess'] = MESS_CONTACT_SUCCESSFUL;
        } else {
            $rel["error"] = 1;
            $rel['mess'] = MESS_CONTACT_UNSUCCESSFUL;
        }
    }
} else {
    $rel["error"] = 1;
    $rel['mess'] = MESS_WRONG_CAPTCHA_CODE;
}
if (isset($_SESSION['security_code']))	unset($_SESSION['security_code']);
echo json_encode($rel);
?>