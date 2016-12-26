<?
$cat = new Categories(currentCat());
if (@$_POST['nlpayment']) {
    tao_don_hang();
}
$cat->countView();
	switch($act){
        case "formvisa":
            $tpl="formvisa";
            break;
        case "404":

            $tpl="404";
            break;
		default:
            if ($cat->getcategories_displaytype()==2)
            {
                $tpl="xemtatcasanpham";

            } else
            if ($cat->getcategories_displaytype()==3)
            {
                $tpl="camondathang";


            } else
            if ($cat->getcategories_displaytype()==4)
            {
                $tpl="locgia";

            } else
            if ($cat->getcategories_displaytype()==11)
            {
                $tpl="detail_duantuonglai";

            } else
            if ($cat->getcategories_displaytype()==7)
            {
                $tpl="chonnganhang";

            } else
			$tpl="detail";

			break;
	}

function tao_don_hang()
{
    $bank_code=  @$_REQUEST['bankcode'];
    if ($bank_code!="")
    {
        //echo $bank_code;
        //1. tao don hang

        cart::insertOrder();

        //2. goi email

        include 'includes/lib/nusoap.php';
        include('includes/VIB_Checkout.php');
        // 3. select don hang da tao

        // $_SESSION['idorder']
        $id = $_SESSION['idorder'];


        // 4. page transfer sang ngan luong.
        chuyen_qua_ngan_luong();

    }
    else{
        //echo "nothing";
    }
}
function chuyen_qua_ngan_luong()
{
    /*
    MID/Code: 23

Pass: Ab123456
*/
   // echo MERCHANT_ID." - ".MERCHANT_PASS;
    $nlcheckout = new VIB_CheckOut("23", "Ab123456");

    $order_total_amount = $_SESSION['final_total'];


    $order_id = date('dmYHis');
    $params['function'] = 'checkOrder';
    $params['order_id']						= $_SESSION['idorder'];
    $params['order_code']					= 'KOS'.date('dmYHis');
    $params['order_description']			= 'Mua hàng từ website KOSSHOP.vn';//@$_REQUEST['name'];
    $params['order_total_amount']			= $order_total_amount ;//@$_REQUEST['price'];
    $params['order_discount_amount']		= 0;
    $params['order_fee_ship']				= 0;

    //$params['order_return_url']				= 'http://localhost/testcode/viettinbank/payment_success.php?order_id='.$order_id;
    $params['order_return_url']				="http://www.kosshop.vn/cam-on-ban-da-dat-hang/";
    $params['order_cancel_url']				= 'http://www.kosshop.vn';
    $params['order_time_limit']				= date('d/m/Y,H:i', time() + 7*24*3600);
    $params['order_payment_option']			= @$_REQUEST['bankcode'];
    $params['order_payment_fee_for_sender']	= 0;
    $params['sender_fullname']				= getsession("firstname");
    $params['sender_email']					= getsession("email");
    $params['sender_mobile']				=  getsession("phone");
    $params['sender_address']				= getsession("address_giaohang");
    $result = $nlcheckout->sendOrder($params);
    var_dump($result);
    if (is_array($result) && $result['result_code'] == '0') {
        // update bill id don hang
        $bill_id = $result['result_data_decode']['bill_id'];
        $payment_url = $result['result_data_decode']['payment_url'];

        cart::update_bill_id($_SESSION['idorder'],$result['result_data_decode']);


        ?>
        <script type="text/javascript">
            <!--
            window.location = "<?php echo $payment_url . '&lang=en'; ?>"
            //-->
        </script>
    <?php
    } else {
        global $error;
        if ($result['result_code'] == '24')
        {
            $error = "Số điện thoại không hợp lệ";
        }else
        $error = "Lỗi kết nối";
    }

}
