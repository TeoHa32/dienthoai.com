<?php

/*
 * ---------------------------------------------------------
 * BASE URL
 * ---------------------------------------------------------
 * Cấu hình đường dẫn gốc của ứng dụng
 * Ví dụ: 
 * http://hocweb123.com đường dẫn chạy online 
 * http://localhost/yourproject.com đường dẫn dự án ở local
 * 
 */

$config['base_url'] = "http://localhost/projectmvc.vn/";


$config['default_module'] = 'home';
$config['default_controller'] = 'index';
$config['default_action'] = 'index';
if(isset($_COOKIE['username'])){
    $_SESSION['is_login'] = true;
    $_SESSION['username'] = $_COOKIE['username'];
}
if(isset($_COOKIE['usernameAdmin'])){
    $_SESSION['is_loginAdmin'] = true;
    $_SESSION['usernameAdmin'] = $_COOKIE['usernameAdmin'];
}