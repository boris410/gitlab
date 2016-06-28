<?php
//$result = '';//此段是確保
function glue ($val)
{
	global $result;
	$result .= $val;
}
$array = array ('1', '2', '3', '4');
array_walk ($array, 'glue');//執行將陣列傳入函式
echo $result;
?>