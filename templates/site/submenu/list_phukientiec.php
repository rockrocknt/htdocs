<?php include "widget_html/banner_home.php" ?>
<?php

 global $do,$cat, $FullUrl,$catphukien;
global $catphukiensinhnhat;
$image_on = "purple-home-nav-on-131223.jpg";
$image_off = "purple-home-nav-off-131223.jpg";
$currentcat = currentCat();

if ($tab == 2)
{
    $currentcat = $catphukiensinhnhat;
    $image_on = "purple-home-nav-on-xanh.jpg";
    $image_off = "purple-home-nav-off-xanh.jpg";

}
if ($currentcat['id'] == 151) $currentcat = $catphukiensinhnhat;
$imagesList= ImagesGroup::getImagesByCid($currentcat["id"],2);
for($i=0;$i<count($imagesList);$i++)
{

    if (isset($imagesList[0]['img_vn']))
    {
        $item = $imagesList[$i];
        $bgcolor = $item["colorbg_code"]?$item["colorbg_code"]:"#fbb738";
        if ($i % 2 == 0)
        {
            ?>
            <div class="box-set" style="float: left;background-color:<?=$bgcolor?>; ">
                <div class="title">
                    <h3><?=$item['name_vn']?></h3>
                    <a class="readmore" href="<?=$item['url_vn']?>">Xem chi tiết</a>
                </div>
                <a href="<?=$item['url_vn']?>" title="Info">
                    <img alt="<?=$item['name_vn']?>" src="<?=$FullUrl?>/<?=$item['img_vn']?>" width="298" height="298"/>
                </a>
            </div>
        <?
        }else
        {
            ?>
            <div class="box-set" style="margin-right:0;float: left;background-color:<?=$bgcolor?>; ">
                <div class="title">
                    <h3><?=$item['name_vn']?></h3>
                    <a class="readmore" href="<?=$item['url_vn']?>">Xem chi tiết</a>
                </div>
                <a href="<?=$item['url_vn']?>" title="Info">
                    <img alt="<?=$item['name_vn']?>" src="<?=$FullUrl?>/<?=$item['img_vn']?>" width="298" height="298"/>
                </a>
            </div>
        <?
        }
        ?>

    <?

    }
    ?><?
}
?>





