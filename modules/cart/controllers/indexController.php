<?php
    function construct(){
        require_once 'modules/product/models/indexModel.php';
        require_once 'modules/users/models/indexModel.php';
        load_model('index');
        if(!isset($_SESSION['is_login'])){
            redirect('?mod=users&controller=index&action=index');
        }
    }
    function indexAction(){
        load_view('cart');
    }
    function addAction(){
        if(isset($_GET['id'])){
            $id= (int)$_GET['id'];
            $item = getProductById($id);
            $action = $_GET['action'];
            if(addToCart($item)){
                echo "<script>history.back();</script>";
            }
    }
}
function deleteAction(){
    deleteCart();
    load_view('cart');
}
function deleteItemAction(){
    if(isset($_GET['id'])){
        $id = (int)$_GET['id'];
        deleteItem($id);
        load_view('cart');
    }
}
function updateCartAction(){
    if(isset($_POST['update-cart'])){
       $list = $_POST['num-order'];
       updateCart($list);
       load_view('cart');
    }
}
function checkoutAction(){
    $username = $_SESSION['username'];
    $user = getUserByUsername($username);
    print_r($user);
    load_view('checkOut',['user'=>$user]);
}
function orderAction(){
    if(isset($_POST['checkout'])){
        $id_customer = $_POST['id'];
        $address = $_POST['address'];
        $payment = $_POST['payment'];
        $total = $_SESSION['cart']['info']['total'];
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $data = array(
            'id_customer'=>$id_customer,
            'address'=>$address,
            'payment_method'=> $payment,
            'status'=>0,
            'total' => $total, 
            'create_at'=> $now = date('Y-m-d H:i:s')
        );
        if(!empty($data)){
            $result = addToBill($data);
           $bill = getBillById($result);
           $id_customer = $bill['id_customer'];
           $customer = getCustomerById($id_customer);
            if($result > 0){
                foreach($_SESSION['cart']['buy'] as $key => $value){
                    $data_info = array(
                        'bill_id' => $result,
                        'product_id'=> $value['id'],
                         'quantity'=> $value['qty']
                    );
                    $result_info = addToBillInfo($data_info);
                    if($result_info > 0){
                        unset($_SESSION['cart']);
                        $listInfoBill = getListInfoBill($result);
                        // print_r($listInfoBill);
                        redirect('?mod=cart&controller=index&action=detailOrder&id='.$bill['id']);
                    }
                }
            }
        }
    }
}
function detailOrderAction(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $customer = getCustomerById($id);
        $bill = getBillById($id);
        $listInfoBill = getListInfoBill($bill['id']);
        load_view('detailBill',['customer'=>$customer,'bill'=> $bill,'listInfoBill'=>$listInfoBill]);
    }
}
?>