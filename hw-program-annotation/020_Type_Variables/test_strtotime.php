<?php
  $d = strtotime("2012-09-10");//將時間格式的字串轉為時間戳
  // $d = strtotime("2012-09-10 -3 days");//最這個時間格式產生的時間戳再減三天
  // $d = strtotime("2012-09-10 +1 month");
  echo $d;
  echo "<br>";
  echo date("Y-m-d", $d);//將這個時間戳轉為年月日格式
?>
