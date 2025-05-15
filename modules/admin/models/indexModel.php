<?php
    function countBill(){
        $sql = "SELECT COUNT(*) as countbill FROM BILL";
        $result = db_fetch_row($sql);
        return $result;
    }
    function countProduct(){
        $sql = "SELECT COUNT(*) as countProduct FROM products";
        $result = db_fetch_row($sql);
        return $result;

    }
    function countCustomer(){
        $sql = "SELECT COUNT(*) as countCustomer FROM users WHERE role=3";
        $result = db_fetch_row($sql);
        return $result;
    }
    function sumBill(){
        $sql = "SELECT SUM(total) as sumbill FROM bill";
        $result = db_fetch_row($sql);
        return $result; 
    }

?>