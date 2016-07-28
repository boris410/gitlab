<?php 
class car extends Controller{
       function showbill($userEmail){//購物車內 個人帳號的所有歷史帳單
            $this->model("logphp");
            $logphp = new logphp();
            $link2 = $this->getConnect();
            $select = $link2->prepare("SELECT member.mId,bill.* FROM member JOIN bill ON  member.mEmail = ?  AND member.mId = bill.gmemberid");
            $select->bindValue(1,$userEmail);
            $select->execute();
            
        
            while($billdata = $select->fetch()){
                        $billarray[]=array(
                                         'mId' => $billdata['mId'],
                                         'billid' => $billdata['billid'],
                                         'bgoodsid' => $billdata['bgoodsid'],
                                         'bbuydate' => $billdata['bbuydate'],
                                         'gmemberid' => $billdata['gmemberid'],
                                         'bgoodsprice' => $billdata['bgoodsprice'],
                                         'bgoodsname' => $billdata['bgoodsname'],
                                         'address'   => $billdata['address'],
                                         'addressee'   => $billdata['addressee'],
                                         'paytype'   => $billdata['paytype'],
                                         'deal'   => $billdata['deal']
                        );
            }
                return $billarray;

      }
      
      function addgoods($userEmail,$userpass,$data,$buytime){//增加商品到購物車
       
       $this->model("logphp");
       $logphp = new logphp();
       //檢查是否有登入 傳回查詢帳號的結果 沒有結果導向到登入
       if($logphp->checkaccount($userEmail,$userpass)){
                $link = $this->getConnect();
                $select = $link->prepare("SELECT mId FROM member WHERE mEmail= ? ");
                $select->bindValue(1,$userEmail);
               
                $row=$select->execute();
                $car = array(
                                     
                                     $row['mId'],
                                     $data['gId'],  //將商品資訊丟到陣列裡面
                                     $data['gPrice'],
                                     $data['gname'],
                                     date("Y:m:d h:i:s")
                            );  
                                     
                        $num="mID".$buytime;
                        $_SESSION[car][$num]=$car;//將商品陣列丟到seesion的[car][購買次數]
                        $link = null;

                         return true;
                         
                        
             }else{
              return false;
             }
                 
       
      }
      function delegoods($cancel){//刪除購物車內商品
            	   unset($_SESSION[car][$cancel]);//成功後刪除點擊的那一單項
             	   if(!isset($_SESSION[car][$cancel])){
             	      if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
             	              unset($_SESSION[car]);
             	              return true;
             	      }
            	   }else{
            	        echo "刪除失敗，請正常操作";
            	        return false;
            	   }
            	          
            	       
            	        
                   
       
      }
      function deal($pay,$address,$addressee,$paytype){//將輸入帳單資訊帶入 特定項目 收件地址、收件人、付款方式

                    if(isset($_SESSION[car][$pay])){//加強判斷如果session裡有這一筆資料
                            foreach($_SESSION[car][$pay] as $value  ){//將商品分割成一為陣列中的四筆資料
                                $d0=$_SESSION[car][$pay][0];
                                $d1=$_SESSION[car][$pay][1];
                                $d2=$_SESSION[car][$pay][2];
                                $d3=$_SESSION[car][$pay][3];
                            }
                            
                            $link = $this->getConnect();
                            $insert = $link->prepare("INSERT INTO bill(gmemberid,bgoodsid,bgoodsprice,bgoodsname,address,paytype,addressee,bbuydate) 
                            VALUES(?,?,?,?,?,?,?,current_timestamp())");
                            $insert->bindValue(1,$d0);
                            $insert->bindValue(2,$d1);
                            $insert->bindValue(3,$d2);
                            $insert->bindValue(4,$d3);
                            $insert->bindValue(5,$address);
                            $insert->bindValue(6,$paytype);
                            $insert->bindValue(7,$addressee);
                            $insert->execute();
                            $link = null;
                            
                             unset($_SESSION[car][$pay]);//寫入mysql後刪除點擊的那一單項
                              if(!isset($_SESSION[car][$pay])){//判斷是否有這一項商品 沒有就是刪除成功
                               
                                  if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
                                      unset($_SESSION[car]);
                                  }
                                return true;
                                
                              }else{
                                echo "沒有刪除成功";
                              return false;//代表這項商品沒有刪除掉
                              
                              }

                     }
                     else{
                        echo "沒有這筆商品";
                        return false;//代表沒有這項商品 使用者直接打入url跳過操作
                        
                     
                     }
                
      }
     

}

?>