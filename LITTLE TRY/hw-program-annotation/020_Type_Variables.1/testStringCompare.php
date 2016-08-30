<?php

$x = "ABC";
$y = "AB";
if ($x >= $y)//比較大小
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";


$x = "ABC";
$y = "BA";
if ($x >= $y)//在編碼中B大於A 比較時當第一個字串比對完後就會停止
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";


$x = "123";
$y = "12";
if ($x >= $y)//比對的內容是可以轉為數字時就會以數字處理
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";

$x = "123";
$y = "21";
if ($x >= $y)
	echo "$x >= $y";
else
	echo "$x < $y";

echo "<hr>";
		
		
?>