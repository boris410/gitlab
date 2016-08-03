<?php
    class show_action extends controller{
        function show_action(){
            $db = $this->model("database");
            $result =  $db->select("SELECT action_name,action_id FROM applyaction");
            $db=null;
            return $result;
        }
        function show_accending(){
            $db = $this->model("database");
            $result =  $db->select("SELECT action_name,action_partner FROM applyaction WHERE action_id='$_GET[ac]'");
            $db=null;
            return $result;
        }
    }
?>