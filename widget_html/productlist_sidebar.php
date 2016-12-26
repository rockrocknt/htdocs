<?php
 $sql = "select *,`products_attributes`.id as products_attributes_id from `products_attributes`   left join `products` on products_attributes.product_id = products.id
where (attribute_id = 2) or (attribute_id = 11)
group by `products_attributes`.product_id";
 
global $db;
$sql =  "select *  from  `attribute_categories` order by num asc";
$attributeCategories = $db->getAll($sql);
$currentCat  = currentCat();

$typesort = getquery('typesort');
if (empty($typesort)) {
    $typesort = 1;
}
 
//$typesort = empty(getquery('typesort')) ? 1 : getquery('typesort');

function isCheckAttributes($attributeId)
{
  $attributes = getquery('attributes');
  if (empty($attributes)) { 
      return false;
  }
  
  $attributes = explode(',', $attributes);
  foreach ($attributes as $attributeQueryId) {
    if ($attributeQueryId == $attributeId) {
      return true;
    }
  }
  return false;
}

 
?>
<script>
function changeSearch()
{
  var searchIDs = $("#productAttributesSearch input:checkbox:checked").map(function(){
    return $(this).val();
  }).get(); //
  searchIDs = searchIDs.toString();
  
  //location.href = $('#currentUrl').val() + "?attributes=" + searchIDs + "&typesort=" + $('#typesort').val();
  // '#sortproduct' is in productlist_content
  var url = $('#currentUrl').val() + "?attributes=" + searchIDs + "&typesort=" + $('#sortproduct').val();
  if ($('#cbxInStock').is(":checked")) {
	  url +=  '&inStock=1';
  }
  location.href = url;
  //console.log(url);
}
function selectAttr(attId)
{
	 var checkBoxes = $("#att" + attId);
        checkBoxes.prop("checked", !checkBoxes.prop("checked"));
}
function clickLinkInStock()
{
	var checkBoxes = $("#cbxInStock");
	checkBoxes.prop("checked", !checkBoxes.prop("checked"));
	/*
	if ($('#cbxInStock').is(":checked")) {
		checkBoxes.removeAttr('checked');
	} else {
		$('.myCheckbox').prop('checked', true);
	}
	*/
	checkInStock();
	//checkInStock();
}
function checkInStock()
{
	var checkBoxes = $("#cbxInStock");
    // checkBoxes.prop("checked", !checkBoxes.prop("checked"));
	//alert("check");
	//changeSearch();
	/*
	if ($('#cbxInStock').is(":checked")) {
		checkBoxes.removeAttr('checked');
	}
	if ($('#cbxInStock').is(":checked")) {
	//  alert($('#cbxInStock').is(":checked"));
	}
	*/
	var searchIDs = $("#productAttributesSearch input:checkbox:checked").map(function(){
    return $(this).val();
  }).get(); //
  searchIDs = searchIDs.toString();
  
  //location.href = $('#currentUrl').val() + "?attributes=" + searchIDs + "&typesort=" + $('#typesort').val();
  // '#sortproduct' is in productlist_content
  var url = $('#currentUrl').val() + "?attributes=" + searchIDs + "&typesort=" + $('#sortproduct').val();
  if ($('#cbxInStock').is(":checked")) {
	  url +=  '&inStock=1';
  }
  //console.log(url);
  location.href = url;
  
  
}
function showTieuchi()
{
	$('.producListSideBar').toggle();
	$('.block-title-new').toggleClass('minusClass');
}


</script>
<section class="col-left sidebar col-left-first">
   <div class="mb-left-first">
   <div class="mb-mana-catalog-leftnav">
   <div id="leftSideBar" class="block block-layered-nav">
      <div class="block-title-new" onclick="showTieuchi();">
         <strong><span>Tiêu chí tìm kiếm</span></strong>
      </div>
      <div class="block-content producListSideBar">
		<?php  ?>
         <div class="block-subtitle m-filter-group " data-id="left-0">
            <input type="checkbox" 
			onclick="checkInStock();return fasle;"
			value="1" 
			<?php 
			if (getquery("inStock") > 0 ) {
				echo "checked=checked";
			}
			?>
			id="cbxInStock">&nbsp;<a onclick="clickLinkInStock();return fasle;">Hoa có tại cửa hàng</a>
         </div>
		<?php ?>
		
         <dl class="narrow-by-list" id="productAttributesSearch">
         <input type="hidden" id="currentUrl" value="/<?php echo $currentCat['unique_key_vn']; ?>/" >
         <input type="hidden" id="typesort" value="<?php echo $typesort; ?>" >
         <?php
         foreach ($attributeCategories as $attributeCategory) {
         ?>

         <dt class="odd active titleSearch" data-id="m_left_feature_filter_filter">
            <?=$attributeCategory['name_vn']?>
         </dt>
         <dd class="odd">
            <ul class="m-filter-css-checkboxes">
                <?php 
                      $sql =  "select *  from  `attributes`  where cid= ". $attributeCategory['id'] ." order by num asc";
                      $attributes = $db->getAll($sql);
                      ?>
                      <?php
                        foreach ($attributes as $attribute) {
                      ?>
                        <li>
                                <input 
								id="att<?php echo $attribute['id']; ?>"
								type="checkbox" 
                                onclick = "changeSearch();"
                                <?php 
                                
                                if (isCheckAttributes($attribute['id'])) { ?>
                                  checked = "checked"
                                <?php
                                } // if (isCheckAttributes($attribute['id']))
                                 
                                ?>
                                value="<?=$attribute['id']?>"> <a onclick="selectAttr(<?php echo $attribute['id']; ?>);changeSearch();" class="m-checkbox-unchecked">
                                <?=$attribute['name_vn']?>
                                </a>
                                
                             </li>
                        
                      <?php    
                        }  // foreach ($attributes as $attribute) 
                      ?> 
            </ul>
         </dd>
         <?php    
         }
         ?>
         </dl>
      </div>
   </div>
</section>


<?php return; ?>
<section class="col-left sidebar col-left-first">
   <div class="mb-left-first">
   <div class="mb-mana-catalog-leftnav">
   <div class="block block-layered-nav">
      <div class="block-title-new">
         <strong><span>Refine By</span></strong>
      </div>
      <div class="block-content">
         <div class="block-subtitle m-filter-group " data-id="left-0">
            Shopping Options                                            
         </div>
         <dl class="narrow-by-list" id="narrow-by-list-0">
         <dt class="odd active titleSearch" data-id="m_left_feature_filter_filter">
            Màu sắc                                                       
         </dt>
         <dd class="odd">
            <ul class="m-filter-css-checkboxes">
      
               <li>
                  <input type="checkbox"> <a class="m-checkbox-unchecked">
          Hồng
                  </a>
                  <span class="count">(112)</span>
               </li>
         
         
               <li>
                  <input type="checkbox"> <a class="m-checkbox-unchecked">
          Trắng
                  </a>
                  <span class="count">(112)</span>
               </li>
            </ul>
      </div>
   </div>
</section>

