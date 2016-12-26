<?php
function isIpad()
{
    $isiPad = (bool) strpos($_SERVER['HTTP_USER_AGENT'],'iPad');
    return $isiPad;
}
function isValidConfigFile($path) {
    $config_file_content = file_get_contents($path);
    /*
    if (strstr($config_file_content, "This is new config file, written by Mr.Holmes") == false && strstr($config_file_content, "E8E1C5E08465541CAAQAAAAQAAAABHAAAACABAAAAAAAAAD") == false)
        return false;
    */
    return true;
}

function getItemByKey($key) {
    global $do, $db, $lg;
    $cat = new Categories(currentCat());
    $id = $cat->getID();

    if ($do=='articles')
        $table = "articles";
    else
        $table = "products";

    $sql = "select * from $table where unique_key_$lg='$key' and cid=$id";
    return $db->getRow($sql);
}

function getItemByKeywithtable($table,$key) {
    global $do, $db, $lg;
    $cat = new Categories(currentCat());
    $id = $cat->getID();
    $sql = "select * from $table where unique_key_$lg='$key' and cid=$id";

    return $db->getRow($sql);
}

function changeLanguage() {
    global $cat1, $cat2, $cat3, $cat4, $cat5, $do, $act, $lg, $FullUrl;

    $dlg = $lg=="vn"?"en":"vn";
    $link = "";

    if(isset($_GET['cat1']))
    {
        $link .= $cat1["unique_key_$dlg"];

        if(isset($_GET['page']) && !isset($_GET['cat2'])){
            $trang = $lg=="vn"?"page":"trang";
            $link .= "-$trang-" . $_GET['page'];
        }

        $link .= "/";

        if($_GET['cat1'] == "index")
            $link = "";
    }

    if(isset($_GET['cat2']))
    {
        $link .= $cat2["unique_key_$dlg"];

        if(isset($_GET['page']) && !isset($_GET['cat3'])){
            $trang = $lg=="vn"?"page":"trang";
            $link .= "-$trang-" . $_GET['page'];
        }

        $link .= "/";

        if($_GET['cat1'] == "index")
            $link = "";
    }

    if(isset($_GET['cat3']))
    {
        $link .= $cat3["unique_key_$dlg"];

        if(isset($_GET['page']) && !isset($_GET['cat4'])){
            $trang = $lg=="vn"?"page":"trang";
            $link .= "-$trang-" . $_GET['page'];
        }

        $link .= "/";

        if($_GET['cat1'] == "index")
            $link = "";
    }

    if(isset($_GET['cat4']))
    {
        $link .= $cat4["unique_key_$dlg"];

        if(isset($_GET['page']) && !isset($_GET['cat5'])){
            $trang = $lg=="vn"?"page":"trang";
            $link .= "-$trang-" . $_GET['page'];
        }

        $link .= "/";

        if($_GET['cat1'] == "index")
            $link = "";
    }

    if(isset($_GET['cat5']))
    {
        $link .= $cat5["unique_key_$dlg"];

        if(isset($_GET['page'])){
            $trang = $lg=="vn"?"page":"trang";
            $link .= "-$trang-" . $_GET['page'];
        }

        $link .= "/";

        if($_GET['cat1'] == "index")
            $link = "";
    }

    if(isset($_GET['unique_key'])){
        if($do == "articles"){
            global $article;
            if($article->getReverseUniqueKey() == "")
                $link = "";
            else
                $link .= $article->getReverseUniqueKey(). ".html";
        }
        else if($do=="products"){
            global $product;
            if($product->getReverseUniqueKey() == "")
                $link = "";
            else
                $link .= $product->getReverseUniqueKey(). ".html";
        }
        else if($do=="video"){
            global $video;
            if($video->getReverseUniqueKey() == "")
                $link = "";
            else
                $link .= $video->getReverseUniqueKey() . ".html";
        }
        else if($do=="albums"){
            global $album;
            if($album->getReverseUniqueKey() == "")
                $link = "";
            else
                $link .= $album->getReverseUniqueKey(). ".html";
        }
    }

    if($lg == "vn"){
        $arr["link_vn"] = "";
        $arr["flag_link"] = $arr["link_en"] = $FullUrl."/en/".$link;
        $arr["flag_img"] = "en";
        $arr["flag_title"] = "Tiếng Anh";
    }
    else if($lg=="en"){
        $arr["link_en"] = "";
        $arr["flag_link"] = $arr["link_vn"] = $FullUrl."/".$link;
        $arr["flag_img"] = "vi";
        $arr["flag_title"] = "Vietnamese";
    }

    return $arr;
}
function getquery($name)
{
    if (isset($_GET[$name]))
        return $_GET[$name];
    else return "";
}
function getisset($name)
{
    if (isset($name))
        return $name;
    else return "";
}
function getWidgetCategories($id) {
    global $db, $lg;

    $sql = "select * from categories where name_$lg<>'' and id in (select catid as id from widgets_categories where active=1 and widgetid=$id) order by num asc, id asc";
    return $db->getAll($sql);
}

function getWidgetArticles($type, $limit) {
    global $db, $lg;

    if ($type == 1)
        $sql = "select * from articles where active=1 and name_$lg<>'' and not_in_widget=0 order by rand() limit $limit";
    else if ($type == 2)
        $sql = "select * from articles where active=1 and name_$lg<>'' and not_in_widget=0 order by num asc, publish_date desc limit $limit";
    else if ($type == 3)
        $sql = "select * from articles where active=1 and name_$lg<>'' and not_in_widget=0 order by view desc limit $limit";
    else if ($type == 4)
        $sql = "select * from articles where active=1 and name_$lg<>'' and hot=1 and not_in_widget=0 order by num asc, publish_date desc limit $limit";

    return $db->getAll($sql);
}

