<?php
class HomeController extends Load
{
    //首頁
    function index()
    {
        if (isset($_POST['post_Submit'])) {
            $DataBase = $this->model("DataBase");
            //檢查輸入的帳號
            if ($DataBase->getAccounData($_POST['post_Account'])) {
                $session = $this->model("Session");
                $session->setUserSession($_POST['post_Account']);
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
        $DataBase = $this->model("DataBase");
        //取得帳號資訊
        $result = $DataBase->getAccounData("$_SESSION[session_Account]");

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
        //透過session 取出明細
        $result2 = $DataBase->getAccounRecord($_SESSION['session_Account']);
        $this->view("Head");
        $this->view("ShowAccountDetail", $result2);
        $this->view("Foot");

    }

    //存入金額
    function inputMoney()
    {
        $DataBase = $this->model("DataBase");
        $result = $DataBase->getAccounData("$_SESSION[session_Account]");

        if (isset($_POST['post_SubmitMoney'])) {
            //帶入帳號及金額
            $DataBase->saveMoneyInto($result[0]['account_account'], $_POST['post_InputMoney']);
            header("location: showAccount");
        }

        $this->view("Head");
        $this->view("InputMoney");
        $this->view("Foot");
    }

    //提取金額
    function outputMoney()
    {
        $DataBase = $this->model("DataBase");
        $result = $DataBase->getAccounData("$_SESSION[session_Account]");

        if (isset($_POST['post_SubmitMoney'])) {
            if ($DataBase->takeMoneyOut($result[0]['account_account'], $_POST['post_OutputMoney'])) {
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
        $DataBase = $this->model("DataBase");
        //取得帳號資訊
        $result = $DataBase->getAccounData("$_SESSION[session_Account]");
        $this->view("Head");
        $this->view("InquireMoney", $result);
        $this->view("Foot");
    }

    //登出
    function logout()
    {
        $SESSION = $this->model("Session");
        $SESSION->clearSession();
        header("location: index");
    }
}














