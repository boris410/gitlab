 <?php

class blogphp{
            function dbconnect(){//***same****//
                  $dblocalhost="localhost";
                  $dbname="shopping";
                  $dbuser="root";
                  $dbpass="";
                  $link = mysql_connect($dblocalhost,$dbuser,$dbpass );
                  mysql_query("set names utf8",$link);
                  mysql_select_db($dbname);
                  return $link;
            }
            function checkaccount(){
                  $link = $this->dbconnect();
                  $command = "select mguser,mgpass from management where mguser= '$_POST[txtUserName]' and mgpass='$_POST[txtPassword]'";
                  //檢查帳號密碼在db中是否有資料
                  $result=mysql_query($command,$link);
                  $data=mysql_fetch_assoc($result);//檢查變數查看是否有資料
                  return $data;
              
            }
            function logout(){//***same****//
                     session_start();
                     session_unset();
                    if(count($_SESSION)==0){
                         header("location: index");
                    }else{
                      echo "登出失敗";
                    }
            }
             
           
            function checkstatus(){//檢查session到mysql是否有資料 代表是否有登入
                session_start();
                if(isset($_SESSION['userName']))
                {
                    $link = $this->dbconnect();
                    $command= "select mguser,mgpass from management where mguser= '$_SESSION[userName]' and mgpass='$_SESSION[userpass]'";
                    $result = mysql_query($command,$link);
                    $row = mysql_fetch_assoc($result);//若是有資料代表輸入的帳號密碼正確  登入成功
                   
                    return $row;
                }else{
                    
                     header("location: bloglogin");
                }
            }
            
             function personnalshow($user){//抓出個人資料的內容
                 $dblink = $this->dbconnect();
                  $command = "select member.*,account.aPassword,bill.*
                                from member
                                join account 
                                on mEmail='$user' and account.aEmail=member.mEmail
                                left join bill
                                on member.mId = bill.gmemberid";
                //  $command2 = "select aPassword from account where aEmail='$user'";
                 $result = mysql_query($command,$dblink);
                 //$row = mysql_fetch_assoc($result);
                 
                  while($billdata = mysql_fetch_assoc($result)){
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
                                         'deal'   => $billdata['deal'],
                                         'mFirstname'   => $billdata['mFirstname'],
                                         'mLastname'   => $billdata['mLastname'],
                                         'mEmail'   => $billdata['mEmail'],
                                         'mPhone'   => $billdata['mPhone'],
                                         'aPassword'   => $billdata['aPassword']
                                         
                                           );}
                
                 
                 
                  return  $billarray;
            }
            function changesdeal(){//抓出個人資料的內容
            
           
                 $dblink = $this->dbconnect();
                 if($_POST['gender'] == "done" ){
                     $command = "update bill set deal ='1' ";
                 }
                 
                 else{
                     $command = "update bill set deal =null ";
                 }
                 mysql_query($command,$dblink);
                
            }
            
             function showdeals($who){ 
                    
                      $status = $this->checkstatus();
                       if($status!=""){
                            $dblink = $this->dbconnect();
                            $command = "select member.mId,bill.* from member join bill on  member.mEmail $who and member.mId = bill.gmemberid";
                            //echo $command;
                             $billresult = mysql_query($command,$dblink);
                            
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
                            
                            return $billarray;
                        
                       }else
                       {
                        echo "no";
                       }
          // $status = $logphp->checkstatus();
           //echo $status;
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
                                                       header("location: index");//設定帳號密碼到session導向到index
                                                     
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