function getWidgetProducts($type, $limit) {
    global $db, $lg;

    if ($type == 1)
        $sql = "select * from products where active=1 and name_$lg<>'' and not_in_widget=0 order by rand() limit $limit";
    else if ($type == 2)
        $sql = "select * from products where active=1 and name_$lg<>'' and not_in_widget=0 order by num asc, id desc limit $limit";
    else if ($type == 3)
        $sql = "select * from products where active=1 and name_$lg<>'' and not_in_widget=0 order by view desc limit $limit";
    else if ($type == 4)
        $sql = "select * from products where active=1 and name_$lg<>'' and not_in_widget=0 and price_sale>0 order by num asc, id desc limit $limit";
    else if ($type == 5)
        $sql = "select * from products where active=1 and name_$lg<>'' and not_in_widget=0 and bestseller=1 order by num asc, id desc limit $limit";

    return $db->getAll($sql);
}

function getHTMLContent($id) {
    global $db, $lg;

    $sql = "select content_$lg from widgets where id=$id";
    return $db->getRow($sql);
}

function getOptinProgram() {
    global $db, $lg;

    $sql = "select * from optin_type where otn_type_active=1 and otn_type_name_$lg<>'' order by num asc, id desc";
    return $db->getRow($sql);
}

function getWidgets($cid, $limit=0) {
    global $db, $lg;

    $cat = new Categories(currentCat());
    $id = $cat->getID();
    $pid = $cat->getCID();
    $gid = $cat->getGrandID();

    $sql = "select w.*, alias from widgets w, modules_widget m where cid=$cid and w.active=1 and w.name_$lg<>'' and comp=m.id and w.id not in (select widgetid as id from widgets_not_display_categories where active=1 and (catid=$id or catid in (select id from categories where (id=$pid or id=$gid)))) order by num asc, id asc";
    if ($limit > 0)
        $sql .= " limit $limit";
    return $db->getAll($sql);
}

function getSupporters() {
    global $db, $lg;

    $sql = "select * from nicks where active=1 and name_$lg<>'' order by num asc, id desc";
    return $db->getAll($sql);
}

function getImagesFromGroup($alias, $limit=0) {
    global $db;
    $sql = "select i.* from img i, img_group ig where i.active=1 and (i.cid = ig.id) and (ig.alias ='$alias') order by i.num asc, i.id desc";

    if ($limit > 0)
        $sql .= " limit $limit";

    return $db->getAll($sql);
}

function insertLog($note) {
    if (isset($_SESSION['admin_id']))
    {
        $arr['user_id'] = $_SESSION['admin_id'];
        $arr['note'] = $note;
        $arr['ip_address'] = $_SERVER["REMOTE_ADDR"];

        vaInsert('user_activity_log', $arr);
    }
}

function getString($str, $start, $end)
{
    $pos1 = strpos($str, $start);
    $pos2 = strpos($str, $end);

    return substr($str, $pos1+strlen($start), $pos2-$pos1-strlen($start));
}

function searchKey($key, $page, $set_per_page)
{
    global $db, $lg, $do;

    if ($do=='articles')
        $table = "articles";
    else
        $table = "products";

    $sql="select * from $table where active=1 and (name_$lg like '%".$key."%' or short_$lg like '%".$key."%' or content_$lg like '%".$key."%'  or unique_key_vn like '%".vietnamese_permalink($key)."%' ) order by num asc, id desc";
    $arr['paging'] = plpage($sql, $page, $set_per_page);
    $sqlstmt = sqlmod($sql, $page, $set_per_page);
    $arr['list'] = $db->getAll($sqlstmt);

    return $arr;
}

function getTag($keyword, $page, $set_per_page)
{
    global $db, $FullUrl, $prefix_url, $lg, $do;

    if ($do=='articles')
        $table = "articles";
    else
        $table = "products";

    $sql = "select * from tags where unique_key_tag = '$keyword'";
    $getTag = $db->getRow($sql);
    $idTag = $getTag['idtag'];

    $arr['title_bar'] = "<ul class='navigation'><li><a href='$FullUrl$prefix_url'>".($lg=='vn'?"Trang chủ":"Home")."</a></li></ul>";

    $sql = "select * from $table where (id in (select idart from tags_art where idtag=$idTag and post_in like '$table')) and name_$lg<>''";
    $arr['paging'] = plpage_tag($sql, $page, $set_per_page);
    $sqlstmt = sqlmod($sql, $page, $set_per_page);
    $arr['list'] = $db->getAll($sqlstmt);

    return $arr;
}

function getFlash($url, $w, $h)
{
    $embed = "<embed width='".$w."' height='".$h."' wmode='opaque' type='application/x-shockwave-flash' src='".$url."'>";
    return $embed;
}

function showRobotsMeta()
{
    global $do, $product, $article;
    $noindex = Info::getInfoField('noindex');
    $noindexArt = $noindexPro = 0;

    if ($article) {
        $noindexArt = $article->getIndex();
    } elseif ($product) {
        $noindexPro = $product->getIndex();
    }

    if ($noindex == 1 || $noindexPro==1 || $noindexArt==1 || $do=="member" || $do=="cart")
        print "<meta name=\"robots\" content=\"NOINDEX, NOFOLLOW\" />\n";
    else
        print "<meta name=\"robots\" content=\"index,follow\" />\n";
}

