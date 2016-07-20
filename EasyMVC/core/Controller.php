<?php

class Controller {
    public function model($model) {
        require_once "../EasyMVC/models/$model.php";
    
        return new $model ();
    }
    
    
    
      public function view($view, $data = Array(),$data2 = Array()) {
        
        require_once "../EasyMVC/views/$view.php";
    }
    
    
}

?>
