<?php
    require("main.php");
    $a = "測試用的網頁內容test";
    $tpl->assign("title", "測試用的網頁標題");
    $tpl->assign("content", $a);

    // 上面兩行也可以用這行代替
    // $tpl->assign(array("title" => "測試用的網頁標題", "content" => "測試用的網頁內容"));

    $tpl->display('test.html');
?>