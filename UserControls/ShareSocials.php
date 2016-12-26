<?php
	global $FullUrl, $lg;

	$link = GetFullUrl();
	$id = $parameters->getID();
	$cid = $parameters->getCID();
	$shareTitle = array('Facebook','Google bookmarks','Google plus','Google reader','Twitter','Tumblr','Linkedin','Link hay','Zing me');
	$shareImages = array('facebook_32','google_bmarks_32','google_32','google_reader_32','twitter_32','tumblr_32','linkedin_32','linkhay','big_zing_icon');
	$arrLink = array(
	'http://www.facebook.com/sharer/sharer.php?u=',		    		
	'https://www.google.com/bookmarks/mark?op=edit&amp;bkmk=',
	'https://plus.google.com/share?url=',
	'http://www.google.com/ig/add?source=atgs&amp;feedurl=',
	'https://twitter.com/intent/tweet?url=',
	'http://www.tumblr.com/share',
	'http://www.linkedin.com/shareArticle?mini=true&amp;url=',
	'http://linkhay.com/submit?link_url=',
	'http://link.apps.zing.vn/share?u=');
?>
<div class="share-this-wrap">
    <div class="fl" style="margin-right:10px;">
        <div class="fb-like" data-send="false" data-layout="button_count" data-width="100" data-show-faces="false"></div>
    </div>
	<div class="fl"><div class="g-plusone" data-size="medium"></div></div>
    <div class="fl"><a href="https://twitter.com/share" class="twitter-share-button">Tweet</a></div>
    <ul class="share-socials">
		<?php for($i=0; $i<count($shareImages); $i++){ ?>
        <li><a href="<?=$arrLink[$i]?><?=($i==5)?'':GetFullUrl()?>" target="_blank" title="<?=$shareTitle[$i]?>"><img alt="<?=$shareTitle[$i]?>" src="<?=$FullUrl?>/images/share/<?=$shareImages[$i]?>.png" /></a></li>
        <? } ?>
    </ul>
</div>