<?
	global $FullUrl, $optIn_title, $optInIsActive;
	
	$result = info::getByName("Tiêu đề opt in");
	
	$optIn_title = $result["content_vn"];
	
	$result = info::getByName("Hiện opt in");
	
	$optInIsActive = $result["content_vn"];
	
	include(UC_DIR.'OptinEmail.ctp');
	
?>