<?php
$map[10][10];
$number=0;
$num = 0;

//產生40個不重覆亂數
while($num < 10){
    //0~9的固定亂數
    $row = rand(0,9);
    $col = rand(0,9);
    if ($map[$row][$col]!="M") {
        $map[$row][$col] = "M";
        $num++;
    }
}


//計算周圍
for ($x=0;$x<=9;$x++) {
    for ($y=0;$y<=9;$y++) {
        $mnum = 0;
        if($map[$x][$y]!="M") {

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

