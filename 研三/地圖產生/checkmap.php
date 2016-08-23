<?php
$getstr = $_GET['map'];

if (!isset($_GET['map'])) {
    echo "不符合，因為GET關鍵字不是map";
    exit;
}

$strlen = strlen($getstr);

if ($strlen>109) {
    echo "不符合，因為長度太長";
    exit;
}

if ($strlen<109) {
    echo "不符合，因為長度太短";
    exit;
}

$y=0;$x=0;//索引值
$checkmap = [10][10];//檢查的陣列
$checkmapnumber = [10][10];
$start = 0;//字串起始點
$nnum =0;//計算行數

$l2 = "&,',\",<,>,!,%,#,$,@,=,?,/,(,),[,],{,},.,+,*,_,-";//檢查特殊符號含負數符號
$sim = explode(',', $l2);

while($strlen>=0){
    $strcut = substr($getstr,$start,1);//從start 位置取字串一次取一個
    //檢查特殊符號包含負數符號-
    for($i=0;$i<=23;$i++){
        if ($strcut==$sim[$i]) {
            echo "不符合，因為有特殊符號$sim[$i]";
            exit;
        }

        if ($strcut==" ") {
            echo "不符合，因為有空白輸入";
            exit;
        }

        if ($strcut === "m") {
            echo "不符合，因為有小寫m";
            exit;
        }

        if ($strcut === "n") {
            echo "不符合，因為有小寫n";
            exit;
        }
    }

        if ($strcut === "N") {
            $x++;
            $y=0;
        }

        if ($strcut !== "N") {
            $checkmap[$x][$y] = $strcut;
            //echo $checkmap[$x][$y];
            $y++;
        }

        $strlen--;//字串長度
        $start++;//取字串位置
}

for ($x=0;$x<=9;$x++) {
    for ($y=0;$y<=9;$y++) {
        if ($checkmap[$x][$y]!= "M") {
            $mnum = 0;

            // ↖
            if ((string)$checkmap[$x-1][$y-1]=="M") {
                $mnum++;
            }

            // ↑
            if ((string)$checkmap[$x-1][$y]=="M") {
                $mnum++;
            }

            // ↗
            if ((string)$checkmap[$x-1][$y+1]=="M") {
                $mnum++;
            }

            // ←
            if ((string)$checkmap[$x][$y-1]=="M") {
                $mnum++;
            }

            // →
            if ((string)$checkmap[$x][$y+1]=="M") {
                $mnum++;
            }

            // ↙
            if ((string)$checkmap[$x+1][$y-1]=="M") {
                $mnum++;
            }

            // ↓
            if ((string)$checkmap[$x+1][$y]=="M") {
                $mnum++;
            }

            // ↘
            if ((string)$checkmap[$x+1][$y+1]=="M") {
                $mnum++;
            }

            //產生另一個陣列檢查正確的數字
            $checkmapnumber[$x][$y] = $mnum;

            //比對陣列數字
            if ($checkmap[$x][$y] != $checkmapnumber[$x][$y]) {
                echo "不符合，因為在第[$x][$y]數字錯誤 OR 字元錯誤，"."測試輸入為".$checkmap[$x][$y]." 正確輸入為".$checkmapnumber[$x][$y] ;
                exit;
            }
        }

        if ((string)$checkmap[$x][$y] == "M") {
            $boomnumber++;
        }
    }
}

if ($boomnumber!=40) {
    echo "不符合，因為炸彈數不對";
}

echo "符合。";

?>
