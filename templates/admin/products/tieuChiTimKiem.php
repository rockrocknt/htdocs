<div class="widget">
		<div class="title"><img src="./images/admin/icons/dark/record.png" alt="" class="titleIcon" />
			<h6>Tiêu chí tìm kiếm</h6>
		</div>
		<?php 
		global $db,$product;
		$sql = "select * from `attribute_categories`";
		$listCat = $db->getAll($sql);
		//var_dump($listCat);
		foreach ($listCat as $cata) {
			?>
		<div class="formRow" >
			<label><?=$cata['name_vn']?></label>
			<div class="formRight">
				<?php 
				$catId = $cata['id'];
				
				$sql = "select * from `attributes` where `cid` = ". $catId;
				$listAtt = $db->getAll($sql);
				foreach ($listAtt as $att) {
				$checked = "";
				//var_dump($product);
				if (!empty($product)) {
					//$checked = "checked";
					$sql = "select * from  `products_attributes`  where `product_id` = ". $product['id']. " and `attribute_id` = ".$att['id'];
					
					$row = $db->getRow($sql);
					if (!empty($row)) {
						$checked = "checked";
					}
				}
				?>
				<div style="clear:both;">
				<input 
					<?php echo $checked; ?>
					type='checkbox' 
					id="lbl<?=$att['id']?>"
					name='attributes[]'
					value='<?=$att['id']?>'>
						<label for="lbl<?=$att['id']?>">
						<?=$att['name_vn']?></label>
						</div>
				<?php 
				}
				?>
			</div>
			<div class="clear"></div>
		</div>	
		<?php
		}
		?>
</div>