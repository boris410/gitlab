<?php

class HomeController extends Controller {
        function index(){
                $this->view("index");  
                
        }
       
        function hello($name) {
                $user = $this->model("User");
                $user->name = $name;
                $this->view("Home/hello", $user);
                echo "Hello! $user->name";
        }
        function login(){
               $this->model("logphp");//載入
               $login = new logphp();
              if($login->login()){//判斷是否有連線
                      $this->view("index");//有則導向到index
              }
                   
              
              
              
              
              $this->view("login");
        }
        function logout(){
              $this->model("logphp");
              $lougout = new logphp();
              $lougout->logout();//   到這裡7/14
         
              $this->view("index");
        }
}

?>