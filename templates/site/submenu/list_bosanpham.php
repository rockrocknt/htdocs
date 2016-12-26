<?php
 global $do,$cat,$lg, $FullUrl,$catphukien;
$currentcat = currentCat();
$tempCurrent = new Categories($currentcat);
?>

<link rel="stylesheet" href="<?=$FullUrl?>/css_site/stylesheetcity.css">
<link rel="stylesheet" href="<?=$FullUrl?>/css_site/master1_bosanpham.css">
<script type="text/javascript" src="<?=$FullUrl?>/fancy215/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?=$FullUrl?>/fancy215/jquery.fancybox.css?v=2.1.5" media="screen" />
<!-- Add fancyBox - media helper (this is optional) -->
<script type="text/javascript" src="<?= $FullUrl ?>/fancy215/helpers/jquery.fancybox-media.js?v=1.0.0"></script>

<script type="text/javascript">
    $(document).ready(function() {
        /*
         *  Simple image gallery. Uses default settings
         */

        $('.fancybox').fancybox({"width":930,"height":530});

        $('.fancybox-media').fancybox({
            openEffect  : 'none',
            closeEffect : 'none',
            helpers : {
                media : {}
            }
        });

    });
    function fancyboxvideo()
    {

        $('#avideo').trigger('click');
       // alert('helo');
    }
</script>

<div class="tablecontainner" >
    <table width="990" border="0" cellpadding="0" cellspacing="0" class="mainLayoutTable" align="center">

        <tbody>
        <tr>
            <td colspan="3" class="navheaderbg">
                <div><!--TopNav Start-->

                    <link rel="stylesheet" type="text/css" href="/bosanpham_files/flatcat.css">


                    <script src="<?=$FullUrl?>/bosanpham_files/clickdisable.js"></script>

                    <script>
                        function checkKeyword(keyword, defaultText) {
                            var minKeywordLength = 0;
                            var maxKeywordLength = 0;
                            minKeywordLength += 3;
                            maxKeywordLength += 30;
                            var errMsg = '';
                            var searchTerms = '';
                            keyword.value = jQuery.trim(keyword.value);
                            searchTerms = keyword.value;
                            defaultText = "What are you looking for?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            var noSearchTerm = "Please enter a keyword or item number";
                            var shortSearchTerm = "Your keyword or item number must be at least 3 characters long";
                            if (searchTerms == defaultText) {
                                alert(noSearchTerm);
                                return false;
                            }
                            if (searchTerms == '') {
                                alert(noSearchTerm);
                                return false;
                            } else if (searchTerms.length < minKeywordLength) {
                                alert(shortSearchTerm);
                                return false;
                            } else {

                                return true;
                            }
                        }

                        function checkIfDefault(keyword) {
                            var defaultSearchTerm = "What are you looking for?&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                            if (keyword == defaultSearchTerm) {
                                return '';
                            }
                            else {
                                return keyword;
                            }
                        }

                        function searchResult(keyword) {

                            var flag = checkKeyword(keyword);

                            if (flag) {
                                hPP();
                                return true;
                            } else {
                                return false;
                            }

                        }


                    </script>


                    <script type="text/javascript">
                        /*
                         var nsAutoComplete = null;
                         jQuery(document).ready(function () {
                         // match the width of the search text field
                         var iSearchBoxWidth = jQuery('#navsearchbox').css("width").replace(/\D/g, "") / 1;
                         var widthDiff = (jQuery("#navsearchboxwrapper").width() - iSearchBoxWidth) / 2;
                         if (widthDiff % 2 != 0) widthDiff = widthDiff + 1;
                         if (widthDiff < iSearchBoxWidth) {
                         iSearchBoxWidth = jQuery("#navsearchbox").width() + widthDiff;
                         } else {
                         iSearchBoxWidth = iSearchBoxWidth + 4;
                         }

                         // init the autocomplete
                         nsAutoComplete = jQuery('#navsearchbox').autocomplete({
                         autoSubmit: true,
                         serviceUrl: '/search.do',
                         params: { action: 'ac' },
                         minChars: 3,
                         maxCharLength: 35
                         });
                         });
                         */
                    </script>

                    <script>
                        //tag_mgmt.tagAutoSuggest();
                    </script>



                </div>

                <div>
                    <!--CatNav Start-->

                    <div id="sf-menu-text-nav" pt="top_169787">


                        <!-- dhtml menu start -->
                        <script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/jquery.hoverIntent.minified.js"></script>
                        <script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/jquery.bgiframe.min.js"></script>
                        <script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/superfish.js"></script>
                        <script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/supersubs.js"></script>

                        <div class="sNavSectionDiv_2" id="top_108893">


                            <script type="text/javascript">
                                jQuery("ul.sf-menu").find("span[id^='tnc_']").each(function (i) {
                                    //jQuery(this).parents("li").css("width",jQuery(this).css("width"));
                                });

                                jQuery("ul.sf-menu").attr("id", jQuery("div#sf-menu-text-nav").attr("pt"));

                            </script>

                            <script type="text/javascript">
                                jQuery(document).ready(function ($) {

                                    jQuery("ul.sf-menu").supersubs({
                                        minWidth: 12,   // minimum width of sub-menus in em units
                                        maxWidth: 27,   // maximum width of sub-menus in em units
                                        extraWidth: 1     										// extra width can ensure lines don't sometimes turn over
                                        // due to slight rounding differences and font-family
                                    }).superfish({
                                            delay: 450,   // millisecond delay on mouseout
                                            animation: {opacity: 'show'},							// animation style
                                            speed: 1,															// animation speed
                                            autoArrows: false,                         // arrow mark-up config
                                            dropShadows: false       // drop shadow config
                                        }).find('ul').bgIframe({opacity: false});

                                    // make top cats stay 'on' when hovering over their subs
                                    jQuery("ul.sf-menu").find("a[onmouseover]").each(function (i) {
                                        jQuery(this).parents("li").find("ul:first").hover(jQuery(this).attr("onmouseover"), jQuery(this).attr("onmouseout"));
                                    });
                                });
                            </script>
                            <!-- dhtml menu end -->
                            <div style="clear:both;"></div>
                        </div>

                        <!--CatNav End--></div>
                    <div style="clear:both">
                        <!-- StoreLocator Header Search needs to be included here -->
                        <!-- start 140530-nav-banner-iframe.html -->
                        <!-- end marketlive anchor -->

                        <link rel="stylesheet" type="text/css" href="/bosanpham_files/navBanner-Styles-140710.css" title="style">

                        <div id="navBanner_img"></div>
                        <script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/140710-nav-banner-iframe-functions-pc.js"></script>
                        <a> <!-- start marketlive anchor -->
                            <!-- end 140508-nav-banner-iframe.html -->

                        </a></div>
                    <a>
                    </a></div>
            </td>
        </tr>

        <tr valign="top">

            <td width="990" class="contentbg citydirpadding" colspan="3" itemscope="" itemtype="http://schema.org/Product">
                    <?=$title_bar?$title_bar:navigationBar()?>
                    <br/>
<div>


