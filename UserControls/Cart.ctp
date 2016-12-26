<? global $FullUrl, $sl; ?>
<script language="javascript" type="text/javascript">
function Cart(pro_id, fullurl, act){
	var r = true;
	if(act == 'delete')
		r = confirm("Are you sure?");
	if(r == true)
	{
		var link = "<?=$FullUrl?>/ajax2.php?do=cart&act=add&id=" + pro_id + "&fullurl=" + fullurl + "&act=" + act;
		  $.post(link,{
               },
               function(data)
               {  
			   			getCart('<?=$FullUrl?>');
               });
		}
}	
</script>

<div class="left-pro" style="display:none;" id="showhide">
    <div id="cart">
    </div>
</div>
