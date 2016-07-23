<?php

class Controller {
  
    public function __construct(){
      
      session_start();
                    
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
    public function model($model) {
        require_once "../EasyMVC/models/$model.php";
    
        return new $model ();
    }
    
    
    
      public function view($view, $data = Array()) {
        
        require_once "../EasyMVC/views/$view.php";
    }
    
    
}

?>
