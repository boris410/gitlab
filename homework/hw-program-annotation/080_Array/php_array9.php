<?php
function cmp($a, $b)
{
    if ($a == $b) {
        return 0;
    }
    return ($a < $b) ? -1 : 1;
}

$a = array(3, 2, 5, 6, 1);
usort($a, "cmp");//使用自行定義的排序函式cmp
foreach ($a as $key => $value) {
    echo "$key: $value <br />";
}

?>