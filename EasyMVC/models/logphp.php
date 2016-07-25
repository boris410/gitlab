 <?php

class logphp extends Controller{
            
            
            function checkaccount(){//登入時檢查是否有input 裡面的帳號密碼//$link輸入參數為db的連線結果
                    $link = $this->DB();
                    $command = "select aEmail,aPassword from account where aEmail= '$_POST[txtUserEmail]' and aPassword='$_POST[txtPassword]'";
                    //檢查帳號密碼在db中是否有資料
                    $result=mysql_query($command,$link);
                    $data=mysql_fetch_assoc($result);//檢查變數查看是否有資料
                    mysql_close($link);
                    return $data;
              
            }
            function logout(){
                   
                    session_unset();//刪除session
                    if(count($_SESSION)==0){
                         header("location: index");
                    }else{
                      echo "登出失敗";
                    }
            }
             function register(){
                  $checkaccount =$this->checkaccount();
                  $link = $this->DB();
                  if($checkaccount ==""){//如果有資料代表重複帳號 無法創辦

                            //新增member欄位資料
                            $command="INSERT INTO member (mFirstname,mLastname,mEmail,mPhone) VALUES ('$_POST[firstname]', '$_POST[lastname]','$_POST[txtUserEmail]','$_POST[phone]')";
                            mysql_query($command,$link);
                            //新增account欄位資料
                            $command2="INSERT INTO account (aPassword,aEmail) VALUES ('$_POST[txtPassword]','$_POST[txtUserEmail]')";
                            mysql_query($command2,$link);
                             //檢查是否新增成功
                            $command3 = "select member.*,account.* from member join account on member.mEmail='$_POST[txtUserEmail]' and account.aEmail='$_POST[txtUserEmail]' ";

                            $result = mysql_query($command3,$link);
                            $row = mysql_fetch_assoc($result);
                            if($row!="")
                            {
                                    echo "申請成功";
                                    //帳號申請成功後刪除POST資料
                                    unset($_POST['firstname'],$_POST['lastname'],$_POST['txtUserEmail'],$_POST['phone'],$_POST['txtPassword'],$_POST['checkpassword']);
                                     mysql_close($link);
                                    header("location: login");
                            }else{
                                    mysql_close($link);
                                    echo "申請失敗";
                            }
                  }else{
                       mysql_close($link);
                      unset($_POST['firstname'],$_POST['lastname'],$_POST['txtUserEmail'],$_POST['phone'],$_POST['txtPassword']);
                      echo "帳號重複";
                  }

            }
           
            function checkstatus(){//檢查session是否有userName變數代表有操作登入介面
                    
                    if(isset($_SESSION['userEmail']))
                    {
                        $link=$this->DB();
                        $command= "select * from account where aEmail='$_SESSION[userEmail]' and aPassword='$_SESSION[userpass]'";
                        $result = mysql_query($command,$link);
                        $row = mysql_fetch_assoc($result);//若是有資料代表輸入的帳號密碼正確  登入成功
                        mysql_close($link);
                        return $row;
                    }else{
                        
                         header("location: login");
                    }
            }
            
            
            function login(){
                     
                      if(isset($_POST["Login"])){
                        if($_POST["txtUserEmail"] != ""){//檢查是否有input
                                         $data=$this->checkaccount();//將db的連線結果mysq_connect帶入function並帶回query的會員資料檢查是否有此帳號
                                          if($data != ""){//有資料的話才進入 等於0表示沒資料
                                          
                                                          if(isset($_COOKIE["lastpage"])){
                                                            echo "lastpage";//設定如果一開始不是由login來觸發login的話********************************
                                                        } else{
                                                              $_SESSION['userEmail']=$_POST["txtUserEmail"];
                                                              $_SESSION['userpass']=$_POST["txtPassword"];
                                                            
                                                             return true;
                                                              }
                                            }
                                            else{
                                                echo "帳號or密碼錯誤2";
                                                return false;
                                                
                                                }
                                      }
                                        else{
                                          echo "請輸入帳號密碼1";
                                          return false;
                                          }
                      }
            }
           
           
            
}
?>
