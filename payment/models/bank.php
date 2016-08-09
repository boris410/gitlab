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
        $this->db->select("UPDATE `account_detail` SET `account_money`= `account_money`+ $inputmoney WHERE `account_account`=$account_account");
    }

    function account_output($account_account,$outputmoney)
    {
        $this->db->select("LOCK TABLES account_detail WRITE;");
        $result = $this->db->select("SELECT `account_money` FROM `account_detail` WHERE `account_account`=$account_account AND (`account_money`-$outputmoney)>=0");

        if ($result) {
            $this->db->select("UPDATE `account_detail` SET `account_money`= `account_money`- $outputmoney WHERE `account_account`=$account_account");
            $this->db->select("UNLOCK TABLES;");
            return true;
        } else {
            $this->db->select("UNLOCK TABLES;");
            return false;
        }
    }
}
?>