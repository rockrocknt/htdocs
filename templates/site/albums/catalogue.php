<div class="index_Ce">
    <div class="header">
        <?php Template::UserControl('Header'); ?>
    </div>
    <?php
    $cat = new Categories(currentCat());
    $cat->countView();
    $relates = $cat->getRelate();
    $a = currentCat();
    ?>
    <div class="content">
        <?php

        //  var_dump($a);
        if (file_exists($a["img_topbanner"]))
        {
            ?>
            <div class="banner_center"><img width="651"   src="/<?=$a["img_topbanner"]?>"></div>
        <?php
        }
        ?>
        <?=$title_bar?$title_bar:navigationBar()?>

        <div id="one-column">

            <?php
                    global $imageList;
                    if ($imageList)
                    {
            ?>
            <div id="static-content">
                <div class="slider-wrap" style="margin-left:-10px;"></div>
                <div class="stripNavL" id="stripNavL0">
                    <a onclick="previous(); return false;" href="#">Left</a></div>

                <div class="stripNav" id="stripNav0" style="width: 4px;">
                    <ul>
                        <li class="tab1" style=""><a href="#1" class=""></a></li>
                        <li class="tab2" style=""><a href="#2" class="current"></a></li>
                    </ul>
                </div>
                <div id="slider1" class="stripViewer">
                    <div class="panelContainer" style="width: 652px; left: 0px;">
                        <div class="panel">
                            <div class="wrapper">
                                <img
                                    src="/<?=$imageList[0]['img']?>" alt=""
                                    id="bigimage"

                                    usemap="#Map2"
                                    class="image0"
                                    border="0"
                                    width="642"
                                    >
                                <map name="Map2"><area shape="rect" coords="222,369,380,406" href="">
                                    <area shape="rect" coords="484,529,507,545" href="">
                                </map>
                            </div>
                        </div>
                        <!-- .panelContainer --></div>
                    <!-- #slider1 --></div>
                <div class="stripNavR" id="stripNavR0">
                    <a href="#"
                       onclick="next_img(); return false;"
                        >
                        Right</a></div>
            </div>
            <div style="  width:642px; margin-left:-10px;margin-top:15px;">
                <ul class="sanphamhome">
                   <?php
                   $position = 0;
                        foreach ($imageList as $imgChild)
                        {
                            ?>
                            <li>
                                <a href="#" onclick="clickThumb('/<?=$imgChild['img']?>',<?=$position?>); return false;">
                                    <img id="imgthumb<?=$position?>" src="/<?=$imgChild['img']?>" alt="ttile" width="150" height="100"  />
                                </a>
                            </li>
                        <?php
                            $position++;
                        }
                    ?>
                </ul>
            </div>
                        <div style="display: none;" id="current">0</div>
                        <div style="display: none;" id="total"><?=$position?></div>
                        <script type="text/javascript">
                        function clickThumb(imgsrc,positon)
                        {
                            jQuery('#bigimage').fadeTo(300,0.30, function() {
                            $("#bigimage").attr("src",imgsrc);
                        }).fadeTo(130,1);

                            jQuery('#current').html(positon);
                        }
                            function previous()
                            {
                                var current = jQuery('#current').html();
                                current = parseInt(current) - 1;
                             //   alert(current);
                                if (current < 0)
                                {
                                    current = parseInt( jQuery('#total').html())  -1;
                                }
                                jQuery('#current').html(current);

                               var imgsrc = $("#imgthumb" + current).attr("src");

                                jQuery('#bigimage').fadeTo(300,0.30, function() {
                                    $("#bigimage").attr("src",imgsrc);
                                }).fadeTo(130,1);
                            }
                        function next_img()
                        {
                            var current = jQuery('#current').html();
                            current = parseInt(current) + 1;
                            var max = parseInt( jQuery('#total').html())  -1;
                            //  alert(current);
                            if (current > max)
                            {
                                current = 0;
                            }
                            jQuery('#current').html(current);

                            var imgsrc = $("#imgthumb" + current).attr("src");

                            jQuery('#bigimage').fadeTo(300,0.30, function() {
                                $("#bigimage").attr("src",imgsrc);
                            }).fadeTo(130,1);
                        }
                        </script>
            <?php
            }
            ?>
            <div style="clear:both;"></div>
        </div>
    </div>

</div>

<br class="clean"/>
<link href="/css/galary.css" rel="stylesheet" type="text/css" />