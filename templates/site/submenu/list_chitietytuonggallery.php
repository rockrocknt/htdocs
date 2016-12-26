<?php
global $FullUrl, $prefix_url, $lg, $product,$title_bar;
$currentcat = currentCat();
$submenus =  new Categories($currentcat);
$listChilde = $submenus->getChilds();
?>
<? $imagesList= ImagesGroup::getImagesByCid($currentcat["id"],2); ?>

<?=$title_bar?$title_bar:navigationBar()?><br/>
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/chitietgallery.css">
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/stylesheetcity.css">
<!-- Add fancyBox main JS and CSS files -->
<script type="text/javascript" src="<?=$FullUrl?>/fancy215/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?=$FullUrl?>/fancy215/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
    $(document).ready(function() {
        /*
         *  Simple image gallery. Uses default settings
         */
        $('.fancybox').fancybox();


        $(".popdown").click(function() {
            $.fancybox.open({
                href : '/cart_popup.php',
                type : 'iframe',
                width: 750,
                padding : 2,
                scrolling : 'no',
                scrollOutside: false
            });
            return false;
        });
    });

</script>

<div id="MainContainner">
<div id="photogallery">
<div id="title">
    <h1 id="prename"><? echo $currentcat["name_".$lg]; ?>  </h1>
    <h2 id="name"><? echo strip_tags($currentcat["short_".$lg]); ?></h2>
</div>
<div id="gallery" style="visibility: visible;">

<div style="padding: 0px;width: 322px; left: 0px; margin: 0 0 0 498px; position: absolute;">

<div class="carousel_container">
    <a class="prev"><img class="png" src="<?=$FullUrl?>/image_site/arrowleft.png" /></a>
    <div class="carousel">
        <ul style="margin:0" id="carousel_items">
            <?php

            for($i=0; $i<count($listChilde);$i++)
            {
                if (isset($listChilde[$i])){
                    $item  = $listChilde[$i];
                    $tempcount = $i+1;
                    ?>
                    <li id="thumb_<?=$tempcount?>">

                        <img class="thumb"
                             width="100"
                             src="<? echo $FullUrl."/".$item['img_topbanner'] ?>" />
                    </li>
                <?
                }
                ?>

            <?}
            ?>


        </ul>
    </div>
    <a class="next"><img class="png" src="<?=$FullUrl?>/image_site/arrowright.png"/></a>
    <div class="clear"></div>
</div>
<div style="display:none;" id="content_store">

<style type="text/css">
    .featuredPartyHeader {
        font-size:18px;
        line-height:18px;
        padding:15px 0 0;
        color:;
    }

</style>

<?php

