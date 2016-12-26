<?php
global $sql,$db;
$sql = "SELECT * FROM products where id=".SafeQueryString('id');

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
<description><?php echo htmlspecialchars($article['descs_vn']); ?></description>
<code><?php echo $article['code']; ?></code>
<price><?php echo $article['price']; ?></price>
<img>http://www.catalogsophie.com/<?php echo $article['img']; ?></img>
<size><?php echo $article['price']; ?></size>
<production_vn><?php echo htmlspecialchars($article['production_vn']); ?></production_vn>
<warranty_vn><?php echo $article['warranty_vn']; ?></warranty_vn>
<unique_key_vn><?php echo $article['unique_key_vn']; ?></unique_key_vn>
<title_vn><?php echo $article['title_vn']; ?></title_vn>
<keyword_vn><?php echo $article['keyword_vn']; ?></keyword_vn>
<des_vn><?php echo $article['des_vn']; ?></des_vn>
<group_name_vn><?php echo $article['group_name_vn']; ?></group_name_vn>
<img1><?php if ($article['img1'] != '') echo 'http://www.catalogsophie.com/'.$article['img1']; ?></img1>
<img2><?php if ($article['img2'] != '') echo 'http://www.catalogsophie.com/'.$article['img2']; ?></img2>
<img3><?php if ($article['img3'] != '') echo 'http://www.catalogsophie.com/'.$article['img3']; ?></img3>
<img4><?php if ($article['img4'] != '') echo 'http://www.catalogsophie.com/'.$article['img4']; ?></img4>
<is_available><?php echo $article['is_available']; ?></is_available>
<active><?php echo $article['active']; ?></active>
<pubDate></pubDate>
</item>
<?php } ?>
</channel>
</rss>
