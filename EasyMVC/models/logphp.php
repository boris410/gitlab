 <?php

class logphp extends Controller{
            function login(){
                      if(isset($_POST["Login"])){
                        if($_POST["txtUserEmail"] != ""){//檢查是否有input
                            if($this->checkaccount()){//檢查是否有帳號
                                    $_SESSION['userEmail']=$_POST["txtUserEmail"];
                                    $_SESSION['userpass']=$_POST["txtPassword"];
                                    return true;
                            }else{
                                  return false;
                            }
                        }else{
                             return false;
                        }
                      }
            }
            
            function logout(){
                    session_unset();//刪除session
                    if(count($_SESSION)==0){
                        return true;
                    }
                        else{
                            echo "session沒刪除";
                        }
            }
            
            function checkaccount(){//登入時檢查是否有input 裡面的帳號密碼//$link輸入參數為db的連線結果
           
            
                    $db = $this->model("database");
                    $result = $db->select("SELECT aEmail,aPassword 
                                           FROM account 
                                           WHERE aEmail= '$_POST[txtUserEmail]' AND aPassword='$_POST[txtPassword]'");
                    if($result){
                        $link = null;
                        return true;
                    }else{
                        return false;
                    }
            }
            
             function register(){
                  if(!$this->checkaccount()){//如果有資料代表重複帳號 無法創辦
                            //$link = $this->getConnect();
                            $db = $this->model("database");
                            $db->insert("INSERT INTO member (mFirstname,mLastname,mEmail,mPhone) 
                                         VALUES ('$_POST[firstname]','$_POST[lastname]','$_POST[txtUserEmail]','$_POST[phone]')");
                                         
                            $db->insert("INSERT INTO account (aPassword,aEmail) 
                                          VALUES ('$_POST[txtPassword]','$_POST[txtUserEmail]')");
                                          
                            $result = $db->select("    SELECT member.*,account.* 
                                                       FROM member 
                                                       JOIN account 
                                                       ON member.mEmail='$_POST[txtPassword]' AND account.aEmail='$_POST[txtUserEmail]' ");
                            if($result>0)
                            {
                                    $db=null;
                                    return true;
                            }else{
                                    $db=null;
                                    return false;
                            }
                  }else{
                        $db=null;
                        return false;
                  }
            }
            function checkstatus(){//檢查session是否有userName變數代表有操作登入介面
                    $db = $this->model("database");
                    $result = $db->select("SELECT *
                                     FROM account 
                                     WHERE aEmail='$_SESSION[userEmail]' AND aPassword='$_SESSION[userpass]'");
                    if($result){
                        $link = null;
                        return true;
                    }else{
                        return false;
                    }
            }
            
           
           
            
}
?>
