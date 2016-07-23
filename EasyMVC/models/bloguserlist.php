<?php

class bloguserlist extends Controller{
                function showuser (){//秀出後台index的使用者帳號
                    $this->model("blogphp");
                    $db = new blogphp();
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
                function showgoodsingle(){//秀出後台使用者的帳號內容
                   
                    $link = $this->DB();//回傳連線結果
                    
                    $command="select * from goods where gId=$_GET[gId]";//到此頁面時透過傳送來的gId抓取商品欄位資料
                    
                    $result = mysql_query($command,$link);
                    
                    while($row = mysql_fetch_assoc($result)){//將接收到的資料一筆一筆放到陣列中形成2維陣列  array(0,array)第一件商品的資料陣列
                          $rowarray =array(                                                             //array(1,array)第二件商品的資料陣列
                                        'gId'      =>$row['gId'],                                        //array(0,array(gId=>1))
                                        'gname'    => $row['gname'],
                                        'gPrice'   => $row['gPrice'],
                                        'introduct'=>$row['gintroduct'],
                                        'gpicurl'  =>$row['gpicurl']
                                        ); 
                    }
                    mysql_close($link);
                    return $rowarray;
                    
                    
                }
        
    
    
    
    
    
}




?>