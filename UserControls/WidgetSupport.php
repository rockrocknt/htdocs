<?php
	global $lg, $FullUrl;

	$widgetName = $parameters["name_$lg"];
	$supporters = getSupporters();
?>
<?php if ($supporters) { ?>
<div class="container-ct-sidebar">
    <h3 class="title-side-bar"><?=$widgetName?></h3>
    <div class="ct-sidebar">
        <ul class="supporter">
			<?php foreach ($supporters as $support) { 
				$yahoo = $support["yahoo"];
				$skype = $support["skype"];
				$name = $support["name_$lg"];
			?>
            <li>
                <?php if ($yahoo) { ?>
                <div><a href="ymsgr:sendim?<?=$yahoo?>" title="<?=$name?>"><img alt="<?=$name?>" src="http://opi.yahoo.com/online?u=<?=$yahoo?>&amp;m=g&amp;t=2&amp;l=us" /></a></div>
                <?php } ?>
                <?php if ($skype) { ?>
                <div><a href="skype:<?=$skype?>?chat" title="<?=$name?>"><img alt="<?=$name?>" src="http://mystatus.skype.com/smallclassic/<?=$skype?>" /></a></div>
                <?php } ?>
                <p><?=$name?></p>
                <p><?=$support["phone"]?></p>
            </li>
        	<?php } ?>
        </ul>
    </div>
</div>
<?php } ?>