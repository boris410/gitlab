<?php 
class BlogController extends Controller{
            function index(){
                
                $this->model("blogphp");
                $blogphp = new blogphp();
               
                if($blogphp->checkstatus($_SESSION['userName'],$_SESSION['userpass'])){//後臺首頁就檢查是否登入
                    
                        
                        $this->model("pagetabsdata");
                        $pagetabsdata = new pagetabsdata();
                        $pagetabsdata= $pagetabsdata->indexpage($_GET['clickpage']);//載入頁籤資料
                        
                        $this->model("bloguserlist");
                        $user= new bloguserlist();
                        $userdata = $user->showuser();//回傳使用者資料陣列
                }else{//判斷如果沒有登入就導向到login介面
                        header("location: bloglogin");
                }
                
                
                        $this->view("Blog/bloghead");//
                        $this->view("Blog/blogindex",$userdata);
                        $this->view("pagetabs",$pagetabsdata);
                        $this->view("Blog/blogfoot");
            }
            function bloglogin(){
               
                $this->model("blogphp");
                $blogphp = new blogphp();
                if(isset($_POST["Login"])){
                    
                    if($blogphp->login($_POST["txtUserName"],$_POST["txtPassword"])){
                    header("location: index");//登入成功導向到index做判斷
                    }else{
                        echo "帳號 or 密碼錯誤";
                    }
                    
                }
  
                $this->view("Blog/bloghead");
                $this->view("Blog/bloglogin");
                $this->view("Blog/blogfoot");
                
            }
            function bloglogout(){
  
                $this->model("blogphp");
                $blogphp = new blogphp();
                $blogphp->logout();
                if( $blogphp->logout()){
                    header("location: bloglogin");
                }else{
                    echo "登出失敗，請正常操作";
                }
                
               
            }
            
           
            function userpersonal(){
               
                $this->model("blogphp");
                $person = new blogphp();
                    if($person->checkstatus($_SESSION['userName'],$_SESSION['userpass'])){
                        $persondata = $person->personnalshow($_POST['user']);
                    }else{
                            header("location: bloglogin");
                    }
                
                $this->view("Blog/bloghead");
                $this->view("Blog/blogpersonal",$persondata);
                $this->view("Blog/blogfoot");
                
               
                
            }
             
              
            function addProduct(){//判斷是否有操做 新增項目或是 刪除項目  或是什麼都沒做
                
                $this->model("blogphp");
                $person = new blogphp();
                
                if($person->checkstatus($_SESSION['userName'],$_SESSION['userpass'])){
                    
                            $this->model("goodslist");
                            $goodslist = new goodslist();
                            $goods = $goodslist->showgoods();
                            
                            if(isset($_POST['add'])){//操作到新增商品
                                    $this->model("blogaddp");
                                    $blogaddp = new blogaddp();

                                    if($blogaddp->addp($_POST['gname'],$_POST['gPrice'],$_POST['gintroduce'])){
                                        header("location: addProduct");
                                    }else{
                                        echo "檔案名稱重複 or 沒有檔案";
                                    }
                            }elseif(isset($_POST['delete'])){//操作到刪除商品
                                    $this->model("blogaddp");
                                    $blogaddp = new blogaddp();
                                   if($blogaddp->deladdp($_POST['delete'])){
                                        header("location: addProduct");
                                   }else{
                                        echo "刪除失敗，請正常操作或是檢查資料夾路徑";
                                    }
                            }
                    $this->model("pagetabsdata");
                    $pagetabsdata = new pagetabsdata();
                    $pagetabsdata= $pagetabsdata->indexpage($_GET['clickpage']);//載入分頁籤DATA
                                    
                    $this->view("Blog/bloghead");
                    $this->view("Blog/blogaddproduct",$goods);
                    $this->view("pagetabs",$pagetabsdata);
                    $this->view("Blog/blogfoot");
                }else{
                    header("location: bloglogin");
                } 
                                   

                                
                            
            }
                
}
            
          




?>