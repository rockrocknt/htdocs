//var baseurl = '';

$(document).ready(function(e) {	
	// check hien gio post tin trong tin tuc
	$("input[name=active_future]").click(function(e) {
		var inputActive = $("input[name=active]");
		var labelActive= $("label[for=active]");
		if($(this).is(':checked'))		{
			inputActive.attr('checked',false);
			inputActive.prepend('span').trigger('click');
			inputActive.attr('disabled',true);
			labelActive.addClass('disabled');
			$('#chose_date_time').fadeIn(300);
		}
		else{
			inputActive.attr('checked',true);
			inputActive.prepend('span').trigger('click');
			inputActive.attr('disabled',false);
			labelActive.removeClass('disabled');
			$('#chose_date_time').fadeOut(300);
		}
	});
	// tag
	$('span.tag_on_ar a').click(function(){		
		var parent_ =$(this).parent('span');
		var name_tag = parent_.find('span').text();
		var uni_tag = LayMa(name_tag);
		var get_id = $('#id_this_articles').val();
		var get_type = $('#type_of_tag').val();
		$.ajax({
			type: 'POST',
			url: baseurl + '/ajax.php?do=tags&act=remove',
			data: {
				'uni_tag':uni_tag, 
				'id':get_id,
				'type':get_type,
				'name_tag':name_tag
			},
			success: function(data) {
				parent_.remove();			
			}
		});
		return false;
	})	
	
	$("#price, #price_sale").each(function() {
		formatNumberVND($(this));
	});
	$("#price, #price_sale").keydown(function(e) {
		handleKeyDown(e);
	}).keyup(function(e) {
		handleKeyUp(e);
		if (!ignoreEvent(e)) formatNumberVND($(this));
	});
});

function formatNumberVND(e) {
	e.parseNumber({ format: "#,##0", locale: "us" });
	e.formatNumber({ format: "#,##0", locale: "us" });
}
var ctrlDown = false;
function handleKeyDown(e) {
	if (e.which == 17) ctrlDown = true;
}
function handleKeyUp(e) {
	if (e.which == 17) ctrlDown = false;
}
function ignoreEvent(e) {
	if (e.which >= 16 && e.which <= 18) return true;
	if (e.which >= 33 && e.which <= 40) return true;
	if (ctrlDown && (e.which == 65 || e.which == 67)) return true;
	return false;
}
// cap nhat so thu tu trong template/admin/ file list.ctp
function updateNumber(table, id)
{
	var num = $('#number'+id).val();
	
	$('#ajaxloader'+id).css('display', 'block');
	$.ajax({
		type: 'POST',
		url: baseurl + '/ajax.php?do=number&act=update',
		data: {'table':table, 'id':id, 'num':num},

		success: function(data) {
			$('#ajaxloader'+id).css('display', 'none');
			$('#number'+id).val(num)
		}
	});
}
// cap nhat so thu tu trong template/admin/ file list.ctp
function updateNumber_productatt(table, id)
{
    var num = $('#number'+id).val();

    $('#ajaxloader'+id).css('display', 'block');
    $.ajax({
        type: 'POST',
        url: baseurl + '/ajax.php?do=number&act=update_productatt',
        data: {'table':table,'id':id, 'num':num},

        success: function(data) {
            $('#ajaxloader'+id).css('display', 'none');
            $('#number'+id).val(num)
        }
    });
}

