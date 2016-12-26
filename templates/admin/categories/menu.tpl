
<div id="step-holder">
  <?php
        $cha = $_GET['cid'];
        $arr = array();
        $count = 1;
        do{
            $sql = "select * from categories where id=".$cha;
            $r = $db->getRow($sql);
            $arr[count($arr)] = $r;
            $cha = $r['pid'];
        }while($arr[count($arr)-1]['id'] != $_GET['root']);
        for($i=(count($arr)-1);$i>=0;$i--){
            if($arr[$i]['name_vn']!='root'){
                                            ?>
  <div class="step-no"><?=$count;$count++;?></div>
  <div class="step-dark-left"> <a href="<?php
							if($arr[$i]['has_child']=='1')
								print('admin.php?do=categories&cid='.$arr[$i]['id'].'&root='.$_GET['root']);
							else{
								$sql = "select * from component where id=".$arr[$i]['comp'];
								$r = $db->getRow($sql);
								print('admin.php?do='.$r['do'].'&act='.$r['act'].'&cid='.$arr[$i]['id'].'&root='.$_GET['root']);
							}
                        ?>">
    <?=$arr[$i]['name_vn']!='root'?$arr[$i]['name_vn']:''?>
    </a> </div>
  <div class="step-dark-right">&nbsp;</div>
  <?
                                            }}
                                            ?>
  <div class="step-no">></div>
  <div class="step-dark-left">
    <?php
        if(!isset($_GET['act']))
            print('Show All ');
        else if($_GET['act']=='edit')
            print('Edit ');
        elseif($_GET['act']=='add')
            print('Add ');
        else
        {
            print('Show All');                                                    	
        }
    ?>
  </div>
  <div class="step-dark-round">&nbsp;</div>
  <div class="clear"></div>
</div>
