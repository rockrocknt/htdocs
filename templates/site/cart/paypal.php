
<div class="wcontent">
	<div class="wrap_page_content">
		<h3>Check out on PayPal</h3>
		<div class="content">
			<form action="https://www.paypal.com/cgi-bin/webscr" method="post" id="paypal_frm">
				<input type="hidden" name="cmd" value="_xclick">
				<input type="hidden" name="business" value="alanb@alanb.com">
				<input type="hidden" name="undefined_quantity" value="1">
				<input type="hidden" name="item_name" value="doodad from alanb.com">
				<input type="hidden" name="item_number" value="dd01">
				<input type="hidden" name="amount" value="4.99">
				<p>Click this button to checkout on paypal </p>
				<a class="BtnStyle01" style="margin-left:0;" title="<?=BUY?>" href="Javascript:document.getElementById('paypal_frm').submit();">
				<?=ORDER?>
				</a>
			</form>
		</div>
	</div>
</div>
