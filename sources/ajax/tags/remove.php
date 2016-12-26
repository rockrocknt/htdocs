<?php
	global $db;

	$uni_tag = SafeFormValue("uni_tag");
	$id = SafeFormValue("id");
	$type = SafeFormValue("type");
	$name_tag = SafeFormValue("name_tag");	

	$sql ="select idtag from tags where unique_key_tag ='$uni_tag' and name_tag='$name_tag'";
	$aidTag = $db->getRow($sql);
	$idTag=$aidTag['idtag'];
	$sql = "update tags_art set active=0 where idtag=$idTag and idart=$id and post_in ='$type'";
	$db->query($sql);