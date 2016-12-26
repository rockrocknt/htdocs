<?php global $FullUrl; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? global $title_page; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title_page?$title_page:'CMS - Hệ thống quản trị nội dung'?></title>

<?php getFavicon(); ?>

<script type="text/javascript" src="js/admin/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="js/admin/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css"
          href="css/jqueryui/jquery-ui-1.10.3.custom.css">
<script type="text/javascript">
    var baseurl = "<?=$FullUrl?>";
</script>
</head>
<body>

    <!-- Right side -->
    <div id="rightSide">
        <!-- Top fixed navigation -->

        <div class="wrapper">
			<?php 
				if (!$do)
					$do = "main";
				if(file_exists("templates/admin/$do/menu.ctp"))
                    include("templates/admin/$do/menu.ctp");

                if(file_exists("templates/admin/$do/$tpl.ctp"))
                {

                    include("templates/admin/$do/$tpl.ctp");

                }
                else
                    "Page is not available";
            ?>
        </div>
        <?php //include("templates/admin/footer.ctp"); ?>
    </div>
    <div class="clear"></div>

</body>
</html>