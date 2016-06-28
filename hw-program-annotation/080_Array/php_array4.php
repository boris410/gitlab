<?php
    header("content-type: text/html; charset=utf-8");//告知編碼是UTF-8
    
    $myArray = array('myName'=>'Jeremy', 'myHeight'=>191, 'myWeight'=>91);//設定KEY值及數值時使用=>給予
    echo "大家好，我的名字叫".$myArray['myName']
?>