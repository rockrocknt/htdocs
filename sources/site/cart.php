<?php
global $act;
if (!empty($_GET['act'])) {
	$act = $_GET['act'];
}
	switch($act)
	{
		case 'add':	
			AddCart();		
			$tpl = 'view';
			$title_page = CAT_CART;
			break;	
				
		case 'del':	
			del();		
			$tpl = 'view';
			$title_page = CAT_CART;
			break;		
	
		case 'view':		
			$title_page = CAT_CART;
			$tpl = 'view';
			break;
				
		case 'checkout':
			$tpl = 'checkout';
			$title_page = TITLE_CHECK_OUT;
			//loadPayments();
			break;
			
		case 'thankyou':
			$tpl = "thankyou";
			$title_page = TITLE_FINISH_ORDER;
			clearCart();
			break;
			
		case 'payment':
			$tpl = "payment";
			$title_page = TITLE_PAYMENT_GUIDE;
			loadPayments();
			break;
			
		default:
			$tpl = 'view';
			break;
	}
	
	function gotocart()
	{
		global $FullUrl, $prefix_url, $lg;
		page_transfer2($FullUrl.$prefix_url.($lg=='vn'?'xem-gio-hang.html':'view-cart.html'));
	}
	
	function del()
	{
		cart::delProduct(SafeQueryString('id'));
		gotocart();
	}
	
	function AddCart()
	{
		cart::addProduct(SafeQueryString('id'),SafeQueryString('sl'), SafeQueryString('size'));
		gotocart();
	}

	function loadPayments()
	{
		global $db, $lg, $FullUrl, $prefix_url, $payments, $banklist;
		
		$sql = "select * from payments where active=1 and name_$lg<>'' order by num asc, id desc";
		$payments = $db->getAll($sql);
		
		$sql = "select * from banks where active=1 and bank_$lg<>''";
		$banklist = $db->getAll($sql);
	}
	
	function clearCart() {
		unset($_SESSION['cart']);
		unset($_SESSION['CONTINUE_SHOPPING_URL']);
	}
?>