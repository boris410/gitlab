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
        $result = $this->connection->prepare("SELECT * FROM `account_record` WHERE `account_id` = ? ");
        $result->bindParam(1,$accountId);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //取得帳號 金額 儲存金額
    function saveMoneyInto($getAccount, $inputMoney)
    {
        $result = $this->connection->prepare("UPDATE `account_detail` SET `account_money` = `account_money`+ ? WHERE `account_account`= ?");
        $result->bindParam(1,$inputMoney);
        $result->bindParam(2,$getAccount);
        $result->execute();
    }

    //取得帳號 金額 提取金額
    function takeMoneyOut($getAccount, $outputMoney)
    {
        $this->select("LOCK TABLES account_detail WRITE;");
        $result = $this->connection->prepare("SELECT `account_money` FROM `account_detail` WHERE `account_account`= ? AND (`account_money`- ?) >= 0");
        $result->bindParam(1,$getAccount);
        $result->bindParam(2,$outputMoney);
        $result->execute();

        if ($result->fetchAll(PDO::FETCH_ASSOC)) {
            $result = $this->connection->prepare("UPDATE `account_detail` SET `account_money` = `account_money`- ? WHERE `account_account` = ? ");
            $result->bindParam(1,$outputMoney);
            $result->bindParam(2,$getAccount);
            $result->execute();
            $this->connection->query("UNLOCK TABLES;");
            return true;
        } else {
            $this->connection->query("UNLOCK TABLES;");
            return false;
        }
    }
}
