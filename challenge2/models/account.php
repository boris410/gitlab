<?php 
    class account{
        function login(){
            $db = $this->model("database");
            $result = $db->select("SELECT account_account,account_pass FROM account WHERE account_account='$_POST[useraccount]' AND account_pass='$_POST[userpassword]'");
            if($result){
               $_SESSION['username']=$_POST['useraccount'];
               $_SESSION['userpass']=$_POST['userpassword'];
               var_dump($result);
               return $result;
            }
        }
        
       
    }
?>