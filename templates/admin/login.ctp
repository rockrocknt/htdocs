<?php global $do, $FullUrl?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<? ?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
<title>CMS - Hệ thống quản trị nội dung</title>
<link href="css/admin/main.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/admin/external.php"></script>
<script type="text/javascript">var baseurl = '<?=$FullUrl?>';</script>
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
    <div class="loginLogo"><img ssrc="http://www.imgroup.vn/images/logo-img.png" width="200" alt="" /></div>
    <div class="widget" id="loginForm">
        <div class="title"><img src="./images/admin/icons/dark/files.png" alt="" class="titleIcon" /><h6>Đăng nhập</h6></div>
        <form action="" id="validate" class="form" method="post">
            <fieldset>
                <div class="formRow">
                    <label for="login">Tên đăng nhập:</label>
                    <div class="loginInput"><input type="text" name="username" class="validate[required]" id="username" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label for="pass">Mật khẩu:</label>
                    <div class="loginInput"><input type="password" name="password" class="validate[required]" id="pass" /></div>
                    <div class="clear"></div>
                </div>
                
                <div class="loginControl">
                    <div class="rememberMe"><a href="#" class="forgot-pwd">Bạn quên mật khẩu? Bấm vào đây!</a></div>
                    <input type="submit" value="Đăng nhập" class="dredB logMeIn" />
                    <div class="clear"></div>
                </div>
                <div class="ajaxloader"><img src="images/site/loader.gif" alt="loader" /></div>
                <div id="loginError">
                </div>
            </fieldset>
        </form>
    </div>
    
    <div class="widget" id="forgotForm" style="display:none;">
        <div class="title"><img src="./images/admin/icons/dark/files.png" alt="" class="titleIcon" /><h6>Khôi phục mật khẩu CMS</h6></div>
        <form action="" class="form" method="post" id="validate1">
            <fieldset>
                <div class="formRow">
                	<label for="login">Bạn hãy nhập email vào ô bên dưới:</label>
                    <div class="clear"></div>
                </div>
                
                <div class="formRow">
                    <label for="pass">Email:</label>
                    <div class="loginInput"><input type="text" id="email" class="validate[required,custom[email]]" name="email"></div>
                    <div class="clear"></div>
                </div>
                
                <div class="loginControl">
                    <div class="rememberMe"><a href="#" class="back-login">Quay lại khung đăng nhập</a></div>
                    <input type="submit" value="Gửi" class="dredB sendEmail" style="float:right;" />
                    <div class="clear"></div>
                </div>
                <div class="ajaxloader"><img src="images/site/loader.gif" alt="loader" /></div>
                <div id="echoMessage">
                </div>
            </fieldset>
        </form>
    </div>
</div>    

<!-- Footer line -->
<?php include("templates/admin/footer.ctp"); ?>
</body>
<? if(isset($_SESSION['mess'])) echo AlertMessage($_SESSION['mess']); unset($_SESSION['mess']); ?>
</html>