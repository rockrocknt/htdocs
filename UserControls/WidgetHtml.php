<?php
	global $lg, $FullUrl;

	$id = $parameters['id']; 
	$widgetName = $parameters["name_$lg"];
	$cid = $parameters["cid"];
	$outsideHTML = getHTMLContent($id);
    echo $outsideHTML["content_$lg"];
return;
?>
<?php if ($cid == 3) { ?>
<div class="container-sub-div">
    <h3 class="title-h3"><?=$widgetName?></h3>
    <div class="ct-div-sub">
    	<?=$outsideHTML["content_$lg"]?>
    </div>
</div>
<?php } else { ?>
<div class="container-ct-sidebar">
    <h3 class="title-side-bar"><?=$widgetName?></h3>
    <div class="ct-sidebar">
        <?=$outsideHTML["content_$lg"]?>
    </div>
</div>
<?php } ?>