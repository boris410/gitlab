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

     //查詢帳號對應的資訊account_inquire
    function getAccounData($getAccount)
    {
        $result = $this->connection->prepare("SELECT * FROM `account_detail` WHERE `account_account` = ? ");
        $result->bindParam(1, $getAccount);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //取得帳號id 查詢table record
    function getAccounRecord($accountId)
    {
        $result = $this->connection->prepare("SELECT * FROM `account_record` WHERE `account_id` = ? ");
        $result->bindParam(1, $accountId);
        $result->execute();
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //取得帳號 金額 儲存金額
    function saveMoneyInto($getAccount, $inputMoney)
    {

        $this->connection->query("LOCK TABLES account_detail WRITE;");
        $q1Str1 = 'UPDATE `account_detail`';
        $q1Str2 = '  SET `account_money` = `account_money`+ ?';
        $q1Str3 = 'WHERE `account_account`= ?';
        $result = $this->connection->prepare($q1Str1 . $q1Str2 . $q1Str3);
        $result->bindParam(1, $inputMoney);
        $result->bindParam(2, $getAccount);
        $result->execute();
        $this->connection->query("UNLOCK TABLES;");
        $q2Str1 = 'INSERT INTO `account_record`(`account_id`,';
        $q2Str2 = '`account_operation`, `account_opertaion_money`,';
        $q2Str3 = "`account_operation_time`) VALUES (?, 'Save Money', ?, now())" ;
        $result2 = $this->connection->prepare($q2Str1 . $q2Str2 . $q2Str3);
        $result2->bindParam(1, $getAccount);
        $result2->bindParam(2, $inputMoney);
        $result2->execute();
    }

    //取得帳號 金額 提取金額
    function takeMoneyOut($getAccount, $outputMoney)
    {
        $this->connection->query("LOCK TABLES account_detail WRITE;");
        $q1Str1 = "SELECT `account_money` FROM `account_detail`";
        $q1Str2 = "WHERE `account_account`= ? ";
        $q1Str3 = "AND (`account_money`- ?) >= 0";
        $result = $this->connection->prepare($q1Str1 . $q1Str2 . $q1Str3);
        $result->bindParam(1, $getAccount);
        $result->bindParam(2, $outputMoney);
        $result->execute();

        if ($result->fetchAll(PDO::FETCH_ASSOC)) {
            $q2Str1 = "UPDATE `account_detail` SET `account_money` =";
            $q2Str2 = "`account_money`- ? WHERE `account_account` = ? ";
            $result = $this->connection->prepare($q2Str1 . $q2Str2);
            $result->bindParam(1, $outputMoney);
            $result->bindParam(2, $getAccount);
            $result->execute();
            $this->connection->query("UNLOCK TABLES;");
            $q3Str1 = "INSERT INTO `account_record`";
            $q3Str2 = "(`account_id`, `account_operation`,";
            $q3Str3 = "`account_opertaion_money`, `account_operation_time`)";
            $q3Str4 = "VALUES (?, 'Take Money', ?, now())";
            $result2 = $this->connection->prepare($q3Str1 . $q3Str2 . $q3Str3 . $q3Str4);
            $result2->bindParam(1, $getAccount);
            $result2->bindParam(2, $outputMoney);
            $result2->execute();
            return true;
        } else {
            $this->connection->query("UNLOCK TABLES;");
            return false;
        }
    }
}
