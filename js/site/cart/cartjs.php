<? $FullUrl = isset($_GET['f'])?$_GET['f']:''; ?>
  function cartsetquantity(proid,qtt)
				  {

					  location.href = "<?=$FullUrl?>/index.php?do=cart&act=setquantity&proid=" + proid + "&qty=" + $('#' + qtt).val() ;
					  }