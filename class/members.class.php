<?php
class Members{
    public static function Register($arr)
	{
		global $db;
		
		$sql = "select email from member where email='".$arr['email']."'";
		$r = $db->getRow($sql);

        $_SESSION['member_email'] = $r['email'];


		if($r) {
			return false;
		} else {
			$pass = $arr['password'];
			$arr['password'] = md5($arr['password']);
			$arr['group']= 3;
			
			$member_id = vaInsert("member", $arr);
            $sql = "select email from member where email='".$arr['email']."'";
            $r = $db->getRow($sql);
            $_SESSION['member'] = $r ;

			$_SESSION['member_login'] = 1;
			$_SESSION['member_id'] = $member_id;
			$_SESSION['member_email'] = $arr['email'];
			$_SESSION['member_name'] = $arr['name'];
			$_SESSION['member_address'] = $arr['address'];
			$_SESSION['member_phone'] = $arr['phone'];
			$_SESSION['member_password'] = $arr['password'];
			
			$arr["website"] = GetFullDomain();
			$arr["password"] = $pass;
			Email::sendEmailRegister($arr);
			return true;
		}
	}

    public static function Login($arr)
	{		
		if (Members::checkInfoLogin($arr))
			return true;
		return false;
	}

    public static function checkInfoLogin($arr)
	{
		global $db;
		
		$sql = "select * from member where email='".$arr['email']."' and `is_registered`=1";
		$r = $db->getRow($sql);
		
		if($r){
			if($r['password'] == md5($arr['password'])){

				$_SESSION['member_password'] = $r['password'];
				$_SESSION['member_email'] = $r['email'];
				$_SESSION['member_name'] = $r['name'];
				$_SESSION['member_address'] = $r['address'];
				$_SESSION['member_phone'] = $r['phone'];
				$_SESSION['member_id'] = $r['id'];
				$_SESSION['member_login'] = 1;
                $_SESSION['member'] = $r;
				return true;
			}
			else {
				$_SESSION['mess'] = MESS_WRONG_PASSWORD;
				return false;
			}
		}
		else
		{
			$_SESSION['mess'] = MESS_EMAIL_NOT_EXIST;
			return false;
		}
	}

    public static function getPageTransfer()
	{
		global $FullUrl, $prefix_url;
		
		$page = SafeFormValue('prev_url');
		
		if ($page)
			$page = "http".$page;
		else
			$page = $FullUrl.$prefix_url;
		
		return $page;
	}

    public static function Logout()
	{
        if(isset($_SESSION['member']))
            unset($_SESSION['member']);
		if(isset($_SESSION['member_login']))
			unset($_SESSION['member_login']);
		
		if(isset($_SESSION['member_email']))
			unset($_SESSION['member_email']);
			
		if(isset($_SESSION['member_password']))
			unset($_SESSION['member_password']);
			
		if(isset($_SESSION['member_name']))
			unset($_SESSION['member_name']);
			
		if(isset($_SESSION['member_address']))
			unset($_SESSION['member_address']);
			
		if(isset($_SESSION['member_phone']))
			unset($_SESSION['member_phone']);	
		
		if(isset($_SESSION['member_id']))
			unset($_SESSION['member_id']);
			
		page_transfer2(Members::getPageTransfer());
	}

    public static function ChangePass($arr)
	{
		global $db, $FullUrl, $prefix_url;
	
		$sql = "select password from member where email='".$arr['email']."'";
		$r = $db->getRow($sql);

		if($r){
			$PasswordOld = md5($arr['oldpass']);
			$PasswordNew = md5($arr['newpass']);
			
			if($PasswordOld == $r['password']){
				$arr2 = array();
				$arr2['password'] = $PasswordNew;
				vaUpdate('member', $arr2, "email='".$arr['email']."'");
				
				$_SESSION['member_password'] = $PasswordNew;
				$_SESSION['mess'] = MESS_CHANGE_PASSWORD_SUCCESSFULL;
				return true;
			}
			else
				$_SESSION['mess'] = MESS_OLD_PASSWORD_INCORRECT;
			return false;
		}
	}

    public static function ForgotPass($email)
	{
		global $db, $FullUrl, $prefix_url, $lg;	

		$sql = "select email, id, password from member where email='$email'";
		$r = $db->getRow($sql);
		
		if($r) {
			$confirmation_code = md5($r['email'] . $r['password'] . time());
			$id_member = $r['id'];
			
			$arr = array();
			$arr['confirmation_code'] = $confirmation_code;
			$arr['id_member'] = $id_member;
			$now = getdate();
			$arr['code_time'] = $now['0'];
			vaInsert('confirmation',$arr);
			
			$link = 'http://www.'.GetFullDomain().$FullUrl."/"."index.php?do=member&act=resetpass&code=".$confirmation_code."&lg=".$lg;
			$arr2['resetpass_link'] = $link;
			$arr2['email'] = $email;
			$arr2['website'] = GetFullDomain();
			
			if(Email::sendEmailForgetPassword($arr2)) {
				$_SESSION['mess'] = MESS_SEND_LINK_SUCCESSFUL;
				return true;
			} else {
				$_SESSION['mess'] = MESS_SEND_LINK_UNSUCCESSFUL;
				return false;
			}
		} else {
			$_SESSION['mess'] = MESS_EMAIL_NOT_EXIST;
			return false;
		}
	}

