

<!--  start step-holder -->

<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left"><a href="admin.php?do=banner"><span><strong>
  
  <?
  	$type = isset($_GET['type'])?$_GET['type']:0;
                             
    $link = "admin.php?do=optin&type=$type";
    
    print("<a href=".$link. ">Optin Email</a>");     
  ?></strong> </span></a></div>
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
