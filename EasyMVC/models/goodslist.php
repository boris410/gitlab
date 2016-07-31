<?php

class goodslist extends Controller{
                function showgoods (){//首頁商品項目欄
                    $link = $this->getConnect();
                    $select = $link->query("SELECT * FROM goods");
                    $select->execute();
                    $link = null ; 
                    return $row=$select->fetchAll();
                }
                
                function showgoodsingle(){//商品單樣的說明網頁
                
                    $link = $this->getConnect();
                    $select = $link->prepare("SELECT * 
                                              FROM goods 
                                              WHERE gId= ? ");
                    $select->bindParam(1,$_GET['gId']);
                    $select->execute();
                    $link=null;
                    return $select->fetch();
                }
                function personnalshow(){//抓出個人資料的內容
                    $link = $this->getConnect();
                    $select = $link->prepare("SELECT member.*,account.aPassword 
                                              FROM member 
                                              JOIN account 
                                              ON  member.mEmail=? AND account.aPassword= ? ");
                    $select->bindParam(1,$_SESSION['userEmail']);
                    $select->bindParam(2,$_SESSION['userpass']);
                    $select->execute();
                    return $row=$select->fetch();
                }
        
    
    
    
    
    
}




?>