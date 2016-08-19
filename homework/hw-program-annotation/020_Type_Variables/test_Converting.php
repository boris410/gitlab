<?php

$a = 12;
$b = "34";
$c=3.3;
//$result = $a + $b; // 46 將變數a和b的內容資料做數值相加
// $result = $a . $b; // 1234 將變數a和b的內容資料做字串相加
$result = $a + intval($c);  // 15將變數a和c的內容資料做數值相加 intival 為取得變數的整數值

echo $result; 

?>