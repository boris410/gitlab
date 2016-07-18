<?php 
class BlogController extends Controller{
            function index(){
                session_start();
                $this->model("blogphp");//載入
                $blogphp = new blogphp();
                if($blogphp->login()){
                      header("location: manage");
                }else{
                    
                        $this->view("Blog/bloghead");
                        $this->view("Blog/bloglogin");
                        $this->view("Blog/blogfoot");
                }
            }
            
            function manage(){
                $this->view("Blog/bloghead");  
                $this->model("bloguserlist");
                $user= new bloguserlist();
                $userdata = $user->showuser();//回傳的資料陣列
                $this->view("Blog/blogindex",$userdata);
                $this->view("Blog/blogfoot");
                
                        
               
            }
            function userpersonal(){
                session_start();
                $this->model("blogphp");
                $person = new blogphp();
                $check = $person->checkstatus();
                
                
                if($check!=""){
                        $persondata = $person->personnalshow($_GET['user']);
                }else{
                        header("location: login");
                }
                
                $this->view("Blog/bloghead");
                $this->view("Blog/blogpersonal",$persondata);
                $this->view("Blog/blogfoot");
                
            }
              
              function addProduct(){
                session_start();
                $this->model("goodslist");
                $goodslist = new goodslist();
                $goods = $goodslist->showgoods();
                if(isset($_POST['add'])){
                        $this->model("blogaddp");
                        $blogaddp = new blogaddp();
                        $blogaddp->addp();
                        $this->view("Blog/bloghead");
                        $this->view("Blog/blogaddproduct",$goods);
                        $this->view("Blog/blogfoot");
                }else{
                        $this->view("Blog/bloghead");
                        $this->view("Blog/blogaddproduct",$goods);
                        $this->view("Blog/blogfoot");
                    
                }
               
                
            }
    }



?>