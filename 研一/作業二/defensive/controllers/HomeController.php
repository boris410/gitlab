<?php

class HomeController extends Load
{
    //首頁
    function index()
    {
        if ($_POST['account']) {
            $dataBase = $this->model("DataBase");

            //檢查輸入的帳號
            if ($dataBase->checkAccount($_POST['account']) > 0) {
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
        $session = $this->model("Session");

        //取得session內使用者的資料檢查登入狀態
        $getSession = $session->getUserSession();//

            if (!$getSession) {
                header("location: index");
            }

            //選擇操作
            if ($_POST['lastMoney']) {
                header("location:  lastMoney");
            }

            if ($_POST['saveMoney']) {
                header("location: saveMoney");
            }

            if ($_POST['takeMoney']) {
                header("location: takeMoney");
            }

            if ($_POST['showRecord']) {
                header("location: showRecord");
            }

            if ($_POST['logout']) {
                header("location: logout");
            }

        $this->view("Head");
        $this->view("ShowAccount", $getSession);
        $this->view("Foot");
    }

    //查詢明細
    function showRecord()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");
        $getSession = $session->getUserSession();
        $accountId = $dataBase->getAccounData($getSession);
        $record = $dataBase->getAccounRecord($accountId['id']);
        $this->view("Head");
        $this->view("ShowRecord", $record);
        $this->view("Foot");
    }

    //存入金額
    function saveMoney()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");
        $getSession = $session->getUserSession();
        $accountId = $dataBase->getAccounData($getSession);

        if($_POST['saveMoney']){
            $result = $dataBase->saveMoneyInto($accountId['id'], $_POST['saveMoney']);

            //帶入帳號及金額
            if ($result == "ok") {
                header("location: showAccount");
            }
        }

        if (!($result) && $_POST['saveMoney']) {
            $error = $result;
        }

        $this->view("Head");
        $this->view("SaveMoney", $error);
        $this->view("Foot");
    }

    //提取金額
    function takeMoney()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");
        $getSession = $session->getUserSession();
        $accountId = $dataBase->getAccounData($getSession);

        //檢查金錢額度
        $money = $dataBase->checkMoney($accountId['id'],$_POST['takeMoney']);

        if ($money) {
            $result= $dataBase->takeMoneyOut($accountId['id'], $money['money'], $_POST['takeMoney']);

            if ($result !="ok") {
                $error =  $result ;
            }

            header("location: ShowAccount");
        }

        if (!($money) && $_POST['takeMoney']) {
            $error = "金額不足";
        }

        $this->view("Head");
        $this->view("TakeMoney", $error);
        $this->view("Foot");
    }

    //查詢餘額
    function lastMoney()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");

        //取得帳號資訊
        $getSession = $session->getUserSession();
        $record = $dataBase->getAccounData($getSession);
        $this->view("Head");
        $this->view("LastMoney", $record);
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
