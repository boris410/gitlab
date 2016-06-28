<?php
function ShowStar($iCount, $sWhat = "*")
{//分成兩個if判斷式不同於版本4的在於如果ver4小於等於0
 //就直接結束函式不會進入if判斷式裡面，ver5則會繼續往下做判斷，(如果沒有return的話)
	if ($iCount <= 0)
	{
		echo "iCount > 0 please";
		return;
	}
	if ($iCount > 20)
	{
		echo "iCount <= 20 please";
		return;
	}
	
	$result = "";
	for ($i = 1; $i <= $iCount; $i++)
	{
		$result .= $sWhat;
	}
	echo $result;
}

$iHowMany = 0;
ShowStar($iHowMany);
?>