<?php		
	global $Menu1, $Menu2;
	$Menu2 = array();
	
	$root["id"] = 121;
	$root = new Categories($root);
	$Menu1 = $root->getChilds();
	
	if($Menu1) {
        foreach ($Menu1 as $i=>$menu) {
            $menu = new Categories($menu);
            if ($menu->getHasChild() == 1) {
                $Menu2[$i] = $menu->getChilds();
            } else {
                $Menu2[$i] = "";
            }
        }
	}
	include(UC_DIR.'Categories.ctp');
?>