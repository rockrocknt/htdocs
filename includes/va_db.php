<?php
$table_prefix='';
function StripSql($data){
	return str_replace("'", "”", $data);
}

function vaUpdate($table, $arr, $where="",$debug=0){

	global $db,$table_prefix;

	if (count($arr) <= 0)

	return false;

	$keys = array_keys($arr);

	$sql = "UPDATE ".$table_prefix.$table." SET ";
	$sql .= "`".$keys[0]."`='".StripSql($arr[$keys[0]])."' ";

	for ($i = 1; $i < count($keys); $i++) {
		$sql .= ", `".$keys[$i]."`='".StripSql($arr[$keys[$i]])."' ";
	}
	if ($where) $sql .= " WHERE ".$where;
    if ($debug == 1)
    {
        ?>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?
        echo $sql; die();
    }
	$db->query($sql);

	//echo mysql_error();
}

function vaInsert($table, $arr,$debug=0){

	global $db,$table_prefix;

	if (count($arr) <= 0)	return false;
	$keys = array_keys($arr);

	$sql = "INSERT INTO ".$table_prefix.$table." ( ";
	$sql .= "`".$keys[0]."`";
	for ($i = 1; $i < count($keys); $i++) {
		$sql .= ",`".$keys[$i]."`";
	}

	$sql .= ") VALUES (";
	$sql .= "'".StripSql($arr[$keys[0]])."'";
	for ($i = 1; $i < count($keys); $i++) {
		$sql .= ",'".StripSql($arr[$keys[$i]])."'";
	}
	$sql .= ");";
    if ($debug == 1)
    {
        echo $sql; die();
    }

	$db->query($sql);
	$post_id = mysql_insert_id();
	return $post_id;
}

function vaDelete($tbl, $where){
	global $db,$table_prefix;
	$sql = "DELETE FROM `".$table_prefix.$tbl."` WHERE $where";
	$db->query($sql);
}
?>