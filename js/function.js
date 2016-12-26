// JavaScript Document

function SearchGoogle(){
	 var key = document.getElementById("search").value;
	 var site = document.domain;
	 var qs = encodeURI(key + "+site:" + site);
	 var url = "http://www.google.com.vn/search?q=" + qs;
	 window.open(url, '_blank');
	 return false;
}

function VoteSm(id, type, value, link, fullurl)
{
	if(type == 'article'){
		location.href = fullurl + "/index.php?do=member&act=vote&vote=" + value + "&art_id=" + id + "&link=" + link;	
	}
	else if(type == 'product'){
		location.href = fullurl + "/index.php?do=member&act=vote&vote=" + value + "&pro_id=" + id + "&link=" + link;	
	}
}

function AlertMessage(mess)
{ 
	alert(mess); 
}

function IsChecked(id)
{
	if(document.getElementById(id).checked==true)
		return true;
	return false;
}

function IsEmpty(id)
{
	var value = document.getElementById(id).value;
	
	if(value.indexOf('*') > 0 || value == '')
		return true;
	return false;
}

function IsNumber(id)
{
	var value = document.getElementById(id).value;
	
	if(isNaN(value))
		return false;
	return true;
}

function IsEmail(email_id){
	emailRegExp = /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.([a-z]){2,4})$/;
	
	if(!emailRegExp.test(document.getElementById(email_id).value))
		return false;
	return true;
}
function MatchValue(value1, value2){
	
	var va1 = document.getElementById(value1).value;
	var va2 = document.getElementById(value2).value;
	
	if (va1 != va2)
	{
		return false;
	}
	return true
}
	function GetCurrentDate()
			{ 
				var d_names = new Array("Sunday", "Monday", "Tuesday",
"Wednesday", "Thursday", "Friday", "Saturday");

var m_names = new Array("January", "February", "March", 
"April", "May", "June", "July", "August", "September", 
"October", "November", "December");

var d = new Date();
var curr_day = d.getDay();
var curr_date = d.getDate();
var sup = "";
if (curr_date == 1 || curr_date == 21 || curr_date ==31)
   {
   sup = "st";
   }
else if (curr_date == 2 || curr_date == 22)
   {
   sup = "nd";
   }
else if (curr_date == 3 || curr_date == 23)
   {
   sup = "rd";
   }
else
   {
   sup = "th";
   }
var curr_month = d.getMonth();
var curr_year = d.getFullYear();

document.getElementById('currentDate').innerHTML = d_names[curr_day] + ", " + curr_date + "<SUP>"
+ sup + "</SUP> " + m_names[curr_month] + " " + curr_year;
			}
			
function CheckBoxSelected(values, mess)
{
	for(var i = 0; i < values.length; i++)
	{
		if (values[i].checked == true)
		{
			return true;
		}
	}
	
	alert(mess);
	return false;
}

function CreateTagSEO(){
	var f = document.getElementById("frmEdit");
	name = f.tags_keyword.value;
	
	var s7 = StripVi2(f.tags_keyword.value);
	f.tags_unique_key.value = s7.toLowerCase();
}

