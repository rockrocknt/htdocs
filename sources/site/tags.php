<?
//echo "act=". $act;
if (isCoding()) {
	//	echo "act=". $act;
	}
switch($act){
	case "all":
		ShowAll();
		$tpl="all";
		break;
	
	case "tag":
		Tag();
		$tpl="list";
		break;
	
	case 'detail':
		ShowDetail();
		
		ShowTag();
		$tpl = 'detail';
		break;
	
	case 'search':
		Search();
		$title_page = RESULT_SEARCH;
		$tpl = 'list';
		break;
		
	case 'listall':
		listAll();
		$title_page = RESULT_SEARCH;
		$tpl = 'listall';
		break;	
		
	default:
        global $db,$products;
		ShowList();
		
	//	ShowTag();
       // var_dump($products);
		$tpl="list";
		break;
}

function ShowAll()
{
	global $db,$products,$page,$plpage,$set_per_page,$c,$cat,$title_bar,$lang, $idRoot, $idMenuMain, $index_on;
	global $cat1, $cat2, $lg, $prefix_url, $title_page, $FullUrl, $cat, $keywords, $descriptions;
	 /*
	if(isset($cat2)){
		$cat = $cat2;
		$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li><a title='".$cat1["name_$lg"]."' href='" . $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/'>" .$cat1["name_$lg"]. "</a> >> </li><li><a title='".$cat2["name_$lg"]."' href='" .  $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/" .$cat2["unique_key_$lg"]. "/'>" .$cat2["name_$lg"]. "</a></li></ul>";
	}else{
		$cat = $cat1;
		$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li>Tất cả sản phẩm vali kéo</li></ul>";
		$keywords = "sản phẩm vali kéo";
		$descriptions = "Tất cả những mẫu sản phẩm vali kéo mới nhất thời trang. Đầy đủ kích thước cho bạn chọn lựa khi đi du lịch hoặc đi công tác.";
		$title_page = "Những mẫu vali kéo đẹp thời trang với nhiều kích thước";
	}
    */
	
	//$title_page = $cat["title_$lg"];
	
	$set_per_page = 16;
	
	
    $sql="select id, name_vn, name_en, size, price, code, production_vn, production_en, unique_key_vn, unique_key_en, img, cid, seo_f_vn, seo_f_en, view, vote, is_available, alt1, alt2, alt3, alt4 from products where active=1  order by is_available desc, id desc ";


	$c = $db->numRows($db->query($sql));
	$plpage = plpage_seo_all_products($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$products = $db->getAll($sqlstmt);
		
	}



function listAll()
{
global $db,$products,$page,$plpage,$set_per_page,$c,$cat,$title_bar,$lang, $idRoot, $idMenuMain, $index_on;
	global $cat1, $cat2, $lg, $prefix_url, $title_page, $FullUrl, $cat;
	
	if(isset($cat2)){
		$cat = $cat2;
		$title_bar =  "<ul class='navigation'><li><li>Bạn đang ở: </li><a href='$FullUrl/'>Trang chủ</a> >> </li><li><a title='".$cat1["name_$lg"]."' href='" . $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/'>" .$cat1["name_$lg"]. "</a> >> </li><li><a title='".$cat2["name_$lg"]."' href='" .  $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/" .$cat2["unique_key_$lg"]. "/'>" .$cat2["name_$lg"]. "</a></li></ul>";
	}else{
		$cat = $cat1;
		$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li><a title='".$cat1["name_$lg"]."' href='" . $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/'>" .$cat1["name_$lg"]. "</a></li></ul>";
	}
	
	$title_page = $cat["title_$lg"];
	
	$set_per_page = 120;
	
	
		$sql="select id, name_vn, name_en, size, price, code, production_vn, production_en, unique_key_vn, unique_key_en, img, cid, seo_f_vn, seo_f_en, view, vote, is_available, alt1, alt2, alt3, alt4 from products where active=1  order by is_available desc, id desc ";
	

	$c = $db->numRows($db->query($sql));
	$plpage = plpage_seo($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$products = $db->getAll($sqlstmt);
		
	}
function Tag(){
	$keyword = SafeQueryString("keyword");	
	
	global $db, $products, $page, $plpage, $set_per_page, $c, $cat, $title_bar, $lg, $title_page, $keywords, $descriptions, $tag;
	
	if(!empty($keyword)){
		global $db;
		
		$sql = "select tags_keyword, tags_name from tags where tags_unique_key = '$keyword'";	
		$tag = $db->getRow($sql);
		
		$title_page = $tag["tags_keyword"] . " tất cả thông tin, sản phẩm liên quan";
		
		$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li>Tag</li></ul>";
		
		$set_per_page = 10;
		
		$keyword = $tag["tags_keyword"];
		
		$sql = "select * from products where active = 1 and (name_vn like '%".$keyword."%' or name_en like '%".$keyword."%' or code like '%".$keyword."%' or descs_vn like '%".$keyword."%' or descs_en like '%".$keyword."%')";

		$c = $db->numRows($db->query($sql));
		$plpage = plpage_seo_tag($sql,$page,$set_per_page);
		$sqlstmt = sqlmod($sql,$page,$set_per_page);
		$products = $db->getAll($sqlstmt); 		
		
		//seo
		$keywords = $tag["tags_keyword"] . ', ' . str_replace('-', ' ', $keyword);
		$descriptions = $tag["tags_keyword"] . " tất cả thông tin, sản phẩm bổ ích và đầy đủ liên quan";
	}
}

function ShowTag(){
	global $db, $tags, $lg, $tagSql, $cat1, $cat2, $product, $parentTagSql, $parentTags, $tagCat2;	
	
	if($product){
		$tagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_product = " . $product['id'] . " order by tags_num asc";
		
		$parentTagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat1['id'] . " order by tags_num asc";
		
		$parentTags = $db->getAll($parentTagSql);
		
		if(isset($cat2)){
			$sql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat2['id'] . " order by tags_num asc";
			
			$tagCat2 = $db->getAll($sql);
		}
		
	}else{
		$tagSql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat1['id'] . " order by tags_num asc";
		
		if(isset($cat2)){
			$sql = "select tags_id, tags_keyword, tags_unique_key, tags_name, tags_num from tags where tags_active = 1 and tags_cat = " . $cat2['id'] . " order by tags_num asc";
			
			$tagCat2 = $db->getAll($sql);
		}
		 
	}

	$tags = $db->getAll($tagSql);
}

function ShowList()
{
	
	global $db,$products,$page,$plpage,$set_per_page,$c,$cat,$title_bar,$lang, $idRoot, $idMenuMain, $index_on;
	global $cat1, $cat2, $lg, $prefix_url, $title_page, $FullUrl, $cat;
    if(isset($cat2)){
        $cat = $cat2;

    }else{
        $cat = $cat1;
        $catgory_name = $cat1["name_$lg"];

    }
	/*
	if(isset($cat2)){
		$cat = $cat2;
		$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li><a title='".$cat1["name_$lg"]."' href='" . $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/'>" .$cat1["name_$lg"]. "</a> >> </li><li><a title='".$cat2["name_$lg"]."' href='" .  $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/" .$cat2["unique_key_$lg"]. "/'>" .$cat2["name_$lg"]. "</a></li></ul>";
	}else{
		$cat = $cat1;
		$catgory_name = $cat1["name_$lg"];
		
		if(strpos($catgory_name,'Ví') !== false){
			$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li><a href='$FullUrl/vi-da-nam/' title='Ví da, bóp da nam cao cấp'>Ví da, bóp da nam cao cấp</a> >> </li><li><a title='".$catgory_name."' href='" . $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/'>" .$catgory_name. "</a></li></ul>";
		}else{
			
			$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li><a title='".$catgory_name."' href='" . $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/'>" .$catgory_name. "</a></li></ul>";	
		}
	}
	*/
	
	$title_page = $cat["title_$lg"];
	
	$set_per_page = 12;
	
	$cat_id = $cat['id']==""?"0":$cat['id'];
    $sqltag = "(tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id;
    $sqltag .= " or tag_id_6 = ".$cat_id." or tag_id_7 = ".$cat_id." or tag_id_8 = ".$cat_id." or tag_id_9 = ".$cat_id." or tag_id_10 = ".$cat_id;
    $sqltag .= ")";
    /*
	if($cat_id)
		$sql = "select * from products where active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")  order by id desc";
	
	$typesort=1;

    $typesort = getquery('typesort');

    if ($typesort==2)
    {
        $sql = "select * from products where active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")  order by `view` desc";
    }
    if ($typesort==3)
    {
        $sql = "select * from products where active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.") order by `price` asc";
    }
    if ($typesort==4)
    {
        $sql = "select * from products where active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.") order by `price` desc";
    }
    */

    if ($cat['categories_displaytype_id']==8)
    {
        $sqltag = " price < price_sale ";
        if ($cat["cidlist"] != "")
            $sqltag .= " and cid_cua_groupcha=".$cat["cidlist"];


    }



    $typesort = getquery('typesort');
    if ($typesort == "") $typesort =4;
    //$sql = "select * from products where active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")  order by id desc";
   // $sqlmain = "select * from products where active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")";
    //   $sql = $sqlmain."   order by `price` desc";
    $sqlmain = "select * from products where active = 1 and ".$sqltag."";
	
    if ($typesort==1)
    {
        $sql = $sqlmain."  order by   `is_available` desc, id desc";
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



	$c = $db->numRows($db->query($sql));
	$plpage = plpage_seo_tag_product($sql,$page,$set_per_page);
    ?>

<?
	$sqlstmt = sqlmod($sql,$page,$set_per_page);	
	$products = $db->getAll($sqlstmt);
	
		global $plpage ,  $products ;
    $cat = new Categories(currentCat());


    $set_per_page = Info::getInfoField('paging_product');
    if (ismobile())
    {
        if (!isIpad())
        {
            $set_per_page = Info::getInfoField('paging_product_mobile');
        }
    }

    // $set_per_page = 2;
    // $set_per_page = 200;
    $page   = isset($_GET["page"])  ? $_GET["page"]  : '1';//for paging
    $result = $cat->getListwithSQL($page, $set_per_page,$sql,1);
    //var_dump($result);
	
 //   $plpage = $result['paging'];
    $products = $result['list']; 
}

function Search()
{	
	global $db,$products,$page,$plpage,$set_per_page,$c,$cat,$title_bar,$lang, $idRoot, $index_on;
	
	$key = CleanSQLInjection(trim(isset($_GET['key'])?$_GET['key']:''));
	
	if(!empty($key))
	{
		$title_bar =  RESULT_SEARCH;
	
		$set_per_page = CST_PRODUCT_PAGING_SEARCH; 
		
		$sql = "select id, name_vn, name_en, size, price, production_vn, production_en, unique_key_vn, unique_key_en, img, cid, view, vote, is_available from products where name_vn like '%".$key."%' or name_en like '%".$key."%' or code like '%".$key."%' or descs_vn like '%".$key."%' or descs_en like '%".$key."%' ";
		
		$c = $db->numRows($db->query($sql));
		$plpage = plpage($sql,$page,$set_per_page);
		$sqlstmt = sqlmod($sql,$page,$set_per_page);	
		$products = $db->getAll($sqlstmt);
	}
}

function ShowDetail()
{
	global $db, $product, $products, $cat, $title_bar, $anothers, $idRoot, $idMenuMain, $thumbs, $productActive, $products_anews, $product_2;
	global $cat1, $cat2, $lg, $prefix_url, $title_page, $keywords, $descriptions, $sizes, $FullUrl, $page, $plpagecomment,$set_per_page, $product_comments;
	
	if(isset($cat2)){
		$cat = $cat2;
		$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li><a title='".$cat1["name_$lg"]."' href='" . $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/'>" .$cat1["name_$lg"]. "</a> >> </li><li><a title='".$cat2["name_$lg"]."' href='". $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/" .$cat2["unique_key_$lg"]. "/'>" .$cat2["name_$lg"]. "</a> >> </li>";
	}else{
		$cat = $cat1;
		$title_bar =  "<ul class='navigation'><li>Bạn đang ở: </li><li><a href='$FullUrl/'>Trang chủ</a> >> </li><li><a title='".$cat1["name_$lg"]."' href='" . $FullUrl . $prefix_url .$cat1["unique_key_$lg"]. "/'>" .$cat1["name_$lg"]. "</a> >> </li>";
	}
	$product_key = CleanSQLInjection(trim(isset($_GET['unique_key'])?$_GET['unique_key']:''));
	
	$sql = "select id, name_vn, name_en, code, size, production_vn, production_en, warranty_vn, warranty_en, price, img, img1, img2, img3, img4, img5, img6, img7, img8, img9, img10, unique_key_vn, unique_key_en, descs_vn, descs_en, cid, keyword_vn, keyword_en, title_vn, title_en, seo_f_vn, seo_f_en, des_vn, des_en, group_name_vn, group_name_en, vote, is_available, alt1, alt2, alt3, alt4  from products where active=1 and unique_key_$lg='$product_key' and cid=" . $cat['id'];
	
	$productActive = $product = $db->getRow($sql);
	$product_id = $product['id'];
	
	$title_bar .= "<li>" . $productActive["name_$lg"] . "</li></ul>";
	
	CountProductView($product_id, $db);
	//seo
	$title_page = $product["title_$lg"];
	$keywords = $product["keyword_$lg"];
	$descriptions = $product["des_$lg"];
	
	//$sql="select view, id, name_vn, name_en, size, price, img, unique_key_vn, unique_key_en, cid, group_name_vn, group_name_en from products where active=1 and cid=".$product['cid']." and id<>$product_id order by num asc, view desc, id desc limit 0,6";
	$sql="select * from products where active = 1 and id <> ".$product['id']." and cid=".$product['cid']." and price<=".$product['price']." order by price desc limit 0,6";
	$products_anews = $db->getAll($sql);
	
	$sql="select p.* from products p, categories c where p.cid = c.id and active = 1 and p.id<>".$product['id']." and cid=".$product['cid']." and price>".$product['price']." order by price asc limit 0,6";
 	$product_2 = $db->getAll($sql);

	$set_per_page = CST_PRODUCT_PAGING_COMMENT;
	$sql = "select cmt_content, cmt_insert_date, (select name from member where id = cmt_mem_id) as mem_name from comments where cmt_pro_id = ".$product['id']." and cmt_active = 1 order by cmt_id desc";
	
	$plpagecomment = plpage_seo($sql,$page,$set_per_page);
	$sqlstmt = sqlmod($sql,$page,$set_per_page);
	$product_comments = $db->getAll($sqlstmt);
}

function CountProductView($ProductId, $db){
	$UniqueSession = "ProductsAreViewed";
	$ProductIdString = "[" . $ProductId . "]";
	
	if(!isset($_SESSION[$UniqueSession]))
	{
		$_SESSION[$UniqueSession] = $ProductIdString;
		
		$sql = "update products set view = view + 1 where id = $ProductId";	
		$db->query($sql);
	}
	else
	{
		$mystring = $_SESSION[$UniqueSession];
		$findme = $ProductIdString;
		$pos = strpos($mystring, $findme);
		
		if($pos === false)
		{
			$_SESSION[$UniqueSession] .= $ProductIdString;
			
			$sql = "update products set view = view + 1 where id = $ProductId";	
			$db->query($sql);
		}
	}
}

?>