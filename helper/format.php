<?php
function currency_format($number, $suffix = 'đ'){
    return number_format($number).$suffix;
}
function validate_username($username){
   $error = array();
   if(empty($username)){
    $error['username'] = "Tên đăng nhập không được để trống";
   } else{
    $pattern = '/^[a-zA-Z0-9_.]{6,32}$/';

    if(!preg_match($pattern, $username)){
        $error['username'] = 'Tên đăng nhập không hợp lệ';
    }else $error['username'] = "";
   }
   return $error['username'];
}
function validate_email($email){
    $error = array();
    if(empty($email)){
        $error['email'] = "Email không được để trống";
    } else{
        $pattern = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
        if(!preg_match($pattern, $email)){
            $error['email'] = "Email không hợp lệ";
        }
        else $error['email'] = "";
    }
    return $error['email'];
}
function validate_phone($phone){
    $error = array();
    if(empty($phone)){
        $error['phone'] = "Số điện thoại không được để trống";
    }else{
        $pattern = '/^[0-9]{10}$/';
        if(!preg_match($pattern, $phone)){
            $error['phone'] = "Số điện thoại không hợp lệ";
        }else $error['phone'] = "";
    }
    return $error['phone'];
}
function validate_password($password){
    $error = array();
    if(empty($password)){
        $error['password'] = "Mật khẩu không được để trống";
    }else{
        $pattern = '/^[a-zA-Z0-9!@#$%^&*.]{6,32}$/';
        if(!preg_match($pattern, $password)){
            $error['password'] = "Mật khẩu không hợp lệ";
        }else $error['password'] = "";
    }
    return $error['password'];
}
function validate_re_password($re_password, $password){
    $error = array();
    if(empty($re_password)){
        $error['re_password'] = "Mật khẩu không được để trống";
    }else{
        if($re_password != $password){
            $error['re_password'] = "Mật khẩu không khớp";
        }else{
            $error['re_password'] = "";
        }
    }
    return $error['re_password'];
}
?>