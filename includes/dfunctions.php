<?php
	
function sql_injection($str){
	if(!ereg('[\\\'\"<>:;,=&]', $str))
	{
		return $str;
	}else
	{
		echo '<script>window.location="index.php";</script>';
	}
}	

function insert_id(){                  
	$this->insert_id = mysql_insert_id();                  
	return $this->insert_id;
}
	
function plpage($sqlstmt,$page,$set_per_page)
{
	global $db,$do,$set_per_page;
	
	if (!$set_per_page) $set_per_page=$set_per_page;
	
	$result = $db->query($sqlstmt);
	$rows = $db->numRows($result);
	$p=ceil($rows/$set_per_page);
	
	$str='';
	if($p<=1) return $str;
	
	if ($p) $str='';//$str = " Page".$page."/".$p."&nbsp;&nbsp;";
	
	$first = 0; $last=0;
	if ($p<10){
		$j=1; $k=$p;
	}
	else {
		if($page<10) { $j=1; $k=10; $last=1;$last=1;}
		else { 
			$first=1;
			$j=$page-5;
			$k= (($page+5)<$p) ? $page+5 : $p;
			$last= (($page+5)<$p) ? 1 : 0;
			}
	
	}
	
	if (false&&$first){
			$query_str = explode("&page=", $_SERVER['QUERY_STRING']);
			$str.="<a href=\"".$_SERVER['SCRIPT_NAME']."?".$query_str[0]."&page=1\">First</a> ";
	}
	if ($page>1){
			$pageprev=$page-1;
			$query_str = explode("&page=", $_SERVER['QUERY_STRING']);
			$str.=" <a href=\"".$_SERVER['SCRIPT_NAME']."?".$query_str[0]."&page=$pageprev\">Prev</a>&nbsp; ";
			}

	for($i=$j;$i<=$k;$i++){
		if ($i==$page)
			$str.=" $i ";
		else {
			$query_str = explode("&page=", $_SERVER['QUERY_STRING']);
			$str.="  &nbsp;<a href=\"".$_SERVER['SCRIPT_NAME']."?".$query_str[0]."&page=$i\">$i</a>&nbsp; ";
		}
	}
	if ($page<$p){
			$pagenext=$page+1;
			$query_str = explode("&page=", $_SERVER['QUERY_STRING']);
			$str.="&nbsp;<a href=\"".$_SERVER['SCRIPT_NAME']."?".$query_str[0]."&page=$pagenext\">Next</a> ";
			}
			
	if (false&&$last){
			$query_str = explode("&page=", $_SERVER['QUERY_STRING']);
			$str.="<a href=\"".$_SERVER['SCRIPT_NAME']."?".$query_str[0]."&page=$p\">Last</a> ";
	}

	return $str;
}
	
function sqlmod($sqlstmt,$page,$set_per_page){ //modified sql query danh cho phan trang
	global $set_per_page;
	$from = ($page-1)*$set_per_page;
	return $sqlstmt." LIMIT ".$from." ,".$set_per_page;
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

function cut_string($str,$len,$more){
   if ($str=="" || $str==NULL) return $str;
   if (is_array($str)) return $str;
   $str = trim($str);
   if (strlen($str) <= $len) return $str;
   $str = substr($str,0,$len);
   if ($str != "") {
        if (!substr_count($str," ")) {
             if ($more) $str .= " ...";
             return $str;
            }
        while(strlen($str) && ($str[strlen($str)-1] != " ")) {
                $str = substr($str,0,-1);
            }
            $str = substr($str,0,-1);
            if ($more) $str .= " ...";
        }
        return $str;
}
function IsFirefox(){
	return strrpos($_SERVER['HTTP_USER_AGENT'],"Firefox")>0;
}
?>