<style>
    .cPrev, .cNext {
        height: 76px !important;
    }

    .carouselBody {
        margin: 0px !important;
    }

    #jumptosection {
        margin: 0 0 8px 0 !important;
    }
</style>

<script src="<?=$FullUrl?>/bosanpham_files/kits.js"></script>
<script src="<?=$FullUrl?>/bosanpham_files/validateProductSelection.js"></script>
<script src="<?=$FullUrl?>/bosanpham_files/createJsonElement.js"></script>
<script language="javascript">
    var noQtyMsg = "Quantity has not been entered";
    var noOptionsMsg = "Please select an available size for all Products selected";
    var isPersonalizationConfigured = false;
    var customAddToBasket = false;
</script>


<script>
    function refreshGlobalCart() {
        jQuery.get("/refreshGlobalCart.do?r=" + Math.random(), function (data) {
            jQuery("#ajaxGlobalCart").html(data);
        });
    }
    function closePP() {
        document.getElementById("popdiv").style.display = "none";
        document.getElementById("popdiv").innerHTML = "";
        py -= 1;
    }
    //SP-2011-3320:reset the quantity fields in the parent window
    function resetQTY() {
        jQuery("input[name='qty']").val("0");
        jQuery("input[name='isPersonalized']").checked == false;
    }
    function addToWishList(wishListAction) {
        var formObj = document.getElementById('mainForm');
        if (!(validateProductSelection(noQtyMsg, noOptionsMsg, formObj, 1)))
            return;

        formObj.action = wishListAction;
        formObj.submit();
    }

    // Function to display personalization message if user has selected one or more personalized products
    function addToBasket(basket_form) {

        var flag = false;
        if (basket_form.isPersonalized != undefined) {
            for (i = 0; i < basket_form.isPersonalized.length; i++) {
                if (basket_form.isPersonalized[i].checked) {
                    flag = true;
                    break;
                }
            }
        }
        else if (basket_form.isPersonalized != undefined) {
            flag = basket_form.isPersonalized.checked;
        }

        if (flag) {
            if (!isPersonalizationConfigured) {
                alert('Personalized products cannot be added to basket due to incomplete configuration.');
                return false;
            }
            else {
                //Place holder for action when user select atleast one personalized product
                //alert('You have selected an item that needs further personalization');
            }
        }
        var validateStatus = validateProductSelection(noQtyMsg, noOptionsMsg, basket_form, 1, "true");
        if (validateStatus) {
            submitJSONForm();
        }

        return false;
    }



    function setQueryStringParam(basket_form) {
        var currentLocation = location.href;
        if (currentLocation.indexOf("?") != -1) {
            var queryParam = currentLocation.substring(currentLocation.indexOf("?"));
            if (currentLocation.indexOf("#") != -1) {
                queryParam = currentLocation.substring(currentLocation.indexOf("?"), currentLocation.indexOf("#"));
            }
            if (currentLocation.indexOf("fromPage=personalization") != -1) {
                queryParam = currentLocation.substring(currentLocation.indexOf("?"), currentLocation.indexOf("&fromPage=personalization"));
            }
            basket_form.detailPageQueryParam.value = queryParam;
        }
        return validateProductSelection(noQtyMsg, noOptionsMsg, basket_form, 1);
    }
    function popopen() {
        //PC_Pop('584','700','','','','','','close_on_outside_click','auto');void(0);
    }

    function openPricePopup(priceurl, code) {
        if (priceurl.length > 0) {
            window.open(priceurl + '?productcode=' + code, '_blank', 'height=450,width=600,scrollbars=1,resizable=yes');
        } else {
            alert('Configuration for this product is incomplete. Please select some other product.');
        }
    }


</script>

<form name="addToBasketForm" method="post"  id="mainForm"><input type="hidden" name="pageCategory" value=""><input type="hidden" name="from" value="detail">
<table cellspacing="0" cellpadding="0" border="0" width="990" id="detailTable">
<tbody>
<tr>
<td>


<script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/jquery.jcarousel.min.js"></script>
<script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/jquery.cookie.js"></script>
<script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/jquery.carousel.scrollover.js"></script>
<link rel="stylesheet" type="text/css" href="/bosanpham_files/carousel_skin.css">
<script type="text/javascript">
/**
 * Store first Index of current Carousel into cookie
 * @param {int} firstIndex 1-based firstIndex
 * @return null
 */
function carousel_firstIndex_cookie(firstIndex) {
    //form cookie in the format of
    // <totalNumber>:|:<previousProductcode>:|:<previousProductPostion>:|:firstIndex
    var cookieValue = "17;;F450610;;0;;" + firstIndex;
    jQuery.cookie("carousel_firstIndex", cookieValue, {path: '/'});
}
/**
 * Recalculate real first and last item with range from 1 to carousel.option.size
 * @param {object} carousel jCarousel object
 * @param {string} formerFirstIndex firstIndex to recalculate
 * @param {string} formerLastIndex lastIndex to recalculate
 * @return object with 2 members {first,last}
 */
function carouselRecalculateIndex(totalNumber, formerFirstIndex, formerLastIndex) {
    var first = formerFirstIndex % totalNumber;
    if (first == 0) first = totalNumber
    else if (first < 0) first = totalNumber + first;
    var last = formerLastIndex; //first + carousel.options.visible - 1;
    last = last % totalNumber;
    if (last == 0) last = totalNumber;
    else if (last < 0) last = totalNumber + last;
    return {first: first, last: last};
}
/**
 * Called when carousel need to load items
 * Check whether to call AJAX to load new items
 * @param {object} carousel jCarousel object
 * @param {string} state carousel navigation type(init, next, prev)
 * @return null
 */
