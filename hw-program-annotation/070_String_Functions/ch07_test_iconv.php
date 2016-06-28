<?php
  // header("content-type: text/html; charset=utf-8");
  header("content-type: text/html; charset=big5");
  $s = "He許功蓋123";
  echo strlen($s), ", ";  // 9 轉換前長度是9位元組一個中文字3個位元組 英文數字都是2個位元組 數字是1個位元組
  echo strlen(iconv("UTF-8", "big5", $s));//iconv編碼轉換函式將$s內容從uft8轉乘big5  轉換後是六個位元組
  echo "<HR>";
  echo iconv("UTF-8", "big5", $s);
?>
