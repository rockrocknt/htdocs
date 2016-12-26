<?php
define("SKYPE_IMG_DIR", "images/skype/");
class Skype{
	static function Check($nickname){		
		$check_it = 'http://mystatus.skype.com/'.$nickname.'.num';
		$id =$nickname;		
		$file = fopen($check_it, "r");$read = fread($file, 200);
		$read = ereg_replace($id, "", $read);
		if ($y = strstr ($read, "1")) {
				$x = false;
		}else{
			$x = true;
		}
		return $x;	
	}
	static function Image($nickname,$status){
		if($status < 100){
			return "http://mystatus.skype.com/balloon/$nickname";
		}
		else{
			if(self::Check($nickname))
				return SKYPE_IMG_DIR.$status."_o.png";
			else
				return SKYPE_IMG_DIR.$status."_i.png";
		}
	}
}
?>