<?php
global $db, $nicks;
$sql = "select * from nicks where cid=101 order by num asc limit 0,2";
$nicks = $db->getAll($sql);
//show banner
include(TPL_DIR.'domain.php');
?>