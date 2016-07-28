<?php

class Controller {
  
    protected $dblink;
    public function __construct(){
      session_start();
      $this->DB2();
   
    }
   
    public function DB(){
                    $dblocalhost="localhost";
                    $dbname="shopping";
                    $dbuser="root";
                    $dbpass="";
    
                    $link = mysql_connect($dblocalhost,$dbuser,$dbpass );
                    mysql_query("set names utf8",$link);
                    mysql_select_db($dbname);
                    return $link;
    }
     
    
    
    
    public function DB2(){
                header("content-type:text/html; charset=utf-8");
                $db = new PDO("mysql:host=localhost;dbname=shopping;port=3306", "root", "");
                $db->exec("set names utf8");
                $this->dblink = $db;
                $db = null;
                
            }
              public function getConnect(){
               return $this->dblink;
            }
    
    
    
    
    
    
       public function model($model) {
        require_once "../EasyMVC/models/$model.php";
    
        return new $model ();
       }
        public function view($view, $data = Array()) {
        
        require_once "../EasyMVC/views/$view.php";
    }
    
    
    
}

?>
