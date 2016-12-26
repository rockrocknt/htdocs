<? global $FullUrl, $pin_img; ?>
<?php /*?><script src="<?=$FullUrl?>/js/social/twitter.js" type="text/javascript"></script>
<script src="<?=$FullUrl?>/js/social/facebook.js" type="text/javascript"></script>
<script src="<?=$FullUrl?>/js/social/linkedin.js" type="text/javascript"></script>
<script type="text/javascript" src="<?=$FullUrl?>/js/social/pin.js"></script>
<? 
	global $FullDomain; 
	$FullDomain = GetFullUrl();
?><?php */?>

<?php /*?><script type="text/javascript" src="<?=$FullUrl?>/js/social/addthis.js"></script>
<script type="text/javascript">stLight.options({publisher: "ur-6f51b847-9430-aca7-53c0-b65bdafc5055"});</script>

<div style="padding-top: 2px;">
    <span class='st_fblike_vcount' displayText='Facebook Like'></span>
    <span class='st_facebook_vcount' displayText='Facebook'></span>
    <span class='st_plusone_vcount' displayText='Google +1'></span>
    <span class='st_tumblr_vcount' displayText='Tumblr'></span>
    <span class='st_twitter_vcount' displayText='Tweet'></span>
    <span class='st_linkedin_vcount' displayText='LinkedIn'></span>
    <span class='st_pinterest_vcount' displayText='Pinterest'></span>
</div><?php */?>



<?php /*?><div style="padding-top: 2px;">
  <!-- Facebook Start -->
  <div style=" float:left;">
    <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo $FullDomain; ?>&amp;locale=en_US&amp;layout=button_count&amp;show_faces=true&amp;width=80&amp;action=like&amp;colorscheme=light&amp;height=21" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:80px; height:22px;" allowTransparency="true"></iframe>
  </div>
  <div style=" float:left;">
    <div style="float:right;margin-right:2px">
      <b:if cond='data:post.isFirstPost'> 
        <script>(function(d){
  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
  js = d.createElement('script'); js.id = id; js.async = true;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
  d.getElementsByTagName('head')[0].appendChild(js);
}(document));</script> 
      </b:if>
      <fb:share-button expr:href='data:post.url' type='button_count'/>
    </div>
  </div>
  <!-- Facebook End -->
  <!-- Google Plus Start -->
  <div class="social-bookmark">
    <!-- Place this tag where you want the +1 button to render. -->
<div class="g-plusone" data-size="medium"></div>
<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
  </div>
  <!-- Google Plus End -->
  <!-- Pinterest Start -->
  <div class="social-bookmark">
  <a href="http://pinterest.com/pin/create/button/?url=<?=$FullDomain?>&media=http://www.<?=GetDomainName(GetFullUrl())?>/<?=$pin_img?>" class="pin-it-button" count-layout="horizontal" data-pin-config="beside" data-pin-do="buttonPin" ><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
  </div>
  <!-- Pinterest button End -->
  <!-- LinkedIn Start -->
  <div style="float:left"> 
  	<script type="IN/Share" data-url="<?=$FullDomain?>" data-counter="right"></script>
  </div>
  <!-- LinkedIn button End -->
  <!-- Twitter Start -->
  <div style="float:left"> 
  <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> 
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="<?=$FullUrl?>/js/twitter.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
    </div>
  <!-- Twitter End -->
  <div> 
    
    <?php /*?><!-- AddThis Button BEGIN -->
    <div class="addthis_default_style"><a class="addthis_button_compact at300m" href="#"><span class="at16nc at300bs at15nc at15t_compact at16t_compact"><span class="at_a11y">More Sharing Services</span></span>Share</a></div>
  </div>
</div><?php */?>
<?php return ; ?>
