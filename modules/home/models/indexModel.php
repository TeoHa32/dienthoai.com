<?php
    function getListProductNew(){
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 7";
        $result = db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function getListProductIP(){
        $sql = "SELECT * FROM products where category_id = 1 LIMIT 7";
        $result = db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function getListProductSS(){
        $sql = "SELECT * FROM products where category_id = 2 LIMIT 7";
        $result = db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function getListProductOP(){
        $sql = "SELECT * FROM products where category_id = 3 LIMIT 10";
        $result = db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function getImgById($id){
        $sql="SELECT * FROM image WHERE id=$id";
        $result=db_fetch_row($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }

?>