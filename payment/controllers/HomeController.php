<?php
    class HomeController extends load
    {
        function index()//首頁
        {
            $bank = $this->model("bank");
            var_dump($_POST['account']);
                if($bank->account_inquire("$_POST[account]")){
                    $SESSION = $this->model("SESSION");
                    $SESSION->set_user_SESSION("$_POST[account]");
                    header("location: account");
                }
            $this->view("head");
            $this->view("index");
            $this->view("foot");
        }
        
       
    }
?>













