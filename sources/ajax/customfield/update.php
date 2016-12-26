<?
	$arr['name_vn'] = SafeFormValue('name_vn');
	$arr['value_vn'] = SafeFormValue('value_vn');
	$arr['name_en'] = SafeFormValue('name_en');
	$arr['value_en'] = SafeFormValue('value_en');
	$id = SafeFormValue('id');
	
	vaUpdate('customfields', $arr, ' id='.$id);	
?>