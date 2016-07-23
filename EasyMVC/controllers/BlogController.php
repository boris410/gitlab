<?php 
class BlogController extends Controller{
            function index(){
                
                $this->model("blogphp");
                $blogphp = new blogphp();
                $check = $blogphp->checkstatus();//檢查登入狀況
                if($check != ""){
                    
                        $this->view("Blog/bloghead");/**載入head**/
                        
                        /*載入model*/
                        $this->model("pagetabsdata");
                        $pagetabsdata = new pagetabsdata();
                        $pagetabsdata= $pagetabsdata->indexpage();
                        $this->model("bloguserlist");
                        $user= new bloguserlist();
                        $userdata = $user->showuser();//回傳的資料陣列
                        /*載入model*/
                        
                        /****顯示內容****/
                        $this->view("Blog/blogindex",$userdata);
                        $this->view("pagetabs",$pagetabsdata);
                        $this->view("Blog/blogfoot");
                         /****顯示內容****/
                }else{
                        
                        header("location: bloglogin");
                        
                }
            }
            function bloglogin(){
               
                $this->model("blogphp");//載入
                $blogphp = new blogphp();
                $blogphp->login();
                
                $this->view("Blog/bloghead");
                $this->view("Blog/bloglogin");
                $this->view("Blog/blogfoot");
                
            }
            function bloglogout(){
              
                $this->model("blogphp");
                $blogphp = new blogphp();
                $blogphp->logout();
                header("location: bloglogin");
               
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
               
                $this->model("blogphp");
                $person = new blogphp();
                $check = $person->checkstatus();
         
                if($check !=""){
                    
                    $persondata = $person->personnalshow($_POST['user']);
                    $this->view("Blog/bloghead");
                    $this->view("Blog/blogpersonal",$persondata);
                    $this->view("Blog/blogfoot");
                }else{
                        header("location: bloglogin");
                }
                
               
                
            }
             
              
              function addProduct(){//判斷是否有操做 新增項目或是 刪除項目  或是什麼都沒做
                
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
                                    
                                    /*載入model*/
                                    $this->model("pagetabsdata");
                                    $pagetabsdata = new pagetabsdata();
                                    $pagetabsdata= $pagetabsdata->indexpage();
                                    /*載入model*/
                                    
                                    /***載入網頁內容view***/
                                    $this->view("Blog/blogaddproduct",$goods);
                                    $this->view("pagetabs",$pagetabsdata);
                                    $this->view("Blog/blogfoot");
                                    /***載入網頁內容***/
                                
                            }
                 }
                
            }
            
          
}



?>