<?php
  header("content-type: text/html; charset=utf-8");
 // header("content-type: text/html; charset=big-5");
  $s = '許功蓋';
  echo $s."<br>";
  echo strlen($s);
  //echo iconv("utf-8","big-5",$s);
?>