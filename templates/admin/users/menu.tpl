
<!--  start step-holder -->

<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left"><a href="admin.php?do=users">Users</a></div>
  <div class="step-dark-right">&nbsp;</div>
  <div class="step-no">></div>
  <div class="step-dark-left">
    <?php
                                                	if(isset($_GET['act']))
                                                    {
                                                        if($_GET['act']=='edit')
                                                            print('Edit');
                                                        else if($_GET['act']=='add')
                                                            print('Add');
                                                        else if($_GET['act']=='copy')
                                                            print('Copy');
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
