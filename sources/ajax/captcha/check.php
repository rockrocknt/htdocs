<?php
$captcha = SafeFormValue("captcha");
$rel["error"] = 0;
$rel["mess"] = "";


if($captcha == $_SESSION['security_code']) {

}else
{
    $rel["error"] = 1;
    $rel["mess"] = MESS_WRONG_CAPTCHA_CODE;

}

echo json_encode($rel);