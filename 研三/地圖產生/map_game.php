<?php
$iTime1 = microtime(true);
$map[60][50];
$number=0;
$num = 0;

//產生40個不重覆亂數
while($num < 1200){
    //0~9的固定亂數
    $col = rand(0,59);
    $row = rand(0,49);
    if (!$map[$row][$col]) {
        $map[$row][$col] = "M";
        $num++;
    }
}



//計算周圍
for ($x=0;$x<=59;$x++) {
    for ($y=0;$y<=49;$y++) {
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

印出結果到格子內
echo <<< html
<script type="text/javascript" src="jquery-3.1.0.js"></script>
<script type="text/javascript" src="megamenu.js"></script>
<body>
<form >
<table border=1>
html;

        for ($x=0;$x<=59;$x++) {
            echo "<tr>";
            for ($y=0;$y<=49;$y++) {
                echo "<td>";
                //echo "<input type=button style=width:120px;height:40px;font-size:20px;onclick=alert(click event occured)>";
                print_r($map[$x][$y]);
                echo "</td>";
            }
            echo "</tr>";
        }
echo <<< scri
    <br>
    </table>
</form>
        <script type=text/javascript>;

        </script>
</body>
</html>
scri;

印出字串

for ($x=0;$x<=59;$x++) {
    for ($y=0;$y<=4;$y++) {
        print_r($map[$x][$y]);
    }
    if ($x<9) {
        echo "n";
    }
}
echo "<br>";
$iTime2 = microtime(true);
echo "m=$num";
echo "<br>";
echo $iTime2-$iTime1;
?>