<?php
	global $lg, $FullUrl;

	$widgetName = $parameters["name_$lg"];
?>
<div class="container-ct-sidebar">
    <h3 class="title-side-bar"><?=$widgetName?></h3>
    <div class="ct-sidebar">
        <p style="overflow:hidden;"><span class="fl"><?=SITE_ACCESSED?></span> <span class="statistic_number"><?=Info::getAccessed();?></span></p>
		<p style="overflow:hidden;"><span class="fl"><?=SITE_ONLINE?></span><span class="statistic_number"><?=Info::getOnline();?></span></p>
    </div>
</div>