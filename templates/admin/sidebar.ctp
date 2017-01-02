<?php
	$do = SafeQueryString('do');
	$act = SafeQueryString('act');
	$cid = SafeQueryString('cid');
	
	switch($do){
		case "categories":	
			$showAdmin = 2;
			break;

		case "articles":	
			$showAdmin = 3;
			break;

		case "products":	
			$showAdmin = 4;
			break;

        case "productattchild":
            $showAdmin = 4;
            break;
        case "coupon":
            $showAdmin = 5;
            break;
		case "orders":	
			$showAdmin = 5;
			break;
		case "payments":
			$showAdmin = 5;
			break;
		case "banks":
			$showAdmin = 5;
			break;
		case "thankyou":	
			$showAdmin = 5;
			break;

		case "admin_groups":
			$showAdmin = 6;
			break;
		case "userlog":
			$showAdmin = 6;
			break;
		case "users":
			$showAdmin = 6;
			break;

		case "contact_logs":
			$showAdmin = 7;
			break;
		case "comments":
			$showAdmin = 7;
			break;
		case "member":
			$showAdmin = 7;
			break;
			
		case "infos":
			$showAdmin = 8;
			break;
		case "img_group":	
			$showAdmin = 9;
			break;
		case "img":	
			$showAdmin = 9;
			break;
			
		case "albums":
			$showAdmin = 9;
			break;
		case "images":
			$showAdmin = 9;
			break;
		case "video":
			$showAdmin = 9;
			break;

		case "widgets":
			$showAdmin = 10;
			break;

		case "nicks":
			$showAdmin = 11;
			break;
		case "optin":	
			$showAdmin = 11;
			break;	
		case "optin_type":	
			$showAdmin = 11;
			break;

		default:
			$showAdmin = 1;
			break;
	}
?>

<script type="text/javascript">
$(function(){
	var num = $('#menu').children(this).length;

	for (var index=0; index<=num; index++)
	{
		var id = $('#menu').children().eq(index).attr('id');
		$('#'+id+' strong').html($('#'+id+' .sub').children(this).length);
		$('#'+id+' .sub li:last-child').addClass('last');
	}
	$('#menu .activemenu .sub').css('display', 'block');
	$('#menu .activemenu a').removeClass('inactive');
})
</script>

