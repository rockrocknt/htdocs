<? 
	global $FullUrl, $lg; 
    
	if($left_articles){ 
?>
<div class="sb-box">
  <h3 class="h3-title">Bài viết vali kéo</h3>
  <div class="sb-ct recent">
    <ul>
      <? 
	  	foreach($left_articles as $article){ 
				$article_name = $article['name_'.$lg]?$article['name_'.$lg]:NO_NEWS;
                if(!empty($article['name_'.$lg]))
                	$article_link = $FullUrl.GetArtLinkFull($article, $lg); 
                else
                    $article_link = "#";
                
                $article_title = htmlspecialchars($article['name_'.$lg]);
	  ?>
      <li> &raquo; <a href="<?=$article_link?>" title="<?=$article_title?>"><?=$article_name?></a> </li>
      <? } ?>
    </ul>
  </div>
</div>
<? } ?>