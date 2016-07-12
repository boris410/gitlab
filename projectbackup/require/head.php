<?php 
$name="GUEST";
if(isset($_COOKIE['userName'])){
    $name = $_COOKIE['userName'];
}
if($_GET['logout']){//檢查是否登出
setcookie("userName","out",time()-60*60*24);
    header("location: index.php");
}


?>


