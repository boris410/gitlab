<?php 
class BlogController extends Controller{
            function index(){
                session_start();
                $this->model("blogphp");
                $blogphp = new blogphp();
                $check = $blogphp->checkstatus();//檢查登入狀況
                if($check != ""){
                        $this->view("Blog/bloghead");  
                        $this->model("bloguserlist");
                        $user= new bloguserlist();
                        $userdata = $user->showuser();//回傳的資料陣列
                        $this->view("Blog/blogindex",$userdata);
                        $this->view("Blog/blogfoot");
                }else{
                        
                        header("location: bloglogin");
                        
                }
            }
            function bloglogin(){
                session_start();
                $this->model("blogphp");//載入
                $blogphp = new blogphp();
                $blogphp->login();
                $this->view("Blog/bloghead");
                $this->view("Blog/bloglogin");
                $this->view("Blog/blogfoot");
                
            }
            function bloglogout(){
                session_start();
                $this->model("blogphp");
                $blogphp = new blogphp();
                $blogphp->logout();
                header("location: index");
               
            }
            
            function manage(){
                $this->model("blogphp");
                $blogphp = new blogphp();
                $check = $blogphp->checkstatus();
                    if($check !=""){
                        $this->view("Blog/bloghead");  
                        $this->model("bloguserlist");
                        $user= new bloguserlist();
                        $userdata = $user->showuser();//回傳的資料陣列
                        $this->view("Blog/blogindex",$userdata);
                        $this->view("Blog/blogfoot");
                    }else{
                         header("location: bloglogin");
                    }
               
                
                        
               
            }
            function userpersonal(){
                session_start();
                $this->model("blogphp");
                $person = new blogphp();
                $check = $person->checkstatus();
                
                
                if($check !=""){
                        $persondata = $person->personnalshow($_GET['user']);
                         $this->view("Blog/bloghead");
                $this->view("Blog/blogpersonal",$persondata);
                $this->view("Blog/blogfoot");
                }else{
                        header("location: bloglogin");
                }
                
               
                
            }
              
              function addProduct(){//判斷是否有操做 新增項目或是 刪除項目  或是什麼都沒做
                session_start();
                $this->model("blogphp");
                $person = new blogphp();
                $check = $person->checkstatus();
                if($check !=""){
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
                                    
                            }elseif(isset($_POST['delete'])){
                                    $this->model("blogaddp");
                                    $blogaddp = new blogaddp();
                                    $blogaddp->deladdp();
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
            
            function deal(){//秀出所有的deal
                session_start();
                //echo "deal";
                $this->model("blogphp");
                $blogphp = new blogphp();
                $result = $blogphp->showdeals("like '%@%'");//將這個字串變成mysql語法丟到函示的who中  "select member.mId,bill.* from member join bill on  member.mEmail $who and member.mId = bill.gmemberid";
                if(isset($_POST['gender'])){
                    $blogphp->changesdeal();
                    header("location: deal");
                }
      
                $this->view("Blog/bloghead");
                $this->view("Blog/blogdeal",$result);
                $this->view("Blog/blogfoot");
                
                
            }
}



?>