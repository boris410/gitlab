 <?php

class blogphp extends Controller{
            function login(){
                if(isset($_POST["Login"])){
                    if($_POST["txtUserName"] != ""){//檢查是否有input
                        if($this->checkaccount()){//判斷帳號是否存在
                            $_SESSION['userName']=$_POST["txtUserName"];
                            $_SESSION['userpass']=$_POST["txtPassword"];
                            return true;
                        }else{
                              echo "1";
                              return false;
                              
                        }
                    }else{
                         echo "2";
                         return false;
                          
                    }
                }else{
                    echo "4";
                }
            }
            
            function checkaccount(){//後台登入的帳號檢查
                $link = $this->getConnect();
                $select = $link->prepare("SELECT mguser,mgpass FROM management WHERE mguser= ? AND mgpass= ? ");
                $select->bindParam(1,$_POST['txtUserName']);
                $select->bindParam(2,$_POST['txtPassword']);
                $select->execute();
                $link = null;
                if($select->rowCount()>0){
                    return true;
                }else{
                      return false;
                }
            }
            
            function logout(){//***same****//
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
                    $link = $this->getConnect();
                    $select = $link->prepare("SELECT mguser,mgpass FROM management WHERE mguser= ? AND mgpass= ?");
                    $select->bindParam(1,$_SESSION['userName']);
                    $select->bindParam(2,$_SESSION['userpass']);
                    $select->execute();
                    $select->rowCount();
                    if($select->rowCount()>0){
                        $link = null;
                        return true;
                    }else{
                        $link = null;
                        return false;
                    }
                }
            }
            
            function personnalshow($user){//抓出個人資料的內容
                $link = $this->getConnect();
                $select = $link->prepare("SELECT member.*,account.aPassword,bill.*
                                          FROM member
                                          JOIN account 
                                          ON mEmail= ? AND account.aEmail=member.mEmail
                                          LEFT JOIN bill
                                          ON member.mId = bill.gmemberid");
                $select->bindParam(1,$user);    
                $select->execute();
                $billdata = $select->fetchAll();
                $link = null ;
                return  $billdata;
            }

            
           
           
            
}
?>
