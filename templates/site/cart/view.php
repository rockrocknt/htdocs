<link rel="stylesheet" href="/css/cart.css">
<?php
	global $lg, $FullUrl, $prefix_url;
    $num = cart::getQuantity();
?>
<div class="breadcrumb-holder marginLessBreadCum">
    <div class="container">
        <ul class="inline bcrumb">
            <li>
                <a href="/">Trang chủ</a>
            </li>

            <li class="active">Giỏ Hàng</li>


        </ul>
    </div>
</div>
<section class="section-shopping-cart" id="pagecart">
</section> <!-- <div class=" checkout-cart-index"> -->

<?php include "widget_html/cart_form.php"; ?>



<link href="/css/chosen.css" rel="stylesheet">
<script type="text/javascript" src="/js/chosen.jquery.min.js"></script>
<script type="text/javascript">


    function updateCart()
    {
        $.post(fullUrl + "/ajax.php?do=cart&act=update",{

            },
            function(data)
            {
                $("#pagecart").html(data);

            });

    }

    $( document ).ready(function() {
        view_cart('<?=$FullUrl?>','pagecart');
    });


    function updateqty(productid)
    {
        $.post('<?=$FullUrl?>' + "/ajax.php?do=cart&act=update",{
                qty: $('#soluong' + productid).val(),
                id: productid,
                proPri:$('#price' + productid).html()
            },
            function(data)
            {
             //       alert(data);
                getCart('<?=$FullUrl?>');
            });
    }
    function removeproduct(productid)
    {
        $.post('<?=$FullUrl?>' + "/ajax.php?do=cart&act=remove",{

                id: productid
            },
            function(data)
            {
                //       alert(data);
                getCart('<?=$FullUrl?>');
            });
    }
</script>
