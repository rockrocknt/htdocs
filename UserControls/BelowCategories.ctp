<? global $FullUrl; ?>

<div id="navi-menu">
  <ul class="navigation">
    <?php
    	foreach($menu as $key1 => $value1){
      ?>
       <li> <a <?=isset($_GET['cat1'])?($_GET['cat1']==$value1["unique_key"])?'class="active"':'':($key1==0)?'class="active"':'';?> href="<?=$value1['link'];?>" title="<?=$value1['name'];?>">
      <?=$value1['name']?>
      </a> </li>
       <? } ?>
  </ul>
</div>
