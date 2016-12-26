var divCartID= "pagecart";
function addtocartandredirect(fullUrl,productCode,qtyID)
{
    $.post(fullUrl + "/ajax.php?do=cart&act=update",{
            id: productCode,
            qty: $('#' + qtyID).val()
        },
        function(data)
        {
            location.href= fullUrl +  "/xem-gio-hang.html";

        });
}
function view_cart(fullUrl,divCartID)
{
	
    $.post(fullUrl + "/ajax.php?do=cart&act=view_cart",{
        },
        function(data)
        {
            $('#' + divCartID).html(data);
			
	
        });
}

function view_cart_showcoupon(fullUrl,divCartID)
{
    $.post(fullUrl + "/ajax.php?do=cart&act=view_cart&showcoupon=1",{
        },
        function(data)
        {
            $('#' + divCartID).html(data);
        });
}
function capnhatsoluong(fullUrl,idproduct)
{
	 $.post(fullUrl + "/ajax.php?do=cart&act=view_cart",{
        qty:$('#qty' + idproduct).val(),
        id: idproduct
        },
        function(data)
        {
            $('#' + divCartID).html(data);
        });
}
function trusoluong(fullUrl,idButton,idproduct)
{

    var thisrowfield;


        thisrowfield = $('#' + idButton).parent().parent().parent().find('.qty');
        var currentVal = parseInt(thisrowfield.val());

        if (!isNaN(currentVal) && currentVal > 0) {
            thisrowfield.val(currentVal - 1);
        } else {
            thisrowfield.val(0);
        }

    $.post(fullUrl + "/ajax.php?do=cart&act=view_cart",{
        qty:thisrowfield.val(),
        id: idproduct
        },
        function(data)
        {
            $('#' + divCartID).html(data);
        });
}
function congsoluong(fullUrl,idButton,idproduct)
{
    // Product Quantity
    //----------------------------------------//
    var thisrowfield;

        thisrowfield = $('#' + idButton).parent().parent().parent().find('.qty');

        var currentVal = parseInt(thisrowfield.val());
        if (!isNaN(currentVal)) {
            thisrowfield.val(currentVal + 1);
        } else {
            thisrowfield.val(0);
        }
    $.post(fullUrl + "/ajax.php?do=cart&act=view_cart",{
            qty:thisrowfield.val(),
            id: idproduct
        },
        function(data)
        {
            $('#' + divCartID).html(data);
        });
}
function delProduct(fullUrl,idproduct)
{
    var r = confirm("Bạn muốn xóa khỏi giỏ hàng?");
    if (r == true) {
        $.post(fullUrl + "/ajax.php?do=cart&act=view_cart",{

                iddel: idproduct
            },
            function(data)
            {
                $('#' + divCartID).html(data);
				//alert($('#emptyCart').val());
				if ($('#emptyCart').val() == "1") {
					$('.top-bar-cart').hide();
				}
            });
    } else {

    }
}
function checkcoupon(fullUrl,idInputCoupon)
{
    if ($('#' + idInputCoupon).val() == "")
    {
        alert('Nhập mã khuyến mãi');
        $('#' + idInputCoupon).focus();
        return;
    }
    $.post(fullUrl + "/ajax.php?do=coupon&act=check",{
            code: $('#' + idInputCoupon).val()
        },
        function(data)
        {
            var obj = eval('(' + data + ')');
            if (obj['error'] == 1)
                alert(obj['mess']);
            else
            {
                view_cart_showcoupon(fullUrl,divCartID);
            }
        });
}



function finishcheckout(fullUrl)
{
    //  alert('helo get_giaohang');
    if (!trueform()) return false;
    $('#loading').toggle();
    $('.continue').hide();
	$('#btnHoanTat').hide();

    $.post(fullUrl + "/ajax.php?do=cart&act=send",{
            firstname:$('#firstname').val(),
            lastname:$('#lastname').val(),
            address: $('#address').val(),
            city: $('#city').val(),
            phone: $('#phone').val(),
            email: $('#email').val(),
            note: $('#note').val(),
       //     cachthanhtoan: $('#cachthanhtoan').val()
            cachthanhtoan:$('input[name=payment_method]:checked').val()

        },
        function(data)
        {

           // $('#divxemlai').html(data);
           // $('#divxemlai').fadeIn();
           // $('#editb2').show();
            // $("#pagecart").html(data);

          //  $(".container").html(data);

             var obj = eval('(' + data + ')');
           //  alert(obj['id']);
             //alert(obj['url']);
             location.href=obj['url'];


        });
}
function trueform()
{
   // alert($('input[name=payment_method]:checked').val());
   // return;
    if ($('#firstname').val() == "")
    {
        alert("Nhập tên!");
        $('#firstname').focus()
        return false;
    }
    $('#email').val( jQuery.trim( $('#email').val() ) );
    if (!IsEmail($('#email').val()))
    {
        alert("Nhập email đúng!");
        $('#email').focus()
        return false;
    }
    if ($('#phone').val() == "")
    {
        $('#phone').focus()
        return false;
    }
    if ($('#address').val() == "")
    {
        alert("Nhập Địa chỉ giao hàng!");
        $('#address').focus()
        return false;
    }







    return true;

}