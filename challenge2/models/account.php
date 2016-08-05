<?php 
    class account extends load{
        private $db;
        function __construct(){
            $this->db = $this->model("database");
        }
        
        function check_account($employ,$action_id){//帶入員工號碼 以及 活動編號
            $partpeople = $this->db->select("SELECT `account_type` FROM `account` WHERE `account_account`='$employ'");//取出參加員工類型
            $str = $partpeople[0][account_type];
            $result = $this->db->select("SELECT * FROM `applyaction` WHERE `action_partpeopletype`='$str' AND `action_id`='$action_id'");//檢查是否類型符合
            return $result;
        }
    }
?>