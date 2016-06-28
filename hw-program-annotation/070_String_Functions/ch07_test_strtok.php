<?php
$showStr = "Genius is|one/percent inspiration and ninety-nine percent perspiration.";
$s = strtok($showStr, "  ");


while ($s != "")
{
   echo $s. "*" . "<br>";
   $s = strtok(".|/-");//strtok知道參考的字串內容位置，所以不用再設定參考的字串變數只需要設定切割的字串
   
   
   // 如果這麼寫，程式會沒完沒了...
   // $s = strtok($showStr, " ");
}
?>