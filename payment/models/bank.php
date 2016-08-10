<?php

class bank extends load
{
    private $db;

    function __construct()
    {
        $this->db = $this->model("DataBase");
    }

    //查詢帳號對應的資訊account_inquire
    function getAccounData($account)
    {
        $result = $this->db->select("SELECT * FROM `account_detail` WHERE `account_account` = $account");
        return $result;
    }

    //取得帳號id 查詢table record
    function getAccounRecord($account_id)
    {
        $result = $this->db->select("SELECT * FROM `account_record` WHERE `account_id` = $account_id ");
        return $result;
    }

    //取得帳號 金額    儲存金額
    function saveMoneyInto($account_account, $inputmoney)
    {
        $this->db->select("UPDATE `account_detail` SET `account_money`= `account_money`+ $inputmoney WHERE `account_account`=$account_account");
    }

    //取得帳號 金額 提取金額
    function takeMoneyOut($account_account, $outputmoney)
    {
        //鎖表 檢查金額扣到操作金額後不可以為負值
        $this->db->select("LOCK TABLES account_detail WRITE;");
        $result = $this->db->select("SELECT `account_money` FROM `account_detail` WHERE `account_account`=$account_account AND (`account_money`-$outputmoney)>=0");

        if ($result) {
            //儲存金額並解鎖table
            $this->db->select("UPDATE `account_detail` SET `account_money`= `account_money`- $outputmoney WHERE `account_account`=$account_account");
            $this->db->select("UNLOCK TABLES;");
            return true;
        } else {
            $this->db->select("UNLOCK TABLES;");
            return false;
        }
    }
}
