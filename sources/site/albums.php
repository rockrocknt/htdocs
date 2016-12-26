<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Mr.Long
 * Date: 9/19/13
 * Time: 12:35 AM
 * To change this template use File | Settings | File Templates.
 */

global $tpl, $lg, $title_page, $keywords, $descriptions, $imageList,$db;

$cat = new Categories(currentCat());

$key = SafeQueryString('unique_key');//$_SESSION['unique_key'];

$sql = "select * from `images` where  `cid`=".$cat->getID();

$imageList =$db->getAll($sql);

$tpl="catalogue";

