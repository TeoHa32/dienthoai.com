<?php
    function construct(){
        load_model('order');
    }
    function indexAction(){
        $listOrder = getBill();
        
        load_view('listOrder',['list'=>$listOrder]);
    }
    function statusAction(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $status=$_GET['status'];
            if($status != 3){
                $status +=1;
                $data= array(
                    'status'=>$status
                );
                if(updateOrder('bill',$data,'id='.$id)){
                    indexAction();
                }
            } else indexAction();

        }
         
    }
    function detailAction(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $customer = getCustomerById($id);
            $bill = getBillById($id);
            $listInfoBill = getListInfoBill($bill['id']);
            load_view('detailBill',['customer'=>$customer,'bill'=> $bill,'listInfoBill'=>$listInfoBill]);
        }
    }
    function searchStatusOrderAction(){
        if(isset($_GET['sm_s'])){
            $status= $_GET['statusSearch'];
            if(!empty($status)){
            $listOrder = getBillByStatus($status);
        
        load_view('listOrder',['list'=>$listOrder]);
            }else {
                indexAction();
            }
        }
    }
    function searchDateOrderAction(){
        if(isset($_GET['dateSearch'])){
            $date1 = $_GET['start'];
            $date2= $_GET['end'];
            if(empty($date1)||empty($date2)){
                if(!empty($date1)){
                    $listOrder = getBillByDate($date1);
        
                    load_view('listOrder',['list'=>$listOrder,'date1'=>$date1]);
                }else{
                    $listOrder = getBillByDate($date2);
        
                    load_view('listOrder',['list'=>$listOrder,'date2'=>$date2]);
                }
            }else if(!empty($date1)&&!empty($date2)){
                $listOrder = getBillByTwoDate($date1,$date2);
        
                    load_view('listOrder',['list'=>$listOrder,'date1'=>$date1,'date2'=>$date2]);
            }
        }
    }

?>