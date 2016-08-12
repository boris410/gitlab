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
        $result = $this->connection->prepare("SELECT * FROM `account_detail` WHERE `account_account` = ? ");
        $result->bindParam(1, $account);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    function checkAccount($account)
    {
        $result = $this->connection->prepare("SELECT * FROM `account_detail` WHERE `account_account` = ? ");
        $result->bindParam(1, $account);
        $result->execute();

        return $result->rowCount();
    }

    //取得帳號id, 查詢table record
    function getAccounRecord($accountId)
    {
        $result = $this->connection->prepare("SELECT * FROM `account_record` WHERE `account_id` = ? ");
        $result->bindParam(1, $accountId);
        $result->execute();

        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    //取得帳號, 操作金額
    function saveMoneyInto($accountId, $money)
    {

        try {
            $this->connection->beginTransaction();
            $query1 = "SELECT `account_money` FROM ";
            $query1 .= "`account_detail` WHERE `account_id`= ? FOR UPDATE";
            $result = $this->connection->prepare($query1);
            $result->bindParam(1, $accountId);
            $result->execute();

            //取得操作前的金額並加上操作金額
            $oldMoney = $result->fetch(PDO::FETCH_ASSOC);
            $oldMoney['account_money'] += $money;

            $query2 = "UPDATE `account_detail` ";
            $query2 .= "SET `account_money` = `account_money`+ ? ";
            $query2 .= "WHERE `account_id`= ? ";
            $result = $this->connection->prepare($query2);
            $result->bindParam(1, $money);
            $result->bindParam(2, $accountId);
            $result->execute();

            $query3 = "INSERT INTO `account_record`(`account_id`, `account_operation`, ";
            $query3 .= "`account_opertaion_money`, `account_last_money`, `account_operation_time`) ";
            $query3 .= "VALUES (?, 'Save Money', ?, ?, now())" ;
            $result = $this->connection->prepare($query3);
            $result->bindParam(1, $accountId);
            $result->bindParam(2, $money);
            $result->bindParam(3, $oldMoney['account_money']);
            $result->execute();
            $this->connection->commit();
        } catch(PDOException $e) {
            $this->connection->rollBack();
            throw new MyDatabaseException( $Exception->getMessage( ));
        }
    }

    //傳入帳號id, 操作後金額, 操作金額
    function takeMoneyOut($accountId, $money, $operateMoney)
    {
        try {
            $query2 = "UPDATE `account_detail` SET `account_money` = ";
            $query2 .= "? WHERE `account_id` = ? ";
            $result = $this->connection->prepare($query2);
            $result->bindParam(1, $money);
            $result->bindParam(2, $accountId);
            $result->execute();

            $query3 = "INSERT INTO `account_record` ";
            $query3 .= "(`account_id`, `account_operation`, ";
            $query3 .= "`account_opertaion_money`, `account_last_money`, `account_operation_time`) ";
            $query3 .= "VALUES (?, 'Take Money', ?, ?, now())";
            $result = $this->connection->prepare($query3);
            $result->bindParam(1, $accountId);
            $result->bindParam(2, $operateMoney);
            $result->bindParam(3, $money);
            $result->execute();
            $this->connection->commit();

        } catch(PDOException $e) {
                $this->connection->rollBack();
                throw new MyDatabaseException( $Exception->getMessage( ));
        }
    }

    //檢查金額
    function checkMoney($accountId)
    {
        $this->connection->beginTransaction();
        $query1 = "SELECT `account_money` FROM `account_detail` ";
        $query1 .= "WHERE `account_id` = ? FOR UPDATE";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $accountId);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }
}
