<?php 

class database{
    
    const DATABASE_HOST = 'localhost';
    const DATABASE_NAME = 'booking';
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
        return  $action->fetchAll(PDO::FETCH_ASSOC); //取得所有陣列
    }
    
    public function insert($sql){
     
       $action = $this->connection->query($sql);
       return true;
    }
    
    public function delet($sql){
       $action = $this->connection->query($sql);
       return true;
    }
    public function update($sql){
       $action = $this->connection->query($sql);
       return true;
    }
    public function transaction(){
       $this->connection->beginTransaction();
    }
    public function commit(){
       $this->connection->commit();
    }
    public function rollback(){
       $this->connection->rollBack();
    }
    
   
    
    
    
}
?>