<?php 
 define("USERNAME", "root");
 define("USERPASS", "");
class database{
    
    private $connection = null;
    
    public function __construct(){
       
       $this->connection =  new PDO("mysql:host=localhost;dbname=shopping;port=3306", USERNAME, USERPASS);
       $this->connection->exec("set names utf8");
        
    }
     public function select($sql){
       
      $action =  $this->connection->query($sql);
      return $list = $action->fetchAll(); //取得所有陣列
    }
     public function insert($sql){
     
       $action = $this->connection->query($sql);
       var_dump($sql);
       return true;
    }
     public function delet($sql){
       $action = $this->connection->query($sql);
       return true;
    }
   
    
    
    
}
?>