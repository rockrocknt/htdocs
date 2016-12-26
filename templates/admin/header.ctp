<? 
	global $db;
	$sql = "select count(*) as neworder from orders where odr_view=0 and odr_status<>2";
	$result = $db->getRow($sql);
	$neworder = $result["neworder"];
	
	$sql = "select count(*) as newcomment from comments where view=0";
	$result = $db->getRow($sql);
	$newcomment = $result["newcomment"];

	$sql = "select count(*) as newcontact from contact_logs where view=0";
	$result = $db->getRow($sql);
	$newcontact = $result["newcontact"];
	
	$sql = "select count(*) as newoptin from optin where view=0";
	$result = $db->getRow($sql);
	$newoptin = $result["newoptin"];
	
	$total = $neworder + $newcomment + $newcontact + $newoptin;
	$showoptin = Info::getInfoField('showoptin');
	$showcomment = Info::getInfoField('showcomment');
	$total2 = 0;
	if (cmsFunction::isShowGroupMenu(5))
		$total2 += $neworder;
	if (cmsFunction::isShowGroupMenu(7))
		$total2 += ($newcontact + $newcomment);
	if (cmsFunction::isShowGroupMenu(11))
		$total2 += $newoptin;
?>
<div class="topNav">
    <div class="wrapper">
        <div class="welcome"><a href="#" title=""><img src="images/admin/userPic.png" alt="" /></a><span>Xin chào, <?=$_SESSION["admin_username"]?>!</span></div>
        <div class="userNav">
            <ul>
                <li><a href="<?=getDomainName()?><?=$FullUrl?>/" title="" target="_blank">
                        <img src="./images/admin/icons/topnav/mainWebsite.png" alt="" /><span>Vào trang web</span></a></li>
                <li><a href="admin.php?do=profile" title=""><img src="images/admin/icons/topnav/profile.png" alt="" /><span>Thông tin tài khoản</span></a></li>
                <li class="ddnew"><a title=""><img src="images/admin/icons/topnav/messages.png" alt="" /><span>Thông báo</span><span class="numberTop"><?=$_SESSION['group_user']==1?$total:$total2;?></span></a>
                    <ul class="userMessage">
                    	<? if (cmsFunction::isShowGroupMenu(5)) { ?>
                        	<li><a href="admin.php?do=orders" title="" class="sInbox"><span>Đơn hàng</span> <span class="numberTop" style="float:none; display:inline-block"><?=$neworder?></span></a></li>
                        <? } ?>
						<? if (cmsFunction::isShowGroupMenu(7)) { ?>
                        	<? if ($showcomment) { ?>
                            <li><a href="admin.php?do=comments" title="" class="sInbox"><span>Bình luận</span> <span class="numberTop" style="float:none; display:inline-block"><?=$newcomment?></span></a></li>
                            <? } ?>
                        	<li><a href="admin.php?do=contact_logs" title="" class="sInbox"><span>Liên hệ</span> <span class="numberTop" style="float:none; display:inline-block"><?=$newcontact?></span></a></li>
                        <? } ?>
                        <? if ($showoptin) { ?>
                        	<? if (cmsFunction::isShowGroupMenu(11)) { ?>
                        	<li><a href="admin.php?do=optin" title="" class="sInbox"><span>Opt-in</span> <span class="numberTop" style="float:none; display:inline-block"><?=$newoptin?></span></a></li>
                        	<? } ?>
                        <? } ?>
                    </ul>
                </li>
                <li><a href="" id="userLogout" title=""><img src="images/admin/icons/topnav/logout.png" alt="" /><span>Đăng xuất</span></a></li>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>
  