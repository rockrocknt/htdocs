<?
	 global $db, $users;
	 
	 $sql = "select name_vn, nick, type, phone from nicks where active = 1";
	
	 $users = $db->getAll($sql);
	 
	 include(UC_DIR.'SupportOnline.ctp');
?>