function product_detail_itemLoadCallback(carousel, state) {

    //Arrows clicked Omniture event raised for state != init
    if (state != "init")
        arrowsClickTracking();

    //get normal first and last index
    var oFirstLast;
    var realSize;
    if (state != "init" && carousel.options.realFirst) {
        carousel.options.realFirst = carousel.options.realFirst + (carousel.first - carousel.prevFirst);
    }
    if (carousel.options.realTotalNumber) {
        realSize = carousel.options.realTotalNumber;
        oFirstLast = carouselRecalculateIndex(realSize, carousel.options.realFirst, carousel.options.realFirst + carousel.options.visible - 1);
        carousel.options.realFirst = oFirstLast.first;
    }
    else {
        realSize = carousel.options.size;
        oFirstLast = carouselRecalculateIndex(realSize, carousel.first, carousel.last);
    }
    var first = oFirstLast.first;
    var last = oFirstLast.last;
    //Store first Index in cookie
    carousel_firstIndex_cookie(first);
    // if carousel size is small, return.
    if (realSize <= carousel.options.visible)
        return;
    // whether carousel load just one time at Init
    var loadOneTime = (realSize <= carousel.options.visible * 3);
    // whether to load the Left Set
    var loadLeftSet = false;
    // whether to load the Right Set
    var loadRightSet = false;
    // in the init state, load both Left Set and Right Set
    if (state == 'init') {
        if (loadOneTime) {
            if (first > 1)
                window.setTimeout("product_detail_makeRequest(" + 1 + "," + (first - 1) + ")", 100);
            if (last < realSize)
                window.setTimeout("product_detail_makeRequest(" + (last + 1) + "," + realSize + ")", 100);
            return;
        }
        loadLeftSet = true;
        loadRightSet = true;
    }
    else {
        //calculate to load in advance Left or Right set
        if (carousel.prevFirst < carousel.first) {
            loadRightSet = true;
            if (carousel.options.wrap != 'circular')
                removeSet(carousel, 'left');
        }
        else {
            loadLeftSet = true;
            if (carousel.options.wrap != 'circular')
                removeSet(carousel, 'right');
        }
    }
    //load Left Set
    if (loadLeftSet) {
        var lastLoad = first - 1;
        var firstLoad = lastLoad - carousel.options.visible + 1;
        //Loading is full and in straight order
        if (firstLoad >= 1) {
            window.setTimeout("product_detail_makeRequest(" + firstLoad + "," + lastLoad + ")", 100);
        }
        else {
            //Loading is not full but in straight order
            if (lastLoad >= 1)
                window.setTimeout("product_detail_makeRequest(" + 1 + "," + lastLoad + ")", 100);
            //Loading is full and includes circular curve.
            if (carousel.options.wrap == 'circular')
                window.setTimeout("product_detail_makeRequest(" + (firstLoad + realSize) + "," + realSize + ")", 100);
        }
    }
    //load Right Set
    if (loadRightSet) {
        var firstLoad = last + 1;
        var lastLoad = firstLoad + carousel.options.visible - 1;
        //Loading is full and in straight order
        if (lastLoad <= realSize) {
            window.setTimeout("product_detail_makeRequest(" + firstLoad + "," + lastLoad + ")", 100);
        }
        else {
            //Loading is not full but in straight order
            if (firstLoad <= realSize)
                window.setTimeout("product_detail_makeRequest(" + firstLoad + "," + realSize + ")", 100);
            //Loading is full and includes circular curve.
            if (carousel.options.wrap == 'circular')
                window.setTimeout("product_detail_makeRequest(" + 1 + "," + (lastLoad - realSize) + ")", 100);
        }
    }
}
/**
 * Called to remove redundant data from fixed set carousel
 * @param {object} carousel jCarousel object
 * @param {string} direction type of remove (left, right)
 * @return null
 */
function removeSet(carousel, status) {
    var first;
    var last;
    if (status == 'left') {
        last = carousel.first - carousel.options.visible - 1;
        if (last < 1)
            return;
        first = last - carousel.options.visible + 1;
        if (first < 1)
            first = 1;
    }
    else {
        first = carousel.last + carousel.options.visible + 1;
        if (first > carousel.options.size)
            return;
        last = first + carousel.options.visible - 1;
        if (last > carousel.options.size)
            last = carousel.options.size;
    }
    for (var i = first; i <= last; i++) {
        carousel.remove(i);
        jQuery("#product_detail_carousel_rollover_" + i).remove();
    }
}
/**
 * Called to make AJAX request
 * @param {object} carousel jCarousel object
 * @param {first} index of first Item
 * @param {last} index of last Item
 * @return null
 */
function product_detail_makeRequest(first, last) {
    var carousel = jQuery('#product_detail_carousel').data('jcarousel');
    //lock carousel
    carousel.lock();
    //if current Index in is range, only call AJAX to the item before current Index
    //form AJAX url
    var url = "/carousel/productdetail.do?first=" + first + "&last=" + last + "&curIndex=0";
    //form different AJAX url based on search result data source or category data source

    url += "&code=F450610&sortby=";

    url += "&navSet=169975";

    //call AJAX request
    jQuery.ajax({
        'url': url,
        'complete': function (originalRequest) {
            //    product_detail_itemAddCallBack(carousel, originalRequest, first, last);
        }});
}

/**
 * This function is called back after a successful AJAX calling.
 * @param {object} carousel jCarousel object
 * @param {object} originalRequest AJAX obj request.
 * @param {first} index of first Item
 * @param {last} index of last Item
 * @return null
 */
function product_detail_itemAddCallBack(carousel, originalRequest, first, last) {
    //split between 2 parts: thumbnail item and roll-over thumbnail item
    var arrHtml = originalRequest.responseText.split("<!-- CarouselRollOver Break -->");
    //split to break down thumbnail items
    var arrThumbItems = arrHtml[0].split("<!-- Carousel Break -->");
    //split to break down roll-over thumbnail item
    var arrRollOver = (typeof(arrHtml[1]) != "undefined") ? arrHtml[1].split("<!-- RollOver Break -->") : [];
    //if realFirst exists, recalculate real first variable,
    //last variable is not used in this function
    if (carousel.options.realFirst) {
        //first and realFirst is in the middle of list
        if (Math.abs(first - carousel.options.realFirst) <= carousel.options.visible)
            first = carousel.first + first - carousel.options.realFirst;
        //realFirst is at the beginning of the list and first at the end
        else if (Math.abs(carousel.options.realTotalNumber - first + 1) <= carousel.options.visible)
            first = carousel.first + (first - carousel.options.realTotalNumber) - carousel.options.realFirst;
        //Real First is at the end of the list and first is at the beginning.
        else if (Math.abs(first) <= carousel.options.visible)
            first = carousel.first + (carousel.options.realTotalNumber - carousel.options.realFirst) + first;
        first = carouselRecalculateIndex(carousel.options.size, first, first + carousel.options.size - 1).first;
    }
    //unlock carousel
    carousel.unlock();
    //loop to fill data into thumbnail item
    for (var j = 0; j < arrThumbItems.length; j++) {
        html = arrThumbItems[j];
        if (jQuery.trim(html) != '') {
            if (first + j <= carousel.options.size)
                carousel.add(first + j, html);
            else
                carousel.add(first + j - carousel.options.size, html);
        }
    }


    //loop to fill data into roll-over thumbnail item
    for (var k = 0; k < arrRollOver.length; k++) {
        html = arrRollOver[k];
        var index;
        if (first + k <= carousel.options.size)
            index = first + k;
        else
            index = first + k - carousel.options.size;
        if (jQuery.trim(html) != '') {
            if (jQuery("#product_detail_carousel_rollover_" + index).length == 0) {
                var div = jQuery("<div id=product_detail_carousel_rollover_" + index + "></div>")
                div.html(html);
                jQuery("#product_detail_carousel_rollover").append(div);
            }
            else {
                jQuery("#product_detail_carousel_rollover_" + index).html(html);
            }
        }
    }
    //attach magnifier script into carousel
    //  jQuery('#product_detail_carousel_manifier').attachMagnifier(carousel.options.size);


}

/**
 * show pagination message
 * @param {object} carousel jCarousel object
 * @return null
 */
