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
                    $link = $this->DB();
                    $command = "select aEmail,aPassword from account where aEmail= '$userEmail' and aPassword='$userpass'";
                    //檢查帳號密碼在db中是否有資料
                    $result=mysql_query($command,$link);
                    $data=mysql_fetch_assoc($result);
                    mysql_close($link);
                    
                    if($data != ""){
                        return true;
                    }else{
                        echo "沒有帳號";
                        return false;
                    }
            }
            function checkstatus($userEmail,$userpass){//檢查session是否有userName變數代表有操作登入介面
                   
                        $link=$this->DB();
                        $command= "select * from account where aEmail='$userEmail' and aPassword='$userpass'";
                        $result = mysql_query($command,$link);
                        $row = mysql_fetch_assoc($result);//若是有資料代表輸入的帳號密碼正確  登入成功
                        mysql_close($link);
                        
                        if($row != null){
                            return true;
                        }else{
                            return false;
                        }
                        
                    
            }
            
            function register($firstname,$lastname,$userEmail,$phone,$userpass){
                  
                
                  if(!($this->checkaccount($userEmail,$userpass))){//如果有資料代表重複帳號 無法創辦
                            $link = $this->DB();
                            //新增member欄位資料
                            $command="INSERT INTO member (mFirstname,mLastname,mEmail,mPhone) VALUES ('$firstname', '$lastname','$userEmail','$phone')";
                            mysql_query($command,$link);
                            //新增account欄位資料
                            $command2="INSERT INTO account (aEmail,aPassword) VALUES ('$userEmail','$userpass')";
                            mysql_query($command2,$link);
                             //檢查是否新增成功
                            $command3 = "select member.*,account.* from member join account on member.mEmail='$userEmail' and account.aEmail='$userEmail' ";

                            $result = mysql_query($command3,$link);
                            $row = mysql_fetch_assoc($result);
                            if($row!="")
                            {
                                    echo "申請成功";
                                    return true;
                            }
                  }else{
                   
                        echo "帳號重複";
                  }

            }
           
          
     
}
?>
