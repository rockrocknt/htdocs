<?php
	global $db;

	$table = SafeFormValue("table");
	$id = SafeFormValue("id");
	$num = SafeFormValue("num");
	
	$sql = "update $table set num=$num where id=$id";
	$db->query($sql);
?>