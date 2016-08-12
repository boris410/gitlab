<?php

class DataBase extends HomeController
{
    private $hostName = 'localhost';
    private $dabaBaseNaem = 'payment';
    private $userName = 'root';
    private $passWord = '';
    private $connection = null;

    public function __construct()
    {
        $dsn = sprintf('mysql:dbname=%s;host=%s', $this->dabaBaseNaem, $this->hostName);
        try {
            $this->connection = new PDO($dsn, $this->userName, $this->passWord);
            $this->connection->exec("set names utf8");
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

     //查詢帳號對應的資訊account_inquire
    function getAccounData($account)
    {
        $result = $this->connection->prepare("SELECT * FROM `account` WHERE `account` = ? ");
        $result->bindParam(1, $account);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    function checkAccount($account)
    {
        $result = $this->connection->prepare("SELECT * FROM `account` WHERE `account` = ? ");
        $result->bindParam(1, $account);
        $result->execute();

        return $result->rowCount();
    }

    //取得帳號id, 查詢table record
    function getAccounRecord($accountId)
    {
        $result = $this->connection->prepare("SELECT * FROM `record` WHERE `account_id` = ? ");
        $result->bindParam(1, $accountId);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //取得帳號, 操作金額
    function saveMoneyInto($accountId, $money)
    {
        try {
            $this->connection->beginTransaction();
            $query1 = "SELECT `money` FROM ";
            $query1 .= "`account` WHERE `id`= ? FOR UPDATE";
            $result = $this->connection->prepare($query1);
            $result->bindParam(1, $accountId);
            $result->execute();

            //取得操作前的金額並加上操作金額
            $oldMoney = $result->fetch(PDO::FETCH_ASSOC);
            $oldMoney['money'] += $money;

            $query2 = "UPDATE `account` ";
            $query2 .= "SET `money` = `money`+ ? ";
            $query2 .= "WHERE `id`= ? ";
            $result = $this->connection->prepare($query2);
            $result->bindParam(1, $money);
            $result->bindParam(2, $accountId);
            $result->execute();

            $query3 = "INSERT INTO `record`(`account_id`, `operation`, ";
            $query3 .= "`money`, `resultMoney`, `time`) ";
            $query3 .= "VALUES (?, 'Save Money', ?, ?, now())" ;
            $result = $this->connection->prepare($query3);
            $result->bindParam(1, $accountId);
            $result->bindParam(2, $money);
            $result->bindParam(3, $oldMoney['money']);
            $result->execute();
            $this->connection->commit();
        } catch(PDOException $e) {
            $this->connection->rollBack();
        }
    }

    //傳入帳號id, 操作後金額, 操作金額
    function takeMoneyOut($accountId, $money, $operateMoney)
    {
        try {
            $query2 = "UPDATE `account` SET `money` = ";
            $query2 .= "`money`- ? WHERE `id` = ? ";
            $result = $this->connection->prepare($query2);
            $result->bindParam(1, $operateMoney);
            $result->bindParam(2, $accountId);
            $result->execute();
            $money -= $operateMoney;

            $query3 = "INSERT INTO `record` ";
            $query3 .= "(`account_id`, `operation`, ";
            $query3 .= "`money`, `resultMoney`, `time`) ";
            $query3 .= "VALUES (?, 'Take Money', ?, ?, now())";
            $result = $this->connection->prepare($query3);
            $result->bindParam(1, $accountId);
            $result->bindParam(2, $operateMoney);
            $result->bindParam(3, $money);
            $result->execute();
            $this->connection->commit();

        } catch(PDOException $e) {
                $this->connection->rollBack();
        }
    }

    //檢查金額
    function checkMoney($accountId)
    {
        $this->connection->beginTransaction();
        $query1 = "SELECT `money` FROM `account` ";
        $query1 .= "WHERE `id` = ? FOR UPDATE";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $accountId);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
}
