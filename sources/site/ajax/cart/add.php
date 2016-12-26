<?php
	$id = SafeQueryString('id');
	$sl = SafeQueryString('sl');
	if ($sl > 0 ) {} else $sl =1;
	Cart::addproduct($id,$sl);
	GetPreviousUrl($id);
	//echo GetPreviousUrl($id)."askjdfkasdjfkasdjfkasd";
	//$tongsanpham = cart::getQuatity();
?>  
  