<?php
define('UC_DIR','UserControls/');
class Template{
	static function UserControl($name, $parameters = null){		
		include(UC_DIR.$name.'.php');
	}
}
?>