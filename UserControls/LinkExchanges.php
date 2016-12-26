<?
	global $db, $exchangeBanners;
	
	$sql = "select i.img, i.name_vn, i.url from img i, img_group ig where i.id_img_group = ig.id and ig.alias = 'lienketwebsite'";
	
	$exchangeBanners = $db->getAll($sql);

	include(UC_DIR.'LinkExchanges.ctp');
?>