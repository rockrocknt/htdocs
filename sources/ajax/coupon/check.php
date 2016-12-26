<?php

$code=  SafeFormValue('code');
$row = coupon::getbycode($code);
$rel["error"] = 0;
$rel["mess"] = "";

if (!isset($row["id"]))
{
    $rel["error"] = 1;
    $rel["mess"] = "Không có mã khuyến mãi ". $code;
    echo json_encode($rel);
    die();
}
if ($row['active'] == 0)
{
    $rel["error"] = 1;
    $rel["mess"] = "Mã khuyến mãi này đã không còn hiệu lực.";
    echo json_encode($rel);
    die();
}
if ($row['active'] == 1)
{
    $now = strtotime("now");
    if ($now > $row['end_date'] )
    {
        $rel["error"] = 1;
        $rel["mess"] = "Mã khuyến mãi này đã hết hạn.";
    }else
    {
        $_SESSION['coupon'] = $row;
    }
    echo json_encode($rel);
    die();
}

/*
if ($row['min_order'] >= $totalCart)
{
    $rel["error"] = 1;
    $rel["mess"] = "Mã khuyến mãi này chỉ áp dụng cho đơn hàng có giá trị  ". formatPrice($row['min_order'])." trở lên.";
    echo json_encode($rel);
    die();
}
*/
$_SESSION['coupon'] = $row;

//echo json_encode($rel);


