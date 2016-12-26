<?php
	global $db;

	$table = SafeFormValue("table");
	$id = SafeFormValue("id");
	$num = SafeFormValue("num");
	
	$sql = "update $table set productattchild_num=$num where productattchild_id=$id";
	$db->query($sql);
?>