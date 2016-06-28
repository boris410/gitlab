<?php
  $x = 123;
  echo gettype($x), "<br>";//取得型態為整數
  
  $x = 123.0;
  echo gettype($x), "<br>";//長整數

  $x = "123.0";
  echo gettype($x), "<br>";//字串
  
  $y = 123.0;
  echo gettype($x), "<br>";//字串 因為抓的是$x

  
  $x = TRUE;
  echo gettype($x), "<br>";//布林值
  
?>
