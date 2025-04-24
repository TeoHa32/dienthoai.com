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
function paginationAction(){
    if(isset($_GET['btn-r-price'])){
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $category = $_GET['category'];
            $price = $_GET['r-price'];
            $limit = 5;
            $listProduct = paginationPrice($page,$limit,$category,$price);
            $num_page = ceil(getTotalRowPrice($category,$price)/$limit);
            load_view('index',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'category'=>$category,'price'=> $price]);
        }
        else {
            $page = 1;
            $limit = 5;
            $category = $_GET['category'];
            $price = $_GET['r-price'];
            $listProduct = paginationPrice($page,$limit,$category,$price);
            $num_page = ceil(getTotalRowPrice($category,$price)/$limit);
            load_view('index',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'category'=>$category,'price'=> $price]);
        }
    }
    else if(isset($_GET['price'])){
        $page = $_GET['page'];
            $category = $_GET['category'];
            $price = $_GET['price'];
            $limit = 5;
            $listProduct = paginationPrice($page,$limit,$category,$price);
            $num_page = ceil(getTotalRowPrice($category,$price)/$limit);
            load_view('index',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'category'=>$category,'price'=> $price]);
    }
    else{
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $category = $_GET['category'];
        $limit = 5;
        $listProduct = pagination($page,$limit,$category);
        $num_page = ceil(getTotalRow($category)/$limit);
        load_view('index',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'category'=>$category]);
    }
    else {
        $page = 1;
        $limit = 5;
        $category = $_GET['category'];
        
        $listProduct = pagination($page,$limit,$category);
        $num_page = ceil(getTotalRow($category)/$limit);
        load_view('index',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'category'=>$category]);
    }
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

function searchAction(){
    if(isset($_GET['sm-s'])){
        $keyword = $_GET['s'];
        $listProduct = searchProduct($keyword);
        
        if(!empty($listProduct)){
            $page =1;
            $num_page = ceil(getTotalRowSearch($keyword)/5);
            load_view('searchProduct',['listProduct' => $listProduct,'page' => $page,'num_page' => $num_page,'keyword'=>$keyword]);
        }
        else{
            $error['searchProduct'] = "Không tìm thấy sản phẩm";
            // $listProduct = getListProduct();
            $page =1;
            $num_page = 0;
            load_view('searchProduct',['error' => $error,'page' => $page,'num_page' => $num_page,'keyword'=>$keyword]);
        }

    }
}
function paginationSearchAction(){
    if(isset($_GET['btn-r-price'])){
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $keyword = $_GET['keyword'];
            $price = $_GET['r-price'];
            $limit = 5;
            $listProduct = paginationSearchPrice($page,$limit,$keyword,$price);
            $num_page = ceil(getTotalRowSearchPrice($keyword,$price)/$limit);
            load_view('searchProduct',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'keyword'=>$keyword,'price'=> $price]);
        }
        else {
            $page = 1;
            $limit = 5;
            $keyword = $_GET['keyword'];
            $price = $_GET['r-price'];
            $listProduct = paginationSearchPrice($page,$limit,$keyword,$price);
            $num_page = ceil(getTotalRowSearchPrice($keyword,$price)/$limit);
            load_view('searchProduct',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'keyword'=>$keyword,'price'=> $price]);
        }
    }
    else if(isset($_GET['price'])){
        $page = $_GET['page'];
            $keyword = $_GET['keyword'];
            $price = $_GET['price'];
            $limit = 5;
            $listProduct = paginationSearchPrice($page,$limit,$keyword,$price);
            $num_page = ceil(getTotalRowSearchPrice($keyword,$price)/$limit);
            load_view('searchProduct',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'keyword'=>$keyword,'price'=> $price]);
    }
    else{
    if(isset($_GET['page'])){
        $page = $_GET['page'];
        $keyword = $_GET['keyword'];
        $limit = 5;
        $listProduct = paginationSearch($page,$limit,$keyword);
        $num_page = ceil(getTotalRowSearch($keyword)/$limit);
        load_view('searchProduct',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'keyword'=>$keyword]);
    }
    else {
        $page = 1;
        $limit = 5;
        $keyword = $_GET['keyword'];
        $listProduct = paginationSearch($page,$limit,$keyword);
        $num_page = ceil(getTotalRowSearch($keyword)/$limit);
        load_view('searchProduct',['listProduct' => $listProduct,'num_page' => $num_page,'page' => $page,'keyword'=>$keyword]);
    }
}
}
?>