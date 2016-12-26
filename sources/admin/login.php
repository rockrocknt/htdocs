<?
	global $db;

switch($act){	
	case 'resetpass':
		ResetPass();
		$tpl = 'login';
		break;
}

function ResetPass()
{
	global $db;

	$email = SafeQueryString('email');
	$pass = SafeQueryString('password');

	if(!empty($email))
	{
		$sql = "select * from admin where email='" . $email . "'";
		$r = $db->getRow($sql);

		if($r){
			if($r['password'] == $pass){
				$new_pass = GenRandomString();
				$arr = array();
				$arr['password'] = md5($new_pass);
				vaUpdate('admin', $arr, "email='" . $email . "'");
				$arr['email'] = $email;
				$arr['username'] = $r['username'];
				$arr['password'] = $new_pass;
				$arr['website'] = GetFullDomain();
				
				if (Email::sendEmailResetPassAdmin($arr))
					$_SESSION['mess'] = 'Mật khẩu mới đã được tạo! Xin vui lòng kiểm tra mail!';
				else
					$_SESSION['mess'] = 'Không thể tạo mật khẩu mới! Xin quay lại lần sau!';
			}
			else
				$_SESSION['mess'] = 'Đường link này chỉ sử dụng được 1 lần!';
		}
		else
			$_SESSION['mess'] = 'Email này không tồn tại!';
	}
	page_transfer2("/admin.php");
}

include('./templates/admin/login.ctp');
?>
