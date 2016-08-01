<?php

class goodslist extends Controller{
                function showgoods (){//首頁商品項目欄
                    $db=$this->model("database");
                    
                    return $db->select("SELECT * FROM goods");
                }
                function showgoodsingle(){//商品單樣的說明網頁
                    $db=$this->model("database");
                    
                    return $db->select("SELECT * 
                                        FROM goods 
                                        WHERE gId= '$_GET[gId]' ");
                }
                function personnalshow(){//抓出個人資料的內容
                
                    $db = $this->model("database");
                    $result = $db->select("   SELECT member.*,account.aPassword 
                                              FROM member 
                                              JOIN account 
                                              ON  member.mEmail='$_SESSION[userEmail]' AND account.aPassword= '$_SESSION[userpass]' ");
                    $db=null;
                    return $result;
                }
        
    
    
    
    
    
}




?>