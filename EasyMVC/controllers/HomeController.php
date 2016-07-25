<?php

class HomeController extends Controller {
        
        function index(){
                $this->view("head"); 
                $this->model("pagetabsdata");
                $pagetabsdata = new pagetabsdata();
                $pagetabsdata= $pagetabsdata->indexpage();
                $this->model("goodslist");
                $goods= new goodslist();
                $goodsdata = $goods->showgoods();//回傳的資料陣列
                $this->view("index",$goodsdata);
                $this->view("pagetabs",$pagetabsdata);
                $this->view("foot");
               
                
        }
        function login(){
               
                $this->model("logphp");//載入
                $logphp = new logphp();
                if($logphp->login()){//判斷是否有連線
                
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
               
                $this->model("goodslist");
                $goodslist = new goodslist();
                $this->model("logphp");
                $logphp = new logphp();
                
                $check = $logphp->checkstatus();
                if( $check!=null){
                        $persondata = $goodslist->personnalshow();
                }else{
                        header("location: login");
                }
                
                $this->view("head");
                $this->view("personal",$persondata);
                $this->view("foot");
                
        }
         function cart(){
                
                
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
                        $registerdata->register($this->DB());
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