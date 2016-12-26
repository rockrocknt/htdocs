<?
include("ckeditor_config.php");
switch($act){
    case "edit":
        Edit();
        $title_page = "CMS - Chỉnh sửa sản phẩm";
        $tpl="edit";
        break;

    case "add":
        Add();
        $title_page = "CMS - Thêm thuộc tính con sản phẩm";
        $tpl="edit";
        break;

    case "del":
        Del();
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


    default:
        ShowList();
        $title_page = "CMS - Thuộc Tính Sản phẩm";
        $tpl="list";
}
function Del()
{
    $id = $_GET["id"];
    Delete($id);

    $_SESSION['mess'] = "Xoá thành công!";
    $page="admin.php?do=productattchild&productatt_id=".$_GET["productatt_id"].  (isset($_GET['page'])?'&page='.$_GET['page']:'');
    page_transfer2($page);
}

function Delete($id)
{
    global $db;
    $sql = "delete from productattchild where productattchild_id=$id";
    $db->query($sql);

}
function DelList()
{
    $id = $_POST["iddel"];
    for($i=0; $i<count($id); $i++)
        Delete($id[$i]);

    $_SESSION['mess'] = "Xoá thành công!";

    $page="admin.php?do=productattchild&productatt_id=".$_POST["productatt_id"].  (isset($_GET['page'])?'&page='.$_GET['page']:'');

//    $page = "admin.php?do=productattchild". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');

    page_transfer2($page);
}
function ShowList()
{
    global $db,$stips,$page,$plpage,$set_per_page,$c;
    global $db, $productattList;

    $sql = "select * from `productatt`";
    $productattList = $db->getAll($sql);

    $set_per_page=20;
    if(isset($_GET['productatt_id']) && $_GET['productatt_id']!=0 && $_GET['productatt_id']!='')
        $sql="select * from `productattchild`  where `productatt_id`=".$_GET['productatt_id']."  order by `productattchild_num` asc, `productattchild_id` desc ";
    else
        $sql="select * from `productattchild` order by `productattchild_num` asc, `productattchild_id` desc ";
    $c = $db->numRows($db->query($sql));
    $plpage = plpage($sql,$page,$set_per_page);
    $sqlstmt = sqlmod($sql,$page,$set_per_page);
    $stips = $db->getAll($sqlstmt);
}
function Add()
{
    global $db, $productattList;

    $sql = "select * from `productatt`";
    $productattList = $db->getAll($sql);
}

function Edit()
{
    global $db, $product, $stips, $tags;

    $id=$_GET["id"];
    $sql = "select * from productattchild where productattchild_id=$id";

    $product = $db->getRow($sql);
  //  var_dump($product);

    global $db, $productattList;

    $sql = "select * from `productatt`";
    $productattList = $db->getAll($sql);
}
function Editsm()
{
    global $db,$act;

    $arr['productattchild_num'] = isset($_POST["num"])?$_POST["num"]:0;
    $arr['productattchild_name_vn'] = $_POST["name_vn"];

    $arr['productattchildc_colorcode'] = $_POST["productattchildc_colorcode"];


    $arr['productatt_id'] = $_POST["productatt_id"];
    $arr['productattchild_minvalue'] = $_POST["productattchild_minvalue"];
    $arr['productattchild_maxvalue'] = $_POST["productattchild_maxvalue"];

    $page="admin.php?do=productattchild&productatt_id=".$_POST["productatt_id"].  (isset($_GET['page'])?'&page='.$_GET['page']:'');

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

            if(file_exists( "./upload/images/" . $filename . $type)){
                $filename = $filename . '-' . time() . $type;
            }
            else
            {
                $filename = $filename . $type;
            }

            copy($_FILES["img"]['tmp_name'], "./upload/images/" . $filename) ;
            $arr["productattchild_img"] = "upload/images/" . $filename;
        }
    }

    if ($act=="addsm")
    {
        $id = vaInsert('productattchild',$arr);
        $msg="Thêm thành công!";
    }
    else
    {
        $id=$_POST['productattchild_id'];
        vaUpdate('productattchild', $arr, ' productattchild_id='.$id,0);
        $msg="Sửa thành công!";
    }
    $_SESSION['mess'] = $msg;
    page_transfer2($page);
}
function Delete_img()
{
    global $db;
    $id = $_GET['id'];
    $img = $_GET['img_del'];
    $page = "admin.php?do=productattchild&act=edit&id=$id". (isset($_GET['cid'])?'&cid='.$_GET['cid']:'') . (isset($_GET['page'])?'&page='.$_GET['page']:'');

    $sql = "select * from productattchild where id=$id";
    $result = $db->getRow($sql);

    if (file_exists($result["$img"]))
    {
        unlink($result["$img"]);
        $arr["$img"] = "";
        vaUpdate('productattchild',$arr,' productattchild_id='.$id);
    }

    page_transfer2($page);
}
?>