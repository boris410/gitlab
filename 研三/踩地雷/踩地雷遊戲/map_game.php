<?php
session_start();
$map = $_SESSION['map'];
$zero;
$x = $_POST['xi'];
$y = $_POST['yi'];

if ((string)$map[$x][$y] == "M") {
    exit;
}

if (!(string)$map[$x][$y] == "0" ) {
    $str =  $map[$x][$y];
    echo $str;
}

if ((string)$map[$x][$y] == "0") {
    $zero[]="$x $y";
    $map[$x][$y] = null;
    checkPoint($x,$y);
    echo json_encode($zero);

}



function checkPoint($x,$y){
    global $map;
    global $zero;
    if ((string)$map[$x-1][$y] == "0" && isset($map[$x-1][$y])) {
        $map[$x-1][$y]=null;
        $zero[]=(string)($x-1) . " " . $y;
        checkPoint($x-1,$y);

        if ((string)$map[$x-1][$y] != "0" && isset($map[$x-1][$y])) {
             $map[$x-1][$y]=null;
            $zero[]=(string)($x-1) . " " . $y;
        }
    }

    if ((string)$map[$x+1][$y] == "0" && isset($map[$x+1][$y])) {
        $map[$x+1][$y]=null;
        $zero[]=(string)($x+1) . " " . $y;
        checkPoint($x+1,$y);
    }

    if ((string)$map[$x][$y-1] == "0" && isset($map[$x][$y-1])) {
        $map[$x][$y-1]=null;
        $zero[]=$x . " " . (string)($y-1);
        checkPoint($x,$y-1);
    }

    if ((string)$map[$x][$y+1] == "0" && isset($map[$x][$y+1])) {
        $map[$x][$y+1]=null;
        $zero[]=$x . " " . (string)($y+1);
        checkPoint($x,$y+1);
    }


}
//     if ((string)$map[$x-1][$y-1] == "0") {

//     }

//     // ↑
//     if ((string)$map[$x-1][$y] == "0") {

//     }

//     // ↗
//     if ((string)$map[$x-1][$y+1] == "0") {

//     }

//     // ←
//     if ((string)$map[$x][$y-1] == "0") {

//     }

//     // →
//     if ((string)$map[$x][$y+1] == "0") {

//     }

//     // ↙
//     if ((string)$map[$x+1][$y-1] == "0") {

//     }

//     // ↓
//     if ((string)$map[$x+1][$y] == "0") {

//     }

//     // ↘
//     if ((string)$map[$x+1][$y+1] == "0") {

//     }
// }


// if ($_POST['text']) {
//     $click = $_POST['text'];
//     $row = $click['x'];
//     $col = $click['y'];
//     $change = $map[$row][$col];
//     echo $change;
// }

?>




