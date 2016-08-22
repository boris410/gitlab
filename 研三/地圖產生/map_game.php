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

//印出結果到格子內
echo <<< html
<script type="text/javascript" src="jquery-3.1.0.js"></script>
<body>
<form >
<table border=1>
html;

        for ($x=0;$x<=9;$x++) {
            echo "<tr>";
            for ($y=0;$y<=9;$y++) {
                echo "<td>";
               // echo "<button type=button id=$x style=width:120px;height:40px;font-size:20px; value=$x onclick=click(this)></button>";
                print_r($map[$x][$y]);
                echo "</td>";
            }
            echo "</tr>";
        }
echo <<< scri
    <br>
    </table>
    </form>
        <script type=text/javascript>
            $(document).ready(function(){

            function click(myobj){
                alert("123");
            }




            });
        </script>


</body>
</html>
scri;

// //印出字串
// for ($x=0;$x<=9;$x++) {
//     for ($y=0;$y<=9;$y++) {
//         print_r($map[$x][$y]);
//     }
//     if ($x<9) {
//         echo "n";
//     }
// }
?>