for($i=0; $i<count($listChilde);$i++)
//for($i=0; $i<1;$i++)
{
    if (isset($listChilde[$i])){
        $item  = $listChilde[$i];
        $tempcount = $i+1;
        ?>
       <div id="<?=$tempcount?>">
           <?php
           global $productlist;
           $productlist = products::getByProductIDList($item['product_list']);
           ?>

           <div id="inline<?=$tempcount?>" style="width:670px;display: none;">

               <?php   include "widget_html/cart_popup_chitietgallery.php" ?>
           </div>

           <div class="content">
               <div class="photoNum">Photo <?=$tempcount?> of <?=count($listChilde)?></div>
               <div class="prename"><?php
                   if (isset($listChilde[$i]))
                   {
                       echo $listChilde[$i]["name_".$lg];
                   }

                   ?></div>
               <div class="bodyCopy">
                   <?php
                   if (isset($listChilde[$i]))
                   {
                       echo strip_tags($listChilde[$i]["short_".$lg]) ;
                   }

                   ?>

                   <p>
                       <a href="#inline<?=$tempcount?>" class="fancybox">
                           <img title="Shop This Idea!" alt="Shop This Idea!" src="<?=$FullUrl?>/image_site/shop-this-idea-button-purple.gif">
                       </a></p></div>
               <a href="javascript:PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=62627,346034,207672,430009,583938,177266,177270,346043,166294,166297,262397,409987&amp;context=popupContentDetail','','','close_on_outside_click','auto')">

               </a>
               <div class="featuredPartyLink"><a href="javascript:PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=62627,346034,207672,430009,583938,177266,177270,346043,166294,166297,262397,409987&amp;context=popupContentDetail','','','close_on_outside_click','auto')">
                       Shop all </a><a href="/category/theme+parties/luau+theme+party/hula+skirts.do"><b>Luau Hula Skirts</b></a>
               </div>

               <div class="featuredPartyLink">
                   Shop all <a href="/category/theme+parties/luau+theme+party/drinkware+serveware.do"><b>Luau Drinkware</b></a>
               </div>

               <div class="featuredPartyLink">
                   Shop all <a href="/category/theme+parties/luau+theme+party.do"><b>Luau Party Supplies</b></a>
               </div>
           </div> <!-- end of content -->
           <img src="<?=$FullUrl."/".$item['img_topbanner']?>" width="486" class="large_img">
           <!-- start products --->
           <div class="products">
           <div class="carousel_container">
           <a class="prevBtn">

               <img src="<?=$FullUrl?>/image_site/arrowleft-bottom.png" class="png"></a>
           <div class="featuredProductCarousel">
           <ul id="carousel_featuredProducts" style="margin:0">
               <?php
               for($z=0;$z<count($productlist);$z++)
               {
                   $tempcountproduct = $z + 1;
                   if (isset($productlist[$z]))
                   {
                       $obj = $productlist[$z];
                       $product = new products($productlist[$z]);
                       ?>
                       <li id="featuredProduct_thumb_<?=$tempcountproduct?>">
                           <div id="PhotoGalleryProd">
                               <div align="center" class="thumbcontainer">
                                   <table border="0" cellspacing="0" cellpadding="0">
                                       <tbody><tr>
                                           <td align="center" class="imagecellbg">
                                               <a href="#inline<?=$tempcount?>"
                                                  class="fancybox"

                                                   >
                                                   <img border="0" class="prdthumb"
                                                        alt="Jointed Tiki Totem Cutout"
                                                        entitytype="product"
                                                        src="<?=$FullUrl."/".$product->getImageNoThumb()?>">
                                               </a>
                                           </td>
                                       </tr>
                                       </tbody></table>
                               </div>
                               <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

                                   <div class="thumbInfo">
                                       <div class="thumbheader">
                                           <img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                                       <div align="center" class="thumbheader ">
                                           <a
                                               href="#inline<?=$tempcount?>"
                                               class="fancybox"
                                               >
                                               <?=$product->getName()?>
                                           </a>
                                       </div>

                                       <div align="center" class="none"></div>

                                       <div align="center" class="thumbheader ">
                                           <div class="familyShortDesc ">

                                           </div>
                                       </div>

                                       <div align="center" class="thumbheader price">
                                           <?= formatPrice($product->getPrice());?>
                                       </div>

                                   </div>
                                   <div class="thumbVerticalSpacer">
                                       <img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
                                   <div class="thumbBottom">
                                       <img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
                               </div>
                           </div>

                           <script language="javascript">
                               function disableUrl(imageurl){
                                   jQuery('#engage').show();
                                   document.location=imageurl;
                               }
                           </script>

                       </li>

                   <?
                   } // for($z=0;$z<count($productlist);$z++)
                   ?>

               <?
               } // for($z=0;$z<count($productlist);$z++)
               ?>


           </ul>
           </div>
           <a class="nextBtn"><img src="<?=$FullUrl?>/image_site/arrowright-bottom.png" class="png"></a>
           <div class="clear"></div>
           </div>

           </div>

       </div>
    <?
    }
    ?>

<?}
?>

<style type="text/css">
    .featuredPartyHeader {
        font-size:18px;
        line-height:18px;
        padding:15px 0 0;
        color:;
    }

</style>

</div>

