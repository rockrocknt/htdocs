<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="Shortcut Icon" href="logo.ico"/>
<script type="text/javascript" language="javascript" src="./js/jquery.min.js"></script>
<script language="javascript" src="js/ajax.js"></script>
<script language="javascript" src="js/function.js"></script>
<meta http-equiv="Content-Language" content="en-us">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>ADMINISTRATOR</TITLE>
<META content="Admin Artseed" name=description>
<META content="Admin Artseed" name=Author>
<META content="photo 360" name=keywords>
<META content="index,follow" name=robots>
<link href="images/admin/style.css" rel="stylesheet" type="text/css">
<?php /*?>
<!--Highlight-->
<script type="text/javascript" src="highslide/highslide.js"></script>
<link rel="stylesheet" type="text/css" href="highslide/highslide.css" />
<script type="text/javascript">
	hs.graphicsDir = 'highslide/graphics/';
	hs.align = 'center';
	hs.transitions = ['expand', 'crossfade'];
	hs.outlineType = 'rounded-white';
	hs.fadeInOut = true;
	//hs.numberPosition = 'caption';
	hs.dimmingOpacity = 0.75;
</script>
<!--Highlight end-->
<?php */?>

<script language="javascript">
	function CheckDelete(l){
		if(confirm('Are You Sure?'))
			location.assign(l);
	}															
</script>
<script language="javascript">

// validates that the field value string has one or more characters in it
function isNotEmpty(elem) {
    var str = elem.value;
	var re = /.+/;
    if(!str.match(re)) {
        alert("Please fill in the required field!");
		elem.focus();
        return false;
    } else {
        return true;
    }
}
function confirmdel()
		   {	if(!window.confirm("Do you really want to delete? It can cause changes in your system"))
	   			return false; else return true;}
// Check retype password
function checkrepass(elem1,elem2) {
    if(elem1.value != elem2.value) {
        alert("Password not match! Please retype password!");
		elem2.focus();
        return false;
    } else {
        return true;
    }
}

//validates that the entry is a positive or negative number
function isNumber(elem) {
    var str = elem.value;
    var re = /^[-]?\d*\.?\d*$/;
    str = str.toString( );
    if (!str.match(re)) {
        alert("Enter only numbers into the field!");
		elem.focus();
        return false;
    }
    return true;
}
function isPositive(elem) {
    if (elem.value<0) {
        alert("Enter only positve numbers into the field!");
		elem.focus();
        return false;
    }
    return true;
}
function isBetween(elem,a,b) {
    if ((elem.value<a) || (elem.value>b)){
		str="This number must be from " + a + " to " + b;
        alert(str);
		elem.focus();
        return false;
    }
    return true;
}
function isLen16(elem) {
    var str = elem.value;
    var re = /\b.{16}\b/;
    if (!str.match(re)) {
        alert("Entry does not contain the required 16 characters!");
		elem.focus();
        return false;
    } else {
        return true;
    }
}
   
// validates that the entry is formatted as an email address
function isEmailAddr(elem) {

    var str = elem.value;
    var re = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
    if (!str.match(re)) {
        alert("Verify the email address format!");
		elem.focus();
        return false;
    } else {
        return true;
    }
}

///////////////////////////////////////
function view(act,id){
 var arg= "width =550, height=300,";
 arg+="resizable=no,scrollbars=yes,";
 arg+="status=0,top=0,left=450";
 window.open("popup.php?act="+act+"&id="+id,"a",arg);
 }
function check(){
if (confirm("are you sure?")) return true;
return false;
}
function navigate(t,choice) {
    var url = t+choice.options[choice.selectedIndex].value;
    if (url) {
        location.href = url;
    }
}

</script>
</head>
<body>
<table width="100%">
<tr>
	<td colspan="2" valign="top"><table  width="100%" height="155" border="0" cellspacing="0" cellpadding="0" background="images/admin/repeat_bg.jpg" style="background-repeat:repeat-x;">
			<tr>
				<td valign="bottom" background="images/admin/logo_main.jpg" style="background-repeat:no-repeat; padding-bottom:0px; background-position:left bottom;"><table width="439" border="0" align="right" cellpadding="0" cellspacing="0" background="images/admin/bg_bnt.jpg" style="">
						<tr>
							<td width="15" >&nbsp;</td>
							<td width="144"><div class="style1"><strong>Welcome admin page</strong></div></td>
							<td width="2"><img src="images/admin/n.jpg" /></td>
							<td width="135" class="style2"><div align="center"><a href="admin.php?do=profile&act=changepass" class="style2" style="color:#FFFFFF"> <strong>Change password</strong></a></div></td>
							<td width="2"><img src="images/admin/n.jpg" /></td>
							<td width="68" class="style2"><div align="center"><a href="admin.php?do=login&act=log_out" class="style2" style="color:#FFFFFF"> <strong>Logout</strong></a> </div></td>
							<td width="73" class="style2">&nbsp;</td>
						</tr>
					</table></td>
			</tr>
		</table></td>
</tr>
