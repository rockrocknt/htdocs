<?
include("ckeditor_config.php");

switch($act){
    case "set_hethang":
        set_hethang();
        break;
    case "edit":
        Edit();
        $title_page = "CMS - Chỉnh sửa sản phẩm";
        $tpl="edit";
        break;

    case "add":
        Add();
        $title_page = "CMS - Thêm sản phẩm";
        $tpl="edit";
        break;

    case "del":
        Del();
        break;

    case "dellistsoluongsm":
        dellistsoluongsm();
        break;


    case "dellist":
        DelList();
        break;

    case "show":
        setActive('active');
        break;

    case "hide":
        inActive('active');
        break;

    case "order":
        Order();
        break;

    case "addsm":
    case "editsm":
        Editsm();
        break;

    case "change_active":
        changeStatus('active');
        break;

    case "delete_img":
        Delete_img();
        break;

    case "search":
        $title_page = "CMS - Tìm kiếm sản phẩm";
        search();
        $tpl="list";
        break;

    case "edit_thuoctinh":
        $title_page = "CMS - chỉnh sửa thuộc tính sản phẩm";
        edit_thuoctinh();
        //$tpl="edit_thuoctinh";
        $tpl="edit_thuoctinh";
        break;

    case "edit_thuoctinhsm":
        $title_page = "CMS - submit thuộc tính sản phẩm";
        edit_thuoctinhsm();
        //$tpl="edit_thuoctinh";
        $tpl="list";
        break;

    case "edit_soluong":
        $title_page = "CMS - chỉnh sửa số lượng sản phẩm";
        edit_soluong();
        //$tpl="edit_thuoctinh";
        $tpl="edit_soluong";
        break;
    case "edit_soluongsm":
        $title_page = "CMS - chỉnh sửa số lượng sản phẩm sm";
        edit_soluongsm();
        //$tpl="edit_thuoctinh";
        $tpl="edit_soluong";
        break;

    case "delsoluongsm":
        Deletesoluong($_GET['productqty_id']);
        $page = "admin.php?do=products&act=edit_soluong&id=".$_GET['id'];
        page_transfer2($page);
        break;
    case "danhmucphu":
        $tpl = "danhmucphu";
        $title_page = "CMS - Thêm danh mục phụ cho Sản phẩm";
        break;
    case "danhmucphu_submit":
        danhmucphu_submit();
        break;


    case "updatecid":
        updatecid();
        break;

    case "insert_fromjoomla":
        insert_fromjoomla();
        break;
    case "update_cid_cua_groupcha":
        update_cid_cua_groupcha();
        break;
    default:
        ShowList();
        $title_page = "CMS - Sản phẩm";
        $tpl="list";
}

function update_cid_cua_groupcha()
{
    global $db;
    $id = $_POST["iddel"];

    $column =  "cid_cua_groupcha";
    $value =  $_POST["cid_cua_groupcha"];
    //die($column);

    for($i=0;$i<count($id);$i++){
        //    DeleteCat($id[$i]);
        $arr[$column] = $value;
        vaUpdate('products',$arr," id =".$id[$i]);
    }

    $_SESSION['mess'] = "Sửa thành công!";
    $page="admin.php?do=products". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}

