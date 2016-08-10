<?php
class HomeController extends load
{
    //首頁
    function index()
    {
        if(isset($_POST['submit'])){
            $DataBase = $this->model("DataBase");
            //檢查輸入的帳號
            if ($DataBase->getAccounData("$_POST[account]")) {
                $session = $this->model("Session");
                $session->setUserSession($_POST['account']);
                header("location: showAccount");
            }
         }
         $this->view("Head");
         $this->view("Index");
         $this->view("Foot");
    }

    //操作頁面
    function showAccount()
    {
        $bank = $this->model("bank");
        $DataBase = $this->model("DataBase");
        //取得帳號資訊
        $result = $DataBase->getAccounData("$_SESSION[account]");

        //選擇操作
        if ($_POST['option'] == "1") {
             header("location:  inquireMoney");
        }

        if ($_POST['option'] == "2") {
             header("location: inputMoney");
        }

        if ($_POST['option'] == "3") {
             header("location: outputMoney");
        }

        if ($_POST['option'] == "4") {
             header("location: showAccountDetail");
        }

        if ($_POST['option'] == "5") {
             header("location: logout");
        }

        $this->view("Head");
        $this->view("ShowAccount", $result);
        $this->view("Foot");
    }

    //查詢明細
    function showAccountDetail()
    {
        $DataBase = $this->model("DataBase");
        //透過session 取得帳號 pk
        $result = $DataBase->getAccounData("$_SESSION[account]");
        //透過 pk account_id 取出明細
        $result2 = $DataBase->getAccounRecord($result[0]['account_id']);
        $this->view("Head");
        $this->view("ShowAccountDetail", $result2);
        $this->view("Foot");

    }

    //存入金額
    function inputMoney()
    {
        $bank = $this->model("bank");
        $result = $bank->getAccounData("$_SESSION[account]");

        if (isset($_POST['submitmoney'])) {
            //帶入帳號及金額
            $bank->saveMoneyInto($result[0]['account_account'], $_POST['inputmoney']);
            header("location: showAccount");
        }
        $this->view("Head");
        $this->view("InputMoney");
        $this->view("Foot");
    }

    //提取金額
    function outputMoney()
    {
        $bank = $this->model("bank");
        $result = $bank->getAccounData("$_SESSION[account]");

        if (isset($_POST['submitmoney'])) {
            if ($bank->takeMoneyOut($result[0]['account_account'], $_POST['outputmoney'])) {
                header("location: showAccount");
             }
        }
        $this->view("Head");
        $this->view("OutputMoney");
        $this->view("Foot");
    }

    //查詢餘額
    function inquireMoney()
    {
        $bank = $this->model("bank");
        //取得帳號資訊
        $result = $bank->getAccounData("$_SESSION[account]");
        $this->view("Head");
        $this->view("InquireMoney", $result);
        $this->view("Foot");
    }

    //登出
    function logout()
    {
        $SESSION = $this->model("Session");
        //清除session
        $SESSION->clearSession();
        header("location: index");
    }
}














