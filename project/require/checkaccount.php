<?php 
require_once("dbconnect.php");
$command = "select aAccount,aPassword from account where aAccount='boris'";
mysql_query($command,$link);
echo mysql_query($command,$link);



?>