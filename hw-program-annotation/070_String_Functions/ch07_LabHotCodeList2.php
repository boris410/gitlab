<?php
$f = fopen("pick3.txt", "r");//開啟檔案
while (!feof($f))//feof檢查檔案是否沒資料了，沒資料則傳true，有則是fales所以增加一個! not true等於 有資料時true 沒資料fales
{
	$line = fgets($f);//擷取$f內的資料到變數
	echo "$line<br>";
}
fclose($f);//關閉檔案
echo "--End--";
?>