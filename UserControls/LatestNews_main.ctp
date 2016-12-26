<? 
	global $FullUrl, $lg; 
    
	if($main_articles){ 
?>
<div class="news">
  <h3 class="h3-title">Bài viết vali kéo</h3>
  <? 
				 	$z=0;
				 foreach($main_articles as $article)
					{
						$z=$z+1;
						
						$articles_img = GetImage($article['img']);
						$article_name = $article['name_'.$lg]?$article['name_'.$lg]:NO_NEWS;
						if(!empty($article['name_'.$lg]))
							$article_link = $FullUrl.GetArtLinkFull($article, $lg); 
						else
							$article_link = "#";
						
						$article_title = htmlspecialchars($article['name_'.$lg]);
					?>
  <div class="news-list  <? if($z==2){echo 'last-news';$z=0;}?>">
    <ul>
      <li class="news-img"><a href="<?=$article_link?>" title="<?=$article_title?>"><img src="<?=$FullUrl?>/<?=$articles_img?>" alt="<?=$article_title?>" width="104" height="103" /></a></li>
      <li class="news-short"> <a href="<?=$article_link?>" title="<?=$article_title?>"><?=$article_name?></a>
        <p> <?=$article['short_'.$lg]?> </p>
        <p align="right"><a class="doc-tiep" href="<?=$article_link?>" title="<?=$article_name?>">Đọc tiếp &raquo;</a></p>
      </li>
    </ul>
  </div>
  <? }?>
</div>
<? } ?>