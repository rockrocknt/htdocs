<?php
	global $page, $plpage, $submenus, $tpl,$products;
$tpl="list";

	$cat = new Categories(currentCat());

if ($cat->getcategories_displaytype()==2)
{
    $tpl="xemtatcasanpham";
    return;

}
    if ($cat->getcategories_displaytype()==3)
    {
        $tpl="list_sinhnhatbegai";
        return;
    }
    if ($cat->getcategories_displaytype()==4)
    {
        $tpl="list_bosanpham";
        return;
    }
    if ($cat->getcategories_displaytype()==5)
    {
        $tpl="list_tiecchude";
        return;
    }
if ($cat->getcategories_displaytype()==6)
{
    $tpl="list_tiecmuahe";
    return;
}
if ($cat->getcategories_displaytype()==8)
{
    $tpl="list_ytuongtiectung";
    return;
}
if ($cat->getcategories_displaytype()==9)
{
    $tpl="list_ytuongtiecluau";
    return;
}
if ($cat->getcategories_displaytype()==10)
{
    $tpl="list_chitietytuonggallery";
    return;
}

if ($cat->getcategories_displaytype()==13)
{
    $tpl="list_video";
    return;
}


if ($cat->getcategories_displaytype()==17)
{
    $tpl="list_sinhnhatbegai_hiencon";
    return;
}


if ($cat->getcategories_displaytype()==18)
{
    $tpl="list_showsanphammenucon";
    return;
}

function getColorandSize()
{
    global $db,$colorlist, $sizelist;
    $sql = "SELECT * FROM `productattchild`  where `productatt_id`=2";
    $colorlist = $db ->getAll($sql);

    $sql = "SELECT * FROM `productattchild`  where `productatt_id`=1";
    $sizelist = $db ->getAll($sql);
}
	$set_per_page = Info::getInfoField('paging_submenu');

	$result = $cat->getChilds($page, $set_per_page);


	$plpage = $result['paging'];
	$submenus = $result['list'];



	$tpl="list";
?>