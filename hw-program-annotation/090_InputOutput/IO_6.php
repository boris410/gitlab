<?php
$content = <<<fileContent
PHP基本語法重點整理、
自訂函式寫作注意事項、
陣列與相關函式、狀態資訊管理、
XML/JSON資料處理、
PHP資料庫程式設計、
檔案系統與資料讀寫、
串流與網路程式設計、
字串與相關函式、
物件導向程式設計、
狀態資訊管理、
XML/JSON資料處理、
PHP資料庫程式設計、
檔案系統與資料讀寫、
串流與網路程式設計、
程式安全與攻防實例、
Web Services、
PHP與jQuery、
jQuery Mobile整合運用
fileContent;

$fileSize = file_put_contents("data2.txt", $content);//將字串內容輸入到檔案data2.txt中
echo "File size: $fileSize <br />-- Done --";
?>