// JavaScript Document
<?php
$ip = $_SERVER['REMOTE_ADDR'] ;

if ($ip == "127.0.0.1")
{
    $FullUrl = "/party";
}else
    $FullUrl = "";
//F:\LONG\xampp\htdocs\wwindow
//$lg = strip_tags($_GET['lg']);
?>

function IncludeJavaScript(jsFile)
{
	document.write('<script type="text/javascript" src="'+ jsFile + '"></script>');
}

IncludeJavaScript('<?=$FullUrl?>/js/admin/jquery-1.8.2.min.js');
IncludeJavaScript('<?=$FullUrl?>/js/admin/jquery-ui.min.js');
IncludeJavaScript('<?=$FullUrl?>/js/admin/plugins/forms/jquery.validationEngine-<?=$lg?>.js');
IncludeJavaScript('<?=$FullUrl?>/js/admin/plugins/forms/jquery.validationEngine.js');
IncludeJavaScript('<?=$FullUrl?>/js/jquery.nivo.slider.pack.js');
IncludeJavaScript('<?=$FullUrl?>/js/jquery.easing.1.3.js');
IncludeJavaScript('<?=$FullUrl?>/js/jquery.form-defaults.js');
IncludeJavaScript('<?=$FullUrl?>/js/ddsmoothmenu.js');
IncludeJavaScript('<?=$FullUrl?>/js/ajax.js');
IncludeJavaScript('<?=$FullUrl?>/js/site.js');

IncludeJavaScript('<?=$FullUrl?>/js/jquery.carouFredSel-5.2.2-packed.js');
IncludeJavaScript('<?=$FullUrl?>/js/selectBox.js');
IncludeJavaScript('<?=$FullUrl?>/js/jquery.jqzoom-core.js');
