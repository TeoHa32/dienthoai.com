<?php
    function construct(){
        load_model('index');
}
    function indexAction(){
        if(isset($_SESSION['is_login'])){
            redirect('?mod=home&controller=index&action=index');
        } else{
            load_view('index');
        }
    }
    function redirectRegisterAction(){
        if(isset($_SESSION['is_login'])){
            redirect('?mod=home&controller=index&action=index');
        } else{
            load_view('register');
        }
    }
    function addUserAction(){
        global $error;
        if(isset($_POST['register'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $re_password = $_POST['re_password'];
        $data = array(
            'username' => $username,
            'email' => $email,
            'phone' => $phone,
            'password' => $password,
            'role' => '3'
        );
        if(!empty(validate_username(username: $username))||!empty(validate_email(email: $email))||!empty(validate_phone(phone: $phone))||!empty(validate_password(password: $password))||!empty(validate_re_password( $re_password,$password))){
            $error['username'] = validate_username($username);
            $error['email'] = validate_email($email);
            $error['phone'] = validate_phone($phone);
            $error['password'] = validate_password($password);
            $error['re_password'] = validate_re_password($re_password,$password);
            load_view('register',['error' => $error,'data' => $data]);
        }else{
            if(checkUsername($username)){
                $error['username'] = "Tên đăng nhập đã tồn tại";
                load_view('register',['error' => $error,'data' => $data]);
            }else{
              
                if(addUser($data)){
                    load_view('index');
                }else{
                    $error['db'] = "Đăng ký thất bại. Vui lòng thử lại!";
                    load_view('register',['error' => $error,'data' => $data]);
                }
            }
        }
    }
}
    function loginAction(){
        global $error;  
        if(isset($_POST['login'])){
            $username = $_POST['username'];
            $password = $_POST['password'];
            $remember = isset($_POST['remember']) ? $_POST['remember'] : 0;
            $data = array(
                'username' => $username,
                'password' => $password,
                'remember' => $remember
            );
            
            if(!empty(validate_username(username: $username))||!empty(validate_password(password: $password))){
                $error['username'] = validate_username($username);
                
                $error['password'] = validate_password($password);
                
                load_view('index',['error' => $error,'data' => $data]);
            }
            else{
                if(checkLogin($username,$password)&&checkRole($username) == 3){
                    $_SESSION['is_login'] = true;
                    $_SESSION['username'] = $username;
                    if($remember){
                        setcookie('username',$username,time()+3600*24*30);
                        setcookie('password',$password,time()+3600*24*30);
                    }
                    echo $_SESSION['is_login'];
                    redirect('?mod=home&controller=index&action=index');
            }
            else if(checkLogin($username,$password)&&(checkRole($username) == 1 || checkRole($username) == 2)){
                $_SESSION['is_loginAdmin'] = true;
                $_SESSION['usernameAdmin'] = $username;
                if($remember){
                    setcookie('usernameAdmin',$username,time()+3600*24*30);
                    setcookie('passwordAdmin',$password,time()+3600*24*30);
                }
                redirect('?mod=admin&controller=index&action=index');
            }
            else{
                $error['login'] = "Tên đăng nhập hoặc mật khẩu không chính xác";
                load_view('index',['error' => $error,'data' => $data]);
            }
        }
        }
    }
?>