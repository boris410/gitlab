<?php

class goodslist extends Controller{
                function showgoods (){
                    $command  = "select * from goods";
                    $link=$this->DB();
                    $result = mysql_query($command,$link);
                    
                    while($row = mysql_fetch_assoc($result)){//將接收到的資料一筆一筆放到陣列中形成2維陣列  array(0,array)第一件商品的資料陣列
                          $rowarray[] =array(                                                             //array(1,array)第二件商品的資料陣列
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
                function showgoodsingle(){
                 
                    
                    $command="select * from goods where gId=$_GET[gId]";//到此頁面時透過傳送來的gId抓取商品欄位資料
                    $link = $this->DB();
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
                 function personnalshow(){
                     //抓出個人資料的內容
                     $link = $this->DB();
                     $command =  "select member.*,account.aPassword from member join account 
                                    on  member.mEmail='$_SESSION[userEmail]' and account.aPassword='$_SESSION[userpass]'";
                                 
                     $result = mysql_query($command,$link);
                     $row = mysql_fetch_assoc($result);
                     mysql_close($link);
                     return $row;
            }
        
    
    
    
    
    
}




?>