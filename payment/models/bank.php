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
             $result = $this->db->select("SELECT * FROM `account_detail` WHERE `account_account` = $account");
             return $result;
        }

        function account_record($account_id)
        {
             $result = $this->db->select("SELECT * FROM `account_record` WHERE `account_id` = $account_id ");
             return $result;
        }

        function account_input($account_account,$inputmoney)
        {
             $result = $this->db->insert("UPDATE `account_detail` SET `account_money`= `account_money`+ $inputmoney WHERE `account_account`=$account_account");
        }

        function account_output($account_account,$inputmoney)
        {
             $result = $this->db->insert("UPDATE `account_detail` SET `account_money`= `account_money`- $inputmoney WHERE `account_account`=$account_account");
        }

    }
?>