// Kiem tra du lieu dung ajax
var baseurl = '';
var emailReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

$(document).ready(function() {
	$.ajax({
		type: 'POST',
		url: baseurl + '/ajax.php?do=select&act=check',
		data: {
		},
		success: function() {
		}
	});
	/* Trang lien he */
    $('#formContact').submit(function() {
		var name = $('#contactName').val();
		var email = $('#contactEmail').val();
		var message = $('#contactMessage').val();
		var phone = $('#contactPhone').val();
		var captcha = $('#contactCaptcha').val();
		var lg = $('#lgContact').val();

		if (name && email && message && phone && captcha) {
			if (lg == 'vn') {
				$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
			} else {
				$("#loading-dialog-message").html('Sending request, please wait ...');
			}
			$("#loading-dialog-message").dialog("open");

			$.ajax({
				type: 'POST',
				url: baseurl + '/ajax.php?do=contact&act=send&lg=' + lg,
				data: {'name':name, 'email':email, 'message':message, 'phone':phone, 'captcha':captcha},
	
				success: function(data) {
					var obj = eval('(' + data + ')');
					$("#loading-dialog-message").dialog("close");
					$("#dialog-message").html(obj['mess']);
					$("#dialog-message").dialog("open");
	
					if (obj['error'] == 0) {
						$('#contactMessage').val('');
					}
					$('#contactCaptcha').val('');
					$('#reload').click();
				}
			});
		}
		return false;
    });
	
	/* Trang dang ky thanh vien */
    $('#formRegister').submit(function() {
		var name = $('#regName').val();
		var email = $('#regEmail').val();
		var phone = $('#regPhone').val();
		var password = $('#regPassword').val();
		var address = $('#regAddress').val();
		var captcha = $('#regCaptcha').val();
		var lg = $('#lgRegister').val();

        if(name && email && captcha && password) {
			if (lg == 'vn') {
				$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
			} else {
				$("#loading-dialog-message").html('Sending request, please wait ...');
			}
			$("#loading-dialog-message").dialog("open");

            $.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=register&lg=' + lg,
                data: {'name':name, 'email':email, 'phone':phone, 'password':password, 'address':address, 'captcha':captcha},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$("#loading-dialog-message").dialog("close");
					$("#dialog-message").html(obj['mess']);
					$("#dialog-message").dialog("open");
						
					if (obj['error']==0) {
						$('#regName').val('');
						$('#regEmail').val('');
						$('#regPhone').val('');
						$('#regPassword').val('');
						$('#regPasswordRetype').val('');
						$('#regAddress').val('');
						location.reload();
					}
					$('#regCaptcha').val('');
					$('#reload').click();
                }
            });
        }
        return false;
    });
	
	/* Trang quen mat khau */
    $('#formForgotPass').submit(function() {
		var email = $('#forgotEmail').val();
		var captcha = $('#forgotCaptcha').val();
		var lg = $('#lgForgetpass').val();

        if(email && captcha) {
			if (lg == 'vn') {
				$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
			} else {
				$("#loading-dialog-message").html('Sending request, please wait ...');
			}
			$("#loading-dialog-message").dialog("open");

            $.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=forgetPass&lg=' + lg,
                data: {'email':email, 'captcha':captcha},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$("#loading-dialog-message").dialog("close");
					$("#dialog-message").html(obj['mess']);
					$("#dialog-message").dialog("open");

					if (obj['error']==0) {
						$('#forgotEmail').val('');
					}
					$('#forgotCaptcha').val('');
					$('#reload').click();
                }
            });
        }
        return false;
    });

	/* Trang doi mat khau */
    $('#formChangePass').submit(function() {
		var oldpass = $('#oldPassword').val();
		var newpass = $('#newPassword').val();
		var newpassretype = $('#newPassRetype').val();
		var lg = $('#lgChange').val();

        if(oldpass && newpass && newpassretype && (newpass == newpassretype)) {
			if (lg == 'vn') {
				$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
			} else {
				$("#loading-dialog-message").html('Sending request, please wait ...');
			}
			$("#loading-dialog-message").dialog("open");

            $.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=changePass&lg=' + lg,
                data: {'oldpass':oldpass, 'newpass':newpass},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$("#loading-dialog-message").dialog("close");
					$("#dialog-message").html(obj['mess']);
					$("#dialog-message").dialog("open");
					
					if (obj['error']==0) {
						$('#oldPassword').val('');
						$('#newPassword').val('');
						$('#newPassRetype').val('');
					}
                }
            });
        }
        return false;
    });
	
	/* Trang thay doi thong tin */
    $('#formChangeInfo').submit(function() {
		var name = $('#changeName').val();
		var email = $('#changeEmail').val();
		var phone = $('#changePhone').val();
		var address = $('#changeAddress').val();
		var captcha = $('#changeCaptcha').val();
		var lg = $('#lgDetail').val();

        if(name && email && captcha) {
			if (lg == 'vn') {
				$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
			} else {
				$("#loading-dialog-message").html('Sending request, please wait ...');
			}
			$("#loading-dialog-message").dialog("open");

            $.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=changeInfo&lg=' + lg,
                data: {'name':name, 'phone':phone, 'email':email, 'address':address, 'captcha':captcha},

                success: function(data) {
					var obj = eval('(' + data + ')');
					$("#loading-dialog-message").dialog("close");
					$("#dialog-message").html(obj['mess']);
					$("#dialog-message").dialog("open");
					$('#changeCaptcha').val('');
					$('#reload').click();
                }
            });
        }
        return false;
    });
	
	/* Dang nhap */
    $('#formLogin').submit(function() {
		var email = $('#loginEmail').val();
		var password = $('#loginPass').val();
		var lg = $('#lgLogin').val();

        if(IsEmail(email) && password) {
			if (lg == 'vn') {
				$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
			} else {
				$("#loading-dialog-message").html('Sending request, please wait ...');
			}
			$("#loading-dialog-message").dialog("open");

            $.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=member&act=login&lg=' + lg,
                data: {'email':email, 'password':password},

                success: function(data) {
					$("#loading-dialog-message").dialog("close");
					if (data) {
						$("#dialog-message").html(data);
						$("#dialog-message").dialog("open");
					} else {
						location.reload();
					}
                }
            });
        }
        return false;
    });

	/* Search */
    /*$('#formSearch').submit(function() {
		var kw = $('#keySearch').val();

        if(kw) {
			var type = $('#typeSearch').val();
			var lg = $('#lgSearch').val();
			
			if (type==1) {
				var linkSearch = '/index.php?do=articles&act=search&key='+kw+'&lg='+lg;
				window.location = linkSearch;
			} else if (type==2) {
				var linkSearch = '/index.php?do=products&act=search&key='+kw+'&lg='+lg;
				window.location = linkSearch;
			} else if (type==3) {
				return SearchGoogle(kw);
			} 
        }
        return false;
    });*/
	
	/* Optin */
    /*$('#formOptin').submit(function() {
		var name = $('#optinName').val();
		var email = $('#optinEmail').val();
		var pid = $('#optintype').val();
		var lg = $('#lgOptin').val();

        if(name && IsEmail(email) && name!='Name...') {
			$('#formOptin .ajax-loader').css('display', 'inline-block');

            $.ajax({
                type: 'POST',
                url: baseurl + '/ajax.php?do=optin&act=send&lg='+lg,
                data: {'name':name, 'email':email, 'pid':pid},

                success: function(data) {
					$('#formOptin .ajax-loader').css('display', 'none');
					$("#dialog-message").html(data);
					$("#dialog-message").dialog("open");
					$('#optinName').val('Name...');
					$('#optinEmail').val('Email...');
                }
            });
        }
        return false;
    });*/
	
	$('#formComment').submit(function() {
		var name = $('#commentName').val();
		var email = $('#commentEmail').val();
		var message = $('#commentMessage').val();
		var captcha = $('#commentCaptcha').val();
		// hidden value
		var post_id = $('#post_id').val();
		var type = $('#type').val();
		var lg = $('#lgComment').val();
	
		if(name && email && message && captcha) {
			if (lg == 'vn') {
				$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
			} else {
				$("#loading-dialog-message").html('Sending request, please wait ...');
			}
			$("#loading-dialog-message").dialog("open");
	
			$.ajax({
				type: 'POST',
				url: baseurl + '/ajax.php?do=comment&act=insert&lg=' + lg,
				data: { 'name':name, 'email':email,'message':message,'captcha':captcha, 'pid':0, 'post_id':post_id, 'type':type },
	
				success: function(data) {
					var obj = eval('(' + data + ')');
					$("#loading-dialog-message").dialog("close");
					$("#dialog-message").html(obj['mess']);
					$("#dialog-message").dialog("open");
					
					if (obj['error'] == 0) {
						$('#commentMessage').val('');
					}
					$('#commentCaptcha').val('');
					$('#reload').click();
				}
			});
		}
		return false;
    });
	
	$('#reload').click(function(e) {
		$('#captchaImg').attr('src', baseurl + '/CaptchaSecurityImages.php?width=100&height=28&characters=6&rnd='+Math.random());
		return false;
    });
});
	
