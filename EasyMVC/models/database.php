<?php 
class database{
    const DATABASE_HOST = 'localhost';
    const DATABASE_NAME = 'shopping';
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
            echo 'Connection failed: '.$e->getMessage();
        }
    }
     public function select($sql){
      $action =  $this->connection->query($sql);
      return $action->fetchAll(PDO::FETCH_ASSOC); //取得所有陣列
    }
     public function insert($sql){
       $action = $this->connection->query($sql);;
       return true;
    }
     public function delet($sql){
       $action = $this->connection->query($sql);
       return true;
    }
    public function checklogin($username,$userpass){//檢查前檯登入
        $select = $this->connection->prepare("SELECT * FROM account WHERE aEmail = ? and aPassword = ?");
        $select->execute(array($username, $userpass));
        $reuslt = $select->rowCount();
        if($reuslt>0){
         return true;
        }
       
    }
    public function checkadminlogin($username,$userpass){//檢查後檯登入
        $select = $this->connection->prepare("SELECT * FROM `management` WHERE mguser = ? and mgpass = ? ");
        $select->execute(array($username, $userpass));
        $reuslt = $select->rowCount();
        if($reuslt>0){
         return true;
        }
    }
    
}
?>