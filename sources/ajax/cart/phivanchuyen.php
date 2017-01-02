<?php
include(CLASS_DIR.'quan.class.php');
$tinh = $_POST['tinh'];
$id = $_POST['quan'];
$_SESSION['tinh'] = $tinh;
$_SESSION['quan'] = $id;
// ngoai hcm
$feevanchuyen = number_format(40000)." ".CST_CURRENCY_CODE;
$_SESSION['phivanchuyen'] = 40000;
// trong hcm
if ($tinh == 1)
{ 
		$feevanchuyen = quan::getFee($id,$_SESSION['viewcart']['totalSanPham']);
}
echo     $feevanchuyen;
/*
$_SESSION['totaldonhang'] = $feevanchuyen + $_SESSION['totalSanPham'];
echo number_format($_SESSION['totaldonhang']) . " ".CST_CURRENCY_CODE;
*/