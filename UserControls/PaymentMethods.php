<?
	global $db, $banks;
	
	$sql = "select bank_img, bank_name, bank_account from banks where bank_active = 1";
	
	$banks = $db->getAll($sql);

	include(UC_DIR.'PaymentMethods.ctp');
?>