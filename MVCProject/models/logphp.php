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
                  session_start();
                  if(isset($_GET['logout'])){//檢查是否登出，登出就刪除所有session
                    session_unset();
                    header("location: index.php");
                  }
            }
            function login(){
              session_start();
              if(isset($_POST["Login"])){
                if($_POST["txtUserName"] != ""){//檢查是否有input
                                $link=$this->dbconnect();
                                 $data=$this->checkaccount($link);//將db的連線結果mysq_connect帶入function並帶回query的會員資料檢查是否有此帳號
                                 
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
                            // session_start();
                            // if(isset($_POST["Login"])){
                            //   if($_POST["txtUserName"] != ""){//檢查是否有input
                            //     //require_once("checkaccount.php");
                            //       if($data != ""){//連上成功的話才進入 等於0表示沒資料
                            //                       if(isset($_COOKIE["lastpage"])){
                            //                         echo "lastpage";
                            //                     }
                            //                       else{
                            //                           $_SESSION['userName']=$_POST["txtUserName"];
                            //                           $_SESSION['userpass']=$_POST["txtPassword"];
                            //                           header("location: index.php");
                            //                           }
                            //         }
                            //         else{
                            //             echo "帳號or密碼錯誤";
                            //             }
                            //   }
                            //   else{
                            //       echo "請輸入帳號密碼";
                            //       }
                            // }
                              
                             
                              
                            // if(isset($_GET['logout'])){
                            //   setcookie("userName","Guest",time()-60*60*24);
                            //   header("location: index.php");
                            // }
  
                  
            }
           
           
            
}
?>
