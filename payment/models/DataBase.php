<?php

class DataBase
{
    const DATABASE_HOST = 'localhost';
    const DATABASE_NAME = 'payment';
    const DATABASE_USERNAME = 'root';
    const DATABASE_PASSWORD = '';
    private $connection = null;

    public function __construct()
    {
        $dsn = sprintf('mysql:dbname=%s;host=%s', static::DATABASE_NAME, static::DATABASE_HOST);
        try {
            $this->connection = new PDO($dsn, static::DATABASE_USERNAME, static::DATABASE_PASSWORD);
            $this->connection->exec("set names utf8");
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function select($sql)
    {
        $action =  $this->connection->query($sql);
        return  $action->fetchAll(PDO::FETCH_ASSOC);
    }

     //查詢帳號對應的資訊account_inquire
    function getAccounData($getAccount)
    {
        $result = $this->connection->prepare("SELECT * FROM `account_detail` WHERE `account_account` = ? ");
        $result->bindParam(1,$getAccount);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //取得帳號id 查詢table record
    function getAccounRecord($accountId)
    {
        $result = $this->select("SELECT * FROM `account_record` WHERE `account_id` = $accountId ");
        return $result;
    }

    //取得帳號 金額    儲存金額
    function saveMoneyInto($getAccount, $inputMoney)
    {
        $this->select("UPDATE `account_detail` SET `account_money` = `account_money`+ $inputMoney WHERE `account_account`= $getAccount");
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
