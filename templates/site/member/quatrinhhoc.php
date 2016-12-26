<?
	$cat = new Categories(currentCat());
//	var_dump($cat);
global $FullUrl, $lg, $articles, $plpage, $title_bar;
?>
 

<div class="mid_content" style="padding-top:0">

<div class="sanpham-moi container-sub-div">
    
    <div class="ct-div-sub">
	<?=$title_bar?$title_bar:navigationBar()?>
	
	
<div class="title">
					<img src="/images/btn_icon.png" style="float: left;">	
					<h1 class="h1title"><?=$cat->getName()?></h1> 
					<img src="/images/btn_fooder.png" style="float: left;">
</div>


<div ><?php
			$currentcat = Categories::getCurrentCat();
			echo $currentcat['content_vn'];
			
			?>
</div>
<div class="listcauhoi">
					<?php
					
					
if (isset($_SESSION['member']))
{
$sql = "select * from member where email='".$_SESSION['member']['email']."'";
		$_SESSION['member'] = $db->getRow($sql);
		
//var_dump($_SESSION['member']);
$member = $_SESSION['member'];
	echo $member['quatrinhhoc'];
}else
{
	echo "Mời bạn đăng nhập.";
}
?>	
</div>	 
					
					 
					 
		
			
					<img src="/images/line_xanh.jpg" />
					
					<br/>
					 
					
					<!-- # <div class="ct-div-sub"> -->
					</div>
					</div>
					</div>
