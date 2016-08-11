<?php
class HomeController extends Load
{
    //首頁
    function index()
    {
        if ($_POST['post_account']!="") {
            $dataBase = $this->model("DataBase");
            //檢查輸入的帳號
            if ($dataBase->getAccounData($_POST['post_account'])) {
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
        $dataBase = $this->model("DataBase");
        //取得帳號資訊
        $session = $this->model("Session");
        $result = $dataBase->getAccounData($session->getUserSession());

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
            header("location: showAccountDetail");
        }

        if ($_POST['logout']) {
            header("location: logout");
        }

        $this->view("Head");
        $this->view("ShowAccount", $result);
        $this->view("Foot");
    }

    //查詢明細
    function showAccountDetail()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");
        //透過session 取出明細
        $result = $dataBase->getAccounRecord($session->getUserSession());
        $this->view("Head");
        $this->view("ShowAccountDetail", $result);
        $this->view("Foot");
    }

    //存入金額
    function inputMoney()
    {
        $dataBase = $this->model("DataBase");
        $session = $this->model("Session");
        $result = $dataBase->getAccounData($session->getUserSession());

        if ($_POST['post_inputMoney']!="") {
            //帶入帳號及金額
            $dataBase->saveMoneyInto($result[0]['account_id'], $_POST['post_inputMoney']);
            header("location: showAccount");
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
        $result = $dataBase->getAccounData($session->getUserSession());

        if ($_POST['post_outputMoney']!="") {
            $result2 = $dataBase->checkMoney($result[0]['account_id']);
            if ($result2['account_money'] -= $_POST['post_outputMoney'] >= 0) {
                $dataBase->takeMoneyOut($result[0]['account_id'], $_POST['post_outputMoney']);
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
        $result = $dataBase->getAccounData($session->getUserSession());
        $this->view("Head");
        $this->view("InquireMoney", $result);
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
