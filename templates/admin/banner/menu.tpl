

<!--  start step-holder -->

<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left"><a href="admin.php?do=banner"><span><strong>
  
  <?
  	$cid = isset($_GET['cid'])?$_GET['cid']:0;
                             
    $link = "admin.php?do=banner&cid=$cid";                          
    if($cid == 120)
    {
        print("<a href=".$link. ">Top Banner</a>");                                                        
    }
    else if($cid == 119)
    {
        print("<a href=".$link. ">Golden partner</a>");                                                  
    }
    else if($cid == 118)
    {
        print("<a href=".$link. ">Logo header</a>");                               
    }
    else if($cid == 116)
    {
        print("<a href=".$link. ">Logo footer</a>");                                 
    }
    else if($cid == 117)
    {
        print("<a href=".$link. ">Icon tittle</a>");                                 
    }
    else if($cid == 113)
    {
        print("<a href=".$link. ">Thông tin công ty</a>");                                 
    }
    else if($cid == 112)
    {
        print("<a href=".$link. ">Silder</a>");                                  
    } 
    else if($cid == 111)
    {
        print("<a href=".$link. ">Silder Product</a>");                                  
    }        
    else{
                                    
    }
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
