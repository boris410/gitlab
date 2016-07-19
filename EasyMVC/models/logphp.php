 <?php

class logphp{
            function dbconnect(){
                  $dblocalhost="localhost";
                  $dbname="shopping";
                  $dbuser="root";
                  $dbpass="";
                  $link = mysql_connect($dblocalhost,$dbuser,$dbpass );
                  mysql_query("set names utf8",$link);
                  mysql_select_db($dbname);
                  return $link;
            }
            function checkaccount($link){
                  //$link輸入參數為db的連線結果
                  $command = "select aEmail,aPassword from account where aEmail= '$_POST[txtUserName]' and aPassword='$_POST[txtPassword]'";
                 
                  //檢查帳號密碼在db中是否有資料
                  $result=mysql_query($command,$link);
                  $data=mysql_fetch_assoc($result);//檢查變數查看是否有資料
                  return $data;
              
            }
            function logout(){
                    session_start();//session start開啟session
                     session_unset();//刪除session
                    if(count($_SESSION)==0){
                         header("location: index");
                    }else{
                      echo "登出失敗";
                    }
                    
            
                  
            }
             function register(){
                
                $dblink = $this->dbconnect();
                //新增member欄位資料
                
                $command="INSERT INTO member (mFirstname,mLastname,mEmail,mPhone) VALUES ('$_POST[firstname]', '$_POST[lastname]','$_POST[email]','$_POST[phone]')";
                mysql_query($command,$dblink);
                //新增account欄位資料
                $command2="INSERT INTO account (aPassword,aEmail) VALUES ('$_POST[password]','$_POST[email]')";
                mysql_query($command2,$dblink);
                //檢查是否新增成功
                $command3 = "select member.*,account.* from member join account on member.mEmail=$_POST[email] and account.aEmail=$_POST[email] ";
                $result = mysql_query($command3,$dblink);
                $row = mysql_fetch_assoc($result);
                if($row!="")
                {
                    echo "申請成功";
                    //帳號申請成功後刪除POST資料
                    unset($_POST['firstname'],$_POST['lastname'],$_POST['email'],$_POST['phone'],$_POST['password'],$_POST['checkpassword']);
                    header("location: login");
                }else{
                    echo "申請失敗";
                }
                
            }
           
            function checkstatus(){//檢查session是否有userName變數代表有操作登入介面
                session_start();
                if(isset($_SESSION['userName']))
                {
                    $link = $this->dbconnect();
                    $command= "select * from account where aEmail='$_SESSION[userName]' and aPassword='$_SESSION[userpass]'";
                    
                    $result = mysql_query($command,$link);
                    $row = mysql_fetch_assoc($result);//若是有資料代表輸入的帳號密碼正確  登入成功
                    return $row;
                }else{
                    
                     header("location: login");
                }
            }
            
             function personnalshow(){
                 //抓出個人資料的內容
                 $dblink = $this->dbconnect();
                 $command = "select * from member where mEmail='$_SESSION[userName]'";
                 $result = mysql_query($command,$dblink);
                 $row = mysql_fetch_assoc($result);
                 return $row;
            }
            function login(){
              session_start();
              if(isset($_POST["Login"])){
                if($_POST["txtUserName"] != ""){//檢查是否有input
                                $dblink=$this->dbconnect();
                                 $data=$this->checkaccount($dblink);//將db的連線結果mysq_connect帶入function並帶回query的會員資料檢查是否有此帳號
                                 
                                  if($data != ""){//有資料的話才進入 等於0表示沒資料
                                  
                                                  if(isset($_COOKIE["lastpage"])){
                                                    echo "lastpage";//設定如果一開始不是由login來觸發login的話********************************
                                                }
                                                  else{
                                                      $_SESSION['userName']=$_POST["txtUserName"];
                                                      $_SESSION['userpass']=$_POST["txtPassword"];
                                                     //header("location: index");//設定帳號密碼到session導向到index
                                                     return true;
                                                      }
                                    }
                                    else{
                                        echo "帳號or密碼錯誤2";
                                        
                                        }
                              }
                                else{
                                  echo "請輸入帳號密碼1";
                                  }
              }
            }
           
           
            
}
?>
