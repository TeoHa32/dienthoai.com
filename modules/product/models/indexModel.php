<?php
    function getListProductByCategory($category){
        $sql = "SELECT * FROM products WHERE category_id = $category";
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
    function getProductById($id){
        $sql = "SELECT * FROM products WHERE id = $id";
        $result = db_fetch_row($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function getListImg(){
        $sql="SELECT * FROM image";
        $result=db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
?>