<script language="javascript" type="text/javascript">
function Register() {
	var name = document.getElementById("namex");
	var email = document.getElementById("emailx");
	var phone = document.getElementById("dienthoai");
	var intro = document.getElementById("noidung");
	var r = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var flag = 0;
    
	// do field validation
	if (name.value.indexOf("*")>0 || name.value=="") {
		alert( "<?php echo NameValidate; ?>" );
		name.focus();
		flag = 1;
	}else if(phone.value.indexOf("*")>0 || phone.value==""){
		alert( "<?php echo PhoneValidate; ?>" );
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
		alert( "<?php echo ContentValidate; ?>" );
		intro.focus();
		flag = 1;
	}
	if(flag == 0){
		document.getElementById('formcontact').submit();
	}
}		
</script>