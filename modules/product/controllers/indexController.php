<?php
function construct(){
    load_model('index');
}
function indexAction(){
    if(isset($_GET['category'])){
        $category = $_GET['category'];
        $listProduct = getListProductByCategory($category);
        $listImg = getListImg();
        load_view('index',['listProduct' => $listProduct,'listImg' => $listImg]);
    }
    
}
?>