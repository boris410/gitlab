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
                if(isset($_POST['Login'])){//判斷是否有連線
                   if($logphp->login($_POST['txtUserEmail'],$_POST['txtPassword'])){
                        header("location: index");
                   }
                  }else{
                         echo "帳號 or 密碼錯誤";
                    }
                $this->view("head");
                $this->view("login");
                $this->view("foot");
        }
        function logout(){
               
                $this->model("logphp");
                $lougout = new logphp();
                if($lougout->logout()){
                    header("location: index");  
                }//執行logout刪除session 還傳true or fales
                
              
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
                $this->model("logphp");
                $logphp = new logphp();
                if($logphp->checkaccount($_SESSION['userEmail'],$_SESSION['userpass'])){
                        $this->model("car");
                        $car= new car();
                        $billdata = $car->showbill($_SESSION['userEmail'],$_SESSION['userpass']);
                        if($_GET['delete']){
                                if($car->delegoods()){
                                 echo "刪除成功";
                                }
                        }
                        elseif($_GET['deal']){
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
                        $logphp=new logphp();
                        if($logphp->register($_POST['firstname'], $_POST['lastname'],$_POST['txtUserEmail'],$_POST['phone'],$_POST['txtPassword'])){
                                header("location: login");     
                        }else{
                                
                                echo "，申請失敗";    
                                
                        }
                }
                
                $this->view("head");
                $this->view("register"); 
                $this->view("foot");
                        
                
                
               
        }
        function single(){
                
                $this->model("goodslist");
                $goods= new goodslist();
                $goodsdata = $goods->showgoodsingle($_GET['gId']);//回傳的資料陣列
                
        if($_GET['addc']){
                $this->model("car");
                $car= new car();
                        if(isset($_SESSION['buytime'])){
                                $_SESSION['buytime']+=1;
                        }else{
                                $_SESSION['buytime']=1;
                        }
                if($car->addgoods($_SESSION['userEmail'],$_SESSION['userpass'],$goodsdata,$_SESSION['buytime'])){//檢查是否有登入 有登入 新增到購物車
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