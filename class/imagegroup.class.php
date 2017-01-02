<?php
class ImagesGroup{
    public static function getImages($alias){
        global $db;
        $sql = "select i.* from img i, img_group ig where i.active=1 and (i.cid = ig.id) and (ig.alias ='$alias') order by i.num asc, i.id desc";
        $r = $db->getAll($sql);
        return $r;
    }
    public  static function  getLink($link)
    {

        $link = str_replace(SUB_DOMAIN,"",$link);

        $ip = $_SERVER['REMOTE_ADDR'] ;
        if ($ip != "127.0.0.1")
        {
            $link = str_replace(SUB_DOMAIN_LOCAL,"",$link);
        }

        return $link;
    }
    public static function getimgbycid($cid,$debug=0){
        global $db;
        $sql = "select * from img where active=1 and ( cid = $cid)   order by num asc, id desc";
        if ($debug==1) echo $sql;
        $r = $db->getAll($sql);
        return $r;
    }
    public static function getImagesLimit($alias, $limit){
        global $db;
        $sql = "select i.* from img i, img_group ig where i.active=1 and (i.cid = ig.id) and (ig.alias ='$alias') order by i.num asc, i.id desc limit ".$limit;

        if ($limit==1)
            $r = $db->getRow($sql);
        else
            $r = $db->getAll($sql);

        return $r;
    }
    public static function getImagesByCid($cid,$type,$debug=0){
        global $db;
        //$sql = "select i.* from img i, img_group ig where i.active=1 and (i.cid = ig.id) and (ig.id ='$cid') order by i.num asc, i.id desc limit ".$limit;
        $sql="select * from images where active=1 and cid=".$cid." and type=".$type." order by num asc, id desc";

        if ($debug==1) echo $sql;
        $r = $db->getAll($sql);

        return $r;
    }
    public static function getImagesByProductID($productID,$debug=0){
        global $db;
        //$sql = "select i.* from img i, img_group ig where i.active=1 and (i.cid = ig.id) and (ig.id ='$cid') order by i.num asc, i.id desc limit ".$limit;
        $sql="select * from images where `product_id`=".$productID."  order by num asc, id desc";

        if ($debug==1) echo $sql;
        $r = $db->getAll($sql);

        return $r;
    }
    public static function getImgById($id)
    {
        global $db;
        //$sql = "select i.* from img i, img_group ig where i.active=1 and (i.cid = ig.id) and (ig.id ='$cid') order by i.num asc, i.id desc limit ".$limit;
        $sql="select * from img where `id`=".$id."  order by num asc, id desc";

        if ($debug==1) echo $sql;
        $r = $db->getRow($sql);

        return $r;
    }
    public static function get_img_by_cid($cid, $limit){
       
        global $db;
        $sql = "select * from img where active=1 and ( cid = $cid ) order by num asc, id desc limit $limit";
        $r = $db->getAll($sql);
        return $r;
    }
}
?>