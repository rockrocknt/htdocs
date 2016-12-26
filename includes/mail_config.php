<?php
include('./lib/PHPMailer/class.phpmailer.php');
global $mail, $mailInfos;

$mailInfos = Info::getInfoMailConfig();

$mail = new PHPMailer();
$mail->IsSMTP(); // telling the class to use SMTP
$mail->Host       = strip_tags(trim($mailInfos['mail_host'])); // SMTP server
//$mail->SMTPDebug  = 2;                     // enables SMTP debug information (for testing)
                                           // 1 = errors and messages
                                           // 2 = messages only
$mail->SMTPAuth   = true;                  // enable SMTP authentication
if ($mail->Host == 'smtp.gmail.com') {		// gmail
	$mail->SMTPSecure = 'ssl';
	$mail->Port       = 465;                    // set the SMTP port for the GMAIL server
} else {
	$mail->Port       = 25;
}

$mail->Username   = strip_tags(trim($mailInfos['mail_user'])); // SMTP account username
$mail->Password   = strip_tags(trim($mailInfos['mail_pass']));        // SMTP account password

$mail->SetFrom(strip_tags(trim($mailInfos['mail_user'])), !empty($mailInfos['mail_name'])?$mailInfos['mail_name']:'Webmaster');
$mail->CharSet = "UTF-8"; 
?>