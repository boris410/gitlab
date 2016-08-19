<?php

function ShowStar() {
	$args = func_get_args();
	//isset檢查變數是否有設置，!isset指的是判斷如果沒有設置的話
	if (!isset($args[0]))//if判斷式會給予指定值
		$args[0] = 5;
	if (!isset($args[1]))
		$args[1] = "*";
	ShowStar_all($args[0], $args[1]);//防範使用者沒有輸入值後再傳入第二個函式
}

function ShowStar_all($iCount, $sWhat = "*")
{
	if ($iCount <= 0)
	{
		echo "iCount > 0 please";//進到這段後再判斷以防輸入0以下的數字
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

// ShowStar(2, "^");
// ShowStar(null, "$");
ShowStar();
?>