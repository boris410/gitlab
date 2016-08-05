<?php

    class bloguserlist extends load{
        private $db;
        function __construct(){
             $this->db = $this->model("database");
        }
        function showuser(){//秀出後台index的使用者帳號
            $result = $this->db->select("SELECT * FROM account");
            $db=null;
            return $result;
        }
    }
?>