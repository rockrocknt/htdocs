<?php
class BaoTri{
	static function Check(){
		global $db;
		$sql = "select * from infos order by id desc limit 0,1";
		$r = $db->getRow($sql);
		if($r['bao_tri']){
			$tParsedTime = strtotime($r['ket_thuc']);
			$batdau = strtotime($r['bat_dau']);
			if(time()<$batdau)
				return false;
			if(time()<$tParsedTime)
			{
				if(isset($_SESSION['demo']))
					return false;
				return true;
			}
		}
		return false;
	}
}
?>