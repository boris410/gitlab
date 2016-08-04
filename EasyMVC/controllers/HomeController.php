<?php

        class HomeController extends load {
                function index(){
                        $this->view("head"); 
                        $pagetabsdata = $this->model("pagetabsdata");
                        $page= $pagetabsdata->indexpage($_GET['clickpage']);//載入分頁鈕
                        $goods = $this->model("goodslist");
                        $goodsdata = $goods->showgoods();//回傳的資料陣列
                        $this->view("index",$goodsdata);
                        $this->view("pagetabs",$page);
                        $this->view("foot");
                }
                
                function login(){
                        if(isset($_POST["Login"])){
                                $db = $this->model("database");
                                if($db->checklogin($_POST['txtUserEmail'],$_POST['txtPassword'])){//到database檢查資料庫
                                        $SESSION = $this->model("SESSION");//設定session
                                        $SESSION->set_user_SESSION($_POST['txtUserEmail'],$_POST['txtPassword']);
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
                        $SESSION = $this->model('SESSION');
                        $result= $SESSION->get_user_SESSION_all_array();//先取得目前SESSION['username']
                        $db = $this->model("database");
                        if($db->checklogin($result['username'],$result['userpass'])){//檢查是否事前台使用者
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
                        $SESSION = $this->model('SESSION');
                        $result= $SESSION->get_user_SESSION_all_array();//先取得目前SESSION['username']
                        $db = $this->model("database");
                        if($db->checklogin($result['username'],$result['userpass'])){
                                $getaccount = $SESSION->get_user_SESSION_all_array();
                                $car = $this->model("car");
                                $cardata = $car->showbill($getaccount['username']);//顯示此帳號的帳單內容
                                if($_GET['delete']){//執行刪除
                                        $SESSION->clear_car_SESSION("$_GET[delete]");//刪除這個購物車的session
                                        header("location: cart");       
                                }elseif($_POST['paysubmit']){//執行付費方式
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
                        $SESSION = $this->model("SESSION");
                        $result= $SESSION->get_user_SESSION_all_array();//先取得目前SESSION['username']
                        $db = $this->model("database");
                        if(!$db->checklogin($result['username'],$result['userpass'])){
                                if(isset($_POST['submit'])){
                                        $register = $this->model("register");
                                        $db = $this->model("database");
                                        if(!$db->checklogin($_POST['txtUserEmail'],$_POST['txtPassword'])){//檢查帳號是否存在 存在代表重複
                                                if($register->creataccount($_POST['firstname'],$_POST['lastname'],$_POST['txtUserEmail'],$_POST['txtPassword'],$_POST['phone'])){
                                                        header("location: login");
                                                }
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
                        $goodsdata = $goods->showgoodsingle($_GET['gId']);//顯示選定的物品資料
                        if($_GET['addc']){//執行加到購物車
                                $SESSION = $this->model("SESSION");//載入SESSION model
                                $result= $SESSION->get_user_SESSION_all_array();//取得session內的帳號
                                $db = $this->model("database");
                                if($db->checklogin($result['username'],$result['userpass'])){//檢查是否有登入
                                        $car = $this->model("car");
                                        $resultarray = $car->addgoods($goodsdata,$result['username'],$SESSION->get_SESSION('buytime'));//加入到購物車內
                                        $SESSION->set_car_SESSION($resultarray);//設定session內的購物車變數
                                        header("location: index");
                                }else{//沒有登入則不會新增到購物車 且導向到登入
                                        header("location: login");
                                }
                        }
                        $this->view("head");
                        $this->view("single",$goodsdata);
                        $this->view("foot");
                }
                 function test(){
                         $SESSION = $this->model("SESSION");
                         var_dump($_SESSION['test']['test2']);

                 }
        }
?>