function paggingFixedSetDisplay(carousel) {
    var first = parseInt(carousel.first);
    var size = parseInt(carousel.options.size);
    var visible = parseInt(carousel.options.visible);
    var last = first;
    if (size <= visible)
        last = size;
    else
        last = first + visible - 1;
    var paggingMessage = 'showing ' + first + '-' + last + ' of 17';
    jQuery('#fix_set_reference').html(paggingMessage);
}
//jCarousel has problem in handling window resize in endless case.
//on Chrome browser window.resize called 2 times. This variable used to handle this
var retainULLeftRight_running = false;
/**
 * Retain left and right css property for UL tag in carousel
 * This function used to handle problem in jCarousel with window.resize
 * @return null
 */
function retainULLeftRight() {
    //if the function is running, dont run it.
    if (retainULLeftRight_running)
        return;
    retainULLeftRight_running = true;
    //get left and right css property of UL tag and call resetLeftBorder with a Timout to reset it later
    //we need timeout here because jCarousel will reset left and right css property right after this function called
    var contextMain = jQuery("#product_detail_carousel");
    var ulMain = contextMain.find("ul");
    window.setTimeout("resetLeftBorder('" + ulMain.css("left") + "','" + ulMain.css("right") + "')", 100);
}
/**
 * Restore left and right css property for UL tag in carousel
 * This function used to handle problem in jCarousel with window.resize
 * @param {int} left css left Index
 * @param {int} right css right Index
 * @return null
 */
function resetLeftBorder(left, right) {
    var contextMain = jQuery("#product_detail_carousel");
    var ulMain = contextMain.find("ul");
    ulMain.css("left", left);
    ulMain.css("right", right);
    retainULLeftRight_running = false;
}
//if document is ready, call to build carousel
jQuery(document).ready(function () {
    jQuery('#product_detail_carousel').attr("style", "display:block;");
    jQuery('#product_detail_carousel').jcarousel({
        visible: 7,

        size: 17,
        start: 1,
        offset: 1,

        wrap: 'circular',

        scroll: 7,
        itemLoadCallback: product_detail_itemLoadCallback
    });


    //attach magnifier script into carousel
    // gan zoom.
    jQuery('#product_detail_carousel_manifier').attachMagnifier(17);


    //attach window.resize for handle problem in jCarousel with window.resize
    jQuery(window).unbind("resize").bind("resize", retainULLeftRight);

    jQuery('.jcarousel-next-horizontal').mouseover(function (event) {
        jQuery('#product_detail_carousel_manifier').attr("style", "display:none;");
    });
    jQuery('.jcarousel-prev-horizontal').mouseover(function (event) {

        jQuery('#product_detail_carousel_manifier').attr("style", "display:none;");
        // jQuery('#product_detail_carousel_manifier').attr("style", "display:block;top:122px;");
    });

});


/**
 * Send Omniture report in the case of arrows clicked
 * @return null
 */
function arrowsClickTracking() {
    if (typeof(parseOmnitureJSON) != "undefined") {
        var categoryName = "Root Item Category for Site: PartyCity:Categories:Birthday Party Supplies:Birthday Balloons:Happy Birthday Balloons";
        if ("" != categoryName) {
            var s = s_gi(getId());
            parseOmnitureJSON({"eVar43": categoryName});
            var oNewJSON = {"events": {"event71": null}};
            parseOmnitureJSON(oNewJSON);
            s.linkTrackEvents = "event71";
            s.linkTrackVars = "eVar43,events";
            s.tl(true, 'o', "CarouselArrowClick");
        }
    }
}

</script>
<!-- IE6 has error on showing div tags with position as relative that then moved from one position to another -->
<!-- .thumbcontainer class that declared with relative position causes this problem -->
<!-- in case of this .thumbcontainer only used product detail page, fix it by redefine .thumbcontainer -->
<style>
    .thumbcontainer {
        position: static;
        text-align: left;
    }
</style>

<div id="engage"></div>


<div class=" jcarousel-skin-tango none">
    <div id="product_detail_carousel" class="jcarousel-container jcarousel-container-horizontal"
         style="display: none; position: relative;" align="left">
        <div class="jcarousel-clip jcarousel-clip-horizontal" style="overflow: hidden; position: relative;">
            <ul class="jcarousel-list jcarousel-list-horizontal"
                >
                <?php
                for($i=1;$i<0;$i++)
                {
                    ?>

                    <li class="jcarousel-item jcarousel-item-horizontal jcarousel-item-<?=$i?> jcarousel-item-<?=$i?>-horizontal"
                        jcarouselindex="1"
                        >
                        <div id="PhotoGalleryProd">


                            <div align="center" class="thumbcontainer imgdiv-carousel-selected">
                                <table border="0" cellspacing="0" cellpadding="0">
                                    <tbody>
                                    <tr>

                                        <td align="center" class="imagecellbg">

                                            <a href="/product/time+party+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                                                <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge" entitytype="family"
                                                     alt="A Time to Party Birthday Balloons" border="0" class="prdthumb"
                                                     onclick="javascript:disableUrl(&#39;/product/time+party+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                                            </a>

                                        </td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
                                <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
                            </div>
                        </div>


                    </li>

                <?
                }
                ?>

            </ul>
        </div>
        <div class="jcarousel-prev jcarousel-prev-horizontal jcarousel-prev-disabled jcarousel-prev-disabled-horizontal"
             disabled="true" style="display: block;"></div>
        <div class="jcarousel-next jcarousel-next-horizontal jcarousel-next-disabled jcarousel-next-disabled-horizontal"
             disabled="true" style="display: block;"></div>
    </div>
</div>


<div id="product_detail_carousel_rollover" style="display:none">

<div id="product_detail_carousel_rollover_1">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/time+party+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="/upload_site/_ml_p2p_pc_carousel_badge.jpg" entitytype="family"
                                 alt="A Time to Party Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/time+party+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>

<div id="product_detail_carousel_rollover_2">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/party+on+balloon.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(18)" entitytype="family"
                                 alt="Party On Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/party+on+balloon.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>

<div id="product_detail_carousel_rollover_3">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/year+to+celebrate+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(19)" entitytype="family"
                                 alt="A Year to Celebrate Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/year+to+celebrate+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>

<div id="product_detail_carousel_rollover_4">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/blitz+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(20)" entitytype="family"
                                 alt="Blitz Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/blitz+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>

<div id="product_detail_carousel_rollover_5">

    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/birthday+fever+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(21)" entitytype="family"
                                 alt="Birthday Fever Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/birthday+fever+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>

    <script language="javascript">
        function disableUrl(imageurl) {
            jQuery('#engage').show();
            document.location = imageurl;
        }
    </script>

</div>

<div id="product_detail_carousel_rollover_6">

    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/fun+happy+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(22)" entitytype="family"
                                 alt="Fun Happy Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/fun+happy+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>

    <script language="javascript">
        function disableUrl(imageurl) {
            jQuery('#engage').show();
            document.location = imageurl;
        }
    </script>

</div>

<div id="product_detail_carousel_rollover_7">

    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/oh+so+fabulous+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(23)" entitytype="family"
                                 alt="Oh So Fabulous Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/oh+so+fabulous+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>

    <script language="javascript">
        function disableUrl(imageurl) {
            jQuery('#engage').show();
            document.location = imageurl;
        }
    </script>

