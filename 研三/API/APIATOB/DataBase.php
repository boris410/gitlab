<?php

class DataBase
{
    private $hostName = 'localhost';
    private $dabaBaseNaem = 'api';
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


    function createAccount($userName){
        $query1 = "INSERT INTO `account`(`userName`, `money`) ";
        $query1 .= "VALUES (?, 10000)";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $userName);

        return $result->execute();
    }

    function getBalance($userName){
        $query1 = "SELECT `money` FROM `account` WHERE ";
        $query1 .= " `userName` = ? ";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $userName);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

    function transferIn($userName, $money, $transId, $type){
        $getBalance = $this->getBalance($userName);
        $balance = $getBalance['money']+$money;

        $query1 = "UPDATE `account` SET `money` = `money` + ?";
        $query1 .= " WHERE `userName` = ? ";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $money);
        $result->bindParam(2, $userName);
        $result->execute();

        $query = "INSERT INTO `detail`(`id`, `userName`, `type`, `money`, ";
        $query .="`balance`) VALUES (?,?,?,?,?) ";
        $result2 = $this->connection->prepare($query);
        $result2->bindParam(1, $transId);
        $result2->bindParam(2, $userName);
        $result2->bindParam(3, $type);
        $result2->bindParam(4, $money);
        $result2->bindParam(5, $balance);

        return $result2->execute();

    }

    function transferOut($userName, $money, $transId, $type){
        $getBalance = $this->getBalance($userName);
        $balance = $getBalance['money']-$money;

        $query1 = "UPDATE `account` SET `money` = `money` - ? ";
        $query1 .= " WHERE `userName` = ? ";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $money);
        $result->bindParam(2, $userName);
        $result->execute();


        $query = "INSERT INTO `detail`(`id`, `userName`, `type`, `money`, ";
        $query .="`balance`) VALUES (?,?,?,?,?) ";
        $result2 = $this->connection->prepare($query);
        $result2->bindParam(1, $transId);
        $result2->bindParam(2, $userName);
        $result2->bindParam(3, $type);
        $result2->bindParam(4, $money);
        $result2->bindParam(5, $balance);

        return $result2->execute();
    }

     function getDetail($userName, $type){
        $query1 = "SELECT * FROM `detail` WHERE ";
        $query1 .= " `userName` = ? AND `id` = ?";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $userName);
        $result->bindParam(2, $type);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

     function checkTransId($transId){
        $query1 = "SELECT `id` FROM `detail` WHERE `id` = ? ";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $transId);
        $result->execute();

        return $result->fetchAll();
    }

    function checkAccount($userName){
        $query1 = "SELECT * FROM `account` WHERE `userName` = ? ";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $userName);
        $result->execute();

        return $result->fetchAll();
    }

    function checkMoney($userName, $money){
        $query1 = "SELECT `money` FROM `account` WHERE `userName` = ? ";
        $result = $this->connection->prepare($query1);
        $result->bindParam(1, $userName);
        $result->execute();

        return $result->fetch(PDO::FETCH_ASSOC);
    }

}
