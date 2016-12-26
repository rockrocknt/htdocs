<?php global $do, $FullUrl, $lg, $title_page, $descriptions, $keywords;?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $title_page; ?><?=isset($_GET["page"])?" ".paging." ".SafeQueryString("page"):"";?></title>
<meta name="description" content="<?php echo $descriptions; ?><?=isset($_GET["page"])?" ".paging." ".SafeQueryString("page"):"";?>" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
<meta name="WT.ti" content="<?php echo $title_page; ?><?=isset($_GET["page"])?" ".paging." ".SafeQueryString("page"):"";?>" />
    <meta name="author" content="MyPhamChoNam.com"/>
    <meta name="robots" content="noindex,nofollow" />
<?php // <meta name="robots" content="noodp,index,follow" />
//showRobotsMeta(); ?>

    
<?php getFavicon(); ?>


<?php

//$head =  "widget_html/head_simple.php";
/*
if ($page=="master1_bosanpham.php")
{
    $head =  "widget_html/head_simple.php";
}
if ($page=="master1_chitietsanpham.php")
{
    //    $head =  "widget_html/head_simple.php";
}
*/
//include $head;
?>