 <?php

class blogphp extends Controller{
            function login($username,$userpass){
            
                    if($username != "" & $userpass !=""){//檢查是否有input
                        if($this->checkaccount($username,$userpass)){//判斷帳號是否存在
                            $_SESSION['userName']=$username;
                            $_SESSION['userpass']=$userpass;
                            return true;
                        }else{
                         
                              return false;
                        }
                    }
            }
            
            function checkaccount($username,$userpass){//後台登入的帳號檢查
                $link = $this->getConnect();
                $select = $link->prepare("SELECT mguser,mgpass FROM management WHERE mguser= ? AND mgpass= ? ");
                $select->bindValue(1,$username);
                $select->bindValue(2,$userpass);
                $select->execute();
                $link = null;
                if($select->rowCount()>0){
                      return true;
                }else{
                    
                      return false;
                }
            }
    
            function checkstatus($username,$userpass){//後台檢查登入狀況
                if($username != "")
                {
                    $link = $this->getConnect();
                    $select = $link->prepare("SELECT mguser,mgpass FROM management WHERE mguser= ? AND mgpass= ? ");
                    $select->bindValue(1,$username);
                    $select->bindValue(2,$userpass);
                    $select->execute();
                    $select->rowCount();
                    $link = null;
                    if($select->rowCount()>0){
                        return true;
                    }else{
                        return false;
                    }

                }else{
                    return false;
                }
            }
            function logout(){
    
                    session_unset();
                    if(count($_SESSION)==0){
                        return true;
                    }else{
                        return false;
                    }
            }
            
            
            function personnalshow($user){//抓出個人資料的內容
                $link = $this->getConnect();
                $select = $link->prepare("SELECT member.*,account.aPassword,bill.*
                                FROM member
                                JOIN account 
                                ON mEmail= ? AND account.aEmail=member.mEmail
                                LEFT JOIN bill
                                ON member.mId = bill.gmemberid");//將有使用者的帳號資訊及密碼撈出 LEFT JOIN bill 不管有沒有都撈
                $select->bindValue(1,$user);
                $select->execute();
                
                
                 
                  while($billdata = $select->fetch()){
                             $billarray[]=array(//將撈出來的資料丟到陣列並回傳 將取得的key設為這個陣列的key
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
                                         'deal'   => $billdata['deal'],
                                         'mFirstname'   => $billdata['mFirstname'],
                                         'mLastname'   => $billdata['mLastname'],
                                         'mEmail'   => $billdata['mEmail'],
                                         'mPhone'   => $billdata['mPhone'],
                                         'aPassword'   => $billdata['aPassword']
                                         
                                           );}
                
                 
                  $link->null;
                  return  $billarray;
            }
        //     function showdeals($who){ 
        //             //秀出個人的帳單傳入點擊到的使用者email來做撈資料的依據
        //               $status = $this->checkstatus();
        //               if($status!=""){
        //                     $link = $this->DB();
        //                     $command = "select member.mId,bill.* from member join bill on  member.mEmail $who and member.mId = bill.gmemberid";
        //                     //echo $command;
        //                      $billresult = mysql_query($command,$link);
                            
        //                         while($billdata = mysql_fetch_assoc($billresult)){
        //                                  $billarray[]=array(
        //                                              'mId' => $billdata['mId'],
        //                                              'billid' => $billdata['billid'],
        //                                              'bgoodsid' => $billdata['bgoodsid'],
        //                                              'bbuydate' => $billdata['bbuydate'],
        //                                              'gmemberid' => $billdata['gmemberid'],
        //                                              'bgoodsprice' => $billdata['bgoodsprice'],
        //                                              'bgoodsname' => $billdata['bgoodsname'],
        //                                              'address'   => $billdata['address'],
        //                                              'addressee'   => $billdata['addressee'],
        //                                              'paytype'   => $billdata['paytype'],
        //                                              'deal'   => $billdata['deal']
        //                                               );
        //                         }
        //                     mysql_close($link);
        //                     return $billarray;
                        
        //               }else
        //               {
        //                 echo "no";
        //               }
        //   // $status = $logphp->checkstatus();
        //   //echo $status;
        //     }
     
}
?>
