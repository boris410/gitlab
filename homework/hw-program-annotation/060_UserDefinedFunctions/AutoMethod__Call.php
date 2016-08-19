<?php

$obj = new CTest();
$obj->Foo(1, 2, 3, 4);


class CTest {
	
	function __call($MethodName, $Parameters) {
		echo "Name: ", $MethodName, "<br>";
		echo "<pre>" . var_dump($Parameters) ."</pre>";
		echo "<hr>";
	}
	
}


?>
