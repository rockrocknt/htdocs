<?php error_reporting(E_ALL ^ E_DEPRECATED); ?>
<?php
session_start();
global $lg, $prefix_url;

include('./includes/config.php');
include("./includes/functions.php");

if(isset($_GET['lg'])){
    $lg = SafeQueryString("lg");

}
else
    $lg = 'vn';
$prefix_url = $lg=="vn"?"/":"/en/";
// begin cache
    global $cache_filename;
    $cache_time = 0;//24*60*60;
    if(isset($_SESSION["store_login"])){
        $cache_time = 0;
    }

    $cache_folder = 'cache/';

    $cache_filename = $cache_folder.md5($_SERVER['REQUEST_URI']) . "_" . $lg . ".txt";
    $cache_created  = (file_exists($cache_filename)) ? filemtime($cache_filename) : 0;

    if (file_exists($cache_filename) && ((time() - $cache_created) < $cache_time)) {

        //include($cache_filename);
        include('class/HTML.php');
        $string = file_get_contents($cache_filename);
       // $string = trim(preg_replace('/\s\s+/', ' ', $string));
        $string = Minify_HTML::minify($string);
        echo  $string;

    }
    else{
        

//ob_start();
    // end cache

include('language/'.$lg.'.php');
/*
if (!isValidConfigFile("./includes/config.php")) {
    die(LICENSE_ERROR);
}
*/

define('TPL_DIR','templates/site/');
define('SRC_DIR','sources/site/');
define('CLASS_DIR','class/');
include("./includes/va_db.php");

include(CLASS_DIR.'bao_tri.class.php');
include(CLASS_DIR."info.class.php");

include(CLASS_DIR."template.php");
include(CLASS_DIR."cart.class.php");
include(CLASS_DIR."categories.class.php");

include(CLASS_DIR."email.class.php");

include(CLASS_DIR."articles.class.php");

include(CLASS_DIR."albums.class.php");
include(CLASS_DIR."videos.class.php");

include(CLASS_DIR."products.class.php");
include(CLASS_DIR."members.class.php");
include(CLASS_DIR."comment.class.php");
include(CLASS_DIR."imagegroup.class.php");
include(CLASS_DIR."coupon.class.php");

include(CLASS_DIR."include.class.php");

if(BaoTri::Check()){
    include(TPL_DIR.'baotri.php');
}
else{
    global $page, $do, $product, $article, $cat, $act ,$tpl, $db, $title_page, $keywords, $descriptions;
    
    if(isset($_GET['do'])){
        $do = CleanSQLInjection(isset($_GET["do"])?$_GET["do"]:'main');
        $act = CleanSQLInjection(isset($_GET["act"])?$_GET["act"]:"main");
    }
    else{
        

        if(isset($_GET['cat1'])){

            global $cat1;
            $cat1_key = CleanSQLInjection($_GET['cat1']);

            if($cat1_key == "index"){
                $do = "main";
                $act = "main";
            }
            else{
                $sql = "select * from categories where unique_key_$lg='$cat1_key' and pid=121 or pid=122";
                $cat1 = $db->getRow($sql);
                if ($cat1)
                {

                    $title_page = $cat1["title_$lg"];
                    $keywords = $cat1["keyword_$lg"];
                    $descriptions = $cat1["des_$lg"];

                    $sql = "select do, act from component where id=".$cat1['comp'];
                    $r = $db->getRow($sql);
                    $do = $r['do'];
                    $act = $r['act'];

                    if(isset($_GET['cat2'])){
                        global $cat2;
                        $cat2_key = CleanSQLInjection($_GET['cat2']);
                        $sql = "select * from categories where unique_key_$lg='$cat2_key' and pid=" . $cat1['id'];
                        $cat2 = $db->getRow($sql);

                        //seo
                        $title_page = $cat2["title_$lg"];
                        $keywords = $cat2["keyword_$lg"];
                        $descriptions = $cat2["des_$lg"];

                        $sql = "select do, act from component where id=".$cat2['comp'];
                        $r = $db->getRow($sql);
                        $do = $r['do'];
                        $act = $r['act'];

                        if(isset($_GET['cat3'])){
                            global $cat3;
                            $cat3_key = CleanSQLInjection($_GET['cat3']);
                            $sql = "select * from categories where unique_key_$lg='$cat3_key' and pid=" . $cat2['id'];
                            $cat3 = $db->getRow($sql);

                            //seo
                            $title_page = $cat3["title_$lg"];
                            $keywords = $cat3["keyword_$lg"];
                            $descriptions = $cat3["des_$lg"];

                            $sql = "select do, act from component where id=".$cat3['comp'];
                            $r = $db->getRow($sql);
                            $do = $r['do'];
                            $act = $r['act'];

                            if(isset($_GET['cat4'])){
                                global $cat4;
                                $cat4_key = CleanSQLInjection($_GET['cat4']);
                                $sql = "select * from categories where unique_key_$lg='$cat4_key' and pid=" . $cat3['id'];
                                $cat4 = $db->getRow($sql);

                                //seo
                                $title_page = $cat4["title_$lg"];
                                $keywords = $cat4["keyword_$lg"];
                                $descriptions = $cat4["des_$lg"];

                                $sql = "select do, act from component where id=".$cat4['comp'];
                                $r = $db->getRow($sql);
                                $do = $r['do'];
                                $act = $r['act'];

                                if(isset($_GET['cat5'])){
                                    global $cat5;
                                    $cat5_key = CleanSQLInjection($_GET['cat5']);
                                    $sql = "select * from categories where unique_key_$lg='$cat5_key' and pid=" . $cat4['id'];
                                    $cat5 = $db->getRow($sql);

                                    //seo
                                    $title_page = $cat5["title_$lg"];
                                    $keywords = $cat5["keyword_$lg"];
                                    $descriptions = $cat5["des_$lg"];

                                    $sql = "select do, act from component where id=".$cat5['comp'];
                                    $r = $db->getRow($sql);
                                    $do = $r['do'];
                                    $act = $r['act'];
                                }
                            }
                        }
                    }
                    if(isset($_GET['unique_key'])){
                        $act = "detail";
                    }
                }else
                {
                    $do="intro";
                    $act = "404";

                }
              //  var_dump($cat1);
                //seo

            }
        }
        else
        {
            $do = "";
            global $unique_key;
            $QUERY_STRING = $_SERVER["QUERY_STRING"];
            $REQUEST_URI = $_SERVER["REQUEST_URI"];
			$REQUEST_URI = explode("?", $REQUEST_URI);
			$REQUEST_URI = $REQUEST_URI[0];
            // $REQUEST_URI = $url_array[1]  = "/" or "/hoa-hong-ngoai-nhap/" or "/hoa-hong-ngoai-nhap.html"
            // 
            $url_array = explode("/", $REQUEST_URI);
            
            $isDetail = false;
			
            if (!empty($url_array[2])) {
				
				$isDetail = true;
				
                // is product or article detail  : /category/detail.html           				
                if (strpos($url_array[2], '.html') !== false) {
                    
                    $isDetail = true;
                    $url_array = explode(".html",$url_array[2]); 
                    $uniqueKey = $url_array[0];
                    
                    $product = products::getByUniqueKey($uniqueKey);
                    if (!empty($product)) {
                        $do = "products";
                        $act = "detail";
                    
                    }else {                     
					
                        $article = articles::getByUniqueKey($uniqueKey);
                        if (!empty($article)) {
                            $do = "articles";
                            $act = "detail";
                        
                        }
                    }
                } //if (strpos($url_array[1], '.html') !== false)
            } // if (!empty($url_array[1])
			
			// cat
                //
				$REQUEST_URI = $_SERVER["REQUEST_URI"];
				$REQUEST_URI = explode("?", $REQUEST_URI);
				$REQUEST_URI = $REQUEST_URI[0];
            // $REQUEST_URI = $url_array[1]  = "/" or "/hoa-hong-ngoai-nhap/" or "/hoa-hong-ngoai-nhap.html"
            // 
				$url_array = explode("/", $REQUEST_URI);
				
				if (!empty($url_array[1])) {
					if (($REQUEST_URI = "/") && (empty($do) )) {
                        $do = "main";
                        $act = "main";
                    }
                    //echo $url_array[1];                   
                    $category = Categories::getByUniqueKey($url_array[1]);
					
					
						if (!empty($category)) {
                            //seo
							//var_dump($isDetail);
							//echo $do;
                            $cat1 = $category;
							if (!$isDetail) {
								
								$do = $category["do"];
								$act = $category["act"];
							}	
                        
						}
					
				} 
                //}
			
            if ( (!$isDetail) && (empty($do)) ) {
					
                    if ( ($REQUEST_URI = "/") ) {
                        $cat1 = Categories::getById(151);
                        $do = "main";
                        $act = "main";
                    }
            }
            if ( (!$isDetail) ) {
            //seo
                $title_page = $cat1["title_$lg"];
                $keywords = $cat1["keyword_$lg"];
                $descriptions = $cat1["des_$lg"];
            }
            if ($isDetail) {
				//$cat1 =  Categories::getByUniqueKey($url_array[1]); 
                if (!empty($product)) {
                    $title_page = $product["title_$lg"];
                    $keywords = $product["keyword_$lg"];
                    $descriptions = $product["des_$lg"];
                }
                if (!empty($article)) {
					
                    $title_page = $article["title_$lg"];
                    $keywords = $article["keyword_$lg"];
                    $descriptions = $article["des_$lg"];
                }
            }
        }
    }
  
    $page = isset($_GET["page"])?is_numeric($_GET["page"])?$_GET["page"]:'1':'1';
    include "./sources/site/linkDacBiet.php";
	
    if (file_exists("./sources/site/".$do.".php")){
         
        require("./sources/site/".$do.".php");
    }
    else{
       // echo "./sources/site/".$do.".php";
      //  die();
    //  header("Location: /404.php");
    }


    //show
     include(SRC_DIR.'index.php');
}

?>
<?php
    global $cache_filename;
//    file_put_contents($cache_filename, ob_get_contents());

//    ob_end_flush();
    }
?>
