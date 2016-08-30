<?php
$getstr = $_GET['map'];
$showstr = $_GET['map'];
$strlen = strlen($getstr);

$y=0;$x=0;//索引值
$checkmap = [10][10];//檢查的陣列
$checkmapnumber = [10][10];
$start = 0;//字串起始點
$nnum =0;//計算行數

$l2 = "&,',\",<,>,!,%,#,$,@,=,?,/,(,),[,],{,},.,+,*,_,-";//檢查特殊符號含負數符號
$sim = explode(',', $l2);

//切字串
while($strlen>=0){
   $strcut = substr($getstr,$start,1);//從start 位置取字串一次取一個
    if( $strcut === "N" && $start ==109){
        echo "斷行錯誤，最後一個是N";
        $lastn=true;
    }
    //檢查特殊符號包含負數符號-
    for($i=0;$i<=23;$i++){
        if ($strcut==$sim[$i]) {
            echo "不符合，因為有特殊符號$sim[$i]在第" . $start ."個";
            echo $showstr;
            exit;
        }

        if ($strcut==" ") {
            echo "不符合，因為有空白輸入在第" . $start . "個";
            echo $showstr;
            exit;
        }

        if ($strcut === "m") {
            $strcut =strtoupper($strcut);
            $getstr = strtoupper($getstr);
            $word=true;
            echo "炸彈m大寫小有錯。";
        }

        if ($strcut === "n") {
            $strcut =strtoupper($strcut);
            $getstr = strtoupper($getstr);
            $word=true;
            echo "換行N大寫小有錯。";
        }
    }
        //如果是N就col x +1換下一行, 並將row y 歸零
        if ($strcut === "N") {
            $x++;
            $y=0;
        }

        //將字元一個個塞進陣列 並下一個 y++
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
                echo "數字錯誤在第[$x][$y]" . "測試輸入為". $checkmap[$x][$y] . " 正確輸入為" . $checkmapnumber[$x][$y] . "。" ;
                $wrongNumber=true;
            }

        }

        if ((string)$checkmap[$x][$y] == "M") {
            $boomnumber++;
        }
    }
}
if ($boomnumber!=40) {
    echo "因為炸彈數不對，只有". $boomnumber."顆。";
    $boom=true;
}

if (!$word && !$boom && !$lastn && !$wrongNumber) {
    echo "符合。";
}

?>