function CreateTitleSEO(){
	var f = document.getElementById("frmEdit");
	name = f.name_vn.value;
	title = name.toLowerCase();
	f.title_vn.value = name;
	f.des_vn.value = f.keyword_vn.value = title;
	<!--f.des_en.value = f.keyword_en.value = f.title_en.value = f.name_en.value.toLowerCase();-->
	
	var s7 = StripVi2(f.name_vn.value);
	f.unique_key_vn.value = s7.toLowerCase();
	<!--f.unique_key_en.value = StripVi2(f.name_en.value).toLowerCase();-->
}
function CreateTitleSEOProduct(){
	var f = document.getElementById("frmEdit");
	name = f.name_vn.value;
	title = name.toLowerCase();
	f.des_vn.value = f.keyword_vn.value = f.title_vn.value = title;
	<!--f.des_en.value = f.keyword_en.value = f.title_en.value = f.name_en.value.toLowerCase();-->
	
	var s7 = StripVi2(name);
	f.unique_key_vn.value = s7.toLowerCase();
	<!--f.unique_key_en.value = StripVi2(f.name_en.value).toLowerCase();-->
}
function StripVi(str) {
  str= str.toLowerCase();
  str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
  str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
  str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
  str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
  str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
  str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
  str= str.replace(/đ/g,"d");
  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'||\"|\&|\#|\[|\]|~|$|_/g,"");
	/* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
  str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
  str= str.replace(/^\-+|\-+$/g,"");
	//cắt bỏ ký tự - ở đầu và cuối chuỗi
  return str;
  } 
function StripVi2(str) {
  str= str.toLowerCase();
  str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
  str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
  str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
  str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
  str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
  str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
  str= str.replace(/đ/g,"d");
  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
/* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
  str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
  str= str.replace(/^\-+|\-+$/g,"");
	//cắt bỏ ký tự - ở đầu và cuối chuỗi
  return str;
  } 
function FixHeight(){
	var mainContent = jQuery(".col_r_inside");
	var leftContent = jQuery(".col_l_inside");
	if(mainContent != null && leftContent != null){
        var heightMain = mainContent.outerHeight();	//1474
        var heightLeft = leftContent.outerHeight();	//1435  1425
		if(heightMain <= heightLeft){
			//heightMain = heightLeft;
			mainContent.height(heightLeft-50);
		}
		else{
			leftContent.height(heightMain-50);
			heightLeft = heightMain;
		}
		heightMain = heightMain-40;
		
		//mainContent.css("min-height", heightMain + "px");
		//leftContent.css("min-height", heightLeft + "px");
		
		//leftContent.height(heightMain);
		//mainContent.height(heightMain);
    }
}
function ChangeVideo(url){
	document.getElementById("FlashWrapper").innerHTML = '<object type="application/x-shockwave-flash" data="vcastr3.swf" width="394" height="349" id="vcastr3"><param name="wmode" value="transparent" /><param name="movie" value="vcastr3.swf" /><param name="allowFullScreen" value="true" /><param name="FlashVars" value="xml=<vcastr><channel><item><source>' + url + '</source><duration></duration><title>filename tesst</title></item>						</channel><config><bufferTime>4</bufferTime><contralPanelAlpha>0.75</contralPanelAlpha><controlPanelBgColor>0x757d85</controlPanelBgColor><controlPanelBtnColor>0xffffff</controlPanelBtnColor><contralPanelBtnGlowColro>0x3c4045</contralPanelBtnGlowColro><controlPanelMode>float</controlPanelMode><defautVolume>1</defautVolume><isAutoPlay>true</isAutoPlay><isloadbegin>true</isloadbegin><isShowAbout>true</isShowAbout><scaleMode >showAll</scaleMode ></config></vcastr>" /></object>';
}

function ChangeImg(img, src){
	img.src=src;
}
function OpenUrl(url){
    eduvision = window.open(url,"topnew","menubar=no,width=750,height=830,toolbar=no,scrollbars=1");
    eduvision.focus();
}
function OpenUrlEx(url, name, w, h){
    eduvision = window.open(url,name,"menubar=no,width=" + w + ",height=" + h + ",toolbar=no,scrollbars=1");
    eduvision.focus();
}
function TestTelephone(telString)
{
    for(var i=0;i<telString.length;i++)
    {
        if(telString[i]!=' ')
        {
            if((telString[i]> '9' || telString[i]<'0'))
            {
                return false;
            }
        }
    }
    return true;
}
function Pop_ShowWindow(strLinkImage)
{
	window.open("showimg.php?link="+strLinkImage);
	}
function MenuChange(strId, strImg)
{
	var img = document.getElementById(strId);
	img.src = strImg;
}
function CheckForm(frm){//fileupload
	var flag=0;
	for(i=0;i<frm.length;i++){
		if(frm.elements[i].name != 'img' && frm.elements[i].value.length==0){		
			flag=1;
			frm.elements[i].style.backgroundColor="#CCCCCC";
		}		
		else
			frm.elements[i].style.backgroundColor="white";
	}
	email = document.getElementById('email');
	if(email.value.indexOf("@")<0){
		email.style.backgroundColor="#CCCCCC";
		flag=1;
	}
	if(flag == 0)
		return true;
	alert('Please check the empty field!');
	return false;
}
function CheckSearch(frm){
	var type = document.getElementById("typeSearch").value;	
	
	if(type != "google")
		return true;
	else{
		url = "http://www.google.com.vn/search?num=50&hl=vi&q=" + document.getElementById("key").value + "+site%3Asatmythuatdongan.com&aq=f&aqi=&aql=&oq=&gs_rfai=";
		location.href = url;	
		return false;
	}
}

/*function ChangeImg(url){
	document.getElementById("largeImg").src = url;
}*/
//Enter domain of site to search.
var domainroot="led360.com.vn";

function Gsitesearch(curobj){
	curobj.q.value="site:"+domainroot+" "+curobj.qfront.value;
}
function SendLink(cur_link){
	var r = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var email = document.getElementById('mailToFriend');	
	if(r.test(email.value)==false){
		alert( "Email không đúng định dạng" );
		email.focus();
		flag = 1;
	}
	else{
		xmlHttp=GetXmlHttpObject();
		if (xmlHttp==null)
		  {
		  alert ("Browser does not support HTTP Request");
		  return;
		  }
		var url="ajax/SendLink.php";
		url=url+ "?email=" + document.getElementById('mailToFriend').value;
		url=url+ "&url=" + cur_link;
		//alert(url);
		xmlHttp.onreadystatechange=ReadySendLink ;
		xmlHttp.open("GET",url,true);
		xmlHttp.send(null);
	
	}
}
function ReadySendLink(){
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
	{
		alert(xmlHttp.responseText);
	}
}

function OnlyNumber(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;

         return true;
      }
	  
function getCart(fullurl)
{
		var link = fullurl + "/ajax2.php?do=cart&act=view";
		  $.post(link,{
                 
               },
               function(data)
               {  
               		//$('#listcomment').html(data);
					jQuery('#showhide').show(400);
					jQuery('#cart').html(data);

					if (data == 0)
					{
					//	alert(' gio hang rong ');
						jQuery('#spancart').hide();

					}else
					{
												jQuery("#imggiohang").attr('src','/sieuthigoi/images/cart_put.png');
						jQuery('#spancart').show();
						}
					
               });
		
}	 
	  
function getCart2(fullurl,shocart)
{
		var link = fullurl + "/ajax2.php?do=cart&act=view";
		  $.post(link,{
                 
               },
               function(data)
               {  
               		//$('#listcomment').html(data);
					if (showcart == 1) 			jQuery('#showhide').show();
					else jQuery('#showhide').hide();
					
					if (data == 0)
					{
						//alert(' gio hang rong ');
						jQuery('#spancart').hide();

					}else
					{
						jQuery("#imggiohang").attr('src','/sieuthigoi/images/cart_put.png');
						jQuery('#spancart').show();
						jQuery('#cart').html(data);
					
						}
					
					
               });
		
}	   

function hideCart()
{
	jQuery('#showhide').hide('slow');
	return false;
}