function insert_fromjoomla()
{
    global $db;

    global $db,$stips,$page,$plpage,$set_per_page,$c;
    $set_per_page=100;

 //   $sql="select * from product_joomla order by    idproduct asc ";
    //$sql="select * from categories where pid=121 order by    id asc ";
   // $sql="select * from ptag order by    ptag_id asc ";
    //
    $sql="SELECT * FROM `article_kos2` order by    idarticle desc";
    $c = $db->numRows($db->query($sql));
    $plpage = plpage($sql,$page,$set_per_page);
    $sqlstmt = sqlmod($sql,$page,$set_per_page);
    $stips = $db->getAll($sqlstmt);

    for ($i=0; $i<count($stips); $i++) {
      //  $art_joomla = $stips[$i];
      //  var_dump($art_joomla);
       // $arr['img'] = $art_joomla['images'];
        $art  = $stips[$i];
    //    vaUpdate('articles',$arr," idarticle=".$art_joomla['idarticle'],0);
    //    echo $product['idproduct']."<br/>";
    //    insert_pro($product_joomla);
    //    insert_cat_art($cat_joomla);
    //    update_product_cid($cat_joomla);
    //    insert_cat_tag($cat_joomla);
        insert_article($art);
        echo $art['idarticle']."<br/>";
    //    update_art($product);
    }
}
function  update_art($product)
{
    $arr['unique_key_vn'] = $product['title_vn'];
    $arr['title_vn'] = $product['name_vn'];
    vaUpdate('articles',$arr," id=".$product['id']);

}
function update_tag($product)
{
    var_dump($product);

    global $db;
    $sql = "select * from products where id_joomla = ".$product['idproduct'];

    $row = $db->getRow($sql);


    //$arr['tag_id_1'] = 0;
    //var_dump($row);
   // die();
    for($jj=1;$jj<10;$jj++)
    {
       if ($row['tag_id_'.$jj]==0)
        {
            $arr['tag_id_'.$jj] = $product['ptag_id'];
            vaUpdate('products',$arr,'id='.$row['id']);
            return;
            //break;
          //  $arr['tag_id_'.$jj] = 0;
        }
    }


}
function insert_article($art)
{
    global $db;
    $sql = "select idarticle from articles where idarticle=".$art['idarticle'];

    $row = $db->getRow($sql);
    if (!isset($row['idarticle']))
    {
        $arr['idarticle'] = $art['idarticle'];
        $arr['name_vn'] = $art['title'];
        $arr['short_vn'] = $art['description'];
        $arr['content_vn'] = $art['content'];
        $arr['title_vn'] = $art['title'];
        $arr['des_vn'] = $art['seo_description'];
        $arr['keyword_vn'] = $art['seo_keyword'];
        $arr['active'] = $art['show'];
        $arr['view'] = $art['view'];
        $arr['idcategory'] = $art['idcategory'];
        $arr['img'] = $art['images'];

        $arr['publish_date'] = $art['time_add'];
        $arr['dated'] = $art['time_add'];

        $arr['unique_key_vn'] = $art['seo_title'];


        $arr['cid'] =906 + $art['idcategory'];
        vaInsert('articles',$arr,0);
    //    die();
    }else
    {
        $arr['img'] = $art['images'];
        $arr['publish_date'] = $art['time_add'];
        $arr['dated'] = $art['time_add'];
    //    vaUpdate("aricles",$arr,"idarticle=".$art['idarticle']);

    }



    //vaInsert('articles',$arr,0);


}
function  update_product_cid($cat_joomla)
{
    $arr['cid'] = $cat_joomla['id'];
    vaUpdate('products',$arr," idpcategory=". $cat_joomla['idpcategory']);
}

function insert_cat_art($cat_joomla)
{
    $arr['idcategory_art'] = $cat_joomla['idcategory'];
    $arr['name_vn'] = $cat_joomla['cname'];
    $arr['content_vn'] = $cat_joomla['cdescription'];

    $arr['unique_key_vn'] = $cat_joomla['seo_ctitle'];
    $arr['title_vn'] = $cat_joomla['meta_ctitle'];
    $arr['des_vn'] = $cat_joomla['seo_cdescription'];
    $arr['keyword_vn'] = $cat_joomla['seo_ckeyword'];
    $arr['comp'] = 1;
    $arr['pid'] = 121;
    $arr['num'] = 0;
    vaInsert('categories',$arr);

}

