 <?php

class blogphp extends Controller{
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
            function checkaccount(){//後台登入的帳號檢查
                  $link = $this->DB();
                  $command = "select mguser,mgpass from management where mguser= '$_POST[txtUserName]' and mgpass='$_POST[txtPassword]'";
                  //檢查帳號密碼在db中是否有資料
                  $result=mysql_query($command,$link);
                  $data=mysql_fetch_assoc($result);//檢查變數查看是否有資料
                  mysql_close($link);
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
             
           
            function checkstatus(){//後台檢查登入狀況
                
                if(isset($_SESSION['userName']))
                {
                    $link = $this->DB();
                    $command= "select mguser,mgpass from management where mguser= '$_SESSION[userName]' and mgpass='$_SESSION[userpass]'";
                    $result = mysql_query($command,$link);
                    $row = mysql_fetch_assoc($result);//若是有資料代表輸入的帳號密碼正確  登入成功
                    mysql_close($link);
                    return $row;
                }else{
                    
                     header("location: bloglogin");
                }
            }
            
             function personnalshow($user){//抓出個人資料的內容
                $link = $this->DB();
                 //join 三個個表單member account 撈出個人資料，再left join bill不管有沒有都撈
                  $command = "select member.*,account.aPassword,bill.*
                                from member
                                join account 
                                on mEmail='$user' and account.aEmail=member.mEmail
                                left join bill
                                on member.mId = bill.gmemberid";
                                
                 $result = mysql_query($command,$link);
                 
                  while($billdata = mysql_fetch_assoc($result)){
                             $billarray[]=array(//將撈出來的資料丟到陣列並回傳 將取得的key設為這個陣列的key
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
                
                 
                  mysql_close($link);
                  return  $billarray;
            }
             function showdeals($who){ 
                    //秀出個人的帳單傳入點擊到的使用者email來做撈資料的依據
                      $status = $this->checkstatus();
                       if($status!=""){
                            $link = $this->DB();
                            $command = "select member.mId,bill.* from member join bill on  member.mEmail $who and member.mId = bill.gmemberid";
                            //echo $command;
                             $billresult = mysql_query($command,$link);
                            
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
                            mysql_close($link);
                            return $billarray;
                        
                       }else
                       {
                        echo "no";
                       }
          // $status = $logphp->checkstatus();
           //echo $status;
            }
            
            function login(){
              
              if(isset($_POST["Login"])){
                if($_POST["txtUserName"] != ""){//檢查是否有input
                                
                                 $data=$this->checkaccount();//將db的連線結果mysq_connect帶入function並帶回query的會員資料檢查是否有此帳號
                                 
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
