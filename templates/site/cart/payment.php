<?php
	global $db, $FullUrl, $lg, $payments, $banklist;
?>
<link href="<?php echo $FullUrl; ?>/css/jquery-ui-1.9.1.custom.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $FullUrl; ?>/fancybox/jquery.fancybox-1.3.4.css" rel="stylesheet" type="text/css" />
<script src="<?=$FullUrl?>/fancybox/jquery.fancybox-1.3.4.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
		$("#this_map").fancybox({
			openEffect  : 'none',
			closeEffect	: 'none',
	
			helpers : {
				title : {
					type : 'over'
				}
			}
		});
    	$( "#tabsmethod" ).tabs();
    });
</script>
<link href="/css/thanhtoan.css" rel="stylesheet" type="text/css" />
<div class="index_Ce">
    <div class="header">
        <?php Template::UserControl('Header'); ?>
    </div>

    <div class="content">
        <h4 class="title_content"><?=TITLE_PAYMENT_GUIDE?></h4>

        <div class="cart-container">
            <div id="tabsmethod" style="text-align:center;">
                <ul>
                    <?php foreach ($payments as $i=>$payment) { ?>
                        <li><a href="#tabs-<?=$i?>"><?=$payment["name_$lg"]?></a></li>
                    <?php } ?>
                </ul>
                <?php foreach ($payments as $i=>$payment) {
                    $alias = $payment['alias'];
                    $name = $payment["name_$lg"];
                    $content = $payment["content_$lg"];
                    ?>
                    <div id="tabs-<?=$i?>">
                        <?php if ($alias=='Bank') {
                            if ($banklist) {
                                ?>
                                <ul class="list_bank huongdantt">
                                    <?php  foreach($banklist as $num=>$bank){
                                        $bankname = $bank["bank_$lg"];
                                        ?>
                                        <li>
                                            <img style="float:left;" src="<?=$FullUrl?>/<?=$bank["img"]?>" title="<?=$bankname?>" alt="<?=$bankname?>" />
                                            <table class="nganhang">
                                                <tr>
                                                    <td><?=SITE_BANK?></td>
                                                    <td><strong><?=$bankname?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td><?=SITE_BANKOWNER?></td>
                                                    <td><strong><?=$bank["name"]?></strong></td>
                                                </tr>
                                                <tr>
                                                    <td><?=SITE_BANKACCOUNT?></td>
                                                    <td><span style="font-weight:bold; color:#f00;"><?=$bank["card"]?></span></td>
                                                </tr>
                                                <tr>
                                                    <td><?=SITE_BRANCH?></td>
                                                    <td><strong><?=$bank["branch"]?></strong></td>
                                                </tr>
                                            </table>
                                        </li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        <?php } else if ($alias=='Tructiep') { ?>
                            <?php if (file_exists($payment["img"])) { ?>
                                <a href="<?=$FullUrl.'/'.$payment["img"]?>" id="this_map"><img src="<?=$FullUrl.'/'.$payment["img"]?>" title="<?=$name?>" alt="<?=$name?>" style="max-width:700px; width:auto;" /></a>
                            <?php } ?>
                        <?php } else if ($alias=='Nganluong') { ?>
                            <div><a href="https://www.nganluong.vn/" target="_blank"><img src="<?=$FullUrl?>/images/site/nganluong.jpg" alt="Nganluong" /></a></div>
                        <?php } else if ($alias=='Baokim') { ?>
                            <div><a href="https://www.baokim.vn/" target="_blank"><img src="<?=$FullUrl?>/images/site/baokim.jpg" alt="Baokim" /></a></div>
                        <?php } else if ($alias=='Paypal') { ?>
                            <div><a href="https://www.paypal.com/" target="_blank"><img src="<?=$FullUrl?>/images/site/paypal.jpg" alt="Paypal" /></a></div>
                        <?php } ?>
                        <div><?=$content?></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<br class="clean">

<h3 class="title-h3 cart-title"><?=TITLE_PAYMENT_GUIDE?></h3>
