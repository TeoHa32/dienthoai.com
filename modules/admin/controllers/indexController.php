<?php
function construct(){
    load_model('index');
}
function indexAction(){
    if(isset($_SESSION['is_loginAdmin'])){
        $countBill =  countBill();
        $countProduct= countProduct();
        $countCustomer = countCustomer();
        $sumBill = sumBill();
        load_view('index', ['countBill'=>$countBill,'countProduct'=>$countProduct,'countCustomer'=>$countCustomer,'sumBill'=>$sumBill]);
    }else{
        redirect('?mod=users&controller=index&action=index');
    }
}
?>