<?php
global $act;
$cat = new Categories(currentCat());
switch($act)
{

	case 'logout':
		Members::Logout();
		break;

	case 'changepassword':
		$title_bar = $title_page = TITLE_CHANGE_PASSWORD;
		$tpl = 'changepassword';
		break;
		
	case 'forgotpassword':
		$title_bar = $title_page = TITLE_FORGOT_PASSWORD;
		$tpl = "forgotpassword";
		break;
		
	case 'resetpass':
		$title_bar = $title_page = TITLE_FORGOT_PASSWORD;
		$tpl = "resetpass";
		Members::ResetPass();
		break;
	
	case 'detail':

		break;

    default:
        if ($cat->getcategories_displaytype()==15)
        {
            getInfoDetail();
            //$title_bar = $title_page = TITLE_MEMBER_DETAIL;
            $tpl = "detail";

        }else
        if ($cat->getcategories_displaytype()==14)
        {
            $tpl = 'register';

        }else
        $tpl = 'login';
        break;
}

function getInfoDetail()
{
	global $member, $FullUrl, $prefix_url;
	
	$member = Members::Detail();
}
?>