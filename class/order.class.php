<?php
class order{

    public static function getOrderByid($order_id,$debug=0)
    {
        global $db;
        $sql = "select * from `orders` where `odr_id`='".$order_id."'";

        $row = $db->getRow($sql);
        if ($debug==1)
        {
            echo $sql;
        }
        return $row;
    }
}
?>