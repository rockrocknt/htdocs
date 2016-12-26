<?
	global $db, $hot_cats;
	
	$sql = "select id, name_vn, unique_key_vn from categories where hot_cat_showed = 1 order by home_order asc";
	
	$hot_cats = $db->getAll($sql);
	
	include(UC_DIR.'ProductsOfCatInMain.ctp');
?>