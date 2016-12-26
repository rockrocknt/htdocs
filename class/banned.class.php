<?php
class BannedIp{
	static function Check(){
		global $db;
		$sql = "select * from banned_ip where ip='".$_SERVER['REMOTE_ADDR']."'";
		$r = $db->getRow($sql);
		if($r){
			if (isset($_SESSION['counter_login']))
				unset($_SESSION['counter_login']);
			die("<p style='text-align:center;'><img src='/images/admin/banned.png' alt='Banned' title='Banned' /></p>");
		}
		$timeoutseconds = 3600;
		$timestamp = time();
		$timeout = $timestamp-$timeoutseconds;
		$db->query("DELETE FROM banned_ip WHERE timestamp<$timeout");

		if(isset($_SESSION['counter_login']) && $_SESSION['counter_login']>4){
			$sql = "INSERT INTO banned_ip(ip,timestamp) VALUES ('".$_SERVER['REMOTE_ADDR']."','$timestamp')";
			$db->query($sql);
		}
	}
}
?>