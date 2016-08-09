<?php
class HomeController extends load
{
    function index()//首頁
    {
        if(isset($_POST['submit'])){
            $bank = $this->model("bank");

            if ($bank->account_inquire("$_POST[account]")) {//輸入帳號
                $session = $this->model("SESSION");
                $session->set_user_SESSION($_POST['account']);//設定session account
                header("location: showAccount");
            }

         }
         $this->view("head");
         $this->view("index");
         $this->view("foot");
    }

    function showAccount()//操作頁面
    {
        $bank = $this->model("bank");
        $result = $bank->account_inquire("$_SESSION[account]");//提取帳號資訊

        if ($_POST['option'] == "1") {//選擇操作 查詢金額
             header("location:  inquire_money");
        }

        if ($_POST['option'] == "2") {//存錢
             header("location: input");
        }

        if ($_POST['option'] == "3") {
             header("location: output");
        }

        if ($_POST['option'] == "4") {
             header("location: inquire");
        }

        if ($_POST['option'] == "5") {
             header("location: logout");
        }

        $this->view("head");
        $this->view("showAccount", $result);
        $this->view("foot");
    }

    function inquire()//查詢明細
    {
        $bank = $this->model("bank");
        $result = $bank->account_inquire("$_SESSION[account]");//透過session 取得帳號 pk
        $result2 = $bank->account_record($result[0]['account_id']);//透過 pk account_id 取出明細   record表只對應account_id
        $this->view("head");
        $this->view("inquire", $result2);
        $this->view("foot");
    }

    function input()//存入金額
    {
        $bank = $this->model("bank");
        $result = $bank->account_inquire("$_SESSION[account]");//取得帳號資訊

        if (isset($_POST['submitmoney'])) {
            $bank->account_input($result[0]['account_account'], $_POST['inputmoney']);//帶入帳號及金額
            header("location: showAccount");
        }
        $this->view("head");
        $this->view("input");
        $this->view("foot");
    }

    function output()//提取金額
    {
        $bank = $this->model("bank");
        $result = $bank->account_inquire("$_SESSION[account]");//取得帳號資訊

        if (isset($_POST['submitmoney'])) {
            if ($bank->account_output($result[0]['account_account'], $_POST['outputmoney'])) {//帶入帳號及金額
                header("location: showAccount");
             }
        }
        $this->view("head");
        $this->view("output");
        $this->view("foot");
    }

    function inquire_money()//查詢餘額
    {
        $bank = $this->model("bank");
        $result = $bank->account_inquire("$_SESSION[account]");//取得帳號資訊
        $this->view("head");
        $this->view("inquire_money", $result);
        $this->view("foot");
    }

    function logout()//登出
    {
        $SESSION = $this->model("SESSION");
        $SESSION->clear_SESSION();//清除session
        header("location: index");
    }
}














