<?php

$bloodType = array( "A",//陣列宣告時以,相隔，如果只有給一個值就是指定內容，key值會自動依照0123設定
                    "B",
                   "AB",
                    "O");

for ($i = 0; $i <= 3; $i++) {
	echo $bloodType[$i] . "<br />";
}//0=>A   1=>B  2=>AB  3=>O

?>
