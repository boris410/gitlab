<?php

echo MathTool::calcTotal(1, 2, 3, 4, 5);

class MathTool {
	static function calcTotal () {
		$args = func_get_args();
		// var_dump($args);
		$total = 0;
		foreach ($args as $value) {
			$total += $value;
		}
		return $total;
	}
}

?>
