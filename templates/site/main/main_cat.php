<?php include "widget_html/home_slider_owl.php"; ?>
<div class="container">
    <div class="four columns onlymaxwidth767">
        <?php include "widget_html/productlist_sidebar.php"; ?>
    </div>
    <div class="twelve columns onlymaxwidth767">
        <?php
        //   include "widget_html/maincat_content.php"; ?>
        <?php include "widget_html/home_newarrival_cat.php"; ?>
    </div>
    <div class="four columns onlyminwidth768">
        <?php include "widget_html/productlist_sidebar.php"; ?>
    </div>
    <div class="twelve columns onlyminwidth768">
        <?php
        //   include "widget_html/maincat_content.php"; ?>
        <?php include "widget_html/home_newarrival_cat.php"; ?>
    </div>

</div>
<?php return; ?>

<?php // include "widget_html/home_featured.php"; ?>

<div class="container">

    <?php
    if (ismobile()){
        if (!isIpad())
        {
            ?>
            <?php include "widget_html/home_newarrival_cat.php"; ?>
            <?php
        //   include "widget_html/productlist_content.php"; ?>
            <?php include "widget_html/productlist_sidebar.php"; ?>

        <?
        }else{ //   if (!isIpad()) la iPad
            ?>
            <?php include "widget_html/productlist_sidebar.php"; ?>
            <?php include "widget_html/home_newarrival_cat.php"; ?>
            <?php
         //   include "widget_html/productlist_content.php"; ?>
        <?
        }

        ?>

    <?
    }else {
        ?>
    <div class="four columns">
        <?php include "widget_html/productlist_sidebar.php"; ?>
    </div>
    <div class="twelve columns">
        <?php
     //   include "widget_html/maincat_content.php"; ?>
        <?php include "widget_html/home_newarrival_cat.php"; ?>
    </div>
    <?
    }
    ?>


</div>



<div class="clearfix"></div>

<?php include "widget_html/home_latestarticle.php"; ?>

<script type="text/javascript">
    $( document ).ready(function() {
        $(".parallax-banner").pureparallax({
            overlayBackgroundColor: '#000',
            overlayOpacity : '0.45',
            timeout: 50
        });

        $(".parallax-titlebar").pureparallax({
            timeout: 50
        });
    });

</script>