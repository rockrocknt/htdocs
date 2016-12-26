<link rel="stylesheet" href="/css/cart.css">
<?php
	global $lg, $FullUrl, $prefix_url;
    $num = cart::getQuantity();
?>

<!-- Titlebar
================================================== -->
<div class="container">
<div class="row">
<div class="col-lg-12 checkout-cart-index" id="pagecart">


</div> <!-- <div class=" checkout-cart-index"> -->
</div> <!-- div row -->
</div>
	
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
