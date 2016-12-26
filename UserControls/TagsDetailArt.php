<?
	global $db, $tags, $cat, $cat1, $cat2, $unique_key, $article33, $product, $lg, $tagSql, $parentTags, $parentTagSql, $do, $homeTags, $parentTagLevel2Sql, $parentLevel2Tags;
	$cat1 = $cat;
	$unique_key = SafeQueryString("unique_key");
	$sql = "select id from articles where unique_key_$lg = '$unique_key'";
	$article33 = $db->getRow($sql);
	
	$homeTagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags t, categories c where tags_active = 1 and t.tags_cat = c.id and c.comp = 5";
	
	if(!$article33)
	{
		$sql = "select id from products where unique_key_$lg = '$unique_key'";
		$product = $db->getRow($sql);	
		
		if($product){
			$tagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_product = " . $product['id'] . " order by tags_num asc";
			
			$parentTagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat1['id'] . " order by tags_num asc";	
		}else if($cat1 && $do != "main"){
			$tagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat1['id'] . " order by tags_num asc";
			
			if($cat2){
				$parentTagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat2['id'] . " order by tags_num asc";
			}
		}
	}else{
		$tagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_article = " . $article33['id'] . " order by tags_num asc";	
		
		$parentTagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat1['id'] . " order by tags_num asc";
			
		if($cat2){
			$parentTagLevel2Sql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat2['id'] . " order by tags_num asc";
		}
	}

	$tags = $db->getAll($tagSql);
	$parentTags = $db->getAll($parentTagSql);
	$homeTags = $db->getAll($homeTagSql);
	$parentLevel2Tags = $db->getAll($parentTagLevel2Sql);
	
	include(UC_DIR.'TagsDetailArt.ctp');
?>