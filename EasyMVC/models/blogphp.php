 <?php

class blogphp extends Controller{
            function login(){
                if(isset($_POST["Login"])){
                    if($_POST["txtUserName"] != ""){//檢查是否有input
                        if($this->checkaccount()){//判斷帳號是否存在
                            $_SESSION['userName']=$_POST["txtUserName"];
                            $_SESSION['userpass']=$_POST["txtPassword"];
                            return true;
                        }
                    }
                }
            }
            
            function checkaccount(){//後台登入的帳號檢查
                $db = $this->model("database");
                $resutle = $db->select("SELECT mguser,mgpass FROM management WHERE mguser= '$_POST[txtUserName]' AND mgpass= '$_POST[txtPassword]' ");
                $link = null;
                if($resutle){
                    return true;
                }
            }
            
            function logout(){//***same****//
                    session_unset();
                    if(count($_SESSION)==0){
                        return true;
                    }
            }
             
            function checkstatus(){//後台檢查登入狀況
                if(isset($_SESSION['userName'])){
                    $db = $this->model("database");
                    $resutle = $db->select("SELECT mguser,mgpass FROM management WHERE mguser= '$_SESSION[userName]' AND mgpass= '$_SESSION[userpass]' ");
                    if($resutle){
                        return true;
                    }
                }
            }
            
            function personnalshow(){//抓出個人資料的內容
                $db = $this->model("database");
                $resutle = $db->select("SELECT member.*,account.aPassword,bill.*
                                          FROM member
                                          JOIN account 
                                          ON mEmail= '$_POST[user]' AND account.aEmail=member.mEmail
                                          LEFT JOIN bill
                                          ON member.mId = bill.gmemberid");
                $db=null;
                return  $resutle;
            }

            
           
           
            
}
?>
