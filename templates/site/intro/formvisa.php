<?php
global $FullUrl, $prefix_url, $cat, $lg, $product, $title_bar;
$currentcat = currentCat();

?>

<?php


if (!isset($_SESSION['order'])) {


    ?>
    <script type="text/javascript">
        //location.href="/";
    </script>
    <?
    die("no order");
}
$order  = $_SESSION['order'];
?>
ĐANG XỬ LÝ...
<form class="none" id="payment_form" action="/visa/payment_confirmation.php" method="post">
    <input type="hidden" name="access_key" value="5c1d8c1d536c3f10b5735197d83ba0c2">
    <input type="hidden" name="profile_id" value="6422F58A-617E-45C4-A1DA-EB0557E6F2C0">
    <input type="hidden" name="transaction_uuid" value="<?php echo uniqid() ?>">
    <input type="hidden" name="signed_field_names" value="access_key,profile_id,transaction_uuid,signed_field_names,unsigned_field_names,signed_date_time,locale,transaction_type,reference_number,amount,currency">
    <input type="hidden"
           value="bill_to_address_city,bill_to_surname,bill_to_forename,bill_to_email,bill_to_address_country,bill_to_phone,bill_to_address_line1"
           name="unsigned_field_names">

    <input  type="hidden"  name="bill_to_address_country" value="VN">
    <?php $fullname = $order['orderFirstName'];
    $arr = explode(' ',$fullname);

    $length = count($arr)  - 1;

    $forename = $arr[$length];

    $surname = "";
    for($i=0;$i<(count($arr)-1);$i++)
    {
        $surname .= " ". $arr[$i];
    }
    ?>
    <input type="hidden"  name="bill_to_forename" value="<?php echo $forename;?>">

    <input type="hidden"  name="bill_to_surname" value="<?php echo $surname;?>">

    <input type="hidden"  name="bill_to_email" value="<?php echo $order['orderEmail'];?>">
    <input type="hidden"  name="bill_to_email" value="<?php echo $order['orderEmail'];?>">
    <input type="hidden"  name="bill_to_phone" value="<?php echo $order['orderPhone'];?>">
    <input type="hidden"  name="bill_to_address_city" value="<?php echo $order['orderCity'];?>">
    <input type="hidden"  name="bill_to_address_line1" value="<?php echo $order['orderAddress'];?>">
    <input type="hidden"  name="ship_to_phone" value="<?php echo $order['orderPhone'];?>">


    <input type="hidden" name="signed_date_time" value="<?php echo gmdate("Y-m-d\TH:i:s\Z"); ?>">
    <input type="hidden" name="locale" value="en">
    <fieldset>
        <legend>Payment Details</legend>
        <div id="paymentDetailsSection" class="section">
            <span>transaction_type:</span><input type="text" value="sale" name="transaction_type" size="25"><br/>
            <span>reference_number:</span><input type="text"
                                                 value="<?php echo $order['odr_id'];?>"
                                                 name="reference_number" size="25"><br/>
            <span>amount:</span><input
                value="<?php echo  $_SESSION["final_total"] ?>"
                type="text" name="amount" size="25"><br/>
            <span>currency:</span><input
                value="VND"
                type="text" name="currency" size="25"><br/>
        </div>
    </fieldset>

    <?php /*
    <script type="text/javascript" src="payment_form.js"></script>
 */ ?>
</form>
<script type="text/javascript">
    $('#payment_form').submit();
</script>

