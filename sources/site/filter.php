<?php defined('BASE') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: NTH
 * Date: 8/17/2016
 * Time: 10:27 AM
 */

$_c = load_class('Categories');
$_p = load_class('Products');

$c = query_string('c');
$f = query_string('f');

$arr_temp =  array_values(explode(',', $f));
$s1 = array();
foreach ($arr_temp as $tmp)
{
    $prop = $_c->get_item_by_id($_c->product_cat_property_detail, $tmp);
    if($prop)
    {
        $s1[] = $prop['property_id'];
    }
    unset($prop);
}

$s1 = array_unique($s1);

unset($arr_temp);

$cat = $_c->get_cat_by_slug($c);
$sql = "SELECT {$_p->table}.*, {$_p->properties_table}.* FROM {$_p->table} INNER JOIN {$_p->properties_table} ON {$_p->table}.id = {$_p->properties_table}.product_id WHERE {$_p->table}.active = 1";
if(empty($f))
{
    $sql .= " AND {$_p->table}.id IN (SELECT DISTINCT product_id FROM {$_p->product_n_detail} WHERE cat_id='{$cat['id']}')";
}
else
{
    $sql .= " AND {$_p->table}.id IN (SELECT DISTINCT product_id FROM {$_p->product_n_detail} WHERE cat_id='{$cat['id']}' AND property_detail_id IN ($f))";
}

$sql .= " ORDER BY {$_p->table}.updated_on DESC, {$_p->table}.id DESC";
//$sql .= " LIMIT 0, " . Settings::get('records_per_page_product');
$products = $_p->get_all($sql);

// lọc sản phẩm theo thuộc tính
$tmp = array();
foreach ($products as $key => $item)
{
    $xx = TRUE;
    foreach ($s1 as $val)
    {
        $i = $_p->get_single_item2($_p->product_n_detail, "product_id='{$item['id']}' AND property_id='{$val}' AND property_detail_id IN ($f)");
        if(!$i)
        {
            $xx = FALSE;
            break;
        }

        unset($i);
    }
    if($xx == FALSE)
    {
        $tmp[$key] = $item;
    }
}

$products = array_delete($tmp, $products);
unset($s1, $tmp);

