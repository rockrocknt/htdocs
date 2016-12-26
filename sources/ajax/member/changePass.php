<?php
	global $FullUrl, $prefix_url;

	$arr['email'] = $_SESSION["member_email"];
	$arr['oldpass'] = SafeFormValue("oldpass");
	$arr['newpass'] = SafeFormValue("newpass");
$rel["error"] = 1;
	if (!empty($arr['oldpass']) && !empty($arr['newpass']) && !empty($arr['email']))
	{
		if (Members::ChangePass($arr)) {
			$rel["error"] = 0;
		} else {
			$rel["error"] = 1;
		}
		$rel["mess"] = $_SESSION['mess'];
		unset($_SESSION['mess']);
	}
		
	echo json_encode($rel);
?>