<?php

    class bloguserlist extends load{
        function showuser(){//秀出後台index的使用者帳號
            $db = $this->model("database");
            $result = $db->select("SELECT * FROM account");
            $db=null;
            return $result;
        }
    }
?>