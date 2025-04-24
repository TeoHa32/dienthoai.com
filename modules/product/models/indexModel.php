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
    function getTotalRow($category){
        $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category ");
        return $total_row;
    }
    function getTotalRowPrice($category,$price){
        if($price==1){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category AND price < 500000 ");
        return $total_row;
        }
        else if($price== 2){    
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category  AND price >= 500000 AND price <= 1000000");
        return $total_row;
        }
        else if($price ==3){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category  AND price >= 1000000 AND price <= 5000000");
        return $total_row;
        }
        else if($price== 4){

            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category  AND price >= 5000000 AND price <= 10000000");
            return $total_row;
        }
        else if($price==5){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category  AND price > 10000000");
        return $total_row;
        }
    }
    function getTotalRowSearchPrice($keyword,$price){
        if($price==1){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price < 500000 ");
        return $total_row;
        }
        else if($price== 2){    
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price >= 500000 AND price <= 1000000");
        return $total_row;
        }
        else if($price ==3){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%'  AND price >= 1000000 AND price <= 5000000");
        return $total_row;
        }
        else if($price== 4){

            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%'  AND price >= 5000000 AND price <= 10000000");
            return $total_row;
        }
        else if($price==5){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%'  AND price > 10000000");
        return $total_row;
        }
    }
    function getTotalRowSearch($keyword){
        $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%'");
        return $total_row;
    }

    function pagination($page,$limit,$category){
        $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array('SELECT * FROM products WHERE is_delete=0 AND category_id = '.$category.' LIMIT '.$start.','.$limit);
        return $list_user;
    }
    function paginationPrice($page,$limit,$category,$price){
        if($price ==1 ){
        $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category AND price < 500000");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array('SELECT * FROM products WHERE is_delete=0 AND category_id = '.$category.' AND price < 500000 LIMIT '.$start.','.$limit);
        return $list_user;
        }
        else if($price==2){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category AND price >= 500000 AND price <= 1000000");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array('SELECT * FROM products WHERE is_delete=0 AND category_id = '.$category.' AND price >= 500000 AND price <= 1000000 LIMIT '.$start.','.$limit);
        return $list_user;
        }
        else if($price == 3){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category AND price >= 1000000 AND price <= 5000000");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array('SELECT * FROM products WHERE is_delete=0 AND category_id = '.$category.' AND price >= 1000000 AND price <= 5000000 LIMIT  '.$start.','.$limit);
        return $list_user;


        }
        else if($price == 4){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category AND price >= 5000000 AND price <= 10000000");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array('SELECT * FROM products WHERE is_delete=0 AND category_id = '.$category.' AND price >= 5000000 AND price <= 10000000 LIMIT '.$start.','.$limit);
        return $list_user;

        }
        else if($price == 5){
        $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND category_id = $category AND price > 10000000 ");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array('SELECT * FROM products WHERE is_delete=0 AND category_id = '.$category.' AND price > 10000000  LIMIT '.$start.','.$limit);
        return $list_user;
        }
    }
    function paginationSearchPrice($page,$limit,$keyword,$price){
        if($price ==1 ){
        $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price < 500000");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price < 500000 LIMIT $start,$limit");
        return $list_user;
        }
        else if($price==2){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price >= 500000 AND price <= 1000000");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price >= 500000 AND price <= 1000000 LIMIT $start,$limit");
        return $list_user;
        }
        else if($price == 3){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price >= 1000000 AND price <= 5000000");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price >= 1000000 AND price <= 5000000 LIMIT $start,$limit");
        return $list_user;


        }
        else if($price == 4){
            $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price >= 5000000 AND price <= 10000000");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price >= 5000000 AND price <= 10000000 LIMIT $start,$limit");
        return $list_user;

        }
        else if($price == 5){
        $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price > 10000000 ");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' AND price > 10000000  LIMIT $start,$limit");
        return $list_user;
        }
    }
    function paginationSearch($page,$limit,$keyword){
        $total_row = db_num_rows("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%'");
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array("SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' LIMIT $start,$limit");
        return $list_user;
    }
    function searchProduct($keyword){
        $sql="SELECT * FROM products WHERE is_delete=0 AND name LIKE '%$keyword%' LIMIT 0,5";
        $result=db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function getCategory($id){
        $sql = "SELECT * FROM category WHERE id = $id";
        $result = db_fetch_row($sql);
        if(!empty($result)){
            return $result;
        }
        return false;

    }

    
?>