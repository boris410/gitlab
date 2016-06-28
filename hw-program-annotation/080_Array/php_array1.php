<?php
$bloodType[] = 'A';
$bloodType[] = 'B';
$bloodType[] = 'AB';
$bloodType[] = 'O';

for ($i = 0; $i <= 3; $i++) {
	echo $bloodType[$i] . "<br />";//陣列會依照變數宣告的順序配置key值，如果沒有在宣告時指定的話
}
?>