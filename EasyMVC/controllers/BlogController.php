<?php 
    class BlogController extends load{
        function index(){
            $SESSION = $this->model("SESSION");
            if($SESSION->check_user_SESSION()){//後臺首頁就檢查是否登入
                $pagetabsdata = $this->model("pagetabsdata");
                $page= $pagetabsdata->indexpage($_GET['clickpage']);//載入頁籤資料
                $user = $this->model("bloguserlist");
                $userdata = $user->showuser();//回傳使用者資料陣列
            }else{//判斷如果沒有登入就導向到login介面
                header("location: bloglogin");
            }
            $this->view("Blog/bloghead");//
            $this->view("Blog/blogindex",$userdata);
            $this->view("pagetabs",$page);
            $this->view("Blog/blogfoot");
            }
            
        function bloglogin(){
            $db = $this->model("database");
            if($db->checkadminlogin($_POST['txtUserName'],$_POST['txtPassword'])){
                $SESSION = $this->model("SESSION");
                $SESSION->set_user_POST($_POST['txtUserName'],$_POST['txtPassword']);
                header("location: index");
            }
            $this->view("Blog/bloghead");
            $this->view("Blog/bloglogin");
            $this->view("Blog/blogfoot");
            }
            
        function bloglogout(){
            $SESSION = $this->model("SESSION");
            $SESSION->clear_all_user_SESSION();
            header("location: index");
        }
            
        function userpersonal(){
            $person = $this->model("blogphp");
            $SESSION = $this->model("SESSION");
            if($SESSION->check_user_SESSION()){
                $persondata = $person->personnalshow($_POST['user']);
            }else{
                header("location: bloglogin");
            }
            $this->view("Blog/bloghead");
            $this->view("Blog/blogpersonal",$persondata);
            $this->view("Blog/blogfoot");
        }
            
        function addProduct(){//判斷是否有操做 新增項目或是 刪除項目  或是什麼都沒做
            $SESSION = $this->model("SESSION");
            if($SESSION->check_user_SESSION()){
                $goodslist = $this->model("goodslist");
                $goods = $goodslist->showgoods();
                if(isset($_POST['add'])){//操作到新增商品
                    $blogaddp = $this->model("blogaddp");
                    if($blogaddp->addp($_POST['gname'],$_POST['gPrice'],$_POST['gintroduce'])){
                        header("location: addProduct");
                    }
                }elseif(isset($_POST['delete'])){//操作到刪除商品
                    $blogaddp = $this->model("blogaddp");
                    if($blogaddp->deladdp($_POST['prod'])){
                        unset($_POST['prod']);
                        header("location: addProduct");
                    }
                }
                $this->model("pagetabsdata");
                $pagetabsdata = new pagetabsdata();
                $pagetabsdata= $pagetabsdata->indexpage();
                $this->view("Blog/bloghead");
                $this->view("Blog/blogaddproduct",$goods);
                $this->view("pagetabs",$pagetabsdata);//載入分頁籤
                $this->view("Blog/blogfoot");
            }else{
                header("location: bloglogin");
            } 
        }
}
?>