<div id="leftSide">
  <div class="logo">
  	<a href="#" target="_blank" onclick="return false;">
        <img src="http://www.imgroup.vn/images/logo-img.png" width="180" alt="" />
    </a></div>
  <div class="sidebarSep mt0"></div>
  <div class="version-cms">CMS VERSION 5</div>
  <!-- Left navigation -->
  <ul id="menu" class="nav">
    <li class="dash" id="menu1"><a class="<?=($showAdmin==1)?' active':''?>" title="" href="admin.php"><span>Trang chủ</span></a></li>
	<? if (cmsFunction::isShowGroupMenu(2)) { ?>
    <li class="categories_li<?=($showAdmin==2)?' activemenu':''?>" id="menu2"><a href="" title="" class="exp<?=($showAdmin==2)?' active':''?>"><span>Danh mục</span><strong></strong></a>
      <ul class="sub">
        <li <?=$do=='categories'&&$act!='add'?'class="this"':''?>><a href="admin.php?do=categories&act=list&cid=121&root=1" title="">Danh mục chính</a></li>
        <li <?=$do=='categories'&&$act=='add'?'class="this"':''?>><a href="admin.php?do=categories&act=add&cid=121" title="">Thêm danh mục</a></li>
      </ul>
    </li> 
    <? } if (cmsFunction::isShowGroupMenu(3)) { ?>
     <li class="article_li<?=($showAdmin==3)?' activemenu':''?>" id="menu3"><a href="#" title="" class="exp<?=($showAdmin==3)?' active':''?>"><span>Tin tức</span><strong></strong></a>
      <ul class="sub">
        <li <?=$do=='articles'&&$act!='add'?'class="this"':''?>><a href="admin.php?do=articles" title="">Tất cả tin tức</a></li>      
        <li <?=$do=='articles'&&$act=='add'?'class="this"':''?>><a href="admin.php?do=articles&act=add" title="">Thêm tin tức</a></li>      
      </ul>
    </li>
	<? } if (cmsFunction::isShowGroupMenu(4)) { ?>
     <li class="product_li<?=($showAdmin==4)?' activemenu':''?>" id="menu4"><a href="#" title="" class="exp<?=($showAdmin==4)?' active':''?>"><span>Sản phẩm</span><strong></strong></a>
      <ul class="sub">
        <li <?=$do=='products'&&$act!='add'?'class="this"':''?>><a href="admin.php?do=products" title="">Tất cả sản phẩm</a></li>

        <li <?=$do=='products'&&$act=='add'?'class="this"':''?>><a href="admin.php?do=products&act=add" title="">Thêm sản phẩm</a></li>

        <li class="none" <?=$do=='productattchild'&&$act=='list'?'class="this none"':'non'?>><a href="admin.php?do=productattchild&productatt_id=1" title="">Thuộc tính sản phẩm</a></li>

      </ul>
    </li> 
    <? } if (cmsFunction::isShowGroupMenu(5)) { ?>
    <li class="cart_li<?=($showAdmin==5)?' activemenu':''?>" id="menu5"><a href="#" title="" class="exp<?=($showAdmin==5)?' active':''?>"><span>Bán hàng</span><strong></strong></a>
      <ul class="sub">
        <li <?=$do=='orders'&&!$act?'class="this"':''?>><a href="admin.php?do=orders" title="">Đơn hàng chưa hoàn thành</a></li>
        <li <?=$do=='orders'&&$act=='finish'?'class="this"':''?>><a href="admin.php?do=orders&act=finish" title="">Đơn hàng đã hoàn thành</a></li>
        <li <?=$do=='payments'||$do=='banks'?'class="this"':''?>><a href="admin.php?do=payments" title="">Hệ thống thanh toán</a></li>
        <li <?=$do=='thankyou'?'class="this"':''?>><a href="admin.php?do=thankyou" title="">Cấu hình bán hàng</a></li>
          <li <?=$do=='coupon'?'class="this"':''?>><a href="admin.php?do=coupon" title="">Quản lý coupon code</a></li>
      </ul>
    </li>
    <? } if (cmsFunction::isShowGroupMenu(6)) { ?>
    <li class="ui<?=($showAdmin==6)?' activemenu':''?>" id="menu6"><a href="#" title="" class="exp<?=($showAdmin==6)?' active':''?>"><span>Quản lý website</span><strong></strong></a>
      <ul class="sub">
        <li <?=$do=='admin_groups'?'class="this"':''?>><a href="admin.php?do=admin_groups" title="">Các nhóm quản trị viên & phân quyền</a></li>
        <li <?=$do=='users'?'class="this"':''?>><a href="admin.php?do=users" title="">Danh sách quản trị viên</a></li> 
        <li <?=$do=='userlog'?'class="this"':''?>><a href="admin.php?do=userlog" title="">Theo dõi hoạt động quản trị viên</a></li> 
      </ul>
    </li>
	<? } if (cmsFunction::isShowGroupMenu(7)) { ?>
     <li class="member_li<?=($showAdmin==7)?' activemenu':''?>" id="menu7"><a href="#" title="" class="exp<?=($showAdmin==7)?' active':''?>"><span>Người dùng</span><strong></strong></a>
      <ul class="sub">
        <?php /*?><li <?=$do=='member'?'class="this"':''?>><a href="admin.php?do=member" title="">Danh sách thành viên</a></li> <?php */?>
        <li <?=$do=='contact_logs'?'class="this"':''?>><a href="admin.php?do=contact_logs" title="">Danh sách liên hệ</a></li>
        <li <?=$do=='comments'?'class="this"':''?>><a href="admin.php?do=comments" title="">Danh sách bình luận</a></li>           
      </ul>
    </li>
    <? } if (cmsFunction::isShowGroupMenu(8)) { ?>
    <li class="setting_li<?=($showAdmin==8)?' activemenu':''?>" id="menu8"><a href="#" title="" class="exp<?=($showAdmin==8)?' active':''?>"><span>Cấu hình website</span><strong></strong></a>
      <ul class="sub">
        <li <?=$do=='infos'?'class="this"':''?>><a href="admin.php?do=infos" title="">Cấu hình chung</a></li>
          <li <?=$do=='infos'?'class="this"':''?>><a href="admin.php?do=categories&cid=287&root=1" title="">Địa chỉ mua hàng</a></li>

      </ul>
    </li>
    <? } if (cmsFunction::isShowGroupMenu(9)) { ?>


        <li class="gallery_li<?=($showAdmin==9)?' activemenu':''?>" id="menu9"><a href="#" title="" class="exp<?=($showAdmin==9)?' active':''?>"><span>Banner - Menu Phụ</span><strong></strong></a>
            <ul class="sub">
                <li      <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==16)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=16" title="">Menu chính (cid list)</a></li>

                <li      <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==27)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=27" title="">Logo</a></li>
                <li      <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==19)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=19" title="">Menu nhỏ ở header</a></li>

                <li
                     
                    <?php
                if (isset($_GET['cid']))
                {
                  echo  ($_GET['cid']==1)?'class="this"':'';
                }
                ?>><a href="admin.php?do=img_group&act=detail&cid=1" title="">Banner trang chủ</a></li>
                <li
                    class="none"
                    <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==5)?'class="this"':'';
                }
                ?>><a href="admin.php?do=img_group&act=detail&cid=5" title="">Product ở trang chủ</a></li>



                <li
                    
                    <?php
                if (isset($_GET['cid']))
                {
                    echo   ($_GET['cid']==2)?'class="this"':'';
                }
                ?>><a href="admin.php?do=img_group&act=detail&cid=2" title="">TRANG CHỦ - tab sản phẩm</a></li>



                <li

                    <?php
                if (isset($_GET['cid']))
                {
                    echo   ($_GET['cid']==6)?'class="this"':'';
                }
                ?>><a href="admin.php?do=img_group&act=detail&cid=6" title="">SIDEBAR - DANH MỤC SẢN PHẨM</a></li>

                <li

                    <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==10)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=10" title="">SIDEBAR - Thương Hiệu</a></li>


                <li
                    class="none"
                    <?php
                if (isset($_GET['cid']))
                {
                    echo   ($_GET['cid']==7)?'class="this"':'';
                }
                ?>><a href="admin.php?do=img_group&act=detail&cid=7" title="">trang Home - Weekly Sales</a></li>

                <li
                    class="none"
                    <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==8)?'class="this"':'';
                }
                ?>><a href="admin.php?do=img_group&act=detail&cid=8" title="">Danh mục SẢN PHẨM cột trái</a></li>


                <li
                    class="none"
                    <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==15)?'class="this"':'';
                }
                ?>><a href="admin.php?do=img_group&act=detail&cid=15" title="">Latest articles ( cid list)</a></li>

                <li
                    class="none"
                    <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==18)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=18" title="">Banner dưới New Arrival - Home</a></li>



                <li      <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==20)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=20" title="">Hướng dẫn ở Footer</a>
					</li>


                <li
                    class="none"
                    <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==21)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=21" title="">logo THƯƠNG HIỆU trên footer<br/> (180x80)</a></li>

                <li
                    
                    <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==25)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=25" title="">sideBar của Trang Giới thiệu</a></li>

                <li      <?php
                if (isset($_GET['cid']))
                {
                    echo  ($_GET['cid']==26)?'class="this"':'';
                }
                ?>>
                    <a href="admin.php?do=img_group&act=detail&cid=26" title="">OPTIN POP UP</a></li>



            </ul>
        </li>


    <? } if (cmsFunction::isShowGroupMenu(10)) { ?>
    <li class="template_li<?=($showAdmin==10)?' activemenu':''?>" id="menu10"><a href="#" title="" class="exp<?=($showAdmin==10)?' active':''?>"><span>Giao diện</span><strong></strong></a>
      <ul class="sub">
        <li <?=$do=='widgets'&$cid==1?'class="this"':''?>><a href="admin.php?do=widgets&cid=1" title="">Widget cột phải trang chi tiết tin tức</a></li>
        <li <?=$do=='widgets'&$cid==2?'class="this"':''?>><a href="admin.php?do=widgets&cid=2" title="">Widget cột phải trang Intro</a></li>
        <li <?=$do=='widgets'&$cid==3?'class="this"':''?>><a href="admin.php?do=widgets&cid=3" title="">Widget trang chủ</a></li>
      </ul>
    </li>
    <? } if (cmsFunction::isShowGroupMenu(11)) { ?>
    <li class="marketing_li<?=($showAdmin==11)?' activemenu':''?>" id="menu11"><a href="#" title="" class="exp<?=($showAdmin==11)?' active':''?>"><span>Marketing Online</span><strong></strong></a>
      <ul class="sub">
        <li <?=$do=='optin'?'class="this"':''?>><a href="admin.php?do=optin" title="">Email Opt-In</a></li>
        <?php/*?>
        <li <?=$do=='nicks'?'class="this"':''?>><a href="admin.php?do=nicks" title="">Nick hỗ trợ</a></li>
        <li <?=$do=='optin_type'?'class="this"':''?>><a href="admin.php?do=optin_type" title="">Chương trình Opt-In</a></li>
        <li <?=$do=='optin'?'class="this"':''?>><a href="admin.php?do=optin" title="">Email Opt-In</a></li><?php */?>
      </ul>
    </li>
    <? } ?>
  </ul>
</div>