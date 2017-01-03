<?php
    class products
    {
        public $name;
        public $short;
        public $content;
        public $img;
        public $unique_key;
        public $cid;
        public $price;
        public $price_sale;
        public $id;
        public $code;
        public $view;
        public $dated;
        public $keyword;
        public $description;
        public $title;
        public $index;
        public $reverse_unique_key;
        public $not_in_widget;
        public $kieuhinh;
        public $obj;
        // khoi tao
        public function __construct($product) {
            global $lg;
            $rlg = $lg=="vn"?"en":"vn";
            $this->obj= $product;
            $this->name = $product["name_$lg"];

            $this->short = $product["short_$lg"];
            $this->content = $product["content_$lg"];
            $this->unique_key = $product["unique_key_$lg"];
            $this->img = $product["img"];
            $this->cid = $product["cid"];
            $this->price = $product["price"];
            $this->price_sale = $product["price_sale"];
            $this->id = $product["id"];
            $this->code = $product["code"];
            $this->view = $product["view"];
            $this->dated = $product["dated"];
            $this->keyword = $product["keyword_$lg"];
            $this->description = $product["des_$lg"];
            $this->title = $product["title_$lg"];
            $this->index = $product["is_noindex"];
            $this->reverse_unique_key = $product["unique_key_$rlg"];
           // $this->not_in_widget= $product["not_in_widget"];

        }
        public function conhang() {
           // return $this->not_in_widget>0?true:false;
            $obj = $this->obj;
            if (is_numeric($obj['soluong']))
            {
                if ($obj['soluong'] > 0 )
                {
                    return true;

                }else
                    return false;

            }else return true;
        }

        public function not_in_widget() {
            return $this->not_in_widget>0?true:false;
        }


        public function isSaleOff() {
            return $this->price_sale>0?true:false;
        }
        
        public function getReverseUniqueKey() {
            return $this->reverse_unique_key;
        }
        
        public function getIndex() {
            return $this->index;
        }
        
        public function getTitle() {
            return $this->title;
        }
        
        public function getKeyword() {
            return $this->keyword;
        }
        
        public function getDescription() {
            return $this->description;
        }
        
        public function getPercent() {
            if ($this->price>0)
                return number_format((1-($this->price_sale/$this->price))*100);
            return 0;
        }
        
        public function getView() {
            return $this->view;
        }
        
        public function getID() {
            return $this->id;
        }
        public function ishethang() {
            $boj = $this->obj;
            if ($boj['is_available'] == 0) return true;
            else  return false;
        }
		public function isConHang() {
            $boj = $this->obj;
            if ($boj['is_available'] == 0) return false;
            else  return true;
        }
        public function textHETHANG() {
            $boj = $this->obj;
            if ($boj['texthethang']=="") return hethang;
            else return $boj['texthethang'];
        }
        public  function getPercentDiscount()
        {
            // echo $this->getPriceSale(). " - ".$this->getPrice();
            $temp =  100 -(($this->getPrice()/$this->getPriceSale())*100);
            return $temp;
        }
        public function getCID() {
            return $this->cid;
        }

        public function getName() {
            return $this->name;
        }
        
        public function getDate() {
            return $this->dated;
        }
        
        public function getImage($w, $h=0) {
            return getTimThumb($this->img, $w, $h);
        }
        
        public function getImageNoThumb() {
            return GetImage($this->img);
        }
        public function getImage2() {
            return $this->img;
        }

        public function isHasImage() {
            return file_exists($this->img)?true:false;
        }
        
        public function getShort() {
            return $this->short;
        }
        
        public function getContent() {
            //$content = str_replace('', '', $this->content);
            $content = $this->content;
            if (empty($this->content)) {
                $obj = $this->obj;
                $content = $obj['descs_vn'];
            }
            return $content;
        }
        
        public function getPrice() {
            $percent = Info::getInfoField('percent');
            return $this->price + $this->price*$percent/100;
        }
        public  function dangKhuyenMai()
        {
           // echo $this->getPriceSale(). " - ".$this->getPrice();
            if ($this->getPriceSale() > $this->getPrice())
            {
                return true;
            }
            return false;
        }

        public  function coFlash()
        {

            // echo $this->getPriceSale(). " - ".$this->getPrice();
            $obj = $this->obj;

            if ($obj['link_flash'] != "")

            {
                return true;
            }

            return false;
        }
        public function getShortDes()
        {
            $obj = $this->obj;

            if ($obj['descs_en'] != "")

            {
                return $obj['descs_en'];
            }

            return "";
        }
        public  function laSanPhamBo()
        {

            // echo $this->getPriceSale(). " - ".$this->getPrice();
            $obj = $this->obj;

            if ($obj['is_sanphambo'] == 1)

            {
                return true;
            }

            return false;
        }


        public function echoPrice() {
           echo number_format($this->getPrice(),0,",",".").SITE_CURRENCY;
        }


        public function getPriceSale() {
            return $this->price_sale;
            /*
            $percent = Info::getInfoField('percent');
            return $this->price_sale>0?($this->price_sale + $this->price_sale*$percent/100):($this->price + $this->price*$percent/100);
            */
        }
        
        public function getCode() {
            return $this->code;
        }
        
        public function     getLink() {
            global $db,$lg;
            
            $sql = "select * from categories where id=".$this->cid;
            $parent = $db->getRow($sql);
            //$parent = new Categories($parent);
            //$plink = $parent->getLinkNoExtLink();
            
            //return $plink.$this->unique_key.'.html';
            return  "/".$parent['unique_key_'.$lg]."/".$this->unique_key.'.html';
        }
        
        public function getRelate() {
            global $db, $lg;

            $num_relate = Info::getInfoField('num_relate_product');
            
            $sql = "select * from products where active=1 and name_$lg<>'' and id<>".$this->id." and cid=".$this->cid." order by id desc";
            $total = $db->getAll($sql);
            if (count($total) < $num_relate)
                return $total;
            
            $num_older = floor($num_relate/2);
            $num_newer = $num_relate%2==0?$num_older:$num_older+1;
            // cu hon
            $sql = "select * from products where active=1 and name_$lg<>'' and id<".$this->id." and cid=".$this->cid." order by id desc limit $num_older";
            $older = $db->getAll($sql);
            // moi hon
            $sql = "select * from products where active=1 and name_$lg<>'' and id>".$this->id." and cid=".$this->cid." order by id asc limit $num_newer";
            $newer = $db->getAll($sql);
            // tinh so chenh lech
            $count_older = $num_older - count($older);
            $count_newer = $num_newer - count($newer);
            if ($count_older) {
                $sql = "select * from products where active=1 and name_$lg<>'' and id>".$this->id." and cid=".$this->cid." order by id asc limit ".($num_newer+$count_older);
                $newer = $db->getAll($sql);
            } else if ($count_newer) {
                $sql = "select * from products where active=1 and name_$lg<>'' and id<".$this->id." and cid=".$this->cid." order by id desc limit ".($num_older+$count_newer);
                $older = $db->getAll($sql);
            }
            // gom thanh 1 mang & tra ve
            $result = array();
            $index = 0;
            if ($newer)
            {
                for ($i=count($newer)-1; $i>-1; $i--)
                {
                    $result[$index] = $newer[$i];
                    $index++;
                }
            }
            if ($older)
            {
                for ($j=0; $j<count($older); $j++)
                {
                    $result[$index] = $older[$j];
                    $index++;
                }
            }
            return $result;
        }

        public function getRelateNew() {
            global $db, $lg;
            $obj = $this->obj;
            $num_older  = 4;
            $sql = "select * from products where active=1 and name_$lg<>'' and `group_name_vn`='".$obj['group_name_vn']."'   order by id desc limit $num_older";
            //echo $sql;
            $newer = $db->getAll($sql);



            $wheretag = "";
            //if ($wheretag == "()")
            if (false)
            {
                $sql = "select * from products where active=1 and name_$lg<>''  order by id desc limit $num_older";

            }else
           // $wheretag = "`tag_id_1`='".$obj['tag_id_1']."' or `tag_id_2`='".$obj['tag_id_2']."'  or `tag_id_3`='".$obj['tag_id_3']."'  or `tag_id_4`='".$obj['tag_id_4']."' or `tag_id_5`='".$obj['tag_id_5']."'";
            $sql = "select * from products where active=1 and name_$lg<>'' and ".$wheretag. "   order by id desc limit $num_older";
            $older = $db->getAll($sql);

            // gom thanh 1 mang & tra ve
            $result = array();
            $index = 0;
            if ($newer)
            {
                for ($i=count($newer)-1; $i>-1; $i--)
                {
                    $result[$index] = $newer[$i];
                    $index++;
                }
            }
            if ($older)
            {
                for ($j=0; $j<count($older); $j++)
                {
                    $result[$index] = $older[$j];
                    $index++;
                }
            }

            if (!$result)
            {
                $sql = "select * from products where active=1 and name_$lg<>'' and id<>".$this->id." and cid=".$this->cid." order by id desc limit 6";
                $result = $db->getAll($sql);
            }



            return $result;

        }


        public function getRelateSAME_GROUP_NAME() {
            // san pham cung hieu vali keo / tui xach
            global $db, $lg;
            $obj = $this->obj;
            $num_older  = 4;

            // 2 san pham nho gia hon
            $sql = "select * from products where price <". $obj['price'] ." and cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and id<>". $this->id . " and active=1 and name_$lg<>''   and `cid`='".$obj['cid']."'   order by is_available desc,price desc limit $num_older";
            $newer = $db->getAll($sql);
            // 2 san pham gia lon hon
            $sql = "select * from products where price >=". $obj['price'] ." and cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and id<>". $this->id . " and active=1 and name_$lg<>''   and `cid`='".$obj['cid']."'   order by is_available desc,price desc limit $num_older";
            $newer2 = $db->getAll($sql);

            // merge 4 san pham
            $newarr = array();
            $indexx=0;
            for($iazz=0;$iazz<count($newer);$iazz++)
            {
                if (!isset($newer2[0]["id"]))
                {
                    // khong co san pham lon gia hon
                    if ($iazz == 4) break;
                }else
                    if ($iazz == 2) break;
                if (isset($newer[$iazz]["id"]))
                {
                    $newarr[$indexx]  = $newer[$iazz];
                    $indexx++;
                }

            }
            for($iazz=0;$iazz<count($newer2);$iazz++)
            {
                if (!isset($newer[0]["id"]))
                {
                    // khong co san pham nho gia hon
                    if ($iazz == 4) break;
                }else
                    if ($iazz == 2) break;

                if (isset($newer2[$iazz]["id"]))
                {
                    $newarr[$indexx]  = $newer2[$iazz];
                    $indexx++;
                }

            }
            return $newarr;
            /*

            $sql = "select * from products where cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and id<>". $this->id . " and active=1 and name_$lg<>''   and `cid`='".$obj['cid']."'   order by is_available desc limit $num_older";
            $newer = $db->getAll($sql);

            if (isset($newer[0]['id'])) return $newer;

            if ($obj['group_name_vn'] != '')
                $sql = "select * from products where  cid_cua_groupcha=". $obj['cid_cua_groupcha'] ."  id<>". $this->id . " and active=1 and name_$lg<>'' and  `group_name_vn`<>'' and `group_name_vn`='".$obj['group_name_vn']."'   order by is_available desc limit $num_older";
            
            
           // echo $sql;
            $newer = $db->getAll($sql);

            if (!isset($newer[0]['id']))
            {
                $sql = "select * from products where  cid_cua_groupcha=". $obj['cid_cua_groupcha'] ."  id<>". $this->id . " and active=1 and name_$lg<>'' and  `group_name_vn`<>'' and `cid`='".$obj['cid']."'   order by is_available desc limit $num_older";
                //echo $sql;
                $newer = $db->getAll($sql);
            }
            return $newer;
            */

        }


        public function getRelate_SAME_TAG($listSanPhamCungHieu=null) {
            global $db, $lg;
            $obj = $this->obj;
            $num_older  = 4;
            $whereID="";
            for($j=0;$j<count($listSanPhamCungHieu);$j++)
            {
                if (!isset($listSanPhamCungHieu[$j]['id'])) break;
                $whereID.=" and id<>".$listSanPhamCungHieu[$j]['id'];

            }

            $wheretag = "(";
            $tag1  = array();
            if ($obj['tag_id_1'] > 0){
                $wheretag .= " cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and  `tag_id_1`='".$obj['tag_id_1']."'";


                $cat_id = $obj['tag_id_1'];
                $sql = "select * from products where cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and  id<>". $this->id . " and  active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.") ";
                $sql .=$whereID;
                $sql.=" order by is_available desc,price desc limit $num_older";


                $tag1 = $db->getAll($sql);
             //   if (count($tag1) > $num_older) return $tag1;
             //   return $tag1;
            }
            
            $tag2 = array();
            if ($obj['tag_id_2'] > 0){
                if ($wheretag != "(")
                    $wheretag .= " or `tag_id_2`='".$obj['tag_id_2']."'";
                else
                    $wheretag .= "`tag_id_2`='".$obj['tag_id_2']."'";


                $cat_id = $obj['tag_id_2'];
                $sql = "select * from products where cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and  id<>". $this->id . " and  active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")";
                $sql .=$whereID;
                $sql.=" order by is_available desc,price desc limit $num_older";

                $tag2 = $db->getAll($sql);
             //   if (count($tag2) > $num_older) return $tag2;

            }

            $tag3 = array();
            if ($obj['tag_id_3'] > 0){
                if ($wheretag != "(")
                    $wheretag .= " or `tag_id_3`='".$obj['tag_id_3']."'";
                else
                    $wheretag .= "`tag_id_3`='".$obj['tag_id_3']."'";


                $cat_id = $obj['tag_id_3'];
                $sql = "select * from products where cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and  id<>". $this->id . " and  active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")";
                $sql .=$whereID;
                $sql.=" order by is_available desc,price desc limit $num_older";

                $tag3 = $db->getAll($sql);
            //    if (count($tag3) > $num_older) return $tag3;

            }


            $tag4 = array();
            if ($obj['tag_id_4'] > 0){
                if ($wheretag != "(")
                    $wheretag .= " or `tag_id_4`='".$obj['tag_id_4']."'";
                else
                    $wheretag .= "`tag_id_2`='".$obj['tag_id_4']."'";

                $cat_id = $obj['tag_id_4'];
                $sql = "select * from products where cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and  id<>". $this->id . " and  active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")";
                $sql .=$whereID;
                $sql.=" order by is_available desc,price desc limit $num_older";

                $tag4 = $db->getAll($sql);
            //    if (count($tag4) > $num_older) return $tag4;
            }


            $tag5 = array();
            if ($obj['tag_id_5'] > 0){
                if ($wheretag != "(")
                    $wheretag .= " or `tag_id_5`='".$obj['tag_id_5']."'";
                else
                    $wheretag .= " `tag_id_5`='".$obj['tag_id_5']."'";

                $cat_id = $obj['tag_id_5'];
                $sql = "select * from products where cid_cua_groupcha=". $obj['cid_cua_groupcha'] ." and  id<>". $this->id . " and  active = 1 and (tag_id_1 = ".$cat_id." or tag_id_2 = ".$cat_id." or tag_id_3 = ".$cat_id." or tag_id_4 = ".$cat_id." or tag_id_5 = ".$cat_id.")";
                $sql .=$whereID;
                $sql.=" order by is_available desc,price desc limit $num_older";

                $tag5 = $db->getAll($sql);
            //    if (count($tag5) > $num_older) return $tag5;
            }
            /*
            $wheretag .= ")";

            if ($wheretag == "()")
            {
              //  $sql = "select * from products where id<>". $this->id . " and active=1 and name_$lg<>''  order by id desc limit $num_older";
                $sql = "select * from products where id <0 ";
            }else
                // $wheretag = "`tag_id_1`='".$obj['tag_id_1']."' or `tag_id_2`='".$obj['tag_id_2']."'  or `tag_id_3`='".$obj['tag_id_3']."'  or `tag_id_4`='".$obj['tag_id_4']."' or `tag_id_5`='".$obj['tag_id_5']."'";
                $sql = "select * from products where id<>". $this->id . " and active=1 and name_$lg<>'' and ".$wheretag. "   order by id desc limit $num_older";

          // echo $sql;
            $older = $db->getAll($sql);
            */
            $index = 0;
            $older = array();
            for($j=1;$j<5;$j++){

                $tagarr = $tag1;
                if ($j==2) $tagarr = $tag2;
                if ($j==3) $tagarr = $tag3;
                if ($j==4) $tagarr = $tag4;
                if ($j==5) $tagarr = $tag5;

                if ($tagarr)
                {
                    for ($i=0;$i< count($tagarr); $i++)
                    {

                        if (isset($tagarr[$i]['id'])){
                            $dathem = 0;

                            for ($AAi=0;$AAi< count($older); $AAi++)
                            {
                                if (isset($older[$AAi]['id'])){
                                    if ($older[$AAi]['id']==$tagarr[$i]['id']){
                                        $dathem = 1;
                                    }
                                }
                            }

                            if ($dathem == 0){
                                $older[$index] = $tagarr[$i];
                            //    echo $older[$index]['id'].";";
                                $index++;
                            }
                        }
                    }
                }

            }



            return $older;

        }


        
        public function getCustomField() {
            global $db, $lg;
            
            $sql = "select c.* from products_customfields p, customfields c where active=1 and name_$lg<>'' and customfieldid=c.id and productid=".$this->id." order by num asc, c.id asc";
            return $db->getAll($sql);
        }
        
        public function getTag($tab='') {
            global $db, $FullUrl, $lg;
    
            $sql = "select tags.* from tags, tags_art where active=1 and idart=".$this->id." and post_in='products' and tags.idtag=tags_art.idtag";
            $tags = $db->getAll($sql);
            $begintab = $endtab = "";
            $prefix = $lg=='vn'?"/tag/san-pham/":"/en/tag/products/";
            $result = "";
    
            if($tab!=''){
                $begintab = "<".$tab.">";
                $endtab = "</".$tab.">";
            }
            if ($tags)
            {
                foreach ($tags as $i=>$tag) {
                    $result .= $begintab."<a href='".$FullUrl.$prefix.$tag["unique_key_tag"]."/' title='".$tag["name_tag"]."'>".$tag["name_tag"]."</a>".$endtab;
                    if($i+1 !=count($tags))
                        $result .= ", ";
                }
            }
            return $result;
        }
        
        public function getComments() {
            
            global $db;
    
            $sql = "select * from comments where cmt_post_id=".$this->id." and cmt_do='products' and cmt_active=1 and cmt_pid=0 order by cmt_id desc";
            return $db->getAll($sql);
        }

        public function getNumComment() {
            global $db;

            $sql = "select * from comments where cmt_post_id=".$this->id." and cmt_do='products' and cmt_active=1";
            return $db->numRows($db->query($sql));
        }
        
        public function countView() {   // tinh luot view
            global $db;
            
            $UniqueSession = "ProAreViewed";
            $IdString = "[".$this->id."]";
            
            if(!isset($_SESSION[$UniqueSession]))
            {
                $_SESSION[$UniqueSession] = $IdString;
    
                $sql = "update products set view=view + 1 where id=".$this->id;
                $db->query($sql);
            }
            else
            {
                $mystring = $_SESSION[$UniqueSession];
                $findme = $IdString;
                $pos = strpos($mystring, $findme);
                
                if($pos === false)
                {
                    $_SESSION[$UniqueSession] .= $IdString;
                    
                    $sql = "update products set view=view + 1 where id=".$this->id; 
                    $db->query($sql);
                }
            }
        }
        public function co_nhieu_mau() {
            global $db;
            $obj = $this->obj;
            if ($obj['lasanphammausaccuaproductid'] > 0)
            {
                return true;
            }
            return false;
        }

        public static function getStatus($status) { 
            if($status==0)
                return 'Chưa thanh toán';
            else if($status==1)
                return 'Đã thanh toán';
            else if($status==2)
                return 'Đã xử lý';
        }
    
        public static function getStatusImage($status) {    
            if($status==0)
                return 'images/admin/icons/color/hide.png';
            else if($status==1)
                return 'images/admin/icons/color/tick.png';
            else if($status==2)
                return 'images/table/finished.png';
        }
        public  static function gen_option_thuoctinh($parentid)
        {
            global $db;
            $sql = "select * from `productattchild` where `productatt_id`=$parentid";
            $list = $db->getAll($sql);
            $currentID = 0;

            if ($parentid == 3)
            {
                $currentID=getquery('chungloai');
            }
            if ($parentid==2) $currentID=getquery('mausac');
            if ($parentid==6) $currentID=getquery('giatien');
            if ($parentid==4) $currentID=getquery('doituong');
            if ($parentid==5) $currentID=getquery('vatlieu');
            if ($parentid==1) $currentID=getquery('size');
            for($i=0;$i<count($list);$i++)
            {
                $item = $list[$i];
                ?>
                <option
                    <?php
                        if ($item['productattchild_id'] == $currentID)
                        { echo "selected"; }
                    ?>
                    value="<?=$item['productattchild_id']?>"><?=$item['productattchild_name_vn']?></option>
                <?
            }
        }
        public  static function getColorandSize()
        {
            global $db,$colorlist, $sizelist;
            $sql = "SELECT * FROM `productattchild`  where `productatt_id`=2";
            $colorlist = $db ->getAll($sql);

            $sql = "SELECT * FROM `productattchild`  where `productatt_id`=1";
            $sizelist = $db ->getAll($sql);
        }
        public function __destruct() {
        }
        public  static function getbycid($cid)
        {
            global $db,$colorlist, $sizelist;
            $sql = "SELECT * FROM `products`  where (`active`=1 and `cid`='$cid') or  (`cid_list` like '%;$cid;%')   order by num asc, id desc  ";
            //echo $sql;
            return $db ->getAll($sql);
        }

        public  static function getbyID($id)
        {
            global $db,$colorlist, $sizelist;
            $sql = "SELECT * FROM `products`  where `id`='$id'";
            return $db ->getRow($sql);
        }
        public  static function getByUniqueKey($uniqueKey)
        {
            
            global $db,$lg;
            
            $sql = "SELECT * FROM `products`  where `unique_key_vn`='$uniqueKey'";
            
            return $db ->getRow($sql);
        }
        public  static function getByProductIDList($productidlist)
        {
            global $lg,$db;
            $list = explode (";",$productidlist);
            $where = "";
            for($i=0;$i<count($list);$i++)
            {
                if (empty($list[$i])) continue;
                if ($where != "") $where .= " or `id`=".$list[$i];
                else $where = " `id`=".$list[$i];
            }
            $sql = "select * from products where ". $where." and name_$lg<>'' and active=1 order by id desc  limit 9";

            $lastProducts = $db->getAll($sql);

            /*
             * $listPro = explode (";",$string['content_vn']);
             * <?php
        //var_dump($listPro);
    for($ii=0;$ii<count($listPro);$ii++)
    {
        $id =$listPro[$ii];
        $j = 0;
        foreach($lastProducts as $key => $product)
        {

            if ($product['id'] == $id)
            {
            echo $product['id'];
                $product_img = GetImage($product['img']);

                if(!empty($product['name_'.$lg]))
                    $product_link = GetProductLinkFull($product, $lg);
                else
                    $product_link = "#";

                $product_title = htmlspecialchars($product['name_'.$lg]);
                $link_buy = $FullUrl . "/index.php?do=cart&amp;act=add&amp;id=" . $product['id'] . "&amp;lg=$lg&amp;sl=1";

            }
        }
    }
             */

            return $lastProducts;
        }
        public  static function insertProduct_Category($productID,$cid)
        {
            global $lg,$db;

            $sql = "SELECT * FROM `product_category` WHERE `product_id`='$productID' and `cid`='".$cid."'";

            $row = $db->getRow($sql);
            if (!isset($row['id']))
            {
                $arr2 = array();
                $arr2['cid'] =$cid;
                $arr2['product_id'] = $productID;
                vaInsert('product_category',$arr2);
            }
        }

        public  static function getProduct_Category($productID)
        {
            global $lg,$db;

            $sql = "SELECT * FROM `product_category` WHERE `product_id`='$productID' ";

            $row = $db->getAll($sql);
            return $row;
        }


        public  static function del_Product_Category($productID)
        {
            global $lg,$db;
            if (!is_numeric($productID)) return;

            $sql = "delete from `product_category` where `product_id`='$productID'";
            $db->query($sql);
        }

        public  static function del_Product_Category_by_proid_cid($productID,$cid)
        {
            global $lg,$db;
            if (!is_numeric($productID)) return;

            $sql = "delete from `product_category` where `product_id`='$productID' and `cid`=$cid";


            $db->query($sql);
        }

        public  static function getbycid_phu($cid)
        {
            global $db,$colorlist, $sizelist;
//            $sql = "SELECT * FROM `products`  where (`active`=1 and `cid`='$cid') or  (`cid_list` like '%;$cid;%')   order by num asc, id desc  ";
          //  $sql="select p.*,pc.id as pcID from `products` p,  `product_category` pc where (p.lasanphammausaccuaproductid=0) and  (p.active=1) and (p.id=pc.product_id) and (pc.cid=".$cid.")   order by pc.num asc, pc.product_id desc ";
            $sql="select p.*,pc.id as pcID from `products` p,  `product_category` pc where    (p.active=1) and (p.id=pc.product_id) and (pc.cid=".$cid.")   order by pc.num asc, pc.product_id desc ";

            return $db ->getAll($sql);
        }
        public  static function getmausac($productID)
        {
            global $lg,$db;

            $sql = "SELECT * FROM `products` WHERE `lasanphammausaccuaproductid`='$productID' and `active`=1";
            return $db->getAll($sql);

        }
        public  static function getallcolorcode()
        {
            global $lg,$db;

            $sql = "SELECT * FROM `colorcode`";
            return $db->getAll($sql);

        }

        public  static function getproductlist($productlist)
    {
        global $lg,$db;
        if ($productlist != ""){

            global $lg,$db;
            $list = explode(";",$productlist);
            $where = "";
            for($i=0;$i<count($list);$i++)
            {
                if ($list[$i] !=""){
                    if ($where != "") $where .= " or `id`=".$list[$i];
                    else $where = " `id`=".$list[$i];
                }

            }
            $sql = "select  *   from products  where  ( ". $where." and name_$lg<>'' and active=1) order by id desc ";
        }else
            $sql = "select  *   from products  where (  name_$lg<>'' and active=1) order by rand() desc  limit 5";

        return $db->getAll($sql);

    }


        public  static function getmostview($limit)
        {
            global $db;

            $sql = "select * from `products` where `active`='1'    order by  view desc limit 0,$limit";
            // echo $sql;
            $row = $db->getAll($sql);

            return $row;

        }

        public function getRelate_same_model_size() {
            global $db, $lg;
            $num_relate = Info::getInfoField('num_relate_product');
            $objj= $this->obj;
            //   echo $objj['group_name_vn']. " ".$objj['group_name2_vn'];
            if (($objj['group_name_vn'] !="") && ($objj['group_name2_vn'] != "")){

                $sql = "select * from products where active=1 and name_$lg<>'' ";

                $sql.="and id<>".$this->id." and `group_name_vn`='".$objj['group_name_vn']."'";

                $sql.=" and `group_name2_vn`='".$objj['group_name2_vn']."' order by is_available desc limit $num_relate";

                //     echo $sql;

                $total = $db->getAll($sql);


                return $total;
            }
            return null;

        }

        public function getRelatedProducts()
		{
            global $db, $lg;
            //$num_relate = Info::getInfoField('num_relate_product');
            $objj= $this->obj;
			$where = "`cid` = " . $this->cid;
			$where .= " and `is_available` = 1";
            //   echo count($less). " ". count($greater);
			$sql = "select * from `products`  where " . $where . " order by `is_available` desc limit 10";
			$result = $db->getAll($sql);
			
            return $result;
        }
        public function getCatName()
        {
            global $db,$lg;
            $sql = "select * from categories where id= " . $this->cid;
            $row = $db->getRow($sql);
            return $row['name_'.$lg];
        }
        public function getCatLink()
        {
            global $db,$lg;
            $sql = "select * from categories where id= " . $this->cid;
            $row = $db->getRow($sql);
            return "/". $row['unique_key_'.$lg]. "/";
        }
		public static function getRandom($limit, $cid =0)
		{
			global $db, $lg;
			$sql = "select  *   from products  where ( is_available = true and  name_$lg<>'' and active=1 and cid = $cid) order by rand() desc  limit $limit";
			if ($cid == 0)
				$sql = "select  *   from products  where ( is_available = true and  name_$lg<>'' and active=1) order by rand() desc  limit $limit";
			
			return $db->getAll($sql);
		}
        
}