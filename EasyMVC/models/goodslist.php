<?php

    class goodslist extends Controller{
        function showgoods (){//首頁商品項目欄
            $db=$this->model("database");
            return $db->select("SELECT * FROM goods");
        }
        
        function showgoodsingle($gId){//商品單樣的說明網頁
            $db=$this->model("database");
            return $db->select("SELECT * 
                                FROM goods 
                                WHERE gId= '$gId' ");
        }
                
        function personnalshow($SESSIONarray){//抓出個人資料的內容
            $db = $this->model("database");
            $result = $db->select(" SELECT member.*,account.aPassword 
                                    FROM member 
                                    JOIN account 
                                    ON  member.mEmail='$SESSIONarray[userEmail]' AND account.aPassword= '$SESSIONarray[userpass]' ");
            $db=null;
           
            return $result;
        }
    }
?>