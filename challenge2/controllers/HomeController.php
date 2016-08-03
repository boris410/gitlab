<?php

class HomeController extends Controller {
        
        function index(){//首頁
                $show_action  = $this->model("show_action");
                $result = $show_action->show_action();
                
                $this->view("head");
                $this->view("index",$result);
                $this->view("foot");
        }
        function login(){
                if(isset($_POST[login])){
                        $door = $this->model("door");
                         if($door->login()){
                                 
                         }
                }
                $this->view("head");
                $this->view("login");
                $this->view("foot");
        }
        function logout(){
        }
        function build(){//建立活動
                
                $this->view("head");
                $this->view("build");
                $this->view("foot");
        }
        function accending(){//報名
                $show_action  = $this->model("show_action");
                $result = $show_action->show_accending();
                $this->view("head");
                $this->view("accending",$result);
                $this->view("foot");
        }
        
}

?>