<?php
    class HomeController extends load
    {
        function index()//首頁
        {
            if(isset($_POST['submit'])){
                $bank = $this->model("bank");
                if($bank->account_inquire("$_POST[account]")){
                    $session = $this->model("SESSION");
                    $session->set_user_SESSION($_POST['account']);
                    header("location: account");
                }
            }
            $this->view("head");
            $this->view("index");
            $this->view("foot");
        }
        function account()//首頁
        {
            $bank = $this->model("bank");
            $result = $bank->account_inquire("$_SESSION[account]");
            switch ($_POST['option']){
               case "1" :
                         echo "1";
                         break;
               case "2" :
                         echo "2";
                         break;
               case "3" :
                         echo "3";
                         break;
            }
            $this->view("head");
            $this->view("account",$result);
            $this->view("foot");
        }
        
    }
?>













