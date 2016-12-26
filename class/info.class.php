<?php
class Info{
	public static function getByName($str){
		global $db;
		$sql = "select * from infos where name_vn like '%".$str."%'";
		
		return $db->getRow($sql);
	}
	public static function getByKey($str){
		global $db;
		$sql = "select * from infos where alias like '%".$str."%'";
		return $db->getRow($sql);
	}
	public static function getAccessed(){
		global $db;
		
		if(!isset($_SESSION['isAccessed'])){
			$sql = "update accessed set accessed = accessed + 1 where id = 1;";
			$db->query($sql);
			$_SESSION['isAccessed'] = 0;
		}
		
		$sql = "select accessed from accessed where id=1";
		$r = $db->getRow($sql);
		return number_format($r['accessed']);
	}
	public static function getOnline(){
		global $db;
		//fill in some basic info
		$timeoutseconds = 600;
		
		//get the time
		$timestamp = time();
		$timeout = $timestamp-$timeoutseconds;
		
		global $db;
		//if(!session_is_registered("uonline")){
		//insert the values
			$insert = $db->query("INSERT INTO useronline VALUES ('$timestamp','" . getenv('REMOTE_ADDR')."','" . session_id() ."')");//$_SERVER['QUERY_STRING']
			//session_register("uonline");
		//}
		//delete values when they leave
		$delete = $db->query("DELETE FROM useronline WHERE timestamp<$timeout");
		
		//grab the results
		$result = $db->query("SELECT DISTINCT file FROM useronline");//DISTINCT ip
		//number of rows = the number of people online
		$user = number_format(mysql_num_rows($result));
		return $user;
	}
	public static function getTitle(){
		global $title_page;
		if(isset($title_page) && $title_page<>""){
			return $title_page;
		}
		if(isset($_GET['unique_key'])){
			return str_replace("-", " ", $_GET['unique_key']);
		}
		elseif(isset($_GET['cat2'])){
			return str_replace("-", " ", $_GET['cat2']);
		}
		elseif(isset($_GET['cat1'])){
			if($_GET['cat1'] == "index"){
				global $db, $lg;
				$sql = "select * from infos where name_vn like '%title $lg%'";
				$r = $db->getRow($sql);
				return $r['plain_text_vn'];
			}
			else
				return str_replace("-", " ", $_GET['cat1']);
		}
		else{
			global $db, $lg;
				$sql = "select * from infos where name_vn like '%title $lg%'";
			$r = $db->getRow($sql);
			return $r['plain_text_vn'];
		}
	}
	public static function getKeywords(){
		global $title_page;
		if(isset($title_page) && $title_page<>""){
			
		}
		else{
			if(isset($_GET['unique_key'])){
				$title_page = str_replace("-", " ", $_GET['unique_key']);
			}
			elseif(isset($_GET['cat2'])){
				$title_page = str_replace("-", " ", $_GET['cat2']);
			}
			elseif(isset($_GET['cat1'])){
				if($_GET['cat1'] == "index"){
					global $db, $lg;
					$sql = "select * from infos where name_vn like '%title $lg%'";
					$r = $db->getRow($sql);
					$title_page = $r['plain_text_vn'];
				}
				else
					$title_page = str_replace("-", " ", $_GET['cat1']);
			}
			else{
				global $db, $lg;
					$sql = "select * from infos where name_vn like '%title $lg%'";
				$r = $db->getRow($sql);
				$title_page = $r['plain_text_vn'];
			}
		}
	}
	public static function getFooter(){
		global $db;
		$sql = "select * from infos where name_vn like '%footer%'";
		$r = $db->getRow($sql);
		return $r['plain_text_vn'];
	}
	public static function get($str){
		global $db;
		$sql = "select * from infos where name_vn like '%".$str."%'";
		$r = $db->getRow($sql);
		return $r['content_vn'];
	}
	public static function get_alias($str){
		global $db;
		$sql = "select * from infos where alias like '%".$str."%'";
		$r = $db->getRow($sql);
		return $r['content_vn'];
	}
	public static function get_content($str){
		global $db;
		$sql = "select * from infos where name_vn like '%".$str."%'";
		$r = $db->getRow($sql);
		return $r['content_vn'];
	}
	public static function get_plain($str){
		global $db;
		$sql = "select * from infos where name_vn like '%".$str."%'";
		$r = $db->getRow($sql);
		return $r['plain_text_vn'];
	}
	public static function getFlash(){
		global $db;
		$sql = "select * from infos where name_vn like '%flash%'";
		$r = $db->getRow($sql);
		$flash = $r["img"];
		$i = strpos($flash,".swf");
		$flash = substr($flash,0,$i);	
		return $flash;
	}
	public static function getRow($str){
		global $db;
		$sql = "select * from infos where name_vn like '%".$str."%'";
		$r = $db->getRow($sql);
		return $r;
	}
	
	public static function getInfoField($field)
	{
		global $db;
		$sql = "select * from infos";
		$r = $db->getRow($sql);
		return $r["$field"];
	}
	
	public static function getInfoMailConfig()
	{
		global $db;

		$sql = "select * from infos";
		$r = $db->getRow($sql);
		
		$arr = array();
		$arr['mail_contact'] = $r['mail_contact'];
		$arr['mail_user'] = $r['mail_user'];
		$arr['mail_pass'] = $r['mail_pass'];
		$arr['mail_host'] = $r['mail_host'];
		$arr['mail_list'] = $r['mail_list'];
		$arr['mail_name'] = $r['mail_name'];

		return $arr;
	}
}
?>