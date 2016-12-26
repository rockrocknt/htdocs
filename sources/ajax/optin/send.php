<?php
	global $FullUrl, $prefix_url, $db, $lg;
	
	$arr['otn_name'] = SafeFormValue("name");
	$arr['otn_email'] = SafeFormValue("email");

	$arr['otn_otn_type_id'] = SafeFormValue("pid");

	//if (!empty($arr['otn_name']) && IsValidEmail($arr['otn_email'])) {
    if ( IsValidEmail($arr['otn_email'])) {
		$sql = "select * from optin where otn_email like '".$arr["otn_email"]."'";


		$check = $db->getRow($sql);
		
		if (!$check) {
			vaInsert('optin',$arr);
            return;
		}
        return;
		$sql = "select * from optin_type where id=".$arr['otn_otn_type_id'];
		$program = $db->getRow($sql);
		$arr["link"] = GetFullDomain().'/'.$program["otn_type_file"];
		$arr["website"] = GetFullDomain();
		$arr["subject"] = $program["email_subject_$lg"]?$program["email_subject_$lg"]:$program["email_subject_vn"];
		$arr["template"] = $program["email_template_$lg"];

		if(!Email::sendEmailOptin($arr))
			echo MESS_CONTACT_UNSUCCESSFUL;
		else
			echo $program["alert_$lg"];
	}
?>