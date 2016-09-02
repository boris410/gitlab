
test2.php:
<?php
    require "main.php";
    $array1 = array(1 => "蘋果", 2 => "鳳梨", 3 => "香蕉", 4 => "芭樂");
    $tpl->assign("array1", $array1);

    $array2 = array(
    array("index1" => "data1-1", "index2" => "data1-2", "index3" => "data1-3"),
    array("index1" => "data2-1", "index2" => "data2-2", "index3" => "data2-3"),
    array("index1" => "data3-1", "index2" => "data3-2", "index3" => "data3-3"),
    array("index1" => "data4-1", "index2" => "data4-2", "index3" => "data4-3"),
    array("index1" => "data5-1", "index2" => "data5-2", "index3" => "data5-3"));
    $tpl->assign("array2", $array2);

    $tpl->display("test2.html");
?>