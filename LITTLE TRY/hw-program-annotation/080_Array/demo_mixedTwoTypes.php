<?php

$a = array('xxx', 'book' => '書籍', 'yyy', 'desk' => '書桌', 'pen' => '筆');//宣告陣列內容時，沒有給定key就會依照順序0123程式自動指定

foreach ($a as $k => $s)
{
	 echo "$k = $s<br>";
}

?>