<?
	global $db;

	$id = SafeFormValue('id');
	$proid = SafeFormValue('proid');
	
	if ($proid>0)
	{
		$sql = "update products_customfields set active=0 where productid=$proid and customfieldid=$id";
		$db->query($sql);
	}
?>