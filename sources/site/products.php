<?php
getColorandSize();

if (isset($_GET['act'])) $act= $_GET['act'];

switch($act){
  case 'detail':
    ShowDetail();
    $tpl = 'detail';
    break;
    case 'xemmamau':
        $tpl = 'xemmamau';
        break;

    case 'tag':
    Tag();
    $tpl = 'list';
    $title_page = "Tag";
    break;
  
  case 'search':
    Search();
    $title_page = CAT_SEARCH_RESULT;
    $tpl = 'list';
    break;
    case 'detail_quickview':

        $tpl = 'detail_quickview';
        break;
    case 'detail_quickview_nho':
        $tpl = 'detail_quickview_nho';
        break;
    case 'filter':
        filter();
        $title_page = CAT_SEARCH_RESULT;
        $tpl = 'list';
        break;

    case 'insertcomment':
        insertcomment();
        $tpl = 'detail';
        break;
  default:

    ShowList();
    $tpl = "list";
    break;
}
function insertcomment()
{
    global $page,$tpl, $db, $plpage,$lg,$cat, $products;

    $captcha = SafeFormValue("captcha");
    $folderroot = createDateTimeFolder("upload/images/");
    if($captcha == $_SESSION['security_code']) {
   // if (true){
        $arr['cmt_name'] = SafeFormValue("name");
        $arr['cmt_email'] = SafeFormValue("email");
        $arr['cmt_content'] = SafeFormValue("message");
        $arr['cmt_sao'] = SafeFormValue("sao");
        $limit_size=50000;

        if(isset($_FILES["img"]['name'] ) && $_FILES["img"]['size']>0){
            //them hinh moi
            $img = $_FILES["img"]['name'];
            $start = strpos(strrev($img), "."); // lay dau . sau cung
            $type = substr($img, strlen($img)-($start+1), $start+1);
            if (!checkUploadImages($type))
            {
                $_SESSION['error'] = "Ảnh sản phẩm không đúng định dạng!";
            }
            else
            {
                if($_FILES["img"]['size'] >= $limit_size){
                   die('File upload quá lớn');
                }
                copy($_FILES["img"]['tmp_name'], $folderroot . $img) ;
                $arr["cmt_avatar"] = $folderroot . $img;
            }
        }
        $arr['cmt_insertdate_int'] = strtotime('now');
        $arr['cmt_post_id'] = SafeQueryString("proid");
        $arr['cmt_do'] ="products";

            vaInsert('comments',$arr);

    }
    $url = $_GET['url'];
    $_SESSION['mess'] = DA_NHAN_BINH_LUAN;
    page_transfer2($url);

}
function showallproduct()
{
    global $page,$tpl, $db, $plpage,$lg,$cat, $products;
    products::getColorandSize();

    if (getquery('cid') == 0)
    {
        $cattemp = Categories::getCatByComp(9,2);
       // var_dump($cattemp);
    }
    $cat = new Categories($cattemp);
    $set_per_page = Info::getInfoField('paging_product');

    $sql = "select * from products where active=1 and name_$lg<>''   order by num asc, id desc";
    $result['paging'] = plpage_seo($sql, $page, $set_per_page);
    $sqlstmt = sqlmod($sql, $page, $set_per_page);
    $result['list'] = $db->getAll($sqlstmt);

   // $result = $cat->getListAll($page, $set_per_page,2);

   //   var_dump($result);
    $plpage = $result['paging'];
    $products = $result['list'];

}
function  filterproduct()
{
    global $page,$tpl, $db, $plpage,$lg,$cat, $products;
    products::getColorandSize();
    $where = "";

    $count = 0; // $count la so dieu kien

    $dk1 =   getquery('chungloai');
    if ($dk1 != "0")
    {
        $where = "productattchild_id=".$dk1;
        $count++;
    }
    $dk1 =   getquery('mausac');
    if ($dk1 != "0")
    {
        if ($where!="")
            $where .= " or productattchild_id=".$dk1;
        else
            $where .= " productattchild_id=".$dk1;
        $count++;
    }
    $dk1 =   getquery('doituong');
    if ($dk1 != "0")
    {
        if ($where!="")
            $where .= " or productattchild_id=".$dk1;
        else
            $where .= " productattchild_id=".$dk1;

        $count++;
    }
    $dk1 =   getquery('vatlieu');
    if ($dk1 != "0")
    {
        if ($where!="")
            $where .= " or productattchild_id=".$dk1;
        else
            $where .= " productattchild_id=".$dk1;
        $count++;
    }

    $dk1 =   getquery('size');
    if ($dk1 != "0")
    {
        if ($where!="")
            $where .= " or productattchild_id=".$dk1;
        else
            $where .= " productattchild_id=".$dk1;

        $count++;
    }

    $dk1 =   getquery('giatien');
    if ($dk1 != "0")
    {
        //$where .= " or productattchild_id=".$dk1;
        $count --;
        $sql = "SELECT * FROM `productattchild` WHERE `productattchild_id`=$dk1";

        $rowgiatien = $db->getRow($sql);

        if ($rowgiatien['productattchild_minvalue'] > 0)
        {

            if ($where!="")
            $where =  "($where) and productsearchkey_price  > ".$rowgiatien['productattchild_minvalue'];
            else
                $where =  "  productsearchkey_price  > ".$rowgiatien['productattchild_minvalue'];
        }

        if ($rowgiatien['productattchild_maxvalue'] > 0)
        {

            if ($where!="")
            $where .= " and productsearchkey_price  < ".$rowgiatien['productattchild_maxvalue'];
            else
                $where = "  productsearchkey_price  < ".$rowgiatien['productattchild_maxvalue'];
           // echo " where gia tien". $where;
        }

    }
   // echo $count;
    if ($count > 1)
    $sql = "select qh1.product_id, COUNT(qh1.product_id) `total` from
    (select * from productsearchkey where $where) as qh1
    group by qh1.product_id HAVING total > 1";
    else
        $sql = "select qh1.product_id, COUNT(qh1.product_id) `total` from
    (select * from productsearchkey where $where) as qh1
    group by qh1.product_id HAVING total >= 1";
    if (getquery('debug') ==1)
       echo $sql;
    $productsearchkeyList = $db->getAll($sql);

    if ($productsearchkeyList)
    {
         $where = "";
         foreach ($productsearchkeyList as $key=>$obj) {
          //     var_dump($obj);
             if ($where == "")
             {
                 $where = " `id`=".$obj['product_id'];
             }else
                 $where .= " or `id`=".$obj['product_id'];
         }

        global $page, $plpage, $products;

        $cat = new Categories(currentCat());
        $set_per_page = Info::getInfoField('paging_product');

        $sql = "select * from products where active=1 and name_$lg<>'' and ( ".$where." ) order by num asc, id desc";

        $result['paging'] = plpage_seo($sql, $page, $set_per_page);
        $sqlstmt = sqlmod($sql, $page, $set_per_page);
        $result['list'] = $db->getAll($sqlstmt);


        $plpage = $result['paging'];
        $products = $result['list'];
    }



}
function filter()
{
    global $tpl, $page, $plpage, $products;

    if ((getquery('cid') == 0)
        && (getquery('chungloai') == 0)
            && (getquery('mausac') == 0)
            && (getquery('giatien') == 0)
            && (getquery('doituong') == 0)
            && (getquery('vatlieu') == 0)
            && (getquery('size') == 0))
    {
        showallproduct();

    }else
    {
        filterproduct();
    }


/*
    $cat = new Categories(currentCat());
    $set_per_page = Info::getInfoField('paging_product');

    $result = $cat->getList($page, $set_per_page);
    // var_dump($result);
    $plpage = $result['paging'];
    $products = $result['list'];
*/
    $tpl="list";
}

