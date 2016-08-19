<?php

function test($i) {
	return $i + 1;
}

// $x = 1;
// echo test($x);

$x = 2;
$p = "test";
echo $p($x);

?>