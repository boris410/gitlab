<?php 
    require_once("dbconnect.php");//載入連線php檔案
    
    $command = "select aEmail,aPassword from account where aEmail= '$_POST[txtUserName]' and aPassword='$_POST[txtPassword]'";
    echo  $command;
    //檢查帳號密碼在db中是否有資料
    $result=mysql_query($command,$link);
    $data=mysql_fetch_assoc($result);//檢查變數查看是否有資料


    




?>