<?php
	global $FullUrl, $prefix_url;

	$email = SafeFormValue("email");
	$captcha = SafeFormValue("captcha");
	
	if($captcha == $_SESSION['security_code']) {
		if (IsValidEmail($email)) {
			if (Members::ForgotPass($email)) {
				$arr["error"] = 0;
			} else {
				$arr["error"] = 1;
			}
			$arr['mess'] = $_SESSION['mess'];
			unset($_SESSION['mess']);
		}
	} else {
		$arr["error"] = 1;
		$arr['mess'] = MESS_WRONG_CAPTCHA_CODE;
	}
		
	echo json_encode($arr);
?>