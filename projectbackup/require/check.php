<?php 
    //  if(!isset($_COOKIE['userName']))
    //      header("location: login.php");
    
    if(isset($_GET['logout'])){//檢查是否登出
    setcookie("userName","out",time()-60*60*24);
    setcookie("userpass","out",time()-60*60*24);
    header("location: index.php");
}

    
?>