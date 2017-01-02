<?php
if (class_exists('quan')) {
  return;
}
class quan{
	static function getAll(){
		global $db;
		$sql = "select * from district";
		$r = $db->getAll($sql);
		return $r;
	}
	static function getFee($id,$totalSanPham){

		global $db;
		$sql = "select * from district where `id`=". $id;
		$r = $db->getRow($sql);
		$phivanchuyen = 0;
		//echo $totalSanpham ."...";
		$bien = 1;
		if ($totalSanPham <= $bien)
		{
				 
				$phivanchuyen = $r['fee1'];
				
		}else
		
		if ($totalSanPham < 510000)
		{
				$phivanchuyen = $r['fee2'];
		}else
		if ($totalSanPham == 510000)
			$phivanchuyen = $r['fee3'];
			else
			$phivanchuyen = $r['fee4'];
			
			
		$_SESSION['phivanchuyen'] = $phivanchuyen;
        /*
		if ($phivanchuyen >0)
		return number_format($phivanchuyen)." ".CST_CURRENCY_CODE;
		else 
		return CST_FREE_PHIGIAOHANG;
        */
        return $phivanchuyen;
	}
    static function getFee2($tinhId, $quanId, $totalProduct)
    {
        $feevanchuyen = 40000;
        if ($tinhId == 1) {
            $feevanchuyen = quan::getFee($quanId, $totalProduct);

        }
        return $feevanchuyen;
    }
}
?>