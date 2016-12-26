<?php
	global $FullUrl;
	$ga = Info::getInfoField('google_analytics');
?>
<div id="fb-root"></div>
<script type="text/javascript" src="<?=$FullUrl?>/js/socials.js"></script>
<?php if ($ga) { ?>
<script type="text/javascript">
	<?php echo $ga; ?>
</script>
<?php } ?>