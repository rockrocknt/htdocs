<?
	global $FullUrl, $cat;
	$Full_Link = GetFullUrl();
?>

<div class="sb-box">
  <h3 class="h3-title">Chia sẻ bạn bè</h3>
  <div class="add-c-share-left floatleft">
    <div style="float:left;width:50px; overflow:hidden;">
      <div class="fb-like" data-send="false" data-layout="box_count" data-width="25" data-show-faces="false" style="margin-bottom:10px;"></div>
    </div>
    <div style="float:left;width:50px; overflow:hidden; margin-right:5px;">
      <div class="g-plusone" data-size="tall"></div>
    </div>
    <div class="clear" style="height:10px;display:inline">&nbsp;</div>
    <!-- AddThis Button BEGIN -->
    <div style="float: left;width:50px; overflow:hidden;">
      <div class="addthis_toolbox addthis_default_style"> <a class="addthis_counter"></a> </div>
    </div>
    <script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js#pubid=ra-4eb8dc6b12035ffe"></script> 
    <!-- AddThis Button END -->
    <div style="float: left;width:50px; overflow:hidden;"><a href="<?=$FullUrl?>/<?=$cat["comp"]==1?$cat["unique_key_vn"]:"all-latest-news"?>.rss"><img src="<?=$FullUrl?>/images/rss.png" alt="RSS Feed" width="50" title="Chia sẻ RSS" /></a></div>
  </div>
</div>
<script type="text/javascript">
function SearchGoogle(){
	var key = document.getElementById("key_search").value;
	var site = document.domain;
	var qs = key + "+site:" + site;
	var url = "http://www.google.com.vn/#sclient=psy-ab&hl=vi&site=&source=hp&q=" + qs + "&pbx=1&oq=" + qs + "&aq=f&aqi=&aql=1&gs_sm=e";
	window.open(url, '_blank');
	return false;
}
</script>
<div id="fb-root"></div>
<script type="text/javascript" language="javascript">(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script> 
<script type="text/javascript">
  window.___gcfg = {lang: 'vi'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script> 
