<?php

class bloguserlist extends Controller{
                function showuser (){//秀出後台index的使用者帳號
                    $link = $this->DB();//回傳連線結果
                    $command  = "select * from account";
                    $result = mysql_query($command,$link);
                   
                    
                    while($row = mysql_fetch_assoc($result)){//將接收到的資料一筆一筆放到陣列中形成2維陣列  array(0,array)第一件商品的資料陣列
                          $rowarray[] =array(                                                             //array(1,array)第二件商品的資料陣列
                                        'aEmail'      =>$row['aEmail'],                                        //array(0,array(gId=>1))
                                        'aPassword'    => $row['aPassword']);
                                        
                    }
                    mysql_close($link);
                    return $rowarray;
                }
}




?>