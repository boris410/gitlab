<?php
$iTime1 = microtime(true);
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



for ($x=0;$x<=9;$x++) {
    for ($y=0;$y<=9;$y++) {
        print_r($map[$x][$y]);
    }
    if ($x<9) {
        echo "N";
    }
}
echo "<br>";
$iTime2 = microtime(true);
echo "m=$num";
echo "<br>";
echo $iTime2-$iTime1;

?>
<!--//印出結果到格子內-->
<html>
    <meta chartset="UTF-8">
<script type="text/javascript" src="jquery-3.1.0.js"></script>
<script type="text/javascript" src="megamenu.js"></script>
<body>
<form >
<table border=1>

    <?php for ($x=0;$x<=9;$x++) { ?>
    <tr>
        <?php  for ($y=0;$y<=9;$y++) { ?>
            <td>
                <!--<input class="clickcl" type="button" style="width:40px;height:40px;font-size:20px;"  value=<?php print_r($map[$x][$y]);?> onclick="cl()">-->
                <input class="clickcl" type="button" style="width:40px;height:40px;font-size:20px;"  name="location" value="<?php print_r("$x,$y"); ?>" onclick="getval()" >

            </td>
         <?php  } ?>
    </tr>
    <?php } ?>

    <br>
    </table>
</form>
        <script type=text/javascript>;
        function getval(){
            $("input").click(function() {
            var j = $(this).val();
            alert(j);
            }
        });

           //     $(document).ready(function() {
    //     $("input").click(function() {

    //       var j = $(this).val();
    //       alert(j);
    //       $.ajax({
    //             url: "Getclick.php",
    //             type:"POST",
    //             dataType:"JSON",
    //             data:  { 'location':j },
    //             success: function(change){
    //                 alert(change);
    //             },
    //              error:function(change){
    //                 alert("error");
    //              }
    //         });
    //     });
    // });
        </script>
</body>
</html>



