<? 
	if(isset($_GET["groupid"])){
        global $db, $name;
        
        $sql = "select name_vn from img_group where id = " . $_GET["groupid"];
        
        $name = $db->getRow($sql);
    }
?>

<!--  start step-holder -->

<div id="step-holder">
  <div class="step-no">1</div>
  <div class="step-dark-left"><a href="admin.php?do=img_group"><span><strong><?=isset($_GET["groupid"])?$name["name_vn"]:"Nhóm hình ảnh"?></strong> </span></a></div>
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
        else if($_GET['act']=='detail')
            print(' Detail');
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
