
<?php
	$arr['name'] = SafeFormValue('name');
	$arr['address'] = SafeFormValue('address');
	$arr['phone'] = SafeFormValue('phone');
$arr['address_giaohang'] = SafeFormValue('address_giaohang');
	//$arr['email'] = SafeFormValue('email');
	$captcha = SafeFormValue("captcha");
	
	//if($captcha == $_SESSION['security_code'])
    if(true)
	{
		if (!empty($arr['name']))
		{
			Members::Modify($arr);
			$rel["error"] = 0;
			$rel["mess"] = MESS_MODIFY_SUCCESSFULLY;
		}
	}
	else
	{
		$rel["error"] = 1;
		$rel["mess"] = MESS_WRONG_CAPTCHA_CODE;
	}
	echo json_encode($rel);
?>