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
function redirectDetailProductAction(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        if($id>0){
            $product = getProductById($id);
            
            if(!empty($product)){
                
                load_view('detailProduct',['product'=>$product]);
                
            }
            else{
                echo "không tồn tại sản phẩm";
            }
           
        }
    }
    
}
?>