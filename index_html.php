
<!DOCTYPE html>
<html>
   <head>

      <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
      <title>Cosmetic - Modern Beauty Shop Template</title>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href='http://fonts.googleapis.com/css?family=Raleway:400,500,700,600,800' rel='stylesheet' type='text/css'>
      <link href="css/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
      <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">

      <link href="css/flexslider.css" rel="stylesheet">
      <!--[if IE 7]>
      <link href="css/font-awesome/css/font-awesome-ie7.min.css" rel="stylesheet"> 
      <![endif]-->
      <link  rel="stylesheet" href="css/style.css">
      <link  rel="stylesheet" href="css/responsive.css">
   </head>
   <body>
      <div class="wrapper">
         <?php include 'widget_html/header.php'; ?>

	<?php
	$page = 'home';
	if (!empty($_GET['page'])) {
		$page = $_GET['page'];
	}
	include "pages_html/$page.php";
	?>

        <?php include 'widget_html/footer.php'; ?>

        <?php include 'widget_html/section-copyright.php'; ?>
      </div>

      <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
      <script src="http://code.jquery.com/jquery-migrate-1.1.1.min.js"></script>
      <script src="css/bootstrap/js/bootstrap.min.js"></script>

      <script type="text/javascript" src="js/css_browser_selector.js"></script>

      <script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.min.js"></script>
      <script type="text/javascript" src="js/jquery.easing-1.3.js"></script>

      <script type="text/javascript" src="js/jquery.flexslider-min.js"></script>

      <script type="text/javascript" src="js/script.js"></script>
   </body>

</html>
