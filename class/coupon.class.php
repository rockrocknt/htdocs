<?php
	class coupon {
        public static  function getbycode($ID) {
            global $db;

            $sql = "select * from `coupon` where  `code`='$ID'";
            $row = $db->getRow($sql);
            return $row;
        }
	}