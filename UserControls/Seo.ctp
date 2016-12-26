<? global $cat, $lg, $act; ?>
<?	
			if(!empty($cat['seo_f_'.$lg]) && $act != "detail"){	
		?>
<style>
#container {
   
    padding-bottom: 100px !important;
  
}
</style>
<div class="seo">
  <?=$cat['seo_f_' . $lg];?>
</div>
<? } ?>
