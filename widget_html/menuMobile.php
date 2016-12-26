<!-- Off Canvas Menu menuMobile.php-->
      <div class="offcanvas-menu">
        <a class="close-offcanvas" href="#"><i class="uk-icon-remove"></i></a>
        <div class="offcanvas-inner">
          <div class="module_menu">
		    <h3 class="module-title">Menu</h3>
			<div class="module-content">
			  <ul class="nav menu">
                <li class="current active deeper parent">
				  <a href="/">Trang chủ</a>
				  
				</li>
				
				<?php 
					$listMenu = ImagesGroup::getimgbycid(16);
					foreach ($listMenu as $img) {
						$cid = $img['category_id'];
						$catMenu = new Categories(Categories::getById($cid));
						?>
						
						<li class="deeper parent">
						  <a 
						  <?php 
							if ($cid == 152) {
						  ?>
						   class="menuShop" 
						  <?php } // if ($cid == 152) ?>
						  
						  href="<?=$catMenu->getLink();?>"><?=$catMenu->getName();?></a>
						  <?php $childs = $catMenu->getChilds(1); ?>
						<?php if (!empty($childs)): ?>
							 	
							  <ul class="nav-child unstyled small">
								<?php 
								foreach ($childs as $child) {
									$cid = $child['id'];
									$catMenu = new Categories(Categories::getById($cid));		
								?>
								<li class=""><a 
								
								href="<?=$catMenu->getLink();?>"><?=$catMenu->getName();?></a></li>
								<?php } ?>
							  </ul>
							   
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
	  <!-- /Off Canvas Menu -->
<?php return; ?>
<!-- Off Canvas Menu -->
      <div class="offcanvas-menu">
        <a class="close-offcanvas" href="#"><i class="uk-icon-remove"></i></a>
        <div class="offcanvas-inner">
          <div class="module_menu">
		    <h3 class="module-title">HongLeoCoLong.com</h3>
			<div class="module-content">
			  <ul class="nav menu">
                <li class="current active deeper parent">
				  <a href="/">Trang chủ</a>
				</li>
				 
				
				<?php 
					$listMenu = ImagesGroup::getimgbycid(16);
					foreach ($listMenu as $img) {
						$cid = $img['category_id'];
						$catMenu = new Categories(Categories::getById($cid));
						?>
						
						<li class="deeper parent 
								<?php $childs = $catMenu->getChilds(1); ?>
								<?php if (!empty($childs)): ?>
									
								<?php endif; ?>
								 
							">
						  <a href="<?=$catMenu->getLink();?>"><?=$catMenu->getName();?></a>
						<?php if (!empty($childs)): ?>
						
							<ul class="nav-child unstyled small">
								 
									
								<?php 
								foreach ($childs as $child) {
									$cid = $child['id'];
									$catMenu = new Categories(Categories::getById($cid));		
								?>
								<li class="deeper parent"><a href="<?=$catMenu->getLink();?>"><?=$catMenu->getName();?></a></li>
								<?php } ?>
							 
						<?php endif; ?>						  
							</ul>
						</li>
					<?php
					} //foreach ($listMenu as $img)
					?>
				
				
				<li class="deeper parent">
				  <a href="shop.html">Shop</a>
				  <ul class="nav-child unstyled small">
				    <li><a href="shop.html">Ecwid Shop Example</a></li>
					<li><a href="shop.html#!/Salmon/p/57673142/category=15703381">Ecwid Single Product</a></li>
					<li><a href="shop.html#!/Meat/c/15703381/offset=0&amp;sort=normal">Ecwid Product Category</a></li>
				  </ul>
				</li>
			  </ul>
            </div>
		  </div>
        </div>
      </div>	  
	  <!-- /Off Canvas Menu -->