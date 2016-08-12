<?php

class HomeController extends Load
{
    //首頁
    function index()
    {
        if ($_POST['post_account']) {
            $dataBase = $this->model("DataBase");

            //檢查輸入的帳號
            if ($dataBase->checkAccount($_POST['post_account']) > 0) {
                $session = $this->model("Session");
                $session->setUserSession($_POST['post_account']);
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
        $session = $this->model("Session");
        $getSession = $session->getUserSession();

        //選擇操作
        if ($_POST['inquireMoney']) {
            header("location:  inquireMoney");
        }

        if ($_POST['inputMoney']) {
            header("location: inputMoney");
        }

        if ($_POST['outputMoney']) {
            header("location: outputMoney");
        }

        if ($_POST['showAccountDetail']) {
            header("location: showAccountRecord");
        }

        if ($_POST['logout']) {
            header("location: logout");
        }

        $this->view("Head");
        $this->view("ShowAccount", $getSession);
        $this->view("Foot");
    }

    //查詢明細
    function showAccountRecord()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");
        $getSession = $session->getUserSession();
        $accountId = $dataBase->getAccounData($getSession);
        $record = $dataBase->getAccounRecord($accountId['account_id']);
        $this->view("Head");
        $this->view("ShowAccountRecord", $record);
        $this->view("Foot");
    }

    //存入金額
    function inputMoney()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");
        $getSession = $session->getUserSession();
        $accountId = $dataBase->getAccounData($getSession);

        if ($_POST['post_inputmoney']) {
            if ($_POST['post_inputmoney'] >= 0) {

                //帶入帳號及金額
                $dataBase->saveMoneyInto($accountId['account_id'], $_POST['post_inputmoney']);
                header("location: showAccount");
            }
        }

        $this->view("Head");
        $this->view("InputMoney");
        $this->view("Foot");
    }

    //提取金額
    function outputMoney()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");
        $getSession = $session->getUserSession();
        $accountId = $dataBase->getAccounData($getSession);

        if ($_POST['post_outputmoney']) {
            $money = $dataBase->checkMoney($accountId['account_id']);

            if (($money['account_money'] -= $_POST['post_outputmoney']) >= 0) {
                $dataBase->takeMoneyOut($accountId['account_id'], $money['account_money'], $_POST['post_outputmoney']);
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
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");

        //取得帳號資訊
        $getSession = $session->getUserSession();
        $record = $dataBase->getAccounData($getSession);
        $this->view("Head");
        $this->view("InquireMoney", $record);
        $this->view("Foot");
    }

    //登出
    function logout()
    {
        $session = $this->model("Session");
        $session->clearSession();
        header("location: index");
    }
}
