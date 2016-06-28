<?php

function DrawLine() {
	echo "<hr>";
}

register_tick_function("DrawLine");

declare (ticks = 3) {
	echo "1<br>";
	echo "2<br>";
	echo "3<br>";
	echo "4<br>";
	echo "5<br>";
	echo "6<br>";
	echo "7<br>";
	echo "8<br>";
	echo "9<br>";
}

/*
declare (ticks = 3) {
	for ($i = 1; $i <= 9; $i++) {
		echo "$i<br>";
	}
}
*/

?>