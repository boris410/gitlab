<?php
header("content-type: text/html; charset=utf-8");
 
$sData = "";
$f = fopen("data.txt", "r");//開啟data.txt模式為讀取
$line = fgets($f);//設定讀取一列檔案資料內容
 while (!feof($f))//如果讀取的資料不是結束點則執行
 {
 
 	$sData .= Trim($line) . "<br>";//去除一段落開頭及結尾的空白，並放到變數中
 	$line = fgets($f);//讀取下一列資料內容
}
 fclose($f);//關閉檔案
echo $sData;
//echo $line;

?>
