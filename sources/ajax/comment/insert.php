<?php
    $name = SafeFormValue('name');
	$email = SafeFormValue('email');
	$message = SafeFormValue('message');
    $cmt_pid =SafeFormValue('pid');
    $cmt_post_id = SafeFormValue('post_id');
	$cmt_do = SafeFormValue('type');
	$captcha = SafeFormValue("captcha");
	$checkcomment = Info::getInfoField('checkcomment');

    if($captcha == $_SESSION['security_code']) {
		if ($checkcomment)
        	$arr['cmt_active'] = 0;
		else
			$arr['cmt_active'] = 1; // khong can kiem duyet
        $arr['cmt_name'] = $name;
        $arr['cmt_email'] = $email;
        $arr['cmt_content'] = $message;
        $arr['cmt_post_id'] = $cmt_post_id;
		$arr['cmt_do'] = $cmt_do;
        $arr['cmt_pid'] = $cmt_pid;
        $arr['has_child'] = 0;
        vaInsert('comments',$arr);

        if($cmt_pid != 0) {	// neu co comment cha thi cap nhat lai has_child cua comment cha = 1
            $arr2['has_child'] = 1;
            vaUpdate('comments', $arr2, 'cmt_id='.$cmt_pid);
        }
		
		$rel["error"] = 0;
		$rel['mess'] = MESS_COMMENT_SUCCESSFULLY;

    } else {
		$rel["error"] = 1;
       	$rel['mess'] = MESS_WRONG_CAPTCHA_CODE;
	}
		
	echo json_encode($rel);
?>