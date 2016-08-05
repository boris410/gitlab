<?php
    
    class goodslist extends load{
        private $db;
        
        function __construct(){
            $this->db = $this->model("database");
        }
        
        function showgoods (){//首頁商品項目欄
            return $this->db->select("SELECT * FROM goods");
        }
        
        function showgoodsingle($gId){//商品單樣的說明網頁
            return $this->db->select("SELECT * 
                                FROM goods 
                                WHERE gId= '$gId' ");
        }
                
        function personnalshow($SESSIONarray){//抓出個人資料的內容
            $result = $this->db->select(" SELECT member.*,account.aPassword 
                                    FROM member 
                                    JOIN account 
                                    ON  member.mEmail='$SESSIONarray[username]' AND account.aPassword= '$SESSIONarray[userpass]' LIMIT 1 ");
            return $result;
            
        }
    }
?>