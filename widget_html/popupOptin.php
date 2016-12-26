<?php 
global $db;
$sql = "select * from img where cid = 26 and active = 1 order by id desc";
$img = $db->getRow($sql);
if (!empty($_SESSION['alreadyShowPopUp'])) {
	return;
}
if (empty($img)) {
    return;
}
$contentHtml = $img['text2_vn'];
$afterSecond = $img['textalign'];
//$_SESSION['alreadyShowPopUp'] = true;
?>

<div class="uk-container uk-container-center">
    <div class="uk-grid">
    <div class="uk-width-medium-3-4">
                       <!-- This is an anchor toggling the modal -->
<a href="#my-id" id="aPopUp" data-uk-modal></a>
<!-- This is the modal -->
<div id="my-id" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close" onclick="setSession();"></a>
        <div class="noiDungPopUp"><?php 
        echo $contentHtml;
        ?>
        </div>
    </div>
</div>
    </div>
    <?php // if (isCoding()) 
    { ?>
    <script type="text/javascript">
		function setSession() {
			//console.log("setSession");
			  $.post("/ajax.php?do=session&act=set",{
					keySession: 'alreadyShowPopUp',
					value: 1
				},
				function(data)
				{
					

				});
		}
        setTimeout(function(){ $("#aPopUp").trigger("click"); }, <?php 
        echo $afterSecond;
        ?>000);
    </script>
    <?php  } ?>
</div>

</div>