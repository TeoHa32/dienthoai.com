<?php
    function addToCart($product){
    
        $qty = 1;
        if(isset($_SESSION['cart']['buy']) && array_key_exists($product['id'], $_SESSION['cart']['buy'])){
            $qty = $_SESSION['cart']['buy'][$product['id']]['qty'] + 1;

    }
    $_SESSION['cart']['buy'][$product['id']] = array(
        'id' => $product['id'],
        'name' => $product['name'],
        'price' => $product['price'],
        'qty' => $qty,
        'sub_total' => $product['price'] * $qty
    );
    $num_order = 0;
    $total = 0;
    foreach($_SESSION['cart']['buy'] as $key => $item){
        $num_order += $item['qty'];
        $total += $item['sub_total'];
    }
    $_SESSION['cart']['info'] = array(
        'num_order' => $num_order,
        'total' => $total
    );
    if(isset($_SESSION['cart']['buy'][$product['id']])) return true;
    return false;
}
function deleteCart(){
    unset($_SESSION['cart']);
}
function deleteItem($id){
    foreach($_SESSION['cart']['buy'] as $key => $value){
        if($value['id'] == $id){
            unset($_SESSION['cart']['buy'][$key]);
        }
    }
    $num_order = 0;
    $total = 0;
    foreach($_SESSION['cart']['buy'] as $key => $item){
        $num_order += $item['qty'];
        $total += $item['sub_total'];
    }
    $_SESSION['cart']['info']['num_order'] = $num_order;
    $_SESSION['cart']['info']['total'] = $total;
}
function updateCart($list){
    foreach($list as $key => $value){
        $_SESSION['cart']['buy'][$key]['qty'] = $value;
        $_SESSION['cart']['buy'][$key]['sub_total'] = $value * $_SESSION['cart']['buy'][$key]['price'];
    }
    $num_order = 0;
    $total = 0;
    foreach($_SESSION['cart']['buy'] as $key => $item){
        $num_order += $item['qty'];
        $total += $item['sub_total'];
    }
    $_SESSION['cart']['info']['num_order'] = $num_order;
    $_SESSION['cart']['info']['total'] = $total;
}
?>