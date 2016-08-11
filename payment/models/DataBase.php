<?php

class DataBase extends HomeController
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

    //取得帳號id, 查詢table record
    function getAccounRecord($accountId)
    {
        $result = $this->connection->prepare("SELECT * FROM `account_record` WHERE `account_id` = ? ");
        $result->bindParam(1, $accountId);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //取得帳號, 金額, 儲存金額
    function saveMoneyInto($getAccount, $inputMoney)
    {
        $this->connection->query("LOCK TABLES account_detail WRITE;");
        $query1 = 'UPDATE `account_detail`' ;
        $query1 .= 'SET `account_money` = `account_money`+ ?';
        $query1 .= 'WHERE `account_account`= ?';
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $inputMoney);
        $result->bindParam(2, $getAccount);
        $result->execute();
        $this->connection->query("UNLOCK TABLES;");

        $query2 = 'INSERT INTO `account_record`(`account_id`, ';
        $query2 .= '`account_operation`, `account_opertaion_money`, ';
        $query2 .= "`account_operation_time`) VALUES (?, 'Save Money', ?, now())" ;
        $result2 = $this->connection->prepare($query2);
        $result2->bindParam(1, $getAccount);
        $result2->bindParam(2, $inputMoney);
        $result2->execute();
    }

    //取得帳號, 金額, 提取金額
    function takeMoneyOut($getAccount, $outputMoney)
    {
        $this->connection->query("LOCK TABLES account_detail WRITE;");
        $query1 = "SELECT `account_money` FROM `account_detail` ";
        $query1 .= "WHERE `account_account`= ? ";
        $query1 .= "AND (`account_money`- ?) >= 0";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $getAccount);
        $result->bindParam(2, $outputMoney);
        $result->execute();

        if ($result->fetchAll(PDO::FETCH_ASSOC)) {
            $query2 = "UPDATE `account_detail` SET `account_money` = ";
            $query2 .= "`account_money`- ? WHERE `account_account` = ? ";
            $result2 = $this->connection->prepare($query2);
            $result2->bindParam(1, $outputMoney);
            $result2->bindParam(2, $getAccount);
            $result2->execute();
            $this->connection->query("UNLOCK TABLES;");
            $query3 = "INSERT INTO `account_record`";
            $query3 .= "(`account_id`, `account_operation`, ";
            $query3 .= "`account_opertaion_money`, `account_operation_time`)";
            $query3 .= "VALUES (?, 'Take Money', ?, now())";
            $result3 = $this->connection->prepare($query3);
            $result3->bindParam(1, $getAccount);
            $result3->bindParam(2, $outputMoney);
            $result3->execute();

            return true;
        } else {
            $this->connection->query("UNLOCK TABLES;");

            return false;
        }
    }
}
