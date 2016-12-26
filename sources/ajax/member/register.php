<?php
	global $FullUrl, $prefix_url, $lg;

	$arr['name'] = SafeFormValue("name");
	$arr['phone'] = SafeFormValue("phone");
	$arr['email'] = SafeFormValue("email");
	$arr['address'] = SafeFormValue("address");
	$arr['password'] = SafeFormValue("password");
	$captcha = SafeFormValue("captcha");
	
	//if($captcha == $_SESSION['security_code'])
    if(true)
	{
		//if (!empty($arr['name']) && !empty($arr['password']) && IsValidEmail($arr['email']))
        if ( !empty($arr['password']) && IsValidEmail($arr['email']))
		{		
			if (Members::Register($arr)) {
				$rel['error'] = 0;
				$rel['mess'] = MESS_REGISTER_SUCCESSFUL;
			} else {
				$rel['error'] = 1;
				$rel['mess'] = MESS_EMAIL_EXIST;
			}
		}
	} else {
		$rel['error'] = 1;
		$rel['mess'] = MESS_WRONG_CAPTCHA_CODE;
	}
		
	echo json_encode($rel);
?>