<link href="css/tintuc.css" rel="stylesheet" type="text/css" />
<link href="css/ui.datepicker.css" rel="stylesheet" type="text/css" />
<link href="css/ui.theme.css" rel="stylesheet" type="text/css" />
<link type="text/css" rel="stylesheet" href="css/colorbox.css" />

<script type="text/javascript" src="js/ui.core.js"></script>
<script type="text/javascript" src="js/main.js"></script>
<script type="text/javascript" language="javascript" src="js/jquery.form-defaults.js"></script>
<script type="text/javascript">
<!--
	$(document).ready(function() {
		//Assign default value to form field #1
		$("#namex").DefaultValue("<?php echo NAME; ?> *");
		$("#password").DefaultValue("Password *");
		$("#confirm").DefaultValue("Confirm Password *");
		$("#diachi").DefaultValue("<?php echo ADDRESS; ?> *");
		$("#dienthoai").DefaultValue("<?php echo TEL; ?> *");
		$("#emailx").DefaultValue("Email *");
		
	});
-->
</script>
<script type="text/javascript" language="javascript">

function Register() {

	var password = document.getElementById("password");
	var confirms = document.getElementById("confirm");
	
	
	var name = document.getElementById("namex");
	var email = document.getElementById("emailx");
	var phone = document.getElementById("dienthoai");
	
	var intro = document.getElementById("diachi");
	
	var r = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var flag = 0;
    
	// do field validation
	if (password.value.indexOf("*")>0 || password.value=="") {
		alert( "<?php echo PasswordValidate; ?>" );
		password.focus();
		flag = 1;
	}
	else if (confirms.value.indexOf("*")>0 || confirms.value=="") {
		alert( "<?php echo CfValidate; ?>" );
		confirms.focus();
		flag = 1;
	}
	else if (confirms.value != password.value) {
		alert( "<?php echo CfPasswordValidate; ?>" );
		confirms.focus();
		flag = 1;
	}
	else if (name.value.indexOf("*")>0 || name.value=="") {
		alert( "<?php echo NameValidate; ?>" );
		name.focus();
		flag = 1;
	}else if(phone.value.indexOf("*")>0 || phone.value==""){
		alert( "<?php echo PhoneValidate; ?>" );
		phone.focus();
		flag = 1;
	}else if(TestTelephone(phone.value)==false){
		alert( "<?php echo PhoneFormatValidate; ?>" );
		phone.focus();
		flag = 1;
	}else if(email.value.indexOf("*")>0 || email.value==""){
		alert( "<?php echo EmailValidate; ?>" );
		email.focus();
		flag = 1;
	}else if(r.test(email.value)==false){
		alert( "<?php echo EmailFormatValidate; ?>" );
		email.focus();
		flag = 1;
	}else if(intro.value.indexOf("*")>0 || intro.value==""){
		alert( "<?php echo AddressValidate; ?>" );
		intro.focus();
		flag = 1;
	}
	/*if(flag == 1)
		return false;
	return true;*/
	if(flag == 0){
		//alert('submit');
		var f = document.getElementById('formcontact');
		f.submit();
	}
}		
</script>
