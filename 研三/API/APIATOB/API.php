<?php
require_once("DataBase.php");
//抓取url取得輸入的api
$str = strpos($_SERVER['REQUEST_URI'],"API.php");
$str = substr($_SERVER['REQUEST_URI'], $str+8);
echo "<br>";
$str = explode("?",$str);
$userName = $_GET['userName'];
$money = $_GET['money'];
$type = $_GET['type'];
$transId = $_GET['transId'];
$db = new DataBase();

//創立帳號
if ($str[0] == "createCount") {
    if (!$userName) {
        echo "參數帶錯";
        exit;
    }

    if ($db->checkAccount($userName)) {
        echo "帳號已存在";
        exit;
    }

    if($db->createAccount($userName)){
        echo "創立新帳號成功";
        exit;
    }
}

//取得餘額
if ($str[0] == "getBalance") {
     if (!$userName) {
        echo "參數帶錯";
        exit;
    }

    if (!$db->checkAccount($userName)) {
        echo "帳號不存在";
        exit;
    }

    $balance = $db->getBalance($userName);
    print_r("餘額=" . $balance['money']);
    exit;
}

//轉帳
if ($str[0] == "transfer") {

    //判斷有攜帶正確參數
    if (!$userName || !$money || !$type || !$transId) {
        echo "參數帶錯";
        exit;
    }

    //判斷序號及金額一定要是數字
    if (!is_numeric($transId) || !is_numeric($money)) {
        echo "參數帶錯";
        exit;
    }


    if (!$db->checkAccount($userName)) {
        echo "帳號不存在";
        exit;
    }

    //先取得餘額來檢查
    $getBalance = $db->checkMoney($userName);
    $checkMoney = $getBalance[money];
    if ($money <= 0) {
        echo "輸入金額小於0";
        exit;
        }

    if ($db->checkTransId($transId)) {
        echo "轉帳序號重複";
        exit;
    }


    if ($type == "IN") {
        if ($db->transferIn($userName, $money, $transId, $type)) {
        echo "存入成功";
        exit;
        }
    }

    if ($type == "OUT") {
        if ($checkMoney <= $money) {
            echo "餘額不足";
            exit;
        }

        if ($db->transferOut($userName, $money, $transId, $type)) {
        echo "轉出成功";
        exit;
        }
    }
}

//取得轉帳明細
if ($str[0] == "getDetail") {
     if (!$userName || !$transId) {
        echo "參數帶錯";
        exit;
    }

    if (!$db->checkTransId($transId)) {
        echo "轉帳序號不存在";
        exit;
    }

    $detail = $db->getDetail($userName, $transId);
    echo "轉帳序號:" . $detail[id] . "<br>";
    echo "轉帳帳號:" . $detail[userName] . "<br>";
    echo "轉帳動作:" . $detail[type] . "<br>";
    echo "操作金額:" . $detail[money] . "<br>";
    echo "剩餘金額:" . $detail[balance] . "<br>";
    exit;
}

//執行到最後這行表示api打錯
echo "API名稱錯誤";

?>
