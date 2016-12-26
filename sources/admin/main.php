<?
	global $db, $homeArticles, $homeComments, $homeOrders, $homeProducts;
	
	$sql = "select * from articles order by id desc limit 5";
	$homeArticles = $db->getAll($sql);
	
	$sql = "select * from products order by id desc limit 5";
	$homeProducts = $db->getAll($sql);
	
	$sql = "select * from comments order by cmt_id desc limit 5";
	$homeComments = $db->getAll($sql);
	
	$sql = "select * from orders where odr_status=0 order by odr_id desc limit 5";
	$homeOrders = $db->getAll($sql);

	$tpl = "home";
?>