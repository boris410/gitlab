<?php
header("content-type: text/html; charset=utf-8");
	$contents = file_get_contents('data.txt');//取得檔案內容，並將檔案所有內容設為一個字串
	echo (str_replace("\r\n", "<br >", $contents));//將這個字串進行字串切割
?>