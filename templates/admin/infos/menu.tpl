<!--  start step-holder -->
<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left">
    <?
        $id = isset($_GET['id'])?$_GET['id']:0;
        if((isset($_GET['act']) && $_GET['act'] == 'mail') || ($id == 59 || $id == 58 || $id == 60 || $id == 57 || $id == 15))
    { ?>
    	<a href="admin.php?do=infos&act=mail">Cấu hình email</a>
    <? }
    	else
    { ?>
    	<a href="admin.php?do=infos">Thông Tin Website</a>
    <? } ?>
  </div>
  <div class="step-dark-right">&nbsp;</div>
  <div class="step-no">></div>
  <div class="step-dark-left">
    <?php
        if(isset($_GET['act']))
        {
            if($_GET['act']=='edit')
                print('Edit');
            else if($_GET['act']=='mail_config_edit')
                print('Edit');    
            else if($_GET['act']=='add')
                print('Add');
            else if($_GET['act']=='copy')
                print('Copy');
            else if($_GET['act']=='mail')
                print('Show All');
        }
        else
        {
            print('Show All');
        }
    ?>
  </div>
  <div class="step-dark-round">&nbsp;</div>
  <div class="clear"></div>
</div>
