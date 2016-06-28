<?php
header("content-type: text/html; charset=utf-8");

$season = array('春', '夏', '秋', '8'); 

echo "每年的四季分別為：";
foreach ($season as $value){//foreach會將陣列內的參數依序設定給$value
	echo $value;
}

?>