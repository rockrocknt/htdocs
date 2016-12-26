<?
	$cid = SafeQueryString('cid');
	$id = SafeQueryString('id');

	if ($cid) {
        $arr = array();
        $count = 1;

        do{
            $sql = "select * from categories where id=".$cid;
            $r = $db->getRow($sql);
            $arr[count($arr)] = $r;
            $cid = $r['pid'];
        }
		while($arr[count($arr)-1]['id'] != 121 && $arr[count($arr)-1]['id'] != 122);
	}
	
	if ($id) {
		$sql = "select * from products where id=$id";
		$item = $db->getRow($sql);
	}

	$text = "";
	if(!isset($_GET['act']) || $_GET['act']=='list')
		$text = "Tất cả";
	else if($_GET['act']=='edit')
		$text = "Chỉnh sửa";
	else if($_GET['act']=='add')
		$text = "Thêm";
	else if ($_GET['act']=='search')
		$text = "Tìm kiếm";
?>

<div class="control_frm" style="margin-top:25px;">
    <div class="bc">
        <ul id="breadcrumbs" class="breadcrumbs">
        	<? if (SafeQueryString('cid')) {
				for($i=(count($arr)-1); $i>=0; $i--){
					if ($arr[$i]['has_child']=='1') {
						$link = "admin.php?do=categories&cid=".$arr[$i]['id']."&root=1";
					} else {
						$sql = "select * from component where id=".$arr[$i]['comp'];
						$r = $db->getRow($sql);
						$link = "admin.php?do=".$r['do']."&cid=".$arr[$i]['id'];
					}
			?>
            <li><a href="<?=$link?>"><span><?=$arr[$i]['name_vn']?></span></a></li>
            <? }} else { ?>
            <li><a href="admin.php?do=productattchild&productatt_id=1"><span>Thuộc Tính Sản phẩm</span></a></li>
            <? } ?>
            <? if ($id) { ?>
            <li><a href="#" onclick="return false;"><?=$item['name_vn']?></a></li>
            <? } ?>
            <li class="current"><a href="#" onclick="return false;"><?=$text?></a></li>
        </ul>
        <div class="clear"></div>
    </div>
</div>