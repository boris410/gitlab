<?php
session_start();
if(isset($_POST["Login"])){
  if($_POST["txtUserName"] != ""){//檢查是否有input
    require_once("checkaccount.php");
      if($data != ""){//連上成功的話才進入 等於0表示沒資料
       
           if(isset($_COOKIE["lastpage"])){
  
                // // setcookie("userName" ,$_POST["txtUserName"]);
                // // setcookie("userpass" ,$_POST["txtPassword"]);
                // $_SESSION['userName']=$_POST["txtUserName"];
                // $_SESSION['userpass']=$_POST["txtPassword"];
                //header("location: secret.php");
                echo "lastpage";
              
               
               }
          else{
              // // setcookie("userName" ,$_POST["txtUserName"]);
              // // setcookie("userpass" ,$_POST["txtPassword"]);
               $_SESSION['userName']=$_POST["txtUserName"];
               $_SESSION['userpass']=$_POST["txtPassword"];
              
               header("location: index.php");
                
               }
     
 
    
     
    }
    else{
      echo "帳號or密碼錯誤";
      
    }
  }
  else{
    echo "請輸入帳號密碼";
    
  }
  }
  
  // elseif(isset($_POST["btnHome"])){
    
  //   header("location: index.php");
  // }
  // elseif(isset($_POST["btnapply"])){
    
  //   header("location: applyacount.php");
  // }
  
  if(isset($_GET['logout'])){
    setcookie("userName","Guest",time()-60*60*24);
    header("location: index.php");
  }
  

?>