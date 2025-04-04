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
    function paginationAction(){
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $limit = 5;
            $listProduct = pagination($page,$limit);
            $num_page = ceil(getTotalRow()/$limit);
            load_view('listProduct',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page]);
        }
        else {
            $page = 1;
            $limit = 5;
            $listProduct = pagination($page,$limit);
            $num_page = ceil(getTotalRow()/$limit);
            load_view('listProduct',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page]);
        }
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
                        paginationAction();
                    }else{
                        $error['addProduct'] = "Thêm sản phẩm thất bại";
                        load_view('addProduct',['error' => $error,'data'=>$data,'img'=>$img_tmp_path,'listCategory' => $listCategory]);
                    }
                    
                }
            } 
        
    }
}
function redirectEditProductAction(){
    $listCategory = getListCategory();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $product = getProductById($id);
        $img=getImgById($product['img']);
        load_view('editProduct',['product' => $product,'img'=>$img,'listCategory'=>$listCategory]);
    }
}

function editProductAction(){
    if(isset($_POST['btn-submit'])){
        $id = $_POST['id'];
        if(empty($_FILES['file']['name'])){
        
        $product = getProductById($id);
        $img=getImgById($product['img']);
        $data = array(
            'name' => $_POST['product_name'],
            'price' => $_POST['price'],
            'des' => $_POST['desc'],
            'regrect' => $_POST['regrect'],
            'category_id' => $_POST['parent_id'],
            'img' => $img['id'],
        );
        if(!empty($data)){
            if(updateProduct('products',$data,'id='.$id)){
                paginationAction();
            }
        }

    
    
    }
        
        else{
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
                        
                    );
                    if(!empty($data)){
                        if(updateProduct('products',$data,'id='.$id)){
                                $listProduct = getListProduct();
                                load_view('listProduct',['listProduct' => $listProduct]);
                        }
                    }
                }
            } 
        }
    }
    }
    function deleteProductAction(){
        
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $product = getProductById($id);
            $data = array(
                'is_delete' => '1',
            );
            if(deleteProduct('products',$data,'id='.$id)){
                
                paginationAction();
            }
        }
    }
    function searchProductAction(){
        if(isset($_GET['sm_s'])){
            $keyword = $_GET['s'];
            $listProduct = searchProduct($keyword);
            if(!empty($listProduct)){
                $page =1;
                $num_page = ceil(getTotalRow()/5);
                load_view('listProduct',['listProduct' => $listProduct,'page' => $page,'num_page' => $num_page]);
            }
            else{
                $error['searchProduct'] = "Không tìm thấy sản phẩm";
                $listProduct = getListProduct();
                $page =1;
                $num_page = ceil(getTotalRow()/5);
                load_view('listProduct',['error' => $error,'listProduct' => $listProduct,'page' => $page,'num_page' => $num_page]);
            }

        }
    }
    

?>