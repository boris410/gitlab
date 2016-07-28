<?php

class bloguserlist extends Controller{
                function showuser (){//秀出後台index的使用者帳號
                    $link = $this->getConnect();
                    $select = $link->query("SELECT * FROM account");
                    $select->execute();
                    
                    while($row = $select->fetch()){//將接收到的資料一筆一筆放到陣列中形成2維陣列  array(0,array)第一件商品的資料陣列
                          $rowarray[] =array(                                                             //array(1,array)第二件商品的資料陣列
                                        'aEmail'      =>$row['aEmail'],                                        //array(0,array(gId=>1))
                                        'aPassword'    => $row['aPassword']);
                                        
                    }
                    $link = null;
                    return $rowarray;
                }
}




?>