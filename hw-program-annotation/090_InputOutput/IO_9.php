<?php
header("Content-Type: image/png");//MIMe     告訴網頁這是圖片編碼

$filename = "cc.png";
$fileHandle = fopen($filename, "rb");//rb  不破壞檔案內容原始資料
echo fread($fileHandle, filesize($filename));//讀取給予的字串長度到eof為止
fclose($filename);

?>