<?php
	global $FullUrl, $prefix_url, $lg;

	$arr['email'] = SafeFormValue("email");
	$arr['password'] = SafeFormValue("password");

	if (!empty($arr['password']) && IsValidEmail($arr['email']))
	{
		if (!Members::Login($arr))
		{
			echo $_SESSION['mess'];
			unset($_SESSION['mess']);
		}
	}
?>