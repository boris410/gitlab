<?php
$sData = "";
$f = fopen("pick3.txt", "r");
while (!feof($f))
{
	$line = fgets($f);
	$sData .= Trim($line);
}
fclose($f);
echo HotCodeList($sData);//從檔案讀取出資料再輸入到函式內


function HotCodeList($sData)
{
	$result = "01234567890";
	$iLen = strlen($sData);
	for ($iPos = 0; $iPos < $iLen; $iPos++)
	{
		$ch = substr($sData, $iPos, 1);
		$result = $ch . str_replace($ch, "", $result);
	
	}
	return substr($result, 0, 5) . "-" . substr($result, 5, 5);
}
?>
