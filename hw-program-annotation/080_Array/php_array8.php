<?php
	$testArray = array("A1", "A2", "A18");
	sort($testArray);//一般排序法會依照第一個字元的大小 所以是 a1 a18 a2
	var_dump($testArray);
	
	echo "<br />";
	
	natsort($testArray);//自然排序法依照最短及第一個字元最小的優先所以是a1 a2 a18
	var_dump($testArray);
?>
