 <?php

class logphp extends Controller{
            function login($userEmail,$userpass){
                                if($userEmail != "" & $userpass!= ""){//檢查是否有input
                                    if($this->checkaccount($userEmail,$userpass)){//有資料的話才進入 等於0表示沒資料
                                              $_SESSION['userEmail']=$userEmail;
                                              $_SESSION['userpass']=$userpass;
                                              return true;
                                    }
                                }else{
                                          
                                          return false;
                                }
            }
             function logout(){
                   
                    session_unset();//刪除session
                    if(count($_SESSION)==0){
                        return true;
                    }else{
                        return false;
                        }
            }
            function checkaccount($userEmail,$userpass){//登入時檢查是否有input 裡面的帳號密碼//$link輸入參數為db的連線結果
                    // $link = $this->DB();
                    $link = $this->getConnect();//pdo取得連線
                    $check = $link->prepare("SELECT aEmail,aPassword FROM account WHERE aEmail= ? AND aPassword= ? ");
                    $check->bindValue(1, $userEmail);
                    $check->bindValue(2, $userpass);
                    $check->execute();
                    $row = $check->fetch();
                    $link = null;
                    // $command = "select aEmail,aPassword from account where aEmail= '$userEmail' and aPassword='$userpass'";
                    // //檢查帳號密碼在db中是否有資料
                    // $result=mysql_query($command,$link);
                    // $data=mysql_fetch_assoc($result);
                    // mysql_close($link);
                    
                    if( $check->rowCount()>0){
                        return true;
                    }else{
                        echo "沒有帳號";
                        return false;
                    }
            }
            function checkstatus($userEmail,$userpass){//檢查session是否有userName變數代表有操作登入介面
                        // $link = $this->DB();
                    $link = $this->getConnect();
                    $check = $link->prepare("SELECT aEmail,aPassword FROM account WHERE aEmail= ? AND aPassword= ? ");
                    $check->bindValue(1, $userEmail);
                    $check->bindValue(2, $userpass);
                    $check->execute();
                    $row = $check->fetch();
                    $link = null;
                    if( $check->rowCount()>0){
                        return true;
                    }else{
                        echo "沒有帳號";
                        return false;
                    }
                    
            }
            
            function register($firstname,$lastname,$userEmail,$phone,$userpass){
                  if(!($this->checkaccount($userEmail,$userpass))){//如果有資料代表重複帳號 無法創辦
                           // $link = $this->DB();
                        $link = $this->getConnect();
                        $insertone = $link->prepare("INSERT INTO member(mFirstname,mLastname,mEmail,mPhone) VALUES(?,?,?,?)");
                        $insertone->bindValue(1,$firstname);//對table  member新增使用者訊息
                        $insertone->bindValue(2,$lastname);
                        $insertone->bindValue(3,$userEmail);
                        $insertone->bindValue(4,$phone);
                        $insertone->execute();
    
                        $insertwo = $link->prepare("INSERT INTO account (aEmail,aPassword) VALUES (?,?)");
                        $insertwo->bindValue(1,$userEmail);//對table  account新增使用者帳號密碼
                        $insertwo->bindValue(2,$userpass);
                        $insertwo->execute();
                            
                        $check = $link->prepare("SELECT member.*,account.* FROM member JOIN account ON member.mEmail=? AND account.aEmail=? ");
                        $check->bindValue(1,$userEmail);//查詢是否有資料 表示是否成功申請帳號
                        $check->bindValue(2,$userEmail);
                        $check->execute();
                        $link=null;
                        if( $check->rowCount()>0){
                            echo "申請成功";
                            return true;
                        }
                  }else{
                   
                        echo "帳號重複";
                  }

            }
        
           
          
     
}
?>
