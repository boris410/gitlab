<?php
    class bank extends load
    {
     
        private $db;
        
        function __construct()
        {
            $this->db = $this->model("database");
        }
        
        function account_inquire($account)
        {
             $result = $this->db->select("SELECT * FROM account_detail WHERE account_account = $account");
            
             return $result;
              
        }
    }
?>