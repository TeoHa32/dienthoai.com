<?php
    function addProduct($data){
        
        if(db_insert('products',$data)){
            return true;
        }
        return false;
    }
    function addImage($data){
        $result=db_insert('image',$data);
        if($result>0){
            return $result;
        }
        return 0;
    }
    function getListProduct(){
        $sql="SELECT * FROM products";
        $result=db_fetch_array($sql);
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