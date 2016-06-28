<?php
  $x = 3;
  if ($x >= 10 && foo())//&&前後都為true才為true，兩個&&的特性，前者false則不執行後者 
    echo "yes";
  else
    echo "no";
    
  echo "<hr>";

  $x = 3;
  if ($x >= 10 & foo())//&前後都為true才為true，一個&的特性，前後者都會執行
    echo "yes";
  else
    echo "no";
    
function foo()
{
   echo "foo() is running.<br>";
}

?>