<?php
	global $db, $lg;
	global $title_page, $keywords, $descriptions, $cat, $tpl, $mainWidgets;
/*
global $cat1;
	//seo
	$sql = "select * from categories where id=703";
	$cat = $db->getRow($sql);
	
	$title_page = $cat["title_$lg"];
	$keywords = $cat["keyword_$lg"];
	$descriptions = $cat["des_$lg"];

global $seoArray,$lg;
 $seoArray["seo_f_".$lg] = $cat["seo_f_".$lg];

	$mainWidgets = getWidgets(3);
	$tpl="main";
*/
$tpl="main";
if ($cat1['categories_displaytype_id']==6)
{
    $tpl="main_cat";
}
global $do, $FullUrl,$tab;
$tab = 2; // cho menu 2

