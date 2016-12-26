<?
	global $cat1, $comp;
	
	global $db, $cat1, $lg, $cat2, $menu, $FullUrl, $prefix_url, $cat1Link, $submenu;
	$sql = "select id, name_$lg, has_child, unique_key_$lg, img, comp from categories where pid = 121 and comp != 2 and comp != 30 and showed = 1 and is_useful = 0 order by num asc, id asc";
	$cat1 = $db->getAll($sql);
	
	if($cat1)
	{
		$menu = array();
		$submenu = array();
		
		foreach($cat1 as $key1 => $value1)
		{
			$sql = "select name_$lg, has_child, unique_key_$lg, img, comp from categories where showed = 1 and comp != 2 and pid = " . $value1['id'] . " limit 0, 7";
			
			$cat2 = $db->getAll($sql);
			
			$cat1Link = $FullUrl . $prefix_url . $value1["unique_key_$lg"] . "/" ;
			if($key1 == 0)
				$cat1Link = $FullUrl . $prefix_url;
			$menu[$key1]['unique_key'] = $value1["unique_key_$lg"];
			$menu[$key1]['link'] = $cat1Link;
			$menu[$key1]['name'] = $value1["name_$lg"];
			$menu[$key1]['img'] = $value1["img"];
			$menu[$key1]['comp'] = $value1["comp"];
			
			if($cat2)
			{
				foreach($cat2 as $key2 => $value2)
				{
					$submenu[$key1][$key2]['link'] = $FullUrl . $prefix_url . $value1["unique_key_$lg"] . "/" . $value2["unique_key_$lg"] . "/";
					$submenu[$key1][$key2]['name'] = $value2["name_$lg"];
				}
			}
		}
	}
	include('BelowCategories.ctp');
?>