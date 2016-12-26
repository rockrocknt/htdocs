<?
	global $db;
	$name = SafeFormValue('name');
	
	$sql = "select * from customfields where name_vn like '$name'";
	$arr = $db->getRow($sql);
	
	echo json_encode($arr);
?>