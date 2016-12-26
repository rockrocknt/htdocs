					
<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left"><a href="admin.php?do=products">Sản Phẩm</a></div>
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
                                                        else if($_GET['act']=='')
                                                        {
                                                            print('Show All ');
                                                        }
                                                    }
                                                    if(isset($_GET['cid']))
                                                    {
                                                        $sql = "select name_vn from categories where id=".$_GET['cid'];
                                                        $cat = $db->getRow($sql);
                                                        if($cat['name_vn'] != 'root')
	                                                        print($cat['name_vn']);
                                                        else
                                                        	print('Show All');
                                                    }
                                                    
                                                    if(!isset($_GET['act']) && !isset($_GET['cid']))
                                                    	print('Show All');
                                                ?>
  </div>
  <div class="step-dark-round">&nbsp;</div>
  <div class="clear"></div>
</div>