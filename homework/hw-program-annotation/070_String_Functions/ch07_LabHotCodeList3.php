<?php
$sData = "";
$f = fopen("pick3.txt", "r");
while (!feof($f))
{
	$line = fgets($f);
	$sData .= Trim($line);//移除開頭即結尾的空白自元然後再串起來

	
}
fclose($f);
echo $sData."<br>";

// GetHotCodeList
$result = "01234567890";
$iLen = strlen($sData);
for ($iPos = 0; $iPos < $iLen; $iPos++)
{
	$ch = substr($sData, $iPos, 1);
	$result = $ch . str_replace($ch, "", $result);

}
echo substr($result, 0, 5) . "-" . substr($result, 5, 5);
?>