<?php
    function checkUsername($username){
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $result = db_query($query);
        if(!empty($result)){
            return true;
        }else{
            return false;
        }
    }
    function getListUser(){
        $query = "SELECT * FROM users";
        $result = db_query($query);
        if(!empty($result)){
            return $result;
        }else{
            return false;
        }
    }
    function checklogin($username,$password){
        $listUser = getListUser();
        if(!empty($listUser)){
            foreach($listUser as $user){
                if($user['username'] == $username && $user['password'] == $password){
                    return true;
                }
            }
            return false;
        }
        return false;
    }
    function checkRole($username){
        $query = "SELECT * FROM users WHERE username = '{$username}'";
        $result = db_fetch_row($query);
        if(!empty($result)){
            return $result['role'];
        }
    }
    function addUser($data){
        
        if(db_insert('users',$data)){
            return true;
        }
        return false;
    }
?>