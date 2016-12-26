<?php
global $sql,$db;
$sql = "SELECT code,insert_day,cid,id FROM products where cid=".SafeQueryString('cid');
$productlist = $db->getAll($sql);

if($productlist)
{
 ?>

<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
<atom:link href="<?php echo $domain; ?>" type="application/rss+xml" />
<title>RSS - All Sophie Products
</title>
<link>
<?=$FullUrl;?>
</link>
<description>
RSS -  All Sophie Products 
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
<?php foreach($productlist as $article)
 {
  ?>
<item>
<title><?php echo htmlspecialchars($article['code']); ?> </title>
<link>
----
</link>
<description><?=$article['id']?></description>
<pubDate><?php print date("D, d M Y H:i:S", strtotime($article['insert_day']));?> +0700</pubDate>
</item>
<?php } ?>
</channel>
</rss>