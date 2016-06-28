<?php

$x = 100;
$y = &$x;//存取x位址，當修改y時x也會改變

$y = 200;
echo "x = $x </br>";

unset($x);//刪除變數x

echo "y = $y </br>";

?>