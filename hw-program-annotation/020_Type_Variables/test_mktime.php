<?php
  $d = mktime(13, 30, 0, 9, 10, 2012);//將輸入的時間格式轉為時間戳
  echo $d;
  echo "<br>";
  echo date("Y-m-d H:i:s", $d);//將時間戳轉為年月日 時分秒
?>