function getColorandSize()
{
    global $db,$colorlist, $sizelist;
    $sql = "SELECT * FROM `productattchild`  where `productatt_id`=2";
    $colorlist = $db ->getAll($sql);

    $sql = "SELECT * FROM `productattchild`  where `productatt_id`=1";
    $sizelist = $db ->getAll($sql);
}
function ShowList()
{
	
	//var_dump(getQueryArray());
  global $page, $db, $plpage, $products,$lg,$currentcat;
    $cat = new Categories(currentCat());
    /*
  $cat = new Categories(currentCat());
  $set_per_page = Info::getInfoField('paging_product');
   // $set_per_page = 200;
  $result = $cat->getList($page, $set_per_page);
    // var_dump($result);
  $plpage = $result['paging'];
  $products = $result['list'];
    */
 //  $products = products::getbycid_phu($cat->getID());

    $cat_id = $cat->getID();


    $typesort = getquery('typesort');
    if ($typesort == "") $typesort = getSortDefault();

 //   $sqlmain = "select * from products where active=1 and name_$lg<>'' and (( cid=".$cat->getID().") or (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")   )";
 //   $sql = $sqlmain."   order by `price` desc";
    // show all
  $sqlmain = "select * from products where active=1 and name_$lg<>'' ";
  
  $attributes = getquery('attributes');
  
  if (!empty($attributes)) {
    $sqlmain = "select `products`.id, `products_attributes`.attribute_id,`products_attributes`.id as products_attributes_id from `products_attributes`   left join `products` on products_attributes.product_id = products.id";
    $sqlmain .=  " where active=1 and name_$lg<>'' ";
	
	
	
    $sqlAttributes = "";
    $attributes = explode(",", $attributes);
    foreach ($attributes as $attributeQueryId) {
      if (empty($sqlAttributes)) {
            $sqlAttributes = " and ( (attribute_id = $attributeQueryId) ";
      } else
      $sqlAttributes .= "or (attribute_id = $attributeQueryId) ";
    } // foreach ($attributes as $attributeQueryId) {
    $sqlmain .= $sqlAttributes . " ) ";
	
	// get attributes categories
	foreach ($attributes as $attributeQueryId) {
      $categoryAttribute = null;
    } 
	/*
	((attribute_id = $attributeQueryId)
	*/
	
	// group attribute by category
	
	
  }
  
	if (getquery('inStock') > 0) {
		$sqlmain .=  " and `products`.`is_available` = 1 ";
	}
  

	$currentCid = $cat->getID();
	
	// page con hang va tim kiem nang cao
	if (!in_array($cat->getDisplayType(), array(2,4))) {
		$sqlmain .= " and ( cid=".$currentCid;
		$sqlmain .= ")";		
	}
	if ($cat->getDisplayType() == 4 ) {
		$sqlmain .=  " and `products`.`is_available` = 1 ";
	}
    $searchText = getquery("q");
	if (!empty($searchText)) {
		$sqlmain .=  " and (`products`.name_vn like '%$searchText%' or `products`.code like '%$searchText%') ";
	}
	
	$attributesQuery = getquery('attributes');
	if (!empty($attributesQuery)) {
		$sql = "select id, cid from  `attributes` where id in (" . $attributesQuery . ") group by cid";
		$attributeCidList = $db->getAll($sql);
		//var_dump($attributeCidList);
		
		$products = $db->getAll($sqlmain);
		//echo "products";
		
		$productIdList = "";
		for($i = 0; $i < count($products); $i++) {
			
			if (empty($products[$i])) continue;
			$product = $products[$i];
			
			$productHaveFullAttribute = true;
			foreach ($attributeCidList as $attributeCid) {
			   $sql = "select product_id, `products_attributes`.id from `products_attributes` left join `attributes` on `attributes`.id = `products_attributes`.attribute_id ";
			   $sql .=" where `attributes`.cid = " . $attributeCid['cid'] . " and `products_attributes`.product_id = " . $product['id'];
			   $sql .= " and `products_attributes`.attribute_id IN (" . $attributesQuery . ")";
			   
			   $row = $db->getRow($sql);
			   //var_dump($row);
			   
			   if (empty($row)) {
				   $productHaveFullAttribute = false;
				   break;
			   }
			   //echo "product";
			   //var_dump($row);
			   //die("here");
			//	$categoryAttribute = null;
			}
			//var_dump($productHaveFullAttribute);
			//die("here");
			if ($productHaveFullAttribute) {
				$productIdList .= empty($productIdList) ? $product['id'] : "," . $product['id'];
			}
		}
		if (empty($productIdList)) $productIdList = 0;
		$sqlmain = "select * from products where `id` IN (" . $productIdList . ")";
	}
	
	
	
	//echo $sqlmain;
	//$rows = $db->getAll($sqlmain);
	//var_dump($rows);
	//die("herer");
	
	
    $columnId = "id";
	// echo $sqlmain;
	/*
    if (!empty($attributes)) {
      $sqlmain .= " group by `products_attributes`.product_id ";
      $columnId = " `products_attributes`.product_id";
    }
	*/

    if ($typesort==1)
    {
        $sql = $sqlmain."  order by  `is_available` desc,  $columnId desc";
        $typesort=1;
    }

    if ($typesort==2)
    {
        $sql = $sqlmain."  order by `is_available` desc, `view` desc";
    }

    if ($typesort==3)
    {
        $sql = $sqlmain."  order by `is_available` desc, `price` asc";


    }

    if ($typesort==4)
    {
        $sql = $sqlmain."   order by `is_available` desc, `price` desc";

    }

    $cat = new Categories(currentCat());
    
	$set_per_page = Info::getInfoField('paging_product');
	if (getquery("viewall") == "1" ) {
		$set_per_page = 1000;
	}
	/*
    if (ismobile())
    {
        if (!isIpad())
        {
            $set_per_page = Info::getInfoField('paging_product_mobile');
        }
    }
	*/
    // $set_per_page = 2;
    // $set_per_page = 200;
    $page   = isset($_GET["page"])  ? $_GET["page"]  : '1';//for paging
    
	$where = explode('where', $sql);
	global $countTotal;
	// $sqlmain = "select *,`products_attributes`.id as products_attributes_id from `products_attributes`   left join `products` on products_attributes.product_id = products.id";
	$sqlCount = "select count(*) as count from `products` ";
	if (!empty($attributes)) {
		$sqlCount = "select count(`products`.id) from `products_attributes`   left join `products` on products_attributes.product_id = products.id";;
	}
	$sqlCount .= " where " . $where[1];	
	$rowCount = $db->getAll($sqlCount);
	//echo $sql;
    $result = $cat->getListwithSQL($page, $set_per_page,$sql);
    //var_dump($result);
    $plpage = $result['paging'];
    $products = $result['list'];
	global $listProduct;
    $listProduct = $products;
	$countTotal = $rowCount[0]['count'];
	if (!empty($attributes)) {
		$countTotal = count($rowCount);
	}

}

