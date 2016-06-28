<?php
$iSum = 0;
$i = 1;
while ($i <= 10)//會執行1+2+3....+10的while迴圈
{
	$iSum += $i;
	$i += 1;
}
echo $iSum;

echo "<hr>";

$iSum = 0;
$i = 0;
while ($i < 10)//和上一段的迴圈一樣，差異在此段判斷到i=9時還是小於<10還會再執行一次 
{
	$i++;
	$iSum += $i;	
}
echo $iSum
?>