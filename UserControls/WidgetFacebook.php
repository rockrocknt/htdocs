<?php
	global $lg, $FullUrl;

	$widgetName = $parameters["name_$lg"];
	$name = Info::getInfoField('facebook');
	$height = Info::getInfoField('fbheight');
	$width = Info::getInfoField('fbwidth');
?>
<div class="container-ct-sidebar">
    <h3 class="title-side-bar"><?=$widgetName?></h3>
    <div class="ct-sidebar" style="padding:20px 0 0;">
	<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2FFacebookDevelopers&amp;width=180&amp;height=290&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;show_border=true&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:180px; height:290px;" allowTransparency="true"></iframe>
    </div>
</div>