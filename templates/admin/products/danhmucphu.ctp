<script type="text/javascript" src="js/admin/jquery.checkboxtree.js"></script>
<link rel="stylesheet" type="text/css" href="js/admin/jquery.checkboxtree.css"/>
<!-- end checkboxTree configuration -->
<?php
$product = new products(products::getbyID($_GET['product_id']));
?>
Mời chị chọn danh mục phụ của sản phẩm: <strong> <?php echo $product->getName(); ?></strong>
<br/>
<img src="<? echo $product->getImageNoThumb()?>" width="100" />
<?php // get cha 1
$list_parent0 = Categories::getCatByParentID(121);

?>
<form name="supplier" id="validate" class="form"
      action="admin.php?do=products&act=danhmucphu_submit<?=isset($_GET['product_id'])?'&product_id='.$_GET['product_id']:''?>
      <?=isset($_GET['cid'])?'&cid='.$_GET['cid']:''?>
      <?=isset($_GET['page'])?'&page='.$_GET['page']:''?>"
      method="post"
      >

<ul id="tree1">

    <?php
    foreach ($list_parent0 as $child0) {
 //   if (($child0['alias']== "phukiensinhnhat") || ($child0['alias']== "phukientiec") || ($child0['alias']== "dichvu"))
        if (true)
    {
        ?>
    <li>
        <input name="cidlist[]"
            <?php
            $obj = $product->obj;
            //$obj['cid_list']
            if (strpos($obj['cid_list'],';'.$child0['id'].';') !== false) {
                echo "checked=checked";
            }
            ?>
               value="<?=$child0['id']?>" type="checkbox"><label><?=$child0['name_vn']?></label>
        <?php
        // level 1
        $list_parent_level_1  =  Categories::getCatByParentID($child0['id']);
        ?>
        <ul>
        <?php
        if (!$list_parent_level_1) {echo "</ul>"; continue;}
        foreach ($list_parent_level_1 as $child1) {
        ?>
            <li>
                <input name="cidlist[]"
                    <?php
                    $obj = $product->obj;
                    //$obj['cid_list']
                    if (strpos($obj['cid_list'],';'.$child1['id'].';') !== false) {
                        echo "checked=checked";
                    }
                    ?>
                       value="<?=$child1['id']?>" type="checkbox"><label><?=$child1['name_vn']?></label>
                <?php
                // level 1
                $list_parent_level_2  =  Categories::getCatByParentID($child1['id']);
                ?>
                <ul>
                    <?php
                    if (!$list_parent_level_2) {echo "</ul>"; continue;}
                    foreach ($list_parent_level_2 as $child2) {
                        ?>
                        <li>
                            <input name="cidlist[]"
                                <?php
                                $obj = $product->obj;
                                //$obj['cid_list']
                                if (strpos($obj['cid_list'],';'.$child2['id'].';') !== false) {
                                    echo "checked=checked";
                                }
                                ?>
                                   value="<?=$child2['id']?>"
                                   type="checkbox"><label><?=$child2['name_vn']?></label>

                            <?php
                            // level 3
                            $list_parent_level_3  =  Categories::getCatByParentID($child2['id']);
                            ?>
                            <ul>
                                <?php
                                foreach ($list_parent_level_3 as $child3) {
                                    ?>
                                    <li>
                                        <input name="cidlist[]" value="<?=$child3['id']?>" type="checkbox"><label><?=$child3['name_vn']?></label>

                                        <?php
                                        // level 4
                                        $list_parent_level_4  =  Categories::getCatByParentID($child3['id']);
                                        ?>
                                        <ul>
                                            <?php
                                            foreach ($list_parent_level_4 as $child4) {
                                                ?>
                                                <li>

                                                    <input name="cidlist[]"
                                                           <?php
                                                           $obj = $product->obj;
                                                           //$obj['cid_list']
                                                           if (strpos($obj['cid_list'],';'.$child4['id'].';') !== false) {
                                                                echo "checked=checked";
                                                           }
                                                           ?>
                                                           value="<?=$child4['id']?>"
                                                           type="checkbox"><label><?=$child4['name_vn']?></label>



                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>



                                    </li>
                                <?php
                                }
                                ?>
                            </ul>




                        </li>
                    <?php
                    }
                    ?>
                </ul>



            </li>
        <?php
        }
        ?>
        </ul>
    </li>
    <?
    }
    ?>
    <?php } // for each  ?>

</ul>
<script type="text/javascript">
    $('#tree1').checkboxTree();
</script>

<input type="submit" value="LƯU LẠI">
</form>