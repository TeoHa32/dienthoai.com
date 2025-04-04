<?php
    function addEmployee($data){
        
        if(db_insert('users',$data)){
            return true;
        }
        return false;
    }
   
    function getListEmployee(){
        $sql="SELECT * FROM users WHERE role= 2 AND is_delete = 0";
        $result=db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    
    function getEmployeeById($id){
        $sql="SELECT * FROM users WHERE id=$id";
        $result=db_fetch_row($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function updateEmployee($table, $data, $where){
        if(db_update($table, $data, $where)>0){
            return true;
        }
        return false;
    }
    function deleteEmployee($table,$data,$where){
        if(db_update($table,$data,$where)){
            return true;
        }
        return false;
    }
    function getTotalRow(){
        $total_row = db_num_rows('SELECT * FROM users WHERE role = 2 AND is_delete = 0');
        return $total_row;
    }
    function pagination($page,$limit){
        $total_row = db_num_rows('SELECT * FROM users WHERE role=2 AND is_delete = 0');
        $num_page = ceil($total_row/$limit);
        $start = ($page-1)*$limit;
        $list_user =  db_fetch_array('SELECT * FROM users WHERE role =2 AND is_delete = 0 LIMIT '.$start.','.$limit);
        return $list_user;
    }
    function searchEmployee($keyword){
        $sql="SELECT * FROM users WHERE role = 2 AND name LIKE '%$keyword%'";
        $result=db_fetch_array($sql);
        if(!empty($result)){
            return $result;
        }
        return false;
    }
    function checkUsername($username){
        $query = "SELECT * FROM users WHERE username LIKE '{$username}'";
        $result = db_fetch_row($query);
        if(empty($result)){
            return false;
        }else{
            return true;
        }
    }
?>