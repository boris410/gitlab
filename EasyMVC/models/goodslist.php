<?php

class goodslist extends Controller{
                function showgoods (){
                    $link = $this->getConnect();
                    $select = $link->query("SELECT * FROM goods");
                    $select->execute();

                    while($row = $select->fetch()){//將接收到的資料一筆一筆放到陣列中形成2維陣列  array(0,array)第一件商品的資料陣列
                          $rowarray[] =array(                                                             //array(1,array)第二件商品的資料陣列
                                        'gId'      =>$row['gId'],                                        //array(0,array(gId=>1))
                                        'gname'    => $row['gname'],
                                        'gPrice'   => $row['gPrice'],
                                        'introduct'=>$row['gintroduct'],
                                        'gpicurl'  =>$row['gpicurl']
                                        ); 
                    }
                    $link = null;
                    return $rowarray;
                    
                    
                }
                function showgoodsingle($dealnumber){
                    $link = $this->getConnect();
                    $select = $link->prepare("SELECT * FROM goods WHERE gId= ? ");
                    $select->bindValue(1,$dealnumber);
                    $select->execute();
                    while($row = $select->fetch()){//將接收到的資料一筆一筆放到陣列中形成2維陣列  array(0,array)第一件商品的資料陣列
                          $rowarray =array(                                                             //array(1,array)第二件商品的資料陣列
                                        'gId'      =>$row['gId'],                                        //array(0,array(gId=>1))
                                        'gname'    => $row['gname'],
                                        'gPrice'   => $row['gPrice'],
                                        'introduct'=>$row['gintroduct'],
                                        'gpicurl'  =>$row['gpicurl']
                                        ); 
                    }
                    $link = null;
                    return $rowarray;
                    
                    
                }
                function personnalshow($userEmail,$userpass){
                     //抓出個人資料的內容
                    $link = $this->getConnect();
                    $select = $link->query("select member.*,account.aPassword from member join account 
                                           on  member.mEmail= ? and account.aPassword= ? ");
                    $select->bindValue(1,$userEmail);
                    $select->bindValue(1,$userpass);   
                    $select->execute();       
                    $row = $select->fetch;
                    $link = null;
                    return $row;
                }
        
    
    
    
    
    
}




?>