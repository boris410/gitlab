<?php
header("content-type: text/html; charset=utf-8");

$lines = file ( 'data.txt' );//讀入檔案內容一列為一個陣列內容
foreach ( $lines as $line_num => $line ) {
	echo "#<i>$line_num</i> : " . 
		 htmlspecialchars ( $line ) . "<br />\n";
}

?> 