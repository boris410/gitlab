<?php
header("content-type: text/html; charset=utf-8");
 
$sData = "line1\nline2\nLine3\n";
$dataArray = explode("\n", $sData);//分割字串 分割處為\n

$f = fopen("data2.txt", "a");//打開檔案data2.txt並加內容附加到檔案內容後面
foreach ($dataArray as $line) {
	fputs($f, $line . "\n", strlen($line) + 1);//將資料寫入到檔案 fputs(檔案,內容,長度)
}
fclose($f);
echo "-- Done --"

?>
