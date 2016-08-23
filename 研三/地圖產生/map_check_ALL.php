<?php
$getstr = $_GET['map'];
$strlen = strlen($getstr);

if($strlen!=3049){
    echo "不符合，因為長度太大或太小";
    exit;
}
$y=0;$x=0;//索引值
$checkmap = [60][50];//檢查的陣列
$checkmapnumber = [60][50];
$start = 0;//字串起始點
$nnum =0;//計算行數

$l2 = "&,',\",<,>,!,%,#,$,@,=,?,/,(,),[,],{,},.,+,*,_,-";//檢查特殊符號
$sim = explode(',', $l2);


while($strlen>=0){
    $strcut = substr($getstr,$start,1);//從start 位置取字串一次取一個
    //檢查特殊符號包含負數符號-
    for($i=0;$i<=23;$i++){
        if($strcut==$sim[$i]){
            echo "不符合，因為有特殊符號$sim[$i]";
            exit;
        }
    }

        if($strcut === "N"){
            $x++;
            $y=0;
        }

        if($strcut !== "N"){
            $checkmap[$x][$y] = $strcut;
            //echo $checkmap[$x][$y];
            $y++;
        }

        $strlen--;//字串長度
        $start++;//取字串位置
}

// echo "<br>";
// echo $start;
// echo "<br>";
// echo "n=$nnum";
// echo "<br>";


for ($x=0;$x<=49;$x++) {
    for ($y=0;$y<=59;$y++) {
        if($checkmap[$x][$y]!= "M") {
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
            if($checkmap[$x][$y] != $checkmapnumber[$x][$y]){
                    if($checkmap[$x][$y] === "m" || $checkmap[$x][$y] === "n"){
                        echo "不符合，因為有寫小m 或 n 在[$x][$y]";
                        exit;
                    }
                    echo "不符合，因為在第[$x][$y]數字錯誤 OR 字元";
                    exit;
            }
        }
    }
}
echo "符合。";



?>
<html>
    <meta chartset="UTF-8">
<script type="text/javascript" src="jquery-3.1.0.js"></script>
<script type="text/javascript" src="megamenu.js"></script>
<body>
<form >
<table border=1>

    <?php for ($x=0;$x<=49;$x++) { ?>
    <tr>
        <?php  for ($y=0;$y<=59;$y++) { ?>
            <td>
                <input class="clickcl" type="button" style="width:40px;height:40px;font-size:20px;"  value=<?php print_r($checkmap[$x][$y]);print_r($checkmapnumber[$x][$y]); ?>>

            </td>
         <?php  } ?>
    </tr>
    <?php } ?>

    <br>
    </table>
</form>
</body>
</html>




