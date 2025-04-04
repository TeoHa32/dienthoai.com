<?php
    function construct(){
       load_model('employee');
    }
    function indexAction(){
        paginationAction();
    }
    function addEmployeeAction(){
        global $error;
        if(isset($_POST['btn-submit'])){
            $data = array(
                'fullname' => $_POST['fullname'],
                'username' => $_POST['username'],
                'password' => $_POST['password'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'role' => '2'
            );
            if(!empty(validate_username($data['username']))||!empty(validate_password($data['password']))||!empty(validate_email($data['email']))||!empty(validate_phone($data['phone']))){
                
                $error['username'] = validate_username($data['username']);
                $error['password'] = validate_password($data['password']);
                $error['email'] = validate_email($data['email']);
                $error['phone'] = validate_phone($data['phone']);
                load_view('addEmployee',['error' => $error,'data' => $data]);
            }
            else{
                if(checkUsername($data['username'])){
                    $error['username'] = 'Tên đăng nhập đã tồn tại';
                    load_view('addEmployee',['error' => $error,'data' => $data]);
                }
                else{
                    if(addEmployee($data)){
                        paginationAction();
                    }
                    else{
                        $error['db'] = 'Thêm nhân viên thất bại';
                        load_view('addEmployee',['error' => $error,'data' => $data]);
                    }
                }
                
                
            }
        }
        
    }
    function redirectaddEmployeeAction(){
        load_view('addEmployee');
    }
    function paginationAction(){
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            $limit = 5;
            $listEmployee = pagination($page,$limit);
            $num_page = ceil(getTotalRow()/$limit);
            load_view('listEmployee',['listEmployee' => $listEmployee,'num_page' => $num_page,'page' => $page]);
        }
        else {
            $page = 1;
            $limit = 5;
            $listEmployee = pagination($page,$limit);
            $num_page = ceil(getTotalRow()/$limit);
            load_view('listEmployee',['listEmployee' => $listEmployee,'num_page' => $num_page,'page' => $page]);
        }
    }
    function redirectEditEmployeeAction(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $employee = getEmployeeById($id);
            load_view('editEmployee',['employee' => $employee]);
        }
        else{
            paginationAction();
        }
    }
    function editEmployeeAction(){
        if(isset($_POST['btn-submit'])){
            $id = $_POST['employee_id'];
            $data = array(
                'fullname' => $_POST['fullname'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone']
            );
            if(!empty(validate_email($data['email']))||!empty(validate_phone($data['phone']))){
                
                $error['email'] = validate_email($data['email']);
                $error['phone'] = validate_phone($data['phone']);
                load_view('editEmployee',['error' => $error,'data' => $data]);
            }
            else{
                if(updateEmployee('users',$data,'id = '.$id)){
                    paginationAction();
                }
                else{
                    $error['db'] = 'Sửa nhân viên thất bại';
                    load_view('editEmployee',['error' => $error,'data' => $data]);
                }
            }
            
        }
    }
    function deleteEmployeeAction(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            if(deleteEmployee('users',['is_delete' => 1],'id = '.$id)){
                paginationAction();
            }
            else{
                $error['db'] = 'Xóa nhân viên thất bại';
                paginationAction();
            }
        }
        else{
            paginationAction();
        }
    }
?>