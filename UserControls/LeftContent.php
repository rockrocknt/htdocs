<?php global $do, $FullUrl, $lg, $title_page, $descriptions, $keywords, $title_page; ?>
<div class="header">
    <?php Template::UserControl('Logo'); ?>
</div>

<?php  if ($do == "main") {

  $imgList=  ImagesGroup::getImages('LeftBanner');
    //var_dump($imgList);
    $link =getisset($imgList[0]['url']);
    ?>
    <style type="text/css">
        .body_home
        {
        background:  url("/<?=getisset($imgList[0]['img'])?>") no-repeat scroll center 192px transparent
        }
    </style>
    <div class="banner_center_home"
         style="height: 404px;
         cursor: pointer;
         background: none;
         "
        onclick="redirect('<?=$link?>');"
        >


    </div>

<?php  }else
{
    $imgList=  ImagesGroup::getImages('LeftBanner');
    ?>
    <div class="banner_center">
    <a href="<?=getisset($imgList[1]['url'])?>">
        <img src="/<?=getisset($imgList[1]['img'])?>" height="225" width="328">
    </a>
    </div>
    <ul class="menu_left" style="width: 185px;">

        <?php Template::UserControl('CategoriesLeft'); ?>
    </ul>
<?php
}
?>



<div class="info_contact_home">
    <div class="info_contact_L">
        <p class="title1">THAM GIA</p>
        <ul class="info_link"><li><a href="#"><img src="/images/face.png" width="31" height="31" /></a></li>
            <li><a href="#"><img src="/images/you.png" width="31" height="31" /></a></li>
            <li><a href="#"><img src="/images/tw.png" width="31" height="31" /></a></li>
            <li><a href="#"><img src="/images/p.png" width="31" height="31" /></a></li></ul>
    </div>
    <div class="info_contact_L">
        <p class="title2">Hotline</p>
        <p class="info_content"><span>+ 848 90757 375 </span><br />Nunupink
            <br />
            1990A Nguyen Trai, P 5, Q. 1, Tp. HCM </p>
    </div>
</div><br class="clean" />
<?php
return;
	$leftWidgets = getWidgets(1);
?>
<div class="left_content">
	<?php if ($leftWidgets) {
        foreach ($leftWidgets as $widget) {
            Template::UserControl($widget["alias"], $widget);
		}
    } ?>
</div>