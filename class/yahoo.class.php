<?php
define("YAHOO_IMG_DIR", "images/yahoo/");
class Yahoo{
	static function Check($nickname){		
		$check_it = "http://mail.opi.yahoo.com/online?u=$nickname&m=a&t=1";
		$id =$nickname;		
		$file = fopen("$check_it"."$id", "r");$read = fread($file, 200);
		$read = ereg_replace($id, "", $read);
		if ($y = strstr ($read, "00")) {
				$x = false;
		}elseif ($y = strstr ($read, "01")) {
			$x = true;
		}
		return $x;	
	}
	static function Image($nickname,$status){
		if($status < 100){
			return "http://mail.opi.yahoo.com/online?u=$nickname&m=g&t=$status";
		}
		else{
			if(self::Check($nickname))
				return YAHOO_IMG_DIR.$status."_o.jpg";
			else
				return YAHOO_IMG_DIR.$status."_i.jpg";
		}
	}
}
?>