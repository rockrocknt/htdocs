<?
	global $db, $products_of_article, $cat;
	
	if(!empty($cat["alias"])){
		$sql = "select p.id, p.name_vn, p.name_en, p.size, p.price, p.unique_key_vn, p.unique_key_en, p.img, p.cid, c.unique_key_vn as cat_unique_key from products p, categories c where p.is_available = 1 and p.active = 1 and p.cid = c.id and c.comp = 2 and c.alias = '" . $cat["alias"] . "' order by p.id desc limit 12";
	
		$products_of_article = $db->getAll($sql);
	}
	
	include(UC_DIR.'ProductsOfArticle.ctp');
?>