function insert_cat_tag($cat_joomla)
{
    $arr['ptag_id'] = $cat_joomla['ptag_id'];
    $arr['name_vn'] = $cat_joomla['ptag_name'];
    $arr['unique_key_vn'] = $cat_joomla['ptag_alias'];
    $arr['title_vn'] = $cat_joomla['ptag_title'];
    $arr['des_vn'] = $cat_joomla['ptag_description'];
    $arr['keyword_vn'] = $cat_joomla['ptag_keywords'];

    $arr['content_vn'] = $cat_joomla['ptag_kdescription'];

    $arr['comp'] = 30;
    $arr['pid'] = 121;
    $arr['num'] = 0;
    vaInsert('categories',$arr);

}

function insert_cat($cat_joomla)
{
    $arr['idpcategory'] = $cat_joomla['idpcategory'];
    $arr['name_vn'] = $cat_joomla['cname'];
    $arr['content_vn'] = $cat_joomla['cdescription'];

    $arr['unique_key_vn'] = $cat_joomla['seo_ctitle'];
    $arr['title_vn'] = $cat_joomla['meta_ctitle'];
    $arr['des_vn'] = $cat_joomla['seo_cdescription'];
    $arr['keyword_vn'] = $cat_joomla['seo_ckeyword'];
    $arr['comp'] = 2;
    $arr['pid'] = 121;
    $arr['num'] = 0;
    vaInsert('categories',$arr);

}
function insert_pro($product_joomla)
{
    // cid & tag tinh sau
    // insert cid co cot idcategory / sau do update cid trong product
    global $db;
    $arr['code'] = $product_joomla['code'];
    $arr['id_joomla'] = $product_joomla['idproduct'];
    $arr['num'] = 0;
    $arr['active'] =  $product_joomla['show'];
    $arr['idpcategory'] = str_replace(",","", $product_joomla['idpcategory']);
    $arr['idpmanufacturer'] = str_replace(",","", $product_joomla['idpmanufacturer']);
    //time_add
    $arr['insert_day'] =$product_joomla['time_add'];
    $arr['dated'] =$product_joomla['time_modify'];

    if ($product_joomla['price_promotion'] == 0)
    {
        $arr['price'] = $product_joomla['price'];
        $arr['price_sale'] =  $product_joomla['price_promotion'];
    }else
    {
        $arr['price'] = $product_joomla['price_promotion'];
        $arr['price_sale'] =  $product_joomla['price'];
    }
    $arr['so_luong_reviews'] =  $product_joomla['vote_reviewcount'];

    $arr['name_vn'] = $product_joomla['title'];

  //  $arr['content_vn'] = html_entity_decode($product_joomla['content']);
    $arr['content_vn'] = $product_joomla['content'];
    /*
    if ($product_joomla['content'] == "")
    {
        $arr['content_vn'] = html_entity_decode($product_joomla['description']);
    }
    */
   // $arr['short_vn'] = html_entity_decode($product_joomla['description']);

    $arr['short_vn'] = $product_joomla['description'];
    $stock = $product_joomla['stock'];
    $soluong = 15;
    if ($stock == 1)
    {
        $soluong =0;
    }
    $arr['soluong'] = $soluong;

    if ($soluong == 0)
    {
        $arr['is_available'] = 0;
    }else{
        $arr['is_available'] = 1;
    }
    $rate = $product_joomla['vote_avg'];
    if (!is_numeric($rate))
    {
        $rate =4;
    }
    $arr['rate'] = $rate;
    $arr['title_vn'] = $product_joomla['meta_title'];
    $arr['keyword_vn'] =  $product_joomla['seo_keyword'];
    $arr['des_vn'] = $product_joomla['seo_description'];
    $arr['unique_key_vn'] = $product_joomla['seo_title'];
    $arr['img'] = $product_joomla['images'];
    vaInsert('products',$arr);
}
function danhmucphu_submit()
{
    global $db,$FullUrl;

    $id = $_POST["cidlist"];
    $cidphulist = "";
    $productID= $_GET['product_id'];
    $productObj = products::getbyID($productID);

    // XOA DANH MUC PHU CU khac VOI DANH MUC HIEN TAI
    $listDanhMucPhu = products::getProduct_Category($productID);

    for($i=0; $i<count($listDanhMucPhu); $i++)
    {
        $isDel = 1;
        $xetbang  = true;
        $item = $listDanhMucPhu[$i];
        for($j=0;$j<count($id);$j++)
        {
            if ($xetbang){
                if ($item['cid'] == $id[$j])
                {
                    $isDel = 0;
                    $xetbang = false;
                }
            }
        }

        if ($xetbang)
        {
            products::del_Product_Category_by_proid_cid($productID,$item['cid']);
        }

    }


    for($i=0; $i<count($id); $i++)
    {
        $cidphulist .= ";".$id[$i].";";

        products::insertProduct_Category($productID,$id[$i]);

    }
    products::insertProduct_Category($productID,$productObj['cid']);


    //  echo $id[$i]; //Delete($id[$i]);
    $arr['cid_list'] = $cidphulist;
    vaUpdate('products',$arr,'id='.$_GET['product_id']);

    // insert product_category


    page_transfer2($FullUrl."/admin.php?do=products");
}
function edit_soluongsm()
{
    global $db;
    $id=$_GET["id"];
    $soluong = $_POST['soluong'];
    $mausac  = $_POST['mausac'];
    $size  = $_POST['size'];
    $arr['product_id'] = $id;
    $arr['productquantity'] = $soluong;

    if (is_numeric($soluong))
    {
        //  echo $soluong;
        if ($mausac > 0)
        {
            $arr['productcolor_id']= $mausac;
            if ($size > 0)
            {
                $arr['productsize_id']= $size;
                vaInsert('productqty',$arr);
            }
            if ($size == 0)
            {
                $sql = "select * from `productattchild` where `productatt_id` = 1";
                $productattList = $db -> getAll($sql);

                for($i = 0; $i < count($productattList); $i++)
                {
                    $arr['productsize_id']= $productattList[$i]['productattchild_id'];
                    vaInsert('productqty',$arr);
                }
            }
        }
        if ($mausac == 0)
        {
            if ($size > 0)
            {
                $sql = "select * from `productattchild` where `productatt_id` = 2";
                $productattList = $db -> getAll($sql);
                for($i = 0; $i < count($productattList); $i++)
                {
                    $arr['productcolor_id']= $productattList[$i]['productattchild_id'];
                    $arr['productsize_id']= $size;
                    vaInsert('productqty',$arr);
                }
            }


            if ($size == 0)
            {
                $sql = "select * from `productattchild` where `productatt_id` = 1";
                $productattList = $db -> getAll($sql);
                for($i = 0; $i < count($productattList); $i++)
                {


                    $sql = "select * from `productattchild` where `productatt_id` = 2";
                    $productattList2 = $db -> getAll($sql);
                    for($j = 0; $j < count($productattList2); $j++)
                    {
                        $arr['productcolor_id']= $productattList2[$j]['productattchild_id'];
                        $arr['productsize_id']=  $productattList[$i]['productattchild_id'];
                        vaInsert('productqty',$arr);
                    }

                }
            }
        }


    }
    $page = "admin.php?do=products&act=edit_soluong&id=".$_GET['id'];
    page_transfer2($page);
}
function edit_soluong()
{
    global $db,$product,$stips, $productQty, $colorList,$sizeList;

    $id=$_GET["id"];
    $sql = "select * from products where id=$id";
    $product = $db->getRow($sql);

    $sql = "select * from `productqty` where `product_id`=$id";
    $stips = $db->getAll($sql);

    $sql = "select * from `productattchild` where `productatt_id` = 1";
    $sizeList = $db -> getAll($sql);

    $sql = "select * from `productattchild` where `productatt_id` = 2";
    $colorList = $db -> getAll($sql);

}
function edit_thuoctinhsm()
{
    global $db,$product,$productattList,$productattchildList, $productsearchkeyList;

    $id=$_GET["id"];
    $sql = "select * from products where id=$id";
    $product = $db->getRow($sql);
    $id2 = $_POST["idatt"];
    for($i=0; $i<count($id2); $i++)
    {
        $arr= array();
        $arr['productattchild_id'] = $id2[$i];
        $arr['product_id'] = $id;
        $arr['productsearchkey_price'] = $product['price'];
        vaInsert('productsearchkey', $arr);
    }

    $page="admin.php?do=products".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
    //   Delete($id[$i]);
}
function edit_thuoctinh()
{
    global $db,$product,$productattList,$productattchildList, $productsearchkeyList;

    $id=$_GET["id"];
    $sql = "select * from products where id=$id";
    $product = $db->getRow($sql);
    $sql = "select * from `productatt`";
    $productattList = $db->getAll($sql);

    $sql = "select * from `productattchild`";
    $productattchildList = $db->getAll($sql);


    $sql = "select * from `productsearchkey` where `product_id` =".$_GET['id'];
    $productsearchkeyList = $db->getAll($sql);


}
function Add()
{
    global $db, $customfields;

    $sql = "select distinct name_vn from customfields";
    $customfields = $db->getAll($sql);
}

