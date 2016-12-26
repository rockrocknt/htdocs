<?php global $FullUrl; ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? global $title_page; ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?=$title_page?$title_page:'CMS - Hệ thống quản trị nội dung'?></title>
<link href="css/admin/main.css" rel="stylesheet" type="text/css" />
<?php getFavicon(); ?>

<script type="text/javascript" src="js/admin/external.php"></script>
<script type="text/javascript">
    var baseurl = "<?=$FullUrl?>";
    $(document).ready(function() {
	 setInterval("myAjax();", 300000);
});

function myAjax()
{
 $.post("<? echo $FullUrl; ?>/ajax.php",{
  } ,
  function(data)
   {
   });
}
</script>
</head>
<body>
    <!-- Left side content -->
    <?php include("templates/admin/sidebar.ctp"); ?>
    <!-- Right side -->
    <div id="rightSide">
        <!-- Top fixed navigation -->
        <?php include("templates/admin/header.ctp"); ?>
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
    <?php 
		$noindex = Info::getInfoField('noindex'); 
	?>
    <?php if ($noindex && !isset($_SESSION['AlreadyAlert']) && $_SESSION['group_user'] == 1) { 
		$_SESSION['AlreadyAlert'] = 1;
	?>
    <div class="uDialog">
        <div id="dialog-message" title="Thông báo hệ thống!">
        	Hiện tại website của bạn đang check NoIndex, việc này sẽ ngăn Google index nội dung của website! Nếu đây không phải là chủ ý của bạn, hãy vào mục Cấu hình website -> Cấu hình chung -> Tuỳ chọn -> bỏ chọn Noindex website!
        </div>
    </div>
    <script type="text/javascript">
	$("#dialog-message").dialog({
		autoOpen: true,
		modal: true,
		buttons: {
			Ok: function() {
				$(this).dialog("close");
			}
		}
	});
    </script>
    <?php } ?>
</body>
</html>