function checkoutSubmit(alias)
{
	var name = $('#orderName').val();
	var email = $('#orderEmail').val();
	var address = $('#orderAddress').val();
	var phone = $('#orderPhone').val();
	var note = $('#orderMessage').val();

	var r_name = $('#receiveName').val();
	var r_email = $('#receiveEmail').val();
	var r_address = $('#receiveAddress').val();
	var r_phone = $('#receivePhone').val();
	
	var lg = $('#lgorder').val();
	var stt = $('input[name="'+alias+'"]:checked').val();

	if(name && email && address && phone && r_name && r_email && r_address && r_phone) {
		if (lg == 'vn') {
			$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
		} else {
			$("#loading-dialog-message").html('Sending request, please wait ...');
		}
		$("#loading-dialog-message").dialog("open");

		$.ajax({
			type: 'POST',
			url: baseurl + '/ajax.php?do=cart&act=send&lg='+lg,
			data: {'alias':alias, 'name':name, 'email':email, 'address':address, 'phone':phone, 'note':note, 'stt':stt,
				'r_name':r_name, 'r_email':r_email, 'r_address':r_address, 'r_phone':r_phone
			},
	
			success: function(data) {
				var obj = eval('(' + data + ')');
				$("#loading-dialog-message").dialog("close");
				if (obj['error'] == 1) {
					$("#dialog-message").html(obj['mess']);
					$("#dialog-message").dialog("open");
				}
				else
					window.location.replace(obj['url']);
			}
		});
	} else {
		return true;
	}
    return false;
}