function changeStatus($field)	// dao trang thai cua $field
{
    global $db;
    $id=$_GET["id"];

    $status = $_GET['current']==1?0:1;
    $sql="update products set $field='$status' where id=$id";
    $db->query($sql);

    $_SESSION['mess'] = "Sửa thành công!";
    $page="admin.php?do=products".(isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}

function search()
{
    global $db,$products,$page,$plpage,$set_per_page,$c,$stips;
    $set_per_page=20;
    $kw = SafeQueryString('kw');
    if ($kw == 'Nhập tên sản phẩm cần tìm...')
    {
        $page="admin.php?do=products";
        page_transfer2($page);
    }
    if ($kw == '')
    {
        $kw = SafeFormValue('kw');

        if ($kw != '')
        {
            $page2="admin.php?do=products&act=search&kw=".$kw;
            page_transfer2($page2);
        }else
        {
            $page="admin.php?do=products";
            page_transfer2($page);
        }
    }

    $key = $kw;
    $unique = vietnamese_permalink($key);
    $set_per_page = 200;
//    $sql="select * from products where (unique_key_vn like '%".$unique."%' ) or (name_vn like '%".$key."%' ) or name_en like '%".$key."%' or code like '%".$key."%' or content_vn like '%".$key."%' or content_en like '%".$key."%'  order by num asc, id desc ";
    $sql="select * from products where (name_vn like '%".$key."%' )  or code like '%".$key."%' order by num asc, id desc ";

    $c = $db->numRows($db->query($sql));
    $plpage = plpage($sql,$page,$set_per_page);
    $sqlstmt = sqlmod($sql,$page,$set_per_page);
    $stips = $db->getAll($sqlstmt);
}

function ShowList()
{
    global $db,$stips,$page,$plpage,$set_per_page,$c;
    $set_per_page=20;
    if(isset($_GET['cid']) && $_GET['cid']!=1 && $_GET['cid']!='')
        $sql="select p.* from products p where p.cid=".$_GET['cid']." order by p.num asc, p.id desc ";
    else
        $sql="select * from products order by num asc, id desc ";
    $c = $db->numRows($db->query($sql));
    $plpage = plpage($sql,$page,$set_per_page);
    $sqlstmt = sqlmod($sql,$page,$set_per_page);
    $stips = $db->getAll($sqlstmt);
}

function Edit()
{
    global $db, $product, $stips, $tags;
    global $db, $product, $cat_name1, $cat_name2, $cat_name3, $cat_name4, $cat_name5;
    $id=$_GET["id"];
    $sql = "select * from products where id=$id";
    $product = $db->getRow($sql);



    $sql = "select * from products_customfields where active=1 and productid=$id";
    $listField = $db->getAll($sql);
    $where = '';
    if ($listField)
        foreach ($listField as $i=>$field)
        {
            $where .= 'id='.$field['customfieldid'];
            if ($i+1 != count($listField))
                $where .= ' or ';
        }

    $sql = "select * from customfields where $where order by num asc";
    $stips = $db->getAll($sql);

    $sql = "select tags.* from tags, tags_art where active=1 and idart=$id and post_in='products' and tags.idtag=tags_art.idtag";
    $tags = $db->getAll($sql);

    Add();
}

function Order()
{
    global $db;
    $id=$_POST["id"];
    $ordering=$_POST["ordering"];
    for($i=0;$i<count($id);$i++){
        $sql="update products set num=".$ordering[$i]." where id=".$id[$i];
        $db->query($sql);
    }

    $_SESSION['mess'] = "Sắp xếp thành công!";
    $page="admin.php?do=products". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}

function Delete($id)
{
    global $db;

    $sqlstmt = "select img, name_vn from `products` where id=$id";
    $r = $db->getRow($sqlstmt);
    if(file_exists($r["img"])) unlink($r["img"]);

    $sql = "select img from images where cid=$id and type=2";
    $rel = $db->getAll($sql);

    for ($i=0; $i<count($rel); $i++) {
        if(file_exists($rel[$i]["img"]))
            unlink($rel[$i]["img"]);
    }

    $sql = "delete from images where type=2 and cid=$id";
    $db->query($sql);
    $sql = "delete from products_customfields where productid=$id";
    $db->query($sql);
    $sql="delete from tags_art where idart=".$id." and post_in='products'";
    $db->query($sql);
    $sql = "delete from products where id=".$id;
    $db->query($sql);
    insertLog('Xóa sản phẩm: '.$r['name_vn']);

    products::del_Product_Category($id);
}

function Del()
{
    $id = $_GET["id"];
    Delete($id);

    $_SESSION['mess'] = "Xoá thành công!";
    $page = "admin.php?do=products". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}
function dellistsoluongsm()
{
    $id = $_POST["iddel"];
    for($i=0; $i<count($id); $i++)
        Deletesoluong($id[$i]);

    $_SESSION['mess'] = "Xoá thành công!";
    $page = "admin.php?do=products&act=edit_soluong&id=".$_GET['id'];
    page_transfer2($page);
}
function Deletesoluong($id)
{
    global $db;
    $sql = "delete from `productqty` where productqty_id=$id";
    $db->query($sql);
}
function DelList()
{
    $id = $_POST["iddel"];
    for($i=0; $i<count($id); $i++)
        Delete($id[$i]);

    $_SESSION['mess'] = "Xoá thành công!";
    $page = "admin.php?do=products". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}

function setActive($field)	// set $field = 1
{
    global $db;
    $id=$_POST["iddel"];
    for($i=0;$i<count($id);$i++){
        $sql="update products set $field=1 where id=".$id[$i];
        $db->query($sql);
    }

    $_SESSION['mess'] = "Sửa thành công!";
    $page="admin.php?do=products". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}

function inActive($field)	// set $field = 0
{
    global $db;
    $id=$_POST["iddel"];
    for($i=0;$i<count($id);$i++){
        $sql="update products set $field=0 where id=".$id[$i];
        $db->query($sql);
    }

    $_SESSION['mess'] = "Sửa thành công!";
    $page="admin.php?do=products". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}

function Editsm()
{
    global $db,$act;
	$arr = array();
    if (isset($_POST["cid_cua_groupcha"]))
    {
        $arr['cid_cua_groupcha'] = $_POST["cid_cua_groupcha"];
    }
	if (isset($_POST["short_desc_vn"])) {
		$arr['short_desc_vn'] = SafeFormValue('short_desc_vn');
	}
    if (isset($_POST["descs_en"])) {
        $arr['descs_en'] = $_POST["descs_en"];
    }

    $arr['code'] = SafeFormValue('code');
    $arr['num'] = isset($_POST["num"])?$_POST["num"]:0;
    $arr['active'] = isset($_POST['active'])?'1':'0';
    $arr['is_noindex'] = isset($_POST['is_noindex'])?'1':'0';
    $arr['cid'] = isset($_POST['cat'])?$_POST['cat']:'';
    $arr['price'] = isset($_POST["price"])?str_replace(',', '', $_POST["price"]):0;
    $arr['price_sale'] = isset($_POST["price_sale"])?str_replace(',', '', $_POST["price_sale"]):0;
    $arr['size'] = SafeFormValue('size');
    $arr['color'] = isset($_POST["color"])?$_POST["color"]:'';
    $arr['group_name2_vn']= trim($_POST["group_name2_vn"]);

    $arr['so_luong_reviews'] = isset($_POST["so_luong_reviews"])?$_POST["so_luong_reviews"]:5;


    $arr['name_vn'] = SafeFormValue('name_vn');
    $arr['name_en'] = SafeFormValue('name_en');
    $arr['content_vn'] = isset($_POST["content_vn"])?$_POST["content_vn"]:'';
    $arr['content_en'] = isset($_POST["content_en"])?$_POST["content_en"]:'';
    $arr['production_vn'] = SafeFormValue('production_vn');
    $arr['production_en'] = SafeFormValue('production_en');
    $arr['warranty_vn'] = SafeFormValue('warranty_vn');
    $arr['warranty_en'] = SafeFormValue('warranty_en');
    $arr['short_vn'] = SafeFormValue('short_vn');
    $arr['short_en'] = SafeFormValue('short_en');





    $arr['group_name_vn']=$_POST["group_name_vn"];

    $soluong = SafeFormValue('soluong');
    if (!is_numeric($soluong))
    {
         $soluong =10;
    }
    $arr['soluong'] = $soluong;

    if ($soluong == 0)
    {
        $arr['is_available'] = 0;
    }else{
        $arr['is_available'] = 1;
    }

    $rate = SafeFormValue('rate');
    if (!is_numeric($rate))
    {
        $rate =4;
    }
    $arr['rate'] = $rate;



    //$arr['video'] = isset($_POST["video"])?$_POST["video"]:'';



    $arr['title_vn'] = SafeFormValue('title_vn');
    $arr['title_en'] = SafeFormValue('title_en');
    $arr['keyword_vn'] = SafeFormValue('keyword_vn');
    $arr['keyword_en'] = SafeFormValue('keyword_en');
    $arr['des_vn'] = SafeFormValue('des_vn');
    $arr['des_en'] = SafeFormValue('des_en');
    //$arr['des_vn_char']= SafeFormValue('des_vn_char');
    //$arr['des_en_char']= SafeFormValue('des_en_char');

    $name_tags = SafeFormValue('tags');
    $unique_key_tags = cmsFunction::createTag($name_tags);
    $page="admin.php?do=products". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');

    $cid = $arr['cid'];
    //$arr['customfields'] = '';
    $listField = isset($_POST["listField"])?$_POST["listField"]:'';

    if(isset($_FILES["img"]['name'] ) && $_FILES["img"]['size']>0){
        //them hinh moi
        $img = $_FILES["img"]['name'];
        $start = strpos(strrev($img), ".");	// lay dau . sau cung
        $type = substr($img, strlen($img)-($start+1), $start+1);
        if (!checkUploadImages($type))
        {
            $_SESSION['error'] = "Ảnh sản phẩm không đúng định dạng!";
        }
        else
        {
            $filename = SafeFormValue('unique_key_vn');
            if ($act == "editsm") {
                //kiem tra va xoa hinh cu
                $id=$_POST['id'];
                $sqlstmt="select img from products where id=$id";
                $r = $db->getRow($sqlstmt);
                if(file_exists($r["img"])) unlink($r["img"]);
            }
            $folderroot = createDateTimeFolder("upload/images/");
            if(file_exists( $folderroot . $filename . $type)){
                $filename = $filename . '-' . time() . $type;
            }
            else
            {
                $filename = $filename . $type;
            }

            copy($_FILES["img"]['tmp_name'], $folderroot . $filename) ;
            $arr["img"] = $folderroot . $filename;
        }
    }




    $id=0;
    if ($act=="addsm")
    {
        $id = vaInsert('products',$arr);
        $arr['unique_key_vn']= cmsFunction::insertUniquekey("products", SafeFormValue("unique_key_vn"), 'vn', $id, $cid);
        $arr['unique_key_en']= cmsFunction::insertUniquekey("products", SafeFormValue("unique_key_en"), 'en', $id, $cid);
        vaUpdate('products', $arr, ' id='.$id,0);

		
		
        cmsFunction::insertTag($id, 'products', $name_tags, $unique_key_tags);
        insertLog('Thêm sản phẩm: '.$arr["name_vn"]);
        $msg="Thêm thành công!";

        if ($listField)
        {
            foreach ($listField as $i=>$field)
            {
                $detail['productid'] = $id;
                $detail['customfieldid'] = $field;
                vaInsert('products_customfields', $detail);
            }
        }
    }
    else
    {
        $id=$_POST['id'];
        $arr['unique_key_vn']= cmsFunction::updateUniquekey("products", SafeFormValue("unique_key_vn"), 'vn', $id, $cid);
        $arr['unique_key_en']= cmsFunction::updateUniquekey("products", SafeFormValue("unique_key_en"), 'en', $id, $cid);
        cmsFunction::updateTag($id, 'products', $name_tags, $unique_key_tags);

        vaUpdate('products', $arr, ' id='.$id,0);
		
// insert product attributes
//var_dump(isset($_POST['attributes']);
			
		
        insertLog('Sửa sản phẩm: '.$_POST["name_vn"]);
        $msg="Sửa thành công!";

        $sql = "update products_customfields set active=0 where productid=$id";
        $db->query($sql);


        $sql = "update `productsearchkey` set `productsearchkey_price`=".$arr['price']." where product_id=$id";

        $db->query($sql);


        if ($listField)
        {
            foreach($listField as $field)
            {
                // cap nhat ve 1
                $sql = "update products_customfields set active=1 where active=0 and productid=$id and customfieldid=$field";
                $db->query($sql);
                // neu ko cap nhat duoc -> chua co  -> them vao
                if (!$db->db_affected_rows())
                {
                    $detail['productid'] = $id;
                    $detail['customfieldid'] = $field;
                $id=    vaInsert('products_customfields', $detail);
                }
            }
        }
    }
    if (isset($_POST['attributes'])) 
        {
            $sql = "delete from products_attributes where product_id = ".$id;
            $db->query($sql);
            $attributes = $_POST['attributes'];         
            
            for($i=0; $i < count($attributes); $i++) {
                
                $attId =  $attributes[$i];
                if (empty($attId)) continue;
                $arrInsert['product_id'] = $id;
                $arrInsert['attribute_id'] = $attId;
                vaInsert('products_attributes',$arrInsert);
            }
        }   

    products::insertProduct_Category($id,$arr['cid']);
    $_SESSION['mess'] = $msg;
    page_transfer2($page);
}

function Delete_img()
{
    global $db;
    $id = $_GET['id'];
    $img = $_GET['img_del'];
    $page = "admin.php?do=products&act=edit&id=$id". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');

    $sql = "select * from products where id=$id";
    $result = $db->getRow($sql);

    if (file_exists($result["$img"]))
    {
        unlink($result["$img"]);
        $arr["$img"] = "";
        vaUpdate('products',$arr,' id='.$id);
    }

    page_transfer2($page);
}

function set_hethang()
{
    $id = $_POST["iddel"];
    $where = "";
    for($i=0; $i<count($id); $i++)
    {
        $itemid = $id[$i];
        if (is_numeric($itemid))
        {
            if ($where != "") $where .= " or `id`=".$itemid;
            else $where = " `id`=".$itemid;
        }


    }
    $arr= array();
    $arr['soluong'] = 0;
    $arr['is_available'] = 0;

    vaUpdate("products",$arr,$where);

    //     Delete($id[$i]);
    $_SESSION['mess'] = "Xoá thành công!";
    $page = "admin.php?do=products". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}