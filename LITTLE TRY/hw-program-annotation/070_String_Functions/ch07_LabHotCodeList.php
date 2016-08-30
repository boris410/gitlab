<?php
$sData = "908872526535442041985072568716";
$result = "01234567890";
$iLen = strlen($sData);//擷取字串A在記憶體的長度

for ($iPos = 0; $iPos < $iLen; $iPos++)//設定for迴圈長度為此字串A的記憶體長度
{
	$ch = substr($sData, $iPos, 1);//擷取此段字串的第一個字元
	$result = $ch . str_replace($ch, "", $result);//將擷取的第一個字元串接 字串B中剔除掉字串A第一個字元剩下的字串
	echo $result."<br>";

}
echo substr($result, 0, 5) . "-" . substr($result, 5, 5);//將最後得到的結果透過 字串段落擷取<substr> 處理
?>