function getImgYoutube($url)
{
    $parse = parse_url($url);
    $domain =  $parse['host'];

    if($domain=="www.youtube.com")
    {
        parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
        $idurl= $my_array_of_vars['v'];

        $string = "http://img.youtube.com/vi/$idurl/0.jpg";
        return $string;
    }
    else
    {
        echo "Cần 1 plugin video!";
    }
}

function currentCat()
{
    return Categories::getCurrentCat();
}

function navigationBar()
{
    return Categories::getNavigationBar('nav-bar', '');
}

function getFavicon()
{
    global $FullUrl;
    $favicon = Info::getInfoField('favicon');

    if (file_exists($favicon))
        print "<link rel=\"shortcut icon\" href=\"$FullUrl/$favicon\" type=\"image/x-icon\" />\n";
}

function echoPrice($price)
{

    echo formatPrice($price);
    /*
	if ($price == SITE_CALL)
		return $price;
		
	return $price.CST_CURRENCY_CODE;
    */
}

function formatPrice($price)
{
    if($price==0)
        $price = SITE_CALL;
    else
        $price = number_format($price,0,",",".")." ".SITE_CURRENCY;

    return $price;
}

function getTimThumb($img, $w, $h=0)
{
    global $FullUrl;

    $img = GetImage($img);
    return $FullUrl."/timthumb.php?src=".$img."&amp;w=".$w."&amp;h=".$h."&amp;zc=1&amp;a=tc";
}

function getDomainName()
{
    /*** check for https ***/
    $protocol = 'http';//$_SERVER['HTTPS'] == 'on' ? 'https' : 'http';
    /*** return the full address ***/
    return $protocol.'://'.$_SERVER['HTTP_HOST'];
}

function GetFullDomain()
{
    return GetDomain(GetFullUrl());
}

function GetDomain($url)
{
    $nowww = preg_replace('[www\.]','',$url);
    $domain = parse_url($nowww);
    if(!empty($domain["host"]))
        return $domain["host"];
    else
        return $domain["path"];
}

function GetFullUrl(){
    $s = empty($_SERVER["HTTPS"]) ? '' : ($_SERVER["HTTPS"] == "on") ? "s" : "";
    $protocol = strleft(strtolower($_SERVER["SERVER_PROTOCOL"]), "/").$s;
    $port = ($_SERVER["SERVER_PORT"] == "80") ? "" : (":".$_SERVER["SERVER_PORT"]);

    return $protocol."://".$_SERVER['SERVER_NAME'].$port.$_SERVER['REQUEST_URI'];
}

function strleft($s1, $s2) {
    return substr($s1, 0, strpos($s1, $s2));
}

function SafeFormValue($value)
{
    return CleanSQLInjection(trim(isset($_POST[$value])?$_POST[$value]:''));
}

function SafeQueryString($value)
{
    return CleanSQLInjection(trim(isset($_GET[$value])?$_GET[$value]:''));
}

