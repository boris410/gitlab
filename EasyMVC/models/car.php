<?php 
class car extends Controller{
       function showbill(){//購物車內 個人帳號的所有歷史帳單
          $this->model("logphp");
          $logphp = new logphp();
          $status = $logphp->checkstatus();
          $link = $this->DB();
           if($status!=""){
               
                $command = "select member.mId,bill.* from member join bill on  member.mEmail ='$_SESSION[userEmail]' and member.mId = bill.gmemberid";
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
            
           }else
           {
            echo "no";
           }
          // $status = $logphp->checkstatus();
           //echo $status;
      
       
      }
      
      function addgoods($data){//增加商品到購物車
       
       $this->model("logphp");
       $logphp = new logphp();
       $checkresult = $logphp->checkstatus();
       $link = $this->DB();
       
       //檢查是否有登入 傳回查詢帳號的結果 沒有結果導向到登入
       if( $checkresult!=""){
              $commandm = "select mId from member where mEmail='$_SESSION[userEmail]'";
              $meresult = mysql_query($commandm,$link);
              $row2=mysql_fetch_assoc($meresult);
               
               if(isset($_SESSION['buytime'])){//設定購買變數為購買項目的根據 目的:刪除項目時用
                            $_SESSION['buytime'] +=1;//查看購買次數 如果不是就設置初始直0 
                        }else{
                             $_SESSION['buytime'] =1;
                        }
                $car = array(
                                     
                                     $row2['mId'],
                                     $data['gId'],  //將商品資訊丟到陣列裡面
                                     $data['gPrice'],
                                     $data['gname'],
                                     date("Y:m:d h:i:s"));  
                                     
                         $num="mID"."$_SESSION[buytime]";
                         $_SESSION[car][$num]=$car;//將商品陣列丟到seesion的[car][購買次數]
                        
                         mysql_close($link);
                         header("location: index");
                        
             }else{
              header("location:login");
             }
                 
       
      }
      function delegoods(){//刪除購物車內商品
            	          $del="$_GET[delete]";//依照丟過來的mid購買編號將此次的購物車內容單項刪除
            	          unset($_SESSION[car][$del]);//成功後刪除點擊的那一單項
            	          if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
            	           unset($_SESSION[car]);
            	          }
            	        
                   
       
      }
      function deal(){//交易單筆商品
                   
                    $deal="$_GET[deal]";
                  
                     if(isset($_SESSION[car][$deal])){
                             $link = $this->DB();
                           
                             foreach($_SESSION[car][$deal] as $value  ){//將商品分割成一為陣列中的四筆資料
                              $d0=$_SESSION[car][$deal][0];
                              $d1=$_SESSION[car][$deal][1];
                              $d2=$_SESSION[car][$deal][2];
                              $d3=$_SESSION[car][$deal][3];
                             
                             }
                             
                             $commandi = "insert into bill(gmemberid,bgoodsid,bgoodsprice,bgoodsname,address,paytype,addressee,bbuydate) values($d0,$d1,$d2,'$d3','$_POST[address]','$_POST[paytype]','$_POST[addressee]',current_timestamp())";//分別儲存到指定欄位
                          
                             mysql_query($commandi,$link);
                             unset($_SESSION[car][$deal]);//成功後刪除點擊的那一單項
                             
                             if($_SESSION[car]==null){//如果最後都沒有項目了就把session中car的陣列刪除views就會顯示前往index的連結
                              unset($_SESSION[car]);
                              
                             }
                             mysql_close($link);
                             header("location: cart");
                      
                      
                     }
                     else{
                      header("location: cart");
                     
                     }
                
      }
     

}

?>