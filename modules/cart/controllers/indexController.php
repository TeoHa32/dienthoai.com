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
            
            if(addToCart($item)){
                echo "<script>alert('Thêm sản phẩm vào giỏ hàng thành công');
                window.location.href = '?mod=product&controller=index&action=redirectDetailProduct&id=".$id."';
                </script>";


            }else{
                echo "<script>alert('thêm sản phẩm thất bại');
                window.location.href = '?mod=product&controller=index&action=redirectDetailProduct&id=".$id."';
                </script>";
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
    load_view('checkOut',['user'=>$user]);
}





?>