<?php
    class HomeController extends load
    {
        function index()//首頁
        {
            $bank = $this->model("bank");
            if($bank->account_inquire("$_POST[account]"))
            {
                header("location: account");
            }
            $this->view("head");
            $this->view("index");
            $this->view("foot");
        }
        function account()//首頁
        {
            $this->view("head");
            $this->view("account");
            $this->view("foot");
        }
    }
?>