</div>
<div>
    <div id="featureImage" style="display: block;">
        <img src="" width="486" class="large_img">
    </div>
    <div id="description">
        <div id="content"><div class="content">
                <div class="photoNum">Photo 1 of 10</div>
                <div class="prename">Get yodur luau on!</div>
                <div class="bodyCopy">Luaus have been thrown for almost 200 years and today, luaus remain among the most popular party themes. Warm up to the thought of throwing your own luau party. Browse through the photos above for easy ideas for a tiki bar and luau games, food, a photo booth and more!

                    <p>
                        <a href="javascript:PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=62627,346034,207672,430009,583938,177266,177270,346043,166294,166297,262397,409987&amp;context=popupContentDetail','','','close_on_outside_click','auto')"><img title="Shop This Idea!" alt="Shop This Idea!" src="<?=$FullUrl?>/image_site/shop-this-idea-button-purple.gif">
                        </a></p></div><a href="javascript:PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=62627,346034,207672,430009,583938,177266,177270,346043,166294,166297,262397,409987&amp;context=popupContentDetail','','','close_on_outside_click','auto')">

                </a><div class="featuredPartyLink"><a href="javascript:PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=62627,346034,207672,430009,583938,177266,177270,346043,166294,166297,262397,409987&amp;context=popupContentDetail','','','close_on_outside_click','auto')">
                        Shop all </a><a href="/category/theme+parties/luau+theme+party/hula+skirts.do"><b>Luau Hula Skirts</b></a>
                </div>

                <div class="featuredPartyLink">
                    Shop all <a href="/category/theme+parties/luau+theme+party/drinkware+serveware.do"><b>Luau Drinkware</b></a>
                </div>

                <div class="featuredPartyLink">
                    Shop all <a href="/category/theme+parties/luau+theme+party.do"><b>Luau Party Supplies</b></a>
                </div>

            </div></div>

    </div>
    <div class="clear"></div>
</div>
</div>
<div class="clear"><img width="1" height="1" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
<div id="featuredProducts">
<!-- AddThis Button BEGIN -->
<div class="SocialIcons">
    <table cellspacing="0" cellpadding="0" style="height: 32px; position: relative; top: -1px; left: -5px;" id="social_widget_table">
        <tbody><tr>
            <td>
                <div id="facebook_like_cell"  >
                    <iframe frameborder="0" style="width: 80px; height: 21px;" scrolling="no" src="https://www.facebook.com/plugins/like.php?api_key=&amp;locale=en_US&amp;sdk=joey&amp;ref=.UfE_AHDXMEk.like&amp;channel_url=http%3A%2F%2Fstatic.ak.facebook.com%2Fconnect%2Fxd_arbiter.php%3Fversion%3D25%23cb%3Df1c5fb011%26origin%3Dhttp%253A%252F%252Fwww.partycity.com%252Ff26172451c%26domain%3Dwww.partycity.com%26relation%3Dparent.parent&amp;href=<?=GetFullUrl()?>&node_type=link&amp;width=&amp;height=&amp;font=arial&amp;layout=button_count&amp;colorscheme=light&amp;action=like&amp;show_faces=false&amp;send=false&amp;extended_social_context=false"></iframe></div>
            </td>
            <td>
                <div id="pinit_cell" style="width: 80px;"></div>
            </td>
            <td>

            </td>
            <td>
                <div id="email_link_cell"><a href="mailto:?subject=Check%20this%20out%20on%20PartyCity.com!&amp;body=I%20couldn't%20wait%20to%20share%20this%20with%20you%20from%20PartyCity.com!%0A%0Ahttp%3A%2F%2Fwww.partycity.com%2Fcontent%2Fluau%2Bparty%2Bideas.do"><img border="0" src="/images/set_c/en_us/email.gif"></a></div>
            </td>
        </tr>
        </tbody></table>

    <script src="/text/partycity/p2p/detail/social_links.js" type="text/javascript"></script>
</div>


<!-- AddThis Button END -->
<div style="color:#867cda" id="relatedProductsHeader">Featured Luau Party Ideas Products</div>
<div id="productZone">
<div id="product"><div class="products">
<div class="carousel_container">
<a class="prevBtn"><img src="<?=$FullUrl?>/image_site/arrowleft-bottom.png" class="png"></a>
<div class="featuredProductCarousel" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 744px;">
<ul id="carousel_featuredProducts" style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 2242px; left: -372px;">

