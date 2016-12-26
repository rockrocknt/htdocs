					
<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left"><a href="admin.php?do=products">Orders</a></div>
  <div class="step-dark-right">&nbsp;</div>
  <div class="step-no">></div>
  <div class="step-dark-left">
    <?php
    	
        if(isset($_GET['show']))
        {
            if($_GET['show']=='0')
                print('Wait payment');
            else if($_GET['show']=='1')
                print('Paymented');
            else if($_GET['show']=='2')
                print('Complete');
            else if($_GET['act']=='')
            {
                print('Show All ');
            }
        }
        else
        	print('Show All ');
        
    ?>
  </div>
  <div class="step-dark-round">&nbsp;</div>
  <div class="clear"></div>
</div>