</div>

<div id="product_detail_carousel_rollover_8">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/another+year+of+fabulous+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(24)" entitytype="family"
                                 alt="Another Year of Fabulous Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/another+year+of+fabulous+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_9">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/dots+stripes+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(25)" entitytype="family"
                                 alt="Dots &amp; Stripes Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/dots+stripes+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_10">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/sweet+stuff+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(26)" entitytype="family"
                                 alt="Sweet Stuff Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/sweet+stuff+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_11">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/perfect+time+party+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(27)" entitytype="family"
                                 alt="Perfect Time to Party Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/perfect+time+party+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_12">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/party+streamers+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(28)" entitytype="family"
                                 alt="Party Streamers Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/party+streamers+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_13">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/birthday+star+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(29)" entitytype="family"
                                 alt="Birthday Star Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/birthday+star+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_14">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/happy+birthday+mom+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(30)" entitytype="family"
                                 alt="Happy Birthday Mom Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/happy+birthday+mom+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_15">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/celebration+streamers+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(31)" entitytype="family"
                                 alt="Celebration Streamers Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/celebration+streamers+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_16">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/holographic+star+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(32)" entitytype="family"
                                 alt="Holographic Star Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/holographic+star+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
<div id="product_detail_carousel_rollover_17">
    <div id="PhotoGalleryProd">


        <div align="center" class="thumbcontainer">
            <table border="0" cellspacing="0" cellpadding="0">
                <tbody>
                <tr>

                    <td align="center" class="imagecellbg">

                        <a href="/product/boa+heart+happy+birthday+balloons.do?sortby=ourPicks&size=all&carousel=true&navSet=169975">

                            <img src="<?=$FullUrl?>/bosanpham_files/_ml_p2p_pc_carousel_badge(33)" entitytype="family"
                                 alt="Boa Heart Happy Birthday Balloons" border="0" class="prdthumb"
                                 onclick="javascript:disableUrl(&#39;/product/boa+heart+happy+birthday+balloons.do?sortby=ourPicks&amp;size=all&amp;carousel=true&amp;navSet=169975&#39;)">

                        </a>

                    </td>

                </tr>
                </tbody>
            </table>
        </div>

        <div id="PhotoGalleryThumb" class="std_PhotoGalleryThumbHeight">
            <div class="thumbBottom"><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20"></div>
        </div>
    </div>


</div>
</div>
<div id="product_detail_carousel_manifier" style="display: none; ">
    <div class="magnifierContent"></div>
</div>

<script>
    /*
     if (isTouchDevice) {
     jQuery(document).ready(function () {
     window.setTimeout(jQuery('#tHolder').scrollTo("#tHolder .imgdiv-carousel-selected img.unveil"), 10);
     });
     } else {
     jQuery("#tCarousel").remove();
     }
     */
</script>

</td>
</tr>
<tr valign="top">
    <td width="990"><a name="top"></a>
        <table cellspacing="0" cellpadding="0" border="0">
            <tbody>
            <tr valign="top">

                <td rowspan="2">

                    <img id="largeImage"
                         width="610"
                         src="<?=$FullUrl?>/<? echo $currentcat["img_topbanner"]; ?>" border="0" alt="">

                    <!-- <img src="/images/set_c/en_us/local/page_specific/family_horiz/440333F.jpg" border="0"> -->
                </td>

                <td class="FamilyName">

                    <h1><? echo $currentcat["name_".$lg]; ?></h1>

                    <div><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="5" border="0"></div>

                    <div id="customTDesc" class="std_CFDetPaddingLeft">
                        <? echo strip_tags($currentcat["short_".$lg]); ?>
                    </div>
                </td>
            </tr>
            <tr>


                <script language="javascript">
                    function hexToR(h) {
                        return parseInt((cutHex(h)).substring(0, 2), 16)
                    }
                    function hexToG(h) {
                        return parseInt((cutHex(h)).substring(2, 4), 16)
                    }
                    function hexToB(h) {
                        return parseInt((cutHex(h)).substring(4, 6), 16)
                    }
                    function cutHex(h) {
                        return (h.charAt(0) == "#") ? h.substring(1, 7) : h
                    }
                    R = hexToR("#0E0405");
                    G = hexToG("#0E0405");
                    B = hexToB("#0E0405");
                </script>


                <td class="std_CFDetPaddingLeft">
                    &nbsp;
                    <?php

                    $banner_nho = ImagesGroup::getImagesByCid($currentcat['id'],2,0);
                    //var_dump($banner_nho);
                    if (isset($banner_nho[0]['img_vn']))
                    {
                      //  echo $banner_nho[0]['img_vn'];
                        if (file_exists($banner_nho[0]['img_vn']))
                        { ?>
                            <?php
                            if ($banner_nho[0]['youtube_url'] == "")
                            {?>
                                <a href="<?php echo ImagesGroup::getLink($banner_nho[0]['url_vn']); ?>">
                                <img   src="<?=$FullUrl?>/<?=$banner_nho[0]['img_vn']?>"

                                    />
                                </a>
                        <?}else{
                        ?>
                        <img   src="<?=$FullUrl?>/<?=$banner_nho[0]['img_vn']?>"
                                   usemap="#more_ideas_map"
                            />
                                <?php } ?>

                            <a  class="fancybox-media"
                                id="avideo"
                                href="<? echo  $banner_nho[0]['youtube_url']; ?>">
                                                            </a>
                            <map name="more_ideas_map" id="more_ideas_map">
                                <area shape="rect" coords="1,35,157,154"

                                      href="javascript:fancyboxvideo();"
                                      alt="Watch the Minnie Mouse Party Ideas Video"
                                      title="Watch the Minnie Mouse Party Ideas Video">
                                <area shape="rect" coords="156,35,317,154"
                                      href="<? echo ImagesGroup::getLink($banner_nho[0]['url_vn']); ?>">
                            </map>
                        <?}

                    }
                    ?>
                </td>


            </tr>
            </tbody>
        </table>


        <div>
            <table cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>


                </tr>
                </tbody>
            </table>
        </div>
        <div><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="10" border="0"></div>


    </td>
</tr>
<tr>
    <td colspan="3">
        <div align="right">


        </div>
    </td>
</tr>
<tr>
<td colspan="3" align="center">
<div>
<script type="text/javascript">
    <!--
    var dnsp = true;
    var displayQtyHeader = true;
    //-->
</script>
<script>
    function seePriceListPopUp(priceurl, productPk) {
        if (priceurl.length > 0) {
            window.open(priceurl + '?prodID=' + productPk, '_blank', 'height=450,width=600,scrollbars=1,resizable=yes');
        } else {
            alert('Configuration for this product is incomplete. Please select some other product.');
        }
    }
