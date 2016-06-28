<?php
function ShowStar($iCount, $sWhat = "*")
{
	if ($iCount > 0)//進到函式後對參數做判斷是否大於0，是則才會進入此if判斷式裡面
	{
		if ($iCount <= 20)//增加第二層判斷如果小魚等於20則進入迴圈
		{
			$result = "";
			for ($i = 1; $i <= $iCount; $i++)
			{
				$result .= $sWhat;
			}
			echo $result;
		}
		else 
			echo "iCount <= 20 please.";
	}
	else
	{
		echo "iCount > 0 please.";//沒有則印出小於0
	}
}

$iHowMany = 21;
ShowStar($iHowMany);
?>