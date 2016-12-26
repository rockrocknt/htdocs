
<!DOCTYPE html>
<html>
<head>
    <?php Template::UserControl('Head') ?>
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,700,600,800' rel='stylesheet' type='text/css'>
    <link href="/css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <link href="/css/flexslider.css" rel="stylesheet">
    <!--[if IE 7]>
    <link href="/css/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet">
    <![endif]-->
    <link  rel="stylesheet" href="/css/style.css">
    <link  rel="stylesheet" href="/css/responsive.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
</head>
<body class="homepage2">
<div class="wrapper">
    <?php include 'widget_html/header.php'; ?>

    <?php
    $page = 'home';
    if (!empty($_GET['page'])) {
        $page = $_GET['page'];
    }
    // include "pages_html/$page.php";
    ?>

    <?php $filename = TPL_DIR.$do.'/'.$tpl.'.php';
             //echo $filename;
            if(file_exists($filename))
            {
                include($filename);
            }
            else
                print('This page is not available'.$filename);
            ?>
    <!-- template =  <? echo  $filename; echo $do;?> -->


    <?php include 'widget_html/footer.php'; ?>

    <?php include 'widget_html/section-copyright.php'; ?>
</div>


<script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
<script src="/css/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript" src="/js/css_browser_selector.js"></script>

<script type="text/javascript" src="/js/twitter-bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="/js/jquery.easing-1.3.js"></script>

<script type="text/javascript" src="/js/jquery.flexslider-min.js"></script>
<script type="text/javascript" src="/js/jquery.carouFredSel-6.2.1-packed.js"></script>
<script type="text/javascript" src="/js/script.js"></script>
</body>

</html>

<?php return; ?>
HONG LEO BELOW
<!DOCTYPE html>
<html lang='vi'>
<head>
    
    <?php Template::UserControl('Head') ?>
    <meta name="WT.ti" content="Hồng leo cô Long" />
    <meta name="author" content="HongLeoCoLong.com"/>
    <link rel="shortcut icon" href="/upload/images/favicon.png" type="image/x-icon" />


    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    

    <!-- Styles -->
    <!-- Uikit CSS -->
    <link href="/assets/css/uikit.min.css" rel="stylesheet">
    
    <link href="/assets/css/slidenav.almost-flat.css" rel="stylesheet">
    <link href="/assets/css/slideshow.almost-flat.css" rel="stylesheet">
    <link href="/assets/css/sticky.almost-flat.css" rel="stylesheet">
    <link href="/assets/css/tooltip.almost-flat.css" rel="stylesheet">
    

    <!-- Bootstrap core CSS -->
    <link href="/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Animate CSS -->
    <link href="/assets/css/animate.css" rel="stylesheet" />
    <!-- Sprocket Strips CSS -->
    <link href="/assets/css/strips.css" rel="stylesheet" />
    <!-- Pe-icon-7-stroke Fonts -->
    <link href="/assets/css/helper.css" rel="stylesheet">
    <link href="/assets/css/pe-icon-7-stroke.css" rel="stylesheet">
    <!-- Template CSS -->
    <link href="/assets/css/template.css" rel="stylesheet">
    <link href="/assets/color/color1.css" rel="stylesheet">
	<link href="/assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/mine.css" rel="stylesheet">
	<link href="/assets/css/app.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- Jquery scripts -->
    <script src="/assets/js/jquery.min.js"></script>


</head>

 
<body>


<?php  ?>

<!-- Wrap all page content -->
<div class="body-wrapper" id="page-top">

<!-- /Top Bar -->
<?php include "widget_html/topBar.php"; ?>
<!-- Top Bar -->


<?php include "widget_html/stickyMenu.php"; ?>


<?php $filename = TPL_DIR.$do.'/'.$tpl.'.php';
             //echo $filename;
            if(file_exists($filename))
			{
                include($filename);
			}
            else
                print('This page is not available'.$filename);
            ?>
<!-- template =  <? echo  $filename; echo $do;?> -->



<?php include "widget_html/bottom.php"; ?>

<?php include "widget_html/footer.php"; ?>


<?php include "widget_html/menuMobile.php"; ?>

<?php include "widget_html/popupOptin.php"; ?>

</div>
<div id="back_to_top" title="Go top" style="display: block;"></div>
<!-- cart scripts -->
<script src="/js/cart.js"></script>
<script src="/js/site.js"></script>


<!-- Scripts placed at the end of the document so the pages load faster -->


<!-- Uikit scripts -->
<script src="/assets/js/uikit.min.js"></script>
<script src="/assets/js/components_accordion.js"></script>
<script src="/assets/js/slideshow.min.js"></script>
<script src="/assets/js/slideshow-fx.min.js"></script>
<script src="/assets/js/slideset.min.js"></script>
<script src="/assets/js/sticky.min.js"></script>
<script src="/assets/js/tooltip.min.js"></script>
<script src="/assets/js/parallax.min.js"></script>
<script src="/assets/js/lightbox.min.js"></script>
<script src="/assets/js/grid.min.js"></script>

<!-- WOW scripts -->
<script src="/assets/js/wow.min.js"></script>
<script> new WOW().init(); </script>

<!-- Magnify scripts -->
<script src="/js/site.js"></script>
<!-- Template scripts -->
<script src="/assets/js/template.js"></script>

<!-- Bootstrap core JavaScript -->
<script src="/bootstrap/js/bootstrap.min.js"></script>

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<script src="/assets/js/ie10-viewport-bug-workaround.js"></script>

<link href='https://fonts.googleapis.com/css?family=Open+Sans:300,600,400italic,400&subset=latin,vietnamese' rel='stylesheet' type='text/css'>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=230472470375866";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php 
//echo str_replace();
$field = 'google_analytics';
$data = Info::getInfoField($field);
echo str_replace("”", "'", $data);
?>
</body>
</html>