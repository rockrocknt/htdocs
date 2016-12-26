<?
	global $db;

	$sql ="select value from flags";
	$value = $db->getRow($sql);

	if($value['value']==1)
	{
		$sql ="update articles set active=1 where (publish_date < NOW() or publish_date=NOW()) and active_future=1";
		$db->query($sql);
		
		$sql = "update articles set active_future=0 where active=1";
		$db->query($sql);
		
		$sql = "select count(*) as num from articles where active_future=1";
		$num = $db->getRow($sql);
		
		if ($num['num']<1)
		{
			$sql = "update flags set `value`=0";
			$db->query($sql);
		}
		echo 1;
	}
	else
		echo 0;