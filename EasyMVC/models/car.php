<?php 
class car extends Controller{
       function showbill($userEmail){//購物車內 個人帳號的所有歷史帳單
            $this->model("logphp");
            $logphp = new logphp();
            $link = $this->DB();
            $command = "select member.mId,bill.* from member join bill on  member.mEmail ='$userEmail' and member.mId = bill.gmemberid";
            $billresult = mysql_query($command,$link);
            while($billdata = mysql_fetch_assoc($billresult)){
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
                $link = $this->DB();
                $commandm = "select mId from member where mEmail='$userEmail'";
                $meresult = mysql_query($commandm,$link);
                $row2=mysql_fetch_assoc($meresult);
                $car = array(
                                     
                                     $row2['mId'],
                                     $data['gId'],  //將商品資訊丟到陣列裡面
                                     $data['gPrice'],
                                     $data['gname'],
                                     date("Y:m:d h:i:s")
                            );  
                                     
                         $num="mID".$buytime;
                         $_SESSION[car][$num]=$car;//將商品陣列丟到seesion的[car][購買次數]
                         mysql_close($link);

                         return true;
                         
                        
             }else{
              return false;
             }
                 
       
      }
      function delegoods(){//刪除購物車內商品
            	          $del="$_GET[delete]";//依照丟過來的mid購買編號將此次的購物車內容單項刪除
            	          unset($_SESSION[car][$del]);//成功後刪除點擊的那一單項
             	     if(!isset($_SESSION[car][$del])){
             	              if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
             	              unset($_SESSION[car]);
             	              return true;
             	               }
            	       }else{
            	        echo "刪除失敗，請正常操作";
            	        return false;
            	       }
            	          
            	       
            	        
                   
       
      }
      function deal(){//交易單筆商品----這裡
                   
                    $deal="$_GET[deal]";//將帳單 特定項的單號到變數內
                  
                    if(isset($_SESSION[car][$deal])){//加強判斷如果session裡有這一筆資料
                             $link = $this->DB();
                             foreach($_SESSION[car][$deal] as $value  ){//將商品分割成一為陣列中的四筆資料
                             $d0=$_SESSION[car][$deal][0];
                             $d1=$_SESSION[car][$deal][1];
                             $d2=$_SESSION[car][$deal][2];
                             $d3=$_SESSION[car][$deal][3];
                             
                             }
                             
                             $commandi = "insert into bill(gmemberid,bgoodsid,bgoodsprice,bgoodsname,address,paytype,addressee,bbuydate) 
                             values($d0,$d1,$d2,'$d3','$_POST[address]','$_POST[paytype]','$_POST[addressee]',current_timestamp())";//分別儲存到指定欄位
                             mysql_query($commandi,$link);
                             mysql_close($link);
                             unset($_SESSION[car][$deal]);//寫入mysql後刪除點擊的那一單項
                             
                             
                              if(!isset($_SESSION[car][$deal])){//判斷是否有這一項商品 沒有就是刪除成功
                               
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