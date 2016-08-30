<?php
$a = 20;
function myfunction($b) {
	//print "a=$a<br>";
	$a = 30;
	//print "a=$a<br>";
	global $a, $c;//設定為global時以外面的變數定義為準所以是a=20
	//print "a=$a<br>";
	
	return $c = ($b + $a); //40+20=60 所以C=60
	
}
print myfunction(40) + $c;//60+60=120
?>