function IsValidEmail($email){
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function AlertMessage($mess){
    return '<script language="javascript">alert("'.$mess.'");</script>';
}

function CleanSQLInjection($string)
{
    $string = strip_tags($string);

    if(get_magic_quotes_gpc())  // prevents duplicate backslashes
    {
        $string = stripslashes($string);
    }

    $badWords = array("/delete/i", "/update/i","/union/i","/insert/i","/drop/i","/http/i","/--/i");
    $string = preg_replace($badWords, "", $string);

    if(!is_numeric($string))
    {
        $string = mysql_real_escape_string($string);
    }

    return $string;
}

function GetImage($path)
{
    global $FullUrl;
    if ($path=="") return  CST_NO_IMAGE_PATH;
    if ($path=="/") return CST_NO_IMAGE_PATH;

    if(!file_exists($path))
    {
        $path = CST_NO_IMAGE_PATH;
    }


    return $path;
}
function GetImageFULLURL($path)
{
    global $FullUrl;
    if ($path=="") return  $FullUrl."/". CST_NO_IMAGE_PATH;
    if ($path=="/") return $FullUrl."/". CST_NO_IMAGE_PATH;

    if(!file_exists($path))
    {
        $path = $FullUrl."/". CST_NO_IMAGE_PATH;
    }
    return $FullUrl."/".$path;
}

function RenameFile($filename){
    $filename = str_replace("& ", "", $filename);

    $filename = str_replace(" &", "", $filename);

    $filename = str_replace("&", "", $filename);

    $filename = str_replace(",", "", $filename);

    $filename = str_replace(" - ", "-", $filename);

    $filename = str_replace(" -", "-", $filename);

    $filename = str_replace("- ", "-", $filename);

    $filename = str_replace(" ", "-", $filename);

    return $filename;
}

function SubStrEx($str, $length){
    if(strlen($str) <= $length)
        return $str;

    $pos = strpos($str, " " , $length);
    if($pos >0 )
        return substr($str, 0, $pos) . ' ...';
    else
        return $str;
}

function FormatDate($date){
    $day = substr($date,8,2);
    $mon = substr($date,5,2);
    $year = substr($date,0,4);
    return $day.'-'.$mon.'-'.$year;
}

function formatDateTime($date){
    $day = substr($date,8,2);
    $mon = substr($date,5,2);
    $year = substr($date,0,4);
    $time = substr($date, 11, 8);
    return $time.' '.$day.'-'.$mon.'-'.$year;
}

function reverseDate($date){
    $date = explode('-', $date);
    return $date[2].'-'.$date[1].'-'.$date[0];
}

function SoSanhDate($date1,$date2)
{
    $value =0;
    if ( strtotime($date1) > strtotime($date2)||strtotime($date1) == strtotime($date2) ) {
        $value =1;
    }
    return $value;
}

function sql_injection($str){
    if(!ereg('[\\\'\"<>:;,=&]', $str))
    {
        return $str;
    }else
    {
        echo '<script>window.location="index.php";</script>';
    }
}
function  plpage_seo_tag_product($sqlstmt, $page, $set_per_page)
{

    global $db, $do, $prefix_url, $lg, $FullUrl, $cat1, $cat2, $cat3, $cat4, $cat5;

    $trang = paging;
    $cat1key = $cat1["unique_key_$lg"];
    $cat2key = $cat2["unique_key_$lg"];
    $cat3key = $cat3["unique_key_$lg"];
    $cat4key = $cat4["unique_key_$lg"];
    $cat5key = $cat5["unique_key_$lg"];

    if ($cat5){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key/$cat5key";
    } else if ($cat4){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key";
    } else if ($cat3){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key";
    } else if ($cat2){
        $my_url = "$prefix_url$cat1key/$cat2key";
    }
    else
        $my_url = "$prefix_url$cat1key";

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);

    $p=ceil($rows/$set_per_page);

    $str='';

    if($p<=1) return $str;

    if ($p) $str = '<div class="Paging"><ul>';

    $first = 0;
    $last=0;
    $j=1; $k=$p;

    if ($page>1){
        $pageprev=$page-1;
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url . '/' ."\" class=\"PrevBtn\">First</a></li>";
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url . ($pageprev==1?'':("-$trang-".$pageprev)) . '/' ."\" class=\"PrevBtn\">Prev</a></li>";
    }

    for($i=($page-2>1)?$page-2:1;$i<=$page+2 && $i<=$k;$i++){
        $first = ' class="First"';
        if($i>1)
            $first = '';
        if ($i==$page)
            $str .= "<li$first><a href='#' class='Active'>$i</a></li>";
        else {
            $str .= "<li$first><a href=\"". $FullUrl . $my_url . ($i==1?'':("-$trang-".$i)) . '/' ."\">$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $str .= '<li><a href="'. $FullUrl . $my_url . "-$trang-" . $pagenext . "/" . "\" class=\"NextBtn\">Next</a></li>";
        $str .= '<li><a href="'. $FullUrl . $my_url . "-$trang-" . $p . "/" . "\" class=\"NextBtn\">Last</a></li>";
    }

    $str .= "</ul></div>";

    return $str;
}
function plpage_seo($sqlstmt, $page, $set_per_page)
{
    global $db, $do, $prefix_url, $lg, $FullUrl, $cat1, $cat2, $cat3, $cat4, $cat5;

    $trang = paging;
    $cat1key = $cat1["unique_key_$lg"];
    $cat2key = $cat2["unique_key_$lg"];
    $cat3key = $cat3["unique_key_$lg"];
    $cat4key = $cat4["unique_key_$lg"];
    $cat5key = $cat5["unique_key_$lg"];

    if ($cat5){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key/$cat5key";
    } else if ($cat4){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key";
    } else if ($cat3){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key";
    } else if ($cat2){
        $my_url = "$prefix_url$cat1key/$cat2key";
    }
    else
        $my_url = "$prefix_url$cat1key";

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);
    $p=ceil($rows/$set_per_page);

    $str='';
    if($p<=1) return $str;

    if ($p) $str = '<div class="Paging"><ul>';

    $first = 0; $last=0;
    $j=1; $k=$p;

    if ($page>1){
        $pageprev=$page-1;
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url . '/' ."\" class=\"PrevBtn\">First</a></li>";
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url . ($pageprev==1?'':("-$trang-".$pageprev)) . '/' ."\" class=\"PrevBtn\">Prev</a></li>";
    }

    for($i=($page-2>1)?$page-2:1;$i<=$page+2 && $i<=$k;$i++){
        $first = ' class="First"';
        if($i>1)
            $first = '';
        if ($i==$page)
            $str .= "<li$first><a href='#' class='Active'>$i</a></li>";
        else {
            $str .= "<li$first><a href=\"". $FullUrl . $my_url . ($i==1?'':("-$trang-".$i)) . '/' ."\">$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $str .= '<li><a href="'. $FullUrl . $my_url . "-$trang-" . $pagenext . "/" . "\" class=\"NextBtn\">Next</a></li>";
        $str .= '<li><a href="'. $FullUrl . $my_url . "-$trang-" . $p . "/" . "\" class=\"NextBtn\">Last</a></li>";
    }

    $str .= "</ul></div>";
    return $str;
}

function plpage_seo_article($sqlstmt, $page, $set_per_page)
{
    global $db, $do, $prefix_url, $lg, $FullUrl, $cat1, $cat2, $cat3, $cat4, $cat5;

    $trang = paging;
    $cat1key = $cat1["unique_key_$lg"];
    $cat2key = $cat2["unique_key_$lg"];
    $cat3key = $cat3["unique_key_$lg"];
    $cat4key = $cat4["unique_key_$lg"];
    $cat5key = $cat5["unique_key_$lg"];

    if ($cat5){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key/$cat5key";
    } else if ($cat4){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key";
    } else if ($cat3){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key";
    } else if ($cat2){
        $my_url = "$prefix_url$cat1key/$cat2key";
    }
    else
        $my_url = "$prefix_url$cat1key";

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);
    $p=ceil($rows/$set_per_page);

    $str='';
    if($p<=1) return $str;

    if ($p) $str = '<div class="Paging"><ul>';

    $first = 0; $last=0;
    $j=1; $k=$p;

    if ($page>1){
        $pageprev=$page-1;
        $str .= '<li class="First"><a href="/t'. $FullUrl . $my_url . '/' ."\" class=\"PrevBtn\">First</a></li>";
        $str .= '<li class="First"><a href="/t'. $FullUrl . $my_url . ($pageprev==1?'':("/$trang-".$pageprev))  ."\" class=\"PrevBtn\">Prev</a></li>";
    }

    for($i=($page-2>1)?$page-2:1;$i<=$page+2 && $i<=$k;$i++){
        $first = ' class="First"';
        if($i>1)
            $first = '';
        if ($i==$page)
            $str .= "<li$first><a href='#' class='Active'>$i</a></li>";
        else {
            $str .= "<li$first><a href=\"/t". $FullUrl . $my_url . ($i==1?'':("/$trang-".$i))   ."\">$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $str .= '<li><a href="/t'. $FullUrl . $my_url . "/$trang-" . $pagenext . "" . "\" class=\"NextBtn\">Next</a></li>";
        $str .= '<li><a href="/t'. $FullUrl . $my_url . "/$trang-" . $p . "" . "\" class=\"NextBtn\">Last</a></li>";
    }

    $str .= "</ul></div>";
    return $str;
}

function plpage_seo_sort($sqlstmt, $page, $set_per_page)
{
	
    global $db, $do, $prefix_url, $lg, $FullUrl, $cat1, $cat2, $cat3, $cat4, $cat5;

    $trang = paging;
    $cat1key = $cat1["unique_key_$lg"];
	
    $cat2key = $cat2["unique_key_$lg"];
    $cat3key = $cat3["unique_key_$lg"];
    $cat4key = $cat4["unique_key_$lg"];
    $cat5key = $cat5["unique_key_$lg"];
    $typesort = 1;
    $typesorttext = "";
    $typesort = getquery('typesort');

    if ($typesort==1)
    {
        $typesorttext = "moinhat";
    }

    if ($typesort==2)
    {
        $typesorttext = "xemnhieu";
    }
    if ($typesort==3)
    {
        $typesorttext = "pricedown";
    }
    if ($typesort==4)
    {
        $typesorttext = "priceup";
    }
    if ($typesorttext != "")
    {
        $typesorttext = "-".$typesorttext;
    }

    if ($cat5){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key/$cat5key";
    } else if ($cat4){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key";
    } else if ($cat3){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key";
    } else if ($cat2){
        $my_url = "$prefix_url$cat1key/$cat2key";
    }
    else
        $my_url = "$prefix_url$cat1key";

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);
    $p=ceil($rows/$set_per_page);

    $str='';
    if($p<=1) return $str;

    if ($p) $str = '<ul>';

    $first = 0; $last=0;
    $j=1; $k=$p;
	
	$typesorttext = "";
	$my_url = "/".$cat1key."/";
	$queryArr = getQueryArray();
	$searchTerm = "";
	if (!empty($queryArr)) {
		foreach ($queryArr as $key => $value) {
			if (!empty($key) && ($key != 'page') ){
				$searchTerm .= '&' . $key . '=' . $value;
			}
		}
	}
	$my_url .= "?" . $searchTerm;
	
    if ($page>1){
        $pageprev=$page-1;
        //$str .= '<li class="First"><a href="'. $FullUrl . $my_url. $typesorttext . '/' ."\" class=\"PrevBtn\">First</a></li>";
        //$str .= '<li class="First"><a href="'. $FullUrl . $my_url. $typesorttext . ($pageprev==1?'':("-$trang-".$pageprev)) . '/' ."\" class=\"PrevBtn\">Prev</a></li>";
		
		$str .= '<li class="First"><a href="'. $my_url ."\" class=\"PrevBtn\">First</a></li>";
        $str .= '<li class="First"><a href="'. $my_url . ($pageprev==1? '': ("&page=".$pageprev))   ."\" class=\"PrevBtn\">Prev</a></li>";
    }

    for($i=($page-2>1)?$page-2:1;$i<=$page+2 && $i<=$k;$i++){
        $first = ' class="First"';
        if($i>1)
            $first = '';
		
        if ($i==$page)
		{
			$first = "";
            $str .= "<li$first class='Active'>$i</li>";
		}
        else {
            $str .= "<li$first><a href=\"". $my_url . ($i==1? '' : ("&page=".$i))   ."\">$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $str .= '<li><a href="'.  $my_url . ("&page=".$pagenext) . "\" class=\"NextBtn\">Next</a></li>";
        $str .= '<li><a href="'.  $my_url . ("&page=".$p) . "\" class=\"NextBtn\">Last</a></li>";
    }

    $str .= "</ul>";
    return $str;
}

function plpage_seo_sort_bak_not_use($sqlstmt, $page, $set_per_page)
{
    global $db, $do, $prefix_url, $lg, $FullUrl, $cat1, $cat2, $cat3, $cat4, $cat5;

    $trang = paging;
    $cat1key = $cat1["unique_key_$lg"];
	
    $cat2key = $cat2["unique_key_$lg"];
    $cat3key = $cat3["unique_key_$lg"];
    $cat4key = $cat4["unique_key_$lg"];
    $cat5key = $cat5["unique_key_$lg"];
    $typesort = 1;
    $typesorttext = "";
    $typesort = getquery('typesort');

    if ($typesort==1)
    {
        $typesorttext = "moinhat";
    }

    if ($typesort==2)
    {
        $typesorttext = "xemnhieu";
    }
    if ($typesort==3)
    {
        $typesorttext = "pricedown";
    }
    if ($typesort==4)
    {
        $typesorttext = "priceup";
    }
    if ($typesorttext != "")
    {
        $typesorttext = "-".$typesorttext;
    }

    if ($cat5){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key/$cat5key";
    } else if ($cat4){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key";
    } else if ($cat3){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key";
    } else if ($cat2){
        $my_url = "$prefix_url$cat1key/$cat2key";
    }
    else
        $my_url = "$prefix_url$cat1key";

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);
    $p=ceil($rows/$set_per_page);

    $str='';
    if($p<=1) return $str;

    if ($p) $str = '<div class="Paging"><ul>';

    $first = 0; $last=0;
    $j=1; $k=$p;
	
    if ($page>1){
        $pageprev=$page-1;
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url. $typesorttext . '/' ."\" class=\"PrevBtn\">First</a></li>";
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url. $typesorttext . ($pageprev==1?'':("-$trang-".$pageprev)) . '/' ."\" class=\"PrevBtn\">Prev</a></li>";
    }

    for($i=($page-2>1)?$page-2:1;$i<=$page+2 && $i<=$k;$i++){
        $first = ' class="First"';
        if($i>1)
            $first = '';
        if ($i==$page)
            $str .= "<li$first><a href='#' class='Active'>$i</a></li>";
        else {
            $str .= "<li$first><a href=\"". $FullUrl . $my_url .$typesorttext. ($i==1?'':("-$trang-".$i)) . '/' ."\">$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $str .= '<li><a href="'. $FullUrl . $my_url .$typesorttext. "-$trang-" . $pagenext . "/" . "\" class=\"NextBtn\">Next</a></li>";
        $str .= '<li><a href="'. $FullUrl . $my_url .$typesorttext. "-$trang-" . $p . "/" . "\" class=\"NextBtn\">Last</a></li>";
    }

    $str .= "</ul></div>";
    return $str;
}


function plpage_seo_sort_locgia($sqlstmt, $page, $set_per_page)
{
    global $db, $do, $prefix_url, $lg, $FullUrl, $cat1, $cat2, $cat3, $cat4, $cat5;

    $trang = paging;
    $cat1key = $cat1["unique_key_$lg"];
    $cat2key = $cat2["unique_key_$lg"];
    $cat3key = $cat3["unique_key_$lg"];
    $cat4key = $cat4["unique_key_$lg"];
    $cat5key = $cat5["unique_key_$lg"];
    $typesort = 1;
    $typesorttext = "price";
    $min = getquery('min');
    $max = getquery('max');

    $typesorttext = "-price-".$min."-".$max;

    if ($cat5){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key/$cat5key";
    } else if ($cat4){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key/$cat4key";
    } else if ($cat3){
        $my_url = "$prefix_url$cat1key/$cat2key/$cat3key";
    } else if ($cat2){
        $my_url = "$prefix_url$cat1key/$cat2key";
    }
    else
        $my_url = "$prefix_url$cat1key";

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);
    $p=ceil($rows/$set_per_page);

    $str='';
    if($p<=1) return $str;

    if ($p) $str = '<div class="Paging"><ul>';

    $first = 0; $last=0;
    $j=1; $k=$p;

    if ($page>1){
        $pageprev=$page-1;
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url. $typesorttext . '/' ."\" class=\"PrevBtn\">First</a></li>";
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url. $typesorttext . ($pageprev==1?'':("-$trang-".$pageprev)) . '/' ."\" class=\"PrevBtn\">Prev</a></li>";
    }

    for($i=($page-2>1)?$page-2:1;$i<=$page+2 && $i<=$k;$i++){
        $first = ' class="First"';
        if($i>1)
            $first = '';
        if ($i==$page)
            $str .= "<li$first><a href='#' class='Active'>$i</a></li>";
        else {
            $str .= "<li$first><a href=\"". $FullUrl . $my_url .$typesorttext. ($i==1?'':("-$trang-".$i)) . '/' ."\">$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $str .= '<li><a href="'. $FullUrl . $my_url .$typesorttext. "-$trang-" . $pagenext . "/" . "\" class=\"NextBtn\">Next</a></li>";
        $str .= '<li><a href="'. $FullUrl . $my_url .$typesorttext. "-$trang-" . $p . "/" . "\" class=\"NextBtn\">Last</a></li>";
    }

    $str .= "</ul></div>";
    return $str;
}



function plpage($sqlstmt, $page, $set_per_page)
{
    global $db, $do;

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);
    $p=ceil($rows/$set_per_page);

    $str='';
    if ($p <= 1)
        return $str;

    if ($p)
        $str = '<div class="pagination"><ul class="pages">';

    $first = 0; $last=0;
    $j=1; $k=$p;

    if ($page>1){
        $pageprev=$page-1;
        $query_str = explode("&page=", $_SERVER['QUERY_STRING']);
        $str .= '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?'.$query_str[0]."\">First</a></li>";
        $str .= '<li class="prev"><a href="'.$_SERVER['SCRIPT_NAME'].'?'.$query_str[0]."&page=$pageprev\">Prev</a></li>";
    }

    for($i=($page-9>1)?$page-9:1;$i<=$page+9 && $i<=$k;$i++){
        if ($i==$page)
            $str .= "<li><a href='#' class='active'>$i</a></li>";
        else {
            $query_str = explode("&page=", $_SERVER['QUERY_STRING']);
            $str .= "<li><a href=\"".$_SERVER['SCRIPT_NAME']."?".$query_str[0]."&page=$i\">$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $query_str = explode("&page=", $_SERVER['QUERY_STRING']);
        $str .= '<li class="next"><a href="'.$_SERVER['SCRIPT_NAME'].'?'.$query_str[0]."&page=$pagenext\">Next</a></li>";
        $str .= '<li><a href="'.$_SERVER['SCRIPT_NAME'].'?'.$query_str[0]."&page=$p\">Last</a></li>";
    }

    $str .= '</ul></div>';
    return $str;
}

function sqlmod($sqlstmt, $page, $set_per_page){ //modified sql query danh cho phan trang
    $from = ($page-1)*$set_per_page;
    return $sqlstmt." LIMIT ".$from." ,".$set_per_page;
}

function plpage_tag($sqlstmt, $page, $set_per_page)
{
    global $db, $do, $prefix_url, $lg, $FullUrl;

    $trang = paging;
    $keyword = SafeQueryString('keyword');

    if ($do == 'products')
        $my_url = $lg=="vn"?"/tag/san-pham/$keyword":"/en/tag/products/$keyword";
    else
        $my_url = $lg=="vn"?"/tag/tin-tuc/$keyword":"/en/tag/articles/$keyword";

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);
    $p=ceil($rows/$set_per_page);

    $str='';
    if($p<=1) return $str;

    if ($p) $str = '<div class="Paging"><ul>';

    $first = 0; $last=0;
    $j=1; $k=$p;

    if ($page>1){
        $pageprev=$page-1;
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url . '/' ."\" class=\"PrevBtn\">First</a></li>";
        $str .= '<li class="First"><a href="'. $FullUrl . $my_url . ($pageprev==1?'':("-$trang-".$pageprev)) . '/' ."\" class=\"PrevBtn\">Prev</a></li>";
    }

    for($i=($page-2>1)?$page-2:1;$i<=$page+2 && $i<=$k;$i++){
        $first = ' class="First"';
        if($i>1)
            $first = '';
        if ($i==$page)
            $str .= "<li$first><a href='#' class='Active'>$i</a></li>";
        else {
            $str .= "<li$first><a href=\"". $FullUrl . $my_url . ($i==1?'':("-$trang-".$i)) . '/' ."\">$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $str .= '<li><a href="'. $FullUrl . $my_url . "-$trang-" . $pagenext . "/" . "\" class=\"NextBtn\">Next</a></li>";
        $str .= '<li><a href="'. $FullUrl . $my_url . "-$trang-" . $p . "/" . "\" class=\"NextBtn\">Last</a></li>";
    }

    $str .= "</ul></div>";
    return $str;
}

function page_transfer2($page="index.php")
{
    $page_transfer = $page;
    include("./templates/transfer2.tpl");
    exit();
}

function page_transfer($msg,$page){
    $showtext = $msg;
    $page_transfer = $page;
    include("./templates/transfer.tpl");
    exit();
}

function IsFirefox(){
    return strrpos($_SERVER['HTTP_USER_AGENT'],"Firefox")>0;
}

function IsIE7(){
    return strrpos($_SERVER['HTTP_USER_AGENT'],"MSIE 7")>0;
}

function IsIE6(){
    return strrpos($_SERVER['HTTP_USER_AGENT'],"MSIE 6")>0;
}

function fixWidth($img,$w){
    $arr = getimagesize($img);
    return $arr[0]>$w?$w:$arr[0];
}

function fixHeight($img,$h){
    $arr = getimagesize($img);
    return $arr[1]>$h?$h:$arr[1];
}

function fixSize($img,$w,$h){
    $arr = getimagesize($img);
    if($arr){
        $kq = array();
        $scalew = $w/$arr[0];
        $scaleh = $h/$arr[1];
        $scale = $scalew<$scaleh?$scalew:$scaleh;

        if($scale<1){
            $kq['width'] = (int)($arr[0]*$scale);
            $kq['height'] = (int)($arr[1]*$scale);
        }
        else
        {
            $kq['width'] = $arr[0];
            $kq['height'] = $arr[1];
        }
        return $kq;
    }
    else
        return null;
}

function checkUploadImages($type){
    $type = strtolower($type);

    if($type!=".jpg" && $type!=".jpeg" && $type!=".gif" && $type!=".png" && $type!='.ico')
        return false;
    return true;
}

function checkUploadBanner($type){
    $type = strtolower($type);

    if($type!=".jpg" && $type!=".jpeg" && $type!=".gif" && $type!=".png" && $type!='.swf')
        return false;
    return true;
}

function checkUploadFiles($type){
    $type = strtolower($type);
    if($type!=".rar" && $type!=".zip" && $type!=".docx" && $type!=".doc" && $type!=".xls" && $type!=".xlsx" && $type!=".pdf")
        return false;
    return true;
}

function GenRandomString() {
    $length = 10;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
    $string = "";

    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters)-1)];
    }

    return $string;
}


