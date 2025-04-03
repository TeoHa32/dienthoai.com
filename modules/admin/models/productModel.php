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
        $sql="SELECT * FROM products WHERE is_delete=0";
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
    function getProductById($id){
        $sql="SELECT * FROM products WHERE id=$id";
        $result=db_fetch_row($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function updateProduct($table, $data, $where){
        if(db_update($table, $data, $where)>0){
            return true;
        }
        return false;
    }
    function deleteProduct($table,$data,$where){
        if(db_update($table,$data,$where)){
            return true;
        }
        return false;
    }
    function getTotalRow(){
        $total_row = db_num_rows('SELECT * FROM products WHERE is_delete=0');
        return $total_row;
    }
    function pagination($page,$limit){
        $total_row = db_num_rows('SELECT * FROM products WHERE is_delete=0');
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array('SELECT * FROM products WHERE is_delete=0 LIMIT '.$start.','.$limit);
        return $list_user;
    }
?>