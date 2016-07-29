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
                    $link = $this->getConnect();
                    $select = $link->prepare("SELECT aEmail,aPassword 
                                              FROM account 
                                              WHERE aEmail= ? AND aPassword=?");
                    $select->bindParam(1,$_POST['txtUserEmail']);
                    $select->bindParam(2,$_POST['txtPassword']);
                    $select->execute();
                    if($select->fetch()>0){
                        $link = null;
                        return true;
                    }
            }
            
             function register(){
                  if(!$this->checkaccount()){//如果有資料代表重複帳號 無法創辦
                            $link = $this->getConnect();
                            $insert = $link->prepare("INSERT INTO member (mFirstname,mLastname,mEmail,mPhone) 
                                                                  VALUES (?,?,?,?)");
                            $insert->bindParam(1,$_POST['firstname']);
                            $insert->bindParam(2,$_POST['lastname']);
                            $insert->bindParam(3,$_POST['txtUserEmail']);
                            $insert->bindParam(4,$_POST['phone']);
                            $insert->execute(); //新增member欄位資料
                            
                            $insert2 = $link->prepare("INSERT INTO account (aPassword,aEmail) 
                                                                   VALUES (?,?)");
                            $insert2->bindParam(1,$_POST['txtPassword']);
                            $insert2->bindParam(2,$_POST['txtUserEmail']);
                            $insert2->execute(); //檢查是否新增成功
                                
                            $select3 = $link->prepare("SELECT member.*,account.* 
                                                       FROM member 
                                                       JOIN account 
                                                       ON member.mEmail=? AND account.aEmail=? ");
                            $select3->bindParam(1,$_POST['txtUserEmail']);
                            $select3->bindParam(2,$_POST['txtUserEmail']);
                            $select3->execute(); //檢查是否新增成功
                            
                            if($select3->fetch()>0)
                            {
                                    $link = null;
                                    return true;
                            }else{
                                
                                    $link=null;
                                    return false;
                            }
                  }else{
                        $link=null;
                  }
            }
           
            function checkstatus(){//檢查session是否有userName變數代表有操作登入介面
                    
                    if(isset($_SESSION['userEmail']))
                    {
                        $link = $this->getConnect();
                        $select = $link->prepare("SELECT * 
                                                  FROM account 
                                                  WHERE aEmail=? AND aPassword=?");
                        $select->bindParam(1,$_SESSION['userEmail']);
                        $select->bindParam(2,$_SESSION['userpass']);
                        $select->execute();
                      
                      
                        if($select->fetch()>0){
                            $link=null;
                            return true;
                        }
                    }else{
                         $link=null;
                         return false;
                    }
            }
            
           
           
            
}
?>
