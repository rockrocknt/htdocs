<script type="text/javascript">
	jQuery(document).ready(function() {
		/*jQuery(".HoTenInput").DefaultValue("Họ tên (*)");
		jQuery(".DiaChiInput").DefaultValue("Địa chỉ (*)");
		jQuery(".DienThoaiInput").DefaultValue("Điện thoại (*)");
		jQuery(".EmailInput").DefaultValue("E-mail (*)");
		jQuery(".TinNhanInput").DefaultValue("Yêu cầu của khách (*)");*/
		
		$(".Payment > p > input").each(function() {
			if ($(this).attr("type")=="radio" && $(this).attr("checked")==true) {
				$(this).parent().find("label").css("color","#FF9600");
			}
		});
		$(".Payment > p > input").bind("click",function() {
			$(".Payment > p > label").each(function() {
				$(this).css("color","#FFFFFF");
			});
			$(this).parent().find("label").css("color","#FF9600");	
		});
	});
	
function Register() {

	var name = document.getElementById("namex");
	var email = document.getElementById("emailx");
	var phone = document.getElementById("dienthoai");
	var company = document.getElementById("congty");
	var intro = document.getElementById("noidung");
	var address = document.getElementById("diachi");
	var r = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    var flag = 0;
    
	// do field validation
	if (name.value.indexOf("*")>0 || name.value=="") {
		alert( "<?php echo NameValidate; ?>" );
		name.focus();
		flag = 1;
	}else if(company.value.indexOf("*")>0 || company.value==""){
		alert( "<?php echo CompanyValidate; ?>" );
		company.focus();
		flag = 1;
	}/*else if(address.value.indexOf("*")>0 || address.value==""){
		alert( "Mời bạn nhập địa chỉ" );
		address.focus();
		flag = 1;
	}*/else if(phone.value.indexOf("*")>0 || phone.value==""){
		alert( "<?php echo PhoneValidate; ?>" );
		phone.focus();
		flag = 1;
	}/*else if(TestTelephone(phone.value)==false){
		alert( "<?php echo PhoneFormatValidate; ?>" );
		phone.focus();
		flag = 1;
	}*/else if(email.value.indexOf("*")>0 || email.value==""){
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
	/*if(flag == 1)
		return false;
	return true;*/
	if(flag == 0){
		//alert('submit');
		document.getElementById('formcontact').submit();
	}
	else
		alert("Error");
}		
</script>