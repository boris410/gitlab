<?php 
//連線mysql選擇資料庫shopping
$dblocalhost="localhost";
$dbname="shopping";
$dbuser="root";
$dbpass="";
$link = mysql_connect($dblocalhost,$dbuser,$dbpass );
    
    mysql_query("set names utf8",$link);
    mysql_select_db($dbname);
    
    

?>