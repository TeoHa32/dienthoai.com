<?php
function construct(){
    load_model('customer');
}
function indexAction(){
    $list= getListCustomer();
    load_view('listCustomer',['list'=>$list]);
}
function statusAction(){
    if(isset($_GET['status'])){
        $status = $_GET['status'];
        $id=$_GET['id'];
        if($status==0){
            $data= array(
                'status'=>1
            );
            if(updateCustomer('users',$data,'id='.$id)){
                indexAction();
            }
        }
        else{
            $data= array(
                'status'=>0
            );
            if(updateCustomer('users',$data,'id='.$id)){
                indexAction();
            }
        }

    }
}
?>