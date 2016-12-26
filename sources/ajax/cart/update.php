<?php
$qtty = SafeFormValue('qty');
if (!is_numeric($qtty))    $qtty=1;
    $id = SafeFormValue('id');
    $product =new products(products::getbyID($id));
    $price =  $product->getPrice();

	cart::addProduct($id,$qtty,0,0);
	cart::setQuantity($id, $qtty);


	$arr['id'] = $id;
	$arr['qtt'] = $qtty;
    $arr['total'] = formatPrice($qtty*$price);
    $arr['totalAll'] = formatPrice(cart::getTotalMoney());

    echo json_encode($arr);


