<?
	global $db, $hot_products;
	
	$sql = "select id, name_vn, name_en, size, price, unique_key_vn, unique_key_en, img, cid from products where home = 1 order by price desc, id desc limit 5";
	
	$hot_products = $db->getAll($sql);
	
	include(UC_DIR.'LatestProducts.ctp');
?>