<?php

function getListCustomer(){
    $sql="SELECT * FROM users WHERE role= 3 AND is_delete = 0";
    $result=db_fetch_array($sql);
    if(!empty($result)){
        return $result;
    }
    return false;
}
function updateCustomer($table, $data, $where){
    if(db_update($table, $data, $where)>0){
        return true;
    }
    return false;
}
?>