function ReplyComment() {
	$("#formRepComment").validationEngine();
	var name = $('#repcommentName').val();
	var email = $('#repcommentEmail').val();
	var message = $('#repcommentMessage').val();
	var captcha = $('#repcommentCaptcha').val();
	// hidden value
	var pid = $('#pid').val();
	var post_id = $('#post_id').val();
	var type = $('#type').val();
	var lg = $('#lgComment').val();

    if(name && email && message && captcha) {
		if (lg == 'vn') {
			$("#loading-dialog-message").html('Đang gởi dữ liệu, vui lòng chờ ...');
		} else {
			$("#loading-dialog-message").html('Sending request, please wait ...');
		}
		$("#loading-dialog-message").dialog("open");

        $.ajax({
            type: 'POST',
            url: baseurl + '/ajax.php?do=comment&act=insert&lg=' + lg,
            data: { 'name':name, 'email':email,'message':message,'captcha':captcha, 'pid':pid, 'post_id':post_id, 'type':type },

            success: function(data) {
				var obj = eval('(' + data + ')');
				$("#loading-dialog-message").dialog("close");
				$("#dialog-message").html(obj['mess']);
				$("#dialog-message").dialog("open");
				
				if (obj['error'] == 0) {
					$('#repcommentMessage').val('');
				}
				$('#repcommentCaptcha').val('');
				$('#reloadReply').click();
			}
        });
    } else {
		return true;
	}
	return false;
}

function ReplyCmt(cmt_pid, post_id, type, lg) {
    $('.cmtBox').hide();

    $('#cancel-rep-'+cmt_pid).show();
    $('#active-rep-'+cmt_pid).hide();

    $.ajax({
        type: 'POST',
        url: baseurl + '/ajax.php?do=comment&act=reply&lg=' + lg,
        data: { 'cmt_pid':cmt_pid, 'post_id':post_id, 'type':type },

        success: function(data) {
            $('#replay-on-'+cmt_pid).html(data);
        }
    });

    return false;
}

function CancelRep(id) {
    $('#cancel-rep-'+id).hide();
    $('#active-rep-'+id).show();
    $('#replay-on-'+id).empty();
    $('.cmtBox').show();

    return false;
}

function ValidateQty(eleId, index){
    var qty = $('#' + eleId).children("input:text");
    var proId = $('#' + eleId).children("input.proId").val();
    var proPri = $('#' + eleId).children("input.proPri").val();
    var flag = !isNaN(parseFloat(qty.val())) && (qty.val()>0);

	if (flag == false) {
        alert("Số lượng phải lớn hơn 0!");
		location.reload();
        return false;
    }

	$.ajax({
		type:'POST',
		url:baseurl + '/ajax.php?do=cart&act=update',
		data:{'proPri':proPri,'qty':qty.val(), 'id':proId},
		dataType:'html',
		success:function (data) {
			var getdata = $.parseJSON(data);
			$('#subtotal' + index).text(getdata.total);
			$('#totalMoney').html(getdata.totalAll);
		}
	});
	return true;
}

function reloadReplyCaptcha() {
	$('#captchaImgReply').attr('src', baseurl + '/CaptchaSecurityImages.php?width=100&height=28&characters=6&rnd='+Math.random());
	return false;
}

function viewMoreComment(id, table, current, lg) {
	$('#appendcmt .viewmorecmt').html('<img src="/images/site/loadercmt.gif" alt="" />');
	$.ajax({
		type:'POST',
		url:baseurl + '/ajax.php?do=comment&act=viewmore&lg=' + lg,
		data:{'id':id,'table':table, 'current':current},
		success:function (data) {
			$('.viewmorecmt').fadeOut('slow');
			$('#appendcmt').append(data);
		}
	});
	return false;
}

function copyInfo() {
	if ($('#cbx_same').is(':checked')) {
		copyval('orderName','receiveName');
		copyval('orderAddress','receiveAddress');
		copyval('orderPhone','receivePhone');
		copyval('orderEmail','receiveEmail');
	}
}

function copyval(from, to) {
	$('#' + to).val($('#' + from).val());
}