<?php
	global $db, $mail, $FullUrl;
	$email = SafeFormValue('email');
	
	if(!empty($email))
	{
		$sql = "select email, password from admin where email='" . $email . "'";
		$r = $db->getRow($sql);

		if($r){
			$link = 'http://www.' . GetFullDomain() . $FullUrl . "/admin.php?do=login&act=resetpass&email=" . $r['email'] . "&password=" . $r['password'];
			
			$arr['email'] = $email;
			$arr['link'] = $link;
			$arr['website'] = GetFullDomain();
			
			if (Email::sendEmailForgotPassAdmin($arr))
				$arr['mess'] = 'Email đã được gởi đến bạn! Xin hãy kiểm tra mail!';
			else
				$arr['mess'] = 'Không thể gởi email, xin quay lại lần sau!';
		}
		else
			$arr['mess'] = 'Không có tài khoản nào đăng ký với email này!';
	}
	
	echo json_encode($arr);
?>