<li id="featuredProduct_thumb_1" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#111192','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Jointed Tiki Totem Cutout" entitytype="product" src="http://partycity3.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_tallest1?$_ml_p2p_pc_thumb_tallest1$&amp;$product=PartyCity/62627">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#111192','','','close_on_outside_click','auto');">
                        <div>
                            Jointed Tiki Totem Cutout
                        </div>
                    </a>
                </div>

                <div align="center">72in Paper Cutout</div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $5.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_2" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#159277','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Adult Warm Two-Tone Mini Hula Skirt" entitytype="product" src="http://partycity4.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_normal1?$_ml_p2p_pc_thumb_normal1$&amp;$product=PartyCity/346034">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#159277','','','close_on_outside_click','auto');">
                        <div>
                            Adult Warm Two-Tone Mini Hula Skirt
                        </div>
                    </a>
                </div>

                <div align="center"></div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $7.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_3" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#123501','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Adult Green Mini Hula Skirt" entitytype="product" src="http://partycity6.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_normal1?$_ml_p2p_pc_thumb_normal1$&amp;$product=PartyCity/207672">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#123501','','','close_on_outside_click','auto');">
                        <div>
                            Adult Green Mini Hula Skirt
                        </div>
                    </a>
                </div>

                <div align="center">31in Faux Raffia Hula Skirt</div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $6.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_4" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#181724','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Orange Soft Petal Lei" entitytype="product" src="http://partycity3.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_taller1?$_ml_p2p_pc_thumb_taller1$&amp;$product=PartyCity/430009">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#181724','','','close_on_outside_click','auto');">
                        <div>
                            Orange Soft Petal Lei
                        </div>
                    </a>
                </div>

                <div align="center">40in Fabric Lei</div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $2.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_5" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#234979','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Green Aloha Lei" entitytype="product" src="http://partycity2.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_taller1?$_ml_p2p_pc_thumb_taller1$&amp;$product=PartyCity/583938">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#234979','','','close_on_outside_click','auto');">
                        <div>
                            Green Aloha Lei
                        </div>
                    </a>
                </div>

                <div align="center">40in Fabric &amp; Tinsel Lei</div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $1.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_6" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#151894','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Margarita Sunglasses" entitytype="product" src="http://partycity6.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_normal1?$_ml_p2p_pc_thumb_normal1$&amp;$product=PartyCity/177266">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#151894','','','close_on_outside_click','auto');">
                        <div>
                            Margarita Sunglasses
                        </div>
                    </a>
                </div>

                <div align="center"></div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $6.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_7" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#151896','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Tequila Sunrise Sunglasses" entitytype="product" src="http://partycity4.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_normal1?$_ml_p2p_pc_thumb_normal1$&amp;$product=PartyCity/177270">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#151896','','','close_on_outside_click','auto');">
                        <div>
                            Tequila Sunrise Sunglasses
                        </div>
                    </a>
                </div>

                <div align="center"></div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $6.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_8" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#159286','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Rainbow Hair Clip" entitytype="product" src="http://partycity1.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_normal1?$_ml_p2p_pc_thumb_normal1$&amp;$product=PartyCity/346043">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#159286','','','close_on_outside_click','auto');">
                        <div>
                            Rainbow Hair Clip
                        </div>
                    </a>
                </div>

                <div align="center"></div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $2.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_10" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#123579','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Floral Paradise Warm Plastic Margarita Glass" entitytype="product" src="http://partycity4.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_normal1?$_ml_p2p_pc_thumb_normal1$&amp;$product=PartyCity/166294">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#123579','','','close_on_outside_click','auto');">
                        <div>
                            Floral Paradise Warm Plastic Margarita Glass
                        </div>
                    </a>
                </div>

                <div align="center">12oz Plastic Glass</div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $2.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_11" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#123495','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Floral Paradise Cool Plastic Margarita Glass" entitytype="product" src="http://partycity1.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_normal1?$_ml_p2p_pc_thumb_normal1$&amp;$product=PartyCity/166297">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#123495','','','close_on_outside_click','auto');">
                        <div>
                            Floral Paradise Cool Plastic Margarita Glass
                        </div>
                    </a>
                </div>

                <div align="center">12oz Plastic Glass</div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $2.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_12" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#123435','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Transparent Kiwi Plastic Margarita Glasses 20ct" entitytype="product" src="http://partycity1.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_taller1?$_ml_p2p_pc_thumb_taller1$&amp;$product=PartyCity/262397">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#123435','','','close_on_outside_click','auto');">
                        <div>
                            Transparent Kiwi Plastic Margarita Glasses 20ct
                        </div>
                    </a>
                </div>

                <div align="center">8oz Plastic Glasses</div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $9.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

