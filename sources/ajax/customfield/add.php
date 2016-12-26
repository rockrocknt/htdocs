<?
	global $db;

	$arr['name_vn'] = SafeFormValue('name_vn');
	$arr['value_vn'] = SafeFormValue('value_vn');
	$arr['name_en'] = SafeFormValue('name_en');
	$arr['value_en'] = SafeFormValue('value_en');
	$arr['alias'] = SafeFormValue('alias');
	
	$sql = "select * from customfields where name_vn like '".$arr["name_vn"]."' and value_vn like '".$arr["value_vn"]."' and name_en like '".$arr["name_en"]."' and value_en like '".$arr["value_en"]."'";
	$result = $db->getRow($sql);
	// chua co thi them vao
	if ($result)
		$id = $result['id'];
	else
		$id = vaInsert('customfields', $arr);
?>
<tr id="row<?=$id?>">
    <td>
        <input type="hidden" name="listField[]" value="<?=$id?>" />
        <input type="text" value="0" onkeypress="return OnlyNumber(event)" class="tipS smallText" original-title="Nhập stt" id="number<?=$id?>" onchange="return updateNumber('customfields', '<?=$id?>')" style="width:50%;" />
    </td>
    <td><input id="name_vn<?=$id?>" style="width:90%;" type="text" value="<?=$arr["name_vn"]?>" /></td>
    <td align="center"><textarea style="width:90%; resize:none;" id="value_vn<?=$id?>"><?=$arr["value_vn"]?></textarea></td>
    <td align="center"><input style="width:90%;" id="name_en<?=$id?>" type="text" value="<?=$arr["name_en"]?>" /></td>
    <td align="center"><textarea style="width:90%; resize:none;" id="value_en<?=$id?>"><?=$arr["value_en"]?></textarea></td>
    <td class="actBtns">
        <a href="" onclick="updateField(<?=$id?>); return false;" title="" class="smallButton tipS" original-title="Cập nhật custom field"><img src="./images/admin/icons/dark/save.png" alt=""></a>
        <a href="" onclick="deleteField(<?=$id?>, -1); return false;" title="" class="smallButton tipS" original-title="Xóa custom field"><img src="./images/admin/icons/dark/close.png" alt=""></a>
        <div id="ajaxloader"><img class="numloader" id="ajaxloader<?=$id?>" src="images/site/loader.gif" alt="loader" /></div>
    </td>
</tr>