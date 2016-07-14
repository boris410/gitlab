<?php 
    //   if(!isset($_COOKIE['userName']))
    //       header("location: login.php");
    session_start();
    
    if(isset($_GET['logout'])){//檢查是否登出，登出就刪除所有session
        session_unset();
        
    header("location: index.php");
}

    
?>