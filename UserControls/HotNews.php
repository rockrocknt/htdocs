<?
	global $db, $left_articles;
	
	$sql = "select a.short_vn, a.short_en, a.name_vn, a.name_en, a.unique_key_vn, a.unique_key_en, a.img, a.cid from articles a, categories c where a.active = 1 and c.showed = 1 and a.cid = c.id order by a.id desc limit 0, 5";
		
	$left_articles = $db->getAll($sql);

	include(UC_DIR.'HotNews.ctp');
?>