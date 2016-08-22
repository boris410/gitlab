<?php
$map[10][10];
$number=0;
$num = 0;

//產生40個不重覆亂數
while($num < 40){
    //0~9的固定亂數
    $col = rand(0,9);
    $row = rand(0,9);
    if (!$map[$row][$col]) {
        $map[$row][$col] = "M";
        $num++;
    }
}

//計算周圍
for ($x=0;$x<=9;$x++) {
    for ($y=0;$y<=9;$y++) {
        if(!$map[$x][$y]) {

            // ↖
            if ($map[$x-1][$y-1]=="M") {
                $mnum++;
            }

            // ↑
            if ($map[$x-1][$y]=="M") {
                $mnum++;
            }

            // ↗
            if ($map[$x-1][$y+1]=="M") {
                $mnum++;
            }

            // ←
            if ($map[$x][$y-1]=="M") {
                $mnum++;
            }

            // →
            if ($map[$x][$y+1]=="M") {
                $mnum++;
            }

            // ↙
            if ($map[$x+1][$y-1]=="M") {
                $mnum++;
            }

            // ↓
            if ($map[$x+1][$y]=="M") {
                $mnum++;
            }

            // ↘
            if ($map[$x+1][$y+1]=="M") {
                $mnum++;
            }

            $map[$x][$y] =$mnum;
            $mnum = 0;
        }
    }
}

//印出字串
$str="";
for ($x=0;$x<=9;$x++) {
    for ($y=0;$y<=9;$y++) {
        if (isset($map[$x][$y])) {
            $str .= $map[$x][$y];
        }
    }

    if ($x<9) {
        $str .= "N";
    }
}
echo $str;
?>
