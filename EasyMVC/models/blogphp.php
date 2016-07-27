 <?php

class blogphp extends Controller{
            
            function checkaccount(){//後台登入的帳號檢查
                  $link = $this->DB();
                  $command = "select mguser,mgpass from management where mguser= '$_POST[txtUserName]' and mgpass='$_POST[txtPassword]'";
                  //檢查帳號密碼在db中是否有資料
                  $result=mysql_query($command,$link);
                  $data=mysql_fetch_assoc($result);//檢查變數查看是否有資料
                  mysql_close($link);
                  
                  if($data!=null){
                      return true;
                  }else{
                      return false;
                  }
                  
                 
              
            }
            function logout(){//***same****//
                    session_start();
                    session_unset();
                    if(count($_SESSION)==0){
                        return true;
                    }else{
                        return false;
                    }
            }
             
           
            function checkstatus(){//後台檢查登入狀況
                
                if(isset($_SESSION['userName']))
                {
                    $link = $this->DB();
                    $command= "select mguser,mgpass from management where mguser= '$_SESSION[userName]' and mgpass='$_SESSION[userpass]'";
                    $result = mysql_query($command,$link);
                    $row = mysql_fetch_assoc($result);//若是有資料代表輸入的帳號密碼正確  登入成功
                    mysql_close($link);
                     
                    if($row!=null){
                        return true;
                    }else{
                        return false;
                    }

                }
            }
            
            function personnalshow($user){//抓出個人資料的內容
                $link = $this->DB();
                 //join 三個個表單member account 撈出個人資料，再left join bill不管有沒有都撈
                  $command = "select member.*,account.aPassword,bill.*
                                from member
                                join account 
                                on mEmail='$user' and account.aEmail=member.mEmail
                                left join bill
                                on member.mId = bill.gmemberid";
                                
                 $result = mysql_query($command,$link);
                 
                  while($billdata = mysql_fetch_assoc($result)){
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
                
                 
                  mysql_close($link);
                  return  $billarray;
            }
            function showdeals($who){ 
                    //秀出個人的帳單傳入點擊到的使用者email來做撈資料的依據
                      $status = $this->checkstatus();
                       if($status!=""){
                            $link = $this->DB();
                            $command = "select member.mId,bill.* from member join bill on  member.mEmail $who and member.mId = bill.gmemberid";
                            //echo $command;
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
                            mysql_close($link);
                            return $billarray;
                        
                       }else
                       {
                        echo "no";
                       }
          // $status = $logphp->checkstatus();
           //echo $status;
            }
            
            function login(){
                if(isset($_POST["Login"])){
                    if($_POST["txtUserName"] != ""){//檢查是否有input
                        if($this->checkaccount()){//判斷帳號是否存在
                            $_SESSION['userName']=$_POST["txtUserName"];
                            $_SESSION['userpass']=$_POST["txtPassword"];
                            return true;
                        }else{
                              echo "帳號or密碼錯誤2";
                              return false;
                                            
                        }
                    }else{
                         echo "請輸入帳號密碼1";
                         return false;
                    }
                }
            }
           
           
            
}
?>
