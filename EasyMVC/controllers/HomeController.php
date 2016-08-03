<?php

class HomeController extends Controller {
        
        function index(){
                $this->view("head"); 
                $pagetabsdata = $this->model("pagetabsdata");
                $pagetabsdata= $pagetabsdata->indexpage();
                
                $goods = $this->model("goodslist");
                $goodsdata = $goods->showgoods();//回傳的資料陣列
                
                $this->view("index",$goodsdata);
                $this->view("pagetabs",$pagetabsdata);
                $this->view("foot");
        }
        
        function login(){
                if(isset($_POST["Login"])){
                        $db = $this->model("database");
                        if($db->checklogin($_POST['txtUserEmail'],$_POST['txtPassword'])){//到database檢查資料庫
                                $SESSION = $this->model("SESSION");//設定session
                                $SESSION->set_user_POST($_POST['txtUserEmail'],$_POST['txtPassword']);
                                header("location: index");
                        }
                }
                $this->view("head");
                $this->view("login");
                $this->view("foot");
        }
        
        function logout(){
                $SESSION = $this->model("SESSION");
                $SESSION ->clear_all_user_SESSION();
                header("location: index");
              
        }
        
        function personal(){
                $logphp = $this->model("logphp");
                if($logphp->checkaccount()){
                        $SESSION = $this->model("SESSION");
                        $getSESSION = $SESSION->get_user_SESSION_all_array();//取得SESSION的帳號 密碼陣列
                        $goodslist = $this->model("goodslist");
                        $persondata = $goodslist->personnalshow($getSESSION);
                }else{
                        header("location: login");
                }
                $this->view("head");
                $this->view("personal",$persondata);
                $this->view("foot");
        }
        
         function cart(){
                 //$car = $this->model("car");
        //         $billdata = $car->showbill();
              
        //       if($billdata){
        //         if($_GET['delete']){
        //                 $car->delegoods();
        //                 header("location: cart");       
        //         }
        //         elseif($_POST['paysubmit']){
        //                 if($car->deal()){
        //                 header("location: cart");       
        //               }
        //         }
        //       }else{
        //               header("location: login");
        //       }
        //         $this->view("head");
        //         $this->view("cart",$billdata);
        //         $this->view("foot");
        $logphp = $this->model("logphp");
        if($logphp->checkaccount()){
                $SESSION = $this->model("SESSION");
                $getSESSION = $SESSION->get_user_SESSION_account();//取得SESSION的帳號 密碼陣列
                $car = $this->model("car");
                $cardata = $car->showbill($getSESSION);
                if($_GET['delete']){
                        
                        $SESSION->clear_car_SESSION("$_GET[delete]");//刪除這個購物車的session
                        header("location: cart");       
                }
                elseif($_POST['paysubmit']){
                        $SESSIONarray = $SESSION->get_car_SESSION($_POST['deal']);//取得購物車SESSION值
                        if($SESSIONarray){
                                if($car->deal($SESSIONarray,$_POST['address'],$_POST[ 'paytype'],$_POST['addressee'])){
                                        $SESSION->clear_car_SESSION($_POST['deal']);//如果沒有商品了就將購物車的SESSION刪掉
                                        header("location: cart");       
                                }
                        }
                }
        }else{
                        header("location: login");
        }
        $this->view("head");
        $this->view("cart",$cardata);
        $this->view("foot");
        }
        
        function pay(){//顯示物品付費方式頁面
                $goodslist = $this->model("goodslist");
                $result = $goodslist->showgoodsingle($_GET['gId']);//秀出圖片及價格
                $this->view("head");
                $this->view("pay",$result);
                $this->view("foot");
        }
        
        function register(){
                // if(isset($_POST['submit'])){
                //         $logph = $this->model("logphp");
                //         if($logphp->register()){
                //                 header("location: login");     
                //         }else{
                //                 $this->view("head");
                //                 $this->view("register");
                //                 $this->view("foot");
                //         }
                // }
                // $this->view("head");
                // $this->view("register"); 
                // $this->view("foot");
                $SESSION = $this->model("SESSION");
                if(!$SESSION->check_user_SESSION()){
                        if(isset($_POST['submit'])){
                                $logphp = $this->model("logphp");
                                $db = $this->model("database");
                                if(!$db->checklogin($_POST['txtUserEmail'],$_POST['txtPassword'])){//檢查帳號是否存在 存在代表重複
                                        if($logphp->register($_POST['firstname'],$_POST['lastname'],$_POST['txtUserEmail'],$_POST['txtPassword'],$_POST['phone'])){
                                                header("location: login");
                                        }
                                
                                }else{
                                        
                                }
                        }
                }else{
                        header("location: index");
                }
                $this->view("head");
                $this->view("register"); 
                $this->view("foot");
                
        }
        
        function single(){
                $goods = $this->model("goodslist");
                $goodsdata = $goods->showgoodsingle($_GET['gId']);//回傳的資料陣列
                $SESSION = $this->model("SESSION");
                if($_GET['addc']){
                        if($SESSION->check_user_SESSION()){
                                
                                $car = $this->model("car");
                                $resultarray = $car->addgoods($goodsdata,$SESSION->get_user_SESSION_account(),$SESSION->get_SESSION('buytime'));
                                
                                var_dump($resultarray['addid']);
                                var_dump($resultarray['car']);
                                $SESSION->set_car_SESSION($resultarray);
                                unset($_GET['addc']);
                                header("location: index");
                                
                        }else{//沒有登入則不會新增到購物車 且導向到登入
                                header("location: login");
                        }
                }
                $this->view("head");
                $this->view("single",$goodsdata);
                $this->view("foot");
        
        }

}

?>