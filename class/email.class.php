<?php
include("./includes/mail_config.php");
	
class Email{
    public static function sendEmailContact($arr) {
        global $mail, $mailInfos, $lg;

        $templatePath = "EmailTemplate/contact.html";
        $fh = fopen($templatePath, 'r');
        $template = fread($fh, filesize($templatePath));
        fclose($fh);

        $senderName = 'Admin';
        $contactMail = trim($mailInfos['mail_contact']);
        $adminlist = $mailInfos['mail_list'];
        $mail_bccList =  explode(";", $adminlist);
        // template
        $footermail = Info::getInfoField("mail_footer_$lg");
        $template = str_replace('[NAME]', $arr['name'], $template);
        $template = str_replace('[PHONE]', $arr['phone'], $template);
        $template = str_replace('[EMAIL]', $arr['email'], $template);
        $template = str_replace('[MESSAGE]', $arr['message'], $template);
        $template = str_replace('[WEBSITE]', $arr['website'], $template);

        $madonhang = "";
        if (isset($arr['madonhang']))
        {
            $madonhang =$arr['madonhang'];
        }
        $template = str_replace('[madonhang]', $madonhang, $template);

        $template = str_replace('[MAIL_FOOTER]', $footermail, $template);

        $mail->Subject = "[".$arr["website"]."] "."Liên hệ từ ".$arr['name']." - ".$arr['email'];
        $mail->MsgHTML($template);
        $mail->AddAddress($contactMail, $senderName);

        for($i=0; $i<count($mail_bccList); $i++){
            $bccMail = trim($mail_bccList[$i]);
            if (IsValidEmail($bccMail))
                $mail->AddBCC($bccMail, $senderName);
        }

        if($mail->Send())
            return true;
        return false;
    }


    public static function sendEmailRegister($arr) {
		global $mail, $lg, $mailInfos;

		$templatePath = "EmailTemplate/memReg_$lg.html";
		$fh = fopen($templatePath, 'r');
		$template = fread($fh, filesize($templatePath));
		fclose($fh);
		// template
		$footermail = Info::getInfoField("mail_footer_$lg");
		$template = str_replace('[NAME]', $arr['name'], $template);
		$template = str_replace('[EMAIL]', $arr['email'], $template);
		$template = str_replace('[WEBSITE]', $arr['website'], $template);

        $template = str_replace('[WEBSITE_NAME]', $arr['website'], $template);


		$template = str_replace('[PASSWORD]', $arr['password'], $template);
		$template = str_replace('[MAIL_FOOTER]', $footermail, $template);



		$mail->Subject = "[".$arr["website"]."] ".MAIL_SUBJECT_REGISTER;	
		$mail->MsgHTML($template);
		$mail->AddAddress($arr['email'], $arr['name']);
	
		$mail->Send();
	}

