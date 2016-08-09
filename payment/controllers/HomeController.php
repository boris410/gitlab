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
            if($_POST['option']=="1"){
             header("location: inquire");
            }elseif($_POST['option']=="2"){
             header("location: input");
            }elseif($_POST['option']=="3"){
              header("location: output");
            }
            $this->view("head");
            $this->view("account",$result);
            $this->view("foot");
        }
        
        function inquire()//首頁
        {
            $bank = $this->model("bank");
            $result = $bank->account_inquire("$_SESSION[account]");
            $result2 = $bank->account_record($result[0]['account_id']);
            $this->view("head");
            $this->view("inquire",$result2);
            $this->view("foot");
        }
        
         function input()//首頁
        {
            $bank = $this->model("bank");
            $result = $bank->account_inquire("$_SESSION[account]");
            if(isset($_POST['submitmoney'])){
             $bank->account_input($result[0]['account_account'],$_POST['inputmoney']);
             header("location: account");
            }
            $this->view("head");
            $this->view("input");
            $this->view("foot");
            
        }
         function output()//首頁
        {
            $this->view("head");
            $this->view("output");
            $this->view("foot");
        }
        
    }
?>













