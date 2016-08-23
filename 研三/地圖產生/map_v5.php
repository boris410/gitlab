<?php
$map[60][50];
$number=0;
$num = 0;

//產生40個不重覆亂數
while($num < 1200){
    //0~9的固定亂數
    $col = rand(0,9);
    $row = rand(0,9);
    if (!$map[$row][$col]) {
        $map[$row][$col] = "M";
        $num++;
    }
}

//計算周圍
for ($x=0;$x<=60;$x++) {
    for ($y=0;$y<=50;$y++) {
        if($map[$x][$y]!="M") {
            $mnum = 0;

            // ↖
            if ((string)$map[$x-1][$y-1]=="M") {
                $mnum++;
            }

            // ↑
            if ((string)$map[$x-1][$y]=="M") {
                $mnum++;
            }

            // ↗
            if ((string)$map[$x-1][$y+1]=="M") {
                $mnum++;
            }

            // ←
            if ((string)$map[$x][$y-1]=="M") {
                $mnum++;
            }

            // →
            if ((string)$map[$x][$y+1]=="M") {
                $mnum++;
            }

            // ↙
            if ((string)$map[$x+1][$y-1]=="M") {
                $mnum++;
            }

            // ↓
            if ((string)$map[$x+1][$y]=="M") {
                $mnum++;
            }

            // ↘
            if ((string)$map[$x+1][$y+1]=="M") {
                $mnum++;
            }

            $map[$x][$y] = $mnum;
        }
    }
}

//印出字串
$str = "";
for ($x=0;$x<=60;$x++) {
    for ($y=0;$y<=50;$y++) {
        if (isset($map[$x][$y])) {
            $str .= $map[$x][$y];
        }
    }

    if ($x<49) {
        $str .= "N";
    }
}
echo $str;
?>