    public static function sendEmailOrder($arr) {

		global $mail,$db, $lg, $mailInfos;
        /*
	//	$templatePath = "EmailTemplate/order_$lg.html";
        $templatePath = "EmailTemplate/email.html";
		$fh = fopen($templatePath, 'r');
		$template = fread($fh, filesize($templatePath));
		fclose($fh);
        */
        $sql = "select * from infos";
        $roww= $db->getRow($sql);
      //  var_dump($roww);
        $template = $roww['email_order_vn'];

		$senderName = 'Admin';
		$contactMail = trim($mailInfos['mail_contact']);
		$adminlist = $mailInfos['mail_list'];
		$mail_bccList =  explode(";", $adminlist);
		// template
		$footermail = Info::getInfoField("mail_footer_$lg");
		//
        $template = str_replace('[FNAME]',$arr['orderFirstName'], $template);
        $template = str_replace('[LNAME]',$arr['orderLastName'], $template);

        $template = str_replace('[NAME]',$arr['orderFirstName']." ". $arr['orderLastName'], $template);

		$template = str_replace('[PHONE]', $arr['orderPhone'], $template);
		$template = str_replace('[EMAIL]', $arr['orderEmail'], $template);

        $template = str_replace('[ADDRESS]', $arr['orderAddress']." ". $arr['orderCity'], $template);
        $template = str_replace('[CITY]', $arr['orderCity'], $template);
		$template = str_replace('[MESSAGE]', $arr['odr_note'], $template);
        $template = str_replace('[CONTENT]', $arr['odr_note'], $template);


        $template = str_replace('[ORDER_MESSAGE]',Info::getInfoField('order_footer_vn'), $template);

        $now = strtotime('now');
        $strYear = date('Y',$now);
        $strMonth  = date('m',$now);
        $strDate  = date('d',$now);
        $template = str_replace('[DATESEND]', $strDate."/".$strMonth."/".$strYear, $template);

		$template = str_replace('[RNAME]', $arr['receiveName'], $template);
		$template = str_replace('[RPHONE]', $arr['receivePhone'], $template);
		$template = str_replace('[REMAIL]', $arr['receiveEmail'], $template);
		$template = str_replace('[RADDRESS]', $arr['receiveAddress'], $template);

		$template = str_replace('[PAYMENT]', $arr['payment'], $template);
		$template = str_replace('[WEBSITE]', $arr['website'], $template);
        $template = str_replace('[WEBSITE_NAME]', $arr['website'], $template);
		$template = str_replace('[GUIDE]', $arr['guide'], $template);
		$template = str_replace('[ORDER_DETAIL]', $arr['order_detail'], $template);

		$template = str_replace('[IDORDER]', $arr['idorder'], $template);
		$template = str_replace('[MAIL_FOOTER]', $footermail, $template);

        $couponfee = 0;
        if (isset($_SESSION['coupon']))
        {
            $code = $_SESSION['coupon'];

            $coupon = $_SESSION['coupon'];

            $sotiengiam = $coupon['sotiengiam'];

            if ($coupon['coupontype'] == 0){}
            else{
                $sotiengiam =($arr['total'] * $sotiengiam) / 100;
                //$totalall = $arr['total'] - ( $sotiengiam);
            }


            $template = str_replace('[COUPONCODE]',$code['code'], $template);
            $template = str_replace('[COUPONFEE]',"-".formatPrice($sotiengiam), $template);
            $couponfee = $sotiengiam;
        }else{
            $template = str_replace('[COUPONCODE]',"Không có", $template);
            $template = str_replace('[COUPONFEE]',"", $template);
        }



        $arr['total'] = $arr['total']   - $couponfee;

        $_SESSION["final_total"] = $arr['total'] ;



        $template = str_replace('[TOTAL]', formatPrice($arr['total']), $template);


        if (getsession('cachthanhtoan')==2)
        {
            $template = str_replace('[CACHTHANHTOAN]', "Chuyển khoản", $template);
        }
        if (getsession('cachthanhtoan')==3)
        {
            $arr['payment'] = "Thanh toán chuyển khoản online ngay";
        }
        else
        {
            $template = str_replace('[CACHTHANHTOAN]', "Thu tiền khi giao hàng", $template);
        }



        global $db;
        $sql = "select * from `orders` where `odr_id`=".$arr['idorder'];
        $row =$db->getRow($sql);




        if (isset($row['full_content']))
        {
            $aarr['full_content'] = $template;
            vaUpdate('orders',$aarr,"`odr_id`=".$arr['idorder']);


        }
		//$mail->Subject = "[".$arr["website"]."] ".MAIL_SUBJECT_ORDER.$arr['idorder'];
        $mail->Subject = "[HongLeoCoLong.com] ".MAIL_SUBJECT_ORDER.$arr['idorder'];
		$mail->MsgHTML($template);
		$mail->AddAddress($arr['orderEmail'], $arr['orderName']);
		$mail->AddBCC($contactMail, $senderName);

		for($i=0; $i<count($mail_bccList); $i++){
			$bccMail = trim($mail_bccList[$i]);
			if (IsValidEmail($bccMail))
				$mail->AddBCC($bccMail, $senderName);
		}

       // echo $template;
        //unset($_SESSION['cart']);
        if (isset($_SESSION['coupon'])){
            unset($_SESSION['coupon']);
        }

		if ($mail->Send()) {
			return true;
		} else {
			return false;
		}
        
	}

    public static function sendEmailForgetPassword($arr)
	{
		global $mail, $lg, $mailInfos;
		
		$templatePath = "EmailTemplate/memForget_$lg.html";
		$fh = fopen($templatePath, 'r');
		$template = fread($fh, filesize($templatePath));
		fclose($fh);	
		// template
		$footermail = Info::getInfoField("mail_footer_$lg");
		$template = str_replace('[EMAIL]', $arr['email'], $template);
		$template = str_replace('[LINK]', $arr['resetpass_link'], $template);
		$template = str_replace('[WEBSITE]', $arr['website'], $template);
		$template = str_replace('[MAIL_FOOTER]', $footermail, $template);

		$mail->Subject = "[".$arr["website"]."] ".MAIL_SUBJECT_RESET_PASSWORD;	
		$mail->MsgHTML($template);
		$mail->AddAddress($arr['email'], $arr['email']);
	
		if (!$mail->Send()) {
			return false;
		}
		
		return true;
	}

