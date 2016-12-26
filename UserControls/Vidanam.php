<?
	global $vidanam, $db, $lg;
	
	$sql="select * from products where active = 1 and cid = 743 order by id desc limit 0,8";
	$vidanam = $db->getAll($sql);
	
	include(UC_DIR.'Vidanam.ctp');
?>