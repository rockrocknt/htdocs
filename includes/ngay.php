<script language="javascript">
<!--
function startclock()
{
var thetime=new Date();

var nhours=thetime.getHours();
var nmins=thetime.getMinutes();
var nsecn=thetime.getSeconds();
var AorP=" ";

if (nhours>=12)
    AorP="P.M.";
else
    AorP="A.M.";

if (nhours>=13)
    nhours-=12;

if (nhours==0)
 nhours=12;

if (nsecn<10)
 nsecn="0"+nsecn;

if (nmins<10)
 nmins="0"+nmins;

document.getElementById('clockspot').innerHTML = nhours+":"+nmins+":"+nsecn+" "+AorP;

setTimeout('startclock()',1000);

} 

//-->
</script>
<? $today = getdate(); ?>
<? 
	function GetVietNameseDayName($enDay) 
	{
		if(strtolower($enDay) == 'monday')
			return 'Thứ Hai';
		else if(strtolower($enDay) == 'tuesday')
			return 'Thứ Ba';
		else if(strtolower($enDay) == 'wednesday')
			return 'Thứ Tư';
		else if(strtolower($enDay) == 'thursday')
			return 'Thứ Năm';
		else if(strtolower($enDay) == 'friday')
			return 'Thứ Sáu';
		else if(strtolower($enDay) == 'saturday')
			return 'Thứ Bảy';
		else if(strtolower($enDay) == 'sunday')
			return 'Chủ Nhật';
	}
?>
<form id="clockform" name="clockform"><font style="font-size:18px;font:Tahoma, Geneva, sans-serif"><?=GetVietNameseDayName($today['weekday'])?>, <?=$today['mday']?>/<?=$today['mon']?>/<?=$today['year']?> - <span id="clockspot"></span></font></form>
