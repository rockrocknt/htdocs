<? global $lg, $title_page, $descriptions, $article, $product;

	$cat = new Categories(currentCat());
	$img = "";
	
	if ($article) {
		if ($article->isHasImage())
			$img = getDomainName().'/'.$article->getImageNoThumb();
	}
	else if ($product) {
		if ($product->isHasImage())
			$img = getDomainName().'/'.$product->getImageNoThumb();
	}
	else if ($cat) {
		if ($cat->isHasImage())
			$img = getDomainName().'/'.$cat->getImageNoThumb();
	}
	
	if ($img=="") {
		$img = getDomainName().'/'.Info::getInfoField('logo');
	}
?>
<meta property="og:title" content="<?=$title_page?>"/>
<meta property="og:url" content="<?=GetFullUrl()?>"/>
<meta property="og:image" content="<?=$img?>"/>
<meta property="og:description" content="<?=$descriptions?>"/>