</script>
<script>
    var initializeContinuityMethod = "";

    function tealiumPDPAddToBasketSource() {
        sessionStorage.setItem("quickViewSource", "pdpFamily");
        sessionStorage.setItem("quickViewSourceData", "F450610F:A Time to Party Birthday Balloons");
    }


    //New swatch code *******************
    //***********************************
    var st = false;	// defining FALSE
    // this will be true once the JSON is available

    function showSwatch(sDiv) {
        if (st) {
            //debugger;
            switchSwatch(sDiv);
        }
    }

    function hideSwatch(sDiv) {
        if (st) {
            //debugger;
            var dEle = jQuery(sDiv);
            var pID = dEle.attr("pgroupId");		//GroupID
            var pinID = jQuery("DIV[groupid='" + pID + "'] DIV[sref]").attr("sref");
            switchSwatch(sDiv, pinID);
        }
    }

    function pinSwatch(sDiv) {
        var dEle = jQuery(sDiv);
        switchSwatch(dEle);
        var pID = dEle.attr("pgroupId");		//GroupID
        var sID = dEle.attr("swatch");			//SwatchID
        jQuery("DIV[groupid='" + pID + "'] DIV[sref]").attr("sref", sID);
        jQuery("DIV[groupid='" + pID + "'] .qveThumbnail").attr("url", swatchOBJS["group_" + pID]["swatchs_" + sID].epqvURL);
    }
    function switchSwatch(sDiv, pinID) {
        var dEle = jQuery(sDiv);
        var pID = dEle.attr("pgroupId");		//GroupID
        var sID = dEle.attr("swatch");			//SwatchID
        if (pinID)sID = pinID;
        var jSwatch = swatchOBJS["group_" + pID]["swatchs_" + sID];
        var pDiv = jQuery("DIV[groupid='" + pID + "']");
        //Product image change
        pDiv.find(".qveThumbnail img").attr("src", jSwatch.scene7URL);
        //Swatch image change
        pDiv.find("DIV[swatch]").each(function () {
            var str = jQuery(this).find("img").first().attr('src');
            if (jQuery(this).attr("swatch") == sID) {
                jQuery(this).find("img").first().attr("src", str.replace('_off', '_on'));
            }
            else {
                jQuery(this).find("img").attr("src", jQuery(this).find("img").first().attr('src').replace('_on', '_off'));
            }
        });
        //Product name change
        pDiv.find(".familyPname").html(jSwatch.name);
        //Memberdescription change
        pDiv.find("#familyMemberDesc").html('<div class="hDetailThumbTextCity familyMemberDesc" align="center">' + jSwatch.memberDescription + '</div>');
        //Special shipping
        if (jSwatch.isSpecialShipping) {
            pDiv.find("#ssShipping").html('<div class=shippingByAir style="color:#F9373E;font-size:14px;">Ground Shipping Only</div>');
        }
        else {
            pDiv.find("#ssShipping").html('');
        }
        //SKU change
        pDiv.find("#spCode").html('<div class="tablesaveditem hDetailThumbTextCity" align="center">SKU: ' + jSwatch.code + '</div>');
        //Short Decription
        if (jSwatch.shortDescription) {
            pDiv.find("#sshortDesc").html('<div  class="hDetailThumbTextCity familyShortDesc" align="center">' + jSwatch.shortDescription + '</div>');
        }
        else {
            pDiv.find("#sshortDesc").html('');
        }
        //Pricing
        //On Sale
        if (jSwatch.price.onSale) {
            pDiv.find("#spricing").html('<span class="messagewas">MSRP: </span><span class="pricewas">' + jSwatch.price.maxPrice + '</span><br><span class="messagesale">Our Price: </span><span class="pricesale" itemprop="price">' + jSwatch.price.maxSalePrice + '</span>');
        }
        //Is Was Price
        else if (jSwatch.price.isWasIs) {
            pDiv.find("#spricing").html('<span class="messagewas">MSRP: </span><span class="pricewas">' + jSwatch.price.maxPrice + '</span><br><span class="messagesale">Our Price: </span><span class="pricesale" itemprop="price">' + jSwatch.price.maxSalePrice + '</span>');
        }
        //Normal
        else {
            pDiv.find("#spricing").html('<span itemprop="price">' + jSwatch.price.maxPrice + '</span>');
        }
        //End Pricing


        //Quantity field display
        if (!jQuery('#sQTY_' + sID).length) {
            var qtyHTML = '<input type="hidden" name="selectedKitItems" id="selectedKitItems_main_' + sID + '" value=""><input type="hidden" name="productPk" value="' + sID + '"><div class="divQty"> <input type="hidden" name="optionTypes" value="0"><input type="hidden" name="option" id="optionTypeValues_' + sID + '" value="none"><div class="tableitem hDetailThumbTextCityQtyleft" id="qtywidth" align="right">Quantity <span class="bdQtyField"><a href="javascript:;" onclick="javascript:bdQty.decrease(event);">-</a><input type="number" autocomplete="off" min="0" max="999" name="qty" value="0" size="3" maxlength="3" onfocus="javascript:bdQty.inFocus(event);" onblur="javascript:bdQty.outFocus(event);" onchange="if (this.value == \'\') this.value = 0;"><a href="javascript:;" onclick="javascript:bdQty.increase(event);">+</a></span></div><div class="sectionAddtoBasket"><input type="image" id="' + jSwatch.code + '" onclick="setProductParam(this.id)" name="addToBasket" alt="Add to Basket" src="/images/set_c/en_us/local/localbuttons/addtobasket_btn1.gif" border="0"></div><div class="clr"></div> </div>';
            pDiv.find("#sQTY>SPAN").hide();
            pDiv.find("#sQTY").append('<span id="sQTY_' + sID + '">' + qtyHTML + '</span>').show();
        }
        else {
            pDiv.find("#sQTY>SPAN").hide();
            jQuery('#sQTY_' + sID).show();
        }

    }

    function openExtSwatch(plus) {
        var plusDiv = jQuery(plus);
        var ext = plusDiv.siblings(".extSwatches").eq(0);
        //var sOBJ=window["swatch_"+jQuery(this).attr("pgroupid")];
        var trPare = plusDiv.closest("tr");
        var allSCTR = trPare.find(".swatchesContainer");
        var allESTR = trPare.find(".extSwatches");
        var allFATR = trPare.find("#FamilyAlign");
        var h = 23;
        var H = 160;

        var on = false;

        if (ext.is(':visible')) {
            ext.css("display", "none");
            plusDiv.find("IMG").attr("src", plusDiv.find("IMG").attr('src').replace('swatch_view_more_off.gif', 'swatch_view_more_on.gif'));
            allESTR.each(function () {
                if (jQuery(this).is(":visible"))on = true;
            })
            if (on) {
                allSCTR.each(function () {
                    jQuery(this).css("height", "auto");
                    if (jQuery(this).innerHeight() > h)h = jQuery(this).innerHeight();
                })
                allSCTR.css("height", h);
                allFATR.css("height", H + h);
            }
            else {
                allSCTR.css("height", "auto");
                allFATR.css("height", H);
            }
        }
        else {
            ext.css("display", "block");
            plusDiv.find("IMG").attr("src", plusDiv.find("IMG").attr('src').replace('swatch_view_more_on.gif', 'swatch_view_more_off.gif'));
            allSCTR.each(function () {
                jQuery(this).css("height", "auto");
                if (jQuery(this).innerHeight() > h)h = jQuery(this).innerHeight();
            })
            allSCTR.css("height", h);
            allFATR.css("height", H + h);
        }
    }

