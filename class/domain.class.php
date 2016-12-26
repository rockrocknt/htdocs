<?php

class Domain{
	static function Check($domain,$ext){		
		
	}	
	static function Detail($nickname){
	
	}
}
class Dm_MB{
//avaiable
	static function Check($domain,$ext){
		$link = "http://www.matbao.net/whoisXML.aspx?domain=".$domain.$ext;
		$responseData = file_get_contents($link);
		$pos = strpos($responseData,"<avaiable>True</avaiable>");
		if($pos>0)
			return false;
		return true;		
	}
	static function CheckContent($domain,$ext){
		$link = "http://www.matbao.net/whoisXML.aspx?domain=".$domain.$ext;
		$responseData = file_get_contents($link);
		$pos = strpos($responseData,"<avaiable>True</avaiable>");
		if($pos>0){
			$pos = strpos($responseData,"<description>");
			$pos = strpos($responseData,"<description>", $pos+13);
			$end = strpos($responseData,"</description>", $pos);
			$html = substr($responseData, $pos+13,$end - $pos);
			return $html;
		}
		return "1";		
	}
//<description>
	static function Detail($domain,$ext){
		$link = "http://www.matbao.net/whoisXML.aspx?domain=".$domain.$ext;
		$responseData = file_get_contents($link);
		$pos = strpos($responseData,"<description>");
		$pos = strpos($responseData,"<description>", $pos+13);
		$end = strpos($responseData,"</description>", $pos);
		return substr($responseData, $pos+13,$end - $pos);
	}
}
/*if(Dm_MB::Check("donghuongbentre",".com.vn")){
	echo "<pre>";
	echo Dm_MB::Detail("donghuongbentre",".com.vn");
	echo "<pre>";
}
else
	echo "failed";
*/
?>