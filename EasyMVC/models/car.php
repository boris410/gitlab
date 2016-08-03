<?php 
class car extends Controller{
       
       function showbill($userEmail){//購物車內 個人帳號的所有歷史帳單
            $db = $this->model("database");
            $result = $db->select(" SELECT member.mId,bill.* 
                                    FROM member 
                                    JOIN bill 
                                    ON  member.mEmail ='$userEmail' AND member.mId = bill.gmemberid");
            $db=null;
            return $result;
      }
      
        function addgoods($data,$userEmail,$buytime){//增加商品到購物車
           
            
            $db = $this->model("database");
            $result = $db->select("SELECT mId 
                                   FROM member 
                                   WHERE mEmail= '$userEmail' ");
                                   
            
            if(isset($buytime)){//設定購買變數為購買項目的根據 目的:刪除項目時用
                $buytime +=1;//查看購買次數 如果不是就設置初始直0 
            }else{
                $buytime =1;
            }
            var_dump($buytime);
                $car = array(
                    
                                $result[0]['mId'],
                                $data[0]['gId'],  //將商品資訊丟到陣列裡面
                                $data[0]['gPrice'],
                                $data[0]['gname'],
                                date("Y:m:d h:i:s")
                            );  
                         $num="mID".$buytime;
                         return array('buytime'=>$buytime,'addid'=>$num,'car'=>$car);
                         
                        //  $_SESSION[car][$num]=$car;//將商品陣列丟到seesion的[car][購買次數]
                        //  $link = null;
                        //  unset($_GET['addc']);
                         return true;
             
      }
      
        function delegoods(){//刪除購物車內商品
            unset($_SESSION[car][$_GET['delete']]);
            
      }
      
        function deal($SESSIONarray,$address,$paytype,$addressee){//交易單筆商品
                   
                            //  foreach($_SESSION[car][$_POST['deal']] as $value  ){//將商品分割成一為陣列中的四筆資料
                            //  $d0=$_SESSION[car][$_POST['deal']][0];
                            //  $d1=$_SESSION[car][$_POST['deal']][1];
                            //  $d2=$_SESSION[car][$_POST['deal']][2];
                            //  $d3=$_SESSION[car][$_POST['deal']][3];
                             
                            //  }
                             $db=$this->model("database");
                             $db->insert("INSERT INTO bill(gmemberid,bgoodsid,bgoodsprice,bgoodsname,address,paytype,addressee,bbuydate) 
                                                      VALUE('$SESSIONarray[gmemberid]',
                                                            '$SESSIONarray[bgoodsid]',
                                                            '$SESSIONarray[bgoodsprice]',
                                                            '$SESSIONarray[bgoodsname]',
                                                            '$address',
                                                            '$paytype',
                                                            '$addressee',
                                                             current_timestamp())");
                                                             
                            //  unset($_SESSION[car][$_POST['deal']]);//寫入mysql後刪除點擊的那一單項
                            //  if(!isset($_SESSION[car][$_POST['deal']])){//判斷是否有這一項商品 沒有就是刪除成功
                            //     if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
                            //         unset($_SESSION[car]);
                            //       }
                            //       $link = null;
                            //     return true;
                            //   }else{
                            //       $link = null;
                            //   return false;//代表這項商品沒有刪除掉
                            //   }
                  return true;
      }
     

}

?>