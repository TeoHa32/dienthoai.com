<?php
    function construct(){
        load_model('product');
        load_model('category');
    }

    function indexAction(){
        $listProduct = getListProduct();
        load_view('listProduct',['listProduct' => $listProduct]);
    }
    function redirectaddProductAction(){
        $listCategory = getListCategory();
        load_view('addProduct',['listCategory' => $listCategory]);
    }
    function addProductAction(){
        $listCategory = getListCategory();
        global $error;
        if(isset($_POST['btn-submit'])){
            $img_tmp_path = $_FILES['file']['tmp_name'];
            $upload_dir = 'public/images/';
            $file_name = $_FILES['file']['name'];
            $file_path = $upload_dir . $file_name;
            if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
                
                $data_image = array(
                    'src' => $file_path,
                );
                $id_image = addImage($data_image);
                if($id_image>0){
                    $data = array(
                        'name' => $_POST['product_name'],
                        'price' => $_POST['price'],
                        'des' => $_POST['desc'],
                        'regrect' => $_POST['regrect'],
                        'img' => $id_image,
                        'category_id' => $_POST['parent_id'],
                        'is_delete' => 'false',
                    );
                    if(addProduct($data)){
                        load_view('listProduct');
                    }else{
                        $error['addProduct'] = "Thêm sản phẩm thất bại";
                        load_view('addProduct',['error' => $error,'data'=>$data,'img'=>$img_tmp_path,'listCategory' => $listCategory]);
                    }
                    
                }
            } 
        
    }
}
    
    


?>