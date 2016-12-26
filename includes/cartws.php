<?php
global $title_page;
require_once('./lib/nusoap/nusoap.php');
function InsertGeneralOrderWs($orderid,$webid,$customerid,$orderdetail,$total,$providerid,$order_code)
{
	$result = '0';	
	try
	{
	   // $client = new nusoap_client('http://cart.imgroup.vn/nganluongws/nganluong_ws.php?wsdl');	
		$client = new nusoap_client('http://cart.imgroup.vn/webservices/order_ws.php?wsdl');	
		$arr = array(	
			'order_id' => $orderid, 
			'web_id' => $webid, 
			'customerid' => $customerid, 
			'orderdetail' => $orderdetail, 
			'total'=> $total,
			'providerid' => $providerid,
			'order_code' => $order_code,
			'secure_code' => md5('imgroup123')
			);
		$result = $client->call('InsertOrderWs', $arr);
	}
	catch (SoapFault $e)
	{
		echo "Kam erro =  ".$e->getMessage() . "\n";
	}
	return $result;
}
function UpdateGeneralOrderWS($order_code,$payment_status)
 {
	  $client = new nusoap_client('http://cart.imgroup.vn/nganluongws/nganluong_ws.php?wsdl'); 
	  $arr = array( 
	   'order_code' => $order_code,    
	   'payment_status' => $payment_status,
	   'secure_code' => md5(CST_WS_SECURECODE)
	  );
	  $result = $client->call('UpdateOrderWS', $arr);
	  return $result;
 }
 function GetGeneralOrderWS($order_code,$webid)
 {
	  $client = new nusoap_client('http://cart.imgroup.vn/nganluongws/nganluong_ws.php?wsdl'); 
	  $arr = array( 
	   'order_code' => $order_code,    
	   'webid' => $payment_status,
	   'secure_code' => md5(CST_WS_SECURECODE)
	  );
	  $result = $client->call('GetGeneralOrderWS', $arr);
	  return $result;
 }
 function GetCachThanhToanHTML()
 {
	  $client = new nusoap_client('http://cart.imgroup.vn/webservices/order_ws.php?wsdl');	
	  $arr = array( 	
	   'secure_code' => md5(CST_WS_SECURECODE)
	  );
	  $result = $client->call('GetCachThanhToanHTML', $arr);
	  return $result;
 }
 
?>