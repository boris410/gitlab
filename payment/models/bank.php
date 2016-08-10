<?php

class bank extends load
{
    private $db;

    function __construct()
    {
        $this->db = $this->model("DataBase");
    }

    //查詢帳號對應的資訊account_inquire
    function getAccounData($getAccount)
    {
        $result = $this->db->select("SELECT * FROM `account_detail` WHERE `account_account` = $getAccount");
        return $result;
    }

    //取得帳號id 查詢table record
    function getAccounRecord($accountId)
    {
        $result = $this->db->select("SELECT * FROM `account_record` WHERE `account_id` = $accountId ");
        return $result;
    }

    //取得帳號 金額 儲存金額
    function saveMoneyInto($getAccount, $inputMoney)
    {
        $this->db->select("UPDATE `account_detail` SET `account_money` = `account_money`+ $inputMoney WHERE `account_account`= $getAccount");
    }

    //取得帳號 金額 提取金額
    function takeMoneyOut($getAccount, $outputMoney)
    {
        //鎖表 檢查金額扣到操作金額後不可以為負值
        $this->db->select("LOCK TABLES account_detail WRITE;");
        $result = $this->db->select("SELECT `account_money` FROM `account_detail` WHERE `account_account`= $getAccount AND (`account_money`- $outputMoney)> = 0");

        if ($result) {
            //儲存金額並解鎖table
            $this->db->select("UPDATE `account_detail` SET `account_money` = `account_money`- $outputMoney WHERE `account_account` = $getAccount");
            $this->db->select("UNLOCK TABLES;");
            return true;
        } else {
            $this->db->select("UNLOCK TABLES;");
            return false;
        }
    }
}
