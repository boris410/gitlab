<?php

class HomeController extends Controller {
        
        function index(){
                $this->view("head");  
                $this->model("goodslist");
                $goods= new goodslist();
                $goodsdata = $goods->showgoods();//回傳的資料陣列
                $this->view("index",$goodsdata);
                $this->view("foot");
                
        }
        function login(){
               session_start();
                $this->model("logphp");//載入
                $logphp = new logphp();
                if($logphp->login()){//判斷是否有連線
                
                      //$this->view("index");//有則載入到index
                      //$this->view("index");
                      header("location: index");
              }
              $this->view("head");
              $this->view("login");
              $this->view("foot");
        }
        function logout(){
               
                $this->model("logphp");
                $lougout = new logphp();
                $lougout->logout();//執行logout刪除session
                $this->view("index");/*************************************************************************/
        }
        function personal(){
                session_start();
                $this->model("logphp");
                $person = new logphp();
                $check = $person->checkstatus();
                if($check!=null){
                        $persondata = $person->personnalshow();
                }else{
                        header("location: login");
                }
                
                $this->view("head");
                $this->view("personal",$persondata);
                $this->view("foot");
                
        }
         function cart(){
                session_start();
                
                $this->model("car");
                $car= new car();
                $billdata = $car->showbill();
               
                if($_GET['delete']){
                       $car->delegoods();
                        
                }
                elseif($_GET['deal']){
                       $car->deal();
                }
                
                
                $this->view("head");
                $this->view("cart",$billdata);
                $this->view("foot");
        }
        function pay(){//顯示物品付費方式頁面
                session_start();
                $_GET['gId'] = $_SESSION[car][$_GET['pay']][1];//將會員的特定項目編號值給到一個參數並丟掉fumction中撈出資料庫資料
                $this->model("goodslist");
                $goodslist = new goodslist();
                $result = $goodslist->showgoodsingle();//秀出圖片及價格
                $this->view("head");
                $this->view("pay",$result);
                $this->view("foot");
        }
         function register(){
                if(isset($_POST['submit'])){
                        $this->model("logphp");
                        $registerdata=new logphp();
                        $registerdata->register();
                        $this->view("head");
                        $this->view("register");
                        $this->view("foot");
                }else{
                        $this->view("head");
                        $this->view("register"); 
                        $this->view("foot");
                        
                }
                
               
        }
        function single(){
                
                $this->model("goodslist");
                $goods= new goodslist();
                $goodsdata = $goods->showgoodsingle();//回傳的資料陣列
                //var_dump($goodsdata);
            if($_GET['addc']){
                        $this->model("car");
                        $car= new car();
                        $car->addgoods($goodsdata);
                }
            
                $this->view("head");
                $this->view("single",$goodsdata);
                $this->view("foot");
        }
}

?>