?>
<div id="san-pham"></div>
<div class="pca-pl">
    <div class="pca-pl-l">
        <?php if($products) : ?>
            <ul class="pl-item-ul">
                <?php
                $n = Settings::get('records_per_page_product');
                foreach ($products as $key => $item) :
                    $big = '';
                    if($key == 0 OR $key%11 == 0) : $big = ' pl-item-li-big'; endif;
                    if($key == $n) : break; endif;
                    ?>
                    <li class="pl-item-li pl-item-li-<?=$key?><?=$big?> pl-item-li-mover">
                        <div>
                            <p class="pl-item-image">
                                <a href="<?=$_p->get_detail_link($item['id'])?>" title="<?=html_escape($item['name'])?>" target="_blank">
                                    <img class="lazy" alt="<?=html_escape($item['name'])?>" data-original="<?=get_image($item['img_t'])?>" src="<?=SITE_DIR?>js/LazyLoad/lazy-bg.png" />
                                </a>
                            </p>
                            <div class="pl-item-price">
                                <?php if(!empty($item['price_percent'])) : ?>
                                    <p class="pl-item-discount">-<?=$item['price_percent']?>%</p>
                                <?php endif?>

                                <?php echo $_p->price_simple_fomart($item['price'], $item['price_promotion'], "pl-item-pmarket", "pl-item-pbuy");?>

                                <?php if(!empty($item['promotion_title'])) : ?>
                                    <div class="pl-item-soffer">
                                        <p><?=$item['promotion_title']?></p>
                                    </div>
                                <?php endif?>
                            </div>
                            <p class="pl-item-brand">
                                <?=$_p->get_thuonghieu_name($item['thuonghieu_id'])?>
                                <?php if(!empty($item['identify'])) : ?>
                                    <span><?=$item['identify']?></span>
                                <?php endif?>
                            </p>

                            <?php if(!empty($item['tra_gop_text'])) : ?>
                                <div class="pl-item-ism">
                                    <p class="pl-item-ins-title">Trả góp<i></i></p>
                                    <p class="pl-item-ins-price"><?=$item['tra_gop_text']?></p>
                                </div>
                            <?php endif?>

                            <p class="pl-item-name">
                                <a href="<?=$_p->get_detail_link($item['id'])?>" title="<?=html_escape($item['name'])?>"><?=$item['name']?></a>
                            </p>
                            <div class="pl-item-mover">
                                <?php if(!empty($item['short'])) : ?>
                                    <div class="pl-item-des">
                                        <?=nl2br($item['short'])?>
                                    </div>
                                <?php endif?>
                                <?php if(!empty($info['support'])) : ?>
                                    <div class="pl-item-support">
                                        <b>Tư vấn bán hàng:</b><span><?=$info['support']?></span>
                                    </div>
                                <?php endif?>

                                <p class="pl-item-detail">
                                    <a href="<?=$_p->get_detail_link($item['id'])?>" title="<?=html_escape($item['name'])?>" target="_blank">Chi tiết</a>
                                </p>
                                <p class="pl-item-orders">
                                    <a class="fcybox-order cart-order-<?=$item['id']?>" onclick="fOrderProduct_Create('.cart-order-<?=$item['id']?>');" rel="nofollow" title="Mua Ngay" data-productid="<?=$item['id']?>" data-quantity="1" >MUA NGAY</a>
                                </p>
                            </div>
                        </div>
                    </li>
                <?php endforeach; unset($products);?>
            </ul>
        <?php else : echo "<div class='notp'>Chưa cập nhật sản phẩm</div>"; endif ?>
        <div class="cl"></div>
    </div>
    <div class="pca-pl-r ">

        <div class="cl"></div>
        <div class="pca-pl-r-filter">

            <ul class="l option-filter">
                <li><a class="option-filter-1" href="<?=$cat['slug']?>/?f=khuyen-mai" title="Khuyến Mãi"><i></i></a></li>
                <li><a class="option-filter-5" href="<?=$cat['slug']?>/?f=giam-gia" title="Giảm giá"><i></i></a></li>
                <li><a class="option-filter-3" href="<?=$cat['slug']?>/?f=san-pham-moi" title="Sản phẩm mới"><i></i></a></li>
            </ul>

            <?php
            $properties_list = $_c->get_properties_by_cat_id($cat['id']);
            if($properties_list) :

                foreach ($properties_list as $value) :

                    $arr_f = array_values(explode(',', $f));
                ?>
                    <p class="pca-filter-head">
                        <span><?=$value['name']?></span>
                    </p>
                    <ul class="l pca-filter ajax-load">
                        <?php
                        $list_detail = $_c->get_properties_detail($value['id']);
                        if($list_detail) :
                            foreach ($list_detail as $item) :
                                // status
                                $flag = '';
                                if(in_array($item['id'], $arr_f))
                                {
                                    $flag = ' class="active"';
                                }

                                // link
                                $link = $cat['slug'];
                                if($value['multi'] == 1)
                                {
                                    if(in_array($item['id'], $arr_f))
                                    {
                                        $arr_clone = array_values(explode(',', $f));
                                        if (($key = array_search($item['id'], $arr_clone)) !== false)
                                        {
                                            unset($arr_clone[$key]);
                                        }

                                        $arr_clone = array_filter($arr_clone);
                                        if(!empty_array($arr_clone))
                                        {
                                            $link .= "&f=" . implode(',', $arr_clone);
                                        }

                                        unset($arr_clone);
                                    }
                                    else
                                    {
                                        if(!empty_array($arr_f))
                                        {
                                            $link .= "&f=" . implode(',', $arr_f) . ',' . $item['id'];
                                        }
                                        else
                                        {
                                            $link .= "&f=" . $item['id'];
                                        }
                                    }
                                }
                                else
                                {
                                    $arr_clone = array_values(explode(',', $f));
                                    foreach ($list_detail as $val)
                                    {
                                        if (($key = array_search($val['id'], $arr_clone)) !== false)
                                        {
                                            unset($arr_clone[$key]);
                                        }
                                    }

                                    $arr_clone = array_filter($arr_clone);
                                    if(!empty_array($arr_clone))
                                    {
                                        $link .= "&f=" . implode(',', $arr_clone);
                                        if(!in_array($item['id'], $arr_f))
                                        {
                                            $link .= ',' . $item['id'];
                                        }
                                    }
                                    else
                                    {
                                        if(!in_array($item['id'], $arr_f))
                                        {
                                            $link .= '&f=' . $item['id'];
                                        }
                                    }
                                    unset($arr_clone);
                                }

                                ?>
                                <li><a<?=$flag?> href="<?=$link?>" title="<?=html_escape($item['name'])?>"><?=$item['name']?></a></li>
                            <?php endforeach;?>
                        <?php endif?>
                    </ul>
                <?php endforeach;?>
            <?php endif?>
        </div>
    </div>
    <div class="cl"></div>
</div>

