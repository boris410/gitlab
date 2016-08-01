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
                if($lougout->logout())//執行logout刪除session 還傳true or fales
                header("location: index");
              
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
                $car = $this->model("car");
                $billdata = $car->showbill();
              
               if($billdata){
                if($_GET['delete']){
                        $car->delegoods();
                        header("location: cart");       
                }
                elseif($_POST['paysubmit']){
                        if($car->deal()){
                        header("location: cart");       
                       }
                }
               }else{
                       header("location: login");
               }
                $this->view("head");
                $this->view("cart",$billdata);
                $this->view("foot");
        }
        
        function pay(){//顯示物品付費方式頁面
                
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
                        $logphp=new logphp();
                        
                       
                        if($logphp->register()){
                                header("location: login");     
                        }else{
                                $this->view("head");
                                $this->view("register");
                                $this->view("foot");
                        }
                }
                $this->view("head");
                $this->view("register"); 
                $this->view("foot");
        }
        
        function single(){
                
                $this->model("goodslist");
                $goods= new goodslist();
                $goodsdata = $goods->showgoodsingle();//回傳的資料陣列
            if($_GET['addc']){
                $this->model("car");
                $car= new car();
                    if($car->addgoods($goodsdata)){//檢查是否有登入 有登入 新增到購物車
                            header("location: index");
                    }else{//沒有登入則不會新增到購物車 且導向到登入
                            header("location: login");
                    }
                }
                $this->view("head");
                $this->view("single",$goodsdata);
                $this->view("foot");
        }
        
        function get(){
                $a = $this->model("database");
                $command = "select * from member";
                $b = $a->select($command);
                var_dump($b);
                
        }
}

?>