</script>
<script src="<?=$FullUrl?>/bosanpham_files/options.js"></script>
<style>
    #jumptosection {
        background-color: #cfcdcd;
        text-align: left;
        margin: 8px 0;
    }

    #jumptolinks {
        padding: 5px;
        border-left: 1px solid #0E0405;
        margin-left: 166px;
    }

    ul.optionList li a:hover {
        color: #0E0405;
        text-decoration: underline;
    }

    h2, .h2 {
        background-color: #ED008C;
        margin: 0;
        padding: 5px 10px 3px;
        color: #FFFFFF;
        font-weight: bold;
    }

    .headingTXTMarker {
        position: absolute;
        margin-top: -25px;
    }

    .headingTXT {
        font-size: 20px;
        text-transform: uppercase !important;
    }

</style>

<table width="990" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>

    <td width="380">
        <table id="social_widget_table" cellpadding="0" cellspacing="0"
               style="height: 32px; position: relative; top: -1px; left: -5px;">
            <tbody>
            <tr>
                <td>
                    <div id="facebook_like_cell" style="width: 80px; padding-top: 2px;">

                    </div>
                </td>
                <td>
                    <div id="pinit_cell" style="width: 80px;"><a
                            class="PIN_1405410722140_pin_it_button_20 PIN_1405410722140_pin_it_button_en_20_gray PIN_1405410722140_pin_it_button_inline_20 PIN_1405410722140_pin_it_beside_20"
                            data-pin-href="//www.pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.partycity.com%2Fproduct%2Ftime%2Bparty%2Bbirthday%2Bballoons.do&amp;media=http%3A%2F%2Fpartycity4.scene7.com%2Fis%2Fimage%2FPartyCity%2FF450610F_full%3F%24_ml_p2p_pc_family%24&amp;guid=pHbMZqD9knEa-0&amp;description=A%20Time%20to%20Party%20Birthday%20Balloons%20-%20Party%20City"
                            data-pin-log="button_pinit" data-pin-config="beside"><span
                                class="PIN_1405410722140_pin_it_button_count"
                                id="PIN_1405410722140_pin_count_0"><i></i></span></a></div>
                </td>
                <td>
                    <div id="google_plus_cell" style="width: 80px;">

                    </div>
                </td>
                <td>
                    <div id="email_link_cell">
                        <a
                            href="mailto:?subject=Check%20this%20out%20on%20PartyShop.vn!&body=I%20couldn%27t%20wait%20to%20share%20this%20with%20you%20from%20PartyShop.vn!%0A%0A<?php echo GetFullDomain(); ?>"><img
                                src="<?=$FullUrl?>/bosanpham_files/email.gif" border="0"></a></div>
                </td>
            </tr>
            </tbody>
        </table>
        <script type="text/javascript" src="<?=$FullUrl?>/bosanpham_files/social_links.js"></script>
    </td>

    <td align="right" width="610">
        <div id="jumptosection">
            <div id="jumpto">
                <div id="jumptoheading"><?=danhmucsanpham?></div>
                <div id="jumptolinks">
                    <ul class="optionList">
                        <?php $listChild = $tempCurrent->getChilds();
                        for ($i = 0; $i < count($listChild); $i++) {
                        if (isset($listChild[$i])) {
                        $item = $listChild[$i];
                        ?>
                        <li>
                            <a href="#<?= $item["unique_key_" . $lg] ?>"><?= $item["name_" . $lg] ?></a>
                        </li>
                        <?
                        }
                        }
                        ?>

                    </ul>
                    <div class="product_section"><!--  --></div>
                </div>
            </div>
            <div class="product_section"><!--  --></div>
        </div>
    </td>
</tr>
<? for ($i = 0; $i < count($listChild); $i++) {
if (isset($listChild[$i])) {

$item = $listChild[$i];
//$listProduct = products::getbycid($item['id']);
$listProduct = products::getbycid_phu($item['id']);
if ($listProduct){
?>
<tr>
<td colspan="2" align="left">

          <div class="h2" style="background-color: <?=$item['bgcolor_code']?>"><a href="#top"
                           class="backtotop">Back to top</a><a name="<?= $item["unique_key_" . $lg] ?>" class="headingTXTMarker"></a><span
                class="headingTXT"><?= $item["name_" . $lg] ?></span></div>
        <div style="height:14px">
            <img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="14" border="0"></div>





</td>
</tr>
    <tr><td colspan="2" align="left">
<?
    // show san pham

  //  $listProduct = products::getbycid($item['id']);
//    $listProduct = products::getbycid_phu($item['id']);
    include "widget_html/5productsArow.php";



} //ìf ($listProduct){

}// for ($i = 0; $i < count($listChild); $i++) {
}
?>



        </td></tr>
</tbody>
</table>

</div>
</td>
</tr>
<tr>
    <td colspan="3" align="right">

        <div align="right">
            <table cellspacing="0" cellpadding="0" border="0">
                <tbody>
                <tr>
                </tr>
                </tbody>
            </table>
        </div>
    </td>
</tr>
<tr>
    <td colspan="3" align="center">
        <div><img src="<?=$FullUrl?>/bosanpham_files/spacer01(1).gif" width="1" height="20" border="0"></div>
    </td>
</tr>


<script>
    var topBasketButton = document.getElementById('addToBasketTop');
    var bottomBasketButton = document.getElementById('addToBasketBottom');

    if (customAddToBasket) {
        if (topBasketButton != null) {
            topBasketButton.src = '/images/set_c/en_us/local/localbuttons/addbasketcustomize.gif';
        }
        if (bottomBasketButton != null) {
            bottomBasketButton.src = '/images/set_c/en_us/local/localbuttons/addbasketcustomize.gif';
        }
    }
    else {
        if (topBasketButton != null) {
            topBasketButton.src = '/images/set_c/en_us/local/localbuttons/addtobasket_btn.gif';
        }
        if (bottomBasketButton != null) {
            bottomBasketButton.src = '/images/set_c/en_us/local/localbuttons/addtobasket_btn.gif';
        }
    }
</script>


</tbody>
</table>


<input type="hidden" name="detailPageQueryParam" value="">
<input type="hidden" name="productCodeParam" value="">
</form>
<script>
    //var addPRD="";
    var addPRD = "" + sessionStorage.getItem("selectedFamilyProductCode");
    if (addPRD.indexOf("lastAdded") != -1) {
        jQuery(document).ready(function () {
            window.scrollTo(0, jQuery(addPRD).offset().top - 20);
        });
    }
    sessionStorage.removeItem("selectedFamilyProductCode");
</script>


<script>
    function setA2BSource() {
        sessionStorage.setItem("templateName", "FAMILY");
        sessionStorage.setItem("familyCode", "F450610F");
        var a2bSource = "Family" + "|" + tag_mgmt.udo_json.page_id + "|" + tag_mgmt.udo_json.concatenated_page_name;
        document.getElementById('addToBasketSourceData').value = a2bSource;
    }