<li id="featuredProduct_thumb_13" style="overflow: visible; float: left; width: 186px; height: 198px;">




    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody><tr>

                    <td align="center" class="imagecellbg">

                        <a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#174752','','','close_on_outside_click','auto');">
                            <img border="0" class="prdthumb" alt="Cocktail Umbrella Picks 20ct" entitytype="product" src="http://partycity3.scene7.com/is/image/PartyCity/_ml_p2p_pc_badge_normal1?$_ml_p2p_pc_thumb_normal1$&amp;$product=PartyCity/409987">
                        </a>

                    </td>

                </tr>
                </tbody></table>
        </div>

        <div class="std_PhotoGalleryThumbHeight" id="PhotoGalleryThumb">

            <div class="thumbInfo">
                <div class="thumbheader"><img width="1" height="4" border="0" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>


                <div align="center" class="thumbheader "><a href="javascript: PC_Pop('500','700','','','/multiProductAddToBasket.do?productCodes=111192,159277,123501,181724,234979,151894,151896,159286,123579,123495,123435,174752#174752','','','close_on_outside_click','auto');">
                        <div>
                            Cocktail Umbrella Picks 20ct
                        </div>
                    </a>
                </div>

                <div align="center"></div>

                <div align="center" class="thumbheader ">
                    <div class="familyShortDesc ">

                    </div>
                </div>

                <div align="center" class="thumbheader price">
                    $0.99
                </div>

            </div>
            <div class="thumbVerticalSpacer"><img width="1" height="3" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
            <div class="thumbBottom"><img width="1" height="20" src="<?=$FullUrl."/"?>/bosanpham_files/spacer01.gif"></div>
        </div>
    </div>



</li>

</ul>
</div>
<a class="nextBtn"><img src="/includes/arrowright-bottom.png" class="png"></a>
<div class="clear"></div>
</div>

</div></div>
</div>
</div>

</div>





<?php include "widget_html/more_idea.php"; ?>
<div style="padding: 0 0 1px;" id="seofooter">
    <!-- include a html file for links as per an email from Mitch -->

</div>



</div>



<script type="text/javascript" src="<?=$FullUrl?>/js_site/jcarousellite.min.js"></script>
<script type="text/javascript">
    jQuery(function () {
        jQuery("#carousel_items li").click(function () {
            jQuery("#carousel_items li img").removeClass("on");
            jQuery(this).find("img").addClass("on");
            var content_id = jQuery(this).attr("id").replace("thumb_", "");
            jQuery("#featureImage").fadeOut(400, function () {
                jQuery(this).html(jQuery("#" + content_id).find(".large_img").clone()).fadeIn()
            });
            jQuery("#product").html(jQuery("#" + content_id).find(".products").clone());
            jQuery("#content").html(jQuery("#" + content_id).find(".content").clone());
            getFeaturedProductCarousel(content_id);
        });
        var thumb_count = jQuery("#carousel_items li").length;
        var slides_visible = 3;
        if (thumb_count <= slides_visible)
        {
            jQuery(this).find(".next").addClass("disabled");
        };

        jQuery("#thumb_1").trigger("click");
        jQuery(this).find(".prev").addClass("disabled");
        jQuery(".carousel").jCarouselLite({
            btnNext: ".next",
            btnPrev: ".prev",
            circular: false,
            visible: (slides_visible)
        });
    });

    function getFeaturedProductCarousel(count){
        var featuredProduct_thumb_count = jQuery("#product #carousel_featuredProducts li").length;
        var featuredProduct_slides_visible = 4;
        if (featuredProduct_thumb_count <= featuredProduct_slides_visible)
        {
            jQuery(this).find(".nextBtn").addClass("disabled");
        };
        jQuery(this).find(".prevBtn").addClass("disabled");
        jQuery("#product .featuredProductCarousel").jCarouselLite({
            btnNext: ".nextBtn",
            btnPrev: ".prevBtn",
            circular: false,
            visible: (featuredProduct_slides_visible)
        });


    }
</script>
