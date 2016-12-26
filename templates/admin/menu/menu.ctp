<?php
 
$showAdmin = 1;

switch($do){
	case "categories":	
		$showAdmin = 1;
		break;	
	case "userlog":
		$showAdmin = 1;
		break;	
	case "users":
		$showAdmin = 1;
		break;
			case "boiten":
		$showAdmin = 3;
		break;
	case "bao_tri":
		$showAdmin = 1;
		break;
	case "infos":
		$showAdmin = 1;
	case "comments":
		$showAdmin = 1;
		break;
   	case "main":
		$showAdmin = 1;
		break;	
        
    case "banner":	
		$showAdmin = 2;
		break;
	case "img":	
		$showAdmin = 2;
		break;
	case "img_group":	
		$showAdmin = 2;
		break;
		
	case "banner":	
		$showAdmin = 2;
		break;	
		
	case "gallery":	
		$showAdmin = 2;
		break;	
	case "img":	
		$showAdmin = 2;
		break;
	case "img_group":	
		$showAdmin = 2;
		break;
		
    case "articles":	
		$showAdmin = 3;
		break;	
    case "products":	
		$showAdmin = 3;
		break;
    case "nicks":	
		$showAdmin = 3;
		break;
	case "tags":	
		$showAdmin = 3;
		break;
	case "banks":	
		$showAdmin = 3;
		break;
			
    case "optin":	
		$showAdmin = 4;
		break;	
	case "optin_type":	
		$showAdmin = 4;
		break;
	case "orders":	
		$showAdmin = 5;
		break;	
	default:
		$showAdmin = 0;
		break;
}
?>

 <div class="nav-outer-repeat"> 
  <!--  start nav-outer -->
  <div class="nav-outer"> 
    <!-- start nav-right -->
    <div id="nav-right">
      <div class="nav-divider">&nbsp;</div>
      <div class="showhide-account"><img width="93" height="14" alt="" src="images/shared/nav/nav_myaccount.gif"></div>
      <div class="nav-divider">&nbsp;</div>
      <a id="logout" href="admin.php?do=login&act=log_out"><img width="64" height="14" alt="" src="images/shared/nav/nav_logout.gif"></a>
      <div class="clear">&nbsp;</div>
      
      <!--  start account-content -->
      <div class="account-content">
        <div class="account-drop-inner"> <a id="acc-settings" href="admin.php?do=profile&act=changepass">Change password</a>
          <div class="clear">&nbsp;</div>
          <div class="acc-line">&nbsp;</div>
          <a id="acc-details" href="admin.php?do=profile">Account details </a>
          <div class="clear">&nbsp;</div>
          <div class="acc-line">&nbsp;</div>
          </div>
      </div>
      <!--  end account-content --> 
    </div>
    <!-- end nav-right --> 
    
    <!--  start nav -->
    <div class="nav">
      <div class="table">
      	<? if($_SESSION['group_user']!=2){ ?>
		<ul class="<?=($showAdmin == 1)?'current':'select'?>">
        
          <li><a href="#nogo" onclick="return false;" style="cursor:default;"><b>ADMINISTRATOR</b><!--[if IE 7]><!--></a><!--<![endif]--> 
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub <?=(($do=='infos')||($do=='categories')||($do=='users')||($do=='bao_tri')||(isset($do)))?'show':''?>">
              <ul class="sub">
                <li class="<?=($do=='categories')?'sub_show':''?>"><a href="admin.php?do=categories&act=list&cid=121&root=1">Thể loại</a></li>
                <li class="<?=($do=='users')?'sub_show':''?>"><a href="admin.php?do=users">Users</a></li>
                <li  class="<?=($do=='userlog')?'sub_show':''?>"><a href="admin.php?do=userlog">User Log</a></li>
                <li class="<?=($do=='bao_tri')?'sub_show':''?>"><a href="admin.php?do=bao_tri">Bảo trì</a></li>
                <li class="<?=($do=='infos'&&!isset($_GET['act']))?'sub_show':''?>"><a href="admin.php?do=infos">Cấu hình</a></li>
                <li class="<?=($do=='infos'&&isset($_GET['act'])&&$_GET['act']=='mail')?'sub_show':''?>"><a href="admin.php?do=infos&act=mail">Cấu hình Email</a></li>
                <?php /*?><li  class="<?=($do=='comments')?'sub_show':''?>"><a href="admin.php?do=comments">Nhận xét</a></li><?php */?>
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]--> 
          </li>
        </ul>
        <? } ?>
        <? if($_SESSION['group_user']!=2){ ?>
        <div class="nav-divider">&nbsp;</div>
        

       <ul class="<?=($showAdmin == 2)?'current':'select'?>">
          <li><a href="#nogo" onclick="return false;" style="cursor:default;"><b>Image Manager</b><!--[if IE 7]><!--></a><!--<![endif]--> 
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub  <?=(($do != 'categories')&&($do !='users')&& ($do !='bao_tri')&&($do!='infos'))?'show':''?>">
              	<ul class="sub" style="margin-left:170px">
                    <?php /*?><li class="<?=($do=='banner' && $_GET['cid'] == '120')?'sub_show':''?>"><a href="admin.php?do=banner&cid=120">Top banner</a></li>
                    <li class="<?=($do=='banner' && $_GET['cid'] == '119')?'sub_show':''?>"><a href="admin.php?do=banner&cid=119">Banner Quảng Cáo</a></li>
                    <li class="<?=($do=='banner' && $_GET['cid'] == '118')?'sub_show':''?>"><a href="admin.php?do=banner&cid=118">Logo Header</a></li>
                    <li class="<?=($do=='banner' && $_GET['cid'] == '116')?'sub_show':''?>"><a href="admin.php?do=banner&cid=116">Logo Footer</a></li>
                    <li class="<?=($do=='banner' && $_GET['cid'] == '117')?'sub_show':''?>"><a href="admin.php?do=banner&cid=117">Icon Title</a></li>      
                    <li class="<?=($do=='banner' && $_GET['cid'] == '115')?'sub_show':''?>"><a href="admin.php?do=banner&cid=115">Slider</a></li><?php */?>
                    <li  style="display:none;"  class="<?=($do=='img')?'sub_show':''?>"><a href="admin.php?do=img">Images</a></li>
                    <li class="<?=($do=='img_group')?'sub_show':''?>"><a href="admin.php?do=img_group">Images Group</a></li>  
                    <?php /*?><li class="<?=($do=='banner')?'sub_show':''?>"><a href="admin.php?do=banner&act=list">Banner</a></li>       
                     <li class="<?=($do=='gallery')?'sub_show':''?>"><a href="admin.php?do=gallery&act=list">Flash</a></li>     <?php */?>  
             	</ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]--> 
          </li>
        </ul>
        <? } ?>
        <ul class="<?=($showAdmin == 3)?'current':'select'?>">
          <li><a href="#nogo" onclick="return false;" style="cursor:default;"><b>CMS Manager</b><!--[if IE 7]><!--></a><!--<![endif]--> 
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub <?=(($do != 'categories')&&($do !='users')&& ($do !='bao_tri')&&($do!='infos'))?'show':''?>">
              <ul class="sub" <? if($_SESSION['group_user']!=2){ ?>style="margin-left:120px"<? } ?>>                
                <li class="<?=($do=='articles')?'sub_show':''?>"><a href="admin.php?do=articles">Tin tức</a></li>
                <li class="<?=($do=='products')?'sub_show':''?>"><a href="admin.php?do=products">Sản phẩm</a></li>
                <li class="<?=($do=='tags')?'sub_show':''?>"><a href="admin.php?do=tags">Tags</a></li>
                <? if($_SESSION['group_user']!=2){ ?><li  class="<?=($do=='nicks')?'sub_show':''?>"><a href="admin.php?do=nicks&cid=114">Hỗ trợ trực tuyến</a></li>
                <li  class="<?=($do=='banks')?'sub_show':''?>"><a href="admin.php?do=banks">Tài khoản ngân hàng</a></li><? } ?>
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]--> 
          </li>
        </ul>
        
        <?php /*?><ul class="<?=($showAdmin == 4)?'current':'select'?>">
          <li><a href="#nogo" onclick="return false;" style="cursor:default;"><b>Opt In Manager</b><!--[if IE 7]><!--></a><!--<![endif]--> 
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub <?=(($do != 'categories')&&($do !='users')&& ($do !='bao_tri')&&($do!='infos'))?'show':''?>">
              <ul class="sub" style="margin-left:400px">        
              	<li class="<?=($do=='optin')?'sub_show':''?>"><a href="admin.php?do=optin">Optin Email</a></li>        
                <li class="<?=($do=='optin_type')?'sub_show':''?>"><a href="admin.php?do=optin_type">Chiến dịch</a></li>
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]--> 
          </li>
        </ul><?php */?>
       <? if($_SESSION['group_user']!=2){ ?> 
       <ul class="<?=($showAdmin == 5)?'current':'select'?>">
          <li><a href="#nogo" onclick="return false;" style="cursor:default;"><b>Orders</b><!--[if IE 7]><!--></a><!--<![endif]--> 
            <!--[if lte IE 6]><table><tr><td><![endif]-->
            <div class="select_sub  <?=(($do != 'categories')&&($do !='users')&& ($do !='bao_tri')&&($do!='infos'))?'show':''?>">
              <ul class="sub" style="margin-left:400px">        
              	<li class="<?=($do=='orders'&empty($act))?'sub_show':''?>"><a href="admin.php?do=orders">Orders</a></li>        
                <li class="<?=($act=='finish')?'sub_show':''?>"><a href="admin.php?do=orders&act=finish">Finish</a></li>
              </ul>
            </div>
            <!--[if lte IE 6]></td></tr></table></a><![endif]--> 
          </li>
        </ul>
        <? } ?>
        <div class="nav-divider">&nbsp;</div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <!--  start nav --> 
    
  </div>
  <div class="clear"></div>
  <!--  start nav-outer --> 
</div>

  <div class="clear"></div>
 <!--  start nav-outer-repeat................................................... END -->