    public static function ResetPass()
	{
		global $db,$act, $msg, $new_pass, $mail, $FullUrl, $prefix_url, $lg;
		$code = SafeQueryString("code");
		
		if(!empty($code))
		{
			$sql = "select code_time, id_member from confirmation where confirmation_code = '$code' and enable = '0'";
			$r = $db->getRow($sql);
		
			$now = getdate();
			$f_date = $r['code_time'];
			
			if(Members::MinExpiresCodeTime($now, $f_date, '30')){
				if($r){
					$id_member = $r['id_member'];
					$new_pass = GenRandomString();
					
					$sql = "select email, name, id, address, phone from member where id='" . $id_member . "'";
					$r = $db->getRow($sql);
					
					$link = 'http://www.'.GetFullDomain().$FullUrl.$prefix_url.($lg=='vn'?'doi-mat-khau.html':"change-password.html");
					
					$arrInfo['resetpass_link'] = $link;
					$arrInfo['email'] = $r['email'];
					$arrInfo['newpass'] = $new_pass;
					$arrInfo['website'] = GetFullDomain();
					
					if(Email::sendEmailResetPassword($arrInfo)){
						$_SESSION['member_login'] = 1;
						$_SESSION['member_id'] = $r['id'];
						$_SESSION['member_email'] = $r['email'];
						$_SESSION['member_name'] = $r['name'];
						$_SESSION['member_password'] = md5($new_pass);
						$_SESSION['member_address'] = $r['address'];
						$_SESSION['member_phone'] = $r['phone'];
							
						$arr = array();
						$arr['password'] = md5($new_pass);	
						vaUpdate('member',$arr, "id='" . $id_member . "'");	
							
						$arr = array();
						$arr['enable'] = 1;
						vaUpdate('confirmation', $arr, "id_member = '" . $id_member . "'");

						$_SESSION['mess'] = MESS_RESET_PASSWORD_SUCCESSFULLY;
					}
				}
			}
			else{
				$_SESSION['mess'] = MESS_OUT_OF_DATE_LINK;
			}
		}
		page_transfer2($FullUrl.$prefix_url);
	}

    public static function Modify($arr)
	{
		global $db, $lg, $FullUrl, $prefix_url;
		
		if(isset($_SESSION['member_id']))
		{
			vaUpdate('member',$arr, "id='" . $_SESSION['member_id'] . "'");	
			
			$_SESSION['member_name'] = $arr['name'];
			$_SESSION['member_address'] = $arr['address'];
            $_SESSION['address_giaohang'] = $arr['address_giaohang'];
			$_SESSION['member_phone'] = $arr['phone'];
		}
	}

    public static function Detail()
	{
		global $db, $FullUrl, $prefix_url;
		
		if(isset($_SESSION['member_login']))
		{
			$sql = "select * from member where id = " . $_SESSION['member_id'];	
			$mem_detail = $db->getRow($sql);

			return $mem_detail;
		}
	}

    public static function MinExpiresCodeTime($now, $code_time, $min)
	{
		$now = getdate();
		
		$s_value = $code_time;
				
		$e_value = $s_value + ('60' * $min);
		
		$m_value = Members::valueDate($now);
		
		if($m_value >= $s_value && $m_value <= $e_value)
		{
			return 1;
		}	
		else 
		{
			return 0;
		} 
	}

    public static function valueDate($date_value)
	{
		return 	$date_value['0'];
	}

    public static function getMemberStatus($status)
	{
		if ($status == 1)
			return "Đã kích hoạt";
		if ($status == 2)
			return "Chưa kích hoạt";
		if ($status == 3)
			return "Đã bị banned";
	}
    public  static  function  insertMember($arr)
    {
        global $db;
        if (!isset($arr['email']))
        {
            $arr['email'] = $arr['orderEmail'];
        }
        $sql = "select * from member where email='".$arr['email']."'";
        $r = $db->getRow($sql);

        if($r) {
            return $r['id'];
        }

        $pass = rand(10,10000);
        $arr2 = array();
        $arr2['password'] = md5($pass);


        $arr2['email']= $arr['email'];

        $arr2['is_registered']= 0;
        $arr2['firstname'] = $arr['orderFirstName'];
        $arr2['lastname']   =   $arr['orderLastName'];
        $arr2['city'] = $arr['orderCity'];

        $arr2['address_giaohang'] = $arr['orderAddress'];
        $member_id = vaInsert("member", $arr2,0);

        return $member_id;

    }

    public  static  function  insertGuestCheckout($arr)
    {
        global $db;


        $pass = rand(10,10000);
        $arr2 = array();
        $arr2['password'] = md5($pass);
        $arr2['email']= $arr['email'];
        $arr2['is_registered']= 0;
        $arr2['firstname'] = $arr['orderFirstName'];
        $arr2['lastname']   =   $arr['orderLastName'];
        $arr2['city'] = $arr['orderCity'];

        $arr2['address_giaohang'] = $arr['orderAddress'];
        $member_id = vaInsert("guestcheckout", $arr2,0);

        return $member_id;

    }
    public  static  function  getfield($field)
    {

        if (isset($_SESSION['member']))
        {

                return $_SESSION['member'][$field];

        }
    }

}
?>