<?php
function ShowStar($iCount)//傳入引數到陣列並回傳結果
{
	$result = "";
	for ($i = 1; $i <= $iCount; $i++)
	{
		$result .= "*";
	}
	echo $result;
}

$iHowMany = 3;
ShowStar($iHowMany);
?>