<?php
header("content-type: text/html; charset=utf-8");

$season = array(
    'spring' => '春', 
    'summer' => '夏', 
    'autumn' => '秋', 
    'winter' => '冬'); 
    
print_r($season);//印出資料的形態及內容
echo "<hr>";
var_dump($season);//印出資料的形態及內容長度及  指令位置
?>