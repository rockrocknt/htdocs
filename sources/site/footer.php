<?php
	global $db, $info_foot;
	$sql = "select * from infos where name_vn like '%footer " . $_SESSION['lg'] . "%'";
	$r = $db->getRow($sql);
	$info_foot=$r['content_vn'];		
	
	//show footer
	include('templates/site/footer.php');
?>