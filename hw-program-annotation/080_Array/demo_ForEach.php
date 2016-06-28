<?php

$a = array('1', '2');


foreach ($a as $k => $x)
{
	$x = '3';//foreach內配置變數後，在外foreach外的不會背影響
}

foreach ($a as $k => $x)
{
	echo "$k => $x <br>";
}

?>