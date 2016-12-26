

<!--  start step-holder -->

<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left"><a href="admin.php?do=img_group&act=detail&groupid=<?=$_GET['groupid']?>"><span><strong>
  <? if ($_GET['groupid']==1) { ?> Logo website
  <? } else if ($_GET['groupid']==2) { ?> Bản đồ liên hệ
  <? } else if ($_GET['groupid']==3) { ?> Slider trang chủ
  <? } else if ($_GET['groupid']==4) { ?> Danh sách đối tác
  <? } ?>
  </strong> </span></a></div>
  <div class="step-dark-right">&nbsp;</div>
  <div class="step-no">></div>
  <div class="step-dark-left">  	
    <?php
                            
        if(isset($_GET['act']))
        {
        if($_GET['act']=='edit')
            print(' Edit');
        else if($_GET['act']=='add')
            print(' Add');
        else if($_GET['act']=='copy')
            print(' Copy');
            }
       else
        {
             print("Show all");                                           
        }
    ?>
  </div>
  <div class="step-dark-round">&nbsp;</div>
  <div class="clear"></div>
</div>
