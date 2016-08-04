<?php
    class load {
        public function model($model){
            require_once "models/$model.php";
            return new $model ();
           }
           
        public function view($view, $data = Array()){
            require_once "views/$view.php";
        }
    }
?>
