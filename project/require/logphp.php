<?php

if(isset($_POST["btnOK"])){
  if($_POST["txtUserName"] != ""){
    require_once("dbconnect.php");
   if($link){//連上成功的話才進入
      
        if(isset($_COOKIE["lastpage"])){
  
            setcookie("userName" ,$_POST["txtUserName"]);
            setcookie("userpass" ,$_POST["txtPassword"]);
            header("location: secret.php");
            exit();
            }
       else{
            setcookie("userName" ,$_POST["txtUserName"]);
            setcookie("userpass" ,$_POST["txtPassword"]);
            header("location: index.php");
            exit();
           }
     
    }
    else{
     // echo "<p>帳號 or 密碼錯誤</p>";
    }
     
     
  }
  else{
    echo "請輸入帳號密碼";
    
  }
  }
  
  elseif(isset($_POST["btnHome"])){
    
    header("location: index.php");
  }
  elseif(isset($_POST["btnapply"])){
    
    header("location: applyacount.php");
  }
  
  if(isset($_GET['logout'])){
    setcookie("userName","Guest",time()-60*60*24);
    header("location: index.php");
  }
  

?>