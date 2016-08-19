<?php
  
    echo "flag 1<br>";
    @require("MyLibrary.php");//@為不將錯誤訊息顯示出來，之後的程式也不會執行
    echo "flag 2<br>";

?>