<?php
  $x = getdate();//轉換成時間格式
  echo gettype($x), "<br>";//取得型態為陣列
 
  
  $x = date('Y-m-d H:i:s');//取得時間格式 年月日 十分秒
  echo $x, "<br>";
  echo gettype($x), "<br>";//型態為字串
  
  $x = gmdate('Y-m-d H:i:s');//格林威治時間戳
  echo $x, "<br>";
  
  $x = strtotime(gmdate('Y-m-d H:i:s'));//將英文格式的時間轉換為時間戳(秒)
  echo $x, "<br>";
  echo gettype($x), "<br>";//型態為整數
  
?>