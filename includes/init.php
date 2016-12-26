<?php
$arrMenu = array();
$arrMenu['home'] = 'menu_02.gif';
$arrMenu['about'] = 'menu_04.gif';
$arrMenu['product'] = 'menu_06.gif';
$arrMenu['news'] = 'menu_08.gif';
$arrMenu['contact'] = 'menu_10.gif';

$arrMenu1 = array();
$arrMenu1['home'] = 'menu1_02.gif';
$arrMenu1['about'] = 'menu1_04.gif';
$arrMenu1['product'] = 'menu1_06.gif';
$arrMenu1['news'] = 'menu1_08.gif';
$arrMenu1['contact'] = 'menu1_10.gif';

$setmenu = isset($_GET['do'])?$_GET['do']:'home';

$arrMenu[$setmenu] = $arrMenu1[$setmenu] ;
?>