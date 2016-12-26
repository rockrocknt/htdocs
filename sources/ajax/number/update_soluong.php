<?php
global $db;

$table = SafeFormValue("table");
$id = SafeFormValue("id");
$num = SafeFormValue("num");

$sql = "update $table set productquantity=$num where productqty_id=$id";
$db->query($sql);

?>