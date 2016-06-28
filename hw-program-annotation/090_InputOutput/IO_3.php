<?php
if (isset ( $_POST ["btnOK"] )) {//當$_post["btnOK"]有設置時執行processFile函式 _FILES為上傳
								 //檔案函式產生檔案名稱 大小 型態以及錯誤訊息
	processFile ( $_FILES ["file1"] );

}

function processFile($objFile) {
			print_r($_FILES ["file1"]);
	if ($objFile ["error"] != 0) {//如果有錯誤訊息 顯示在網頁上必回到上一頁
		echo "Upload Fail! ";
		echo "<a href='javascript:window.history.back();'>Back</a>";
		return;
	}
	
	$test = move_uploaded_file ( $objFile ["tmp_name"], "./" . $objFile ["name"] );//上傳檔案到指令目錄 錯誤就回傳0給$TEST
			
	if (! $test) {
		die ( "move_uploaded_file() faile" );
	}
	
	echo "File uploaded<br />";
	echo "File name: " . $objFile ["name"] . "<br />";
	echo "File type: " . $objFile ["type"] . "<br />";
	echo "File size: " . $objFile ["size"] . "<br />";
	
	echo "--  Done --";
	exit ();
}

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lab - Upload file</title>
</head>
<body>
	<form method="post" enctype="multipart/form-data" action="">
		1. Select a file：<input type="file" name="file1" /><br /> <input
			type="submit" name="btnOK" value="2. 送出資料" />
	</form>
</body>
</html>