function ShowDetail()
{
  global $db, $lg,$seo, $title_page, $keywords, $descriptions, $product;

  //$key = SafeQueryString('unique_key');
    //$sql = "select * from products where unique_key_$lg='$key'";
    //$rows =  $db->getRow($sql);
  if (!empty($product)) {
    $product = new products($product);
  } 
  
  $product->countView();
    $seo['seo_f_vn'] = "<h1>". $product->getName()."</h1><p>".$product->getShort()."</p>";
  $title_page = $product->getTitle();

  $keywords = $product->getKeyword();
  $descriptions = $product->getDescription();
  /*
    global $cat_name1, $cat_name2, $cat_name3, $cat_name4, $cat_name5, $all_tag_cat;
    $obj = $product->obj;
    $sql = "select name_vn, unique_key_vn from categories c where id = " . $obj["tag_id_1"];
    $cat_name1 = $db->getRow($sql);

    $sql = "select name_vn, unique_key_vn from categories c where id = " . $obj["tag_id_2"];
    $cat_name2 = $db->getRow($sql);

    $sql = "select name_vn, unique_key_vn from categories c where id = " . $obj["tag_id_3"];
    $cat_name3 = $db->getRow($sql);

    $sql = "select name_vn, unique_key_vn from categories c where id = " . $obj["tag_id_4"];
    $cat_name4 = $db->getRow($sql);

    $sql = "select name_vn, unique_key_vn from categories c where id = " . $obj["tag_id_5"];
    $cat_name5 = $db->getRow($sql);
  */

}

function Tag()
{
  global $products, $page, $plpage, $title_bar;

  $set_per_page = Info::getInfoField('paging_product');
  $keyword = SafeQueryString("keyword");
  $result = getTag($keyword, $page, $set_per_page);
  
  $title_bar = $result['title_bar'];
  $plpage = $result['paging'];
  $products = $result['list'];
}

function Search()
{
  global $page, $plpage, $products, $title_bar;

  $key = SafeQueryString('key');
  $title_bar = CAT_SEARCH_RESULT;
    $title_bar = "&nbsp;";
  if(!empty($key))
  {
    $set_per_page = Info::getInfoField('paging_product');
    $result = searchKey($key, $page, $set_per_page);
    $plpage = $result['paging'];
    $products = $result['list'];
  }
}
?>