<? 
	global $FullUrl, $lg, $users;
?>
<!-- Start hot_news-->
<? if($users){ ?>

<div class="sb-box">
  <h3 class="h3-title">Thông tin liên hệ</h3>
  <div class="sb-ct recent">
    <ul>
      <? foreach($users as $key => $user){ ?>
      <? if($user["type"]=="yahoo"){ ?>
      <li>
        <? if($key==0){ ?><p><b>+ TpHCM:</b></p>
        <p>- Showroom 1: 147 Huỳnh Văn Bánh F12 Phú Nhuận TpHCM</p>
        <p>- Showroom 2: L20 Hoàng Diệu F6 Quận 4 TpHCM (đối diện chân cầu Ông Lãnh)</p>
        <p><b>+ Hà Nội:</b></p>
        <p>- Showroom 1: 273D Tây Sơn Đống Đa Hà Nội</p>
        <p><b>+ Biên Hòa:</b></p>
        <p>- Showroom 1: 260C Phạm Văn Thuận P.Thống Nhất</p>
        <? } ?>
        <p> <?php /*?><a href="ymsgr:sendim?<?=$user["nick"]?>"><img hspace="5" border="0" alt="<?=$user["nick"]?>" src="http://opi.yahoo.com/online?u=<?=$user["nick"]?>&amp;m=g&amp;t=2&amp;l=us" /></a><br/><?php */?><?=$user["name_vn"]?> - <?=$user["phone"]?></p>
      </li>
      <? }else{ ?>
      <a href="skype:<?php echo $user['nick']; ?>?call"><img hspace="5" border="0" alt="<?php echo $user['nick']; ?>" style="border: none;" src="http://mystatus.skype.com/smallclassic/<?php echo $user['nick']; ?>" /> <?=$user["name_vn"]?></a> 
      <? }} ?>
    </ul>
  </div>
  <!--End content box--> 
</div>
<? } ?>