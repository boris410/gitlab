<?php

class bank extends load
{
    private $db;

    function __construct()
    {
        $this->db = $this->model("DataBase");
    }

    function getAccounData($account)//查詢帳號對應的資訊account_inquire
    {
        $result = $this->db->select("SELECT * FROM `account_detail` WHERE `account_account` = $account");
        return $result;
    }

    function account_record($account_id)//取得帳號id 查詢table record
    {
        $result = $this->db->select("SELECT * FROM `account_record` WHERE `account_id` = $account_id ");
        return $result;
    }

    function account_input($account_account, $inputmoney)//取得帳號 金額    儲存金額
    {
        $this->db->select("UPDATE `account_detail` SET `account_money`= `account_money`+ $inputmoney WHERE `account_account`=$account_account");
    }

    function account_output($account_account, $outputmoney)//取得帳號 金額 提取金額
    {
        $this->db->select("LOCK TABLES account_detail WRITE;");//鎖表 檢查金額扣到操作金額後不可以為負值
        $result = $this->db->select("SELECT `account_money` FROM `account_detail` WHERE `account_account`=$account_account AND (`account_money`-$outputmoney)>=0");

        if ($result) {
            $this->db->select("UPDATE `account_detail` SET `account_money`= `account_money`- $outputmoney WHERE `account_account`=$account_account");
            $this->db->select("UNLOCK TABLES;");//儲存金額並解鎖table
            return true;
        } else {
            $this->db->select("UNLOCK TABLES;");//並解鎖table 回傳false
            return false;
        }
    }
}