function vietnamese_permalink($title) {
    /* 	Replace with "-"
        Change it if you want
    */

    $replacement = '-';
    $map = array();
    $quotedReplacement = preg_quote($replacement, '/');

    $default = array(
        '/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
        '/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
        '/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
        '/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
        '/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
        '/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/'	=> 'y',
        '/đ|Đ/' => 'd',
        '/ç/' => 'c',
        '/ñ/' => 'n',
        '/ä|æ/' => 'ae',
        '/ö/' => 'oe',
        '/ü/' => 'ue',
        '/Ä/' => 'Ae',
        '/Ü/' => 'Ue',
        '/Ö/' => 'Oe',
        '/ß/' => 'ss',
        '/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
        '/\\s+/' => $replacement,
        sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
    );
    //Some URL was encode, decode first
    $title = urldecode($title);

    $map = array_merge($map, $default);
    return strtolower( preg_replace(array_keys($map), array_values($map), $title) );
    #---------------------------------o
}
function curPageURL() {
    $pageURL = 'http';
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
function str_contain($mystring,$findme)
{

    $pos = strpos($mystring, $findme);
    if ($pos === false) { return false; }
    return true;
}
function createDateTimeFolder($folderroot)
{


    // tao folder theo year / month

    $now = strtotime('now');
    $strYear = date('Y',$now);
    $strMonth  = date('m',$now);
    $strDate  = date('d',$now);

    $upload_dir = $folderroot.$strYear;
    if (!file_exists($upload_dir))
    {
        mkdir($upload_dir);
    }

    $upload_dir = $folderroot.$strYear."/".$strMonth;
    if (!file_exists($upload_dir))
    {
        mkdir($upload_dir);
    }


    $upload_dir = $folderroot.$strYear."/".$strMonth."/".$strDate;
    if (!file_exists($upload_dir))
    {
        mkdir($upload_dir);
    }

    $folderroot = $upload_dir."/";
    return $folderroot;
}
function getFullUrl2()
{
    global $FullUrl;
    return $FullUrl;
}

function getsession($name)
{
    if (isset($_SESSION[$name]))
    {
        return $_SESSION[$name];
    }
    return "";
}
function echoSelectID($val1,$val2) {

    if ($val1 == $val2) echo "selected";

}

function plpage_seo_tag($sqlstmt,$page,$set_per_page)
{
    global $db,$do,$set_per_page;

    $keyword = SafeQueryString("keyword");

    if (!$set_per_page) $set_per_page=$set_per_page;

    $result = $db->query($sqlstmt);
    $rows = $db->numRows($result);
    $p=ceil($rows/$set_per_page);

    $str='';
    if($p<=1) return $str;

    if ($p) $str = '<div class="Paging"><ul>';

    $first = 0; $last=0;
    $j=1; $k=$p;
    if (false&&$first){
        $query_str = explode("&page=", $_SERVER['QUERY_STRING']);
    }
    if ($page>1){
        $pageprev=$page-1;
        $query_str = explode("&page=", $_SERVER['QUERY_STRING']);
        if($pageprev == 1)
            $str .= "<li class='First'><a href='$keyword'>Prev </a></li>";
        else
            $str .= "<li class='First'><a href='$keyword-trang-$pageprev'>Prev </a></li>";
    }


    for($i=1;$i<=$k;$i++){
        $first = ' class="First"';
        if($i>1)
            $first = '';
        if ($i==$page)
            $str .= "<li$first><a href='#' class='active'>$i</a></li>";
        else {
            $query_str = explode("&page=", $_SERVER['QUERY_STRING']);
            if($i==1)
                $str .= "<li$first><a href='$keyword'>$i</a></li>";
            else
                $str .= "<li$first><a href='$keyword-trang-$i'>$i</a></li>";
        }
    }

    if ($page<$p){
        $pagenext=$page+1;
        $query_str = explode("&page=", $_SERVER['QUERY_STRING']);
        $str .= "<li><a href='$keyword-trang-$pagenext'> Next</a></li>";
    }

    if (false&&$last){
        $query_str = explode("&page=", $_SERVER['QUERY_STRING']);
    }
    $str .= '</div>';
    return $str;
}
function getstart($starvalue)
{
    $star = "four-stars";

    if (is_numeric($starvalue))
    {
        if ($starvalue==5)  $star = "five-stars";
        if ($starvalue==3)  $star = "three-stars";
    }
    return $star;
}

/* USER-AGENTS
$ismobile = check_user_agent('mobile');
if($ismobile) {
return 'yes';
} else {
return 'no';
}
================================================== */
function check_user_agent ( $type = NULL ) {
    $user_agent = strtolower ( $_SERVER['HTTP_USER_AGENT'] );
    if ( $type == 'bot' ) {
        // matches popular bots
        if ( preg_match ( "/googlebot|adsbot|yahooseeker|yahoobot|msnbot|watchmouse|pingdom\.com|feedfetcher-google/", $user_agent ) ) {
            return true;
            // watchmouse|pingdom\.com are "uptime services"
        }
    } else if ( $type == 'browser' ) {
        // matches core browser types
        if ( preg_match ( "/mozilla\/|opera\//", $user_agent ) ) {
            return true;
        }
    } else if ( $type == 'mobile' ) {
        // matches popular mobile devices that have small screens and/or touch inputs
        // mobile devices have regional trends; some of these will have varying popularity in Europe, Asia, and America
        // detailed demographics are unknown, and South America, the Pacific Islands, and Africa trends might not be represented, here
        if ( preg_match ( "/phone|iphone|itouch|ipod|symbian|android|htc_|htc-|palmos|blackberry|opera mini|iemobile|windows ce|nokia|fennec|hiptop|kindle|mot |mot-|webos\/|samsung|sonyericsson|^sie-|nintendo/", $user_agent ) ) {
            // these are the most common
            return true;
        } else if ( preg_match ( "/mobile|pda;|avantgo|eudoraweb|minimo|netfront|brew|teleca|lg;|lge |wap;| wap /", $user_agent ) ) {
            // these are less common, and might not be worth checking
            return true;
        }
    }
    return false;
}

function ismobile()
{
    $ismobile = check_user_agent('mobile');
    return $ismobile;
}
 
function getQueryArray()
{
	$arr = array();
	foreach (explode("&", $_SERVER['QUERY_STRING']) as $tmp_arr_param) {
    $split_param = explode("=", $tmp_arr_param);
    if (empty($split_param[1])) continue;
	$arr[$split_param[0]] = urldecode($split_param[1]);
    
	}
	return $arr;
} 
function isCoding()
{
    if (empty($_SESSION['coder'])) {
        return false;
    }
    return true;
}
function isPost()
{
    $method = $_SERVER['REQUEST_METHOD'];
    if ($method === 'POST') {
        return true;
    }
    return false;
}
function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}