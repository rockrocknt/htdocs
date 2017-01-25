<?php

global $FullUrl, $prefix_url,$cat, $lg, $product,$title_bar;
$currentcat = currentCat();
$obj = $cat->obj;
?>

<section class="main-body">
<div class="container">
<div class="row">
<div class="col-sm-12 col-md-12">
              <article itemtype="http://schema.org/Article" itemscope="" class="item item-page">
	            <meta content="en-GB" itemprop="inLanguage">
			    <div itemprop="articleBody">
		          <?php  echo $cat->getContent(); ?>
				</div>							
              </article>
            </div>
</div>
</div>
</section>

<?php
return;
global $FullUrl, $prefix_url,$cat, $lg, $product,$title_bar;
$currentcat = currentCat();
?>
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/stylesheetcity.css">
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/master1_gioithieu.css">
<?php
$obj = $cat->obj;
?>

<?php
global $FullUrl, $prefix_url, $cat, $lg, $product, $title_bar;
$currentcat = currentCat();
?>

<!-- Titlebar
================================================== -->
<section class="titlebar">
    <div class="container">
        <div class="sixteen columns">
            <h2><?php
                echo $cat->getName();
                ?></h2>

            <nav id="breadcrumbs">

                <?= $title_bar ? $title_bar : navigationBar() ?>


            </nav>
        </div>
    </div>
</section>


<!-- Content
================================================== -->

<!-- Container -->
<div class="container">
    <div class="twelve columns">
        <div class="extra-padding">

            <!-- Post -->
            <article class="post single">
                 <?php
                 if (isset($_REQUEST['decision']))
                 {
                     //var_dump($_REQUEST);
                     if ($_REQUEST['decision']=="ACCEPT")
                     {
                         ?>
                        <h3>Giao dịch thanh toán qua VISA, MASTER, JCB đã thành công </h3>
                     <?
                     }else
                         if ($_REQUEST['decision']=="ERROR")
                     {
                         ?>
                         <h3>Giao dịch thanh toán qua VISA, MASTER, JCB không thành công ( có lỗi ) </h3>
                     <?
                     }
                         else
                             if ($_REQUEST['decision']=="REJECT")
                             {
                                 ?>
                                 <h3>Giao dịch thanh toán qua VISA, MASTER, JCB không thành công ( bị từ chối ) </h3>
                             <?
                             }
                             else
                                 if ($_REQUEST['decision']=="CANCEL")
                                 {
                                     ?>
                                     <h3>Bạn đã hủy giao dịch thanh toán qua VISA, MASTER, JCB </h3>
                                 <?
                                 }



                 }
                 ?>
                <?=$cat->getContent()!=""?str_replace("[MADONHANG]","<strong>".$_SESSION['idorder']."</strong>",$cat->getContent()):SITE_NO_NEWS ?>
            </article>
        </div>
    </div>
    <?php include "widget_html/gioithieu_sidebar.php"; ?>


</div>
<!-- Container / End -->
<?php return ; ?>

<?=$title_bar?$title_bar:navigationBar()?>
<div class="clr">&nbsp;</div>
<table style="float: left;width: 100%" cellpadding="0" cellspacing="0" border="0"><tbody><tr>
        <td valign="top">

            <div class="custserv-tablehd" style="width: 100%;text-align: center"><?php
                echo $cat->getName();
                ?></div>
            <br>

            <div id="custserv-content" style="width: 100%;text-align: center">

                <?=$cat->getContent()!=""?str_replace("[MADONHANG]","<strong>".$_SESSION['idorder']."</strong>",$cat->getContent()):SITE_NO_NEWS ?>
                <br><br><br>
            </div>
        </td>


    </tr></tbody></table>
