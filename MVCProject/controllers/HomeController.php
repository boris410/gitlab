<?php

class HomeController extends Controller {
        
        function index(){
                $this->model("goodslist");
                $goods= new goodslist();
                $goodsdata = $goods->showgoods();//回傳的資料陣列
                $this->view("index",$goodsdata);  
                
        }
       
        function hello($name) {
                $user = $this->model("User");
                $user->name = $name;
                $this->view("Home/hello", $user);
                echo "Hello! $user->name";
        }
        function login(){
              $this->model("logphp");//載入
              $logphp = new logphp();
                if($logphp->login()){//判斷是否有連線
                
                      //$this->view("index");//有則載入到index
                      header("location: index");
              }
              $this->view("login");
        }
        function logout(){
                session_start();//session start開啟session
                $this->model("logphp");
                $lougout = new logphp();
                $lougout->logout();
                $this->view("index");
        }
        function personal(){
                session_start();
                $this->model("logphp");
                $person = new logphp();
                //$person->checkstatus();
                $persondata = $person->personnalshow();
                $this->view("personal",$persondata);
        }
         function cart(){
                session_start();
                $this->model("car");
                $car= new car();
                $billdata = $car->showbill();
               
                if($_GET['delete']){
                        echo "delete";
                        
                }
                
                
                $this->view("cart",$billdata);
        }
         function register(){
                session_start();
                if(isset($_POST['submit'])){
                        $this->model("logphp");
                        $registerdata=new logphp();
                        $registerdata->register();
                        $this->view("register");  
                }else{
                      
                        $this->view("register");  
                        
                }
               
        }
        function single(){
                session_start();
                $this->model("goodslist");
                $goods= new goodslist();
                $goodsdata = $goods->showgoodsingle();//回傳的資料陣列
                //var_dump($goodsdata);
            if($_GET['addc']){
                        $this->model("car");
                        $car= new car();
                        $car->addgoods($goodsdata);
                }
            
               
                $this->view("single",$goodsdata);  
        }
}

?>