<?php
  $x = 1;
  $y = $x++;//x數值1先給y，在後做+1 所以y=1
  echo "x = $x, y = $y";
  
  echo "<br>";

  $x = 1;
  $y = ++$x;//x先做+1為2給予y，所以y=2
  echo "x = $x, y = $y";
?>
