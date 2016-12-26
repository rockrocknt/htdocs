<?php
	$FullUrl = isset($_GET['f'])?$_GET['f']:'';
?>
$(document).ready(function() {
getCart2('<?=$FullUrl?>',0);
});


function showcart()
{
	
    $('#showhide').toggle(400);
}