<?
	global $db, $hot_cats, $tag_menus;
	
	$sql = "select id, name_vn, unique_key_vn, img from categories where comp = 2 and showed = 1 order by home_order asc";
	
	$hot_cats = $db->getAll($sql);
	
	$sql = "select id, name_vn, unique_key_vn, img from categories where comp = 30 and showed = 1 order by num asc";
	
	$tag_menus = $db->getAll($sql);
	
	include(UC_DIR.'CatProduct.ctp');
?>