<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="REFRESH" content="2; url=<?=$page_transfer?>">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>CMS - Vui lòng chờ</title>
<link href="css/admin/main.css" rel="stylesheet" type="text/css" />
</head>
<body class="nobg loginPage">
<!-- Top fixed navigation -->
<div class="topNav">
    <div class="wrapper">
        <div class="userNav">
            <ul>
                <li><a href="<?=getDomainName()?>" title="" target="_blank"><img src="./images/admin/icons/topnav/mainWebsite.png" alt="" /><span>Vào trang web</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>

<!-- Main content wrapper -->
<div class="loginWrapper">
    <div class="widget pagetransfer">
        <div class="title"><img src="./images/admin/icons/dark/files.png" alt="" class="titleIcon" /><h6>Thông báo!</h6></div>
        <form action="" id="validate" class="form" method="post">
            <fieldset>
                <p style="color:#f00;"><?=$showtext?></p>
                <p><a href="<?=$page_transfer?>">Bấm vào đây nếu bạn không muốn đợi lâu</a></p>
            </fieldset>
        </form>
    </div>
</div>    

<!-- Footer line -->
<?php include("templates/admin/footer.ctp"); ?>
</body>
</html>