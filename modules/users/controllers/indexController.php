<?php
    function construct(){
        load_model('index');
        
    }
    function indexAction(){
        load_view('index');
    }
    function redirectRegisterAction(){
        load_view('register');
    }

?>