</script>
</div>

</td>

</tr>

<tr valign="bottom">
<td align="center" colspan="3" class="navfooterbg"><!--BottomNav Start-->
<!-- start footer.html * partycity.com  * 1.21.2014 ekw  * 1.23.2014 ekw * rev 06.03.2014 khosty-->
<script type="text/javascript">
    function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }
    function eraseCookie(name) {
        createCookie(name, "", -1);
    }
    var orderCookie = readCookie("orderNumber");
    //alert("Kiosk Cookie " + kioskCookie );
    if (orderCookie != null && orderCookie != "") {
        eraseCookie("orderNumber");

    }
    /*
     var meta_view = document.createElement('meta');
     meta_view.setAttribute('name', 'viewport');
     meta_view.setAttribute('content', 'width=device-width, initial-scale=1');

     document.getElementsByTagName('head')[0].insertBefore(meta_view, document.getElementsByTagName('head')[0].childNodes[0]);

     var meta_ie = document.createElement('meta');
     meta_ie.setAttribute('http-equiv', 'x-ua-compatible');
     meta_ie.setAttribute('content', 'ie=edge');

     document.getElementsByTagName('head')[0].insertBefore(meta_ie, document.getElementsByTagName('head')[0].childNodes[0]);
     */
    var foresee = document.createElement('script');
    foresee.setAttribute('type', 'text/javascript');
    foresee.setAttribute('src', '/text/partycity/foresee/foresee-trigger.js');

    document.getElementsByTagName('head')[0].insertBefore(foresee, document.getElementsByTagName('head')[0].childNodes[0]);
</script>

<script type="text/javascript">
    var jump_lnk = document.getElementById('jumptolinks');
    if (jump_lnk && window.location.href.search(/balloons\.do/i) == -1) {
        jump_lnk_ul = jump_lnk.childNodes[0];

        //console.log('MIH: Start');
        for (var i = 0; i < jump_lnk_ul.childNodes.length; i++) {
            if (jump_lnk_ul.childNodes[i].nodeName == 'LI') {
                //console.log('MIH: [' + i + ']: ' + jump_lnk_ul.childNodes[i]);
                for (var j = 0; j < jump_lnk_ul.childNodes[i].childNodes.length; j++) {
                    jump_lnk_a = jump_lnk_ul.childNodes[i].childNodes[j];

                    if (jump_lnk_a.nodeName == 'A') {
                        //console.log('MIH: [' + i + ':' + j + ']: ' + jump_lnk_a);
                        switch (decodeURIComponent(jump_lnk_a.href.match(/#.+/)[0])) {
                            case '#Solid Color Balloons':
                            case '#Balloon Accessories':
                            case '#Accessories':
                            case '#Favor Containers':
                                jump_lnk_ul.childNodes[i].style.display = 'none';
                                break;
                        }
                    }
                }
            }
        }
        //console.log('MIH: Start');
    }
</script>

<style type="text/css">
#eslBodyContainer {
    height: inherit;
    min-height: 500px;
}

.footer_link_row td {
    line-height: 18px;

    padding-top: 15px;
}

.footer_link_row td b {
    font-size: 1.1em;
    line-height: 25px;
}

#footeremailform #email_address1foot {
    height: 19px;
    width: 200px;
    margin: 10px 0px 0px 5px;
    padding: 0px;
    color: #828181;
}

#footeremailform #email_address2foot {
    height: 19px;
    width: 200px;
    margin: 7px 0px 0px 5px;
    padding: 0px;
    color: #828181;
}

#footeremailform #email_submit_btn_foot {
    display: block;
    width: 37px;
    height: 19px;
    margin: -20px 0px 0px 210px;
    padding: 0px 0px 0px 0px;
}

#footeremailform #footererrormessage {
    font-family: Arial, Helvetica, sans-serif;
    color: #f00;
    font-size: 12px;
    font-weight: bold;
    margin: -2px 0 0 15px;
}

#footeremailform form#emailSignUpfoot {
    margin: 0 0 5px 0;
    padding: 0;
}

#footeremailform {
    height: 50px;
    margin: 0px 0 5px 0;
}

.customer_fav_links,
.customer_fav_links a,
.customer_fav_links a:active,
.customer_fav_links a:visited,
.customer_fav_links a:link,
.customer_fav_links a:hover {
    color: #2fb456;
}

.company_links,
.company_links a,
.company_links a:active,
.company_links a:visited,
.company_links a:link,
.company_links a:hover {
    color: #f79239;
}

.help_links,
.help_links a,
.help_links a:active,
.help_links a:visited,
.help_links a:link,
.help_links a:hover {
    color: #009ada;
}

td.color_bar_cell1 {
    background-color: #867cda;
    width: 300px;
}

td.color_bar_cell2 {
    background-color: #2fb456;
}

td.color_bar_cell3 {
    background-color: #f79239;
}

td.color_bar_cell4 {
    background-color: #009ada;
}

div#globalfooter {
    margin-left: 0px;
}

div#why-shop-pc-banner {
    margin: 0 0 0 0px;
    padding: 0;
    width: 990px;
}

div#colorbar {
    width: 990px;
    margin-left: 0px;
}

div.color_bar_cell {
    float: left;
    height: 6px;
    margin: 10px 0px 0px 0px;
    width: 20%
}

div.color_bar_cell1 {
    background-color: #867cda;
}

div.color_bar_cell2 {
    background-color: #eb1c23;
}

div.color_bar_cell3 {
    background-color: #2fb456;
}

div.color_bar_cell4 {
    background-color: #f79239;
}

div.color_bar_cell5 {
    background-color: #009ada;
}

div#footer-section1 {
    position: relative;
    height: 195px;
    text-align: left;
}

div#signup-for-email {
    width: 370px;
    margin: 0;
    padding: 0;
    position: absolute;
    top: 0px;
    left: 0px;
}

div#socialwidget {
    margin: 0px 0 10px 0;
}

div#footerlinks {
    font-family: Arial, Helvetica, sans-serif;
    font-size: 14px;
    font-weight: normal;
    line-height: 20px;
}

div#footerlinks strong {
    font-size: 14px;
    font-weight: bold;
}

div.customer_fav_links {
    position: absolute;
    top: 10px;
    left: 410px;
    width: 215px; /*necessary for IE 7*/
}

div.company_links {
    position: absolute;
    top: 10px;
    left: 640px;
    width: 150px; /*necessary for IE 7*/
}

div.help_links {
    position: absolute;
    top: 10px;
    left: 835px;
    width: 150px; /*necessary for IE 7*/
}

div#footer-section2 {
    position: relative;
    height: 150px;
    text-align: left;
}

div#verisign_secure {
    position: absolute;
    top: 0px;
    left: 640px;
}

div#mcafee_secure {
    position: absolute;
    top: 20px;
    left: 780px;
}

</style>

</td>
</tr>
</tbody>
</table>

<script type="text/javascript">

    $(function() {
        $(".jcarousel-list").jcarousel({
            btnNext: ".next",
            btnPrev: ".prev"
        });

    });

</script>
