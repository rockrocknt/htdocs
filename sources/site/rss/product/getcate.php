<?php 

global $sql,$db;
$sql = "SELECT cid FROM products ";
$productlist = $db->getAll($sql);

$where = '';

$strwhere = '';
	
	for ($i33=0;$i33<count($productlist);$i33++) {
		$strwhere.= ($strwhere == '')?( ' id = ' . $productlist[$i33]["cid"] ): ' or id = ' . $productlist[$i33]["cid"];
	}
	
	$sql = "select name_vn,id from categories where " . $strwhere;

	$catelistlist =  $db->getAll($sql);	
	
if($catelistlist)
{
 ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="<?php echo $domain; ?>" type="application/rss+xml" />
<title>RSS - All Sophie Products Categories
</title>
<link>
<?=$FullUrl;?>
</link>
<description>
RSS -  All Sophie Products Categories
</description>
<language>
  <?=$lg?>
</language>

<managingEditor>

</managingEditor>
<image>
  <url>
  </url>
  <title>
  <?=$_SERVER['HTTP_HOST'];?>
  </title>
  <link>
  http://<?=$_SERVER['HTTP_HOST'];?>
  </link>
  <width></width>
  <height></height>
  <?
  	}else{
  ?>
  	<width>0</width>
  <height>0</height>
  <? } ?>
</image>
<?php foreach($catelistlist as $article)
 {
  ?>
<item>
<title><?php echo htmlspecialchars($article['name_vn']); ?> </title>
<link>
</link>
<description> 
<?php echo htmlspecialchars($article['id']); ?>
</description>
<pubDate></pubDate>
</item>
<?php } ?>
</channel>
</rss>