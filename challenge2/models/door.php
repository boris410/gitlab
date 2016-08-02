<?php 
    class door{
        function login(){
            $db=$this->connection;
            $result = $db->select("SELECT action_account,action_pass FROM account WHERE action_account='$_POST[useraccount]' AND action_pass='$_POST[userpass]'");
            var_dump($result);
        }
        
        function logout(){
            
            
        }
    }

?>