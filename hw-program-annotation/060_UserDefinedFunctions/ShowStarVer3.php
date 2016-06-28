<?php
function ShowStar($iCount, $sWhat = "*")//可以對函式輸入參數預設指定值，沒有輸入參數時呼叫則使用預設值
{
	$result = "";
	for ($i = 1; $i <= $iCount; $i++)
	{
		$result .= $sWhat;
	}
	echo $result;
}


ShowStar(1,"^");
?>