    public static function sendEmailResetPassword($arr)
	{
		global $mail, $lg, $mailInfos;

		$templatePath = "EmailTemplate/memReset_$lg.html";
		$fh = fopen($templatePath, 'r');
		$template = fread($fh, filesize($templatePath));
		fclose($fh);
		// template
		$footermail = Info::getInfoField("mail_footer_$lg");
		$template = str_replace('[EMAIL]', $arr['email'], $template);
		$template = str_replace('[PASSWORD]', $arr['newpass'], $template);
		$template = str_replace('[WEBSITE]', $arr['website'], $template);
		$template = str_replace('[MAIL_FOOTER]', $footermail, $template);

		$mail->Subject = "[".$arr["website"]."] ".MAIL_SUBJECT_RESET_PASSWORD_SUCCESSFUL;	
		$mail->MsgHTML($template);
		$mail->AddAddress($arr['email'], $arr['email']);
	
		if (!$mail->Send()) {
			$_SESSION['mess'] = MESS_SEND_EMAIL_UNSUCCESSFUL;
			return false;
		}
		
		return true;
	}

    public static function sendEmailForgotPassAdmin($arr)
	{
		global $mail, $lg, $mailInfos;

		$templatePath = "EmailTemplate/adminForget.html";
		$fh = fopen($templatePath, 'r');
		$template = fread($fh, filesize($templatePath));
		fclose($fh);
		// template
		$footermail = Info::getInfoField("mail_footer_$lg");
		$template = str_replace('[EMAIL]', $arr['email'], $template);
		$template = str_replace('[LINK]', $arr['link'], $template);
		$template = str_replace('[WEBSITE]', $arr['website'], $template);
		$template = str_replace('[MAIL_FOOTER]', $footermail, $template);

		$mail->Subject = "[".$arr["website"]."] ".'Khôi phục mật khẩu CMS';	
		$mail->MsgHTML($template);
		$mail->AddAddress($arr['email'], 'Admin');
	
		if (!$mail->Send()) {
			return false;
		}
		
		return true;
	}

    public static function sendEmailResetPassAdmin($arr)
	{
		global $mail, $lg, $mailInfos;

		$templatePath = "EmailTemplate/adminReset.html";
		$fh = fopen($templatePath, 'r');
		$template = fread($fh, filesize($templatePath));
		fclose($fh);
		// template
		$footermail = Info::getInfoField("mail_footer_$lg");
		$template = str_replace('[EMAIL]', $arr['email'], $template);
		$template = str_replace('[USERNAME]', $arr['username'], $template);
		$template = str_replace('[PASS]', $arr['password'], $template);
		$template = str_replace('[WEBSITE]', $arr['website'], $template);
		$template = str_replace('[MAIL_FOOTER]', $footermail, $template);

		$mail->Subject = "[".$arr["website"]."] ".'Mật khẩu CMS mới';	
		$mail->MsgHTML($template);
		$mail->AddAddress($arr['email'], 'Admin');
	
		if (!$mail->Send()) {
			return false;
		}
		
		return true;
	}
	
	public function sendEmailOptin($arr)
	{
		global $mail, $lg, $mailInfos;

		if (strlen($arr["template"])>10)
		{
			$template = $arr["template"];
		}
		else
		{
			$templatePath = "EmailTemplate/OptIn_$lg.html";
			
			$fh = fopen($templatePath, 'r');
			$template = fread($fh, filesize($templatePath));
			fclose($fh);
		}
		// template
		$footermail = Info::getInfoField("mail_footer_$lg");
		$template = str_replace('[NAME]', $arr['otn_name'], $template);
		$template = str_replace('[LINK]', $arr['link'], $template);
		$template = str_replace('[WEBSITE]', $arr['website'], $template);
		$template = str_replace('[MAIL_FOOTER]', $footermail, $template);

		$mail->Subject = "[".$arr["website"]."] ".$arr["subject"];	
		$mail->MsgHTML($template);
		$mail->AddAddress($arr['otn_email'], $arr['otn_name']);
	
		if (!$mail->Send()) {
			return false;
		}
		
		return true;
	}
}
?>