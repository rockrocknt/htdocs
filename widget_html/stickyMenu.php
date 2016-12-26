<?php
  
  $currentCat = currentCat();
  
  //var_dump($currentCat);
  //echo "echo ". $currentCat['id'];
  ?>
  <!-- Sticky Menu  "widget_html/stickyMenu.php" -->    
      <div id="header-sticky-wrapper" class="sticky-wrapper" >
        <header data-uk-sticky id="header" class="header">
          <div class="container">
            <div class="row" style="position: relative;">
              <div class="col-xs-8 col-sm-4 col-md-3" id="logo">
                <a href="/" class="logo">
                  <h1>
				  <?php 
				  $logo = Info::getInfoField('logo');
$namedefault = Info::getInfoField("logoname_$lg");
?>
                    <img alt="<?=$namedefault?>" title="<?=$namedefault?>" src="<?=$FullUrl.'/'.$logo?>" 
					class="default-logo">
					<?php /*
                    <img width="300" height="50" alt="Organic Food" src="/images/presets/preset1/logo2x.png" class="retina-logo">                   
					*/ ?>
                  </h1>
                </a> 
              </div>
              <div class="col-xs-4 col-sm-8 col-md-9" id="menu">
                <div><a href="#" id="offcanvas-toggler"><i class="uk-icon-bars"></i></a></div>
                <div>
                  <ul class="megamenu-parent menu-zoom hidden-xs hidden-sm hidden-md">
                    <li class="menu-item 
                                    
                                    <?php if ($currentCat['id'] == 151): ?>
                                    current-item active
                                    <?php endif; ?>

                              ">
                      <a href="/">Trang chủ</a>                    
                    </li>
                    <?php 
                    $listMenu = ImagesGroup::getimgbycid(16);
                    foreach ($listMenu as $img) {
                        $cid = $img['category_id'];
                        $catMenu = new Categories(Categories::getById($cid));
                        if ($cid == 152) {
                          $childs = $catMenu->getChilds(1);
                          ?>
									<li class="menu-item has-child

									<?php if (($currentCat['pid'] == $catMenu->getID()) || ($currentCat['id'] == $catMenu->getID())): ?>
											current-item active
									<?php endif; ?> ">
							  <a  
							  class="menuShop" 
							   <?php 
							   /*
										if ($currentCat['id'] != $catMenu->getID()): ?>
							  class="menuShop" 
							  <?php endif; 
							  */
							  ?>
							  href="<?=$catMenu->getLink();?>"><i class="uk-icon-shopping-cart"></i>
							  <?php echo $catMenu->getName();?>
							  </a>
							  <div style="width: 300px;" class="dropdown dropdown-main menu-left">
								<div class="dropdown-inner">
								  <ul class="dropdown-items">
									<?php 
										foreach ($childs as $child) {
											$cid = $child['id'];
											$catMenu = new Categories(Categories::getById($cid));       
										?>
										<li class="menu-item"><a href="<?=$catMenu->getLink();?>"><?=$catMenu->getName();?></a></li>
										<?php } ?>
								  </ul>
								</div>
							  </div>
							</li>

								  <?php
                            continue;
                        } // if ($cid == 152) 
                        
                        ?>
                        
                        <li class="menu-item 
                                <?php $childs = $catMenu->getChilds(1); ?>
                                <?php if (!empty($childs)): ?>
                                    has-child
                                <?php endif; ?>
                                <?php 
                                if ($currentCat['id'] == $catMenu->getID()): ?>
                                    current-item active
                                <?php endif; ?>
                            ">
                          <a href="<?=$catMenu->getLink();?>"><?=$catMenu->getName();?></a>
                        <?php if (!empty($childs)): ?>
                            <div style="width: 300px;" class="dropdown dropdown-main menu-right">
                            <div class="dropdown-inner">        
                              <ul class="dropdown-items">
                                <?php 
                                foreach ($childs as $child) {
                                    $cid = $child['id'];
                                    $catMenu = new Categories(Categories::getById($cid));       
                                ?>
                                <li class="menu-item"><a href="<?=$catMenu->getLink();?>"><?=$catMenu->getName();?></a></li>
                                <?php } ?>
                              </ul>
                              </div>
                              </div>
                        <?php endif; ?>                       
                        </li>
                    <?php
                    } //foreach ($listMenu as $img)
                    ?>
                  </ul>
                </div>              
              </div>
            </div>
          </div>
        </header>
      </div>
      <!-- /Sticky Menu --> 
