<?
	global $db, $cat1, $lg, $cat2, $menu, $FullUrl, $prefix_url, $cat1Link, $submenu;
	global $useful_menu;
	
	$sql = "select id, name_$lg, unique_key_$lg, img, comp from categories where is_useful = 1 and showed = 1 order by num asc";
	$useful_cat_menu = $db->getAll($sql);
	
	if($useful_cat_menu)
	{
		$useful_menu = array();
		
		foreach($useful_cat_menu as $key1 => $value1)
		{
			$cat1Link = $FullUrl . $prefix_url . $value1["unique_key_$lg"] . "/" ;
			
			$useful_menu[$key1]['unique_key'] = $value1["unique_key_$lg"];
			$useful_menu[$key1]['link'] = $cat1Link;
			$useful_menu[$key1]['name'] = $value1["name_$lg"];
			$useful_menu[$key1]['img'] = $value1["img"];
			$useful_menu[$key1]['comp'] = $value1["comp"];
		}
	}
	
	include('UsefulCategories.ctp');
?>