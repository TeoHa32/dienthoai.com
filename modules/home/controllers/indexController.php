<?php
    function construct(){
        load_model('index');
    }
    function indexAction(){
        $listNew= getListProductNew();
        $listIP = getListProductIP();
        $listSS = getListProductSS();
        $listOP = getListProductOP();
        load_view('index',['listnew'=>$listNew,'listIP'=>$listIP,'listSS'=>$listSS,'listOP'=>$listOP]);
    }
    
?>