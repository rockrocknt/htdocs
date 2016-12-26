

<!--  start step-holder -->

<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left"><a href="admin.php?do=nicks"><span><strong>
  <?php
		$cid = isset($_GET["cid"])?$_GET["cid"]:0;                            
    	$link = "admin.php?do=nicks&cid=$cid";
          
        if($cid == 114)
        {
            print("<a href=".$link. ">Hỗ trợ trực tuyến</a>");
        }  
  ?>
  
  </strong> </span></a></div>
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
