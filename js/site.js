// js for google search
function SearchGoogle(){
	var key = document.getElementById("search-key").value;
	var site = document.domain;
	var qs = encodeURI(key + "+site:" + site);
	var url = "http://www.google.com.vn/search?q=" + qs;
	window.open(url, '_blank');
	return false;
}
$(document).ready(function(e) {
		// back to top
	$(window).scroll(function() {
		if($(window).scrollTop() != 0) {
			$('#back_to_top').fadeIn();
		} else {
			$('#back_to_top').fadeOut();
		}
	});
	   
	$('#back_to_top').click(function() {
		$('html, body').animate({scrollTop:0},500);
	});
});
/*
$(document).ready(function(e) {
	$('#slider').nivoSlider({directionNav:false});
	// back to top
	$(window).scroll(function() {
		if($(window).scrollTop() != 0) {
			$('#back_to_top').fadeIn();
		} else {
			$('#back_to_top').fadeOut();
		}
	});
	   
	$('#back_to_top').click(function() {
		$('html, body').animate({scrollTop:0},500);
	});
	// validate form
	$("#formContact").validationEngine();
	$("#formRegister").validationEngine();
	$("#formForgotPass").validationEngine();
	$("#formChangePass").validationEngine();
	$("#formChangeInfo").validationEngine();
	$("#formLogin").validationEngine();
	$("#formOrder").validationEngine();
	$("#formComment").validationEngine();
	// dialog box
	$("#dialog-message").dialog({
		autoOpen: false,
		modal: true,
		buttons: {
			Ok: function() {
				$(this).dialog("close");
			}
		}
	});
	// dialog box loading
	$("#loading-dialog-message").dialog({
		autoOpen: false,
		modal: true
	});
});
*/
function OnlyNumber(evt)
{
	var charCode = (evt.which) ? evt.which : event.keyCode
	if (charCode > 47 && charCode < 58)
		return true;
	
	return false;
}

function IsEmail(email){
	emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
	
	if(!emailRegExp.test(email))
		return false;
	return true;
}
function filterProduct()
{
    var chungloai,mausac,giatien,doituong,vatlieu,size,cid;
    chungloai = jQuery('#chungloai').val();
    mausac = jQuery('#mausac').val();
    giatien = jQuery('#giatien').val();
    doituong = jQuery('#doituong').val();
    vatlieu = jQuery('#vatlieu').val();
    size= jQuery('#size').val();
    cid= jQuery('#cid').val();
    var strQ = "&cid=" + cid + "&chungloai="+ chungloai+"&mausac=" + mausac + "&giatien=" + giatien + "&doituong=" + doituong + "&vatlieu=" + vatlieu + "&size=" + size;
    location.href ="/index.php?do=products&act=filter" + strQ;

}
function redirect(url)
{
    location.href= url;
}
function chonMau(idMau)
{
    $( ".choose_color li" ).each(function( index ) {
         $( this ).removeClass("selected") ;
    });
   // alert(idMau);
    $('#Color').val(idMau);
    $('#color'+idMau).addClass("selected");

}
function chonSize(idMau)
{
    $( ".choose_size li" ).each(function( index ) {
        $( this ).removeClass("selected") ;
    });

    $('#Size').val(idMau);
    $('#Size'+idMau).addClass("selected");
}
function continueshop(url)
{
    location.href="/";
}
function SearchGoogle(){
    var key = document.getElementById("key-search").value;
    var site = document.domain;
    var qs = encodeURI(key + "+site:" + site);
//http://www.google.com.vn/search?q=Tr%E1%BB%8B+m%E1%BB%A5n+b%E1%BB%8Dc+b%E1%BA%B1ng+t%E1%BB%8Fi
    var url = "http://www.google.com.vn/search?q=" + qs;
    window.open(url, '_blank');
    return false;
}
function SearchAdvance()
{
	//var key = document.getElementById("search-key").value;
	var key = $('#searchKey').val();
	console.log(key);
	var url = "/tim-kiem-nang-cao/?q=" + key;
	location.href= url;
	
}
