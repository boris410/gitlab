<?php

class bloguserlist extends Controller{
                function showuser(){//秀出後台index的使用者帳號
                    $link =$this->getConnect();
                    $select = $link->query("SELECT * 
                                            FROM account");
                    $select->execute();
                    $rowarray=$select->fetchAll();
                    $link = null;
                    return $rowarray;
                }
        }




?>