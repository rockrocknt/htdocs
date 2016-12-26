<?
	if(!isset($_SESSION["video_is_played"])){
		$_SESSION["video_is_played"] = 1;
?>
<div>
<iframe width="191" height="191" src="http://www.youtube.com/embed/9XO7zhGdRTI?autoplay=1" frameborder="0" allowfullscreen></iframe>
</div>
<? }else{ ?>
<div>
<iframe width="191" height="191" src="http://www.youtube.com/embed/9XO7zhGdRTI" frameborder="0" allowfullscreen></iframe>
</div>
<? } ?>