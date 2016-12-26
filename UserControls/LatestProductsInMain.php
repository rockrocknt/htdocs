<?
	global $db, $products_in_main;
	
	$sql = "select id, name_vn, size, price, unique_key_vn, img, cid from products p where active = 1 and is_available = 1 order by price desc limit 16";
	
	$products_in_main = $db->getAll($sql);
	
	include(UC_DIR.'LatestProductsInMain.ctp');
?>