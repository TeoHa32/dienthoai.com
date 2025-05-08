<?php
function getListInfoBill($id){
    $sql = "SELECT * FROM billinfo WHERE bill_id = $id";
    $result = db_fetch_array($sql);
    return $result;
}
function getProductCartById($id){
    $sql = "SELECT * FROM products WHERE id = $id";
    $result = db_fetch_row($sql);
    if(!empty($result)){
        return $result;
    }
    return false;
}
function getCustomerById($id){
    $sql = "SELECT * FROM users WHERE id = $id";
    $result = db_fetch_row($sql);
    if(!empty($result)){
        return $result;
    }
}
function getBill(){
    $sql = "SELECT * FROM bill";
    $result = db_fetch_array($sql);
    if(!empty($result)){
        return $result;
    }
    return false;
}
function getBillById($id){
    $sql = "SELECT * FROM bill WHERE id = $id";
    $result = db_fetch_row($sql);
    if(!empty($result)){
        return $result;
    }
    return false;
}
function getBillByStatus($id){
    $sql = "SELECT * FROM bill WHERE status = $id";
    $result = db_fetch_array($sql);
    if(!empty($result)){
        return $result;
    }
    return false;
}
function getBillByDate($date){
    $sql = "SELECT * FROM bill WHERE DATE(create_at) = '$date'";
   
    $result = db_fetch_array($sql);
    if(!empty($result)){
        return $result;
    }
    return false;
}
function getBillByTwoDate($date1, $date2){
    $sql = "SELECT * FROM bill WHERE DATE(create_at) >= '$date1' AND DATE(create_at) <= '$date2'";
    $result = db_fetch_array($sql);
    if(!empty($result)){
        return $result;
    }
    return false;
}
function updateOrder($table, $data, $where){
    if(db_update($table, $data, $where)>0){
        return true;
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

?>