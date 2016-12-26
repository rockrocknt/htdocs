<?
	global $fb_fanpage;
	
	$fb_fanpage = Info::getValueByKey('mafanpagefb');
	
	include(UC_DIR.'Facebook.ctp');
?>