$(document).ready(function(e) {
	// click de chuyen doi giua khung dang nhap va khung quen mat khau cua admin
	$(".forgot-pwd").click(function () {
		$("#loginForm").hide();
		$("#forgotForm").show();
		return false;
	});
	$(".back-login").click(function () {
		$("#loginForm").show();
		$("#forgotForm").hide();
		return false;
	});
	// kiem tra login bang ajax
	$('.logMeIn').click(function() {
		var email = $('#username').val();
		var pass = $('#pass').val();

		if (email && pass)
		{
			$('.ajaxloader').css('display', 'block');
			$.ajax({
				type: 'POST',
				url: baseurl + '/ajax.php?do=admin&act=login',
				data: {'pass':pass, 'email':email},
				success: function(data) {
					var myObject = eval('(' + data + ')');
					$('.ajaxloader').css('display', 'none');
					
					if (myObject['page'])
					{
						location.reload();
					}
					else if (myObject['mess'])
					{
						$('#loginError').css('display', 'block');
						$('#loginError').html(myObject['mess']);
					}
				}
			});
		}
		else {
			return true;
		}
		return false;
    });
	// logout bang ajax
	$('#userLogout').click(function() {
		$.ajax({
			type: 'POST',
			url: baseurl + '/ajax.php?do=admin&act=logout',
			success: function(data) {
				document.location = 'admin.php';
			}
		});
		return false;
    });
	// goi email quen mat khau
	$('.sendEmail').click(function() {
		var email = $('#email').val();

		if (email)
		{
			$('.ajaxloader').css('display', 'block');
			$.ajax({
				type: 'POST',
				url: baseurl + '/ajax.php?do=admin&act=forgotpass',
				data: {'email':email},
				success: function(data) {
					$('.ajaxloader').css('display', 'none');
					var myObject = eval('(' + data + ')');
					$('#echoMessage').css('display', 'block');
					$('#echoMessage').html(myObject['mess']);
				}
			});
		}
		else {
			return true;
		}
		return false;
    });
	// them custom field trong san pham
	$('#addField').click(function() {
		var name_vn = $('#cname_vn').val();
		var value_vn = $('#cvalue_vn').val();
		var name_en = $('#cname_en').val();
		var value_en = $('#cvalue_en').val();
		var alias = $('#alias_custom').val();

		if (name_vn && value_vn)
		{
			$('.ajaxloader').css('display', 'block');
			$.ajax({
				type: 'POST',
				url: baseurl + '/ajax.php?do=customfield&act=add',
				data: {'name_vn':name_vn, 'value_vn':value_vn, 'name_en':name_en, 'value_en':value_en, 'alias':alias},
				success: function(data) {
					$('.ajaxloader').css('display', 'none');
					$('#nofield').css('display', 'none');
					$('#tableField').append(data);
					$('#cname_vn').val('');
					$('#cvalue_vn').val('');
					$('#cname_en').val('');
					$('#cvalue_en').val('');
				}
			});
		}
		return false;
    });
});
// cap nhat thong tin custom field
function updateField(id)
{
    var name_vn = $('#name_vn' + id).val();
    var value_vn = $('#value_vn' + id).val();
    var name_en = $('#name_en' + id).val();
    var value_en = $('#value_en' + id).val();

	if (name_vn && value_vn)
	{
		$('#ajaxloader'+id).css('display', 'block');
		$.ajax({
			type:'POST',
			url:baseurl + '/ajax.php?do=customfield&act=update',
			data: {'name_vn':name_vn, 'value_vn':value_vn, 'name_en':name_en, 'value_en':value_en, 'id':id},
			success:function (data) {
				$('#ajaxloader'+id).css('display', 'none');
			}
		});
	}
	return false;
}
// xoa custom field
function deleteField(id, proid)
{
	$('#ajaxloader'+id).css('display', 'block');
	$.ajax({
		type:'POST',
		url:baseurl + '/ajax.php?do=customfield&act=delete',
		data: {'id':id, 'proid':proid},
		success:function (data) {
			$('#ajaxloader'+id).css('display', 'none');
			$('#tableField #row'+id).html('');
		}
	});
}
// dien du lieu cua custom field co san vao trong khung nhap du lieu khi nguoi dung chon
function fillValue(name)
{
	$('.ajaxloader').css('display', 'block');
	$.ajax({
		type:'POST',
		url:baseurl + '/ajax.php?do=customfield&act=fill',
		data: {'name':name},
		success:function (data) {
			$('.ajaxloader').css('display', 'none');
			var myObject = eval('(' + data + ')');
			$('#cname_vn').val(myObject['name_vn']);
			$('#cvalue_vn').val(myObject['value_vn']);
			$('#cname_en').val(myObject['name_en']);
			$('#cvalue_en').val(myObject['value_en']);
			$('#alias_custom').val(myObject['alias']);
		}
	});
}
// xoa module keo tha salepage
function deleteModule(id)
{
	$.ajax({
		type:'POST',
		url:baseurl + '/ajax.php?do=salepage&act=delete',
		data: {'id':id},
		success:function (data) {
			$('#sortable #row'+id).html('');
		}
	});
}

function LayMa(tag){

	var uni_tag = StripTag_ad(tag).toLowerCase();
	return uni_tag;
}

function StripTag_ad(str) {
	  str= str.toLowerCase();
	  str= str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a");
	  str= str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e");
	  str= str.replace(/ì|í|ị|ỉ|ĩ/g,"i");
	  str= str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o");
	  str= str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u");
	  str= str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y");
	  str= str.replace(/đ/g,"d");
	  str= str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g,"-");
	/* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
	  str= str.replace(/-+-/g,"-"); //thay thế 2- thành 1-
		str= str.replace(/-+,/g,",");
		str= str.replace(/,+-/g,",");
	  str= str.replace(/^\-+|\-+$/g,"");
		//cắt bỏ ký tự - ở đầu và cuối chuỗi
	  return str;
}