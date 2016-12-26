<p class="logo"><a href="/"><img src="/images/logo.png" width="161" height="147" /></a></p>
<p class="bg_hoavan"><img src="/images/hoavan.png" width="140" height="194" /></p>
<?php
return;
	global $FullUrl, $prefix_url, $lg;

	$logo = Info::getInfoField('logo');
	$name = Info::getInfoField("logoname_$lg");
	if (file_exists($logo)) {
		$size = fixSize($logo, 700, 95);	// thay doi w & h tuy theo website
		$h = number_format((95-$size["height"])/2);
	}
?>
<?php if (file_exists($logo)) { ?>
<div>
    <a class="logo" href="<?=$FullUrl.$prefix_url?>" title="<?=$name?>">
        <img src="<?=$FullUrl.'/'.$logo?>" title="<?=$name?>"   alt="<?=$name?>" />
    </a>
</div>
<?php } ?>