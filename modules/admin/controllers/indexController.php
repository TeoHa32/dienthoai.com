<?php
function construct(){
    // load_model('index');
}

function indexAction(){
    if(isset($_SESSION['is_loginAdmin'])){
        load_view('index');
    }else{
        redirect('?mod=users&controller=index&action=index');
    }

}

?>