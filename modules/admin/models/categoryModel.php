<?php
    function getListCategory(){
        $sql = "SELECT * FROM category";
        $result = db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }

    function getCategoryById($id){
        $sql = "SELECT * FROM category WHERE id=$id";
        $result = db_fetch_row($sql);
        if(!empty($result)){
            return $result;
        }
    }
?>