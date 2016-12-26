<?
	global $db, $lg, $cid, $limit, $widgetMenu1, $widgetMenu2, $widgetMenu3, $widgetName;
	$widgetName = $parameters["name_$lg"];
	$id = $parameters["id"];
	$cid = $parameters["cid"];
	$limit = $parameters["qlimit"];
	$widgetMenu1 = getWidgetCategories($id);

	if ($widgetMenu1) {
		foreach ($widgetMenu1 as $i=>$menu) {
			$menu = new Categories($menu);
			if ($menu->getHasChild() == 1) {
				$widgetMenu2[$i] = $menu->getChilds();
				if ($widgetMenu2[$i]) {		
					foreach ($widgetMenu2[$i] as $j=>$item) {
						$item = new Categories($item);
						if ($item->getHasChild() == 1) {
							$widgetMenu3[$i][$j] = $item->getChilds();
						} else {
							$widgetMenu3[$i][$j] = "";
						}
					}
				}
			} else {
				$widgetMenu2[$i] = "";
			}
		}
	}

	include(UC_DIR.'WidgetCategories.ctp');
?>