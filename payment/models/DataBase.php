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
}
